<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';
ini_set('date.timezone','America/Mexico_City');
$fecha=date('Y-m-d , H:i:s',time());
$monto=$_POST['monto'];
$estado="cerrada";
$usuario=$_SESSION['idUser'];
if(!$monto==""){
if(consultasSQL::InsertSQL("corteCaja", "fecha,monto,estado,idUsuario", "'$fecha',$monto,'$estado',$usuario")){
echo '<script> location.href="process/logout.php"; </script>';
}
}else{
echo '<div class="text-center"><img src="assets/img/error.png" class="center-all-contens"><br>Error, el usuario no ha abierto caja</div>'; 
}
?>