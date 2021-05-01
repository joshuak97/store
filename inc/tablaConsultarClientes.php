<?php
include '../library/configServer.php';
include '../library/consulSQL.php';
$nombreCliente=$_POST['nombreCliente'];
if($nombreCliente!=""){
$conClientes=ejecutarSQL::consultar("SELECT*FROM cliente WHERE NombreCompleto like '%$nombreCliente%'");
echo '<table class="table table table-striped" style="text-align:center;">';
echo "<thead><tr>
<th scope='col' style='width:20%;'>Nombre del Cliente</th>
<th scope='col' style='text-align:center;'>RFC</th>
<th scope='col' style='text-align:center;'>Direccion</th>
<th scope='col' style='text-align:center;'>Telefono</th>
<th scope='col' style='text-align:center;'>Opciones</th>    
</tr></thead>";
while($clientes=mysqli_fetch_array($conClientes)){
 echo '<tr class="conClientes">
 <th scope="row">'.$clientes['NombreCompleto'].'</th>
 <td>'.$clientes['RFC'].'</td>
 <td>'.$clientes['Calle']." ".$clientes['noExterior']." ".$clientes['colonia']." ".$clientes['municipio']." ".$clientes['estado']." ".$clientes['codigoPostal'].'</td>
 <td>'.$clientes['Telefono'].'</td>
 <td value="'.$clientes['RFC'].'" onclick="mostrarConsultaClientes('.$clientes['idCliente'].');"> <button type="button" class="btn btn-danger btn-md" data-dismiss="modal">Seleccionar</button></td>
 </tr>';    
}
echo "</table><br><br>";
}
?>