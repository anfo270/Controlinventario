<?php
include('../Config/conexionbd.php');
include('../Config/metodosbd.php');
session_start();
if(!isset($_SESSION['Usuario'])&& !isset( $_SESSION['Contrasena'])){
    header('location: ../index.php');
}
$usu = $_SESSION['Usuario']
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
        <form action="listatrapaso.php" method="post">
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
    </div>
</body>
</html>