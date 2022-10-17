<?php
include('conexionbd.php');
$server='localhost';
$user='root';
$pass='';
$db='control_inventario';

//conexion a base de datos
$conexion=new mysqli($server,$user,$pass,$db);
//verificacion de error
    

$user=$_POST['user'];
$pass=$_POST['pass'];

//buscar usuario
$query=mysqli_query($conexion,"SELECT * FROM usuarios WHERE Usuario='".$user."'and Contraseña='".$pass."'");
//asignamos el valor en una variable, si es 0 no existe
$uss=mysqli_num_rows($query);

if($uss!=0){
    $_SESSION['user']=$user;
    $_SESSION['pass']=$pass;
 
    header('location: menu.html');

}else{
    header('location: index.html');
}

?>