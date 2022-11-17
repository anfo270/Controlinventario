<?php
include('../Config/metodosbd.php');
include('../Config/conexionbd.php');
session_start();
if (!isset($_SESSION['Usuario']) && !isset($_SESSION['Contraseña'])) {
    header('location: index.php');
}
$usu = $_SESSION['Usuario'];
$local = $_SESSION['Local'];
date_default_timezone_set('America/Mexico_City');
$fecha = date('d-m-Y', time());
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logoci.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/estilocomun.css">
    <link rel="stylesheet" href="../css/reporte.css">
    <link rel="stylesheet" href="../css/popup.css">
    <title>Corte</title>
</head>

<body>
    <nav><button class="btn cerrar" id="cerrar" onclick="location.href='../cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="../menu.php">🏠</a></li>
            <li><a href="inventario.php">Responsable</a></li>
            <li>Corte</li>
        </ul>
    </div>
    <div class="contenedor">
        <h1>Ventas realizadas hoy</h1>
        <p>Fecha: <?php echo $fecha; ?></p>
        <button class="btn" onclick="location.href='../menu_administrador/cobranza.php?cortecaja=cortecaja'">Generar reporte</button>
        <table>
            <tr>
                <th class="titulo">IMEI / ICC / PKU</th>
                <th class="titulo">Marca</th>
                <th class="titulo">Modelo</th>
                <th class="titulo">Precio</th>
                <th class="titulo">Financiera</th>
                <th class="titulo">N&uacute;mero</th>
                <th class="titulo">Vendedor</th>
                <th class="titulo">Local</th>
                <th class="titulo">Fecha</th>
            </tr>
        </table>

        <?php
        $res = busqueda($conexion,"ventas", "Locacion",$local."' AND Fecha='$fecha");
        while ($item = $res->fetch(PDO::FETCH_OBJ)) { 
            ?>
                <table class="bordes-corte">
                    <tr><?php $id=$item->ID; ?>
                        <td class="bordes-corte"><?php echo $item->IMEIICCSKU; ?></td>
                        <td><?php echo $item->Marca; ?></td>
                        <td><?php echo $item->Modelo; ?></td>
                        <td><?php echo $item->Precio; ?></td> 
                        <td><?php echo $item->Financiera; ?></td> 
                        <td><?php echo $item->NumeroTelefono; ?></td>
                        <td><?php echo $item->Vendedor; ?></td>
                        <td><?php echo $item->Locacion; ?></td>
                        <td><?php echo $item->Fecha; ?></td>
                    </tr>
                </table>

        <?php } ?>
    </div><br><br><br>
</body>

</html>