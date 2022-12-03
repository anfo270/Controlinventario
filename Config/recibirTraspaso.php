<?php
include('conexionbd.php');

date_default_timezone_set('America/Denver');
$Fecha = date('d-m-Y', time());

$NumTras=$_GET['Numtraspaso'];
$control=0;
$articulos="";
$check="";
$res=$conexion->query("SELECT * FROM traspaso WHERE NumTraspaso=$NumTras AND Estado='PENDIENTE DE RECIBIR'") or die(print_r($conexion->errorInfo()));
$res->execute();
while($item=$res->fetch(PDO::FETCH_OBJ)){
    $check=$_POST['articulo'.$control];
    $articulos=$_POST['id'.$control];
    //echo $check;
    if($check=="on"){
        if($item->tipo=="telefonos"){
            $cambio=$conexion->query("UPDATE $item->tipo SET Locacion='$item->LocacionDestino' WHERE $item->tipo.IMEI='$articulos' AND $item->NumTraspaso='$NumTras'") or die(print_r($conexion->errorInfo()));
            $cambio=$conexion->query("UPDATE $item->tipo SET FechaTraspaso='$Fecha' WHERE $item->tipo.IMEI='$articulos' AND $item->NumTraspaso='$NumTras'") or die(print_r($conexion->errorInfo()));
        }else if($item->tipo=="accesorio"){
            $cambio=$conexion->query("UPDATE $item->tipo SET Locacion='$item->LocacionDestino' WHERE $item->tipo.SKU='$articulos' AND $item->NumTraspaso='$NumTras'") or die(print_r($conexion->errorInfo()));
            $cambio=$conexion->query("UPDATE $item->tipo SET FechaTraspaso='$Fecha' WHERE $item->tipo.SKU='$articulos' AND $item->NumTraspaso='$NumTras'") or die(print_r($conexion->errorInfo()));
        }else if($item->tipo=="sims"){
            $cambio=$conexion->query("UPDATE $item->tipo SET Locacion='$item->LocacionDestino' WHERE $item->tipo.ICC='$articulos' AND $item->NumTraspaso='$NumTras'") or die(print_r($conexion->errorInfo()));
            $cambio=$conexion->query("UPDATE $item->tipo SET FechaTraspaso='$Fecha' WHERE $item->tipo.ICC='$articulos' AND $item->NumTraspaso='$NumTras'") or die(print_r($conexion->errorInfo()));
        }
        $cambio=$conexion->query("UPDATE traspaso SET Estado='RECIBIDO' WHERE traspaso.IMEIICC='$articulos'") or die(print_r($conexion->errorInfo()));
        //$control="";
    }else{
        echo "<script>alert('No se pudo traspasar el producto $item->tipo $articulos.');</script>";
    }
    $control++;
}
echo "<script>alert('Transacci\u00F3n realizada.');</script>";
echo "<script>location.href='../menu_responsable/inventario.php'</script>";
?>