<?php
include('../Config/conexionbd.php');
include('../Config/metodosbd.php');
session_start();
if(!isset($_SESSION['Usuario'])&& !isset( $_SESSION['Contrasena'])){
    header('location: index.php');
}
$usu = $_SESSION['Usuario'];
$traspas=$conexion->query("SELECT MAX(NumTraspaso) FROM Traspaso") or die(print($conexion->errorInfo()));
$traspas->execute();
$Numtraspaso=0;
function tipo($tipo){
    $tipos=array(
        "telefonos"=>"IMEI",
        "accesorios"=>"SKU",
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
    <link rel="shortcut icon" href="img/logoci.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/estilocomun.css">
    <link rel="stylesheet" href="../css/reporte.css">

    <title>Traspaso</title><script src="../javascript/script.js"></script>
</head>
<body>
    <nav><button class="btn cerrar" onclick="location.href='../cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <form class="contenedor" action="" method="POST">
        <h1>Traspaso <?php echo  $Numtraspaso?></h1>
        <table>
            <?php 
                $cantidad=$_POST['cantidad'];
                for($i=0;$i<$cantidad;$i++){ ?>
                <tr>
                    <td><?php echo $tipo;?></td>
                    <td><input type="text" class="boxtext"name="<?php echo 'id'.$i;?>"></td>
                </tr>
            <?PHP } ?>
        </table>
    </form>


</body>
</html>