<?php
require('../Config/metodosbd.php');
require('../Config/conexionbd.php');
session_start();
if(!isset($_SESSION['Usuario'])&& !isset( $_SESSION['Contrasena'])){
    header('location: ../index.php');
}
$usu = $_SESSION['Usuario'];
$tipo=$_GET['tipo'];
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
        if($tipo=="sims"){
            echo '<title>SIMs - Compras</title>';
        }else if($tipo=="telefonos"){
            echo '<title>Tel&eacute;fonos - Compras</title>';
        }else if($tipo=="accesorio"){
            echo '<title>Accesorios - Compras</title>';
        }
    ?>
    <title>Compras</title>
    <script src="../javascript/script.js"></script>
</head>
<body>
    <nav><button class="btn cerrar" onclick="location.href='../cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="../menu.php">🏠</a></li>
            <li><a href="administrador.php">Administrador</a></li>
            <li><a href="SeleccionarTipo.php">Compras</a></li>
            <?php
                if($tipo=="sims"){
                    echo '<li>SIMs</li>';
                }else if($tipo=="telefonos"){
                    echo '<li>Tel&eacute;fonos</li>';
                }else if($tipo=="accesorio"){
                    echo '<li>Accesorios</li>';
                }
            ?>
        </ul>
    </div>
    <form action="compras2.php?tipo=<?php echo $tipo;?>" method="post" class="contenedor">
        <?php
            if($tipo=="sims"){
                echo '<h1>Ingreso de SIMs</h1>';
            }else if($tipo=="telefonos"){
                echo '<h1>Ingreso de Tel&eacute;fonos</h1>';
            }else if($tipo=="accesorio"){
                echo '<h1>Ingreso de Accesorios</h1>';
            }
        ?>
        <table>
            <tr>
                <td>
                    <p>Factura:</p>
                </td>
                <td>
                    <input type="text" name="Factura" class="boxtext" id="input1" onkeypress="nextFocus('input1', 'input2');" required>
                </td>
            </tr><?php if($tipo!="sims"){?>
            <tr>
                <td>
                    <p>Proveedor:</p>
                </td>
                <td>
                    <select name="proveedor" id="proveedor input2" class="select-css" onkeypress="nextFocus('input2', 'input3');" required>
                        <option value=" ">Seleccionar...</option>
                        <?php
                        $local=consulta_orden_asc($conexion,"proveedor","Nombre");
                        while($item=$local->fetch(PDO::FETCH_OBJ)){?>
                            <option value="<?php echo $item->Nombre; ?>"><?php echo $item->Nombre; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Marcas:</p>
                </td>
                <td>
                    <select name="marcas" id="marcas input3" class="select-css"  onkeypress="nextFocus('input3', 'input4');" required>
                        <option value=" ">Seleccionar...</option>
                        <?php
                        $local=consulta_orden_asc($conexion,"marcas","Nombre");
                        while($item=$local->fetch(PDO::FETCH_OBJ)){?>
                            <option value="<?php echo $item->Nombre; ?>"><?php echo $item->Nombre; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Modelo:</p>
                </td>
                <td>
                    <select name="modelo" id="modelo input4" class="select-css"  onkeypress="nextFocus('input4', 'input5');" required>
                        <option value=" ">Seleccionar...</option>
                        <?php
                        $local;
                        if($tipo!="accesorio"){                        
                        $local=consulta_orden_asc($conexion,"modelo","Nombre");
                        while($item=$local->fetch(PDO::FETCH_OBJ)){?>
                            <option value="<?php echo $item->Nombre; ?>"><?php echo $item->Nombre; ?></option>
                        <?php }}else{
                        $local=consulta_orden_asc($conexion,"modeloaccesorio","Nombre");
                        while($item=$local->fetch(PDO::FETCH_OBJ)){?>
                            <option value="<?php echo $item->Nombre; ?>"><?php echo $item->Nombre; ?></option>
                        <?php }}?>
                    </select>
                </td>
            </tr><?php }else{ ?>
            <tr>
                <td>
                    <p>Telefonía</p>
                </td>
                <td>
                <select name="telefonia" id="modelo input2" class="select-css" onkeypress="nextFocus('input2', 'input5');" required>
                        <option value=" ">Seleccionar...</option>
                        <?php
                        $local=consulta_orden_asc($conexion,"telefonia","Nombre");
                        while($item=$local->fetch(PDO::FETCH_OBJ)){?>
                            <option value="<?php echo $item->Nombre; ?>"><?php echo $item->Nombre; ?></option>
                        <?php } ?>
                </td>
            </tr><?php }?>
            <tr>
                <td>
                    <p>Precio Unitario </p>
                <td>
                    <input type="text" name="precio" class="boxtext" id="input5" required>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Cantidad </p>
                <td>
                    <input type="text" name="cantidad" class="boxtext" id="input5" required>
                </td>
            </tr>
        </table>
        <div class="botones">
            <button class="btn cancelar" type="reset" onclick="location.href='administrador.php'">Cancelar</button>
            <button class="btn" type="submit">Siguiente</button>
        </div>
    </form>
</body>
</html>