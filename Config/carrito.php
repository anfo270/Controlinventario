<?php
session_start();
require('conexionbd.php');
require('metodosbd.php');

$usuario=$_SESSION['Usuario'];
$id=$_POST['ID'];
$tipo=articulo($_GET['tipo']);
$financiera=$_POST['proveedor'];
$precioInic=intval(0);
$precio=intval($_POST['Precio']);
$columnas=$_GET['tipo'];

if($tipo=="recarga"||$tipo=="servicio"){
    insertar_carrito($conexion,$usuario,$tipo,$precio,$precio,$financiera,$Marca,$Modelo,$columnas);
    header("location: ..\menu_ventas/ventas.php");
}else if($articulo=busqueda($conexion,$tipo,$_GET['tipo'],$id)->fetch(PDO::FETCH_OBJ)){
    if(busqueda($conexion,"carrito","IMEIICCSKU",$id)->rowCount()==0){
        $precioInic=intval($_POST['PrecioInicial']);
        insertar_carrito($conexion,$usuario,$id,$precioInic,$precio,$financiera,$articulo->Marca,$articulo->Modelo,$tipo);
        header("location: ..\menu_ventas/ventas.php");
        
    }else{
        echo "<script>alert('El producto ya esta en el carrito, no se puede agregar otra vez.')</script>";
        echo "<script>location.href='../menu_ventas/ventas.php'</script>";  
    }
}else{
    echo "<script>alert('No se encontró el articulo.')</script>";
    echo "<script>location.href='../menu_ventas/seccionventas.php'</script>";
}


function articulo($nombre){
    $articulos=array(
        "IMEI"=>"telefonos",
        "ICC"=>"sims",
        "SKU"=>"accesorio",
        "recarga"=>"recarga",
        "servicio"=>"servicio"
    );
    return $articulos[$nombre];
}

function insertar_carrito($conexion,$usuario,$ID,$precioInic,$precio,$financiera,$Marca,$Modelo,$columnas){
    $res=$conexion->query("INSERT INTO carrito (Usuario, IMEIICCSKU, PrecioInicial, Precio, FinancieraActivacion,Marca,Modelo,tipo) VALUES ('$usuario','$ID', '$precioInic','$precio','$financiera','$Marca','$Modelo','$columnas') ")or die(print_r($conexion->errorInfo()));
    return $res;
}

?>