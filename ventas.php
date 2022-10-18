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

    <title>Men&uacute; inventario</title>
</head>
<body>
    <nav><button class="btn cerrar" onclick="location.href='cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="contenedor">
        <h2>Ventas</h2>
        <table>
            <tr>
                <td>
                    <p><b> Producto</b></p>
                </td>
                <td>
                    <p><b>Cantidad</b></p>
                </td>
                <td>
                    <p><b>Precio por unidad<b></p>
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
        </table>

        <label>
            <p>Precio:  $1848 </p>
        </label>
        <label class="pass">
            <p>Contraseña:<input type="password" name="contraseña" id="contraseña" class="boxtext" required></p>
        </label>
        pedir factura
        <div class="botonventa">
            <button class="btn">Aceptar</button>
            <button class="btn cancelar">Cancelar</button>
        </div>
    </div>
</body>
</html>