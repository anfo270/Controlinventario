<?php

function bd($nombre){
    $bd=array(
        "accesorio"=>"accesorio",
        "activacion"=>"activacion",
        "financiera"=>"financiera",
        "locacion"=>"locacion",
        "marcas"=>"marcas",
        "proveedor"=>"proveedor",
        "sims"=>"sims",
        "telefonos"=>"telefonos",
        "usuarios"=>"usuarios",
    );
    return $bd[$nombre];
}

function consulta($conexion,$basedatos){
    $nombre=bd($basedatos);
    $res=$conexion->query("SELECT * FROM $nombre ") or die(print($conexion->errorInfo()));
    return $res;
}
?>