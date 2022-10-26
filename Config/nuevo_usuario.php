<?php
include('conexionbd.php');

$Nombre=$_POST['Nombre'];
$Apellidos_Paterno=$_POST['Apellido_Paterno'];
$Apellido_Materno=$_POST['Apellido_Materno'];
$Contraseña=$_POST['Contraseña'];
$puesto=$_POST['Puesto'];
$Local=$_POST['Local'];
$Usuario=$Nombre." ".$Apellidos_Paterno;
    $res="INSERT INTO usuarios  (  Nombre ,  Apellido_Paterno, Apellido_Materno ,  Usuario ,  Contraseña ,  Puesto ,  Local ) 
    values ( '$Nombre' , '$Apellidos_Paterno','$Apellido_Materno' , '$Usuario' , '$Contraseña' , '$puesto' , '$Local' )";

    $res=$conexion->query($res) or die(print($conexion->errorInfo()));
    if($res){
        echo "<script>alert('Se agrego el Usuario');</script>"; 
        echo "<script>location.href='../menu_administrador/Usuarios.php'</script>";
    }else{
        echo "<script>alert('No se agrego el usuario');</script>";
        echo "<script>location.href='../menu_administrador/Usuarios.php'</script>";
    }
?>