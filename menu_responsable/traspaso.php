<?php
include('../Config/conexionbd.php');
include('../Config/metodosbd.php');
session_start();
if(!isset($_SESSION['Usuario'])&& !isset( $_SESSION['Contrasena'])){
    header('location: ../index.php');
}
$usu = $_SESSION['Usuario'];
$sucursal = $_SESSION['Local'];
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

    <title>Traspaso</title>
</head>
<body>
    <nav><button class="btn cerrar" onclick="location.href='../cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="../menu.php">🏠</a></li>
            <li><a href="inventario.php">Responsable</a></li>
            <li>Traspaso</li>
        </ul>
    </div>
    <div class="contenedor">
        <form action="traspasorecibir.php" method="GET">
            <h1>Traspasos</h1>
            <h3>
                Consultar n&uacute;mero de traspaso:
                <input type="text" name="numero" class="boxtext" required>
            </h3>
            <div class="botones">
                <button class="btn" type="submit">Aceptar</button>
                <button class="btn cancelar" type="reset" onclick="location.href='inventario.php'">Cancelar</button>
            </div>
        </form>

        <table class="">
            <tr>
                <th class="titulo">N&uacute;m. traspaso</th>
                <th class="titulo">Destino</th>
                <th class="titulo"></th>
            </tr>
        </table>
        <?php
        $trapasos=$conexion->query("SELECT DISTINCT NumTraspaso from traspaso WHERE Estado='PENDIENTE DE RECIBIR' AND LocacionDestino = '$sucursal' ORDER BY NumTraspaso DESC") or die(print_r($conexion->errorInfo()));
        while ($item = $trapasos->fetch(PDO::FETCH_OBJ)) { 
            ?>
            <table class="bordes-corte">
                <tr>
                    <td class="bordes-corte">
                        <input name="numero" value="<?php echo $item->NumTraspaso; ?>" hidden><?php echo $item->NumTraspaso; ?>
                    </td>
                    <td><?php echo $sucursal; ?></td>
                    <td><button class="btn" type="submit" onclick="location.href='traspasorecibir.php?numero=<?PHP echo $item->NumTraspaso; ?>'">Ver detalles</button></td>
                </tr>
            </table>
        <?php } ?>
    </div>
</body>
</html>