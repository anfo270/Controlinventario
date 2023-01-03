<?php
include('../Config/conexionbd.php');
include('../Config/metodosbd.php');
session_start();
if(!isset($_SESSION['Usuario'])&& !isset( $_SESSION['Contrasena'])){
    header('location: ../index.php');
}
$usu = strval($_SESSION['Usuario']);
//how convert to string?
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="
    <?php $cant_carrito=0;$carrito=busqueda($conexion,"carrito","usuario",$usu);
        while($item=$carrito->fetch(PDO::FETCH_OBJ)){
            $cant_carrito++;
        }
        if($cant_carrito>0){
            echo "../img/logoci_not2.png";
        }else{
            echo "../img/logoci.png";
        }
        ?>
    " type="image/x-icon">
    <link rel="stylesheet" href="../css/estilocomun.css">
    <link rel="stylesheet" href="../css/reporte.css">
    <!--<link rel="stylesheet" href="../css/popup.css">-->

    <title>Carrito de ventas</title>
</head>
<body>
    <nav><button class="btn cerrar caja" onclick="location.href='cerrarcaja.php'">Cerrar Caja</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="../menu.php">🏠</a></li>
            <li><a href="seccionventas.php">Ventas</a></li>
            <li>Carrito</li>
        </ul>
    </div><br>
    <div class="contenedor-ventas">
        <h2>Ventas</h2>
        <table class="tabla_venta">
            <tr>
                <td>
                    <p><b>Producto</b></p>
                </td>
                <td>
                    <p><b>Modelo</b></p>
                </td>
                <td>
                    <p><b>Precio por unidad<b></p>
                </td>
                <td></td>
            </tr>
        </table>
        <table class="tabla_venta">
        <?php $productos=busqueda($conexion,"carrito","Usuario",$usu);
        if($productos->rowCount()==0){
            //header('location:' . getenv('HTTP_REFERER'));
            header('location: seccionventas.php');
        }
                $precio=0;
                while($item=$productos->fetch(PDO::FETCH_OBJ)){ ?>
                    <tr class="bordes-hover">
                        <td><p><?php echo ucwords($item->tipo); ?></p></td>
                        <td><p><?php 
                        if($item->tipo=="recarga"||$item->tipo=="servicio"){
                            echo ucwords($item->FinancieraActivacion);
                        }else if($item->tipo=="sims"){
                            echo ucwords($item->Marca);
                        }
                        else{
                                echo ucwords($item->Modelo); }
                                ?></p></td>
                        <td><p><?php echo '$'.ucwords($item->Precio); ?></p></td>
                        <td><button class="btn cancelar" onclick="location.href='../Config/eliminar_carrito.php?id=<?php echo $item->ID; ?>'">Eliminar</button></td>
                    </tr>
                <?php $precio=intval($item->Precio)+$precio;  }?>

        </table>
        <label>
            <h2>Total:<?php echo(' $'.$precio);?> </h2>
        </label>
        <form action="finalizar_compra.php" method="post">
            <label class="labelNoP">
                <h2>Monto de pago: <input type="number" placeholder=" $0" name="montRec" class="select-css" required></h2>
            </label>
            <label>
                <h3>Tipo de pago: <select name="tipoPago" class="select-css">
                    <option value="Efectivo">Efectivo</option>
                    <option value="Tarjeta">Tarjeta</option>
                    <option value="Transferencia">Transferencia</option>
                    <option value="QR code">C&oacute;digo QR</option>
                    <option value="Cheque">Cheque</option>
                </select></h3>
            </label><br>
            <div class="botonventa">
                <button class="btn cancelar" onclick="location.href='../Config/eliminar_carrito.php?id=<?php echo 'eliminar'; ?>'">Cancelar</button>
                <button class="btn" onclick="location.href='seccionventas.php'">Agregar</button>
                <button class="btn" ">Finalizar</button>
            </div>
        </form>
    </div>
</body>
</html>