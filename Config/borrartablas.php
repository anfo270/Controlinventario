<?php
session_start();
if($_POST['pass']!=$_SESSION['Contraseña']){
    echo '<script>alert("Contraseña incorrecta")</script>';
    echo ("<script>location.href='../menu_sistema/sistema.php'</script>");
}
?>