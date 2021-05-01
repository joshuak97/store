<?php
include '../library/consulSQL.php';


echo '<select name="anio" id="anio" class="form-control" onchange="selectAnio2(this);">
  <option value="0">de año:</option>';
 $proveedoresc=ejecutarSQL::consultar("SELECT * FROM anoCarros where idAno!=41");
    while($provc=mysqli_fetch_array($proveedoresc)){
    echo '<option value="'.$provc['ano'].'">'.$provc['ano'].'</option>';
    }
echo '</select>';
?>