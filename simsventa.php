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
    <link rel="stylesheet" href="css/ventas.css">
    <title>Tel&eacute;fono</title>
</head>

<body>
    <nav><button class="btn cerrar" onclick="location.href='cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="contenedor">
            <label for="">
                <p>ICC:<input type="text" name="IMEI" id="IMEI" class="boxtext" required></p>
            </label>
            <label for="">
                <p>Marca: </p><p>Movistar</p>
            </label>
            <label for="">
                <p>DN: </p><p>6568214595</p>
            </label>
            <label for="">
                <p>Precio:<input type="text" name="precio" id="precio" class="boxtext" required></p>
            </label>
            <div class="botones">
                <button class="btn">Agregar producto</button>
                <button class="btn" onclick="location.href='ventas.php'">Vender</button>
                <button class="btn cancelar" onclick="location.href='seccionventas.php'">Cancelar</button>
            </div>
    </div>
</body>

</html>