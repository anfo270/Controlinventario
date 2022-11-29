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
function tip($tipo){

    $tipos=array(
        "telefonos"=>"IMEI",
        "accesorio"=>"SKU",
        "sims"=>"ICC",
    );
    return $tipos[$tipo];
}
/*if($pass!=$_SESSION['Contrasena']){
    echo "<script>alert('Contraseña incorrecta');</script>";
    echo "<script>location.href='../menu_ventas/ventas.php'</script>";
}*/
$res=busqueda($conexion,"carrito","Usuario",$_SESSION['Usuario']);
$insert="";
while($item=$res->fetch(PDO::FETCH_OBJ)){
    $id=tip($item->tipo);
    $resventas=$conexion->query("INSERT INTO ventas (IMEIICCSKU, Modelo, Marca,Vendedor,TipoVendedor,Fecha,Locacion,Precio,Financiera,Nombre,Correo,NumeroTelefono,Comentarios) VALUES ('$item->IMEIICCSKU','$item->Modelo','$item->Marca','$nombre','$puesto','$Fecha','$locacion','$item->Precio','$item->FinancieraActivacion','$item->Nombre', '$item->CorreoElectronico',$item->NumeroTelefono,'$item->Comentarios')") or die(print_r($conexion->errorInfo()));
    $borrar=$conexion->query("DELETE FROM $item->tipo WHERE $id=$item->IMEIICCSKU");
    $resdelete=$conexion->query("DELETE FROM carrito WHERE ID = $item->ID");
}
header("location: ..\menu_ventas/seccionventas.php");
?>