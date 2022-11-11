<?php
include('conexionbd.php');
include('metodosbd.php');
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
    echo "hola";
    for($i=0;$i<$cantidad;$i++){
        $buscar=busqueda($conexion,"sims",tipo($tipo),$_POST["id".$i]);
        while($item=$buscar->fetch(PDO::FETCH_OBJ)){
        // if($tipo=="sims"){       
            insertar_traspaso($conexion,tipo($tipo),$item->Marca,$item->Modelo,$item->Telefonia,$item->Precio,$item->FechaIngreso,$item->Factura,$Fecha,$item->Proveedor,$item->Locacion,$locacion,"PENDIENTE DE RECIBIR");
            // }else{

            // }
        }
    }
?>