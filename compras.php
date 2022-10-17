<?php
session_start();
if(!isset($_SESSION['Usuario'])&& !isset( $_SESSION['Contraseña'])){
    header('location: index.html');
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
    <link rel="stylesheet" href="css/estilocomun.css">
    <link rel="stylesheet" href="css/reporte.css">

    <title>Compras</title>
</head>
<body>

    <nav><button class="btn cerrar" onclick="location.href='cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="contenedor">
        <h1>Ingreso</h1>
            <p>Numero de transpaso: <input type="text" name="numero" class="boxtext"></p>
        <table>
            <tr>
                <td>
                    <p>Factura:</p>
                </td>
                <td>
                    <input type="text" name="numero" class="boxtext">
                </td>
            </tr>
            <tr>
                <td>
                    <p>Proveedor:</p>
                </td>
                <td>
                    <input type="text" name="numero" class="boxtext">
                </td>
            </tr>
            <tr>
                <td>
                    <p>Modelo:</p>
                </td>
                <td>
                    <<input type="text" name="numero" class="boxtext">
                </td>
            </tr>
            <tr>
                <td>
                    <p>Cantidad </p>
                <td>
                    <input type="text" name="numero" class="boxtext">
                </td>
            </tr>
        </table>
        <div class="botones">
            <button class="btn cancelar" onclick="location.href='administrador.php'">Cancelar</button>
            <button class="btn" onclick="location.href='compras2.php'">Siguiente</button>
        </div>
    </div>
</body>
</html>