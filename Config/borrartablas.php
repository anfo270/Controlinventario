<?php
include('conexionbd.php');
session_start();
$bd=array(
    "accesorio",
    "activacion",
    "financiera",
    "locacion",
    "marcas",
    "proveedor",
    "sims",
    "telefonos",
    "usuarios",
    "carrito",
    "ventas",
    "marcarecargas",
    "modelo",
    "telefonia",
    "modeloaccesorio",
    "traspaso",
    "modelo",
);
if($_POST['pass']!=$_SESSION['Contrasena']){
    echo '<script>alert("Contraseña incorrecta")</script>';
    echo ("<script>location.href='../menu_sistema/sistema.php'</script>");
}else{
    for ($i=0; $i <sizeof($bd); $i++) { 
        if($bd[$i]!="usuarios"){
            $delete=$conexion->query("TRUNCATE TABLE $bd[$i]");
        }else{
            $deleteusarios=$conexion->query("DELETE FROM usuarios WHERE Puesto!='SISTEMAS' AND Puesto!='MASTER'");
        }
    }
    echo ("<script>location.href='../menu_sistema/sistema.php'</script>");
}
?>