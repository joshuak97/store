<?php
include '../library/configServer.php';
include '../library/consulSQL.php';

$CodigoProducto=$_POST['codigoProducto'];
//Tabla Aplicaciones
$productoinfo= ejecutarSQL::consultar("SELECT*FROM producto WHERE idProd=".$CodigoProducto);
$producto=mysqli_fetch_array($productoinfo);
echo "<table class='table table-striped'>
<thead>
<tr>
  <th scope='col' style='width:20%;text-align:center;'>Linea</th>
  <th scope='col' style='text-align:center;'>Modelo</th>
  <th scope='col' style='text-align:center;'>Año</th>
  <th scope='col' style='text-align:center;'>Descipción</th>          
  </tr>
  </thead>
  <tbody>";
 echo $producto['aplicaciones'];
 echo "</tbody></table>";
?>