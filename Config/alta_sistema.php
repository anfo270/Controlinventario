<?php
    session_start();
    include('../Config/conexionbd.php');
    if (!isset($_SESSION['Usuario']) && !isset($_SESSION['Contrasena'])) {
        header('location: index.php');
    }

    $tab="";
    $tm="";
    $nombre="";
    $nf_ModeloTel="";
    $nf_RecursosTel="";

    $volver=getenv('HTTP_REFERER');
    $tab=$_POST['tipoAB'];
    //$nombre=$_POST['nf'];
    
    if($tab=="ac9a089casfsadsd"){
        $tm="modelo";
        $nf_ModeloTel=$_POST['nf_ModeloTel'];
        $nf_RecursosTel=$_POST['nf_RecursosTel'];
        $nombre=$nf_ModeloTel . " • " . $nf_RecursosTel;
    }else{
        $nombre=$_POST['nf'];
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
        }else if($tab=="ac9a089casd"){
            $tm="modeloaccesorio";
        }else if($tab=="68duio0c"){
            $tm="marcarecargas";
        }
    }

    $res=$conexion->query("INSERT INTO $tm (nombre) VALUES ('$nombre')") or die(print_r($conexion->errorInfo()));
    if(!$res){
        echo 'Se produjo un error, vuelva a intentarlo.';
        echo "<script>location.href='../menu_sistema/sistema.php'</script>";
    } 
    else
    {
        echo '<script>alert("'.$nombre.' se agreg\u00F3 correctamente.")</script> ';
        //echo "<script>location.href='../menu_sistema/sistema.php'</script>";
        echo "<script>location.href='$volver'</script>";
        //header('location:' . getenv('HTTP_REFERER'));
        //echo $volver;
    }
?>