<?php
error_reporting(E_PARSE);
include '../library/configServer.php';
include '../library/consulSQL.php';
session_start();
$suma = 0;
$validar=0;
$auxiliar=0;

if(isset($_GET['precio']) && isset($_GET['cantidad'])){
    $conProd=ejecutarSQL::consultar("select * from producto where idProd='".$_GET['precio']."'");
    $prods=mysqli_fetch_array($conProd);
    $existencias=$prods['existencia'];
    if($_GET['cantidad']<$existencias){
    $cantidad=$_GET['cantidad'];
    }else{
    $cantidad=$prods['existencia'];    
    }

    if($_SESSION['contador']>0){
    for($x=0;$x<$_SESSION['contador'];$x++){
    if( $_SESSION['producto'][$x]==$_GET['precio']){
    $validar=1;
    $auxiliar=$x;
    }
    }
    if($validar==0){
    $_SESSION['cantidad'][$_SESSION['contador']]=$cantidad;
    $_SESSION['producto'][$_SESSION['contador']] = $_GET['precio'];
    $_SESSION['contador']++;
    
    }else{
    
    }
    }else{
        $_SESSION['cantidad'][$_SESSION['contador']]=$cantidad;
        $_SESSION['producto'][$_SESSION['contador']] = $_GET['precio'];
        $_SESSION['contador']++;   
    }
}
$conPreCr=ejecutarSQL::consultar("select * from precios where idPrecio=2");
$credito=mysqli_fetch_array($conPreCr);
$conTar=ejecutarSQL::consultar("select * from precios where idPrecio=3");
$tarjeta=mysqli_fetch_array($conTar);
$conEspecial=ejecutarSQL::consultar("select * from precios where idPrecio=4");
$especial=mysqli_fetch_array($conEspecial);

echo '<table class="table table-bordered">';

echo '<tr><td>Articulo</td><td>Precio</td><td>Cantidad</td><td>Eliminar</td></tr>';

$suma=0;
for($i = 0;$i< $_SESSION['contador'];$i++){
    $consulta=ejecutarSQL::consultar("select * from producto where idProd='".$_SESSION['producto'][$i]."'");
    while($fila = mysqli_fetch_array($consulta)) {
            echo "<tr><td>".$fila['nombreProd']."</td><td> ".$fila['precioVenta']."</td>
            <td><input style='background-color:transparent;color:white;' class='form-control' type='number' value='".$_SESSION['cantidad'][$i]."' min='1' max='".$fila['existencia']."' <input type='number' value='".$_SESSION['cantidad'][$i]."' min='0' onchange='modificarCantidadCarrito($i,this);' onclick='modificarCantidadCarrito($i,this);' onkeyup='modificarCantidadCarrito($i,this);'></td>
            <td class='text-center'>
      <span title='eliminar' class='btn btn-danger btn-xs'value='".$_SESSION['producto'][$i]."' onclick='eliminarElemento(\"".$_SESSION['producto'][$i]."\")'>
        <span class='glyphicon glyphicon-remove'></span>
      </span>
    </td>
    </tr>";
    $suma += $fila['precioVenta']*$_SESSION['cantidad'][$i];
    }
}
echo "<tr><td>Precio de Contado</td><td id='totalCarrito'>$".number_format($suma,2)."</td><td></td><td></td></tr>";
echo "</table>";
$_SESSION['sumaTotal']=$suma;
