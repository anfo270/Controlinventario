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
        "carrito"=>"carrito",
        "ventas"=>"ventas",
        "marcarecargas"=>"marcarecargas",
        "modelo"=>"modelo",
        "telefonia"=>"telefonia",
    );
    return $bd[$nombre];
}

function consulta($conexion,$basedatos){
    $nombre=bd($basedatos);
    $res=$conexion->query("SELECT * FROM $nombre ") or die(print($conexion->errorInfo()));
    return $res;
}
function busqueda($conexion,$base_datos,$tipo,$referencia){
    $nombre=bd($base_datos);
    $res=$conexion->query("SELECT * FROM $nombre WHERE $tipo='$referencia'");
    return $res;
}
?>