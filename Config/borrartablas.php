<?php
session_start();
if($_POST['pass']!=$_SESSION['Contrasena']){
    echo '<script>alert("Contraseña incorrecta")</script>';
    echo ("<script>location.href='../menu_sistema/sistema.php'</script>");
}else{
    echo '<script>alert("Esta funci\u00F3n no est\u00e1 disponible por el momento.")</script>';
    echo ("<script>location.href='../menu_sistema/sistema.php'</script>");
}
?>