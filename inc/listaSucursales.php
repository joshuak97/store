<?php

include '../library/configServer.php';
include '../library/consulSQL.php';

session_start();

$id_sucursal=$_POST['id_sucursal'];

$_SESSION['cantidad3'][$_SESSION['contador3']]=1;
$_SESSION['listaProd'][$_SESSION['contador3']]=$id_sucursal;
$_SESSION['contador3']++;


echo '<table class="table table-bordered" style="text-align:center;">';

echo '<tr><td>Ubicaci¨®n</td><td>Sucursal</td><td>Eliminar</td></tr>';

$suma=0;
for($i = 0;$i< $_SESSION['contador3'];$i++){
    $consulta=ejecutarSQL::consultar("SELECT*FROM sucursal INNER JOIN ubicacion on sucursal.idUbicacion=ubicacion.idUbicacion WHERE idSucursal=".$_SESSION['listaProd'][$i]);
    while($fila = mysqli_fetch_array($consulta)) {
            echo "<tr><td>".$fila['nombreUbicacion']."</td><td> ".$fila['nombreSucursal']."</td>
            <td class='text-center'>
      <span title='eliminar' class='btn btn-danger btn-xs'value='".$_SESSION['listaProd'][$i]."' onclick='eliminarElementoS(".$_SESSION['listaProd'][$i].")'>
        <span class='glyphicon glyphicon-remove'></span>
      </span>
    </td>
    </tr>";
    }
}
echo "</table>";



?>