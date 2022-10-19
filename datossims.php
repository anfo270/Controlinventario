<?php
include('conexionbd.php');
    $res=$conexion->query('SELECT * FROM sims') or die(print($conexion->errorInfo()));
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