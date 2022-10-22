<?php
include('conexionbd.php');
session_start();

$user = $_POST['user'];
$pass = $_POST['pass'];
$_SESSION['Usuario'] = "";
$_SESSION['Contraseña'] = "";

//buscar usuario
$res = $conexion->prepare("SELECT * FROM usuarios WHERE Usuario='$user' AND Contraseña='$pass'") or die(print($conexion->errorInfo()));
$res->execute();

//asignamos el valor en una variable, si es 0 no existe
if ($res->rowCount() == 1) {
    $row = $res->fetch();
    $_SESSION['ID'] = $row['ID'];
    $_SESSION['Nombre'] = $row['Nombre'];
    $_SESSION['Apellidos'] = $row['Apellidos'];
    $_SESSION['Usuario'] = $row['Usuario'];
    $_SESSION['Contraseña'] = $row['Contraseña'];
    $_SESSION['Puesto'] = $row['Puesto'];
    $_SESSION['Local'] = $row['Local'];
    if ($row['Puesto'] == "vendedor") {
        header('location: ..\abrircaja.php');
    } else {
        header('location: ..\menu.php');
    }
} else {
    echo '<script>alert("Usuario o contrase\u00F1a incorrectos.")</script> ';
    echo "<script>location.href='../index.html'</script>";
    // header('location:..\index.html');
}
?>