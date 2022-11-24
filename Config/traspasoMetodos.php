<?php
include('conexionbd.php');
include('metodosbd.php');
    if($_GET['NumTraspaso']){
        
    }
    $Fecha = date('d/m/Y', time());
    $cantidad= $_GET['cantidad'];
    $locacion=$_GET['locacion'];
    $tipo= $_GET['tipo'];
    function tipo($tipo){
        $tipos=array(
            "telefonos"=>"IMEI",
            "accesorios"=>"SKU",
            "sims"=>"ICC",
        );
        return $tipos[$tipo];
    }
    
    for($i=0;$i<$cantidad;$i++){
        $id=$_POST['id'.$i];
        if(!$buscar=busqueda($conexion,$tipo,tipo($tipo),$id)){
            echo "<script>alert(No se encontro algún ".tipo($tipo)." con el $id);</script>";
        }else{
            while($item=$buscar->fetch(PDO::FETCH_OBJ)){
                if($tipo=="sims"){       
                    insertar_traspaso($conexion,$item->tipo($tipo),$item->Marca,$item->Modelo,$item->Telefonia,$item->Precio,$item->FechaIngreso,$item->Factura,$Fecha,$item->Proveedor,$item->Locacion,$locacion,"PENDIENTE DE RECIBIR",$_GET['NumTraspaso'],$tipo);
                }else{
                    echo 'No se pudo.';
                }
            }
        }
    }
?>