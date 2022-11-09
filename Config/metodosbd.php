<?php

use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Distributions\F;

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
        "modeloaccesorio"=>"modeloaccesorio",
        "traspaso"=>"traspaso",
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

function insertar_telefono($IMEI,$Marca,$Locacion,$Modelo,$conexion,$Precio,$FechaIngreso,$Factura,$proveedor){
    $evaluar=busqueda($conexion,"telefonos","IMEI",$IMEI);
    $evaluar->execute();
    if($evaluar->rowCount()>0){
        echo "<script>alert('El equipo ya existe' {$IMEI})</script>";
        return $evaluar->rowCount()==0;
    }else{
        $insert=$conexion->query("INSERT INTO telefonos (IMEI, Marca, Locacion, Modelo, Precio, FechaIngreso,Factura, FechaTraspaso,proveedor) Values ('$IMEI','$Marca','$Locacion','$Modelo','$Precio','$FechaIngreso','$Factura',' ','$proveedor')") or die(print($conexion->errorInfo()));
        return $insert;
    }
}
function insertar_sims($conexion,$ICC,$Marca,$Locacion,$Modelo,$Telefonia,$Precio,$FechaIngreso,$Factura,$Proveedor){
    $evaluar=busqueda($conexion,"sims","ICC",$ICC);
    $evaluar->execute();
    if($evaluar->rowCount()>0){
        echo "<script>alert('El chip ya existe {$ICC}')</script>";
        return $evaluar->rowCount()==0;
    }else{
        $insert=$conexion->query("INSERT INTO sims (ICC, Marca, Locacion, Modelo, Telefonia, Precio,FechaIngreso,Factura,FechaTraspaso,Proveedor) Values ('$ICC','$Marca','$Locacion','$Modelo','$Telefonia','$Precio','$FechaIngreso','$Factura',' ','$Proveedor')") or die(print($conexion->errorInfo()));
        return $insert;
    }
}


function insertar_accesorio($conexion,$SKU,$Marca,$Locacion,$Modelo,$Precio,$FechaIngreso,$Factura,$proveedor){
    $evaluar=busqueda($conexion,"accesorio","SKU",$SKU);
    $evaluar->execute();
    if($evaluar->rowCount()>0){
        echo "<script>alert('El accesorio ya existe {$SKU}')</script>";
        return $evaluar->rowCount()==0;
    }else{
        $insert=$conexion->query("INSERT INTO accesorio (SKU, Marca, Locacion, Modelo, Precio,FechaIngreso,Factura,FechaTraspaso,Proveedor) Values ('$SKU','$Marca','$Locacion','$Modelo','$Precio','$FechaIngreso','$Factura',' ','$proveedor')") or die(print($conexion->errorInfo()));
        return $insert;
    }
}
?>