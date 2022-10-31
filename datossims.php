<?php
include('Config/metodosbd.php');
include('Config/conexionbd.php');
    $res=consulta($conexion,"sims");
    $datasims=[];
    while($item=$res->fetch(PDO::FETCH_OBJ)){
        $datasims[]=[
            'ICC'=>$item->ICC,
            'Marca'=>$item->MARCA,
            'Locacion'=>$item->LOCACION,
        ];
    }
    echo json_encode($datasims);
?>