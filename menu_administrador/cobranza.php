<?php
session_start();
if(!isset($_SESSION['Usuario'])&& !isset( $_SESSION['Contraseña'])){
    header('location: index.php');
}
$usu = $_SESSION['Usuario'];
$cortecaja=$_GET['cortecaja'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logoci.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/estilocomun.css">
    <link rel="stylesheet" href="../css/ventas.css">
    <title>Men&uacute;</title>
</head>
<body>
    <nav><button class="btn cerrar" id="cerrar" onclick="location.href='../cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">   
        <ul class="breadcrumb">
        <?php
            if($_SESSION['Puesto']=="RESPONSABLE"){
                echo("<li><a href='../menu_responsable/inventario.php'>🏠</a></li>");
                $cortecaja=$_GET['cortecaja'];
            }else{
                echo("  <li><a href='../menu.php'>🏠</a></li><li><a href='administrador.php'>Administrador</a></li><li>Cobranza</li>");
                $cortecaja="";
            }
            ?>
        </ul>

    </div>
    <form class="contenedor" action="../Config/inventaroppvd.php?señal=3&cortecaja=<?php echo $cortecaja?>" method="post">
        <h1>Seleccionar la fecha</h1>
        <!--<input type="date" name="date" id="date" required pattern="\d{4}/\d{2}/\d{2}"   >-->
        agregar un rango de fechas
        <p>D&iacute;a:</p>
        <select type='text' name='date_d' class='boxtext' placeholder='Elige financiera' class='select-css'>
            <?php
            for($i=1;$i<=9;$i++){
                echo "<option>0$i</option>";
            }
            for($i=10;$i<=31;$i++){
                echo "<option>$i</option>";
            }
            ?>
        </select>
        <p>Mes:</p>
        <select type='text' name='date_m' class='boxtext' placeholder='Elige financiera' class='select-css'>
            <?php
            for($i=1;$i<=9;$i++){
                echo "<option>0$i</option>";
            }
            for($i=10;$i<=12;$i++){
                echo "<option>$i</option>";
            }
            ?>
        </select>
        <p>A&ntilde;o:</p>
        <select type='text' name='date_y' class='boxtext' placeholder='Elige financiera' class='select-css'>
            <?php
            for($i=2022;$i<=2099;$i++){
                echo "<option>$i</option>";
            }
            ?>
        </select><br>
        <div class="botones">
            <button class="btn cancelar"type="reset">Cancelar</button>
            <button class="btn"type="submit">Aceptar</button>
        </div>
    </form>
</body>
</html>