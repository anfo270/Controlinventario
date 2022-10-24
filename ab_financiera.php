<?php
session_start();
if (!isset($_SESSION['Usuario']) && !isset($_SESSION['Contraseña'])) {
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
    <title>Alta y Baja de financieras</title>
</head>
<body>
    <nav><button class="btn cerrar" id="cerrar" onclick="location.href='cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="menu.php">Men&uacute;</a></li>
            <li><a href="sistema.php">Sistema</a></li>
            <li>Financiera</li>
        </ul>
    </div>
    <div class="contenedor">
        <h1>Agregar financiera</h1>
        <form method="POST" action="afin.php">
            <input name="tipoAlta" value="financiera" hidden>
        </form>
        <h1>Eliminar financiera</h1>
    </div>
</body>
</html>