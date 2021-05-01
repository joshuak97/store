<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';
$valor=$_POST['nombreCliente'];
if($valor!=""){
if($_SESSION['acceso']==1){	
$sqlcon="SELECT*FROM producto inner join marca on producto.idMarca=marca.idMarca inner join proveedor on producto.idProveedor=proveedor.idProveedor WHERE nombreProd like '%$valor%' OR codProd like '%$valor%' OR NombreMarca like '%$valor%' OR NombreProveedor like '%$valor%'";
}else{
$sqlcon="SELECT*FROM producto inner join marca on producto.idMarca=marca.idMarca inner join proveedor on producto.idProveedor=proveedor.idProveedor WHERE (nombreProd like '%$valor%' OR codProd like '%$valor%' OR NombreMarca like '%$valor%' OR NombreProveedor like '%$valor%') AND idSucursal=".$_SESSION['sucursal'];	
}	
$conClientes=ejecutarSQL::consultar($sqlcon);
echo '<table class="table table table-striped" style="text-align:center;">';
echo "<thead><tr>
    <th scope='col' style='text-align:center;width:15%;'>Producto</th>
    <th scope='col' style='text-align:center;width:15%;'>Marca</th>
    <th scope='col' style='text-align:center;'>Codigo</th>
    <th scope='col' style='text-align:center;'>Proveedor</th>
	<th scope='col' style='width:10%;text-align:center;width:17%;'>Costo</th>
    <th scope='col' style='text-align:center;width:15%;'>Opciones</th>    
    </tr></thead>";  
while($clientes=mysqli_fetch_array($conClientes)){
 echo '<tr class="conClientes">
 <td><div id="nombreProd-'.$clientes['idProd'].'">'.$clientes['nombreProd'].'</div></td>
 <td><div id="nombreMarca-'.$clientes['idProd'].'">'.$clientes['NombreMarca'].'</div></td>
 <td><div id="codProd-'.$clientes['idProd'].'">'.$clientes['codProd'].'</div></td>
 <td><div id="proveedor-'.$clientes['idProd'].'">'.$clientes['NombreProveedor'].'</div></td>';
echo '<td><div id="precioCosto-'.$clientes['idProd'].'">'.$clientes['precioCosto'].'</div></td>';
echo '<td><div id="opciones-'.$clientes['idProd'].'"><button onclick="agregarCarritoPVmodal('.$clientes['codProd'].',1);" class="btn btn-primary btn-sm" data-dismiss="modal" title="seleccionar producto">Seleccionar</button>';
echo '</div></td></tr>';    
}
echo "</table><br><br>";
}else{
    echo '<table class="table table table-striped" style="text-align:center;">';
    echo "<thead><tr>
    <th scope='col' style='width:20%;'>Codigo</th>
    <th scope='col' style='text-align:center;'>Producto</th>
    <th scope='col' style='text-align:center;'>Marca</th>
    <th scope='col' style='text-align:center;'>Proveedor</th>
    <th scope='col' style='text-align:center;'>Opciones</th>    
    </tr></thead>";   
    echo "</table><br><br>";
}
?>