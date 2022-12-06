<?php
session_start();
include ('../Config/metodosbd.php');
include('../Config/conexionbd.php');
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
    <div class="carrito">
        <?php $cant_carrito=0;$carrito=busqueda($conexion,"carrito","usuario",$usu);
        while($item=$carrito->fetch(PDO::FETCH_OBJ)){
            $cant_carrito++;
        }
        if($cant_carrito>0){
            echo "<p><a href='ventas.php'>🛒 $cant_carrito art&iacute;culo(s)</a></p>";
        }else{
            echo "<p>🛒 $cant_carrito art&iacute;culo(s)</p>";
        }
        ?>
    </div>
    <form class="contenedor" action="../Config/carrito.php?tipo=ICC" method="post">
    <h1>SIMs</h1>    
    <p style="font-size:12px; color:#616161;">⚠️ Si la compa&ntilde;&iacute;a telef&oacute;nica no se carga, por favor, borra y escanea nuevamente.</p>
        <label for="">
            <p>ICC:<input type="text" name="ID" id="IMEI" class="boxtext" onkeypress="pulsar('IMEI');" onFocus="this.select()" required></p>
        </label>
        <label for="">
            <p>Telefon&iacute;a:<p id="Telefonia"></p></p>
        </label>
        <label for="">
            <p>Tipo de activaci&oacute;n:
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
            <p>DN: <input type="number" name="num_tel" id="IMEI" class="boxtext" required></p>
        </label>
        <label for="">
            <p>Precio: <input type="text" name="Precio" id="precio" class="boxtext" required></p>
        </label>
                <label>
                    <p>Comentarios:
                <input type="text" name="comentarios" class="boxtext"></p>
                </label>
        <div class="botones">
            <button class="btn cancelar" type="reset">Cancelar</button>
            <button class="btn" type="submit">Vender</button>
        </div>
    </form>
</body>

</html>