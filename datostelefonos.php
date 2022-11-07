<?php
include('Config/conexionbd.php');
include('Config/metodosbd.php');
    $res=consulta($conexion,"telefonos");
    $datatel=[];
    while($item=$res->fetch(PDO::FETCH_OBJ)){
        $datatel[]=[
            'IMEI'=>$item->IMEI,
            'Marca'=>$item->Marca,
            'Locacion'=>$item->Locacion,
            'Modelo'=>$item->Modelo
        ];
    }
    echo json_encode($datatel);
?>