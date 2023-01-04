<?php
session_start();
if(!isset($_SESSION['Usuario'])&& !isset( $_SESSION['Contrasena'])){
    header('location: ../index.php');
}
$usu = $_SESSION['Usuario'];
$cortecaja=$_GET['cortecaja'];

date_default_timezone_set('America/Denver');
$FechaDia = date('d', time());
$FechaMes = date('m', time());
$FechaAnio = date('Y', time());
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logoci.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/estilocomun.css">
    <link rel="stylesheet" href="../css/ventas.css">
    <title>Men&uacute;</title>
</head>
<body>
    <nav><button class="btn cerrar" id="cerrar" onclick="location.href='../cerrar.php'">Cerrar Sesi&oacute;n</button><?PHP echo "<p>$usu</p>" ?></nav>
    <div class="bdcrumb">   
        <ul class="breadcrumb">
            <li><a href='../menu.php'>🏠</a></li>
        </ul>

    </div>
    <form class="contenedor" action="../Config/genrep_74.php?señal=3&cortecaja=<?php echo $cortecaja; ?>" method="post">
        <h1>Seleccionar la fecha</h1>
        
        <h3>Desde</h3>
        <p>D&iacute;a:
        <select type='text' name='date_d' class='boxtext' class='select-css'>
            <?php
            if($FechaDia<=9){
                echo "<option value='$FechaDia'>$FechaDia</option>";
            }else if($FechaDia>=10){
                echo "<option value='$FechaDia'>$FechaDia</option>";
            }
            for($i=1;$i<=9;$i++){
                echo "<option value='0$i'>0$i</option>";
            }
            for($i=10;$i<=31;$i++){
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select>
        Mes:
        <select type='text' name='date_m' class='boxtext' class='select-css'>
            <?php
            if($FechaMes<=9){
                echo "<option value='$FechaMes'>$FechaMes</option>";
            }else if($FechaMes>=10){
                echo "<option value='$FechaMes'>$FechaMes</option>";
            }
            for($i=1;$i<=9;$i++){
                echo "<option value='0$i'>0$i</option>";
            }
            for($i=10;$i<=12;$i++){
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select>
        A&ntilde;o:
        <select type='text' name='date_y' class='boxtext' class='select-css'>
            <?php
            echo "<option value='$FechaAnio'>$FechaAnio</option>";
            for($i=2022;$i<=2030;$i++){
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select></p><br>
        
        <h3>Hasta</h3>
        <p>D&iacute;a:
        <select type='text' name='date_d2' class='boxtext' class='select-css'>
            <?php
            if($FechaDia<=9){
                echo "<option value='$FechaDia'>$FechaDia</option>";
            }else if($FechaDia>=10){
                echo "<option value='$FechaDia'>$FechaDia</option>";
            }
            for($i=1;$i<=9;$i++){
                echo "<option value='0$i'>0$i</option>";
            }
            for($i=10;$i<=31;$i++){
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select>
        Mes:
        <select type='text' name='date_m2' class='boxtext' class='select-css'>
            <?php
            if($FechaMes<=9){
                echo "<option value='$FechaMes'>$FechaMes</option>";
            }else if($FechaMes>=10){
                echo "<option value='$FechaMes'>$FechaMes</option>";
            }
            for($i=1;$i<=9;$i++){
                echo "<option value='0$i'>0$i</option>";
            }
            for($i=10;$i<=12;$i++){
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select>
        
        A&ntilde;o:
        <select type='text' name='date_y2' class='boxtext' class='select-css'>
            <?php
            echo "<option value='$FechaAnio'>$FechaAnio</option>";
            for($i=2022;$i<=2030;$i++){
                echo "<option value='$i'>$i</option>";
            }
            ?>
        </select></p><br><br>
        <p>Formato de reporte: 
            <select type='text' name='tipo_archivo' class='boxtext' class='select-css'>
                <option value="xlsx">EXCEL</option>
                <option value="pdf">PDF</option>
            </select>
        </p>
        <br>
        <p><div class="botones">
            <button class="btn cancelar"type="reset">Cancelar</button>
            <button class="btn"type="submit">Aceptar</button>
        </div></p>
    </form>
</body>
</html>