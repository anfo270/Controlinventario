<?php
require('conexionbd.php');
require('metodosbd.php');
session_start();
$pass=$_POST['pass'];
$use=$_SESSION['Usuario'];
$locacion=$_SESSION['Local'];
date_default_timezone_set('America/Mexico_City');
$Fecha = date('d-m-Y', time());
$nombre=$_SESSION['Nombre completo'];
$puesto=$_SESSION['Puesto'];
/*if($pass!=$_SESSION['Contrasena']){
    echo "<script>alert('Contraseña incorrecta');</script>";
    echo "<script>location.href='../menu_ventas/ventas.php'</script>";
}*/
$res=busqueda($conexion,"carrito","Usuario",$_SESSION['Usuario']);
$insert="";
while($item=$res->fetch(PDO::FETCH_OBJ)){
    $resventas=$conexion->query("INSERT INTO ventas (IMEIICCSKU, Modelo, Marca,Vendedor,Tipo vendedor,Fecha,Locacion,Precio,Financiera) VALUES ('$item->IMEIICCSKU','$item->Modelo','$item->Marca','$nombre','$puesto','$Fecha','$locacion','$item->Precio','$item->FinancieraActivacion')") or die(print($conexion->errorInfo()));
    $resdelete=$conexion->query("DELETE FROM carrito WHERE ID = $item->ID");
}
header("location: ..\menu_ventas/seccionventas.php");
?>