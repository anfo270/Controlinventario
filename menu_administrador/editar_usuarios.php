<?php
include('../Config/conexionbd.php');
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
    <link rel="stylesheet" href="../css/reporte.css">
    <link rel="stylesheet" href="../css/popup.css">
    <title>Usuario</title>
</head>
    <script src="../javascript/popup.js"></script>
<body>
    <nav><button class="btn cerrar" id="cerrar" onclick="location.href='../cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="menu.php">Men&uacute;</a></li>
            <li>Administrador</li>
        </ul>
    </div>
    <div class="contenedor">
        <h1>Editar Usuario</h1>
        <form action="../Config/nuevo_usuario.php" method="post">
            <table class="tabla_usuarios">
                <tr>
                    <td><p>Nombre:</p></td><td> <input type="text" name="Nombre" id="Nombre"></td>
                </tr>
                <tr>
                    <td><p>Apellido Paterno:</p></td><td> <input type="text" name="Apellido_Paterno" id="Apellidos "></td>
                </tr>
                <tr>
                    <td><p>Apellido Materno:</p></td><td> <input type="text" name="Apellido_Materno" id="Apellidos "></td>
                </tr>
                <tr>
                    <td><p>Contraseña:</p></td><td> <input type="text" name="Contraseña" id="Contraseña"></td>
                </tr>
                <tr>
                    <td><p>Puesto:</p></td>
                    <td>
                        <select name="Puesto" id="Puesto">
                            <option value=" ">Seleccionar...</option>
                            <option value="VENDEDOR">Vendedor</option>
                            <option value="RESPOSABLE">Responsable</option>
                            <option value="COORDINADOR">Coordinador</option>
                            <option value="SUPERVISOR">Supervisor</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><p>Local</p></td>
                    <td>
                    <select name="Local" id="Local">
                            <option value=" ">Seleccionar...</option>
                            <option value="TORRES LOCAL">Torres Local</option>
                            <option value="TORRES ISLA">Torres Isla</option>
                            <option value="BODEGA LIBRAMIENTO">Bodega Libramiento</option>
                            <option value="LOCAL LIBRAMIENTO">Local Libramiento</option>
                            <option value="CENTRO VICENTE">Centro Vicente</option>
                            <option value="CENTRO 16 SEPTIEMBRE">Centro 16 de Septiembre</option>
                            <option value="CENTRO UGARTE">Centro Ugarte</option>
                            <option value="CENTRO PLAZA CATEDRAL">Centro Plaza Catedral</option>
                        </select>
                    </td>
                </tr>
            </table>
            <div class="botones">
            <button type="reset" class="btn reset" >Cancelar</button>
            <button type="submit" class="btn" >Siguiente</button>
        </div>
        </form>

    </div>

   
</body>

</html>