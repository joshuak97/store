<?php
include '../library/configServer.php';
include '../library/consulSQL.php';

sleep(3);

$id=$_POST['id'];
$nameSucursal= $_POST['name-suc'];
$dir= $_POST['dir-suc'];
$corte= $_POST['corte-suc'];
$ubicacion= $_POST['ubic-suc'];

if(!$_FILES['logo-suc']['name']==""){
if(move_uploaded_file($_FILES['logo-suc']['tmp_name'],"../assets/img/".$_FILES['logo-suc']['name'])){    
if(consultasSQL::UpdateSQL("sucursal","nombreSucursal='".$nameSucursal."',direccion='$dir',horaCorte='$corte',idUbicacion=$ubicacion, logo='".$_FILES['logo-suc']['name']."'", "idSucursal=$id")){
    echo '<br>
    <img class="center-all-contens" src="assets/img/Check.png">
    <p><strong>Datos actualizados</strong></p>
    <script>window.location.href="configAdmin.php"</script>';
}else{
    echo '
    <br>
    <img class="center-all-contens" src="assets/img/cancel.png">
    <p><strong>Error</strong></p>
 ';
}
}
}else{
    if(consultasSQL::UpdateSQL("sucursal","nombreSucursal='".$nameSucursal."',direccion='$dir',horaCorte='$corte',idUbicacion=$ubicacion", "idSucursal=$id")){
        echo '<br>
        <img class="center-all-contens" src="assets/img/Check.png">
        <p><strong>Datos actualizados</strong></p>
        <script>window.location.href="../configAdmin.php"</script>';
    }else{
        echo '
        <br>
        <img class="center-all-contens" src="assets/img/cancel.png">
        <p><strong>Error</strong></p>
     ';
    }
}
?>