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
    <script src="javascript/script.js"></script>
</head>
<body>

    <nav><button class="btn cerrar" onclick="location.href='cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="menu.php">Men&uacute;</a></li>
            <li><a href="administrador.php">Administrador</a></li>
            <li>Compras</li>
        </ul>
    </div>
    <div class="contenedor">
        <h1>Ingreso</h1>
        <table >
            <tr>
                <td>
                    <p>Factura:</p>
                </td>
                <td>
                    <input type="text" name="numero" class="boxtext" id="input1" onkeypress="nextFocus('input1', 'input2')">
                </td>
            </tr>
            <tr>
                <td>
                    <p>Proveedor:</p>
                </td>
                <td>
                    lista de proveedores y bd
                    <input type="text" name="numero" class="boxtext" id="input2" onkeypress="nextFocus('input2', 'input3')">
                </td>
            </tr>
            <tr>
                <td>
                    <p>Modelo:</p>
                </td>
                <td>
                    <input type="text" name="numero" class="boxtext" id="input3" onkeypress="nextFocus('input3', 'input4')">
                </td>
            </tr>
            <tr>
                <td>
                    <p>Cantidad </p>
                <td>
                    <input type="text" name="numero" class="boxtext" id="input4">
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