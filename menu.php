<?php
session_start();
if(!isset($_SESSION['Usuario']) && !isset( $_SESSION['Contrasena'])){
    header('location: index.php');
}

$enlaceVendedor="'menu_ventas/abrircaja.php'";
$enlaceResponsable="'menu_responsable/inventario.php'";
$enlaceAdmin="'menu_administrador/administrador.php'";
$enlaceSistema="'menu_sistema/sistema.php'";
if ($_SESSION['Puesto'] == "vendedor"||$_SESSION['Puesto'] == "VENDEDOR"||$_SESSION['Puesto'] == "nuevo"||$_SESSION['Puesto'] == "NUEVO") {
    header('location: menu_ventas/abrircaja.php');
} else if ($_SESSION['Puesto'] == "ADMINISTRADOR") {
    header('location: menu_administrador/administrador.php');
}else if ($_SESSION['Puesto'] == "SISTEMAS") {
    header('location: menu_sistema/sistema.php');
}
$usu = $_SESSION['Usuario'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logoci.png" type="image/x-icon">
    <link rel="stylesheet" href="css/estilocomun.css">
    <link rel="stylesheet" href="css/menus.css">
    <title>Men&uacute;</title>
</head>
<body>
    <nav><button class="btn cerrar" onclick="location.href='cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="menu.php">🏠</a></li>
        </ul>
    </div>
    <div class="contenedor">
        <?php
        if ($_SESSION['Puesto'] == "responsable"||$_SESSION['Puesto'] == "RESPONSABLE"||$_SESSION['Puesto'] == "COORDINADOR") {
            echo '<button class="btn ventas" onclick="location.href=' . $enlaceVendedor . '">Vendedor</button>';
            echo '<button class="btn inventario" onclick="location.href=' . $enlaceResponsable . '">Responsable</button>';
        }else{
            echo '<button class="btn ventas" onclick="location.href=' . $enlaceVendedor . '">Vendedor</button>';
            echo '<button class="btn inventario" onclick="location.href=' . $enlaceResponsable . '">Responsable</button>';
            echo '<button class="btn inventario" onclick="location.href=' . $enlaceAdmin . '">Administrador</button>';
            echo '<button class="btn inventario" onclick="location.href=' . $enlaceSistema . '">Sistema</button>';
        }
        ?>
        <!--<button class="btn ventas" onclick="location.href='menu_ventas/abrircaja.php'">Vendedor</button>
        <button class="btn inventario" onclick="location.href='menu_responsable/inventario.php'">Responsable</button>
        <button class="btn administrador" onclick="location.href='menu_administrador/administrador.php'">Administrador</button>
        <button class="btn administrador" onclick="location.href='menu_sistema/sistema.php'">Sistema</button>-->
    </div>
</body>
</html>