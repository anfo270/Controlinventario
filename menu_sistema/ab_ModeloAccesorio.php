<?php
session_start();
include('../Config/metodosbd.php');
include('../Config/conexionbd.php');
if (!isset($_SESSION['Usuario']) && !isset($_SESSION['Contrasena'])) {
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
    <link rel="stylesheet" href="../css/menus.css">
    <title>Alta y Baja de Modelo Accesorio</title>
</head>
<body>
    <nav><button class="btn cerrar" id="cerrar" onclick="location.href='../cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">
        <ul class="breadcrumb">
            <li><a href="../menu.php">🏠</a></li>
            <li><a href="sistema.php">Sistema</a></li>
            <li>Modelo Accesorio</li>
        </ul>
    </div>
    <div class="contenedor">
        <div class="formSistema">
        <h1 style="color: #00047F">Agregar modelo del accesorio</h1>
            <form method="POST" action="../Config/alta_sistema.php"><center>
                <input name="tipoAB" value="ac9a089casd" hidden>
                <input type="text" name="nf" class="boxtext" placeholder="Modelo de dispositivo (A22, G41...)" required><br><br>
                <button type="submit" class="btnagregar">Agregar</button></center>
            </form>
        </div>
        <div class="formSistema">
        <h1 style="color: #00047F">Eliminar modelo del accesorio</h1>
            <form method="POST" action="../Config/baja_sistema.php"><center>
                <input name="tipoAB" value="ac9a089casd" hidden>
                <?php
                $res = consulta($conexion,"modeloaccesorio");
                if ($res->rowCount() > 0){
                    echo "<select type='text' name='nf' class='boxtext' placeholder='Elige Modelo Accesorio' class='select-css'>";
                    ?>
                    <option>Seleccionar...</option>
                    <?php
                    while($row = $res->fetch()){
                        echo "<option value='".$row["Nombre"]."'>".$row["Nombre"]."</option>";
                    }
                    echo "</select><br><br>";
                    
                } else{
                    echo "<p>No se encontraron Modelo Accesorioes.</p>";
                }
                ?>
                <button type="submit" class="btnagregar btncerrar">Quitar</button></center>
            </form>
        </div>
    </div>
</body>
</html>