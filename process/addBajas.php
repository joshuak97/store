<?php
include '../library/configServer.php';
include '../library/consulSQL.php';
session_start();
ini_set('date.timezone','America/Mexico_City');

$fechaBaja=date('Y-m-d H:i:s',time());
$idProd=$_POST['idProd'];
$cantidad=$_POST['cantidad'];
$sucursal=$_POST['idSucursal'];
$user=$_SESSION['idUser'];
$descripcion=$_POST['descripcion'];
if($_SESSION['acceso']!=1){
$estado="Pendiente";
}else{
$estado="Aprobado";
}
$validar=0;
if($cantidad>0){
$consultaProd=ejecutarSQL::consultar("SELECT existencia,stockDanado FROM producto where idProd=$idProd");

$prod=mysqli_fetch_array($consultaProd);
$nuevaExistencia=$prod['existencia']-$cantidad;
$nuevoStock=$prod['stockDanado']+$cantidad; 
  
if(consultasSQL::InsertSQL("baja_falla", "idProd,fechaBaja,descripcionBaja,cantidadBaja,usuarioBaja,idSucursalBaja,estado","$idProd,'$fechaBaja','$descripcion','$cantidad','$user','$sucursal','$estado'")){
if($estado=="Aprobado"){
if(consultasSQL::UpdateSQL("producto", "stockDanado=$nuevoStock, existencia=".$nuevaExistencia, "idProd=$idProd")){
$validar=0; 
}else{
    echo '<img src="assets/img/incorrectofull.png" class="center-all-contens"><br>
    <h3>Ha ocurrido un error al modificar las existencias, consulte a soporte.</h3>
    <br>';    
$validar=1;
}
}else{
$validar=0;
}

echo '<img src="assets/img/correctofull.png" class="center-all-contens"><br>
<h3>Baja registrada con éxito</h3>
<br> <script>
setTimeout(function(){
url ="ventas.php";
$(location).attr("href",url);
},2000);
</script>';

}else{
    echo '<img src="assets/img/incorrectofull.png" class="center-all-contens"><br>
    <h3>Ha ocurrido un error al registrar la Baja, por favor intente de nuevo</h3>
    <br>';  

}          
}else{
    echo '<img src="assets/img/incorrectofull.png" class="center-all-contens"><br>
    <h3>Debe seleccionar almenos una unidad de este producto</h3>
    <br>';   
}
?>