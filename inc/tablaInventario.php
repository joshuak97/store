<?php
 include '../library/configServer.php';
 include '../library/consulSQL.php';
 session_start();
 $_SESSION['todo']=false;
 $condiciones=array();//Declaramos un array vacio en donde almacenaremos las condiciones de la consulta segun el filtro
 $cont=0;//Declaramos el contador el cual aumentara con cada condicion del arreglo
 if(!$_POST['valor']==""){//Verificamos si el campo valor contiene texto
 $condiciones[$cont]="$_POST[atributo] like '%$_POST[valor]%'"; 
 $cont++;
 }

 if($_POST['sucursal']>0){//verificamos si esta seleccionada alguna sucursal
    $condiciones[$cont]="idSucursal='$_POST[sucursal]'"; 
    $_SESSION['sucursalInventario']=$_POST['sucursal'];
    $cont++;
    }

if($_POST['categoria']>0){//verificamos si esta seleccionada alguna categoria
        $condiciones[$cont]="idCategoria=$_POST[categoria]"; 
        $cont++;
}
 
if($_POST['filtro']>0){//verificamos si esta filtrado el producto
$condiciones[$cont]="stockDanado>0"; 
$cont++;
} 

if($cont>0){//Si el contador es mayor a 0 obtenemos la sentencia WHERE
$where="WHERE ";

for($i=0;$i<$cont;$i++){//Con un ciclo for recorremos el arreglo

if($i==0){//Si es la primera posicion en el arreglo concatenamos un espacio y la condicion
$where.=" ".$condiciones[$i];
}else{//De lo contrario concatenamos la sentencia AND y la siguiente condicion
$where.=" AND ".$condiciones[$i];
}
}
}else{
$where=""; 
if($_SESSION['acceso']==1){
$_SESSION['todo']=true;    
}  
}



$complemento="order by idProd asc";
$consulta="SELECT * FROM producto inner join marca on producto.idMarca=marca.idMarca";
$sql=$consulta." ".$where." ".$complemento;

$_SESSION['consultaInventario']=$consulta;
$_SESSION['complemento']="$complemento";
$_SESSION['condiciones']="$where";
$categorias=  ejecutarSQL::consultar($sql." limit 100");
 ?>

<table class="table table-bordered" style="text-align:center">
                                        <thead class="">
                                            <tr>
                                                <th class="text-center">ID</th>
                                                <th class="text-center">Codigo</th>
                                                <th class="text-center">Producto</th>
                                                <th class="text-center">Costo</th>
                                                <th class="text-center">Precio de venta</th>
                                                <th class="text-center">Existencia</th>
                                                <th class="text-center">Dañado</th>
                                                <?php
                                                if($_SESSION['acceso']==1){
                                                ?>
                                                <th class="text-center">sucursal</th>
                                                <?php
                                                }
                                                ?>   
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            
                                              $ui=1;
                                              while($cate=mysqli_fetch_array($categorias)){
                                                  echo '
                                                      <div id="update-category">
                                                       <tr>
                                                       <td>'.$ui.'</td>
                                                       <td>'.$cate['codProd'].'</td>
                                                       <td>'.$cate['nombreProd']." ".$cate['NombreMarca'].'</td>
                                                       <td>$'.$cate['precioCosto'].'</td> 
                                                       <td>$'.$cate['precioVenta'].'</td>
                                                       <td>'.$cate['existencia'].'</td> 
                                                       <td>'.$cate['stockDanado'].'</td>';     
                                                       
                                                if($_SESSION['acceso']==1){
                                                $suc=  ejecutarSQL::consultar("SELECT*FROM sucursal inner join ubicacion on sucursal.idUbicacion=ubicacion.idUbicacion where idSucursal=".$cate['idSucursal']);
                                                $suc=mysqli_fetch_array($suc);
                                                echo '<td>'.$suc['nombreSucursal']." ".$suc['nombreUbicacion'].'</td>';
                                               
                                                }
                                               
                                                       echo '</tr>
                                                    
                                                      </div>
                                                      ';
                                                  $ui=$ui+1;
                                              }
                                            ?>
                                        </tbody>
                                    </table>