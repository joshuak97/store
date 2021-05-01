<?php
include '../library/configServer.php';
include '../library/consulSQL.php';
$idCliente=$_POST['recipient'];
$consultaClientes= ejecutarSQL::consultar("SELECT * FROM cliente where idCliente=$idCliente");
$cliente=mysqli_fetch_array($consultaClientes);
echo '<form action="process/updateCliente.php" method="post" role="form"   id="faddCliente">';
echo '<input type="hidden" name="id" value="'.$idCliente.'">';
echo ' <div class="form-group">
<label>Nombre</label>
<input class="form-control" type="text" name="name-cliente" placeholder="Nombre del cliente" maxlength="50" value="'.$cliente['Nombre'].'">
</div>
<div class="form-group">
<label>Apellidos</label>
<input class="form-control" type="text" name="apellido-cliente" placeholder="Apellidos del cliente" required="" value="'.$cliente['Apellido'].'">
</div> 
<div class="form-group">
<label>RFC</label>
<input class="form-control" type="text" name="rfc-cliente" placeholder="RFC del cliente" onkeyup="mayus(this);" value="'.$cliente['RFC'].'">
</div>                           
<div class="form-group">
<label>Calle:</label>
<input class="form-control" type="text" name="calle-cliente" placeholder="Calle" required="" value="'.$cliente['Calle'].'">
</div>
<div class="form-group">
<label>No. Exterior</label>
<input class="form-control" type="text" name="nexterior-cliente" placeholder="Dirección cliente" required="" value="'.$cliente['noExterior'].'">
</div>
<div class="form-group">
<label>No Interior</label>
<input class="form-control" type="text" name="ninterior-cliente" placeholder="No. Interior" required="" value="'.$cliente['noInterior'].'">
</div>
<div class="form-group">
<label>Colonia</label>
<input class="form-control" type="text" name="colonia-cliente" placeholder="Colonia"  maxlength="50" required="" value="'.$cliente['colonia'].'">
</div>
<div class="form-group">
<label>Codigo Postal</label>
<input class="form-control" type="text" name="cp-cliente" placeholder="Codigo Postal" required="" value="'.$cliente['codigoPostal'].'">
</div>
<div class="form-group">
<label>Municipio:</label>
<input class="form-control" type="text" name="municipio-cliente" placeholder="Municipio" required="" value="'.$cliente['municipio'].'">
</div>
<div class="form-group">
    <label>Estado:</label>
    <select class="form-control" name="estado-cliente" required="">';
    $consultaEstado= ejecutarSQL::consultar("SELECT * FROM estado where ubicacionpaisid=42 AND estadonombre='".$cliente['estado']."'");
    while($estados=mysqli_fetch_array($consultaEstado)){
    echo "<option value='".$estados['estadonombre']."'>".$estados['estadonombre']."</option>";
    }
    $consultaEstado= ejecutarSQL::consultar("SELECT * FROM estado where ubicacionpaisid=42 AND estadonombre!='".$cliente['estado']."'");
    while($estados=mysqli_fetch_array($consultaEstado)){
        echo "<option value='".$estados['estadonombre']."'>".$estados['estadonombre']."</option>";
        }
    echo "</select></div>";
    echo '<div class="form-group">
<label>Telefono</label>
<input class="form-control" type="text" name="tel-cliente" placeholder="Dirección cliente" required="" value="'.$cliente['Telefono'].'">
</div>
<div class="form-group">
<label>Correo electronico</label>
<input class="form-control" type="text" name="correo-cliente" placeholder="Dirección cliente" required="" value="'.$cliente['Email'].'">
</div><br>';
    echo ' <div class="text-center "><button class="btn btn-warning" type="submit" id="guardarCliente">Guardar</button>&nbsp &nbsp
    <button class="btn btn-danger"  data-dismiss="modal">Cancelar</button></div>';
    echo "</form></div>";    

?>