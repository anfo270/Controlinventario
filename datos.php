<?php
include('conexionbd.php');
    $res=$conexion->query('SELECT * FROM telefonos') or die(print($conexion->errorInfo()));
    $data=[];
    while($item=$res->fetch(PDO::FETCH_OBJ)){
        $data[]=[
            'IMEI'=>$item->IMEI,
            'Marca'=>$item->Marca,
            'Locacion'=>$item->Locacion,
            'Modelo'=>$item->Modelo
        ];
    }

    echo json_encode($data);
    

?>