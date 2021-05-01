<?php
include '../library/configServer.php';
include '../library/consulSQL.php';

sleep(5);
$nameSucursal= $_POST['suc-name'];
$dir= $_POST['suc-dir'];
$ubicacion= $_POST['suc-ubicacion'];

if(!$nameSucursal=="" && !$dir=="" && !$ubicacion==0){
$sucursal=mysqli_query($con,"SELECT * FROM sucursal where nombreSucursal='".$nameSucursal."' AND direccion='".$dir."' AND idUbicacion=".$ubicacion);
$suc=mysqli_num_rows($sucursal);
if($suc<=0){
    consultasSQL::InsertSQL("sucursal", "nombreSucursal,direccion,idTipoSucursal,idUbicacion", "'$nameSucursal','$dir',2,$ubicacion");
    $idProv=mysqli_insert_id($con);
     echo '<img src="assets/img/correcto.png" class="center-all-contens"><br><p class="lead text-center">Sucursal añadida éxitosamente</p>';
     echo "<script>
     window.location.href='configAdmin.php'
     </script>";
 }else{
 echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Ya existe una sucursal registrada con este nombre</p>';
 }
}else {
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Error los campos no deben de estar vacíos</p>';
}
?>