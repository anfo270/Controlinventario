<?php
require('../Config/metodosbd.php');
require('../Config/conexionbd.php');
session_start();
if(!isset($_SESSION['Usuario'])&& !isset( $_SESSION['Contraseña'])){
    header('location: index.php');
}
$usu = $_SESSION['Usuario']
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

    <title>Compras</title>
    <script src="javascript/script.js"></script>
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
    <form action="compras2.php" method="post" class="contenedor">
        <h1>Ingreso</h1>
        <table>
            <tr>
                <td>
                    <p>Factura:</p>
                </td>
                <td>
                    <input type="text" name="Factura" class="boxtext" id="input1" onkeypress="nextFocus('input1', 'input2')">
                </td>
            </tr>
            <tr>
                <td>
                Tipo:
                </td>
                <td>
                    <ol>
                        <li><p><input type="radio" name="Tipo" value="sims"> Sims</p></li>
                        <li><p><input type="radio" name="Tipo" value="telefonos"> Equipo</p></li>
                        <li><p><input type="radio" name="Tipo" value="accesorio"> Accesorio</p></li>
                    </ol>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Proveedor:</p>
                </td>
                <td>
                    <select name="proveedor" id="proveedor" class="select-css">
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
                    <select name="marcas" id="marcas" class="select-css">
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
                    <select name="modelo" id="modelo" class="select-css">
                        <option value=" ">Seleccionar...</option>
                        <?php
                        $local=consulta($conexion,"modelo");
                        while($item=$local->fetch(PDO::FETCH_OBJ)){?>
                            <option value="<?php echo $item->Nombre; ?>"><?php echo $item->Nombre; ?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <p>Cantidad </p>
                <td>
                    <input type="text" name="cantidad" class="boxtext" id="input4">
                </td>
            </tr>
        </table>
        <div class="botones">
            <button class="btn cancelar" type="reset">Cancelar</button>
            <button class="btn" type="submit">Siguiente</button>
        </div>
    </div>
</body>
</html>