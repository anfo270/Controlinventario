<?php
require('../Config/conexionbd.php');
require('../Config/metodosbd.php');
session_start();
if(!isset($_SESSION['Usuario'])&& !isset( $_SESSION['Contraseña'])){
    header('location: index.php');
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
    <link rel="shortcut icon" href="img/logoci.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/estilocomun.css">
    <link rel="stylesheet" href="../css/reporte.css">
    <link rel="stylesheet" href="../css/popup.css">

    <title>Carrito de ventas</title>
</head>
<body>
    <nav><button class="btn cerrar" onclick="location.href='cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="contenedor">
        <h2>Ventas</h2>
        <table>
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
        <table>
        <?php $productos=busqueda($conexion,"carrito","Usuario",$usu);
        if($productos->rowCount()==0){
            header('location: seccionventas.php');
        }
                $precio=0;
                while($item=$productos->fetch(PDO::FETCH_OBJ)){ ?>
                    <tr>
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
                        <td><p><?php echo ucwords($item->Precio); ?></p></td>
                        <td><button class="btn cancelar" onclick="location.href='../Config/eliminar_carrito.php?id=<?php echo $item->ID; ?>'">Eliminar</button></td>
                    </tr>
                <?php $precio=intval($item->Precio)+$precio;  }?>

        </table>
        <label>
            <p>Total:<?php echo('$'.$precio);?> </p>
        </label>
        <div class="botonventa">

            <button class="btn cancelar" onclick="location.href='../Config/eliminar_carrito.php?id=<?php echo 'eliminar'; ?>'">Cancelar</button>
            <button class="btn" onclick="location.href='seccionventas.php'">Agregar</button>
            <button class="btn" onclick=" document.getElementById('modal-contenedor').style.visibility='visible'">Aceptar</button>
        </div>
        <div class="modal-contenedor" id="modal-contenedor">
            <div class="model">
                    <form action="../Config/venta.php" method="post">
                        <p>Ingresa tu contraseña para confirmar<input type="password" name="pass" id="pass" ></p>
                        <button class="btn cancelar" id='cancelar' type="reset" onclick= "document.getElementById('modal-contenedor').style.visibility='hidden'">Cancelar</button>
                        <button class="btn" id="aceptar" type="submit" >Aceptar</button>
                    </form>
            </div>
        </div>
    </div>
</body>
</html>