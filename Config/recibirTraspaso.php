<?php
include('conexionbd.php');
$NumTras=$_GET['Numtraspaso'];
$control=0;
$res=$conexion->query("SELECT * FROM traspaso WHERE NumTraspaso=$NumTras AND Estado='PENDIENTE DE RECIBIR'") or die(print_r($conexion->errorInfo()));
$res->execute();
while($item=$res->fetch(PDO::FETCH_OBJ)){
    $articulos=$_POST['id'.$control];
    $check=$_POST['articulo'.$control];
    if($check=="on"){
        $cambio=$conexion->query("UPDATE $item->tipo SET Locacion='$item->LocacionDestino' WHERE $item->tipo.ICC='$articulos'") or die(print_r($conexion->errorInfo()));
        $cambio=$conexion->query("UPDATE traspaso SET Estado='RECIBIDO' WHERE traspaso.IMEIICC='$articulos'") or die(print_r($conexion->errorInfo()));
    }else{
        echo "<script>alert('No se pudo traspasar el producto.');</script>";
    }
    $control++;
}
echo "<script>alert('Transacci\u00F3n realizada.');</script>";
echo "<script>location.href='../menu_administrador/traspaso.php?tipo=" . $tipo . "'</script>";
?>