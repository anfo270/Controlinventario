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

function insertar_telefono($IMEI,$Marca,$Locacion,$Modelo,$conexion,$Precio,$FechaIngreso,$Factura){
    $evaluar=busqueda($conexion,"telefonos","IMEI",$IMEI);
    $evaluar->execute();
    if($evaluar->rowCount()>0){
        return "<script>alert('El equipo ya existe')</script>";
    }else{
        $insert=$conexion->query("INSERT INTO telefonos (IMEI, Marca, Locacion, Modelo, Precio, FechaIngreso,Factura, FechaTraspaso) Values ('$IMEI','$Marca','$Locacion','$Modelo','$Precio','$FechaIngreso','$Factura',' ')") or die(print($conexion->errorInfo()));
        return $insert;
    }
}
function insertar_sims(){

}


function insertar_accesorio(){

}
?>