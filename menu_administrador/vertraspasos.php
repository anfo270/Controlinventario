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
    <link rel="stylesheet" href="../css/menus.css">
    <link rel="stylesheet" href="../css/reporte.css">
    <title>Ver traspasos</title>
</head>
<body>
    <nav><button class="btn cerrar" id="cerrar" onclick="location.href='../cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="../menu.php">🏠</a></li>
            <li><a href="administrador.php">Administrador</a></li>
            <li><a href="SeleccionarTipotraspaso.php">Traspasos</a></li>
            <li>Ver traspasos</li>
        </ul>
    </div>
    <div class="contenedor">
        <div class="formSistema"><br><center>
        <h2 style="color: #00047F">Selecciona el n&uacute;mero de traspaso</h2>
        <form action="listatrapaso.php" method="GET">
            <select name="num" class="input" style="font-size: 17px">
                <?php
                $trapasos=$conexion->query("SELECT DISTINCT NumTraspaso from traspaso ORDER BY NumTraspaso DESC") or die(print_r($conexion->errorInfo()));
                while($item=$trapasos->fetch(PDO::FETCH_OBJ)){
                    echo "<option value='$item->NumTraspaso'>$item->NumTraspaso</option>";
                }
                ?>
            </select><br><br>
            <button type="submit" class="btnagregar">Ver traspaso</button>
        </form></center>
        </div>

      <h2>Traspasos pendientes</h2>
        <table class="">
            <tr>
                <th class="titulo">N&uacute;m. traspaso</th>
                <th class="titulo">Producto</th>
                <th class="titulo">Destino</th>
                <th class="titulo">Estado</th>
                <th class="titulo"></th>
            </tr>
        </table>
        <?php
        $trapasos=$conexion->query("SELECT DISTINCT NumTraspaso, tipo, LocacionDestino FROM traspaso WHERE Estado='PENDIENTE DE RECIBIR' ORDER BY NumTraspaso DESC") or die(print_r($conexion->errorInfo()));
        while ($item = $trapasos->fetch(PDO::FETCH_OBJ)) { 
            ?>
            <table class="bordes-corte">
                <tr>
                    <td class="bordes-corte"><?php echo $item->NumTraspaso; ?></td>
                    <td><?php echo $item->tipo; ?></td>
                    <td><?php echo $item->LocacionDestino; ?></td>
                    <td>PENDIENTE DE RECIBIR</td>
                    <td><button class="btn" type="submit" onclick="location.href='listatrapaso.php?num=<?PHP echo $item->NumTraspaso; ?>'">Ver detalles</button></td>
                </tr>
            </table>
        <?php } ?>

        <!--<h2 style="color: #00047F">Traspasos pendientes</h2>
        <form action="listatrapaso.php" method="post">
            <select name="num" class="input" style="font-size: 17px">
                <?php/*
                $trapasos=$conexion->query("SELECT DISTINCT NumTraspaso from traspaso WHERE Estado='PENDIENTE DE RECIBIR'  ORDER BY NumTraspaso DESC") or die(print_r($conexion->errorInfo()));
                while($item=$trapasos->fetch(PDO::FETCH_OBJ)){
                    echo "<option value='$item->NumTraspaso'>$item->NumTraspaso</option>";
                }*/
                ?>
            </select><br><br>
            <button type="submit" class="btnagregar">Ver traspaso</button>
        </form></center>-->
    </div>
</body>
</html>