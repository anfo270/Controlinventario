<?php
require('conexionbd.php');
require('metodosbd.php');
require('../fpdf/fpdf.php');
session_start();
if(!isset($_SESSION['Usuario'])&& !isset( $_SESSION['Contrasena'])){
    header('location: ../index.php');
}
$usu = $_SESSION['Usuario'];
$suc = $_SESSION['Local'];
$vendedor = $_SESSION['Nombre completo'];

date_default_timezone_set('America/Denver');
$fecha = date('d/m/Y', time());

$precioFinal=0;
$MontoRecibido=0;
$TipoDePago="";
$cambio=0;
$largo=intval(139);
$productos=busqueda($conexion,"carrito","Usuario",$usu);
$TipoDePago=$_GET['tipoPago'];

if($productos->rowCount()==0){
    header('location: seccionventas.php');
}else if($productos->rowCount()==1){
    $largo=intval(135);
}else{
    while($item=$productos->fetch(PDO::FETCH_OBJ)){
        $largo=$largo+6;
    }
}

define('PESO',chr(36)); // Constante con el símbolo Peso.
$pdf = new FPDF('P','mm',array(80,$largo)); // Tamaño tickt 80mm x 150 mm (largo aprox)
$pdf->AddPage();

$pdf->SetFont('Helvetica','B',12);
$pdf->Cell(60,4,'Sucursal: '.$suc,0,1,'C');
$pdf->SetFont('Helvetica','',8);
$pdf->Cell(60,4,'Lumiher Comunicaciones S.A. de C.V.',0,1,'C');
$pdf->SetFont('Helvetica','',8);
$pdf->Cell(60,4,utf8_decode('Vicente Guerrero #206 Col. Centro'),0,1,'C');
$pdf->Cell(60,4,'C.P. 32000',0,1,'C');
$pdf->Cell(60,4,utf8_decode('Juárez, Chihuahua'),0,1,'C');
$pdf->Cell(60,4,'RFC: LCO960702I99',0,1,'C');
$pdf->Cell(60,4,utf8_decode('Régimen de las personas morales'),0,1,'C');
 
// DATOS FACTURA        
$pdf->Ln(5);
$pdf->Cell(60,4,utf8_decode('Ticket número: _'),0,1,'');
$pdf->Cell(60,4,utf8_decode('Tipo de pago: '.$TipoDePago),0,1,'');
$pdf->Cell(60,4,'Fecha: ' . $fecha,0,1,'');
$pdf->Cell(60,4,utf8_decode('Le atendió: '.$vendedor),0,1,'');

// COLUMNAS
$pdf->SetFont('Helvetica', 'B', 7);
$pdf->Cell(30, 10,utf8_decode('Artículo'), 0);
$pdf->Cell(15, 10, 'Precio',0,0,'R');
$pdf->Cell(15, 10, 'Pago',0,0,'R');
$pdf->Ln(8);
$pdf->Cell(60,0,'','T');
$pdf->Ln(0);
 
// PRODUCTOS
$pdf->SetFont('Helvetica', '', 7);
$productos=busqueda($conexion,"carrito","Usuario",$usu);
if($productos->rowCount()==0){
    //header('location:' . getenv('HTTP_REFERER'));
    header('location: seccionventas.php');
}

while($item=$productos->fetch(PDO::FETCH_OBJ)){
    $descripcionProducto="";
    $IMEIICC_ultimos5 = "...".substr($item->IMEIICCSKU,-5);
    if($item->tipo=="telefonos"){
        $descripcionProducto='1 teléfono '.$item->Marca.' '.$item->Modelo.' por '.$item->FinancieraActivacion.', IMEI: '.$IMEIICC_ultimos5;
    }else if($item->tipo=="sims"){
        $descripcionProducto='1 tarjeta SIM '.$item->Marca.' '.$item->FinancieraActivacion.', DN: '.$item->NumeroTelefono.' ICC: '.$IMEIICC_ultimos5;
    }else if($item->tipo=="accesorio"){
        $descripcionProducto='1 accesorio '.$item->Marca.' '.$item->Modelo;
    }else if($item->tipo=="recarga"){
        $descripcionProducto='1 recarga '.$item->FinancieraActivacion.', Número: '.$item->NumeroTelefono;
    }else if($item->tipo=="servicio"){
        $descripcionProducto='1 pago de servicio '.$item->FinancieraActivacion;
    }
    $pdf->MultiCell(35,3,utf8_decode($descripcionProducto),0,'L'); 
    $pdf->Cell(45, -5, PESO.number_format(round($item->PrecioInicial,2), 0, ',', ' '),0,0,'R');
    $pdf->Cell(15, -5, PESO.number_format(round($item->Precio,2), 0, ',', ' '),0,0,'R');
    $pdf->Ln(1);
    $precioFinal=intval($item->Precio)+$precioFinal;
}
$MontoRecibido=$_GET['montRec'];
$cambio=intval($MontoRecibido-$precioFinal);
//SUMATORIO DE LOS PRODUCTOS
$pdf->Ln(1); $pdf->Cell(60,0,'','T'); $pdf->Ln(1); 
$pdf->SetFont('Helvetica', 'B', 9);
$pdf->Cell(25, 10, 'Total', 0); $pdf->Cell(20, 10, '', 0); 
$pdf->Cell(15, 10, PESO.number_format(round($precioFinal,2), 0, ',', ' '),0,0,'R'); 
$pdf->Ln(3); 
$pdf->SetFont('Helvetica', '', 7);
$pdf->Cell(25, 10, 'Monto recibido', 0); $pdf->Cell(20, 10, '', 0); 
$pdf->Cell(15, 10, PESO.number_format(round($MontoRecibido,2), 0, ',', ' '),0,0,'R'); 
$pdf->Ln(3); 
$pdf->SetFont('Helvetica', 'B', 9);
$pdf->Cell(25, 13, 'Cambio', 0); $pdf->Cell(20, 10, '', 0); 
$pdf->Cell(15, 13, PESO.number_format(round($cambio,2), 0, ',', ' '),0,0,'R'); 

// PIE DE PAGINA $pdf->Ln(10);
$pdf->SetFont('Helvetica', '', 7); 
$pdf->Ln(13); 
$pdf->Ln(3); $pdf->Cell(60,0,utf8_decode('Estimado cliente: si requiere factura, tiene 5 días hábiles'),0,1,'C'); 
$pdf->Ln(3); $pdf->Cell(60,0,utf8_decode('para solicitarla. Cualquier duda, favor de enviar un correo'),0,1,'C'); 
$pdf->Ln(3); $pdf->Cell(60,0,utf8_decode('a ingresosgeneral@lumiher.com'),0,1,'C'); 
$pdf->Ln(3); 
$pdf->Ln(3); $pdf->Cell(60,0,utf8_decode('Este documento no es válido para efectos fiscales.'),0,1,'C');
$pdf->Output('ticket.pdf','i');
?>