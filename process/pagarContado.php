<?php

include '../library/configServer.php';
include '../library/consulSQL.php';
include '../inc/link.php';

$sucursal=0;
$contaSuc=0;
$verCC=ejecutarSQL::consultar("select*from corteCaja where idUsuario=".$_SESSION['idUser']." order by idCorte desc limit 1");
$numcc=mysqli_num_rows($verCC);
if($numcc>0){
$cc=mysqli_fetch_array($verCC);
if($cc['estado']=='abierta'){
if($_SESSION['tipoVenta']=='contado'){ 

$existencia=array();

ini_set('date.timezone','America/Mexico_City');
$num_prod=$_SESSION['contador'];
$fechaVenta=date('Y-m-d , H:i:s',time());
$folioVenta=substr(date('YmdHis',time()), 2);
$modoPago=1;
$_SESSION['formaPago']=$modoPago;
$modoCompra=$_POST['forma-compra'];
$des=0;
$descu=$_POST['desv'];
if(!$_POST['desv']==""){
$des=$_POST['desv']/100;
}
$descuento=$_SESSION['sumaTotal']*$des;
$_SESSION['descuento']=$descuento;
$_SESSION['desv']=$_POST['desv'];
$idProd="";
$idVendedor="";
$totalVenta=number_format($_SESSION['sumaTotal'],2);
$verdata=  ejecutarSQL::consultar("select idUsuario from usuarios where pass='".$_SESSION['claveUser']."' and user='".$_SESSION['nombreUser']."'");
$cantidad=array();
while($vendedor = mysqli_fetch_array($verdata)) {
    $idVendedor.=$vendedor['idUsuario'];
    }

for($i = 0;$i< $_SESSION['contador'];$i++){
    $consulta=ejecutarSQL::consultar("select * from producto where idProd=".$_SESSION['producto'][$i]);
    while($fila = mysqli_fetch_array($consulta)){
        if($sucursal==0){
        $sucursal=$fila['idSucursal'];
        }
        if($sucursal==$fila['idSucursal']){
            $contaSuc++;
        }
        $existencia[$i]=$fila['existencia']-$_SESSION['cantidad'][$i];
            
        if($i==$_SESSION['contador']-1){
            $idProd.=$fila['idProd'].",".$_SESSION['cantidad'][$i];
        }else{
         $idProd.=$fila['idProd'].",".$_SESSION['cantidad'][$i]." ";    
        }
   
    }


}
if($contaSuc==$_SESSION['contador']){
if(consultasSQL::InsertSQL("venta_contado", "idProd, NumFolio, Fecha, tipoPago, totalPagar,idVendedor,idSucursal,descuento", "'$idProd','$folioVenta','$fechaVenta','$modoPago','".$_SESSION['sumaTotal']."', '$idVendedor',$sucursal,$descu")){
   for($u = 0;$u< $_SESSION['contador'];$u++){

    $consulta1=ejecutarSQL::consultar("SELECT existencia FROM producto where idProd='".$_SESSION['producto'][$u]."'");
    while($fila1 = mysqli_fetch_array($consulta1)){
    if(consultasSQL::InsertSQL("salida_producto", "idConcepto,concepto,idProd,cantidad,idSucursal,fecha_salida", "'$folioVenta','Venta contado',".$_SESSION['producto'][$u].",".$_SESSION['cantidad'][$u].",".$sucursal.",NOW()")){//Se inserta el registro correspondiente a la tabla entrada_productos
    consultasSQL::UpdateSQL("producto"," existencia=".$existencia[$u], "idProd='".$_SESSION['producto'][$u]."'");    
        
}
    }

}
    $_SESSION['folioVentaRealizada']=$folioVenta;
    $_SESSION['idVentaContado']=$folioVenta;
   
    echo '<iframe src="pdf/nota/nota_pdf.php" width="590" height="650">Detalles de Cuenta a Pagar</iframe>';
    echo ' <div class="text-center"><a class="btn btn-danger" href="index.php">Terminar</a>&nbsp;&nbsp;<a class="btn btn-success" href="facturar.php" target="_blank">Facturar</a></div>';
}else{
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Error al registrar venta</p>';
$_SESSION['idVentaContado']=0;

}
}else{

    echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Error los productos deben ser de la misma sucursal</p>';
}
}else if($_SESSION['tipoVenta']=='credito'){

$existencia=array();
$consultaIdCliente=ejecutarSQL::consultar("SELECT*FROM cliente where RFC='".$_POST['rfc-clientes']."'");

$resIdCliente=mysqli_fetch_array($consultaIdCliente);
$idCliente=$resIdCliente['idCliente'];
ini_set('date.timezone','America/Mexico_City');
$num_prod=$_SESSION['contador'];
$meses=$_POST['meses'];
$fechaVenta=date('Y-m-d , H:i:s',time());
$proximoAbono=date("Y-m-d ",strtotime($fechaVenta."+ 1 month"));;
$folioVenta=substr(date('YmdHis',time()), 2);
$modoPago=2;
$modoCompra=$_POST['forma-compra'];
$idProd="";
$idVendedor="";
$meses=$_POST['meses'];
$totalPagar=$_SESSION['sumaTotal'];
$abono=$totalPagar/+$meses;
$_SESSION['abonoV']=$abono;
$restante=$totalPagar-$abono;
$_SESSION['formaPago']=$modoPago;
$_SESSION['idCliente']=$idCliente;
$verdata=  ejecutarSQL::consultar("select idUsuario from usuarios where pass='".$_SESSION['claveUser']."' and user='".$_SESSION['nombreUser']."'");
$cantidad=array();
while($vendedor = mysqli_fetch_array($verdata)) {
    $idVendedor.=$vendedor['idUsuario'];
    }

for($i = 0;$i< $_SESSION['contador'];$i++){
    $consulta=ejecutarSQL::consultar("select * from producto where idProd=".$_SESSION['producto'][$i]);

    while($fila = mysqli_fetch_array($consulta)){
      
        $existencia[$i]=$fila['existencia']-$_SESSION['cantidad'][$i];
        if($sucursal==0){
            $sucursal=$fila['idSucursal'];
            }
            if($sucursal==$fila['idSucursal']){
                $contaSuc++;
            }
        if($i==$_SESSION['contador']-1){
            $idProd.=$fila['idProd'].",".$_SESSION['cantidad'][$i];
        }else{
         $idProd.=$fila['idProd'].",".$_SESSION['cantidad'][$i]." ";    
        }
   
    }


}
if($contaSuc==$_SESSION['contador']){
if(consultasSQL::InsertSQL("venta_credito", "idCliente,idProd, NumFolioC, FechaC, tipoPagoC,meses,totalPagar,idVendedor,idSucursal", "'$idCliente','$idProd','$folioVenta','$fechaVenta','$modoPago',$meses,'".$_SESSION['sumaTotal']."', '$idVendedor',$sucursal")){
    
    $consulta1=ejecutarSQL::consultar("SELECT*FROM venta_credito where NumFolioC='".$folioVenta."'");
    $fila1 = mysqli_fetch_array($consulta1);
    
    $idVentaC=$fila1['idVentaC'];
 if(consultasSQL::InsertSQL("abono", "idVentaC, fechaAbono, abono,restante,proximoAbono,statusCuenta,idSucursal", "$idVentaC,'$fechaVenta',".$abono.",".$restante.", '$proximoAbono','abonada','$sucursal'")){
    
    $_SESSION['proximoAbono']=$proximoAbono;     
   for($u = 0;$u< $_SESSION['contador'];$u++){
    if(consultasSQL::InsertSQL("salida_producto", "idConcepto,concepto,idProd,cantidad,idSucursal,fecha_salida", "'$folioVenta','Venta credito',".$_SESSION['producto'][$u].",".$_SESSION['cantidad'][$u].",".$sucursal.",NOW()")){//Se inserta el registro correspondiente a la tabla entrada_productos   
    $consulta2=ejecutarSQL::consultar("SELECT existencia FROM producto where idProd=".$_SESSION['producto'][$u]);
  
    while($fila2 = mysqli_fetch_array($consulta2)){
    consultasSQL::UpdateSQL("producto"," existencia=".$existencia[$u], "idProd=".$_SESSION['producto'][$u]);    
        
}
    }
}

}else{
 echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">No se pudo registrar abono</p>';
}
$_SESSION['folioVentaRealizada']=$folioVenta;
    $_SESSION['idVentaCredito']=$folioVenta;
    echo '<iframe src="pdf/nota/nota_pdf.php" width="590" height="650">Detalles de Cuenta a Pagar</iframe>';  
    echo '<div class="text-center"><a class="btn btn-danger" href="index.php">Terminar</a>&nbsp;&nbsp;<a class="btn btn-success" href="facturar.php" target="_blank">Facturar</a></div>';

}else{

$_SESSION['idVentaCredito']=0;

}
}else{
  
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Error los productos deben ser de la misma sucursal</p>';               
}
}else{



}
}else{//Si la caja del usuario no esta abierta, abrimos el modal abrir caja 2 el cual esta adaptado para el modulo de ventas
    echo "<script>$('#abrirCajaPopup2').modal('show');</script>";
}
}else{
    echo "<script>$('#abrirCajaPopup2').modal('show');</script>";
}

?>


