<?php

include '../library/configServer.php';
include '../library/consulSQL.php';

session_start();

$id_producto=$_POST['id_producto'];

$_SESSION['cantidad3'][$_SESSION['contador3']]=1;
$_SESSION['listaProd'][$_SESSION['contador3']]=$id_producto;
$_SESSION['contador3']++;


echo '<table class="table table-bordered" style="text-align:center;">';

echo '<tr><td>Articulo</td><td>Precio</td><td>Cantidad</td><td>Eliminar</td></tr>';

$suma=0;
for($i = 0;$i< $_SESSION['contador3'];$i++){
    $consulta=ejecutarSQL::consultar("SELECT * from producto inner join marca on producto.idMarca=marca.idMarca where idProd=".$_SESSION['listaProd'][$i]);
    while($fila = mysqli_fetch_array($consulta)) {
            echo "<tr><td>".$fila['codProd']."-".$fila['nombreProd']."-".$fila['NombreMarca']."</td><td> ".$fila['precioVenta']."</td>
            <td style='width:20%;'><input type='number' value='".$_SESSION['cantidad3'][$i]."' min='0' onchange='modificarCantidad($i,this);' onclick='modificarCantidad($i,this);' onkeyup='modificarCantidad($i,this);'></td>
            <td class='text-center'>
      <span title='eliminar' class='btn btn-danger btn-xs'value='".$_SESSION['listaProd'][$i]."' onclick='eliminarElemento(".$_SESSION['listaProd'][$i].")'>
        <span class='glyphicon glyphicon-remove'></span>
      </span>
    </td>
    </tr>";
    $suma += $fila['precioVenta']*$_SESSION['cantidad3'][$i];
    }
}
echo "<tr><td id='cuentaTotal' value='$suma'>Subtotal</td><td>$".number_format($suma,2)."</td><td></td><td></td></tr>";
echo "</table>";
$_SESSION['sumaTotalcp']=$suma;



?>