<?php
include('conexionbd.php');
$NumTras=$_GET['Numtraspaso'];
$control=0;
$res=$conexion->query("SELECT * FROM traspaso WHERE NumTraspaso=$NumTras AND Estado='PENDIENTE DE RECIBIR'") or die(print($conexion->errorInfo()));
$res->execute();
while($item=$res->fetch(PDO::FETCH_OBJ)){
    $articulos=$_POST['id'.$control];
    $check=$_POST['articulo'.$control];
    if($check=="on"){
        $cambio=$conexion->query("UPDATE $item->tipo SET Locacion='$item->LocacionDestino' WHERE $item->tipo.ICC='$articulos'") or die(print($conexion->errorInfo()));
        $cambio=$conexion->query("UPDATE traspaso SET Estado='RECIBIDO' WHERE IMEIICC='$articulos'") or die(print($conexion->errorInfo()));
    }else{
        
    }
    $control++;
}

?>