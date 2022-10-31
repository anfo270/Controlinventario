<?php
    //datos de db
    $server='localhost';
    $user='root';
    $pass='';
    $db='control_inventario';

    //conexion a base de datos
    try{
        $conexion= new PDO("mysql:host=$server;port=3306;dbname=$db",$user ,$pass);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
        //verificacion de error
    catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
    }

?>
