<?php
include('../Config/conexionbd.php');
include('../Config/metodosbd.php');
session_start();
if(!isset($_SESSION['Usuario'])&& !isset( $_SESSION['Contrasena'])){
    header('location: ../index.php');
}
$usu = $_SESSION['Usuario'];
$tipo = $_GET['tipo'];

$traspas=$conexion->query("SELECT MAX(NumTraspaso) FROM Traspaso") or die(print_r($conexion->errorInfo()));
$traspas->execute();
if($traspas->rowCount()==0){
    $Numtraspaso=1;
}else{
    while($row = $traspas->fetch()){
        $Numtraspaso=$row["MAX(NumTraspaso)"]+1;
    }
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
        if($tipo=="sims"){
            echo '<title>Traspaso - SIMs</title>';
        }else if($tipo=="telefonos"){
            echo '<title>Traspaso - Tel&eacute;fonos</title>';
        }else if($tipo=="accesorio"){
            echo '<title>Traspaso - Accesorios</title>';
        }
    ?>
</head>
<body>
    <nav><button class="btn cerrar" onclick="location.href='../cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="../menu.php">🏠</a></li>
            <li><a href="administrador.php">Administrador</a></li>
            <li><a href="SeleccionarTipotraspaso.php">Traspaso</a></li>
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
    <form class="contenedor" action="traspaso2.php?tipo=<?php echo $tipo;?>" method="post">
    <?php
        if($tipo=="sims"){
            echo '<h1>Traspaso de SIMs</h1>';
        }else if($tipo=="telefonos"){
            echo '<h1>Traspaso de Tel&eacute;fonos</h1>';
        }else if($tipo=="accesorio"){
            echo '<h1>Traspaso de Accesorios</h1>';
        }
    ?>
    <h3>N&uacute;mero de traspaso: <?php echo $Numtraspaso; ?> </h3>
        <table>
            <tr>
                <td><p>Ingresa cantidad:</p></td>
                <td><input type="text" name="cantidad" id="cantidad" class="boxtext"></td>
            </tr>
            <tr>
                <td><p>Seleccionar local a enviar:</p></td>
                <td>
                    <select name="locacion" class="select-css">
                        <option value="">Seleccionar...</option>
                        <?php
                        $local=consulta($conexion,"locacion");
                        while($item=$local->fetch(PDO::FETCH_OBJ)){?>
                            <option value="<?php echo $item->Nombre; ?>"><?php echo $item->Nombre; ?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
        </table>
        <div class="botones">
            <button class="btn cancelar" type="reset" onclick="location.href='administrador.php'">Cancelar</button>
            <button class="btn" type="submit">Aceptar</button>
        </div>
    </form>
</body>
</html>
?>