<?php
include '../library/configServer.php';
include '../library/consulSQL.php';
session_start();
$user=$_POST['user-entrada'];
$sucursal=$_POST['sucursal-entrada'];
$concepto=$_POST['tipo-compra'];
$folioConcepto=$_POST['nota-cp'];
$costoCompra=$_SESSION['sumaTotalcp'];
$fechaCompra=$_POST['cp-date'];
$estadoCuentaP='pagado';
$idProveedor=$_POST['rfc-proveedor'];
$comprobante="";
$validarSucursal=true;
for($y = 0;$y<$_SESSION['contador3'];$y++){
   
    $consulta=ejecutarSQL::consultar("select idSucursal from producto where idProd=".$_SESSION['listaProd'][$y]);
 
   
    while($fila = mysqli_fetch_array($consulta)){
    	if($sucursal!=$fila['idSucursal']){
        $validarSucursal=false;
        }
    
    }
    

}
if($validarSucursal && $sucursal!=0){
if($_SESSION['contador3']>0){
$cuentaErrores=0;    

$consultaCuentasPagar= ejecutarSQL::consultar("SELECT * FROM cuentaspagar where concepto='$concepto' and folio_concepto='$folioConcepto'");

$resCuentasP=mysqli_num_rows($consultaCuentasPagar);
if($resCuentasP==0){
if(consultasSQL::InsertSQL("cuentaspagar", "concepto, folio_concepto,costoCompra,fecha_compra,idProveedor,estado_cuentaP,comprobante_compra,idSucursal,idUsuario,fecha_registro", "'$concepto','$folioConcepto',$costoCompra,'$fechaCompra',$idProveedor,'$estadoCuentaP','$comprobante',$sucursal,$user,NOW()")){   
    $consultaCuentasPagar= ejecutarSQL::consultar("SELECT idCuentaP FROM cuentaspagar where concepto='$concepto' and folio_concepto='$folioConcepto'");	
    $resCuentaP=mysqli_fetch_array($consultaCuentasPagar);
    for($i=0;$i<$_SESSION['contador3'];$i++){//Se recorre el arreglo  para insertar los productos 
   
    $consultaProds=mysqli_query($con,"select*from producto where idProd=".$_SESSION['listaProd'][$i]);
    $producto=mysqli_fetch_array($consultaProds);
    $nuevaExistencia=$producto['existencia']+$_SESSION['cantidad3'][$i];
    if(consultasSQL::InsertSQL("entrada_producto", "idCuentaP,idProd,cantidad", "$resCuentaP[idCuentaP],$producto[idProd],".$_SESSION['cantidad3'][$i])){//Se inserta el registro correspondiente a la tabla entrada_productos
    if(consultasSQL::UpdateSQL("producto", "existencia=$nuevaExistencia", "idProd=".$producto['idProd'])){
      
    }else{
        if($_SESSION['listaProd'][$i]>0){    
    $cuentaErrores++;
        }
    }//Final de la validacion de actualizacion de la existencia del producto
    }else{
        if($_SESSION['listaProd'][$i]>0){    
            $cuentaErrores++;
                }
    }//final de validacion de insersion a la entrada 
    
    }
    //Si es ingresado un comprobante se almacena en su respectiva carpeta
    
}else{
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Error al registrar Entrada</p>';
    $cuentaErrores++;    
}               
}else{
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Este comprobante ya se encuentra registrado</p>';
    $cuentaErrores++;
         
}
if($cuentaErrores==0){
    echo '<img src="assets/img/correcto.png" class="center-all-contens"><br><p class="lead text-center">Cuenta a pagar registrada con éxito</p>
    <script>
    setTimeout(function(){
    url ="configAdmin.php";
    $(location).attr("href",url);
    },4000);
</script>';
}else{
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Algunos productos no fueron registrados</p>';
} 


}else{
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Añada al menos un producto</p>';
}
}else{
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Todos los productos añadidos deben pertenecer a la sucursal Seleccionada</p>';   
}

?> 