<?php
session_start();
if(!isset($_SESSION['Usuario'])&& !isset( $_SESSION['Contraseña'])){
    header('location: index.html');
}
$usu = $_SESSION['Usuario']
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logoci.png" type="image/x-icon">
    <link rel="stylesheet" href="css/estilocomun.css">
    <link rel="stylesheet" href="css/menus.css">
    <title>Men&uacute;</title>
</head>
<body>
    <nav><button class="btn cerrar" onclick="location.href='cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="contenedor">
        <button class="btn inventario" onclick="location.href='inventario.php'">FINANCIERAS</button>
        <button class="btn administrador" onclick="location.href='administrador.php'">MARCAS</button>
        <button class="btn administrador" onclick="location.href='sistema.php'">TIPO DE ACTIVACION</button>
        <button class="btn administrador" onclick="location.href='sistema.php'">LOCACION</button>
        <button class="btn administrador" onclick="location.href='sistema.php'">PROVEEDOR</button>
        <button class="btn cerrar" onclick="location.href='abrircaja.php'">Reseteo general</button>
    </div>
</body>
</html>