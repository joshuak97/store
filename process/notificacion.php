<?php
    
$existenciasBajas="";    
if(!isset($_SESSION['contadorExistencias'])){
if($_SESSION['acceso']==2){
$consulta1= ejecutarSQL::consultar("SELECT * FROM producto  WHERE existencia > 0 and existencia <=5");
$totalproductos1 = mysqli_num_rows($consulta1);
if($totalproductos1>0){
$existenciasBajas="si";
$_SESSION['contadorExistencias']=1;

}else{

$existenciasBajas="no";  
}
}
}


$existenciasVacias="";    
if(!isset($_SESSION['existenciasVacias'])){
if($_SESSION['acceso']==1){
$consulta1= ejecutarSQL::consultar("SELECT * FROM producto  WHERE existencia > 0 and existencia <=5");
$totalproductos1 = mysqli_num_rows($consulta1);
if($totalproductos1>0){
$existenciasBajas="si";
$_SESSION['existenciasVacias']=1;

}else{

$existenciasBajas="no";  
}
}
}
?>






