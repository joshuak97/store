<?php
include '../library/configServer.php';
include '../library/consulSQL.php';
session_start();
if(!$_POST['valor']==""){
    $conCliente=mysqli_query($con,"SELECT*FROM cliente where RFC='".$_POST['valor']."'");
    $num=mysqli_num_rows($conCliente);
    if($num>0){
    $cliente=mysqli_fetch_array($conCliente);
    echo  '<input type="text" placeholder="Nombre del cliente" name="nombre-cliente" id="nomCliente" class="form-control" value="'.$cliente['NombreCompleto'].'" readonly>';    
}else{
    echo ' <input type="text" placeholder="Nombre del cliente" name="nombre-cliente" id="nomCliente" class="form-control" readonly>';  
    }
}else{
echo ' <input type="text" placeholder="Nombre del cliente" name="nombre-cliente" id="nomCliente" class="form-control" readonly>';
}
?>