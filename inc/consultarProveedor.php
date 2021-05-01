<?php
include '../library/configServer.php';
include '../library/consulSQL.php';
session_start();
if($_POST['valor']!=0){
$modelos=mysqli_query($con,"SELECT*FROM proveedor where idProveedor=".$_POST['valor']);
                                    
while($provc=mysqli_fetch_array($modelos)){
$_SESSION['idProveedor']=$provc['idProveedor'];
echo '<label>Nombre proveedor:</label>
<input type="text"  value="'.$provc['NombreProveedor'].'" class="form-control" readonly>';
}	
}else{
echo '<label>Nombre proveedor:</label>
<input type="text" class="form-control" readonly>';	
}	
?>