<?php
require('conexionbd.php');
require('metodosbd.php');
require('../fpdf/fpdf.php');
session_start();
if(!isset($_SESSION['Usuario'])&& !isset( $_SESSION['Contraseña'])){
    header('location: ../index.php');
}
define('EURO',chr(36)); // Constante con el símbolo Euro.
$pdf = new FPDF('P','mm',array(80,170)); // Tamaño tickt 80mm x 150 mm (largo aprox)
$pdf->AddPage();

$pdf->SetFont('Helvetica','',8);
$pdf->Cell(60,4,'Sucursal',0,1,'C');
$pdf->SetFont('Helvetica','',12);
$pdf->Cell(60,4,'Lumiher Comunicaciones',0,1,'C');
$pdf->Cell(60,4,'S.A. de C.V.',0,1,'C');
$pdf->SetFont('Helvetica','',8);
$pdf->Cell(60,4,utf8_decode('Blvd. Tomás Fernández #7940-1'),0,1,'C');
$pdf->Cell(60,4,utf8_decode('Col. Partido Senecú'),0,1,'C');
$pdf->Cell(60,4,'C.P. 32460',0,1,'C');
$pdf->Cell(60,4,utf8_decode('Juárez, Chihuahua'),0,1,'C');
$pdf->Cell(60,4,'RFC: LCO960702I99',0,1,'C');
$pdf->Cell(60,4,utf8_decode('Régimen de las personas morales'),0,1,'C');
 
// DATOS FACTURA        
$pdf->Ln(5);
$pdf->Cell(60,4,utf8_decode('Ticket Núm.: 1'),0,1,'');
$pdf->Cell(60,4,'Fecha: 16/11/2022',0,1,'');
$pdf->Cell(60,4,utf8_decode('Le atendió: Jesus Flores'),0,1,'');

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
$pdf->MultiCell(30,4,utf8_decode('telefonos Samsung A22 4+128 PayJoy'),0,'L'); 
$pdf->Cell(45, -5, number_format(round(3200,2), 0, ',', ' ').EURO,0,0,'R');
$pdf->Cell(15, -5, number_format(round(500,2), 0, ',', ' ').EURO,0,0,'R');
$pdf->Ln(3);
$pdf->MultiCell(30,4,utf8_decode('sims Movistar Movistar plan'),0,'L');
$pdf->Cell(45, -5, number_format(round(0,2), 0, ',', ' ').EURO,0,0,'R');
$pdf->Cell(15, -5, number_format(round(0,2), 0, ',', ' ').EURO,0,0,'R');
$pdf->Ln(3);
$pdf->MultiCell(30,4,utf8_decode('recarga Movistar'),0,'L'); 
$pdf->Cell(45, -5, number_format(round(100,2), 0, ',', ' ').EURO,0,0,'R');
$pdf->Cell(15, -5, number_format(round(100,2), 0, ',', ' ').EURO,0,0,'R');
$pdf->Ln(3);

//SUMATORIO DE LOS PRODUCTOS
$pdf->Ln(1); $pdf->Cell(60,0,'','T'); $pdf->Ln(1); 
$pdf->SetFont('Helvetica', 'B', 9);
$pdf->Cell(25, 10, 'Total', 0); $pdf->Cell(20, 10, '', 0); 
$pdf->Cell(15, 10, number_format(round(600,2), 0, ',', ' ').EURO,0,0,'R'); 
$pdf->Ln(3); 
$pdf->SetFont('Helvetica', '', 7);
$pdf->Cell(25, 10, 'Monto recibido', 0); $pdf->Cell(20, 10, '', 0); 
$pdf->Cell(15, 10, number_format(round(1000,2), 0, ',', ' ').EURO,0,0,'R'); 
$pdf->Ln(3); 
$pdf->SetFont('Helvetica', 'B', 9);
$pdf->Cell(25, 13, 'Cambio', 0); $pdf->Cell(20, 10, '', 0); 
$pdf->Cell(15, 13, number_format(round(400,2), 0, ',', ' ').EURO,0,0,'R'); 

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