<?
include('conexionbd.php');

$user=$_POST['user'];
$pass=$_POST['pass'];

//buscar usuario
$query=mysqli_query($conexion,"SELECT * FROM usuarios WHERE Usuario='".$user."'and Contraseña='".$pass."'");
//asignamos el valor en una variable, si es 0 no existe
$uss=$query;

if($uss!=0){
    $_SESSION['user']=$user;
    $_SESSION['pass']=$pass;
    header("Location: menu.html");
}

?>