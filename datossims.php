<?php
include('Config/metodosbd.php');
include('Config/conexionbd.php');
    $res=consulta($conexion,"sims");
    $datasims=[];
    while($item=$res->fetch(PDO::FETCH_OBJ)){
        $datasims[]=[
            'ICC'=>$item->ICC,
            'Marca'=>$item->Marca,
            'Locacion'=>$item->Locacion,
            'Modelo'=>$item->Modelo,
            'Telefonia'=>$item->Telefonia,
        ];
    }
    echo json_encode($datasims);
?>