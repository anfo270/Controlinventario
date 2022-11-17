<?php
include('../Config/metodosbd.php');
include('../Config/conexionbd.php');
session_start();
if (!isset($_SESSION['Usuario']) && !isset($_SESSION['Contraseña'])) {
    header('location: index.php');
}
$usu = $_SESSION['Usuario'];
$local = $_SESSION['Local'];
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
    <title>Usuario</title>
</head>

<body>

    <nav><button class="btn cerrar" id="cerrar" onclick="location.href='../cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="../menu.php">🏠</a></li>
            <li><a href="inventario.php">Responsable</a></li>
            <li>Usuarios</li>
        </ul>
    </div>
    <div class="contenedor">
        <h1>Usuarios</h1>
        <table>
        
            <tr><td></td></tr>
        </table>
        <table>
            <tr>
                <td class="titulo">Nombre</td>
                <td class="titulo">Apellido Paterno</td>
                <td class="titulo">Apellidos Materno</td>
                <td class="titulo">Usuario</td>
                <td class="titulo">Contraseña</td>
                <td class="titulo">Puesto</td>
                <td class="titulo">Local</td>
                <td></td>
            </tr>
        </table>
        <?php
        $res = busqueda($conexion,"usuarios", "Local",$local);
        while ($item = $res->fetch(PDO::FETCH_OBJ)) { 
            ?>

                <table class="bordes">
                    <tr><?php $id=$item->ID; ?>
                        <td><?php echo $item->Nombre; ?></td>
                        <td><?php echo $item->Apellido_Paterno; ?></td>
                        <td><?php echo $item->Apellido_Materno; ?></td>
                        <td><?php echo $item->Usuario; ?></td>  
                        <td><?php echo $item->Contraseña; ?></td>
                        <td><?php echo $item->Puesto; ?></td>
                        <td><?php echo $item->Local; ?></td>
                        
                        <td><button class='btn' onclick="location.href='editar_usuario.php?id= <?php echo $id= $item->ID; ?>'">Editar</button> </td>
                    </tr>
                </table>

        <?php } ?>
        <div class="modal-contenedor" id="modal-contenedor">
            <div class="model">
                    <form action="../Config/eliminar.php?ID_usuarios=<?php echo $id;?>" method="post">
                        <p>Ingresa tu contraseña para confirmar<input type="password" name="pass" id="pass" ></p>
                        <button id="" class="btn reset" id='cancelar' onclick= "document.getElementById('modal-contenedor').style.visibility='hidden'">Cancelar</button>
                        <button class="btn" id="aceptar" type="submit" >Aceptar</button>
                    </form>
            </div>
        </div>
        
    </div>
</body>

</html>