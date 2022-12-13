<?php
include('Config/conexionbd.php');
include('Config/metodosbd.php');
session_start();
insertar_log($conexion,$FechaHora,$_SESSION['Nombre completo'],$direccionProtocol,'Cierre de sesion.','NOTIFICACION');

session_destroy();
header('location: index.php');

?>