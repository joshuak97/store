<?php


include '../library/configServer.php';
include '../library/consulSQL.php';

echo "<option>Actualizado</option>";
$consultaNotas=ejecutarSQL::consultar("SELECT * FROM facturas inner join proveedor on facturas.idProveedor=proveedor.idProveedor");
while($notas = mysqli_fetch_array($consultaNotas)) {

echo "<option value='".$notas['id_factura']."'>".$notas['numero_factura']."-(".$notas['NombreProveedor'].")</option>";

}
?>