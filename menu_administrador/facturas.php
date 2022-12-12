<?php
session_start();
require('../Config/conexionbd.php');
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
    <link rel="shortcut icon" href="../img/logoci.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/estilocomun.css">
    <link rel="stylesheet" href="../css/menus.css">
    <title>Lista de facturas</title>
</head>
<body>
    <nav><button class="btn cerrar" id="cerrar" onclick="location.href='../cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="../menu.php">🏠</a></li>
            <li><a href="administrador.php">Administrador</a></li>
            <li><a href="SeleccionarTipo.php">Compras</a></li>
            <li><a href="listacompras.php">Tipo de factura</a></li>
            <li>Lista de facturas</li>
        </ul>
    </div>
    <div class="contenedor">
        <?php 
        $tipo=$_GET['tipo'];
        $consulta=$conexion->query("SELECT DISTINCT Factura from $tipo");
        while($item=$consulta->fetch(PDO::FETCH_OBJ)){?>
            <button class="btn ventas" onclick="location.href='verfactura.php?num=<?php echo $item->Factura.'&tipo='.$tipo;?>'">Factura: <?php echo $item->Factura?></button>
        <?php }?>
        
    </div>
</body>
</html>