<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';


$codeCateg= $_POST['categ-code'];

$cons=  ejecutarSQL::consultar("select * from marca where idMarca=$codeCateg");
$totalcateg = mysqli_num_rows($cons);

if($totalcateg>0){
    if(consultasSQL::DeleteSQL('marca', "idMarca=".$codeCateg)){
        echo '<img src="assets/img/correcto.png" class="center-all-contens"><br><p class="lead text-center">Categoría eliminada éxitosamente</p>';
        sleep(3);
        echo "<script>location.href='configAdmin.php'</script>";
    }else{
       echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Ha ocurrido un error.<br>Por favor intente nuevamente</p>'; 
    }
}else{
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">El código de la categoria no existe</p>';
}
