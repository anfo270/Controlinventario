<?php
include('conexionbd.php');
include('metodosbd.php');
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
        $buscar=busqueda($conexion,$tipo,tipo($tipo),"id".$i);
        while($item=$buscar->fetch(PDO::FETCH_OBJ)){
            if($tipo=="sims"){
            insertar_traspaso($conexion,$item->tipo($tipo),$item->Marca,$item->Modelo,$item->Telefonia,$item->Precio,$item->FechaIngreso,$item->Factura,$item->Traspaso,$item->Proveedor,$item->Locacion,$locacion,"PENDIENTE DE RECIBIR");
            }else{

            }
        }
    }
?>