<?php
include('conexionbd.php');
session_start();
$Local=$_POST['Local'];

if($_GET['identificador']==2){
    $id_use=$_GET['id'];
    //revisar
    $actualizar=actualizar($conexion,$id_use,$Local);
    if($actualizar){
        $_SESSION['Local']=$Local;
        echo "<script>alert('Se modific\u00F3 el usuario.');</script>"; 
        echo "<script>location.href='../menu_responsable/usuarios.php'</script>";
    }else{
        echo "<script>alert('No se modific\u00F3 el usuario.');</script>";
        echo "<script>location.href='../menu_responsable/usuarios.php'</script>";
    }
}else{
    echo "<script>alert('No se pudo realizar ninguno de los cambios.');</script>"; 
    echo "<script>location.href='../menu_responsable/usuarios.php'</script>";
}


function actualizar($conexion,$id_use,$local){
    $Local="Local";
    $res=$conexion->query("UPDATE usuarios SET $Local='$local' WHERE ID='$id_use'") or die(print_r($conexion->errorInfo()));
    return $res;
}
?>