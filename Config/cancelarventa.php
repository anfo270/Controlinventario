<?php
    include('conexionbd.php');
    $id=$_GET['id'];
    //variable de ID 
    if($_POST['pass']==$_SESSION['Contrasena']){
        echo("<script>alert('Contraseña incorrecta')</script>");
        echo ("<script>location.href='../menu_responsable/corte.php'</script>");
    }else{
        //borramos el registro
        $prducto=$conexion->query("SELECT FROM ventas WHERE ID='$id") or die(print_r($conexion->errorInfo()));
        $item=$prducto->fetch(PDO::FETCH_OBJ);
        $res=$conexion->query("DELETE FROM ventas WHERE ID='$id'") or die(print_r($conexion->errorInfo()));
        
        if($res){
            echo("<script>alert('Se cancelo exitosamente la venta')</script>");
            echo ("<script>location.href='../menu_responsable/corte.php'</script>");
            if($item->IMEIICCSKU!='recarga' && $item->IMEIICCSKU!='servicio'){
                

            }
        }else{
            echo("<script>alert('No se pudo eliminar')</script>");
            echo ("<script>location.href='../menu_responsable_venta.php'</script>");
        }
    }
?>