<?php
session_start();
require ('../Config/metodosbd.php');
require('../Config/conexionbd.php');
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
    <link rel="stylesheet" href="../css/ventas.css">
    <title>Tel&eacute;fono</title>
    <script src="../javascript/datostelefono.js"></script>
    <script src="../javascript/script.js"></script>
</head>

<body>
    <nav><button class="btn cerrar caja" onclick="location.href='cerrarcaja.php'">Cerrar Caja</button><?PHP echo "<p>$usu</p>" ?></nav>
    <form class="contenedor" action="../Config/carrito.php?tipo=IMEI" method="POST">
        <label for="">
            <p>IMEI:<input type="text" name="ID" id="IMEI" class="boxtext IMEI" onkeypress="pulsar('IMEI');" required></p>
        </label>
        <label for="">
            <p>Marca: </p><p class="Marca" id="Marca"></p>
        </label>
        <label for="">
            <p>Modelo: </p><p id="Modelo"></p>
        </label>
        <label for="">
            <p>Financiera:
        <select name="proveedor" class="select-css proveedor">
            <option value="">Seleccionar...</option>
            <?php
                $financiera=consulta($conexion,"financiera");
                while($item=$financiera->fetch(PDO::FETCH_OBJ)){ ?>
                    <option value="<?php echo $item->Nombre?>"><?php echo $item->Nombre?></option>
                <?php } ?>
        </select>

            </p>
        </label>
        <label>
            <p class="precio">Precio de producto:<input type="text" name="IMEI" id="IMEI" class="boxtext" required></p>
        </label>
        <label>
            <p class="precio">Primer pago:<input type="text" name="Precio" id="Precio" class="boxtext" required></p>
        </label>
        <div class="botones">
            <button class="btn">Agregar producto</button>
            <button class="btn" type="submit">Vender</button>
            <button class="btn cancelar" onclick="location.href='seccionventas.php'">Cancelar</button>
        </div>
    </form>
</body>

</html>
