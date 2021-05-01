<?php

include '../library/configServer.php';
include '../library/consulSQL.php';

session_start();

$idProducto=$_POST['idProducto'];
$posicion=0;
for($i=0;$i<$_SESSION['contador'];$i++){

if($i<$_SESSION['contador']-1){
if($posicion==0){  
if($_SESSION['producto'][$i]==$idProducto){

$_SESSION['producto'][$i]=$_SESSION['producto'][$i+1];		
$_SESSION['cantidad'][$i]=$_SESSION['cantidad'][$i+1];
$posicion++;
}
}else if($posicion>0){
$_SESSION['producto'][$i]=$_SESSION['producto'][$i+1];		 
$_SESSION['cantidad'][$i]=$_SESSION['cantidad'][$i+1];
}else{
  
}
}else{
	$_SESSION['contador']=$_SESSION['contador']-1;
}

}

echo '<table class="table table-bordered">';

echo '<tr><td>Articulo</td><td>Precio</td><td>Cantidad</td><td>Eliminar</td></tr>';

$suma=0;
for($i = 0;$i< $_SESSION['contador'];$i++){
    $consulta=ejecutarSQL::consultar("select * from producto inner join marca on producto.idMarca=marca.idMarca where idProd=".$_SESSION['producto'][$i]);
    while($fila = mysqli_fetch_array($consulta)) {
            echo "<tr><td>".$fila['nombreProd']." ".$fila['NombreMarca']."</td><td> ".$fila['precioVenta']."</td>
            <td><input style='background-color:transparent;color:gray;' class='form-control' type='number' value='".$_SESSION['cantidad'][$i]."' min='1' max='".$fila['existencia']."' <input type='number' value='".$_SESSION['cantidad'][$i]."' min='0' onchange='modificarCantidadCarrito($i,this);' onclick='modificarCantidadCarrito($i,this);' onkeyup='modificarCantidadCarrito($i,this);'></td>
            <td class='text-center'>
      <span title='eliminar' class='btn btn-danger btn-xs'value='".$_SESSION['producto'][$i]."' onclick='eliminarElemento(\"".$_SESSION['producto'][$i]."\",$i)'>
        <span class='glyphicon glyphicon-remove'></span>
      </span>
    </td>
    </tr>";
    $suma +=$fila['precioVenta']*$_SESSION['cantidad'][$i];
    }
}
echo "<tr><td>Subtotal:</td><td id='mostrar-subtotal'>$".number_format($suma,2)."</td><td></td><td></td></tr>";
echo "</table>";
$_SESSION['sumaTotal']=$suma;
?>