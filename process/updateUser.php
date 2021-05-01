<?php

include '../library/configServer.php';
include '../library/consulSQL.php';

$id=$_POST['id'];
$user= $_POST['user-user'];
$nombre=$_POST['user-name'];
$apellidos=$_POST['user-apellidos'];
$direccion=$_POST['user-dir'];
$telefono= $_POST['user-tel'];
$sucursal= $_POST['user-suc'];

if(consultasSQL::UpdateSQL("usuarios","user='".$user."',Nombre='".$nombre."',Apellido='".$apellidos."',Direccion='".$direccion."',email='".$telefono."',idSucursal=$sucursal","idUsuario=$id")){
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