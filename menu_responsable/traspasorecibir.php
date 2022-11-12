<?php
include('../Config/metodosbd.php');
include('../Config/conexionbd.php');
session_start();
if(!isset($_SESSION['Usuario'])&& !isset( $_SESSION['Contraseña'])){
    header('location: index.php');
}
$usu = $_SESSION['Usuario'];
$NumTras=$_POST['numero'];
$res=$conexion->query("SELECT * FROM traspaso WHERE NumTraspaso=$NumTras AND Estado='PENDIENTE DE RECIBIR'") or die(print($conexion->errorInfo()));
$res->execute();
if($res->rowCount()==0){
    echo "<script>alert('No se encontró un traspaso pendiente');</script>";
    echo "<script>location.href='inventario.php';</script>";
}

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

    <title>Traspaso</title>
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
    <form action="../Config/recibirTraspaso.php?Numtraspaso= <?php echo $NumTras;?>" method="POST" class="contenedor">
        <table>
            <tr>
                <td class="titulo">
                    <p>IMEI / ICC / SKU</p>
                </td>
                <td class="titulo">
                    <p>Modelo</p>
                </td>
                <td class="titulo">
                    <p>Marca</p>
                </td>
                <td class="titulo">
                    <p>Locacion destino</p>
                </td>
                <td></td>
            </tr>
        </table>
        <table>
        <?php
        $control=0;
            while($item=$res->fetch(PDO::FETCH_OBJ)){?>
            <tr>
                <td>
                    <p><?php echo $item->IMEIICC;?><input type="text" name="id<?php echo $control;?>" value="<?php echo $item->IMEIICC;?>" hidden></p>
                </td>
                <td>
                    <p><?php echo $item->Modelo;?></p>
                </td>
                <td>
                    <p><?php echo $item->Marca;?></p>
                </td>
                <td>
                    <p><?php echo $item->LocacionDestino;?></p>
                </td>
                <td><input type="checkbox" name="articulo<?php echo $control;?>"> </td>
            </tr>
                
        <?php $control++; }?>
        </table>
        <div class="botones">
            <button class="btn" type="submit">Aceptar</button>
            <button class="btn cancelar" type="reset" onclick="location.href='traspaso.php'">Cancelar</button>
        </div>
    </form>
</body>
</html>