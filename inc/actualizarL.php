<?php


include '../library/configServer.php';
include '../library/consulSQL.php';

echo "<option>Actualizado</option>";
$proveNIT=mysqli_query($con,"SELECT * FROM lineaCarros where idLinea!=17 order by nombreLinea asc");
while($PN=mysqli_fetch_array($proveNIT)){
    echo '<option value="'.$PN['idLinea'].'">'.$PN['idLinea'].' - '.$PN['nombreLinea'].'</option>';
}

?>