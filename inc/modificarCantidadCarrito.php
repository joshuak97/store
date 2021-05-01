<?php
include '../library/configServer.php';
include '../library/consulSQL.php';
session_start();
$suma=0;
$_SESSION['cantidad'][$_POST['posicion']]=$_POST['cantidad'];  
for($i=0;$i<$_SESSION['contador'];$i++){
    $consulta1=ejecutarSQL::consultar("SELECT precioVenta FROM producto where idProd='".$_SESSION['producto'][$i]."'");
    $res=mysqli_fetch_array($consulta1);
    $suma+=$res['precioVenta']*$_SESSION['cantidad'][$i];
}
echo "$".number_format($suma,2);
$_SESSION['sumaTotal']=number_format($suma,2);
?>