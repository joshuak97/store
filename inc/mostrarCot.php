<?php

include '../library/configServer.php';
include '../library/consulSQL.php';

session_start();

$id_cot=$_POST['id_cot'];
$_SESSION['idCot']=$id_cot;
$_SESSION['contador2']=0;
$_SESSION['cantidad2'][$_SESSION['contador2']]=0;


if($id_cot!=0){

echo '<table class="table table-bordered" style="text-align:center;font-size: 20px;">';

echo '<tr><td><strong>Articulo</strong></td><td><strong>Precio</strong></td><td><strong>Cantidad</strong></td><td><strong>Imagen</strong></td></tr>';

 $consulta1=ejecutarSQL::consultar("SELECT * FROM cotizacion where idCotizacion=".$id_cot);


while($fila1 = mysqli_fetch_array($consulta1)) {

$suma=0;

$prod=explode(" ", $fila1["idProd"]);

for($i=0;$i<count($prod);$i++){
$prod2=explode(",",$prod[$i]);

$consulta2=ejecutarSQL::consultar("SELECT * FROM producto where idProd=".$prod2[0]);
while($fila2= mysqli_fetch_array($consulta2)) {
$_SESSION['productos2'][$i]=$prod2[0];
$_SESSION['cantidad2'][$i]=$prod2[1];
echo "<tr><td>".$fila2['nombreProd']."</td><td> ".$fila2['precioVenta']."</td>
            <td>".$prod2[1]."</td><td><img width='150' height='150' src='assets/img-products/".$fila2['Imagen']."'></td>
         
    </tr>";
    $suma += $fila2['precioVenta']*$prod2[1];
    $_SESSION['contador2']++;
    }
}
echo "<tr><td>Subtotal</td><td>$".number_format($suma,2)."</td><td></td><td></td></tr>";
echo "</table>";
}
}

 



?>