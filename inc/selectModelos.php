<?php
include '../library/consulSQL.php';

$idLinea=$_POST['idLinea'];
$lineas=ejecutarSQL::consultar("SELECT*FROM lineaCarros where nombreLinea='".$idLinea."'");
$id_linea=mysqli_fetch_array($lineas);
echo '<select class="form-control" name="modelo" id="modelo" onchange="selectAnio(this);">
  <option value="0">Seleccione modelo:</option>';
$modelos=ejecutarSQL::consultar("SELECT DISTINCT nombreModelo FROM modeloCarros where idLinea=".$id_linea['idLinea']);
    while($resmodelos=mysqli_fetch_array($modelos)){
    echo "<option value='".$resmodelos['nombreModelo']."'>".$resmodelos['nombreModelo']."</option>";
    }
echo '</select>';
?>