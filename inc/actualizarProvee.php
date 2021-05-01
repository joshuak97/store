<?php
include '../library/configServer.php';
include '../library/consulSQL.php';
$consultaProvees=ejecutarSQL::consultar("SELECT * FROM proveedor");
echo '<option value="0">Actualizado:</option>';  
while($provees=mysqli_fetch_array($consultaProvees)){
echo '<option value="'.$provees['idProveedor'].'">'.$provees['RFC'].'</option>';	
}	  
?>

