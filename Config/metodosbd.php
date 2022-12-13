<?php

use PhpOffice\PhpSpreadsheet\Calculation\Statistical\Distributions\F;

include_once('Request_Location.php');

function UbicacioneIP(){
    $requestModel = new Request();
    $ip = $requestModel->getIpAddress();
    $isValidIpAddress = $requestModel->isValidIpAddress($ip);

    if ($isValidIpAddress == "") {
        $datosFinales="";
    } else {
        $geoLocationData = $requestModel->getLocation($ip);
        $datosFinales=$geoLocationData['ip'] .' - '. $geoLocationData['city'] .', '. $geoLocationData['country'].'.';
    }
    return $datosFinales;
}

date_default_timezone_set('America/Denver');
$Fecha = date('d-m-Y', time());
$Hora = date('h:i a', time());
$FechaHora=$Fecha.' '.$Hora;

$direccionProtocol=UbicacioneIP();

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
        "modelo"=>"modelo",
    );
    return $bd[$nombre];
}

function consulta($conexion,$basedatos){
    $nombre=bd($basedatos);
    $res=$conexion->query("SELECT * FROM $nombre ") or die(print_r($conexion->errorInfo()));
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
        echo "<script>alert('El equipo con el IMEI {$IMEI} ya existe.')</script>";
        return $evaluar->rowCount()==0;
    }else{
        $insert=$conexion->query("INSERT INTO telefonos (IMEI, Marca, Locacion, Modelo, Precio, FechaIngreso,Factura, FechaTraspaso,proveedor) Values ('$IMEI','$Marca','$Locacion','$Modelo','$Precio','$FechaIngreso','$Factura',' ','$proveedor')") or die(print_r($conexion->errorInfo()));
        return $insert;
    }
}
function insertar_sims($conexion,$ICC,$Marca,$Locacion,$Modelo,$Telefonia,$Precio,$FechaIngreso,$Factura,$Proveedor){
    $evaluar=busqueda($conexion,"sims","ICC",$ICC);
    $evaluar->execute();
    if($evaluar->rowCount()>0){
        echo "<script>alert('El chip con el ICC {$ICC} ya existe.')</script>";
        return $evaluar->rowCount()==0;
    }else{
        $insert=$conexion->query("INSERT INTO sims (ICC, Marca, Locacion, Modelo, Telefonia, Precio,FechaIngreso,Factura,FechaTraspaso,Proveedor) Values ('$ICC','$Marca','$Locacion','$Modelo','$Telefonia','$Precio','$FechaIngreso','$Factura',' ','$Proveedor')") or die(print_r($conexion->errorInfo()));
        return $insert;
    }
}


function insertar_accesorio($conexion,$SKU,$Marca,$Locacion,$Modelo,$Precio,$FechaIngreso,$Factura,$proveedor){
    $evaluar=busqueda($conexion,"accesorio","SKU",$SKU);
    $evaluar->execute();
    if($evaluar->rowCount()>0){
        echo "<script>alert('El accesorio con la PKU {$SKU} ya existe.')</script>";
        return $evaluar->rowCount()==0;
    }else{
        $insert=$conexion->query("INSERT INTO accesorio (SKU, Marca, Locacion, Modelo, Precio,FechaIngreso,Factura,FechaTraspaso,Proveedor) Values ('$SKU','$Marca','$Locacion','$Modelo','$Precio','$FechaIngreso','$Factura',' ','$proveedor')") or die(print_r($conexion->errorInfo()));
        return $insert;
    }
}

function insertar_traspaso($conexion,$ID,$Marca,$Modelo,$Telefonia,$Precio,$FechaIngreso,$Factura,$FechaTraspaso,$Proveedor,$LocacionActual,$LocacionDestino,$Estado,$NumTraspaso,$tipo){
    $insert=$conexion->query("INSERT INTO traspaso (IMEIICC,Marca,Modelo,tipo,Telefonia,Precio,FechaIngreso,Factura,NumTraspaso,FechaTraspaso,Proveedor,LocacionActual,LocacionDestino,Estado) VALUES('$ID','$Marca','$Modelo','$tipo','$Telefonia','$Precio','$FechaIngreso','$Factura','$NumTraspaso','$FechaTraspaso','$Proveedor','$LocacionActual','$LocacionDestino','$Estado')")or die(print_r($conexion->errorInfo()));
    return $insert;
}

function insertar_log($conexion,$FechaHora,$Usuario,$direccionProtocol,$Movimiento,$Gravedad){
    $insert=$conexion->query("INSERT INTO reglog(Fecha,Usuario,Direccion,Movimiento,Gravedad) VALUES('$FechaHora','$Usuario','$direccionProtocol','$Movimiento','$Gravedad')")or die(print_r($conexion->errorInfo()));
    return $insert;
}
?>