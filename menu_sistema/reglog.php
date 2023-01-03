<?php
include('../Config/conexionbd.php');
include('../Config/metodosbd.php');
session_start();
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
    <link rel="stylesheet" href="../css/reporte.css">
    <title>Registro de eventos</title>
</head>
<body>
    <nav><button class="btn cerrar" id="cerrar" onclick="location.href='../cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="../menu.php">🏠</a></li>
            <li><a href="sistema.php">Sistema</a></li>
            <li>Registro de eventos</li>
        </ul>
    </div>
    <div class="contenedor">
        <h2>Registro de eventos</h2>
        <table class="">
            <tr>
                <th class="titulo">ID</th>
                <th class="titulo">Fecha y hora</th>
                <th class="titulo">Empleado</th>
                <th class="titulo">Ubicaci&oacute;n</th>
                <th class="titulo">Movimiento</th>
                <th class="titulo">Gravedad</th>
            </tr>
        </table>
        <?php
        $trapasos=$conexion->query("SELECT * FROM reglog ORDER BY ID DESC LIMIT 600") or die(print_r($conexion->errorInfo()));
        while ($item = $trapasos->fetch(PDO::FETCH_OBJ)) { 
            ?>
            <table class="bordes-corte">
                <tr>
                    <td class="bordes-corte"><?php echo $item->ID; ?></td>
                    <td><?php echo $item->Fecha; ?></td>
                    <td><?php echo $item->Usuario; ?></td>
                    <td><?php echo $item->Direccion; ?></td>
                    <td><?php echo $item->Movimiento; ?></td>
                    <td><?php echo $item->Gravedad; ?></td>
                </tr>
            </table>
        <?php } ?>
    </div>
</body>
</html>