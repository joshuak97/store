<?php
include '../library/configServer.php';
include '../library/consulSQL.php';
session_start();
ini_set('date.timezone','America/Mexico_City');
$descripcion=$_POST['descripcion'];
$comprobante=$_POST['comprobante'];
$folio=$_POST['folio'];
$fechaGasto=$_POST['fechaG'];
$fechaRegistro=date('Y-m-d , H:i:s',time());
$monto=$_POST['monto'];
$idSucursal=$_SESSION['sucursal'];
$verdata=  ejecutarSQL::consultar("select*from usuarios where pass='".$_SESSION['claveUser']."' and user='".$_SESSION['nombreUser']."'");
$verdata=mysqli_fetch_array($verdata);
$idVendedor=$verdata['idUsuario'];  

if(!$descripcion=="" && !$fechaGasto=="" && !$fechaRegistro=="" && !$monto=="" && !$idSucursal==0 && !$idVendedor==0){  
 if(consultasSQL::InsertSQL("gastos", "descripcion,comprobante,folio_gasto,fecha_gasto,fecha_registro,monto,idSucursal,idVendedor", "'$descripcion','$comprobante','$folio','$fechaGasto','$fechaRegistro',$monto,$idSucursal,$idVendedor")){
 echo '<img src="assets/img/correcto.png" class="center-all-contens"><br><p class="text-center">Gasto registrado con exito</p>';
 echo '<script>
 setTimeout(function(){
 url ="cuentasPagar.php";
 $(location).attr("href",url);
 },3000);
</script>'; 
 }
}else{
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Los campos no deben estar vacios</p>';    
}
?>