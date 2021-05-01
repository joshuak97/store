<?php
include '../library/configServer.php';
include '../library/consulSQL.php';
session_start();

$folioVenta=$_POST['folioVenta'];
$_SESSION['folioVentaDev']=$folioVenta;
$prod=array();
$cant=array();
$consultaVenta=ejecutarSQL::consultar("SELECT*FROM venta_contado where NumFolio='".$folioVenta."'");
$resultados=mysqli_num_rows($consultaVenta);
if($resultados>0){
echo '<table class="table table-bordered" style="text-align:center;">';
echo '<tr><td>Codigo</td><td>Producto</td><td>Cantidad</td></tr>';    
$venta=mysqli_fetch_array($consultaVenta);
$productos=explode(" ",$venta['idProd']);
for($i=0;$i<count($productos);$i++){
$producto=explode(",",$productos[$i]);
$prod[$i]=$producto[0];
$cant[$i]=$producto[1];
$_SESSION['listaDev'][$i]=$producto[0];
$_SESSION['cantDev'][$i]=0;
$_SESSION['contadorDev']++;
}
echo '<input type="hidden" id="folioVenta" value="'.$folioVenta.'">';
echo '<div><h5>Seleccione el numero de piezas de los productos que desea devolver, posteriormente de click en el botón <strong>Realizar devolucion</strong>: </label></h5>';
for($u=0;$u<count($prod);$u++){
$consultaProductos=ejecutarSQL::consultar("SELECT*FROM producto inner join marca on marca.idMarca=producto.idMarca where idProd=".$prod[$u]);	
while($prods=mysqli_fetch_array($consultaProductos)){
echo '<tr><td>'.$prods['codProd'].'</td><td>'.$prods['nombreProd']." ".$prods['NombreMarca'].'</td><td>'.$cant[$u].'</td></tr>';	
}
}
echo '</table><br>';
echo '<div class=" text-center"> 
<button class="btn btn-success btn-sm" id="realizarDev" onclick="addDevolucion();">Cancelar Venta</button>
<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
</div><br>';
}else{
echo '<h4>No se encontraron ventas</h4>';
}

?>