<?php
session_start();
require('conexionbd.php');
$id=$_GET['id'];
$use=$_SESSION['Usuario'];
if($id!="eliminar"){
    $res=$conexion->query("DELETE FROM carrito WHERE ID=$id");
    if($res){
        header('location: ..\menu_ventas/ventas.php');
    }else{
        echo "<script>alert('No se pudo eliminar')</script>";
        echo "<script>location.href='../menu_ventas/seccionventas.php'</script>";
    }
}else{
    $res=$conexion->query("DELETE FROM carrito WHERE 'Usuario' = $use");
    if($res){
        header('location: ..\menu_ventas/seccionventas.php');
    }else{
        echo "<script>alert('No se pudo eliminar')</script>";
        echo "<script>location.href='../ventas.php'</script>";
    }
}

?>