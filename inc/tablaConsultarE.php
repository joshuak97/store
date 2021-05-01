<?php
 include '../library/configServer.php';
 include '../library/consulSQL.php';
 session_start();

 $condiciones=array();//Declaramos un array vacio en donde almacenaremos las condiciones de la consulta segun el filtro
 $cont=0;//Declaramos el contador el cual aumentara con cada condicion del arreglo
 if(!$_POST['valor']==""){//Verificamos si el campo valor contiene texto
 $condiciones[$cont]="$_POST[atributo] like '%$_POST[valor]%'"; 
 $cont++;
 }

 if($_POST['sucursal']>0){//verificamos si esta seleccionada alguna sucursal
    $condiciones[$cont]="idSucursal='$_POST[sucursal]'"; 
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
}


 ?>

<table class="table table-bordered" style="text-align:center;">
                                        <thead class="">
                                            <tr>
                                                <th class="text-center">N°</th>
                                                <th class="text-center">Folio</th>
                                                <th class="text-center">Concepto</th>
                                                <th class="text-center">Costo</th>
                                                <th class="text-center">Fecha de entrada</th>
                                                <th class="text-center">Fecha de registro</th>
                                                <th class="text-center">Registra</th>
                                                <?php
                                                if($_SESSION['acceso']==1){
                                                ?>
                                                <th class="text-center">Sucursal</th>
                                                <?php
                                                }
                                                ?>
                                                <th class="text-center">Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if($_SESSION['acceso']==1){
                                             $categorias=  ejecutarSQL::consultar("SELECT * FROM cuentaspagar inner join sucursal on cuentaspagar.idSucursal=sucursal.idSucursal inner join ubicacion on sucursal.idUbicacion=ubicacion.idUbicacion inner join usuarios on cuentaspagar.idUsuario=usuarios.idUsuario $where order by idCuentaP desc limit 60");
                                            }else{
                                            $categorias=ejecutarSQL::consultar("SELECT * FROM cuentaspagar inner join usuarios on cuentaspagar.idUsuario=usuarios.idUsuario $where order by idCuentaP desc limit 60");
                                            
                                            }
                                              $ui=1;
                                              while($cate=mysqli_fetch_array($categorias)){
                                                  echo '
                                                    
                                                       
                                                          <tr>
                                                              <td>'.$ui.'</td>
                                                              <td>'.$cate['folio_concepto'].'</td>
                                                             <td>'.$cate['concepto'].'</td>
                                                              <td>'.$cate['costoCompra'].'</td>
                                                              <td>'.$cate['fecha_compra'].'</td>
                                                              <td>'.$cate['fecha_registro'].'</td>
                                                              <td>'.$cate['Nombre']." ".$cate['Apellido'].'</td>';
                                                             if($_SESSION['acceso']==1){
                                                             echo ' <td>'.$cate['nombreSucursal']." ".$cate['nombreUbicacion'].'</td>';
                                                             }
                                                             echo '<td class="text-center">
                                                             <a class="btn btn-danger btn-sm" title="Detalle" data-toggle="modal" data-target="#detallesCP" onclick="mostrarDetallesCP('.$cate['idCuentaP'].')"><i class="fa fa-list"></i></a>&nbsp;';
                                                             echo  '<a class="btn btn-warning btn-sm" title="Editar"><i class="fa fa-edit"></i></a>'; 
                                                             echo '</td>';
                                                             ?>
                                           
                                                             <?php
                                                             echo '</tr>';
                                                         
                                                          $ui=$ui+1;
                                                    ?>
                                           
                                            <?php
                                              }
                                            ?>
                                        </tbody>
                                    </table>