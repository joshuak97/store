<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';

sleep(5);
$nameAd= $_POST['name-admin'];
$consA=  ejecutarSQL::consultar("select * from usuarios where user='$nameAd'");
$totalA = mysqli_num_rows($consA);

if($totalA>0){
    if(consultasSQL::DeleteSQL('usuarios', "user='".$nameAd."'")){
        echo '<img src="assets/img/correcto.png" class="center-all-contens"><br><p class="lead text-center">Administrador eliminado éxitosamente</p>';
         echo "<script>location.href='configAdmin.php'</script>";
    }else{
       echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Ha ocurrido un error.<br>Por favor intente nuevamente</p>'; 
    }
}else{
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">El nombre del administrador no existe</p>';
}

