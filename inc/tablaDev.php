<?php

include '../library/consulSQL.php';

if(!$_POST['atributo']=="" && !$_POST['valor']==""){
    $conDevoluciones=ejecutarSQL::consultar("SELECT*FROM devoluciones where  ".$_POST['atributo']." like '%".$_POST['valor']."%'");
    $res=mysqli_num_rows($conDevoluciones);
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
$conDevoluciones=ejecutarSQL::consultar("SELECT*FROM devoluciones where  ".$_POST['atributo']." like '%".$_POST['valor']."%' order by fechaDevolucion desc");
while($devoluciones=mysqli_fetch_array($conDevoluciones)){
 echo '<tr>
    <th scope="row">'.$devoluciones['folioVenta'].'</th>
    <td>'.$devoluciones['fechaDevolucion'].'</td>
    <td>$'.$devoluciones['costoDevolucion'].'</td>
    <td>'.$devoluciones['usuario'].'</td>
    <td>
          <a id="detalle" title="detalles" class="btn btn-danger btn-xs"  data-toggle="modal" data-target="#detallesDev" data-whatever="'.$devoluciones['idDevolucion'].'">
            <span class="glyphicon glyphicon-list-alt"></span>
          </a>
        </td>
    </tr>';
        }
    }else{
echo "<h4>No se encontraron devoluciones</h4>";
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
    $conDevoluciones=ejecutarSQL::consultar("SELECT*FROM devoluciones order by fechaDevolucion desc limit 100");
while($devoluciones=mysqli_fetch_array($conDevoluciones)){
echo '<tr>
<th scope="row">'.$devoluciones['folioVenta'].'</th>
<td>'.$devoluciones['fechaDevolucion'].'</td>
<td>$'.$devoluciones['costoDevolucion'].'</td>
<td>'.$devoluciones['usuario'].'</td>
<td>
      <a id="detalle" title="detalles" class="btn btn-danger btn-xs"  data-toggle="modal" data-target="#detallesDev" data-whatever="'.$devoluciones['idDevolucion'].'">
        <span class="glyphicon glyphicon-list-alt"></span>
      </a>
    </td>
</tr>';
}  
    echo "</tbody></table>";
}
?>