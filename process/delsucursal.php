<?php
include '../library/configServer.php';
include '../library/consulSQL.php';

sleep(5);
$nitSuc= $_POST['nit-suc'];
$cons=  ejecutarSQL::consultar("select * from sucursal where idSucursal=$nitSuc");
$totalprove = mysqli_num_rows($cons);

if($totalprove>0){
    if(consultasSQL::DeleteSQL('sucursal', "idSucursal=".$nitSuc)){
        echo '<img src="assets/img/correcto.png" class="center-all-contens"><br><p class="lead text-center">Proveedor eliminado éxitosamente</p>';
        echo "<script>location.href='configAdmin.php'</script>";
    }else{
       echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Ha ocurrido un error.<br>Por favor intente nuevamente</p>'; 
    }
}else{
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">El código de proveedor no existe</p>';
}
?>