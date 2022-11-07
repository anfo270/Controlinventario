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
    <title>Accesorio</title>
    <script src="../javascript/datosaccesorio.js"></script>
    <script src="../javascript/script.js"></script>
</head>

<body>
    <nav><button class="btn cerrar caja" onclick="location.href='cerrarcaja.php'">Cerrar Caja</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="../menu.php">🏠</a></li>
            <li><a href="seccionventas.php">Ventas</a></li>
            <li>Accesorio</li>
        </ul>
    </div>
    <form class="contenedor" action="../Config/carrito.php?tipo=SKU" method="post">
        <label  >
            <p>SKU:<input type="text" name="ID" id="ID" class="boxtext SKU"  onkeypress="pulsar('ID');"  required></p>
        </label>
        <label>
            <p>Marca: </p><p id="Marca"></p>
        </label>
        <label>
            <p>Modelo: </p><p id="Modelo"></p>
        </label>
        <label>
            <p>Precio:<input type="text" name="Precio" id="precio" class="boxtext" required></p>
        </label>
        <div class="botones">
            <button class="btn cancelar" type="reset">Cancelar</button>
            <button class="btn" type="submit">Vender</button>
        </div>
    </form>
</body>

</html>