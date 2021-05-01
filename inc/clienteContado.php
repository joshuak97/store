<?php
include '../library/configServer.php';
include '../library/consulSQL.php';
session_start();
if($_SESSION['rfcNuevoCliente']!=""){
$venta=$_SESSION['folioVentaRealizada'];   
$conCliente=ejecutarSQL::consultar("SELECT*FROM cliente where RFC='".$_SESSION['rfcNuevoCliente']."'");
$cliente=mysqli_fetch_array($conCliente);
if(consultasSQL::UpdateSQL("venta_contado","idCliente=".$cliente['idCliente'],"NumFolio='$venta'")){
    
  
}else{
    echo '<br>
    <img class="center-all-contens" src="../assets/img/cancel.png">
    <p><strong>Error</strong></p>
    <p class="text-center">
    Ha ocurrido un error al seleccionar cliente, por favor intentelo de nuevo
        Recargando<br>
        en 7 segundos
    </p>
    <script>
        setTimeout(function(){
        url ="configAdmin.php";
        $(location).attr("href",url);
        },7000);
    </script>
 ';    
}
}

?>