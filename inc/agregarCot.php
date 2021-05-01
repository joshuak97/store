<?php

include '../library/configServer.php';
include '../library/consulSQL.php';

session_start();


unset($_SESSION['producto']);
$_SESSION['cantidad']=$_SESSION['cantidad2'];
$_SESSION['contador']=$_SESSION['contador2'];



for($i=0;$i<$_SESSION['contador'];$i++){

 $consulta=ejecutarSQL::consultar("select * from producto where idProd='".$_SESSION['productos2'][$i]."'");
    while($fila = mysqli_fetch_array($consulta)) {
    	$_SESSION['producto'][$i]=$fila['codProd'];

}
}

echo '<table class="table table-bordered">';

echo '<tr><td>Articulo</td><td>Precio</td><td>Cantidad</td><td>Eliminar</td></tr>';

$suma=0;
for($i = 0;$i< $_SESSION['contador'];$i++){
    $consulta=ejecutarSQL::consultar("select * from producto where codProd='".$_SESSION['producto'][$i]."'");
    while($fila = mysqli_fetch_array($consulta)) {
            echo "<tr><td>".$fila['nombreProd']."</td><td> ".$fila['precioVenta']."</td>
            <td>".$_SESSION['cantidad'][$i]."</td>
            <td class='text-center'>
      <span title='eliminar' class='btn btn-danger btn-xs'value='".$_SESSION['producto'][$i]."' onclick='eliminarElemento(".$_SESSION['producto'][$i].")'>
        <span class='glyphicon glyphicon-remove'></span>
      </span>
    </td>
    </tr>";
    $suma += $fila['precioVenta']*$_SESSION['cantidad'][$i];
    }
}
echo "<tr><td>Subtotal</td><td>$".number_format($suma,2)."</td><td></td><td></td></tr>";
echo "</table>";
$_SESSION['sumaTotal']=$suma;

echo "<script>$('.modal-carrito').modal('show');</script>";



?>