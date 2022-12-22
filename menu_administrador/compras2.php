<?php
session_start();
if(!isset($_SESSION['Usuario'])&& !isset( $_SESSION['Contrasena'])){
    header('location: ../index.php');
}
$controlinput=0;
$usu = $_SESSION['Usuario'];
$Factura=$_POST['Factura'];
$tipos=$_GET['tipo'];
$precio=$_POST['precio'];
if($tipos!="sims"){
    $proveedor=$_POST['proveedor'];
    $marcas=$_POST['marcas'];
    $modelo=$_POST['modelo'];
}else{
    $telefonia=$_POST['telefonia'];
    $marcas=$telefonia;
    $modelo=$telefonia;
    $proveedor=$telefonia;
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
    <link rel="shortcut icon" href="../img/logoci.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/estilocomun.css">
    <link rel="stylesheet" href="../css/reporte.css">
    <?php
        if($tipos=="sims"){
            echo '<title>SIMs - Compras</title>';
        }else if($tipos=="telefonos"){
            echo '<title>Tel&eacute;fonos - Compras</title>';
        }else if($tipos=="accesorio"){
            echo '<title>Accesorios - Compras</title>';
        }
    ?>
</head>
<body>
    <nav><button class="btn cerrar" onclick="location.href='../cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="../menu.php">🏠</a></li>
            <li><a href="administrador.php">Administrador</a></li>
            <li><a href="SeleccionarTipo.php">Compras</a></li>
            <?php
                if($tipos=="sims"){
                    echo '<li>SIMs</li>';
                }else if($tipos=="telefonos"){
                    echo '<li>Tel&eacute;fonos</li>';
                }else if($tipos=="accesorio"){
                    echo '<li>Accesorios</li>';
                }
            ?>
        </ul>
    </div>
    <form class="contenedor" action="../Config/agregar_producto.php?tipo=<?php echo $tipos.'&modelo='.$modelo.'&marcas='.$marcas.'&proveedor='.$proveedor.'&cantidad='.$cantidad.'&Factura='.$Factura.'&precio='.$precio; ?>" method="post">
        <?php
            if($tipos=="sims"){
                echo '<h2>Por favor, ingresa los ICC</h2>';
            }else if($tipos=="telefonos"){
                echo '<h2>Por favor, ingresa los IMEI</h2>';
            }else if($tipos=="accesorio"){
                echo '<h2>Por favor, ingresa los SKU</h2>';
            }
        ?>
        <div>
            <label><p>Factura: <?php echo $Factura;?></p></label>
        </div>
        <table>
            <tr>
                <td>
                    <p>Modelo:</p>
                </td>
                <td>
                    <p><?php 
                    if($tipos!="sims"){
                        echo $modelo;
                    }else{
                        echo $telefonia;
                        echo "<input  type='text' name='telefonia' value='{$telefonia}' hidden>";
                    }?></p>
                </td>
            </tr>
            <?php for ($i=0; $i <$cantidad-1 ; $i++) { ?>
            <tr>
                <td>
                    <p><?php echo tipo($tipos); ?>:</p>
                </td>
                <td>
                    <input type="text" name="numero<?php echo $i; ?>" class="boxtext" id='<?php echo 'input'. $controlinput ?>' onkeypress="nextFocus('<?php echo 'input'.$controlinput?>','<?php echo'input'. $controlinput= $controlinput+1;  $controlinput= $controlinput-1; ?>');" required>
                </td>
            </tr>
            <?php
                $controlinput++;
                } ?>
            <tr>
                <td>
                    <p><?php echo tipo($tipos); ?>:</p>
                </td>
                <td>
                    <input type="text" name="numero<?php echo $cantidad-1; ?>" class="boxtext" id='<?php echo 'input'. $controlinput ?>' onkeypress="nextFocus('<?php echo 'input'.$controlinput?>','<?php echo'input'. $controlinput= $controlinput+1;  $controlinput= $controlinput-1; ?>');" required>
                </td>
            </tr>
        </table>
        <div class="botones">
            <button type="reset" class="btn cancelar">Cancelar</button>
            <button type="submit" class="btn">Aceptar</button>
        </div>
    </form>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            document.querySelectorAll('input[id=input<?php echo $controlinput; ?>]').forEach( node => node.addEventListener('keypress', e => {
                if(e.keyCode == 13) {
                    e.preventDefault();
                }
            }))
        });
    </script>
</body>
</html>