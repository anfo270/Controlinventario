<?php
include('conexionbd.php');
include('metodosbd.php');
    $Fecha = date('d/m/Y', time());
<<<<<<< HEAD
    $cantidad= $_POST['cantidad'];
    $locacion=$_POST['locacion'];
    $tipo= $_POST['tipo'];
    $NumTraspaso=$_POST['Numtraspaso'];
    function tip($tipo){
=======
    $cantidad=intval($_GET['cantidad']);
    $locacion=$_GET['locacion'];
    $tipo= $_GET['tipo'];
    
    function tipo($tipo){
>>>>>>> ccdf9cde8b55a84d536158c51eb13baa7b24dadb
        $tipos=array(
            "telefonos"=>"IMEI",
            "accesorio"=>"SKU",
            "sims"=>"ICC",
        );
        return $tipos[$tipo];
    }
<<<<<<< HEAD
    for($i=0;$i<$cantidad;$i++){
        $id=$_POST['id'.$i];
        $iccimesku=tip($tipo);
        echo $id;
        $buscar=busqueda($conexion,$tipo,$iccimesku,$id);
        $buscar->execute();
        while($item=$buscar->fetch(PDO::FETCH_OBJ)){
            if($tipo=="sims"){      
                if(insertar_traspaso($conexion,$item->$iccimesku,$item->Marca,$item->Modelo,$item->Telefonia,$item->Precio,$item->FechaIngreso,$item->Factura,$Fecha,$item->Proveedor,$item->Locacion,$locacion,"PENDIENTE DE RECIBIR",$NumTraspaso,$tipo)){
                    echo '<script>alert("No se encontro el '.$id.'")</script> ';
=======
    $tipoID=tipo($tipo);
    
    for($i=0;$i<$cantidad;$i++){
        $id=$_POST['id'.$i];
        $buscar=busqueda($conexion,$tipo,tipo($tipo),$id);
        if($buscar->rowCount()==0){
            echo "<script>alert('No se encontr\u00F3 alg\u00FAn ".$tipo." con el " . $tipoID . ": " . $id . ". El ".$tipo." fue omitido.');</script>";
        }else{
            while($item=$buscar->fetch(PDO::FETCH_OBJ)){
                if($tipo=="sims"){  
                    insertar_traspaso($conexion,$item->$tipoID,$item->Marca,$item->Modelo,$item->Telefonia,$item->Precio,$item->FechaIngreso,$item->Factura,$Fecha,$item->Proveedor,$item->Locacion,$locacion,"PENDIENTE DE RECIBIR",$_GET['NumTraspaso'],$tipo);
                }else if($tipo=="telefonos"||$tipo=="accesorio"){
                    insertar_traspaso($conexion,$item->$tipoID,$item->Marca,$item->Modelo,"N/A",$item->Precio,$item->FechaIngreso,$item->Factura,$Fecha,$item->Proveedor,$item->Locacion,$locacion,"PENDIENTE DE RECIBIR",$_GET['NumTraspaso'],$tipo);
                }else{
                    echo "<script>alert('El " . $tipo . " con el " . $tipoID . ": " . $id . " no pudo agregarse.');</script>";
>>>>>>> ccdf9cde8b55a84d536158c51eb13baa7b24dadb
                }
            }else{
                echo 'No se pudo.';
            }
        }
    }
<<<<<<< HEAD
    echo "<script>location.href='../menu_administrador/administrador.php'</script>";

=======
    echo "<script>alert('Transacci\u00F3n realizada.');</script>";
    echo "<script>location.href='../menu_administrador/traspaso.php?tipo=" . $tipo . "'</script>";
>>>>>>> ccdf9cde8b55a84d536158c51eb13baa7b24dadb
?>