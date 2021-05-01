<?php
include '../library/configServer.php';
include '../library/consulSQL.php';
session_start();
if($_POST['valor']!=0){
    $modelos=mysqli_query($con,"SELECT*FROM proveedor where idProveedor=".$_POST['valor']);
                                            
    while($provc=mysqli_fetch_array($modelos)){
    $_SESSION['idProveedor']=$provc['idProveedor'];
    echo '<label>Numero de Factura:</label>                                   
    <select class="form-control" name="factura-cp" id="factura-cp">';

$consulta=ejecutarSQL::consultar("SELECT * from facturas where idProveedor=".$_POST['valor']);
while($fila = mysqli_fetch_array($consulta)){
$modelos=mysqli_query($con,"SELECT*FROM proveedor where idProveedor=".$_POST['valor']);
$fila2=mysqli_fetch_array($modelos);
echo "<option value='".$fila['id_factura']."'>".$fila['numero_factura']."-(".$fila2['NombreProveedor'].")</option>";

}

echo '</select>';
    }	
    }else{
    echo '<label>Numero de Factura:</label>                                   
    <select class="form-control" name="factura-cp" id="factura-cp">';

$consulta=ejecutarSQL::consultar("SELECT * from facturas INNER JOIN proveedor on facturas.idProveedor=proveedor.idProveedor");
while($fila = mysqli_fetch_array($consulta)){

echo "<option value='".$fila['id_factura']."'>".$fila['numero_factura']."-(".$fila['NombreProveedor'].")</option>";

}

echo '</select>';	
    }	
?>