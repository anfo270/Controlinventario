<?php
include('../Config/metodosbd.php');
include('../Config/conexionbd.php');
session_start();
if (!isset($_SESSION['Usuario']) && !isset($_SESSION['Contrasena'])) {
    header('location: index.php');
}
$usu = $_SESSION['Usuario'];
$res=$conexion->query("SELECT *FROM usuarios WHERE ID=$_GET[id]") or die(print($conexion->errorInfo()));
if(!$item=$res->fetch(PDO::FETCH_OBJ)){
    echo '<script>alert("No se puede acceder al usuario")</script>';
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logoci.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/estilocomun.css">
    <link rel="stylesheet" href="../css/menus.css">
    <link rel="stylesheet" href="../css/reporte.css">
    <link rel="stylesheet" href="../css/popup.css">
    <title>Editar usuario</title>
</head>
    <script src="../javascript/popup.js"></script>
<body>
    <nav><button class="btn cerrar" id="cerrar" onclick="location.href='../cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="../menu.php">🏠</a></li>
            <li><a href="inventario.php">Responsable</a></li>
            <li><a href="usuarios.php">Usuarios</a></li>
            <li>Editar</li>
        </ul>
    </div>
    <div class="contenedor">
        <h1>Editar Usuario</h1>
        <form action="../Config/nuevo_usuario_responsable.php?identificador=<?php echo 2;?>&id=<?php echo $item->ID ?>" method="post">
            <table class="tabla_usuarios">
                <tr>
                    <td><p>Nombre:</p></td><td><?php echo "<p>$item->Nombre</p>" ?></td>
                </tr>
                <tr>
                    <td><p>Apellido Paterno:</p></td><td> <?php echo "<p>$item->Apellido_Paterno</p>"; ?></td>
                </tr>
                <tr>
                    <td><p>Apellido Materno:</p></td><td><?php echo "<p>$item->Apellido_Materno</p>"?></td>
                </tr>
                <tr>
                    <td><p>Puesto:</p></td><td> <?php echo "<p>$item->Puesto</p>"; ?></td>
                </tr>
                <tr>
                    <td><p>Local</p></td>
                    <td>
                    <select name="Local" id="Local" class="select-css">
                        <option value=" ">Seleccionar...</option>
                        <?php
                        $local=consulta($conexion,"locacion");
                        while($item=$local->fetch(PDO::FETCH_OBJ)){?>
                            <option value="<?php echo $item->Nombre; ?>"><?php echo $item->Nombre; ?></option>
                        <?php } ?>
                    </select>
                    </td>
                </tr>
            </table>
            <div class="botones">
            <button type="reset" class="btn reset" >Cancelar</button>
            <button type="submit" class="btn" >Guardar</button>
        </div>
        </form>

    </div>

</body>

</html>