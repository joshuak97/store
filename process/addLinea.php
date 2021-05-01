<?php
include '../library/configServer.php';
include '../library/consulSQL.php';
 
session_start();
$folioNota=$_POST['folioNota'];
if(!$folioNota==""){
 $notasc=mysqli_query($con,"SELECT * FROM lineaCarros where nombreLinea='".$folioNota."'");
$res=mysqli_num_rows($notasc);
if($res<=0){
 if(consultasSQL::InsertSQL("lineaCarros", "nombreLinea", "'$folioNota'")){
 echo '<img src="assets/img/correcto.png" class="center-all-contens"><br><p class="lead text-center">Linea registrada con exito</p>'; 
 }}else{
 echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Ya existe una linea registrada con este nombre</p>';
 }
}else{
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Los campos no deben estar vacios</p>';    
}
?>