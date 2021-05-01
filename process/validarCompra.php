<?php

session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';

if(isset($_SESSION['claveUser']) && isset($_SESSION['nombreUser'])){

$verdata=  ejecutarSQL::consultar("select * from usuarios where pass='".$_SESSION['claveUser']."' and user='".$_SESSION['nombreUser']."'");
$num=  mysqli_num_rows($verdata);
if($num>0){

  echo "<script>location.href='../venta.php'</script>";
}else{

	 echo '<img src="assets/img/error.png" class="center-all-contens"><br>El nombre o contraseña invalidos';
}

}else{

echo "<script>location.href='../pedido.php'</script>";

}


?>