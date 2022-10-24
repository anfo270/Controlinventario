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

    <title>Compras</title>
    <script src="javascript/script.js"></script>
</head>
<body>
    <nav><button class="btn cerrar" onclick="location.href='../cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    
    <div class="contenedor">
        <h2>Ingreso</h2>
        <div>
        <label for=""><p>Factura: 5000
            </p>
        </label>
        </div>
        <table>
            <tr>
                <td>
                    <p>Modelo</p>
                </td>
                <td>
                    <p>SAMSUNG GALAXY S10</p>
                </td>
            </tr>

            <tr>
                <td>
                    <p>IMEI</p>
                </td>
                <td>
                    <input type="text" name="numero" class="boxtext" id="input1" onkeypress="nextFocus('input1', 'input2')">
                </td>
            </tr>
            <tr>
                <td>
                    <p>IMEI</p>
                </td>
                <td>
                    <input type="text" name="numero" class="boxtext" id="input2" onkeypress="nextFocus('input2', 'input3')">
                </td>
            </tr>
            <tr>
                <td>
                    <p>IMEI</p>
                </td>
                <td>
                    <input type="text" name="numero" class="boxtext" id="input3" onkeypress="nextFocus('input3', 'input4')">
                </td>
            </tr>
            <tr>
                <td>
                    <p>IMEI</p>
                </td>
                <td>
                    <input type="text" name="numero" class="boxtext" id="input4" onkeypress="nextFocus('input4', 'input5')">
                </td>
            </tr>
            <tr>
                <td>
                    <p>IMEI</p>
                </td>
                <td>
                    <input type="text" name="numero" class="boxtext" id="input5" >
                </td>
            </tr>
            <tr>
                <td>
                    <p>Total</p>
                </td>
                <td>
                    <p>$1100000</p>
                </td>
            </tr>
        </table>
        <div class="botones">
            <button class="btn cancelar" onclick="location.href='traspaso.php'">Cancelar</button>
            <button class="btn">Aceptar</button>
        </div>
    </div>
</body>
</html>