<?php
include('Config/metodosbd.php');
include('Config/conexionbd.php');
    $res=consulta($conexion,"accesorio");
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