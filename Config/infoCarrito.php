<?php
include('../Config/conexionbd.php');

$usu = $_SESSION['Usuario'];
$edoCarrito="";

$cant_carrito=0;
$carrito=busqueda($conexion,"carrito","usuario",$usu);
while($item=$carrito->fetch(PDO::FETCH_OBJ)){
    $cant_carrito++;
}
if($cant_carrito>0){
    $edoCarrito="<p><a href='ventas.php'>🛒 $cant_carrito art&iacute;culo(s)</a></p>";
}else{
    $edoCarrito="<p>🛒 $cant_carrito art&iacute;culo(s)</p>";
}
?>