<?php
include '../library/configServer.php';
include '../library/consulSQL.php';

$conProd=ejecutarSQL::consultar("SELECT*FROM producto inner join marca on producto.idMarca=marca.idMarca where idProd=$_POST[idProd]");
$prod=mysqli_fetch_array($conProd); 
?>

<input type="hidden" name="idProd" value="<?php echo $prod['idProd'];?>">
<input type="hidden" name="idSucursal" value="<?php echo $prod['idSucursal'];?>">  
<table class="table table-bordered" style="text-align:center;">
<tr><td>Codigo</td><td>Producto</td><td>Cantidad</td></tr>
<tr><td><?php echo $prod['codProd'];?></td><td><?php echo $prod['nombreProd']." ".$prod['NombreMarca'];?></td>
<td><input type="number" class="form-control" name="cantidad" value="1" min="1" max="<?php echo $prod['existencia'];?>"></td></tr>
</table>

<textArea class="form-control" name="descripcion" placeholder="Describa brevemente las fallas en el producto" required></textArea><br>
<div class="form-group text-center"><button class="btn btn-success" type="submit">Agregar Baja</button>&nbsp;&nbsp;<a data-dismiss="modal" class="btn btn-danger">Cancelar</a></div>
<br>
