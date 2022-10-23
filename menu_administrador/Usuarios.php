<?php
include('../Config/conexionbd.php');
session_start();
if (!isset($_SESSION['Usuario']) && !isset($_SESSION['Contraseña'])) {
    header('location: index.php');
}
$usu = $_SESSION['Usuario']
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
    <title>Usuario</title>
</head>

<body>
    <nav><button class="btn cerrar" id="cerrar" onclick="location.href='../cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="menu.php">Men&uacute;</a></li>
            <li>Administrador</li>
        </ul>
    </div>
    <div class="contenedor">
        <h1>Usuarios</h1>
        <table>
        
            <tr><td><button class="btn" onclick="location.href='#.php'">Agregar</button></td></tr>
        </table>
        <table>
            <tr>
                <td class="titulo">Nombre</td>
                <td class="titulo">Apellidos</td>
                <td class="titulo">Contraseña</td>
                <td class="titulo">Puesto</td>
                <td class="titulo">Local</td>
                <td></td>
                <td></td>
            </tr>
        </table>
        <?php
        $res = $conexion->query("SELECT * FROM usuarios") or die(print($conexion->errorInfo()));
        while ($item = $res->fetch(PDO::FETCH_OBJ)) { ?>

                <table>
                    <tr>
                        <td><?php echo $item->Nombre; ?></td>
                        <td><?php echo $item->Apellidos; ?></td>
                        <td><?php echo $item->Contraseña; ?></td>
                        <td><?php echo $item->Puesto; ?></td>
                        <td><?php echo $item->Local; ?></td>
                        <td><button class='btn reset' onclick="location.href='../Config/eliminar.php?ID_usuarios=<?php echo $item->ID;?>'">Eliminar</button></td>
                        <td><button class='btn' onclick="location.href='#.php'">Editar</button> </td>
                    </tr>
                </table>

        <?php } ?>
    </div>
</body>

</html>