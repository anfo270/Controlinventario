<?php
include('../Config/conexionbd.php');
include('../Config/metodosbd.php');
session_start();
if(!isset($_SESSION['Usuario']) && !isset( $_SESSION['Contrasena'])){
    header('location: ../index.php');
}
$usu = $_SESSION['Usuario'];
$montRec=$_POST['montRec'];
$tipoPago=$_POST['tipoPago'];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logoci.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/estilocomun.css">
    <link rel="stylesheet" href="../css/ventas.css">

    <title>Ticket de compra</title>
</head>
<body>
<nav><button class="btn cerrar caja" onclick="location.href='cerrarcaja.php'">Cerrar Caja</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="contenedor">
        <h1>Compra realizada</h1>
        <div class="modal-contenedor" id="modal-contenedor">
            <div class="model">
                    <form action="../Config/venta.php" method="post">
                        <button class="btn" id="aceptar" type="submit" >Finalizar</button>
                    </form>
            </div>
        </div><br>
        <iframe scrolling="auto" src="../Config/ticket.php?montRec=<?php echo $montRec;?>&tipoPago=<?php echo $tipoPago; ?>" frameborder="1" height="100%" width="99%">
        </iframe>
    </div>
</body>
</html>