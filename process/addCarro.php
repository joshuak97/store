<?php

include '../library/configServer.php';
include '../library/consulSQL.php';

$modelo=$_POST['carro-modelo'];
$linea=$_POST['linea-carro'];
$ano=$_POST['anio-carro'];
$ano2=$_POST['anio-carro2'];
$add=0;
$desCarro=$_POST['des-carro'];
$contador=0;
$repetidos=0;
$errorAno;

if($ano<$ano2 && $ano!=0 && $ano2!=0){
for($i=$ano;$i<=$ano2;$i++){
if($modelo!=""){
  $verificar=mysqli_query($con,"SELECT * FROM modeloCarros where nombreModelo='$modelo' and idLinea=$linea and idAno=$i");
  $num=mysqli_num_rows($verificar);
  if($num<=0){
    if(consultasSQL::InsertSQL("modeloCarros", "idLinea, idAno, nombreModelo,desCarro", "'$linea','$i','$modelo','$desCarro'")){
    $contador++;
            }
        }else{
        $repetidos++; 
        }
}else {
   $add++;
}
}

}else if($ano>$ano2 && $ano!=0 && $ano2==0){
if($modelo!=""){
  $verificar=mysqli_query($con,"SELECT * FROM modeloCarros where nombreModelo='$modelo' and idLinea=$linea and idAno=$ano");
  $num=mysqli_num_rows($verificar);
  if($num<=0){
    if(consultasSQL::InsertSQL("modeloCarros", "idLinea, idAno, nombreModelo,desCarro", "'$linea','$ano','$modelo'")){
    $contador++;
            }
        }else{
        $repetidos++; 
        }
}else {
   $add++;
}

}else{

 echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Error verifique el orden de los años</p>'; 
 $add++;
}

if($add==0){

echo '<img src="assets/img/correcto.png" class="center-all-contens"><br><p class="lead text-center">Los vehiculos se han añadido éxitosamente</p>';

}else{

 echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Error los campos no deben de estar vacíos</p>';}


?>