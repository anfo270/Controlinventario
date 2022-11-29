<?php
include('../Config/conexionbd.php');
include('../Config/metodosbd.php');
session_start();
if(!isset($_SESSION['Usuario'])&& !isset( $_SESSION['Contrasena'])){
    header('location: ../index.php');
}
$controlinput=0;
$cantidad=$_POST['cantidad'];
$locacion=$_POST['locacion'];
$usu = $_SESSION['Usuario'];
$tipoTraspaso=$_GET['tipo'];
$traspas=$conexion->query("SELECT MAX(NumTraspaso) FROM traspaso") or die(print_r($conexion->errorInfo()));
$traspas->execute();
$Numtraspaso=0;
function tipo($tipo){
    $tipos=array(
        "telefonos"=>"IMEI",
        "accesorio"=>"SKU",
        "sims"=>"ICC",
    );
    return $tipos[$tipo];
}
$tipo=tipo($_GET['tipo']);
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
        if($tipoTraspaso=="sims"){
            echo '<title>Traspaso - SIMs</title>';
        }else if($tipoTraspaso=="telefonos"){
            echo '<title>Traspaso - Tel&eacute;fonos</title>';
        }else if($tipoTraspaso=="accesorio"){
            echo '<title>Traspaso - Accesorios</title>';
        }
    ?>
</head>
<body>
    <nav><button class="btn cerrar" onclick="location.href='../cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <form class="contenedor" action="../config/traspasoMetodos.php" method="POST">
        <h1>Traspaso <?php echo  $Numtraspaso?></h1>
        <input type="text" name="Numtraspaso" value="<?php echo $Numtraspaso;?>" hidden>

    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="../menu.php">🏠</a></li>
            <li><a href="administrador.php">Administrador</a></li>
            <li><a href="SeleccionarTipotraspaso.php">Traspaso</a></li>
            <?php
                if($tipoTraspaso=="sims"){
                    echo '<li>SIMs</li>';
                }else if($tipoTraspaso=="telefonos"){
                    echo '<li>Tel&eacute;fonos</li>';
                }else if($tipoTraspaso=="accesorio"){
                    echo '<li>Accesorios</li>';
                }
            ?>
        </ul>
    </div>
    <form class="contenedor" method="post" action="../Config/traspasoMetodos.php?tipo=<?php echo $tipoTraspaso.'&NumTraspaso='.$Numtraspaso.'&cantidad='.$cantidad.'&locacion='.$locacion; ?>">
    <?php
        if($tipoTraspaso=="sims"){
            echo '<h1>Traspaso de SIMs</h1>';
        }else if($tipoTraspaso=="telefonos"){
            echo '<h1>Traspaso de Tel&eacute;fonos</h1>';
        }else if($tipoTraspaso=="accesorio"){
            echo '<h1>Traspaso de Accesorios</h1>';
        }
    ?>
    <h3>Traspaso: <?php echo $Numtraspaso;?></h3>
        <table>
            <?php for($i=0;$i<$cantidad;$i++){ ?>
                <tr>
                    <td><?php echo $tipo;?></td>
                    <td><input type="text" class="boxtext" name="<?php echo 'id'.$i;?>" required></td>
                </tr>
            <?PHP } ?>
        </table>
        <input type="text" name="cantidad" value="<?php echo $cantidad;?>" hidden>
        <input type="text" name="tipo" value="<?php echo $_GET['tipo'];?>" hidden>
        <input type="text" name="locacion" value="<?php echo $_POST['locacion'];?>" hidden>
        <div class="botones">
            <button type="reset" class="btn cancelar" onclick="location.href='../menu_administrador/administrador.php'" >Cancelar</button>
            <button type="submit" class="btn" >Guardar</button>
    </form>
</body>
</html>