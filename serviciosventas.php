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
    <link rel="stylesheet" href="css/estilocomun.css">
    <link rel="stylesheet" href="css/ventas.css">
    <title>Tel&eacute;fono</title>
</head>

<body>
    <nav><button class="btn cerrar caja" onclick="location.href='cerrarcaja.php'">Cerrar Caja</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="contenedor">
        <form action="ventas.php" method="POST">
            
                <h3>Tipo de servicio:</h3>
                <Label>
                    <P>Financiera: <select>
                        <option>PAYJOY</option>
                        <OPTION>Movistar</OPTION>
                    </select></P>
                </Label>
                <label>
                    <p>Monto: <input type="text" name="monto" id="monto" class="boxtext"> </p>
                </label>
            <div class="botones">
                <button type="submit" class="btn">Agregar producto</button>
                <button class="btn" onclick="location.href='ventas.php'">Vender</button>
                <button type="reset" class="btn cancelar" onclick="location.href='seccionventas.php'">Cancelar</button>
            </div>

        </form>
    </div>
</body>

</html>