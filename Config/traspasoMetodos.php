<?php
include('conexionbd.php');
include('metodosbd.php');
    $Fecha = date('d/m/Y', time());
    $cantidad= $_POST['cantidad'];
    $locacion=$_POST['locacion'];
    $tipo= $_POST['tipo'];
    $NumTraspaso=$_POST['Numtraspaso'];
    function tip($tipo){
        $tipos=array(
            "telefonos"=>"IMEI",
            "accesorios"=>"SKU",
            "sims"=>"ICC",
        );
        return $tipos[$tipo];
    }
    for($i=0;$i<$cantidad;$i++){
        $id=$_POST['id'.$i];
        $iccimesku=tip($tipo);
        echo $id;
        $buscar=busqueda($conexion,$tipo,$iccimesku,$id);
        $buscar->execute();
        while($item=$buscar->fetch(PDO::FETCH_OBJ)){
            if($tipo=="sims"){      
                if(insertar_traspaso($conexion,$item->$iccimesku,$item->Marca,$item->Modelo,$item->Telefonia,$item->Precio,$item->FechaIngreso,$item->Factura,$Fecha,$item->Proveedor,$item->Locacion,$locacion,"PENDIENTE DE RECIBIR",$NumTraspaso,$tipo)){
                    echo '<script>alert("No se encontro el '.$id.'")</script> ';
                }
            }else{
                echo 'No se pudo.';
            }
        }
    }
    echo "<script>location.href='../menu_administrador/administrador.php'</script>";

?>