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
            <li><a href="../menu.php">Men&uacute;</a></li>
            <li><a href="inventario.php">Responsable</a></li>
            <li><a href="reporte.php">Reporte</a></li>
            <li>Consulta</li>
        </ul>
    </div>
    <div class="contenedor">
        <h2>Consulta</h2>
        <div>
        <label for=""><p>Marca:
            <select class="select-css">
                <option value="Samsung">Samsung</option>
            </select>
            </p>
        </label>
        <label for=""><p>Tipo de articulo:
            <select class="select-css">
                <option value="cargador">cargador</option>
            </select>
            </p></label>
        </div>
        <table>
            <tr>
                <td>
                    <p>Modelo</p>
                </td>
                <td>
                    <p>Cantidad</p>
                </td>
                <td>
                    <p>Local</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Tipo C carga rapida</p>
                </td>
                <td>
                    <p>2</p>
                </td>
                <td>
                    <p>$299</p>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Tipo c</p>
                </td>
                <td>
                    <p>5</p>
                </td>
                <td>
                    <p>$250</p>
                </td>
            </tr>
    </div>
</body>
</html>