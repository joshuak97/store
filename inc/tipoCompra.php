<?php

include '../library/configServer.php';
include '../library/consulSQL.php';

$tipoCompra=$_POST['tipoCompra'];

if($tipoCompra!="N"){
  if($tipoCompra=="nota"){

echo '<div class="form-group">
	<label>RFC Proveedor:</label>
	<select name="rfc-proveedor" id="select-rfc-proveedor" class="form-control" onchange="consultaNombreProve(this);">';
    $consultaProvees=ejecutarSQL::consultar("SELECT * FROM proveedor order by RFC asc");
	echo '<option value="0">Seleccione proveedor:</option>';  
    while($provees=mysqli_fetch_array($consultaProvees)){
	echo '<option value="'.$provees['idProveedor'].'">'.$provees['RFC'].'</option>';	
	}	  
echo '</select>
    </div>';
echo '<div class="form-group" id="nombreProvee">
<label>Nombre proveedor:</label>
<input type="text"  class="form-control" readonly>
</div>';	  

echo '<div class="form-group"><a type="button" style="display:inline-block" data-toggle="modal" data-target="#proveedorPopup">Agregar nuevo proveedor</a>
 &nbsp &nbsp<a type="button" style="display:inline-block" id="actualizarProvee" onclick="actualizarProveedores();">Actualizar</a>
</div>'; 

echo '<div class="form-group">
	<label>Numero de Nota:</label>                                   
    <select class="form-control" name="nota-cp" id="notaCp">';

$consultaNotas=ejecutarSQL::consultar("SELECT * FROM notas order by folioNota asc");
while($notas = mysqli_fetch_array($consultaNotas)) {

echo "<option value='".$notas['idNota']."'>".$notas['folioNota']."</option>";

}

echo '</select>
    </div>';

echo '<div class="form-group">';
echo '<a id="addNota" style="display:inline-block;" data-toggle="modal" data-target="#notaPopup">Agregar nueva Nota</a>&nbsp;&nbsp;&nbsp;&nbsp;
 <a id="actualizarNotas" onclick="actualizarNotas();">Actualizar</a></div>';

echo '<div class="form-group">';
echo '<label>Producto:</label><br>                                    
    <select class="form-control" name="prod-cp" id="prod-cp" style="width:83%;display:inline-block;">';

$consultaProd=ejecutarSQL::consultar("select * from producto inner join marca on producto.idMarca=marca.idMarca order by nombreProd asc");
while($prod= mysqli_fetch_array($consultaProd)) {

echo "<option value='".$prod['idProd']."'>".$prod['codProd']."-".$prod['nombreProd']."-".$prod['nombreMarca']."</option>";

}

echo '</select>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" class="btn btn-primary" value="Agregar" onclick="addProductos();"></div>';

echo '<div class="form-group"><a type="button" style="display:inline-block" data-toggle="modal" data-target="#productosPopup">Agregar nuevo Producto</a>&nbsp;&nbsp;&nbsp;&nbsp;<a type="button" style="display:inline-block" data-toggle="modal" data-target="#conProductosPopup">Consultar productos</a>&nbsp;&nbsp;&nbsp;&nbsp;
 <a onclick="actualizarProductos();">Actualizar</a></div>';

echo '<div  id="tabProds" class="form-group"></div>'; 

echo '<div class="form-group">
<label>Forma de pago:</label>
<select id="formaPago" name="forma-pago" class="form-control" onchange="dateSelect(this);">
<option value="0">Seleccione:</option>
<option value="contado">Contado</option>
<option value="credito">Credito</option>
</select>
</div>';

echo '<div class="form-group" id="date-select">
<label>Fecha de pago:</label>
<input type="date" class="form-control" name="cp-date" id="cp-date">
<input type="hidden" class="form-control" name="cp-date2" id="cp-date2" value="0">
</div><br>';


}else{

    echo '<div class="form-group">
	<label>RFC Proveedor:</label>
	<select name="rfc-proveedor" id="select-rfc-proveedor" class="form-control" onchange="consultaNombreProve(this);">';
    $consultaProvees=ejecutarSQL::consultar("SELECT * FROM proveedor order by RFC asc");
	echo '<option value="0">Seleccione proveedor:</option>';  
    while($provees=mysqli_fetch_array($consultaProvees)){
	echo '<option value="'.$provees['idProveedor'].'">'.$provees['RFC'].'</option>';	
	}	  
echo '</select>
    </div>';
echo '<div class="form-group" id="nombreProvee">
<label>Nombre proveedor:</label>
<input type="text"  class="form-control" readonly>
</div>';	  

echo '<div class="form-group"><a type="button" style="display:inline-block" data-toggle="modal" data-target="#proveedorPopup">Agregar nuevo proveedor</a>
 &nbsp &nbsp<a type="button" style="display:inline-block" id="actualizarProvee" onclick="actualizarProveedores();">Actualizar</a>
</div>';

echo '<div class="form-group" id="select-facturas">
	<label>Numero de Factura:</label>                                   
    <select class="form-control" name="factura-cp" id="facturaCp">';

$consulta=ejecutarSQL::consultar("SELECT * from facturas INNER JOIN proveedor on facturas.idProveedor=proveedor.idProveedor order by numero_factura asc");
while($fila = mysqli_fetch_array($consulta)){

echo "<option value='".$fila['id_factura']."'>".$fila['numero_factura']."-(".$fila['NombreProveedor'].")</option>";

}

echo '</select>
    </div>';

echo '<div class="form-group">';
echo '<a style="display:inline-block" data-toggle="modal" data-target="#facturaPopup">Agregar nueva Factura</a>&nbsp;&nbsp;&nbsp;&nbsp;
 <a onclick="actualizarFacturas();">Actualizar</a></div>';

echo '<div class="form-group">';
echo '<label>Producto:</label><br>                                    
    <select class="form-control" name="prod-cp" id="prod-cp" style="width:83%;display:inline-block;">';

$consultaProd=ejecutarSQL::consultar("select * from producto inner join marca on producto.idMarca=marca.idMarca order by nombreProd asc");
while($prod= mysqli_fetch_array($consultaProd)) {

echo "<option value='".$prod['idProd']."'>".$prod['codProd']."-".$prod['nombreProd']."-".$prod['nombreMarca']."-Num.Parte-".$prod['numParte']."</option>";

}

echo '</select>&nbsp;&nbsp;&nbsp;&nbsp;<input type="button" class="btn btn-primary" value="Agregar" onclick="addProductos();"></div>';

echo '<div class="form-group"><a type="button" style="display:inline-block" data-toggle="modal" data-target="#productosPopup">Agregar nuevo Producto</a>&nbsp;&nbsp;&nbsp;&nbsp;<a type="button" style="display:inline-block" data-toggle="modal" data-target="#conProductosPopup">Consultar productos</a>&nbsp;&nbsp;&nbsp;&nbsp;
 <a onclick="actualizarProductos();">Actualizar</a></div>';

echo '<div  id="tabProds" class="form-group"></div>';

echo '<div class="form-group">
<label>Forma de pago:</label>
<select id="formaPago" name="forma-pago" class="form-control" onchange="dateSelect(this);">
<option value="0">Seleccione:</option>
<option value="contado">Contado</option>
<option value="credito">Credito</option>
</select>
</div>';

echo '<div class="form-group" id="date-select">
<label>Fecha de pago:</label>
<input type="date" class="form-control" name="cp-date" name="id-date">
</div><br>';


}
}

?>