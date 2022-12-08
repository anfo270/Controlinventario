<?php
include('../Config/conexionbd.php');
include('../Config/metodosbd.php');
session_start();
if(!isset($_SESSION['Usuario'])&& !isset( $_SESSION['Contrasena'])){
    header('location: ../index.php');
}
$usu = $_SESSION['Usuario'];
$cant_carrito=0;
$carrito=busqueda($conexion,"carrito","usuario",$usu);
while($item=$carrito->fetch(PDO::FETCH_OBJ)){
    $cant_carrito++;
}
if($cant_carrito>0){
    echo '<script>alert("Por favor, termina la venta que tienes activa (CARRITO).")</script> ';
    echo "<script>location.href='ventas.php'</script>";
}
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
    <title>Cerrar Caja</title>
</head>
<body>
    <nav><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="../menu.php">🏠</a></li>
            <li><a href="seccionventas.php">Ventas</a></li>
            <li>Cerrar caja</li>
        </ul>
    </div>
    <div class="contenedor">
        <button class="btncerrar" onclick="location.href='../cerrar.php'">Cerrar Caja</button>
        <?php
        date_default_timezone_set('America/Denver');
        $Fecha = date('d/m/Y', time());
        $Hora = date('h:i a', time());
        echo "<h3>Fecha:</h3><p id='fecha'>$Fecha</p>";
        echo "<h3>Fecha:</h3><p id='hora'>$Hora</p>";
        ?>
    </div> 
</body>
</html>
