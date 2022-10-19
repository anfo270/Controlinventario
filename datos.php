<?php
include('conexionbd.php');
    $conexion= new PDO("mysql:host=localhost;port=3306;dbname=control_inventario", "root", "");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
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