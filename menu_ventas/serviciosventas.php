<?php
session_start();
require('..\Config/conexionbd.php');
require('..\Config/metodosbd.php');
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
</head>

<body>
    <nav><button class="btn cerrar caja" onclick="location.href='cerrarcaja.php'">Cerrar Caja</button><?PHP echo "<p>$usu</p>" ?></nav>
    <form class="contenedor" action="../Config/carrito.php?tipo=servicio" method="post">
            <h3>Tipo de servicio:</h3>
            <Label>
                <P>Financiera: <select class="select-css" name="proveedor">
                <?php $proveedores=consulta($conexion,"marcarecargas");
                    while($item=$proveedores->fetch(PDO::FETCH_OBJ)) {?>
                        <option value="<?php echo $item->Nombre; ?>"><?php echo $item->Nombre; ?></option>
                            <?php } ?>
                <?php $proveedores=consulta($conexion,"financiera");
                    while($item=$proveedores->fetch(PDO::FETCH_OBJ)) {?>
                        <option value="<?php echo $item->Nombre; ?>"><?php echo $item->Nombre; ?></option>
                <?php } ?>
                </select></P>
            </Label>
            <label>
                <p>Monto: <input type="text" name="Precio" id="monto" class="boxtext"> </p>
            </label>
            <div class="botones">
            <button class="btn cancelar" type="reset">Cancelar</button>
            <button class="btn" type="submit">Vender</button>
            </div>
    </form>
</body>

</html>