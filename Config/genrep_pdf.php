<?php
    include_once("conexionbd.php");
    include_once("metodosbd.php");

    session_start();

    //Importar variables
    
    $data=$_GET['date1'];
    $data2=$_GET['date2'];
    $cortecaja=$_GET['cortecaja'];
    $totalVentas="";
    if($cortecaja=='cortecaja'){
        $local=$_GET['local'];
    }else{
        $local="general por ".$_SESSION['Nombre completo'];
    }

    // Importar libreria
    include('../fpdf/fpdf.php');

    // Establecer objeto, pagina y fuente
    $pdf = new FPDF('L','mm','A4');
    $pdf->AddPage();

    // Titulos de celda
    $pdf->SetFont('Arial','B',10);
    $pdf->SetTextColor(255,255,255);
    $pdf->SetFillColor(50,50,50);
    $pdf->Cell(270,6,'Reporte de Cobranza '.$local.' del '.$data.' al '.$data2,1,1,'C',true);
    $pdf->SetFont('Arial','B',8);
    $pdf->SetTextColor(0,0,0);
    $pdf->Cell(28,5,'IMEI/ICC/SKU',1,0,'C');
    $pdf->Cell(18,5,'Marca',1,0,'C');
    $pdf->Cell(20,5,'Modelo',1,0,'C');
    $pdf->Cell(17,5,'DN',1,0,'C');
    $pdf->Cell(35,5,'Vendedor',1,0,'C');
    $pdf->Cell(22,5,'Perfil',1,0,'C');
    $pdf->Cell(16,5,'Fecha',1,0,'C');
    $pdf->Cell(28,5,utf8_decode('Locación'),1,0,'C');
    $pdf->Cell(14,5,'Precio',1,0,'C');
    $pdf->Cell(17,5,'Financiera',1,0,'C');
    $pdf->Cell(55,5,'Comentarios',1,1,'C');

    // Relleno de celdas
    $pdf->SetFont('Arial','',6);
    //$pdf->Cell(25,4,'IMEI/ICC/SKU',1,0,'C');

    // Condicion para saber si se trata de corte de caja-
    // o si se hara una consulta general entre un lapzo de tiempo
    if($cortecaja=='cortecaja'){
        $consulta_ventas=$conexion->query("SELECT * FROM ventas WHERE Locacion='$local' AND Fecha BETWEEN '$data' AND '$data2'");
        $consulta_suma_ventas=$conexion->query("SELECT SUM(Precio) AS TotalVentas FROM ventas WHERE Locacion='$local' AND Fecha BETWEEN '$data' AND '$data2'");
    }else{ 
        $consulta_ventas=$conexion->query("SELECT * FROM ventas WHERE Fecha BETWEEN '$data' AND '$data2'");
        $consulta_suma_ventas=$conexion->query("SELECT SUM(Precio) AS TotalVentas FROM ventas WHERE Fecha BETWEEN '$data' AND '$data2'");
    }

    if($consulta_suma_ventas->rowCount() == 1){
        $suma_ventas = $consulta_suma_ventas->fetch();
        $totalVentas = $suma_ventas['TotalVentas'];
    }

    while($item=$consulta_ventas->fetch(PDO::FETCH_OBJ)){
        $pdf->Cell(28,4,$item->IMEIICCSKU,1,0,'C');
        $pdf->Cell(18,4,$item->Marca,1,0,'C');
        $pdf->Cell(20,4,$item->Modelo,1,0,'C');
        $pdf->Cell(17,4,$item->NumeroTelefono,1,0,'C');
        $pdf->Cell(35,4,$item->Vendedor,1,0,'C');
        $pdf->Cell(22,4,$item->TipoVendedor,1,0,'C');
        $pdf->Cell(16,4,$item->Fecha,1,0,'C');
        $pdf->Cell(28,4,$item->Locacion,1,0,'C');
        $pdf->Cell(14,4,$item->Precio,1,0,'C');
        $pdf->Cell(17,4,$item->Financiera,1,0,'C');
        $pdf->Cell(55,4,$item->Comentarios,1,1,'L');
    }
    $pdf->Ln(12);
    $pdf->Cell(200);
    $pdf->SetFont('Arial','B',8);
    $pdf->Cell(25,4,'Total de ventas',1,1,'C');
    $pdf->Cell(200);
    $pdf->SetFont('Arial','',8);
    $pdf->Cell(25,4,'$'.$totalVentas,1,1,'R');

    // Exportar PDF
    $pdf->Output();
?>