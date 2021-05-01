<?php
include '../library/configServer.php';
include '../library/consulSQL.php';
 
session_start();
$folioNota=$_POST['folioNota'];
if(!$folioNota==""){
 $notasc=mysqli_query($con,"SELECT * FROM notas where folioNota='".$folioNota."'");
$res=mysqli_num_rows($notasc);
if($res<=0){
 if(consultasSQL::InsertSQL("notas", "folioNota,idProd,costoTotal", "'$folioNota','',0.0")){
 echo '<img src="assets/img/correcto.png" class="center-all-contens"><br><p class="lead text-center">Nota registrada con exito</p>'; 
 }}else{
 echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Ya existe una nota registrada con este nombre</p>';
 }
}else{
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Los campos no deben estar vacios</p>';    
}
?>