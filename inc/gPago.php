<?php

include '../library/configServer.php';
include '../library/consulSQL.php';

session_start();

$formaCompra=$_POST['formaCompra'];
$consultaIva=ejecutarSQL::consultar("select * from precios where idPrecio=5");
$iva=mysqli_fetch_array($consultaIva);

if($formaCompra=='contado'){
$_SESSION['tipoVenta']='contado';
$_SESSION['pago']='efectivo';
$_SESSION['precio']=1;
$suma = 0;
if(isset($_GET['precio']) && isset($_GET['cantidad'])){
    $_SESSION['cantidad'][$_SESSION['contador']]=$_GET['cantidad'];
    $_SESSION['producto'][$_SESSION['contador']] = $_GET['precio'];
    $_SESSION['contador']++;
}

echo '<table class="table table-bordered" style="text-align:center;">';

echo '<tr><td><strong>Articulo</strong></td><td><strong>Precio Unitario</strong></td><td><strong>Total</strong></td><td><strong>Cantidad</strong></td></tr>';

$suma=0;
for($i = 0;$i< $_SESSION['contador'];$i++){
    $consulta=ejecutarSQL::consultar("select * from producto inner join marca on producto.idMarca=marca.idMarca where idProd=".$_SESSION['producto'][$i]);
    while($fila = mysqli_fetch_array($consulta)) {
            echo "<tr><td>".$fila['nombreProd'].' '.$fila['NombreMarca']."</td><td>$".number_format($fila['precioVenta'],2)."</td><td>$".number_format($fila['precioVenta']*$_SESSION['cantidad'][$i],2)."</td>
            <td> ".$_SESSION['cantidad'][$i]."</td>
    </tr>";
    $suma += $fila['precioVenta']*$_SESSION['cantidad'][$i];
    }
}
$_SESSION['sumaTotal']=number_format($suma,2);

echo "<tr><td>Total a pagar:</td><td>$".number_format($suma,2)."</td><td></td><td></td></tr>";
echo "</table>";


echo "<div><label>Descuento:</label>&nbsp;&nbsp;&nbsp;<input style='width:15%;' value='0' type='number' name='desv' class='form-control' required>&nbsp;&nbsp;<strong>%</strong></div><br>";
echo '<div id="pago-contado" class="text-center">
 <button type="submit" class="btn btn-danger">Vender</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="process/vaciarCarrito.php" class="btn btn-danger">Cancelar</a>
 </div>';

}else if($formaCompra=='credito'){

$_SESSION['tipoVenta']='credito';
$_SESSION['pago']='Compra a credito';
$_SESSION['precio']=2;
$suma = 0;
if(isset($_GET['precio']) && isset($_GET['cantidad'])){
    $_SESSION['cantidad'][$_SESSION['contador']]=$_GET['cantidad'];
    $_SESSION['producto'][$_SESSION['contador']] = $_GET['precio'];
    $_SESSION['contador']++;
}
$consultaPrecios=ejecutarSQL::consultar("select * from precios where idPrecio='2'");
$resprecioCredito=mysqli_fetch_array($consultaPrecios);
$precioCredito=$resprecioCredito['porcentaje'];
echo "<label>RFC del Cliente:</label>";
echo '<div class="form-inline" id="data-cliente"><input type="text" placeholder="Introduzca RFC del cliente" name="rfc-clientes" id="rfc-cliente" class="form-control" style="width:62%;" required> &nbsp &nbsp<input class="btn btn-danger" value="nuevo cliente" type="button" data-toggle="modal" data-target="#clientePopup">&nbsp &nbsp<input class="btn btn-danger" value="Consultar" type="button" data-toggle="modal" data-target="#consultaClientesPopup"></div><br>';

echo '<label>A cuantos meses:</label><br><input type="number" name="meses" id="meses" min="2" max="18" value="2" class="form-control" style="width:60%;" onchange="abono(this);" onkeyup="abono(this);" onclick="abono(this);"><br><br>';

echo '<table class="table table-bordered" style="text-align:center;">';

echo '<tr><td><strong>Articulo</strong></td><td><strong>Precio Unitario</strong></td><td><strong>Total</strong></td><td><strong>Cantidad</strong></td></tr>';

$suma=0;
for($i = 0;$i< $_SESSION['contador'];$i++){
    $consulta=ejecutarSQL::consultar("select * from producto inner join marca on producto.idMarca=marca.idMarca where idProd=".$_SESSION['producto'][$i]);
    
    while($fila = mysqli_fetch_array($consulta)){
        if($fila['siniva']==0){
            $precio=$fila['precioCosto']*$precioCredito*$iva['porcentaje'];
            }else{
            $precio=$fila['precioCosto']*$precioCredito;    
            }
            echo "<tr><td>".$fila['nombreProd'].' '.$fila['NombreMarca']."</td><td>$".number_format($precio,2)."</td><td>$".number_format($precio*$_SESSION['cantidad'][$i],2)."</td>
            <td> ".$_SESSION['cantidad'][$i]."</td>
    </tr>";
    $suma += $precio*$_SESSION['cantidad'][$i];
    }
}
$_SESSION['sumaTotal']=number_format($suma,2,".","");
echo "<tr><td>Total a pagar:</td><td><input type='hidden' id='totalC' value='$_SESSION[sumaTotal]'>$".number_format($suma,2)."</td><td></td><td></td></tr>";
$_SESSION['abono']=number_format($suma/2,2);
echo "<tr><td>Abono:</td><td id='mostrar-abono'>$".$_SESSION['abono']."</td><td></td><td></td></tr>";

echo "</table>";


echo '<div id="pago-contado" class="text-center">
 <button type="submit" class="btn btn-danger">Vender</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="process/vaciarCarrito.php" class="btn btn-danger">Cancelar</a>
 </div>';

}else if($formaCompra=='proveedor'){


$_SESSION['tipoVenta']='proveedor';
$suma = 0;
if(isset($_GET['precio']) && isset($_GET['cantidad'])){
    $_SESSION['cantidad'][$_SESSION['contador']]=$_GET['cantidad'];
    $_SESSION['producto'][$_SESSION['contador']] = $_GET['precio'];
    $_SESSION['contador']++;

 

}

echo '<table class="table table-bordered" style="text-align:center;">';

echo '<tr><td><strong>Articulo</strong></td><td><strong>Total</strong></td><td><strong>Cantidad</strong></td></tr>';

$suma=0;
for($i = 0;$i< $_SESSION['contador'];$i++){
    $consulta=ejecutarSQL::consultar("select * from producto inner join marca on producto.idMarca=marca.idMarca where codProd='".$_SESSION['producto'][$i]."'");
    while($fila = mysqli_fetch_array($consulta)) {
            echo "<tr><td>".$fila['nombreProd']."</td><td>$".number_format($fila['precioVenta']*$_SESSION['cantidad'][$i],2)."</td>
            <td> ".$_SESSION['cantidad'][$i]."</td>
    </tr>";
    $suma += $fila['precioVenta']*$_SESSION['cantidad'][$i];
    }
}
echo "<tr><td>Subtotal</td><td>$".number_format($suma,2)."</td><td></td></tr>";
echo "</table>";
$_SESSION['sumaTotal']=$suma;
echo '<div id="pago-contado" class="text-center">
 <button type="submit" class="btn btn-danger">Vender</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-danger">Cancelar</a>
 </div>';
    


}else{

$_SESSION['tipoVenta']='';

}



?>

