<?php
    require('../Config/conexionbd.php');
    require('../Config/metodosbd.php');
    session_start();

    if(!isset($_SESSION['Usuario'])&& !isset( $_SESSION['Contrasena'])){
        header('location: ../index.php');
    }
    $usu = $_SESSION['Usuario'];

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
    <link rel="stylesheet" href="../css/menus.css">
    <title>Men&uacute; inventario</title>
    <script type="text/javascript"></script>
</head>
<body>
    <nav><button class="btn cerrar" onclick="location.href='../cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="../menu.php">🏠</a></li>
            <li><a href="inventario.php">Responsable</a></li>
            <li><a href="reporte.php">Reporte</a></li>
            <li>Consulta</li>
        </ul>
    </div>
    <div class="contenedor">
        <h2>Consulta</h2>
        <form action="consulta.php" method="post">
            <p>Seleccionar el modelo:</p>
            <select name="modelo" id="" class="select-css">
                <option value="">Seleccionar...</option>
                <?php
                    $consulta=consulta($conexion,"modelo");
                    while($item=$consulta->fetch(PDO::FETCH_OBJ)){?>
                        <option value="<?php echo $item->Nombre ?>"><?php echo $item->Nombre ?></option>
                    <?PHP }
                ?>
            </select>
            <div class="botones">
                <button type="submit" class="btneditar" >Buscar</button>
            </div>
        </form>
    </div>
</body>
</html>