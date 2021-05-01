<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';
$valor=$_POST['valor'];
if($valor!=""){
if($_SESSION['acceso']==1){	
$sqlcon="SELECT*FROM entrada_producto inner join cuentaspagar on entrada_producto.idCuentaP=cuentaspagar.idCuentaP inner join producto on entrada_producto.idProd=producto.idProd inner join marca on marca.idMarca=producto.idMarca inner join sucursal on cuentaspagar.idSucursal=sucursal.idSucursal WHERE codProd like '%$valor%' order by fecha_compra desc";
}else{
$sqlcon="SELECT*FROM entrada_producto inner join cuentaspagar on entrada_producto.idCuentaP=cuentaspagar.idCuentaP inner join producto on entrada_producto.idProd=producto.idProd inner join marca on marca.idMarca=producto.idMarca where cuentaspagar.idSucursal=".$_SESSION['sucursal']." AND codProd like '%$valor%'";	
}	
$conClientes=ejecutarSQL::consultar($sqlcon);
echo '<table class="table table table-striped" style="text-align:center;">';
echo "<thead><tr>
    <th scope='col' style='text-align:center;width:15%;'>Codigo</th>
    <th scope='col' style='text-align:center;width:15%;'>Producto</th>
    <th scope='col' style='text-align:center;'>Folio</th>
    <th scope='col' style='text-align:center;'>Concepto</th>
    <th scope='col' style='width:10%;text-align:center;width:17%;'>Cantidad</th>
    <th scope='col' style='text-align:center;'>Fecha</th>";
    
    if($_SESSION['acceso']==1){
    echo "<th scope='col' style='text-align:center;'>Sucursal</th>";   
    }
    echo " 
    </tr></thead>";  
while($clientes=mysqli_fetch_array($conClientes)){
 echo '<tr class="conClientes">   
 <td><div id="nombreProd-">'.$clientes['codProd'].'</div></td>
 <td><div id="nombreMarca">'.$clientes['nombreProd']." ".$clientes['NombreMarca'].'</div></td>
 <td><div id="codProd-'.$clientes['idProd'].'">'.$clientes['folio_concepto'].'</div></td>
 <td><div id="proveedor-'.$clientes['idProd'].'">'.$clientes['concepto'].'</div></td>';
echo '<td><div id="precioCosto-'.$clientes['idProd'].'">'.$clientes['cantidad'].'</div></td>';
echo '<td><div id="precioCosto-'.$clientes['idProd'].'">'.$clientes['fecha_compra'].'</div></td>';

if($_SESSION['acceso']==1){
    echo '<td><div id="idSucursal-'.$clientes['idProd'].'">'.$clientes['nombreSucursal'].'</div></td>';  
    }
echo '</tr>';    
}
echo "</table><br><br>";
}else{
    echo '<table class="table table table-striped" style="text-align:center;">';
    echo "<thead><tr>
    <th scope='col' style='text-align:center;width:15%;'>Codigo</th>
    <th scope='col' style='text-align:center;width:15%;'>Producto</th>
    <th scope='col' style='text-align:center;'>Folio</th>
    <th scope='col' style='text-align:center;'>Concepto</th>
	<th scope='col' style='width:10%;text-align:center;width:17%;'>Cantidad</th></tr></thead>";
    echo "</table><br><br>";
}
?>