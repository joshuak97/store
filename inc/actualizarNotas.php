<?php


include '../library/configServer.php';
include '../library/consulSQL.php';

echo "<option>Actualizado</option>";
$consultaNotas=ejecutarSQL::consultar("SELECT * FROM notas");
while($notas = mysqli_fetch_array($consultaNotas)) {

echo "<option value='".$notas['idNota']."'>".$notas['folioNota']."</option>";

}
?>