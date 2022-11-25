<?php
require('../Config/metodosbd.php');
require('../Config/conexionbd.php');
session_start();
if(!isset($_SESSION['Usuario'])&& !isset( $_SESSION['Contrasena'])){
    header('location: ../index.php');
}
$usu = $_SESSION['Usuario']
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

    <title>Compras</title>
    <script src="../javascript/script.js"></script>
</head>
<body>

    <nav><button class="btn cerrar" onclick="location.href='../cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="../menu.php">🏠</a></li>
            <li><a href="administrador.php">Administrador</a></li>
            <li>Compras</li>
        </ul>
    </div>
    <form action="compras2.php?tipo=<?php echo $_GET['tipo'];?>" method="post" class="contenedor">
        <h1>Ingreso</h1>
        <table>
            <tr>
                <td>
                    <p>Factura:</p>
                </td>
                <td>
                    <input type="text" name="Factura" class="boxtext" id="input1" onkeypress="nextFocus('input1', 'input2');">
                </td>
            </tr><?php if($_GET['tipo']!="sims"){?>
            <tr>
                <td>
                    <p>Proveedor:</p>
                </td>
                <td>
                    <select name="proveedor" id="proveedor input2" class="select-css" onkeypress="nextFocus('input2', 'input3');">
                        <option value=" ">Seleccionar...</option>
                        <?php
                        $local=consulta($conexion,"proveedor");
                        while($item=$local->fetch(PDO::FETCH_OBJ)){?>
                            <option value="<?php echo $item->Nombre; ?>"><?php echo $item->Nombre; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Marcas:</p>
                </td>
                <td>
                    <select name="marcas" id="marcas input3" class="select-css"  onkeypress="nextFocus('input3', 'input4');">
                        <option value=" ">Seleccionar...</option>
                        <?php
                        $local=consulta($conexion,"marcas");
                        while($item=$local->fetch(PDO::FETCH_OBJ)){?>
                            <option value="<?php echo $item->Nombre; ?>"><?php echo $item->Nombre; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Modelo:</p>
                </td>
                <td>
                    <select name="modelo" id="modelo input4" class="select-css"  onkeypress="nextFocus('input4', 'input5');">
                        <option value=" ">Seleccionar...</option>
                        <?php
                        $local;
                        if($_GET['tipo']!="accesorio"){                        
                        $local=consulta($conexion,"modelo");
                        while($item=$local->fetch(PDO::FETCH_OBJ)){?>
                            <option value="<?php echo $item->Nombre; ?>"><?php echo $item->Nombre; ?></option>
                        <?php }}else{
                        $local=consulta($conexion,"modeloaccesorio");
                        while($item=$local->fetch(PDO::FETCH_OBJ)){?>
                            <option value="<?php echo $item->Nombre; ?>"><?php echo $item->Nombre; ?></option>
                        <?php }}?>
                    </select>
                </td>
            </tr><?php }else{ ?>
            <tr>
                <td>
                    <p>Telefonía</p>
                </td>
                <td>
                <select name="telefonia" id="modelo input2" class="select-css" onkeypress="nextFocus('input2', 'input5');">
                        <option value=" ">Seleccionar...</option>
                        <?php
                        $local=consulta($conexion,"telefonia");
                        while($item=$local->fetch(PDO::FETCH_OBJ)){?>
                            <option value="<?php echo $item->Nombre; ?>"><?php echo $item->Nombre; ?></option>
                        <?php } ?>
                </td>
            </tr><?php }?>
            <tr>
                <td>
                    <p>Precio Unitario </p>
                <td>
                    <input type="text" name="precio" class="boxtext" id="input5">
                </td>
            </tr>
            <tr>
                <td>
                    <p>Cantidad </p>
                <td>
                    <input type="text" name="cantidad" class="boxtext" id="input5">
                </td>
            </tr>
        </table>
        <div class="botones">
            <button class="btn cancelar" type="reset" onclick="location.href='administrador.php'">Cancelar</button>
            <button class="btn" type="submit">Siguiente</button>
        </div>
    </div>
</body>
</html>