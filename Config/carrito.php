<?php
session_start();
require('conexionbd.php');
require('metodosbd.php');

$usuario=$_SESSION['Usuario'];
$volver=getenv('HTTP_REFERER');

$id=$_POST['ID'];
$tipo=articulo($_GET['tipo']);
$financiera=$_POST['proveedor'];
$precioInic=intval(0);
$precio=intval($_POST['Precio']);
$columnas=$_GET['tipo'];
$Nombre=$_POST['cliente'];
$CorreoElectronico=$_POST['correo'];
$NumeroTelefono=$_POST['num_tel'];
$Comentarios=$_POST['comentarios'];

if($financiera == "Seleccionar..."||$financiera == ""||$financiera == " "){
    echo '<script>alert("Por favor, selecciona informaci\u00F3n v\u00E1lida de FINANCIERA, ACTIVACI\u00D3N O COMPA\u00D1\u00CDA.")</script> ';
    echo "<script>location.href='$volver'</script>";
}else if($tipo=="recarga"||$tipo=="servicio"){
    insertar_carrito($conexion,$usuario,$tipo,$precio,$precio,$financiera,$Marca,$Modelo,$columnas,$NumeroTelefono,$Comentarios);
    header("location: ..\menu_ventas/ventas.php");
}else if($articulo=busqueda($conexion,$tipo,$_GET['tipo'],$id)->fetch(PDO::FETCH_OBJ)){
    if(busqueda($conexion,"carrito","IMEIICCSKU",$id)->rowCount()==0){
        $precioInic=intval($_POST['PrecioInicial']);
        if($columnas =='IMEI'){
            insertar_carrito_telefonos($conexion,$usuario,$id,$precioInic,$precio,$financiera,$articulo->Marca,$articulo->Modelo,$tipo,$Nombre,$CorreoElectronico,$NumeroTelefono,$Comentarios);
            header("location: ..\menu_ventas/ventas.php");
        }elseif($columnas=="sims"){
            insertar_carrito_sims($conexion,$usuario,$id,$precioInic,$precio,$financiera,$articulo->Marca,$articulo->Modelo,$tipo,$NumeroTelefono,$Comentarios);
            header("location: ..\menu_ventas/ventas.php");
        }else{
            insertar_carrito($conexion,$usuario,$id,$precioInic,$precio,$financiera,$articulo->Marca,$articulo->Modelo,$tipo,$NumeroTelefono,$Comentarios);
            header("location: ..\menu_ventas/ventas.php");
        }
    }else{
        echo "<script>alert('El producto ya esta en el carrito, no se puede agregar otra vez.')</script>";
        echo "<script>location.href='../menu_ventas/ventas.php'</script>";  
    }
}else{
    echo "<script>alert('No se encontr\u00F3 el articulo.')</script>";
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

function insertar_carrito($conexion,$usuario,$ID,$precioInic,$precio,$financiera,$Marca,$Modelo,$columnas,$NumeroTelefono,$Comentarios){
    $res=$conexion->query("INSERT INTO carrito (Usuario, IMEIICCSKU, PrecioInicial, Precio, FinancieraActivacion,Marca,Modelo,tipo,Nombre,CorreoElectronico,NumeroTelefono,Comentarios) VALUES ('$usuario','$ID', '$precioInic','$precio','$financiera','$Marca','$Modelo','$columnas',' ',' ',$NumeroTelefono,'$Comentarios') ")or die(print_r($conexion->errorInfo()));
    return $res;
}
function insertar_carrito_telefonos($conexion,$usuario,$ID,$precioInic,$precio,$financiera,$Marca,$Modelo,$columnas,$Nombre,$CorreoElectronico,$NumeroTelefono,$Comentarios){
    $res=$conexion->query("INSERT INTO carrito (Usuario, IMEIICCSKU, PrecioInicial, Precio, FinancieraActivacion,Marca,Modelo,tipo,Nombre,CorreoElectronico,NumeroTelefono,Comentarios) VALUES ('$usuario','$ID', '$precioInic','$precio','$financiera','$Marca','$Modelo','$columnas','$Nombre','$CorreoElectronico','$NumeroTelefono','$Comentarios') ")or die(print_r($conexion->errorInfo()));
    return $res;
}
function insertar_carrito_sims($conexion,$usuario,$ID,$precioInic,$precio,$financiera,$Marca,$Modelo,$columnas,$NumeroTelefono,$Comentarios){
    $res=$conexion->query("INSERT INTO carrito (Usuario, IMEIICCSKU, PrecioInicial, Precio, FinancieraActivacion,Marca,Modelo,tipo,Nombre,CorreoElectronico,NumeroTelefono,Comentarios) VALUES ('$usuario','$ID', '$precioInic','$precio','$financiera','$Marca','$Modelo','$columnas','','',$NumeroTelefono,'$Comentarios') ")or die(print_r($conexion->errorInfo()));
    return $res;
}


?>