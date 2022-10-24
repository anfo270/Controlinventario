<?php
include('conexionbd.php');

$Nombre=$_POST['Nombre'];
$Apellidos=$_POST['Apellidos'];
$Contraseña=$_POST['Contraseña'];
$puesto=$_POST['Puesto'];
$Local=$_POST['Local'];
    $res=$conexion->prepare("INSERT INTO usuarios (Nombre, Apellidos, Usuario, Contraseña, Puesto,Local) 
                        VALUES ($Nombre ,$Apellidos ,$Contraseña ,$puesto ,$Local);") or die(print($conexion->errorInfo()));
    $res->bindParam(:Nombre,$Nombre);
    if(!$res){
        echo "<script>alert('Se agrego el Usuario');</script>"; 
        echo "<script>location.href='../menu_administrador/Usuarios.php'</script>";
    }else{
        // echo "<script>alert('No se agrego el usuario');</script>";
        // echo "<script>location.href='../menu_administrador/Usuarios.php'</script>";
    }
?>