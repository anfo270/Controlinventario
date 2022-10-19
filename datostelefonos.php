<?php
include('conexionbd.php');
    $res=$conexion->query('SELECT * FROM telefonos') or die(print($conexion->errorInfo()));
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