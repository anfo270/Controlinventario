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
date_default_timezone_set('America/Denver');
$Fecha = date('d/m/Y', time());
if($tipos=="telefonos"){
    for ($i=0; $i <$cantidad ; $i++){
        
        $inser=insertar_telefono($_POST['numero'.$i],$marcas,"ALMACEN",$modelo,$conexion,$precio,$Fecha,$Factura,$proveedor);
        if(!$inser){
            echo "<script>alert('No se agreg\u00F3 el equipo {$_POST['numero'.$i]}.')</script>";
        }
    }
    echo "<script>alert('Transacci\u00F3n realizada.')</script>";
    echo "<script>location.href='../menu_administrador/compras.php?tipo=telefonos'</script>";
}else if($tipos=="sims"){
    for ($i=0; $i <$cantidad ; $i++){
        $inser=insertar_sims($conexion,$_POST['numero'.$i],$marcas,"ALMACEN",$modelo,$telefonia,$precio,$Fecha,$Factura,$proveedor);
        if(!$inser){
            echo "<script>alert('No se agreg\u00F3 el chip {$_POST['numero'.$i]}.')</script>";
        }
    }
    echo "<script>alert('Transacci\u00F3n realizada.')</script>";
    echo "<script>location.href='../menu_administrador/compras.php?tipo=sims'</script>";
}else{
    for ($i=0; $i <$cantidad ; $i++){
        $inser=insertar_accesorio($conexion,$_POST['numero'.$i],$marcas,"ALMACEN",$modelo,$precio,$Fecha,$Factura,$proveedor);
        if(!$inser){
            echo "<script>alert('No se agreg\u00F3 el accesorio {$_POST['numero'.$i]}')</script>";
        }
    }
    echo "<script>alert('Transacci\u00F3n realizada.')</script>";
    echo "<script>location.href='../menu_administrador/compras.php?tipo=accesorio'</script>";
}
?>