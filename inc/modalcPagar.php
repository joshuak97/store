
<?php

include '../library/configServer.php';
include '../library/consulSQL.php';


$recipient=$_POST['recipient'];
$consulta1= ejecutarSQL::consultar("SELECT * FROM venta_credito INNER JOIN abono ON venta_credito.idVentaC=abono.idVentaC INNER JOIN cliente on cliente.idCliente=venta_credito.idCliente WHERE NumFolioC=". $recipient."  ORDER BY idAbono DESC limit 1"); 
$ventas=mysqli_fetch_array($consulta1);
echo "<h4 class='text-center'><strong>Proximo abono:</strong>"." ".$ventas['proximoAbono']." </h4>";
echo "<br>";

echo '<table class="table table-bordered" style="text-align:center;font-size: 17px;">';
echo '<tr><td>Nombre del cliente</td><td>Ultimo Abono</td><td>Monto ultimo Abono</td><td>Total a Pagar</td><td>Restante</td></tr>';

echo '<tr><td>'.$ventas['NombreCompleto'].'</td><td>'.$ventas['fechaAbono'].'</td><td>'.$ventas['abono'].'</td><td>'.$ventas['totalPagar'].'</td><td>'.$ventas['restante'].'</td>
  
    </tr>';
   

echo '</table><br>';
if($ventas['statusCuenta']=="abonada"){
echo '<div class="text-center"><label>Cantidad:</label>&nbsp;&nbsp;$&nbsp;
<div style="display:inline-block;width:12%" class="text-center">';
echo '<input type="text" value="0.00" class="form-control" id="'.$recipient.'">';
echo '</div></div><br>';

echo ' <div class="text-center"><button class="btn btn-danger" style="width: 20%;height: 15%" id="abonar" onclick="abonar(\''.$recipient.'\',\''.$recipient.'\');">Abonar</button>&nbsp &nbsp
                  
</div>';
}else{
echo "<div class='text-center'><h4>¡Esta cuenta ya ha sido pagada!</h4></div>";
}
?>