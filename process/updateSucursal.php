<?php
include '../library/configServer.php';
include '../library/consulSQL.php';

sleep(3);

$id=$_POST['id'];
$nameSucursal= $_POST['suc-name'];
$dir= $_POST['suc-dir'];
$ubicacion= $_POST['suc-ubic'];



if(consultasSQL::UpdateSQL("sucursal","nombreSucursal='".$nameSucursal."',direccion='$dir',idUbicacion=$ubicacion", "idSucursal=$id")){
    echo '<br>
    <img class="center-all-contens" src="assets/img/Check.png">
    <p><strong>Hecho</strong></p>
    <p class="text-center">
        Recargando<br>
        en 7 segundos
    </p>
    <script>
        setTimeout(function(){
        url ="configAdmin.php";
        $(location).attr("href",url);
        },7000);
    </script>';
}else{
    echo '
    <br>
    <img class="center-all-contens" src="assets/img/cancel.png">
    <p><strong>Error</strong></p>
    <p class="text-center">
        Recargando<br>
        en 7 segundos
    </p>
    <script>
        setTimeout(function(){
        url ="configAdmin.php";
        $(location).attr("href",url);
        },7000);
    </script>
 ';
}

?>