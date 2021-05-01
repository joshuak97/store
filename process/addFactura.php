<?php
include '../library/configServer.php';
include '../library/consulSQL.php';
 
session_start();
$folioFactura=$_POST['numeroFactura'];
$fechaFactura=$_POST['fechaFactura'];
if(!isset($_SESSION['idProveedor'])){
    $_SESSION['idProveedor']=0;
}
$proveedor=$_SESSION['idProveedor'];

if(!$folioFactura=="" && !$fechaFactura=="" && !$proveedor==""){
if($proveedor!=0){    
$notasc=mysqli_query($con,"SELECT * FROM facturas where numero_factura='".$folioFactura."' AND fecha_factura='$fechaFactura' AND idProveedor=".$proveedor);
$res=mysqli_num_rows($notasc);
if($res<=0){
 if(consultasSQL::InsertSQL("facturas", "numero_factura,fecha_factura,idProveedor,idProd,total_compra", "'$folioFactura','$fechaFactura',$proveedor,'',0.0")){
 echo '<img src="assets/img/correcto.png" class="center-all-contens"><br><p class="lead text-center">Factura registrada de manera exitosa</p>';   
 }else{
 echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Error al registrar factura</p>';
 }
}else{
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Ya existe una factura registrada con estos datos</p>';
}
}else{
 echo   '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Seleccione un proveedor</p>';    
}
}
?>