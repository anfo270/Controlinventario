<?php
session_start();
if(!isset($_SESSION['Usuario'])&& !isset( $_SESSION['Contraseña'])){
    header('location: index.php');
}
$controlinput=0;
$usu = $_SESSION['Usuario'];
$Factura=intval($_POST['Factura']);
$tipos=$_GET['tipo'];
if($tipos!="sims"){
    $proveedor=$_POST['proveedor'];
    $marcas=$_POST['marcas'];
    $modelo=$_POST['modelo'];
}else{
    $telefonia=$_POST['telefonia'];
}
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

    <title>Compras</title><script src="../javascript/script.js"></script>
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
                    <p><?php 
                    if($tipos!="sims"){
                        echo $modelo;
                    }else{
                        echo $telefonia;
                    }?></p>
                </td>
            </tr>
            <?php for ($i=0; $i <$cantidad ; $i++) { ?>
            <tr>
                
                <td>
                    <p><?php echo tipo($tipos); ?></p>
                </td>
                <td>
                    <input type="text" name="numero<?php echo $i ?>" class="boxtext" id=<?php echo 'input'. $controlinput ?> onkeypress="nextFocus('<?php echo 'input'.$controlinput?>',' <?php echo'input'. $controlinput= $controlinput+1;  $controlinput= $controlinput-1; ?>')">
                </td>
                
            </tr>
            <?php
                $controlinput++;
                } ?>
        </table>
        <div class="botones">
            <button class="btn cancelar" onclick="location.href='traspaso.php'">Cancelar</button>
            <button class="btn">Aceptar</button>
        </div>
    </div>
</body>
</html>