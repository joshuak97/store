<?php

include './library/configServer.php';
include './library/consulSQL.php';
$desProd=$_POST['desProd'];
session_start();
if(!isset($_SESSION['acceso'])){
  $_SESSION['acceso']="";
}
if(!isset($_SESSION['sucursal'])){
  $_SESSION['sucursal']="";
}
if($_POST['ubicacion']==0){
if(!$_SESSION['acceso']=="" && $_SESSION['acceso']!=1 && $_SESSION['acceso']!=5){
  $where="WHERE (desProd like '%$desProd%' OR NombreMarca like '%$desProd%' OR nombreProd like '%$desProd%' OR codProd like '%$desProd%') AND idSucursal=".$_SESSION['sucursal'];  
  $consulta= ejecutarSQL::consultar("SELECT * FROM producto INNER JOIN marca on marca.idMarca=producto.idMarca $where");
}else{
  $where="WHERE desProd like '%$desProd%' OR NombreMarca like '%$desProd%' OR nombreProd like '%$desProd%' OR codProd like '%$desProd%'";
  $consulta= ejecutarSQL::consultar("SELECT * FROM producto INNER JOIN marca on marca.idMarca=producto.idMarca $where");
}
}else{
    $where="WHERE (desProd like '%$desProd%' OR NombreMarca like '%$desProd%' OR nombreProd like '%$desProd%' OR codProd like '%$desProd%') AND idUbicacion=".$_POST['ubicacion'];    
    $consulta= ejecutarSQL::consultar("SELECT * FROM producto INNER JOIN marca on marca.idMarca=producto.idMarca inner join sucursal on producto.idSucursal=sucursal.idSucursal $where");
  }
//Se muestran los resultados:



$_SESSION['tablaProductos'][$_SESSION['contadorTabla']]='';
                
$totalproductos = mysqli_num_rows($consulta);
if($totalproductos>0){
    $nums=1;
    $btn="";
    $unidades="";
while($fila=mysqli_fetch_array($consulta)){
   
        if($fila['existencia']==1){

          $btn="btn-danger";


        }else if($fila['existencia']==0){
          $btn="btn-primary";
        }else{
        $btn="btn-success";
      }
  
              
            echo '
            <div class="col-xs-12 col-sm-6 col-md-3">
                 <div class="thumbnail" style="display:inline-block;text-align:left;">
                   <input type="button" class="btn '.$btn.' btn-sm float-left" style"width:2%;height:2%;">
                   <a href="infoProd.php?CodProd='.$fila['idProd'].'"><img src="assets/img-products/'.$fila['Imagen'].'" width="150" height="150" ></a>
                   <div class="caption">
                     <h3>'.$fila['nombreProd'].'</h3>
                     <p>'.$fila['NombreMarca'].'</p>
                     ';
                   
                    echo '<p><strong>Precio:</strong>$'.($fila['precioVenta']).'</p>
                    ';   
    
                     if($fila['existencia']!=0){
                     echo '<p clas="text-center" ><strong>Cantidad:</strong> <input id="'.$fila['idProd'].'" name="cantidad-prod" class="form-control" type="number" style="width:26%;height:10%" min="1" max="'.$fila['existencia'].'" value="1"></p>';
                     }
                     if($fila['existencia']==0){
                     echo'
                    
                   <img src="assets/img/ok1.png" width="17" height="17"  style="display:inline-block;">&nbsp;</a><a href="infoProd.php?CodProd='.$fila['idProd'].'" style="color:green;" class="equivalencia">Detalles</a>
                     <h3>¡Producto agotado!</h3>'; 
                     }
                     else if($fila['existencia']==1){
                        echo'
                       <img src="assets/img/ok1.png" width="17" height="17"  style="display:inline-block;">&nbsp;</a><a href="infoProd.php?CodProd='.$fila['idProd'].'" style="color:green;" class="equivalencia">Detalles</a>
                        <h4>¡Ultima unidad disponible!</h4>'; 
                        }else{
                     echo'
                    
                     <img src="assets/img/ok1.png" width="17" height="17"  style="display:inline-block;">&nbsp;</a><a href="infoProd.php?CodProd='.$fila['idProd'].'" style="color:green;" class="equivalencia">Detalles</a>
                     <h4>('.$fila['existencia'].' Unidades disponibles)</h4>'; 
                     } 

                     if($fila['idSucursal']==$_SESSION['sucursal'] && !$_SESSION['acceso']=="" && $_SESSION['acceso']!=5 && $_SESSION['acceso']!=1){
                      $sucursalProd= ejecutarSQL::consultar("SELECT * FROM sucursal inner join ubicacion on sucursal.idUbicacion=ubicacion.idUbicacion where idSucursal=".$fila['idSucursal']); 
                        $prodSuc=mysqli_fetch_array($sucursalProd);						
                      echo'<p class="text-center"><h4 class="text-center">"De venta en sucursal '.$prodSuc['nombreSucursal'].'"</h4></p>';	 
                                echo '<p class="text-center">
                                    <a href="infoProd.php?CodProd='.$fila['idProd'].'" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp; Detalles</a>&nbsp;&nbsp;';
                                   if($fila['existencia']>0){
                                    echo '<button class="btn btn-success btn-sm" onclick="agregarCarrito( \''.$fila['idProd'].'\' );"><i class="fa fa-shopping-cart"></i>&nbsp; Añadir</button>&nbsp;&nbsp;';       
                                   } 
                              echo  '</p>';
                      }else{
                       $sucursalProd= ejecutarSQL::consultar("SELECT * FROM sucursal inner join ubicacion on sucursal.idUbicacion=ubicacion.idUbicacion where idSucursal=".$fila['idSucursal']); 
                        $prodSuc=mysqli_fetch_array($sucursalProd);
                       echo'<p class="text-center"><h4 class="text-center">"Disponible en sucursal '.$prodSuc['nombreSucursal'].'"</h4></p>';
                      }                
                      if($_SESSION['acceso']==5 || $_SESSION['acceso']==1 || $_SESSION['acceso']==""){
                        echo '<p class="text-center">
                        <a href="infoProd.php?CodProd='.$fila['idProd'].'" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp; Detalles</a>&nbsp;&nbsp;';
                       if($fila['existencia']>0){
                        echo '<button class="btn btn-success btn-sm" onclick="agregarCarrito( \''.$fila['idProd'].'\' );"><i class="fa fa-shopping-cart"></i>&nbsp; Añadir</button>&nbsp;&nbsp;';       
                       } 
                  echo  '</p>';
                      }         

      echo '</div>

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
    








