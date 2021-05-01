<?php
include '../library/configServer.php';
include '../library/consulSQL.php';
$contador=0;
$listaDet=array();
$cantDet=array();
$prod=array();
$cant=array();
$consultaVenta=ejecutarSQL::consultar("SELECT*FROM venta_contado where idVenta=".$_POST['recipient']);
$resultados=mysqli_num_rows($consultaVenta);
if($resultados>0){
echo '<div class="text-center"><h4>Productos</h4></div>';    
echo '<table class="table table-bordered" style="text-align:center;">';
echo '<tr><td>Codigo</td><td>Producto</td><td>Cantidad</td></tr>';    
$venta=mysqli_fetch_array($consultaVenta);
$productos=explode(" ",$venta['idProd']);
for($i=0;$i<count($productos);$i++){
$producto=explode(",",$productos[$i]);
$prod[$i]=$producto[0];
$cant[$i]=$producto[1];
$listaDet[$i]=$producto[0];
$cantDet[$i]=0;
$contador++;
}
for($u=0;$u<count($prod);$u++){
$consultaProductos=ejecutarSQL::consultar("SELECT*FROM producto inner join marca on marca.idMarca=producto.idMarca where idProd=".$prod[$u]);	
while($prods=mysqli_fetch_array($consultaProductos)){
echo '<tr><td>'.$prods['codProd'].'</td><td>'.$prods['nombreProd']." ".$prods['NombreMarca'].'</td><td>'.$cant[$u].'</td></tr>';	
}
}
echo '</table>';
}else{
echo '<h4>No se encontraron productos</h4>';
}

?>