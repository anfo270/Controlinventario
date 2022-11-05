<?php
session_start();
if(!isset($_SESSION['Usuario'])&& !isset( $_SESSION['Contraseña'])){
    header('location: index.php');
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
    <link rel="stylesheet" href="../css/ventas.css">
    <title>Men&uacute;</title>
</head>
<body>
    <nav><button class="btn cerrar" id="cerrar" onclick="location.href='../cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="../menu.php">🏠</a></li>
            <li><a href="administrador.php">Administrador</a></li>
            <li>Cobranza</li>
        </ul>
    </div>
    <form class="contenedor" action="../Config/inventaroppvd.php?señal=3" method="post">
        <h1>Seleccionar la fecha</h1>
        <input type="date" name="date" id="date" required pattern="\d{4}/\d{2}/\d{2}"   >
        <div class="botones">
            <button class="btn cancelar"type="reset">Cancelar</button>
            <button class="btn"type="submit">Aceptar</button>
        </div>
    </form>
</body>
</html>