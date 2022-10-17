<?
    session_start();
    //datos de db
    $server='localhost';
    $user='root';
    $pass='';
    $db='control_inventario';

    //conexion a base de datos
    $conexion=new mysqli($server,$user,$pass,$db);
    //verificacion de error
    if($conexion->connect_error)
        die('La conexion a fallado'.$conexion->connect_errno);

        
?>
