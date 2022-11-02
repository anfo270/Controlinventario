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
    <title>Tel&eacute;fono</title>
    <script src="../javascript/datosaccesorio.js"></script>
    <script src="../javascript/script.js"></script>
</head>

<body>
    <nav><button class="btn cerrar caja" onclick="location.href='cerrarcaja.php'">Cerrar Caja</button><?PHP echo "<p>$usu</p>" ?></nav>
    <form class="contenedor" action="../Config/carrito.php?tipo=SKU" method="post">
        <label for="">
            <p>SKU:<input type="text" name="ID" id="ID" class="boxtext SKU"  onkeypress="pulsar('SKU')"  required></p>
        </label>
        <label for="">
            <p>Marca: </p><p id="Marca"></p>
        </label>
        <label for="">
            <p>Descripcion: </p><p id="Descripcion"></p>
        </label>
        <label for="">
            <p>Precio:<input type="text" name="Precio" id="precio" class="boxtext" required></p>
        </label>
        <div class="botones">
            <button class="btn">Agregar producto</button>
            <button class="btn" type="submit">Vender</button>
            <button class="btn cancelar" onclick="location.href='seccionventas.php'" >Cancelar</button>
        </div>
    </form>
</body>

</html>