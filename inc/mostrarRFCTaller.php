<?php
include '../library/configServer.php';
include '../library/consulSQL.php';
session_start();
$conCliente=mysqli_query($con,"SELECT*FROM cliente where RFC='".$_SESSION['rfcNuevoCliente']."'");
$cliente=mysqli_fetch_array($conCliente);
echo ' <div class="form-group">
<input type="text" placeholder="Introduzca RFC del cliente" name="rfc-cliente" id="rfc-cliente" class="form-control" onkeyup="consultaNombre(this);" value="'.$_SESSION['rfcNuevoCliente'].'" required>
</div>
<div class="form-group" id="nameCliente">
<input type="text" placeholder="Nombre del cliente" name="nombre-cliente" id="nomCliente" class="form-control" value="'.$cliente['NombreCompleto'].'" readonly>
</div>';
?>