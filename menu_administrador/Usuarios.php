<?php
session_start();
if (!isset($_SESSION['Usuario']) && !isset($_SESSION['Contraseña'])) {
    header('location: index.php');
}
$usu = $_SESSION['Usuario']
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logoci.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/estilocomun.css">
    <link rel="stylesheet" href="../css/menus.css">
    <title>Usuario</title>
</head>

<body>
    <nav><button class="btn cerrar" id="cerrar" onclick="location.href='cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="menu.php">Men&uacute;</a></li>
            <li>Administrador</li>
        </ul>
    </div>
    <div class="contenedor">
        <h1>Usuarios</h1>
        <table>
            <tr>
                <td class="titulo">Nombre</td>
                <td class="titulo">Apellidos</td>
                <td class="titulo">Contraseña</td>
                <td class="titulo">Puesto</td>
                <td class="titulo">Local</td>
            </tr>
        </table>
        <table id="tableusers"></table>
    </div>
</body>

</html>