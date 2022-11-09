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
    
    <form class="contenedor" action="traspaso2.php?tipo=<?php echo $_GET['tipo'];?>" method="post">
        <h1>Traspaso <?php echo $_GET['tipo'];?></h1>
        <h3>Numero de traspaso: <?php echo $traspas->rowCount()+1; ?> </h3>
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
            <button class="btn cancelar" onclick="location.href='administrador.php'">Cancelar</button>
            <button class="btn" type="submit">Aceptar</button>
        </div>
    </form>
</body>
</html>
?>