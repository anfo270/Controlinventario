<?php
require ("conexionbd.php");
require ("metodosbd.php");

session_start();
$local=$_SESSION['Local']; 

$señal=$_GET['señal'];
$data=$_POST['date'];
$posicion=1;
//libreria
require '..\vendor/autoload.php';
//archivos necesarios
use PhpOffice\PhpSpreadsheet\SpreadSheet;
use \PhpOffice\PhpSpreadsheet\IOFactory;

//objeto que crea el archivo excel
$spreadsheet = new SpreadSheet();

//nombre de autor y titulo
$spreadsheet->getProperties()->setCreator("Marko Robles")->setTitle("Inventario");
//Numero de hoja para trabajar, activamos la hoja
$spreadsheet->setActiveSheetIndex(0);
//establecemos da hoja a trabajar por hoja activa
$hojaactiva=$spreadsheet->getActiveSheet();
//Consulta de datos segun la locacion del usuario
if($señal==1){
    $consulta_telefonos=$conexion->query("SELECT * FROM telefonos WHERE Locacion='$local'") or die(print($conexion->errorInfo()));
    $consulta_accesorios=$conexion->query("SELECT * FROM accesorio WHERE Locacion='$local' ")or die(print($conexion->errorInfo()));
    $consulta_sims=$conexion->query("SELECT * FROM sims WHERE Locacion='$local' ")or die(print($conexion->errorInfo()));
}else if($señal==3){
    $consulta_ventas=busqueda($conexion,"ventas","Fecha",$data);
    
    $hojaactiva->setCellValue("A1","IMEI/ICC/SKU");
    $hojaactiva->getColumnDimension('A')->setWidth(120, 'pt');
    
    $hojaactiva->setCellValue("B1","Marca");
    $hojaactiva->getColumnDimension('B')->setWidth(120, 'pt');
    
    $hojaactiva->setCellValue("C1","Modelo");
    $hojaactiva->getColumnDimension('C')->setWidth(120, 'pt');

    $hojaactiva->setCellValue("D1","Vendedor");
    $hojaactiva->getColumnDimension('D')->setWidth(120, 'pt');

    $hojaactiva->setCellValue("E1","Fecha");
    $hojaactiva->getColumnDimension('E')->setWidth(120, 'pt');

    $hojaactiva->setCellValue("F1","Locacion");
    $hojaactiva->getColumnDimension('F')->setWidth(120, 'pt');

    $hojaactiva->setCellValue("G1","Precio");
    $hojaactiva->getColumnDimension('G')->setWidth(120, 'pt');

    $hojaactiva->setCellValue("H1","Financiera");
    $hojaactiva->getColumnDimension('H')->setWidth(120, 'pt');

    $hojaactiva->getStyle("A1:H1")->getFont()->setBold(true);

    while($item=$consulta_ventas->fetch(PDO::FETCH_OBJ)){
        $posicion++;
        $hojaactiva->setCellValue("A{$posicion}",$item->IMEIICCSKU);
        $hojaactiva->setCellValue("B{$posicion}",$item->Marca);
        $hojaactiva->setCellValue("C{$posicion}",$item->Modelo);
        $hojaactiva->setCellValue("D{$posicion}",$item->Vendedor);
        $hojaactiva->setCellValue("E{$posicion}",$item->Fecha);
        $hojaactiva->setCellValue("F{$posicion}",$item->Locacion);
        $hojaactiva->setCellValue("G{$posicion}",$item->Precio);
        $hojaactiva->setCellValue("H{$posicion}",$item->Financiera);
    }
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="*.xlsx"');
    header('Cache-Control: max-age=0');
    //damos opcion de tipo de archivo
    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
    $writer->save('php://output');
    header('location: ..\menu_administrador/cobranza.php');
}else{
    $consulta_telefonos=consulta($conexion,"telefonos");
    $consulta_accesorios=consulta($conexion,"accesorio");
    $consulta_sims=consulta($conexion, "sims");
}
//posision y valor en celda


$hojaactiva->setCellValue("A1","IMEI/ICC/SKU");
$hojaactiva->getColumnDimension('A')->setWidth(120, 'pt');
$hojaactiva->setCellValue("B1","MARCA");
$hojaactiva->getColumnDimension('B')->setWidth(120, 'pt');
$hojaactiva->setCellValue("C1","Modelo");
$hojaactiva->getColumnDimension('C')->setWidth(120, 'pt');
$hojaactiva->setCellValue("D1","Locacion");
$hojaactiva->getColumnDimension('D')->setWidth(120, 'pt');
$hojaactiva->setCellValue("E1","Tipo");
$hojaactiva->getColumnDimension('E')->setWidth(120, 'pt');
$hojaactiva->getStyle("A1:E1")->getFont()->setBold(true);

$hojaactiva->getStyle("A1:E1")->getFont()->setBold(true);

while($item=$consulta_telefonos->fetch(PDO::FETCH_OBJ)){
    $posicion++;
    $hojaactiva->setCellValue("A{$posicion}",$item->IMEI);
    $hojaactiva->setCellValue("B{$posicion}",$item->Marca);
    $hojaactiva->setCellValue("C{$posicion}",$item->Modelo);
    $hojaactiva->setCellValue("D{$posicion}",$item->Locacion);
    $hojaactiva->setCellValue("E{$posicion}","Equipo");
}
while($item=$consulta_accesorios->fetch(PDO::FETCH_OBJ)){
    $posicion++;
    $hojaactiva->setCellValue("A{$posicion}",$item->SKU);
    $hojaactiva->setCellValue("B{$posicion}",$item->Marca);
    $hojaactiva->setCellValue("C{$posicion}",$item->Modelo);
    $hojaactiva->setCellValue("D{$posicion}",$item->Locacion);
    $hojaactiva->setCellValue("E{$posicion}","Accesorio");
}
while($item=$consulta_sims->fetch(PDO::FETCH_OBJ)){
    $posicion++;
    $hojaactiva->setCellValue("A{$posicion}",$item->ICC);
    $hojaactiva->setCellValue("B{$posicion}",$item->Marca);
    $hojaactiva->setCellValue("C{$posicion}",$item->Modelo);
    $hojaactiva->setCellValue("D{$posicion}",$item->Locacion);
    $hojaactiva->setCellValue("E{$posicion}","Sims-card");
}
$spreadsheet->getActiveSheet()->setAutoFilter(
    $spreadsheet->getActiveSheet()
        ->calculateWorksheetDimension()
);
//damos opcion de donde se descarga el archivo
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="*.xlsx"');
header('Cache-Control: max-age=0');
//damos opcion de tipo de archivo
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save('php://output');

?>