<?php
include('../Config/conexionbd.php');
include('../Config/metodosbd.php');
include('../Config/infoCarrito.php');
session_start();
if(!isset($_SESSION['Usuario']) && !isset( $_SESSION['Contrasena'])){
    header('location: ../index.php');
}
$usu = $_SESSION['Usuario'];
$montRec=$_POST['montRec'];


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="
    <?php 
        if($cant_carrito>0){
            echo "../img/logoci_not2.png";
        }else{
            echo "../img/logoci.png";
        }
        ?>
    " type="image/x-icon">
    <link rel="stylesheet" href="../css/estilocomun.css">
    <link rel="stylesheet" href="../css/ventas.css">

    <title>Ticket de compra<?php if($cant_carrito>0){ echo " (".$cant_carrito.")"; } ?></title>
</head>
<body>
<nav><button class="btn cerrar caja" onclick="location.href='cerrarcaja.php'">Cerrar Caja</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="../menu.php">🏠</a></li>
            <li><a href="seccionventas.php">Ventas</a></li>
            <li>Venta realizada</li>
        </ul>
    </div>
    <div class="contenedor">
        <h1>Compra realizada</h1>
        <div class="modal-contenedor" id="modal-contenedor">
            <div class="model">
                    <form action="../Config/venta.php" method="post">
                        <!--<p>Pago del cliente <input type="text" name="montRec" required></p>-->
                        <!--<p>Ingresa tu contraseña para confirmar<input type="password" name="pass" id="pass" ></p>-->
                        <!--<button class="btn cancelar" id='cancelar' type="reset" onclick= "document.getElementById('modal-contenedor').style.visibility='hidden'">Cancelar</button>-->
                        <button class="btn" id="aceptar" type="submit" >Finalizar</button>
                    </form>
            </div>
        </div>
        <iframe scrolling="auto" src="../Config/ticket.php?montRec=<?php echo $montRec;?>" frameborder="1" height="100%" width="99%">
        </iframe>
    </div>
</body>
</html>