<?php
include('../Config/conexionbd.php');
include('../Config/metodosbd.php');
session_start();
if(!isset($_SESSION['Usuario'])&& !isset( $_SESSION['Contraseña'])){
    header('location: index.php');
}
$usu = $_SESSION['Usuario'];
$traspas=consulta($conexion,"traspaso");
$traspas->execute();
function tipo($tipo){
    $tipos=array(
        "telefonos"=>"IMEI",
        "accesorios"=>"SKU",
        "sims"=>"ICC",
    );
    return $tipos[$tipo];
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
    
    <form class="contenedor" action="../Config/traspaso.php?cantidad=<?php echo $_POST['cantidad']?>&locacion=<?php echo $_POST['locacion']?>&tipo=<?php echo $_GET['tipo']?>" method="post">
        <h1>Traspaso <?php echo $_GET['tipo'];?></h1>
        <h3>Numero de traspaso: <?php echo $traspas->rowCount()+1; ?> </h3>
        <table>
            <?php
                for ($i=0; $i <$_POST['cantidad'] ; $i++) { ?>
                <tr>
                    <td><p><?php echo tipo($_GET['tipo']);?></p></td>
                    <td><input type="text" name="id<?php echo $i?>" class="boxtext"></td>
                </tr>
                <?php
                }?>
        </table>
        <div class="botones">
            <button class="btn cancelar" onclick="location.href='administrador.php'">Cancelar</button>
            <button class="btn" type="submit">Aceptar</button>
        </div>
    </form>
</body>
</html>
?>