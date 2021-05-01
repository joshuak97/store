

<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';
$id=$_SESSION['idCuentaP'];
$entradaCP=ejecutarSQL::consultar("SELECT concepto,folio_concepto FROM cuentaspagar where idCuentaP=".$id);
$entradaCP=mysqli_fetch_array($entradaCP);                 
?>
<div class="text-center">
<h4><?php echo $entradaCP['concepto']."-".$entradaCP['folio_concepto']; ?></h4></div>
<table class="table table-bordered" style="text-align:center;">
                  <tr>
                  <td><strong>Producto</strong></td>
                  <td><strong>Marca</strong></td>
                  <td><strong>Cantidad</strong></td>
                  <td><strong>Costo</strong></td>
                  </tr>
                  <?php
                  $entradaP=ejecutarSQL::consultar("SELECT * FROM entrada_producto inner join producto on entrada_producto.idProd=producto.idProd inner join marca on producto.idMarca=marca.idMarca where idCuentaP=".$id);
            
                  while($entrada=mysqli_fetch_array($entradaP)){
                  echo "
                  <tr>
                  <td>$entrada[nombreProd]</td>
                  <td>$entrada[NombreMarca]</td>
                  <td>$entrada[cantidad]</td>
                  <td>$$entrada[precioCosto]</td>
                  </tr>
                  ";
                  }
                  ?>                       
                  </table>