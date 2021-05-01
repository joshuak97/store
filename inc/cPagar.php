<?php

include '../library/configServer.php';
include '../library/consulSQL.php';

session_start();

$nombreCliente=$_POST['nombreCliente'];

if($nombreCliente!=""){

$contador=0;

$consulta1= ejecutarSQL::consultar("SELECT * FROM venta_credito INNER JOIN abono ON venta_credito.idVentaC=abono.idVentaC inner join cliente on venta_credito.idCliente=cliente.idCliente WHERE NombreCompleto LIKE '%$nombreCliente%' or RFC LIKE '%$nombreCliente%' OR NumFolioC like '%$nombreCliente%'  ORDER BY fechaAbono DESC LIMIT 20");	
$totalVentas = mysqli_num_rows($consulta1);
if($totalVentas>0){

echo '<table class="table table-bordered" style="text-align:center;font-size: 17px;">';

echo '<tr><td><strong>Folio Venta</strong><td><strong>Nombre del cliente</strong></td><td><strong>Fecha de Venta</strong></td><td><strong>Ultimo Abono</strong></td><td><strong>Monto de Ultimo Abono</strong></td><td><strong>Total a Pagar</strong></td><td><strong>Restante</strong></td><td><strong>Detalles</strong></td></tr>';
while($ventas=mysqli_fetch_array($consulta1)){
$pid=$ventas['NumFolioC'];
echo '<tr><td>'.$ventas['NumFolioC'].'</td><td>'.$ventas['NombreCompleto'].'</td><td>'.$ventas['FechaC'].'</td><td>'.$ventas['fechaAbono'].'</td><td>'.$ventas['abono'].'</td><td>'.$ventas['totalPagar'].'</td><td>'.$ventas['restante'].'</td>
	<td class="text-center">
      <a id="detalle" title="detalles" class="btn btn-warning btn-xs"  data-toggle="modal" data-target="#detallesVenta" data-whatever="'.$ventas['NumFolioC'].'">
        <span class="glyphicon glyphicon-pencil"></span>
      </a>
    </td>
    </tr>';
   
    $contador++;


}

echo '</table>';

}

if($contador==0){
echo '<h4>No se encontraron Resultados</h4>';
}


}else{
  echo '<table class="table table-bordered" style="text-align:center;font-size: 17px;">';

echo '<tr><td><strong>Folio Venta</strong><td><strong>Nombre del cliente</strong></td><td><strong>Fecha de Venta</strong></td><td><strong>Ultimo Abono</strong></td><td><strong>Monto de Ultimo Abono</strong></td><td><strong>Total a Pagar</strong></td><td><strong>Restante</strong></td><td><strong>Detalles</strong></td></tr></table>';
}

?>