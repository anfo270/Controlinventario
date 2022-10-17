<?php
include('conexionbd.php');

$user=$_POST['user'];
$pass=$_POST['pass'];
$_SESSION['Usuario']="";
$_SESSION['Contraseña']="";

//buscar usuario
$query=mysqli_query($conexion,"SELECT * FROM usuarios WHERE Usuario='$user' AND Contraseña='$pass'");
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
    if($user == $_SESSION['Usuario'] && $pass == $_SESSION['Contraseña']){
        if($puesto =="vendedor"){
            header('location: abrircaja.php');
        }else{
            header('location: menu.php');
        }
    } else {
        echo '<script>alert("Usuario o contrase\u00F1a incorrectos.")</script> ';
        echo "<script>location.href='index.html'</script>";
    }
}else{
    echo '<script>alert("Usuario o contrase\u00F1a incorrectos.")</script> ';
    echo "<script>location.href='index.html'</script>";
}
?>