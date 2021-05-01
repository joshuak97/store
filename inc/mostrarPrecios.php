<?php
include '../library/configServer.php';
include '../library/consulSQL.php';
session_start();
$idPrecio=$_POST['idPrecio'];
$consultaIva=ejecutarSQL::consultar("select * from precios where idPrecio=5");
$iva=mysqli_fetch_array($consultaIva);
if($idPrecio==1){
    $_SESSION['precio']=1;
    $_SESSION['pago']='efectivo';
    echo '<table class="table table-bordered" style="text-align:center;">';

    echo '<tr><td><strong>Articulo</strong></td><td><strong>Precio Unitario</strong></td><td><strong>Total</strong></td><td><strong>Cantidad</strong></td></tr>';
    
    $suma=0;
    for($i = 0;$i< $_SESSION['contador'];$i++){
        $consulta=ejecutarSQL::consultar("select * from producto inner join marca on producto.idMarca=marca.idMarca where codProd='".$_SESSION['producto'][$i]."'");
        while($fila = mysqli_fetch_array($consulta)) {
                echo "<tr><td>".$fila['nombreProd'].' '.$fila['NombreMarca']."</td><td>$".$fila['precioVenta']."</td><td>$".number_format($fila['precioVenta']*$_SESSION['cantidad'][$i],2)."</td>
                <td> ".$_SESSION['cantidad'][$i]."</td>
        </tr>";
        $suma += $fila['precioVenta']*$_SESSION['cantidad'][$i];
        }
    }
    echo "<tr><td>Total a pagar:</td><td>$".number_format($suma,2)."</td><td></td><td></td></tr>";
    echo "</table>";
    $_SESSION['sumaTotal']=$suma;
    echo "<div><label>Precio:</label>&nbsp;&nbsp;&nbsp;<select class='form-control' name='forma-pago' id='formaPago' onchange=' seleccionPrecio(this);' style='width:60%;display:inline-block;'>
    <option value='1'>Normal</option>
    <option value='3'>Pago con tarjeta</option>
    <option value='4'>Precio Especial</option>
    </select></div><br>";
    echo '<div id="pago-contado" class="text-center">
     <button type="submit" class="btn btn-danger">Vender</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-danger">Cancelar</a>
     </div>';    
}else if($idPrecio==3){
    $_SESSION['precio']=3;
    $_SESSION['pago']='Pago con tarjeta';
    $consultaPrecios=ejecutarSQL::consultar("select * from precios where idPrecio='3'");
    $resprecioCredito=mysqli_fetch_array($consultaPrecios);
    $precioCredito=$resprecioCredito['porcentaje'];
    
    echo '<table class="table table-bordered" style="text-align:center;">';
    
    echo '<tr><td><strong>Articulo</strong></td><td><strong>Precio Unitario</strong></td><td><strong>Total</strong></td><td><strong>Cantidad</strong></td></tr>';
    
    $suma=0;
    for($i = 0;$i< $_SESSION['contador'];$i++){
        $consulta=ejecutarSQL::consultar("select*from producto inner join marca on producto.idMarca=marca.idMarca where codProd='".$_SESSION['producto'][$i]."'");
        
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
    echo "<tr><td>Total a pagar:</td><td>$".number_format($suma,2)."</td><td></td><td></td></tr>";
    echo "</table>";
    $_SESSION['sumaTotal']=$suma;
    echo "<div><label>Precio:</label>&nbsp;&nbsp;&nbsp;<select class='form-control' name='forma-pago' id='formaPago' onchange=' seleccionPrecio(this);' style='width:60%;display:inline-block;'>
    <option value='1'>Normal</option>
    <option value='3' selected>Pago con tarjeta</option>
    <option value='4'>Precio Especial</option>
    </select></div><br>";
    echo '<div id="pago-contado" class="text-center">
     <button type="submit" class="btn btn-danger">Vender</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-danger">Cancelar</a>
     </div>';    
    
}else if($idPrecio==4){
    $_SESSION['precio']=4;
    $_SESSION['pago']='efectivo';
    $consultaPrecios=ejecutarSQL::consultar("select * from precios where idPrecio='4'");
    $resprecioCredito=mysqli_fetch_array($consultaPrecios);
    $precioCredito=$resprecioCredito['porcentaje'];
    
    echo '<table class="table table-bordered" style="text-align:center;">';
    
    echo '<tr><td><strong>Articulo</strong></td><td><strong>Precio Unitario</strong></td><td><strong>Total</strong></td><td><strong>Cantidad</strong></td></tr>';
    
    $suma=0;
    for($i = 0;$i< $_SESSION['contador'];$i++){
        $consulta=ejecutarSQL::consultar("select * from producto inner join marca on producto.idMarca=marca.idMarca where codProd='".$_SESSION['producto'][$i]."'");
        
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
    echo "<tr><td>Total a pagar:</td><td>$".number_format($suma,2)."</td><td></td><td></td></tr>";
    echo "</table>";
    $_SESSION['sumaTotal']=$suma;
    echo "<div><label>Precio:</label>&nbsp;&nbsp;&nbsp;<select class='form-control' name='forma-pago' id='formaPago' onchange=' seleccionPrecio(this);' style='width:60%;display:inline-block;'>
    <option value='1'>Normal</option>
    <option value='3'>Pago con tarjeta</option>
    <option value='4' selected>Precio Especial</option>
    </select></div><br>";
    echo '<div id="pago-contado" class="text-center">
     <button type="submit" class="btn btn-danger">Vender</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-danger">Cancelar</a>
     </div>';    
    
}

?>