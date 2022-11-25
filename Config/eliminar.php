<?php
    session_start();
    include('conexionbd.php');
    //variable de ID 
    $id=intval($_GET['ID_usuarios']);
    if($_POST['pass']!=$_SESSION['Contrasena']){
        echo("<script>alert('Contraseña incorrecta')</script>");
        echo ("<script>location.href='../menu_administrador/Usuarios.php'</script>");
    }else{
        //borramos el registro
        $res=$conexion->query("DELETE FROM usuarios WHERE ID='$id'") or die(print_r($conexion->errorInfo()));
        if($res){
            echo("<script>alert('Se elimino existosamente el usuario')</script>");
            echo ("<script>location.href='../menu_administrador/Usuarios.php'</script>");
        }else{
            echo("<script>alert('No se pudo eliminar')</script>");
            echo ("<script>location.href='../menu_administrador/Usuarios.php'</script>");
        }
        if($id== $_SESSION['ID']){
            header('location: ..\cerrar.php');
        }   
    }
?>