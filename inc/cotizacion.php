<?php

$suma=0;

echo "<form>";
echo '<table class="table table-bordered">';
for($i = 0;$i< $_SESSION['contador'];$i++){
    $consulta=ejecutarSQL::consultar("select * from producto where codProd='".$_SESSION['producto'][$i]."'");
    while($fila = mysqli_fetch_array($consulta)) {
            echo "<tr><td>".$fila['nombreProd']."</td><td> ".$fila['precioVenta']."</td></tr>";
    $suma += $fila['precioVenta'];
    }
}
echo "<tr><td>Subtotal</td><td>$".number_format($suma,2)."</td></tr>";
echo "</table>";
echo "<input type='hidden' name='total-contado' value='".number_format($suma,2)."''>";

echo "<br>";

echo '<div id="pago-contado">
 <button type="submit" class="btn btn-danger">Comprar</button>
 </div>';


}else if($formaCompra=='credito'){


echo "<h4>Opciones de compra a credito: (En proceso)</h4>";
echo "<br>";

echo "</form>";

?>