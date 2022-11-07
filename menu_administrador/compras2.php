<?php
session_start();
if(!isset($_SESSION['Usuario'])&& !isset( $_SESSION['Contraseña'])){
    header('location: index.php');
}
$usu = $_SESSION['Usuario'];
$Factura=intval($_POST['Factura']);
$tipos=$_POST['Tipo'];
$proveedor=$_POST['proveedor'];
$marcas=$_POST['marcas'];
$modelo=$_POST['modelo'];
$cantidad=intval($_POST['cantidad']);
function tipo($valor){
    $tipo = array(
        "sims"=>"ICC",
        "telefonos"=>"IMEI",
        "accesorio"=>"SKU",
    );
    return $tipo[$valor];
}
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

    <title>Compras</title>
    <script src="javascript/script.js"></script>
</head>
<body>
    <nav><button class="btn cerrar" onclick="location.href='../cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    
    <div class="contenedor">
        <h2>Ingreso</h2>
        <div>
        <label><p>Factura: <?php echo $Factura;?>
            </p>
        </label>
        </div>
        <table>
            <tr>
                <td>
                    <p>Modelo</p>
                </td>
                <td>
                    <p><?php echo $modelo;?></p>
                </td>
            </tr>
            <?php for ($i=0; $i <$cantidad ; $i++) { ?>
            <tr>
                
                <td>
                    <p><?php echo tipo($tipos); ?></p>
                </td>
                <td>
                    <input type="text" name="numero" class="boxtext" id="input1" onkeypress="nextFocus('input1', 'input2')">
                </td>
                
            </tr>
            <?php } ?>
        </table>
        <div class="botones">
            <button class="btn cancelar" onclick="location.href='traspaso.php'">Cancelar</button>
            <button class="btn">Aceptar</button>
        </div>
    </div>
</body>
</html>