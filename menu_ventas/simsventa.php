<?php
session_start();
require('../Config/conexionbd.php');
require('../Config/metodosbd.php');
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
    <title>Sims</title>
    <script src="../javascript/datossims.js"></script>
</head>

<body>
    <nav><button class="btn cerrar caja" onclick="location.href='cerrarcaja.php'">Cerrar Caja</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="../menu.php">🏠</a></li>
            <li><a href="seccionventas.php">Ventas</a></li>
            <li>SIMs</li>
        </ul>
    </div>
    <form class="contenedor" action="../Config/carrito.php?tipo=ICC" method="post">
        <label for="">
            <p>ICC:<input type="text" name="ID" id="IMEI" class="boxtext" onkeypress="pulsar('IMEI');" required></p>
        </label>
        <label for="">
            <p>Telefonia:<p id="Telefonia"></p></p>
        </label>
        <label for="">
            <p>Tipo de activación:
                <select name="proveedor" class="select-css">
                    <option value="">Seleccionar...</option>
                    <?php $activacion=consulta($conexion,"activacion");
                        while($item=$activacion->fetch(PDO::FETCH_OBJ)){
                    ?>
                        <option value="<?php echo $item->Nombre;?>"><?php echo $item->Nombre;?></option>
                    <?php }?>
                </select>
                
            </p>
        </label>
        <label for="">
            <p>DN: <input type="text" name="IMEI" id="IMEI" class="boxtext" required></p>
        </label>
        <label for="">
            <p>Precio:<input type="text" name="Precio" id="precio" class="boxtext" required></p>
        </label>
        <div class="botones">
            <button class="btn cancelar" type="reset">Cancelar</button>
            <button class="btn" type="submit">Vender</button>
        </div>
    </form>
</body>

</html>