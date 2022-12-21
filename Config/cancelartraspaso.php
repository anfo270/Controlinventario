<?php
    include('conexionbd.php');
    session_start();
    $id=$_GET['ID'];
    $tras=$_GET['trapaso'];
    //variable de ID 
    if($_POST['pass']!=$_SESSION['Contrasena']){
        echo("<script>alert('Contraseña incorrecta')</script>");
        echo ("<script>location.href='../menu_administrador/vertraspasos.php'</script>");
    }else{
        //borramos el registro
        $res=$conexion->query("UPDATE traspaso SET Estado='CANCELADO' WHERE IMEIICC='$id' AND NumTraspaso='$tras'");
        if($res){
            echo("<script>alert('Se cancelo exitosamente el traspaso')</script>");
            echo ("<script>location.href='../menu_administrador/vertraspasos.php'</script>");
        }else{
            echo("<script>alert('No se pudo cancelar')</script>");
            echo ("<script>location.href='../menu_administrador/vertraspasos.php'</script>");
        }
    }
?>