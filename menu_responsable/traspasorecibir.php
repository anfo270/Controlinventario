<?php
include('../Config/metodosbd.php');
include('../Config/conexionbd.php');
session_start();
if(!isset($_SESSION['Usuario'])&& !isset( $_SESSION['Contraseña'])){
    header('location: index.php');
}
$usu = $_SESSION['Usuario'];
$NumTras=$_POST['numero'];
$res=busqueda($conexion,"traspaso","NumTraspaso",$NumTras);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logoci.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/estilocomun.css">
    <link rel="stylesheet" href="../css/reporte.css">

    <title>Men&uacute; inventario</title>
</head>
<body>
    <nav><button class="btn cerrar" onclick="location.href='cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="../menu.php">🏠</a></li>
            <li><a href="inventario.php">Responsable</a></li>
            <li>Traspaso</li>
        </ul>
    </div>
    <div class="contenedor">
        <?php
        
        ?>
        <div class="botones">
            <button class="btn">Aceptar</button>
            <button class="btn cancelar" onclick="location.href='traspaso.php'">Cancelar</button>
        </div>
    </div>
</body>
</html>