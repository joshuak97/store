<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';
if(isset($_GET['codProd']) && isset($_GET['cantidad'])){
$consulta=ejecutarSQL::consultar("select*from producto where codProd='".$_GET['codProd']."' AND idSucursal=".$_SESSION['sucursal']);
$num=mysqli_num_rows($consulta);
if($num>0){
$prods=mysqli_fetch_array($consulta);
if($prods['existencia']>0){
$suma = 0;
$validar=0;
$auxiliar=0;
$existencias=$prods['existencia'];
    if($_GET['cantidad']<$existencias){
    $cantidad=$_GET['cantidad'];
    }else{
    $cantidad=$prods['existencia'];    
    }

    if($_SESSION['contador']>0){
    for($x=0;$x<$_SESSION['contador'];$x++){
    if( $_SESSION['producto'][$x]==$prods['idProd']){
    $validar=1;
    $auxiliar=$x;
    }
    }
    if($validar==0){
    $_SESSION['cantidad'][$_SESSION['contador']]=$cantidad;
    $_SESSION['producto'][$_SESSION['contador']] = $prods['idProd'];
    $_SESSION['contador']++;
    
    }else{
    
    }
    }else{
        $_SESSION['cantidad'][$_SESSION['contador']]=$cantidad;
        $_SESSION['producto'][$_SESSION['contador']] = $prods['idProd'];
        $_SESSION['contador']++;   
    }
    echo '<table class="table table-bordered">';

    echo '<tr><td>Articulo</td><td>Precio</td><td>Cantidad</td><td>Eliminar</td></tr>';
    
    $suma=0;
    for($i = 0;$i< $_SESSION['contador'];$i++){
        $consulta=ejecutarSQL::consultar("select * from producto where idProd='".$_SESSION['producto'][$i]."'");
        while($fila = mysqli_fetch_array($consulta)) {
                echo "<tr><td>".$fila['nombreProd']."</td><td> ".$fila['precioVenta']."</td>
                <td><input style='background-color:transparent;' class='form-control' type='number' value='".$_SESSION['cantidad'][$i]."' min='1' max='".$fila['existencia']."' <input type='number' value='".$_SESSION['cantidad'][$i]."' min='0' onchange='modificarCantidadCarrito($i,this);' onclick='modificarCantidadCarrito($i,this);' onkeyup='modificarCantidadCarrito($i,this);'></td>
                <td class='text-center'>
          <span title='eliminar' class='btn btn-danger btn-xs'value='".$_SESSION['producto'][$i]."' onclick='eliminarElemento(\"".$_SESSION['producto'][$i]."\")'>
            <span class='glyphicon glyphicon-remove'></span>
          </span>
        </td>
        </tr>";
        $suma += $fila['precioVenta']*$_SESSION['cantidad'][$i];
        }
    }
    echo "<tr><td>Precio de Contado</td><td id='totalCarrito2'>$".number_format($suma,2)."</td><td></td><td></td></tr>";
    echo "</table>";
    $_SESSION['sumaTotal']=$suma;
  }else{//Si el producto ya no tiene existencias se imprime el carrito y se despliega el modal producto agotado.
    echo "<script>$('#errorExistencia').show();</script>";
    echo '<table class="table table-bordered" style="text-align:center;">';
    
    echo '<tr><td>Articulo</td><td>Precio</td><td>Cantidad</td><td>Eliminar</td></tr>';
        
    $suma=0;
    for($i = 0;$i< $_SESSION['contador'];$i++){
        $consulta=ejecutarSQL::consultar("select * from producto where idProd='".$_SESSION['producto'][$i]."'");
        while($fila = mysqli_fetch_array($consulta)) {
                echo "<tr><td>".$fila['nombreProd']."</td><td> ".$fila['precioVenta']."</td>
                <td><input style='background-color:transparent;' class='form-control' type='number' value='".$_SESSION['cantidad'][$i]."' min='1' max='".$fila['existencia']."' <input type='number' value='".$_SESSION['cantidad'][$i]."' min='0' onchange='modificarCantidadCarrito($i,this);' onclick='modificarCantidadCarrito($i,this);' onkeyup='modificarCantidadCarrito($i,this);'></td>
                <td class='text-center'>
          <span title='eliminar' class='btn btn-danger btn-xs'value='".$_SESSION['producto'][$i]."' onclick='eliminarElemento(\"".$_SESSION['producto'][$i]."\")'>
            <span class='glyphicon glyphicon-remove'></span>
          </span>
        </td>
        </tr>";
        $suma += $fila['precioVenta']*$_SESSION['cantidad'][$i];
        }
    }
    echo "<tr><td>Precio de Contado</td><td id='totalCarrito2'>$".number_format($suma,2)."</td><td></td><td></td></tr>";
    echo "</table>";
    $_SESSION['sumaTotal']=$suma;
   
    }        

  }else{
echo '<table class="table table-bordered" style="text-align:center;">';

echo '<tr><td>Articulo</td><td>Precio</td><td>Cantidad</td><td>Eliminar</td></tr>';
    
$suma=0;
for($i = 0;$i< $_SESSION['contador'];$i++){
    $consulta=ejecutarSQL::consultar("select * from producto where idProd='".$_SESSION['producto'][$i]."'");
    while($fila = mysqli_fetch_array($consulta)) {
            echo "<tr><td>".$fila['nombreProd']."</td><td> ".$fila['precioVenta']."</td>
            <td><input style='background-color:transparent;' class='form-control' type='number' value='".$_SESSION['cantidad'][$i]."' min='1' max='".$fila['existencia']."' <input type='number' value='".$_SESSION['cantidad'][$i]."' min='0' onchange='modificarCantidadCarrito($i,this);' onclick='modificarCantidadCarrito($i,this);' onkeyup='modificarCantidadCarrito($i,this);'></td>
            <td class='text-center'>
      <span title='eliminar' class='btn btn-danger btn-xs'value='".$_SESSION['producto'][$i]."' onclick='eliminarElemento(\"".$_SESSION['producto'][$i]."\")'>
        <span class='glyphicon glyphicon-remove'></span>
      </span>
    </td>
    </tr>";
    $suma += $fila['precioVenta']*$_SESSION['cantidad'][$i];
    }
}
echo "<tr><td>Precio de Contado</td><td id='totalCarrito2'>$".number_format($suma,2)."</td><td></td><td></td></tr>";
echo "</table>";
$_SESSION['sumaTotal']=$suma;
echo "<script>$('#codigoVacio').modal('toggle');</script>"; 
}
}else{
echo "<script>$('#codigoVacio').modal('toggle');</script>";    
}
?>