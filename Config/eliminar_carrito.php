<?php
require('conexionbd.php');
$id=$_GET['id'];
$res=$conexion->query("DELETE FROM carrito WHERE ID=$id");
if($res){
    header('location: ..\menu_ventas/ventas.php');
}else{
    echo "<script>alert('No se pudo eliminar')</script>";
    echo "<script>location.href='../index.php'</script>";
}


?>