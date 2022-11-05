<?php
session_start();
if(!isset($_SESSION['Usuario'])&& !isset( $_SESSION['Contraseña'])){
    header('location: index.php');
}
$usu = $_SESSION['Usuario']
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

    <title>Men&uacute; inventario</title>
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
    <div class="contenedor">
        <label for="">
            <p>Numero de transpaso: <input type="text" name="numero" class="boxtext"></p>
        </label>
        <table>
            <tr>
                <td>
                    <p class="titulo">Articulo</p>
                </td>
                <td>
                    <p class="titulo">Cantidad</p>
                </td>
                <td>
                    <p class="titulo">Recibido</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Samsung Galaxy s19</p>
                </td>
                <td>
                    <p>2</p>
                </td>
                <td>
                    <input type="checkbox" name="recibido" id="recibido">
                </td>
            </tr>
            <tr>
                <td>
                    <p>Audifonos</p>
                </td>
                <td>
                    <p>5</p>
                </td>
                <td>
                    <input type="checkbox" name="recibido" id="recibido">
                </td>
            </tr>
            <tr>
                <td>
                    <p>Cargador</p>
                </td>
                <td>
                    <p>3</p>
                </td>
                <td>
                    <input type="checkbox" name="recibido" id="recibido">
                </td>
            </tr>
        </table>
        <div class="botones">
            <button class="btn">Aceptar</button>
            <button class="btn cancelar" onclick="location.href='traspaso.php'">Cancelar</button>
        </div>
    </div>
</body>
</html>