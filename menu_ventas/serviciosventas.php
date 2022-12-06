<?php
session_start();
include ('../Config/metodosbd.php');
include('../Config/conexionbd.php');
include('../Config/infoCarrito.php');
if(!isset($_SESSION['Usuario'])&& !isset( $_SESSION['Contrasena'])){
    header('location: ../index.php');
}
$usu = $_SESSION['Usuario'];
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
    <title>Pago de servicios</title>
</head>

<body>
    <nav><button class="btn cerrar caja" onclick="location.href='cerrarcaja.php'">Cerrar Caja</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="../menu.php">🏠</a></li>
            <li><a href="seccionventas.php">Ventas</a></li>
            <li>Pago de servicios<?php if($cant_carrito>0){ echo " (".$cant_carrito.")"; } ?></li>
        </ul>
    </div>
    <div class="carrito">
        <?php
            echo $edoCarrito;
        ?>
    </div>
    <form class="contenedor" action="../Config/carrito.php?tipo=servicio" method="post">
            <h3>Tipo de servicio:</h3>
            <Label>
                <p>Financiera: <select class="select-css" name="proveedor">
                <option value="">Seleccionar...</option>
                <?php $proveedores=consulta($conexion,"telefonia");
                    while($item=$proveedores->fetch(PDO::FETCH_OBJ)) {?>
                        <option value="<?php echo $item->Nombre; ?>"><?php echo $item->Nombre; ?></option>
                            <?php } ?>
                <?php $proveedores=consulta($conexion,"financiera");
                    while($item=$proveedores->fetch(PDO::FETCH_OBJ)) {?>
                        <option value="<?php echo $item->Nombre; ?>"><?php echo $item->Nombre; ?></option>
                <?php } ?>
                </select></p>
            </Label>
            <label>
                <p>Monto: <input type="text" name="Precio" id="monto" class="boxtext" required> </p>
            </label>
            <div class="botones">
            <button class="btn cancelar" type="reset">Cancelar</button>
            <button class="btn" type="submit">Vender</button>
            </div>
    </form>
</body>

</html>