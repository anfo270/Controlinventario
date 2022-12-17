<?php
include('conexionbd.php');
include('metodosbd.php');

session_start();

$user = $_POST['user'];
$pass = $_POST['pass'];
$_SESSION['Usuario'] = "";
$_SESSION['Contrasena'] = "";

//buscar usuario
$res = $conexion->prepare("SELECT * FROM usuarios WHERE Usuario='$user' AND Contrasena='$pass'") or die(print_r($conexion->errorInfo()));
$res->execute();

//asignamos el valor en una variable, si es 0 no existe
if ($res->rowCount() == 1) {
    $row = $res->fetch();
    $_SESSION['ID'] = $row['ID'];
    $_SESSION['Nombre'] = $row['Nombre'];
    $_SESSION['Apellido_Paterno'] = $row['Apellido_Paterno'];
    $_SESSION['Apellido_Materno']=$row['Apellido_Materno'];
    $_SESSION['Nombre completo']=$row['Apellido_Paterno']." ".$row['Apellido_Materno']." ".$row['Nombre'];
    $_SESSION['Usuario'] = $row['Usuario'];
    $_SESSION['Contrasena'] = $row['Contrasena'];
    $_SESSION['Puesto'] = $row['Puesto'];
    $_SESSION['Local'] = $row['Local'];

    insertar_log($conexion,$FechaHora,$_SESSION['Nombre completo'],$direccionProtocol,'Inicio de sesion.','NOTIFICACION');

    if($user==$_SESSION['Usuario'] && $pass==$_SESSION['Contrasena']){

        if ($row['Puesto'] == "especialista"||$row['Puesto'] == "ESPECIALISTA"||$row['Puesto'] == "preingreso"||$row['Puesto'] == "PREINGRESO") {
            header('location: ..\menu_ventas/abrircaja.php');
        } else if ($row['Puesto'] == "RESPONSABLE"||$row['Puesto'] == "COORDINADOR") {
            header('location: ..\menu.php');
        } else if ($row['Puesto'] == "ADMINISTRADOR") {
            header('location: ..\menu_administrador/administrador.php');
        }else if ($row['Puesto'] == "SISTEMAS") {
            header('location: ..\menu_sistema/sistema.php');
        }
        else {
            header('location: ../menu.php');
        }
    }

} else {
    echo '<script>alert("Usuario o contrase\u00F1a incorrectos.")</script> ';
    echo "<script>location.href='../index.php'</script>";
}
?>