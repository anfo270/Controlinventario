<?php
include('conexionbd.php');

$Nombre=$_POST['Nombre'];
$Apellidos=$_POST['Apellidos'];
$Contraseña=$_POST['Contraseña'];
$puesto=$_POST['Puesto'];
$Local=$_POST['Local'];
$ID=NULL;
$Usuario=$Nombre." ".$Apellidos;
    $res="INSERT INTO usuarios  (  Nombre ,  Apellidos ,  Usuario ,  Contraseña ,  Puesto ,  Local ) 
    values ( '$Nombre' , '$Apellidos' , '$Usuario' , '$Contraseña' , '$puesto' , '$Local' )";

    $res=$conexion->query($res) or die(print($conexion->errorInfo()));
    
    // $res->bindParam(':Nombre',$Nombre,PDO::PARAM_STR);
    // $res->bindParam(':Apellidos',$Apellidos,PDO::PARAM_STR);
    // $res->bindParam(':Usuario',$Usuario,PDO::PARAM_STR);
    // $res->bindParam(':Contraseña',$Contraseña,PDO::PARAM_STR);
    // $res->bindParam(':Puesto',$Puesti,PDO::PARAM_STR);
    // $res->bindParam(':Local',$Local,PDO::PARAM_STR);
    // $res->bindParam('NULL',$ID,PDO::PARAM_NULL);
    // $res->execute();

    if($res){
        echo "<script>alert('Se agrego el Usuario');</script>"; 
        echo "<script>location.href='../menu_administrador/Usuarios.php'</script>";
    }else{
        echo "<script>alert('No se agrego el usuario');</script>";
        echo "<script>location.href='../menu_administrador/Usuarios.php'</script>";
    }
?>