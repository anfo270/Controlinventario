<?php
include('../Config/metodosbd.php');
include('../Config/conexionbd.php');
session_start();
if (!isset($_SESSION['Usuario']) && !isset($_SESSION['Contrasena'])) {
    header('location: ../index.php');
}
$usu = $_SESSION['Usuario'];
function tip($ti){
    $tips=array(
        "telefonos"=>"IMEI",
        "accesorio"=>"SKU",
        "sims"=>"ICC",
    );
    return $tips[$ti];
    } 
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logoci.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/estilocomun.css">
    <link rel="stylesheet" href="../css/menus.css">
    <link rel="stylesheet" href="../css/reporte.css">
    <link rel="stylesheet" href="../css/popup.css">
    <title>Usuario</title>
</head>

<body>

    <nav><button class="btn cerrar" id="cerrar" onclick="location.href='../cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="../menu.php">🏠</a></li>
            <li><a href="administrador.php">Administrador</a></li>
            <li>Lista traspaso</li>
        </ul>
    </div>
    <div class="contenedor">
        <table>
            <tr>
                <td class="titulo">Tipo</td>
                <td class="titulo">IMEI/ICC/SKU</td>
                <td class="titulo">Marca</td>
                <td class="titulo">Modelo</td>
                <td class="titulo">Locación</td>
                <td class="titulo">Fecha de ingreso</td>
            </tr>
        </table>
        <?php
        $tipo=$_GET['tipo'];
        $num=$_GET['num'];
        $el=tip($tipo);
        $res = $conexion->query("SELECT * FROM $tipo WHERE Factura=$num");
        while ($item = $res->fetch(PDO::FETCH_OBJ)) { 
            ?>
                <table class="bordes">
                        <td><?php echo $tipo; ?></td>
                        <td><?php echo $item->$el; ?></td>
                        <td><?php echo $item->Marca; ?></td>
                        <td><?php echo $item->Modelo; ?></td>
                        <td><?php echo $item->Locacion; ?></td>  
                        <td><?php echo $item->FechaIngreso; ?></td>
                        
                </table>

        <?php } ?>
        
    </div>
</body>

</html>