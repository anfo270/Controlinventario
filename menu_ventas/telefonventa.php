<?php
session_start();
include ('../Config/metodosbd.php');
include('../Config/conexionbd.php');
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
    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="../menu.php">🏠</a></li>
            <li><a href="seccionventas.php">Ventas</a></li>
            <li>Tel&eacute;fono</li>
        </ul>
    </div>
    <div class="carrito">
        <?php $cant_carrito=0;$carrito=busqueda($conexion,"carrito","usuario",$usu);
        while($item=$carrito->fetch(PDO::FETCH_OBJ)){
            $cant_carrito++;
        }
        if($cant_carrito>0){
            echo "<p><a href='ventas.php'>🛒 $cant_carrito</a></p>";
        }else{
            echo "<p>🛒 $cant_carrito</p>";
        }
        ?>
    </div>
    <form class="contenedor" action="../Config/carrito.php?tipo=IMEI" method="POST">
        <h1>Teléfonos</h1>
        <table>
            <tr>
                <td>IMEI:</td>
                <td><input type="text" name="ID" id="IMEI" class="boxtext IMEI" onkeypress="pulsar('IMEI');" required></td>
            </tr>
            <tr>
                <td>
                    Marca:
                </td>
                <td>
                    <p class="Marca" id="Marca"></p>
                </td>
            </tr>
            <tr>   
                <td>
                    Modelo:
                </td>
                <td> 
                    <p id="Modelo"></p>
                </td>
            </tr>
            <tr>
                <td> 
                    Financiera:
                </td>
                <td>
                    <select name="proveedor" class="select-css proveedor">
                    <option value="">Seleccionar...</option>
                    <?php
                        $financiera=consulta($conexion,"financiera");
                        while($item=$financiera->fetch(PDO::FETCH_OBJ)){ ?>
                            <option value="<?php echo $item->Nombre?>"><?php echo $item->Nombre?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td> 
                    Nombre de cliente:
                </td>
                <td>
                    <input type="text" name="cliente" id="IMEI" class="boxtext" required>
                </td>
            </tr>
            <tr>
                <td> 
                    Numero de teléfono:
                </td>
                <td>
                    <input type="number" name="num_tel" id="IMEI" class="boxtext" required>
                </td>
            </tr>
            <tr>
                <td> 
                    Correo:
                </td>
                <td>
                    <input type="email" name="correo" id="IMEI" class="boxtext" required>
                </td>
            </tr>
            <tr>
                <td> 
                    Precio de producto:
                </td>
                <td>
                    <input type="number" name="PrecioInicial" id="IMEI" class="boxtext" required>
                </td>
            </tr>
            <tr>
                <td> Primer pago:</td>
                <td><input type="number" name="Precio" id="Precio" class="boxtext" required></p></td>
            </tr>
        </table>           
        <div class="botones">
            <button class="btn cancelar" type="reset">Cancelar</button>
            <button class="btn" type="submit">Vender</button>
        </div>
    </form>
</body>

</html>
