<?php
include '../library/configServer.php';
include '../library/consulSQL.php';

$nombreCliente=$_POST['nombreCliente'];

$consulta=ejecutarSQL::consultar("select * from cliente where NombreCompleto='".$nombreCliente."'");
$numeroClientes=mysqli_num_rows($consulta);
if($numeroClientes>0){
    while($fila = mysqli_fetch_array($consulta)) {
    echo "<option value='".$fila['idCliente']."'>".$fila['RFC']."</option>";
    }
}
?>