<?php

include '../library/consulSQL.php';

if(!$_POST['atributo']=="" && !$_POST['valor']==""){
    $conVentas=ejecutarSQL::consultar("SELECT*FROM venta_contado inner join usuarios on venta_contado.idVendedor=usuarios.idUsuario where  ".$_POST['atributo']." like '%".$_POST['valor']."%' order by Fecha desc");
    $res=mysqli_num_rows($conVentas);
    if($res>0){

       
echo "<table class='table table-striped'>
<thead>
<tr>
<th scope='col'>Venta</th>
<th scope='col'>Fecha de devolucion</th>
<th scope='col'>descripcion</th>
<th scope='col'>Costo</th>
<th scope='col'>Aprueba</th>
</tr>
</thead>
<tbody>";
while($ventas=mysqli_fetch_array($conVentas)){
    echo '<tr>
    <th scope="row">'.$ventas['NumFolio'].'</th>
    <td>'.$ventas['Fecha'].'</td>';
    if($ventas['tipoPago']==1){
    echo '<td>Efectivo</td>';
    }else if($ventas['tipoPago']==3){
        echo '<td>Pago con tarjeta</td>';
    }else{
        echo '<td>Efectivo</td>';
    }
    echo '<td>'.$ventas['totalPagar'].'</td>
    <td>'.$ventas['user'].'</td>
    <td>
          <a id="detalle" title="detalles" class="btn btn-warning btn-xs"  onclick="generarVR('.$ventas['idVenta'].');">
            <span class="glyphicon glyphicon-list-alt"></span>
          </a>
        </td>
    </tr>';
        }
    }else{
echo "<h4>No se encontraron Ventas</h4>";
    }
}else{
    echo "<table class='table table-striped'>
    <thead>
    <tr>
    <th scope='col'>Venta</th>
    <th scope='col'>Fecha de devolucion</th>
    <th scope='col'>descripcion</th>
    <th scope='col'>Costo</th>
    <th scope='col'>Aprueba</th>
    </tr>
    </thead>
    <tbody>"; 
    $conVentas=ejecutarSQL::consultar("SELECT*FROM venta_contado inner join usuarios on venta_contado.idVendedor=usuarios.idUsuario order by Fecha desc limit 100");
while($ventas=mysqli_fetch_array($conVentas)){
echo '<tr>
<th scope="row">'.$ventas['NumFolio'].'</th>
<td>'.$ventas['Fecha'].'</td>';
if($ventas['tipoPago']==1){
echo '<td>Efectivo</td>';
}else if($ventas['tipoPago']==3){
    echo '<td>Pago con tarjeta</td>';
}else{
    echo '<td>Efectivo</td>';
}
echo '<td>'.$ventas['totalPagar'].'</td>
<td>'.$ventas['user'].'</td>
<td>
      <a id="detalle" title="detalles" class="btn btn-warning btn-xs"  onclick="generarVR('.$ventas['idVenta'].');">
        <span class="glyphicon glyphicon-list-alt"></span>
      </a>
    </td>
</tr>';
}  
    echo "</tbody></table>";
}
?>