<?php
require('../Config/conexionbd.php');
require('../Config/metodosbd.php');
session_start();

if(!isset($_SESSION['Usuario'])&& !isset( $_SESSION['Contrasena'])){
    header('location: ../index.php');
}
$usu = $_SESSION['Usuario'];
$modelo=$_POST['modelo'];
$modelo_buscar=str_replace('+',' ',$modelo);
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
    <title>Men&uacute; inventario</title>
</head>
<body>
    <nav><button class="btn cerrar" onclick="location.href='../cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="../menu.php">🏠</a></li>
            <li><a href="inventario.php">Responsable</a></li>
            <li><a href="reporte.php">Reporte</a></li>
            <li>Consulta</li>
        </ul>
    </div>
    <div class="contenedor">
        <h1>Consulta '<?php echo $modelo ?>'</h1>
        <?php ?>
        <table>
            <tr>
                <td class="titulo">Modelo</td>
                <td class="titulo">Locación</td>
                <td class="titulo">Cantidad</td>
            </tr>
        </table>
        <table>
            <?php 
            $locacion=consulta($conexion,"locacion");
            while($item=$locacion->fetch(PDO::FETCH_OBJ)){
                $telefono=$conexion->query("SELECT COUNT(*) FROM telefonos WHERE Locacion='$item->Nombre' AND Modelo='$modelo_buscar'") or die(print_r($conexion->errorInfo()));
                $contado=$telefono->fetch();
                ?>

                <tr>
                    <td><?php echo $modelo?></td>
                    <td><?php echo $item->Nombre?></td>
                    <td><?php echo $contado['COUNT(*)']?></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>