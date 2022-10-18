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
    <nav><button class="btn cerrar caja" onclick="location.href='cerrarcaja.php'">Cerrar Caja</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="contenedor">
            <label for="">
                <p>IMEI:<input type="text" name="IMEI" id="IMEI" class="boxtext" required></p>
            </label>
            <label for="">
                <p>Marca: </p><p>Samsung</p>
            </label>
            <label for="">
                <p>Modelo: </p><p>Galaxy A23</p>
            </label>
            <label>
                <p class="precio">Precio:</p><p>$ 6599</p>
            </label>
            <div class="botones">
                <button class="btn">Agregar producto</button>
                <button class="btn" onclick="location.href='ventas.php'">Vender</button>
                <button class="btn cancelar" onclick="location.href='seccionventas.php'">Cancelar</button>
            </div>
    </div>
</body>

</html>
