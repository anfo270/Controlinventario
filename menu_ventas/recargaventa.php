<?php
session_start();
include ('../Config/metodosbd.php');
include('../Config/conexionbd.php');
include('../Config/infoCarrito.php');
if(!isset($_SESSION['Usuario'])&& !isset( $_SESSION['Contrasena'])){
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
    <title>Recargas<?php if($cant_carrito>0){ echo " (".$cant_carrito.")"; } ?></title>
</head>

<body>
    <nav><button class="btn cerrar caja" onclick="location.href='cerrarcaja.php'">Cerrar Caja</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="../menu.php">🏠</a></li>
            <li><a href="seccionventas.php">Ventas</a></li>
            <li>Recargas</li>
        </ul>
    </div>
    <div class="carrito">
        <?php
            echo $edoCarrito;
        ?>
    </div>
    <form class="contenedor" action="../Config/carrito.php?tipo=recarga" method="post">
        <label for="">
            <p>Proveedor:
            
            <select name="proveedor" class="select-css">.
                <option value=" ">Seleccionar...</option>
                <?php $proveedores=consulta($conexion,"telefonia");
                        while($item=$proveedores->fetch(PDO::FETCH_OBJ)) {?>
                            <option value="<?php echo $item->Nombre; ?>"><?php echo $item->Nombre; ?></option>
                            <?php } ?>
            </select></p>

        </label>
        <label for="">
            <p>N&uacute;mero: <input type="number" name="num_tel" id="numero" class="boxtext" maxlength="10" required></p>
        </label>
        <label for="">
            <p>Monto: <input type="text" name="Precio" id="precio" class="boxtext" required></p>
        </label>
        
            <div class="botones">
            <button class="btn cancelar" type="reset">Cancelar</button>
            <button class="btn" type="submit">Vender</button>
            </div>
    </form>
</body>

</html>