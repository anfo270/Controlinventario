<?php
/*
Este es un parche temporal para el problema de la exportacion en Excel

No debe de tomarse como una solucion permanente,
debe de resolverse el problema con inventarioppvd.php

A menos que no se encuentre una mejor alternativa y
que se puedan acomodar los ajustes y configutaciones
pendientes en este archivo.

*/
include_once("conexionbd.php");
include_once("metodosbd.php");

session_start();
$local=$_SESSION['Local']; 
$data="";
$senal=$_GET['señal'];
$data_d="";
$data_m="";
$data_y="";

date_default_timezone_set('America/Denver');
$data = date('d/m/Y', time());
$localPDV=$_SESSION['Local'];

$posicion=1;
$creadorArchivo=$_SESSION['Usuario'];

// Libreria
set_include_path( get_include_path().PATH_SEPARATOR."..");
include_once("xlsxwriter.class.php");

// Nombre del archivo
$fname='ReporteInventario_General_' . $data . '.xlsx';

// Objeto del archivo EXCEL
$writer = new XLSXWriter();

// Autor
$writer->setAuthor($creadorArchivo);

// Estilos
$styles1 = array( 'font'=>'Calibri','font-size'=>11,'font-style'=>'bold', 'fill'=>'#eee', 'halign'=>'center', 'border'=>'left,right,top,bottom' );
$styles2 = array( 'font'=>'Calibri','font-size'=>11,'halign'=>'center', 'border'=>'left,right,top,bottom' );
$header = array("string","string","string","string");

//$senal=intval(1);

// Consulta de datos segun cada senal
if ($senal==1){
    // Reporte del inventario de una sucursal
    $consulta_telefonos=$conexion->query("SELECT * FROM telefonos WHERE Locacion='$local'") or die(print_r($conexion->errorInfo()));
    $consulta_accesorios=$conexion->query("SELECT * FROM accesorio WHERE Locacion='$local' ")or die(print_r($conexion->errorInfo()));
    $consulta_sims=$conexion->query("SELECT * FROM sims WHERE Locacion='$local' ")or die(print_r($conexion->errorInfo()));

    // Especificar header
    $writer->writeSheetHeader('Hoja1', $header, $col_options = ['widths'=>[25,15,15,20,25], 'suppress_row'=>true] );
    $writer->writeSheetRow('Hoja1', $rowdata = array('IMEI/ICC/SKU','Tipo','Marca','Modelo','Locacion'), $styles1);

    // Comenzar rellenado de datos
    // Todos los telefonos
    while ($item=$consulta_telefonos->fetch(PDO::FETCH_OBJ)){
        $writer->writeSheetRow('Hoja1', $rowdata = array(
            $item->IMEI,'Equipo',$item->Marca,$item->Modelo,$item->Locacion
        ), $styles2);
    }

    // Todos los accesorios
    while ($item=$consulta_accesorios->fetch(PDO::FETCH_OBJ)){
        $writer->writeSheetRow('Hoja1', $rowdata = array(
            $item->SKU,'Accesorio',$item->Marca,$item->Modelo,$item->Locacion
        ), $styles2);
    }
    
    // Todos los SIMs
    while ($item=$consulta_sims->fetch(PDO::FETCH_OBJ)){
        $writer->writeSheetRow('Hoja1', $rowdata = array(
            $item->ICC,'SIM card',$item->Marca,$item->Modelo,$item->Locacion
        ), $styles2);
    }

    // Generamos el archivo
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="ReporteInventario_' . $local . '_' . $data . '.xlsx"');
    header('Cache-Control: max-age=0');
    $writer->writeToStdOut();

} else if ($senal==2){
    // Reporte del inventario general
    $consulta_telefonos=consulta($conexion,"telefonos");
    $consulta_accesorios=consulta($conexion,"accesorio");
    $consulta_sims=consulta($conexion, "sims");

    // Especificar header
    $writer->writeSheetHeader('Hoja1', $header, $col_options = ['widths'=>[25,15,15,20,25], 'suppress_row'=>true] );
    $writer->writeSheetRow('Hoja1', $rowdata = array('IMEI/ICC/SKU','Tipo','Marca','Modelo','Locacion'), $styles1);

    // Comenzar rellenado de datos
    // Todos los telefonos
    while ($item=$consulta_telefonos->fetch(PDO::FETCH_OBJ)){
        $writer->writeSheetRow('Hoja1', $rowdata = array(
            $item->IMEI,'Equipo',$item->Marca,$item->Modelo,$item->Locacion
        ), $styles2);
    }

    // Todos los accesorios
    while ($item=$consulta_accesorios->fetch(PDO::FETCH_OBJ)){
        $writer->writeSheetRow('Hoja1', $rowdata = array(
            $item->SKU,'Accesorio',$item->Marca,$item->Modelo,$item->Locacion
        ), $styles2);
    }
    
    // Todos los SIMs
    while ($item=$consulta_sims->fetch(PDO::FETCH_OBJ)){
        $writer->writeSheetRow('Hoja1', $rowdata = array(
            $item->ICC,'SIM card',$item->Marca,$item->Modelo,$item->Locacion
        ), $styles2);
    }

    // Generamos el archivo
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="'.$fname.'"');
    header('Cache-Control: max-age=0');
    $writer->writeToStdOut();
    
} else if ($senal==3){
    // Consulta de ventas por lapso de fechas y/o local
    // Variables de consulta personalizada
    $data_d=$_POST['date_d'];
    $data_m=$_POST['date_m'];
    $data_y=$_POST['date_y'];

    $data_d2=$_POST['date_d2'];
    $data_m2=$_POST['date_m2'];
    $data_y2=$_POST['date_y2'];

    $data=$data_d . "-" . $data_m . "-" . $data_y;
    $data2=$data_d2 . "-" . $data_m2 . "-" . $data_y2;
    $cortecaja=$_GET['cortecaja'];

    // Condicion para saber si se trata de corte de caja-
    // o si se hara una consulta general entre un lapzo de tiempo
    if($cortecaja=='cortecaja'){
        $consulta_ventas=$conexion->query("SELECT * FROM ventas WHERE Locacion='$local' AND Fecha BETWEEN '$data' AND '$data2'");
    }else{ 
        $consulta_ventas=$conexion->query("SELECT * FROM ventas WHERE Fecha BETWEEN '$data' AND '$data2'");
    }

    // Especificar header
    $writer->writeSheetHeader('Hoja1', $header, $col_options = ['widths'=>[25,15,20,15,15,15,15,15,15], 'suppress_row'=>true] );
    $writer->writeSheetRow('Hoja1', $rowdata = array('IMEI/ICC/SKU','Marca','Modelo','Vendedor','Perfil vendedor', 'Fecha', 'Locacion','Precio', 'Financiera'), $styles1);

    // Comenzar rellenado de datos
    // Ventas realizadas
    while ($item=$consulta_ventas->fetch(PDO::FETCH_OBJ)){
        $writer->writeSheetRow('Hoja1', $rowdata = array(
            $item->IMEIICCSKU,$item->Marca,$item->Modelo,$item->Vendedor,$item->TipoVendedor,$item->Fecha,$item->Locacion,$item->Precio,$item->Financiera
        ), $styles2);
    }

    // Generamos el archivo
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="ReporteCobranza_' . $data . '.xlsx"');
    header('Cache-Control: max-age=0');
    $writer->writeToStdOut();

} else {
    echo '<script>alert("No se pudo generar el reporte.");</script>';
    echo "<script>location.href='../menu.php'</script>";
}
exit(0);
?>