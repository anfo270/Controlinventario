<?php
session_start();
if(!isset($_SESSION['Usuario'])&& !isset( $_SESSION['Contraseña'])){
    header('location: index.html');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilocomun.css">
    <link rel="stylesheet" href="css/menus.css">
    <title>Abrir Caja</title>
</head>
<body>
    <nav><button class="btn cerrar" onclick="location.href='cerrar.php'">Cerrar Sesion</button> <p>Jesus Flores</p></nav>
    <div class="contenedor">
        <button class="btn abrircaja" onclick="location.href='seccionventas.html'">Abrir Caja</button><br>
        <h3>Fecha:</h3><p id="fecha">0/0/0</p>
        <h3>Hora</h3><p id="hora">00:00</p>
    </div> 
</body>
</html>
