<?php
include('../Config/metodosbd.php');
include('../Config/conexionbd.php');
session_start();
if (!isset($_SESSION['Usuario']) && !isset($_SESSION['Contrasena'])) {
    header('location: ../index.php');
}
$usu = $_SESSION['Usuario'];
$num=$_POST['num'];
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
    <title>Traspaso #<?PHP echo $num;?></title>
</head>

<body>

    <nav><button class="btn cerrar" id="cerrar" onclick="location.href='../cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="../menu.php">🏠</a></li>
            <li><a href="administrador.php">Administrador</a></li>
            <li><a href="SeleccionarTipotraspaso.php">Traspasos</a></li>
            <li><a href="vertraspasos.php">Ver traspasos</a></li>
            <li>Traspaso #<?PHP echo $num;?></li>
        </ul>
    </div>
    <div class="contenedor">
        <table>
            <tr>
                <td class="titulo">Tipo</td>
                <td class="titulo">IMEI/ICC/SKU</td>
                <td class="titulo">Locacion Actual</td>
                <td class="titulo">Locacion destino</td>
                <td class="titulo"> Fecha de traspaso</td>
                <td class="titulo">Estado</td>
            </tr>
        </table>
        <?php
        //$num=$_GET['num'];
        $res = $conexion->query("SELECT * FROM traspaso WHERE NumTraspaso=$num");
        while ($item = $res->fetch(PDO::FETCH_OBJ)) { 
            ?>

                <table class="bordes-corte">
                    <tr><?php $id=$item->ID; ?>
                        <td class="bordes-corte"><?php echo $item->tipo; ?></td>
                        <td><?php echo $item->IMEIICC; ?></td>
                        <td><?php echo $item->LocacionActual; ?></td>
                        <td><?php echo $item->LocacionDestino; ?></td>  
                        <td><?php echo $item->FechaTraspaso; ?></td>
                        <td><?php echo $item->Estado; ?></td>
                </table>

        <?php } ?>
        
    </div>
</body>

</html>