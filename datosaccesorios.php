<?php
include('conexionbd.php');
    $res=$conexion->query('SELECT * FROM accesorio') or die(print($conexion->errorInfo()));
    $datataccesorio=[];
    while($item=$res->fetch(PDO::FETCH_OBJ)){
        $datataccesorio[]=[
            'SKU'=>$item->SKU,
            'Marca'=>$item->Marca,
            'Locacion'=>$item->Locacion,
            'Descripcion'=>$item->Descripcion,
        ];
    }
    echo json_encode($datataccesorio);
?>