
<?php
include '../library/consulSQL.php';


echo '<select name="anio" id="anio" class="form-control" onchange="busquedaFinal(this);">
  <option value="0">a año:</option>';
 $proveedoresc=ejecutarSQL::consultar("SELECT * FROM anoCarros where idAno!=41");
    while($provc=mysqli_fetch_array($proveedoresc)){
    echo '<option value="'.$provc['ano'].'">'.$provc['ano'].'</option>';
    }
echo '</select>';
?>
