<?php
session_start();
if(!isset($_SESSION['Usuario'])&& !isset( $_SESSION['Contraseña'])){
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
    <link rel="shortcut icon" href="img/logoci.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/estilocomun.css">
    <link rel="stylesheet" href="../css/menus.css">
    <link rel="stylesheet" href="../css/popup.css">
    <title>Sistema</title>
</head>
<body>
    <nav><button class="btn cerrar" onclick="location.href='cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="../menu.php">Men&uacute;</a></li>
            <li>Sistema</li>
        </ul>
    </div>
    <div class="contenedor">
        <button class="btn inventario" onclick="location.href='ab_financiera.php'">Financieras</button>
        <button class="btn administrador" onclick="location.href='ab_marcas.php'">Marcas</button>
        <button class="btn administrador" onclick="location.href='ab_activacion.php'">Tip. Activaci&oacute;n</button>
        <button class="btn administrador" onclick="location.href='ab_locacion.php'">Locaci&oacute;n</button>
        <button class="btn administrador" onclick="location.href='ab_proveedor.php'">Proveedor</button>
        <p>agregar botón para telefonía,modelos</p>
        <button class="btn cerrar reset"  onclick="document.getElementById('modal-contenedor').style.visibility='visible'">Reset general</button><br><br>
    </div>
    <div class="modal-contenedor" id="modal-contenedor">
        <div class="model">
            <form action="../Config/borrartablas.php" method="post">
                <p>Ingresa tu contraseña para confirmar<input type="password" name="pass" id="pass" ></p>
                <button id="" class="btn reset" id='cancelar' onclick= "document.getElementById('modal-contenedor').style.visibility='hidden'">Cancelar</button>
                <button class="btn" id="aceptar" type="submit" >Aceptar</button>
            </form>
        </div>        
    </div>
</body>
</html>