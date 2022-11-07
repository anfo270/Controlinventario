<?php
    session_start();
    include('../Config/conexionbd.php');
    if (!isset($_SESSION['Usuario']) && !isset($_SESSION['Contraseña'])) {
        header('location: index.php');
    }

    $tab="";
    $tm="";
    $nombre="";
    
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
    }else if($tab=="24jlbn6hkll"){
        $tm="telefonia";
    }

    $res=$conexion->query("INSERT INTO $tm (nombre) VALUES ('$nombre')") or die(print($conexion->errorInfo()));
    if(!$res){
        echo 'Se produjo un error, vuelva a intentarlo.';
        echo "<script>location.href='../menu_sistema/sistema.php'</script>";
    } 
    else
    {
        echo '<script>alert("'.$nombre.' se agreg\u00F3 correctamente.")</script> ';
        echo "<script>location.href='../menu_sistema/sistema.php'</script>";
    }
?>