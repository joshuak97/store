<?php


include '../library/configServer.php';
include '../library/consulSQL.php';

$consultaProd=ejecutarSQL::consultar("select * from producto inner join marca on producto.idMarca=marca.idMarca");
echo '<option value="0">Actualizado:</option>';
while($prod= mysqli_fetch_array($consultaProd)) {

echo "<option value='".$prod['idProd']."'>".$prod['codProd']."-".$prod['nombreProd']."-".$prod['nombreMarca']."-Num.Parte-".$prod['numParte']."</option>";

}
?>