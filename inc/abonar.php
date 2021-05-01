<?php
include '../library/configServer.php';
include '../library/consulSQL.php';
session_start();
ini_set('date.timezone','America/Mexico_City');
$fechaAbono=date('Y-m-d , H:i:s',time());

if(!$_POST['abono']=="" && $_POST['abono']!=0 && !$_POST['folioCuenta']==""){
    $consulta1=ejecutarSQL::consultar("SELECT*FROM venta_credito where NumFolioC='".$_POST['folioCuenta']."'");
    $fila1 = mysqli_fetch_array($consulta1);
    $idVentaC=$fila1['idVentaC'];
    $abono=$_POST['abono'];
    $consulta2=ejecutarSQL::consultar("SELECT*FROM abono where idVentaC=$idVentaC order by idAbono desc limit 1");
    $fila2 =mysqli_fetch_array($consulta2);
    if($fila2['statusCuenta']!="pagada"){
    $restante=$fila2['restante']-$abono;
    $cambio=0;
    $status='abonada';
    if($restante<0){
    $cambio=$restante;
    $restante=0.00;
    $status="pagada";
    $abono=$abono+$cambio;
    }
    $pAbono=explode("-",$fila2['proximoAbono']);
    $nmes=$pAbono[1]+1;
    if($nmes<10){
    $npAbono="0".$nmes;
    }
    $proximoAbono=$pAbono[0]."-".$npAbono."-".$pAbono[2];
    $sucursal=$_SESSION['sucursal'];
if(consultasSQL::InsertSQL("abono", "idVentaC, fechaAbono, abono,restante,proximoAbono,statusCuenta,idSucursal", "$idVentaC,'$fechaAbono',".$abono.",".$restante.", '$proximoAbono','$status','$sucursal'")){
    echo '<img src="assets/img/correcto.png" class="center-all-contens"><br><p class="lead text-center">Abono Exitoso</p>';
    if($cambio<0){
        echo '<h4>Cambio: '.$cambio.'</h4>';
    }
}else{
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Error al registrar abono</p>';   
}
    }else{
        echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Esta cuenta ya esta pagada</p>';
    }
}else{
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Los datos no son correctos, el abono debe ser mayor a 0</p>';    
}
?>