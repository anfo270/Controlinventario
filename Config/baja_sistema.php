<?php
    session_start();
    include('../Config/conexionbd.php');
    if (!isset($_SESSION['Usuario']) && !isset($_SESSION['Contraseña'])) {
        header('location: index.php');
    }

    $tab="";
    $tm="";
    $nombre="";
    $volver=getenv('HTTP_REFERER');
    
    $nombre=$_POST['nf'];
    $tab=$_POST['tipoAB'];
    
    if($tab=="o13n1rio"){
        $tm="financiera";
    }else if($tab=="08sdcac"){
        $tm="marcas";
    }else if($tab=="24jlbn6hk"){
        $tm="activacion";
    }else if($tab=="7b65njlk"){
        $tm="locacion";
    }else if($tab=="ac9a089c"){
        $tm="proveedor";
    }if($tab=="ac9a089casd"){
        $tm="modeloaccesorio";
    }else if($tab=="ac9a089casfsadsd"){
        $tm="modelo";
    }else if($tab=="68duio0c"){
        $tm="marcarecargas";
    }

    if($nombre == "Seleccionar..."){
        echo '<script>alert("Por favor, selecciona informaci\u00F3n v\u00E1lida de ' . $tm . '.")</script> ';
        echo "<script>location.href='$volver'</script>";
    }else if($nombre == "" || $tab == "" || $tm == ""){
        header("location: ..\menu_sistema/sistema.php");
    }else{
        $res=$conexion->query("DELETE FROM $tm WHERE nombre = '$nombre'") or die(print($conexion->errorInfo()));
        if(!$res){
            echo '<script>alert("Se produjo un error, vuelve a intentarlo.")</script> ';
            echo "<script>location.href='$volver'</script>";
        } 
        else
        {
            echo '<script>alert("'.$nombre.' se elimin\u00F3 correctamente.")</script> ';
            echo "<script>location.href='$volver'</script>";
        }
    }
    
?>