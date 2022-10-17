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
    <title>Secci&oacute;n de ventas</title>
</head>
<body>
    <nav><button class="btn cerrar" onclick="location.href='cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="contenedor">
        <button class="btn telefon" onclick="location.href='telefonventa.php'">Tel&eacute;fonos</button>
        <button class="btn sims" onclick="location.href='simsventa.php'">SIMS CARDS</button>
        <button class="btn recarga" onclick="location.href='recargaventa.php'">Recarga</button>
        <button class="btn accesorio" onclick="location.href='accesorioventa.php'">Accesorio</button>
        <button class="btn servicios" onclick="location.href='serviciosventas.php'">Servicio</button>
    </div> 
</body>
</html>
