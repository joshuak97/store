<?php
include '../library/configServer.php';
include '../library/consulSQL.php';

sleep(5);
$nameUbicacion= $_POST['ub-name'];


if(!$nameUbicacion==""){
$ubicacion=mysqli_query($con,"SELECT * FROM ubicacion where nombreUbicacion='".$nameUbicacion."'");
$ubic=mysqli_num_rows($ubicacion);
if($ubic<=0){
    consultasSQL::InsertSQL("ubicacion", "nombreUbicacion", "'$nameUbicacion'");
    $idProv=mysqli_insert_id($con);
     echo '<img src="assets/img/correcto.png" class="center-all-contens"><br><p class="lead text-center">Ubicacion añadida éxitosamente</p>';
     echo "<script>
     window.location.href='configAdmin.php'
     </script>";
 }else{
 echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Ya existe una ubicacion registrada con este nombre</p>';
 }
}else {
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Error los campos no deben de estar vacíos</p>';
}
?>