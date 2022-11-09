<?php
include('../Config/conexionbd.php');
include('../Config/metodosbd.php');

$Factura=intval($_GET['Factura']);
$tipos=$_GET['tipo'];
$precio=$_GET['precio'];
if($tipos!="sims"){
    $proveedor=$_GET['proveedor'];
    $marcas=$_GET['marcas'];
    $modelo=$_GET['modelo'];
}else{
    $telefonia=$_POST['telefonia'];
    $marcas=$telefonia;
    $modelo=$telefonia;
    $proveedor=$telefonia;
}
$cantidad=intval($_GET['cantidad']);
date_default_timezone_set('America/Mexico_City');
$Fecha = date('d/m/Y', time());

for ($i=0; $i <$cantidad ; $i++){
    $inser=insertar_telefono($_POST['numero'.$i],$marcas,"ALMACEN",$modelo,$conexion,$precio,$Fecha,$Factura);
    if(!$inser){
        echo "<script>alert('No se agrego el equipo')</script>";
    }
}
?>