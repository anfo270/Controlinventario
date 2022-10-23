<?php
    session_start();
    include('conexionbd.php');
    $id=intval($_GET['ID_usuarios']);

    $res=$conexion->query("DELETE FROM usuarios WHERE ID='$id'") or die(print($conexion->errorInfo()));
    if($res){
        echo("<script>Se elimino existosamente el usuario</script>");
        echo "<script>location.href='../menu_administrador/Usuarios.php'</script>";
    }else{
        echo("No se pudo eliminar");
        echo "<script>location.href='../menu_administrador/Usuarios.php'</script>";
    }
    if($id== $_SESSION['ID']){
        header('location: ..\cerrar.php');
    }
?>