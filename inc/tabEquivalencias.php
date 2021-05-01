<?php
include '../library/configServer.php';
include '../library/consulSQL.php';
$idEquivalencia=$_POST['idEquivalencia'];
$codProd=$_POST['codProd'];
$existencias=$_POST['existencias'];
if($idEquivalencia!=0){
echo "<table class='table table-striped'>
<thead>
<tr>
<th scope='col'>Codigo</th>
<th scope='col' style='text-align:center;'>Producto</th>
<th scope='col' style='text-align:center;'>Marca</th>
<th scope='col' style='text-align:center;'>Precio</th>
<th scope='col' style='text-align:center;'>Existencia</th>
<th scope='col' style='text-align:center;'>Opciones</th>
</tr>
</thead>
<tbody>";



$conEquivalencias=ejecutarSQL::consultar("SELECT*FROM producto INNER JOIN marca on marca.idMarca=producto.idMarca WHERE codProd!='".$codProd."' AND idEquivalencia=".$idEquivalencia);
while($equivalencia=mysqli_fetch_array($conEquivalencias)){
echo '<tr>
<th scope="row">'.$equivalencia['codProd'].'</th>
<td>'.$equivalencia['nombreProd'].'</td>
<td>'.$equivalencia['NombreMarca'].'</td>
<td>'.$equivalencia['precioVenta'].'</td>
<td>'.$equivalencia['existencia'].'</td>
<td><input class="form-control" type="number" id="'.$equivalencia['codProd'].'" min="1" max="'.$equivalencia['existencia'].'" style="display:inline-block;width:20%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button style="display:inline-block;" class="btn btn-sm btn-success" onclick="agregarCarrito('.$equivalencia['codProd'].');"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;Añadir</button></td>
</tr>';
}

echo "</tbody></table>";
}else{
echo '<h4>No se encontraron equivalencias</h4>';    
}
?>  