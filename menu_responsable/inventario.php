<?php
session_start();
if(!isset($_SESSION['Usuario'])&& !isset( $_SESSION['Contraseña'])){
    header('location: ../index.php');
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
    <link rel="stylesheet" href="../css/estilocomun.css">
    <link rel="stylesheet" href="../css/menus.css">
    <title>Men&uacute; inventario</title>
</head>
<body>
    <nav><button class="btn cerrar" onclick="location.href='../cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="../menu.php">🏠</a></li>
            <li>Responsable</li>
        </ul>
    </div>
    <div class="contenedor">
        <button class="btn transpaso" onclick="location.href='traspaso.php'">Traspaso</button>
        <button class="btn inventario" onclick="location.href='reporte.php'">Reporte</button>
        <button class="btn inventario" onclick="location.href='../menu_administrador/cobranza.php?cortecaja=cortecaja'">Corte de caja</button>
        <button class="btn inventario" onclick="location.href='usuarios.php'">Usuarios</button>
    </div>
</body>
</html>