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

if($query){
    while($row=$query->fetch_array()){
        $_SESSION['ID']=$row['ID'];
        $_SESSION['Nombre']=$row['Nombre'];
        $_SESSION['Apellidos']=$row['Apellidos'];
        $_SESSION['Usuario']=$row['Usuario'];
        $_SESSION['Contraseña']=$row['Contraseña'];
        $puesto=$_SESSION['Puesto']=$row['Puesto'];
        $_SESSION['Local']=$row['Local'];
    }
    if($puesto =="vendedor"){
        header('location: abrircaja.html');
    }else{
    header('location: menu.html');
    }
}else{
    header('location: index.html');
}

?>