<?php
include('conexionbd.php');

$Nombre=$_POST['Nombre'];
$Apellido_Paterno=$_POST['Apellido_Paterno'];
$Apellido_Materno=$_POST['Apellido_Materno'];
$Contrasena=$_POST['Contrasena'];
$puesto=$_POST['Puesto'];
$Local=$_POST['Local'];
$Usuario=$_POST['Usuario_Empleado'];
//$Usuario=$Nombre." ".$Apellido_Paterno;

if($_GET['identificador']==1){
    $insertar=insert($Nombre,$Apellido_Paterno,$Apellido_Materno,$Contrasena,$puesto,$Local,$Usuario,$conexion);
    if($insertar){
        echo "<script>alert('Se agrego el Usuario');</script>"; 
        echo "<script>location.href='../menu_administrador/Usuarios.php'</script>";
    }else{
        echo "<script>alert('No se agrego el usuario');</script>";
        echo "<script>location.href='../menu_administrador/Usuarios.php'</script>";
    }
}

if($_GET['identificador']==2){
    $id_use=$_GET['id'];
    //revisar
    $actualizar=actualizar($Nombre,$Apellido_Paterno,$Apellido_Materno,$Contrasena,$puesto,$Local,$Usuario,$conexion,$id_use);
    if($actualizar){
        echo "<script>alert('Se modifico el Usuario');</script>"; 
        echo "<script>location.href='../menu_administrador/Usuarios.php'</script>";
    }else{
        echo "<script>alert('No se modifico el usuario');</script>";
        echo "<script>location.href='../menu_administrador/Usuarios.php'</script>";
    }
}else{
    echo "<script>alert('No se pudo realizar ninguno de los cambios.');</script>"; 
        echo "<script>location.href='../menu_administrador/Usuarios.php'</script>";
}


function actualizar($Nombre,$Apellidos_Paterno,$Apellido_Materno,$Contrasena,$puesto,$Local,$Usuario,$conexion,$id_use){
    $res="UPDATE usuarios SET Nombre='$Nombre' , Apellido_Paterno='$Apellidos_Paterno', Apellido_Materno='$Apellido_Materno' ,  Usuario='$Usuario',
                            Contrasena='$Contrasena' ,  Puesto='$puesto' ,  Local='$Local' WHERE ID='$id_use'" ;
    $res=$conexion->query($res) or die(print_r($conexion->errorInfo()));
    return $res;
}

function insert($Nombre,$Apellido_Paterno,$Apellido_Materno,$Contrasena,$puesto,$Local,$Usuario,$conexion){
    $res="INSERT INTO usuarios  (  Nombre ,  Apellido_Paterno, Apellido_Materno ,  Usuario ,  Contrasena ,  Puesto ,  Local ) 
    values ( '$Nombre' , '$Apellido_Paterno','$Apellido_Materno' , '$Usuario' , '$Contrasena' , '$puesto' , '$Local' )";
    $res=$conexion->query($res) or die(print_r($conexion->errorInfo()));
    return $res;
}

?>