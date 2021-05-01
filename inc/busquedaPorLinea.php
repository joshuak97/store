<?php
$idLinea=$_POST['idLinea'];

include '../library/consulSQL.php';
session_start();
if(!isset($_SESSION['acceso'])){
$_SESSION['acceso']="";
}
if(!isset($_SESSION['sucursal'])){
  $_SESSION['sucursal']="";
  }
  
$_SESSION['tablaProductos'][$_SESSION['contadorTabla']]='';
if(!$_SESSION['acceso']=="" && $_SESSION['acceso']!=1 && $_SESSION['acceso']!=5){
  $where="WHERE desAplicacion like '%$idLinea%' AND idSucursal=".$_SESSION['sucursal'];
}else{
$where="WHERE desAplicacion like '%$idLinea%'";
}

$consulta= ejecutarSQL::consultar("SELECT * FROM producto INNER JOIN marca on marca.idMarca=producto.idMarca $where");
$totalproductos = mysqli_num_rows($consulta);
if($totalproductos>0){
    $nums=1;
    $btn="";
    $unidades="";
while($fila=mysqli_fetch_array($consulta)){
  $ConsultaCo= ejecutarSQL::consultar("SELECT * FROM precios where idPrecio='1'");
  $ConsultaCr= ejecutarSQL::consultar("SELECT * FROM precios where idPrecio='2'");
  $ConsultaTa= ejecutarSQL::consultar("SELECT * FROM precios where idPrecio='3'");
            $ConsultaEs= ejecutarSQL::consultar("SELECT * FROM precios where idPrecio='4'");
            $ConsultaIva= ejecutarSQL::consultar("SELECT * FROM precios where idPrecio='5'");
    $consultaCo=mysqli_fetch_array($ConsultaCo);
    $consultaCr=mysqli_fetch_array($ConsultaCr);
    $consultaTa=mysqli_fetch_array($ConsultaTa);
                $consultaEs=mysqli_fetch_array($ConsultaEs);
                $consultaIva=mysqli_fetch_array($ConsultaIva);
  
        if($fila['existencia']==1){

          $btn="btn-danger";


        }else if($fila['existencia']==0){
          $btn="btn-primary";
        }else{
        $btn="btn-success";
      }
    if($fila['siniva']==0){	 
  $precioContado=$fila['precioCosto']*$consultaCo['porcentaje']*$consultaIva['porcentaje'];
  $precioCredito=$fila['precioCosto']*$consultaCr['porcentaje']*$consultaIva['porcentaje'];
  $precioTarjeta=$fila['precioCosto']*$consultaTa['porcentaje']*$consultaIva['porcentaje'];
            $precioEspecial=$fila['precioCosto']*$consultaEs['porcentaje']*$consultaIva['porcentaje'];
            }else{
              $precioContado=$fila['precioCosto']*$consultaCo['porcentaje'];
              $precioCredito=$fila['precioCosto']*$consultaCr['porcentaje'];
              $precioTarjeta=$fila['precioCosto']*$consultaTa['porcentaje'];
              $precioEspecial=$fila['precioCosto']*$consultaEs['porcentaje'];    
            }
               echo '
              <div class="col-xs-12 col-sm-6 col-md-3">
                   <div class="thumbnail" style="display:inline-block;">
                     <input type="button" class="btn '.$btn.' btn-sm" style"width:2%;height:2%;">
                     <a href="infoProd.php?CodProd='.$fila['codProd'].'"><img src="assets/img-products/'.$fila['Imagen'].'" width="150" height="150" ></a>
                     <div class="caption">
                       <h3>Num. Parte: '.$fila['numParte'].'</h3>
                       <p>'.$fila['nombreProd'].'</p>
                       <br>';

                      if($_SESSION['acceso']==1){
                      echo '<p><strong>Precio Contado:</strong>&nbsp;$'.round($precioContado,0,PHP_ROUND_HALF_UP).'</p>
      <p><strong>Precio Credito:</strong>&nbsp;$'.round($precioCredito,0,PHP_ROUND_HALF_UP).'</p>
      <p><strong>Precio Tarjeta:</strong>&nbsp;$'.round($precioTarjeta,0,PHP_ROUND_HALF_UP).'</p>
      <p><strong>Precio Especial:</strong>&nbsp;$'.round($precioEspecial,0,PHP_ROUND_HALF_UP).'</p>
                      <br>';
                      }else if($_SESSION['acceso']>1 && $_SESSION['acceso']<4){
                          echo '<p><strong>Precio Contado:</strong>&nbsp;$'.round($precioContado,0,PHP_ROUND_HALF_UP).'</p>
                          <p><strong>Precio Credito:</strong>&nbsp;$'.round($precioCredito,0,PHP_ROUND_HALF_UP).'</p>
                          <p><strong>Precio Tarjeta:</strong>&nbsp;$'.round($precioTarjeta,0,PHP_ROUND_HALF_UP).'</p>
                          <br>';
                      }else{
                          echo '<p><strong>Precio:</strong>&nbsp;$'.round($precioContado,0,PHP_ROUND_HALF_UP).'</p>
                          <br>';   
                      }
                       echo '<p clas="text-center" ><strong>Marca:</strong>&nbsp;'.$fila['NombreMarca'].'</p>';
                       if($fila['existencia']!=0){
                       echo '<p clas="text-center" ><strong>Cantidad:</strong> <input id="'.$fila['codProd'].'" name="cantidad-prod" class="form-control" type="number" style="width:26%;height:10%" min="1" max="'.$fila['existencia'].'" value="1"></p>';
                       }
                       if($fila['existencia']==0){
                       echo'
                       <a href="infoProd.php?CodProd='.$fila['codProd'].'"><img src="assets/img/ok2.png" width="17" height="17"  style="display:inline-block;">&nbsp;
                       <a href="infoProd.php?CodProd='.$fila['codProd'].'" style="color:red;" class="aplicacion">Aplicaciones</a><br>
                        <a href="infoProd.php?CodProd='.$fila['codProd'].'"><img src="assets/img/ok1.png" width="17" height="17"  style="display:inline-block;">&nbsp;</a><a href="infoProd.php?CodProd='.$fila['codProd'].'" style="color:green;" class="equivalencia">Equivalencias</a>
                       <h3>¡Producto agotado!</h3><br>'; 
                       }
                       else if($fila['existencia']==1){
                          echo'
                          <a href="infoProd.php?CodProd='.$fila['codProd'].'"><img src="assets/img/ok2.png" width="17" height="17"  style="display:inline-block;">&nbsp;
                          <a href="infoProd.php?CodProd='.$fila['codProd'].'" style="color:red;" class="aplicacion">Aplicaciones</a><br>
                           <a href="infoProd.php?CodProd='.$fila['codProd'].'"><img src="assets/img/ok1.png" width="17" height="17"  style="display:inline-block;">&nbsp;</a><a href="infoProd.php?CodProd='.$fila['codProd'].'" style="color:green;" class="equivalencia">Equivalencias</a>
                          <h4>¡Ultima unidad disponible!</h4><br>'; 
                          }else{
                       echo'
                       <a href="infoProd.php?CodProd='.$fila['codProd'].'"><img src="assets/img/ok2.png" width="17" height="17"  style="display:inline-block;">&nbsp;
                       <a href="infoProd.php?CodProd='.$fila['codProd'].'" style="color:red;" class="aplicacion">Aplicaciones</a><br>
                        <a href="infoProd.php?CodProd='.$fila['codProd'].'"><img src="assets/img/ok1.png" width="17" height="17"  style="display:inline-block;">&nbsp;</a><a href="infoProd.php?CodProd='.$fila['codProd'].'" style="color:green;" class="equivalencia">Equivalencias</a>
                       <h4>('.$fila['existencia'].' Unidades disponibles)</h4><br>'; 
                       } 
                       echo '<p class="text-center">
                           <a href="infoProd.php?CodProd='.$fila['codProd'].'" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp; Detalles</a>&nbsp;&nbsp;';
                          if($fila['existencia']>0){
                           echo '<button class="btn btn-success btn-sm" onclick="agregarCarrito( \''.$fila['codProd'].'\' );"><i class="fa fa-shopping-cart"></i>&nbsp; Añadir</button>&nbsp;&nbsp;';       
                          } 
                     echo  '</p>
                       

                     </div>

                   </div>

               </div>     
               ';
   
    if ($nums%4==0){
       echo '<div class="clearfix"></div>';
    }
    $nums++;
                         $_SESSION['tablaProductos'][$_SESSION['contadorTabla']]=$fila['codProd'];
                         $_SESSION['contadorTabla']++;

    }
    }else{
    echo '<h2>No hay productos registrados en la tienda</h2>';
    } 
    
?>