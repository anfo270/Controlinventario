<?php
session_start();
if(!isset($_SESSION['Usuario'])&& !isset( $_SESSION['Contrasena'])){
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
    <link rel="shortcut icon" href="../img/logoci.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/estilocomun.css">
    <link rel="stylesheet" href="../css/menus.css">
    <title>Compras</title>
</head>
<body>
    <nav><button class="btn cerrar" id="cerrar" onclick="location.href='../cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="../menu.php">🏠</a></li>
            <li><a href="administrador.php">Administrador</a></li>
            <li>Compras</li>
        </ul>
    </div>
    <div class="contenedor">
        <button class="btn" onclick="location.href='compras.php?tipo=sims'">Sims</button>
        <button class="btn" onclick="location.href='compras.php?tipo=telefonos'">Teléfonos</button>
        <button class="btn ventas" onclick="location.href='compras.php?tipo=accesorio'">Accesorio</button>
        <button class="btn ventas" onclick="location.href='listacompras.php'">Facturas</button>
    </div>
</body>
</html>