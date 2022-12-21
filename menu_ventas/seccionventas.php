<?php
session_start();
include ('../Config/metodosbd.php');
include('../Config/conexionbd.php');
include('../Config/infoCarrito.php');
if(!isset($_SESSION['Usuario'])&& !isset( $_SESSION['Contrasena'])){
    header('location: ../index.php');
}
$usu = $_SESSION['Usuario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="
    <?php 
    if($cant_carrito>0){
            echo "../img/logoci_not2.png";
        }else{
            echo "../img/logoci.png";
        }
        ?>
    " type="image/x-icon">
    <link rel="stylesheet" href="../css/estilocomun.css">
    <link rel="stylesheet" href="../css/menus.css">
    <title>Ventas<?php if($cant_carrito>0){ echo " (".$cant_carrito.")"; } ?></title>
</head>
<body>
    <nav><button class="btn cerrar caja" onclick="location.href='cerrarcaja.php'">Cerrar Caja</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="../menu.php">🏠</a></li>
            <li><a href="seccionventas.php">Ventas</a></li>
        </ul>
    </div>
    <div class="carrito">
        <?php
            echo $edoCarrito;
        ?>
    </div>
    
    <div class="contenedor-ventas">
        <button class="btn telefon" onclick="location.href='telefonventa.php'">Tel&eacute;fonos</button>
        <button class="btn sims" onclick="location.href='simsventa.php'">SIMS CARDS</button>
        <button class="btn accesorio" onclick="location.href='accesorioventa.php'">Accesorio</button>
        <button class="btn recarga btn_blue" onclick="location.href='recargaventa.php'">Recarga</button>
        <button class="btn servicios btn_blue" onclick="location.href='serviciosventas.php'">Pago de servicio</button>
    </div> 
</body>
</html>
