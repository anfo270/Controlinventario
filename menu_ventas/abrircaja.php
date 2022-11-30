<?php
session_start();
if(!isset($_SESSION['Usuario'])&& !isset( $_SESSION['Contrasena'])){
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
    <link rel="stylesheet" href="../css/menus.css">
    <title>Abrir Caja</title>
</head>
<body>
    <nav><button class="btn cerrar" onclick="location.href='../cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="../menu.php">🏠</a></li>
        </ul>
    </div>
    <div class="contenedor">
        <button class="btn abrircaja" onclick="location.href='seccionventas.php'">Abrir Caja</button><br>
        <?php
        date_default_timezone_set('America/Denver');
        $Fecha = date('d/m/Y', time());
        $Hora = date('h:i a', time());
        echo "<h3>Fecha:</h3><p id='fecha'>$Fecha</p>";
        echo "<h3>Fecha:</h3><p id='hora'>$Hora</p>";
        ?>
    </div> 
</body>
</html>
