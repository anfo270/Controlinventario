<?php
include('../Config/conexionbd.php');
session_start();
if(!isset($_SESSION['Usuario'])&& !isset( $_SESSION['Contrasena'])){
    header('location: ../index.php');
}
$usu = $_SESSION['Usuario'];
$sucursal = $_SESSION['Local'];
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
    <link rel="stylesheet" href="../css/notifTraspaso.css">
    <?php
    $res=$conexion->prepare("SELECT * from traspaso WHERE LocacionDestino = '$sucursal' AND Estado='PENDIENTE DE RECIBIR'") or die(print_r($conexion->errorInfo()));
    $res->execute();
    if ($res->rowCount() >= 1) {
        echo '<script type="text/javascript" src="../javascript/jsnotificacion.js"></script>';
        echo '<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">';
    }
    ?>
    <title>Men&uacute; inventario</title>
</head>
<body id="info">
    <nav><button class="btn cerrar" onclick="location.href='../cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="../menu.php">🏠</a></li>
            <li>Responsable</li>
        </ul>
    </div>
    <div class="notification">
	    <span class="icon">
	        <i class=""></i>
	    </span>
	    <span class="text"></span>
	    <span class="close"><i class="fa fa-close"></i></span>
	</div>
    <div class="contenedor">
        <button class="btn transpaso" onclick="location.href='traspaso.php'">Traspaso</button>
        <button class="btn inventario" onclick="location.href='reporte.php'">Reporte</button>
        <button class="btn inventario" onclick="location.href='../menu_administrador/cobranza.php?cortecaja=cortecaja'">Corte de caja</button>
        <button class="btn inventario" onclick="location.href='corte.php'">Ventas del d&iacute;a</button>
        <button class="btn inventario" onclick="location.href='usuarios.php'">Usuarios</button>
    </div>
</body>
</html>