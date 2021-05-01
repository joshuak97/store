<?php
include './library/configServer.php';
include './library/consulSQL.php';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Productos</title>
    <?php include './inc/link.php'; ?>
    <script type="text/javascript" src="js/admin.js"></script>
    <script src="js/push.min.js"></script>
</head>
<body id="container-page-product">

 
    <?php 
    include './inc/navbar.php';
    include './process/notificacion.php';

    session_start();
    $_SESSION['contadorTabla']=0;

    ?>
    

    <script language="javascript">
      //Filtrado al seleccionar una linea:
      $(document).ready(function(){
        $("#linea").change(function () {
        var idLinea=this.value;  
        $.post("inc/selectModelos.php", { idLinea: idLinea }, function(data){
        $("#select-modelo").html(data);
        });
        $.post("inc/busquedaPorLinea.php", { idLinea: idLinea }, function(data){
        $("#resultados").html(data);
        });
        
        })
      });

      function selectAnio(modelo){
      var idModelo=modelo.value;  
      $.post("inc/selectAnio.php", { idModelo: idModelo }, function(data){
      $("#select-anio").html(data);
      });
       $.post("inc/busquedaPorModelo.php", { idModelo: idModelo }, function(data){
       $("#resultados").html(data);
       });
      }

       function selectUbicacion(componente){
      var idSucursal=componente.value;  
      var busqueda=document.getElementById("desProd").value;
      $.post("inc/filtroUbicacion.php", { idSucursal: idSucursal,busqueda: busqueda }, function(data){
      $("#resultados").html(data);
      });
      }
       
      function selectAnio2(anio){
      var ano=anio.value;
      var modelo=document.getElementById('modelo').value;
      $.post("inc/selectAnio2.php", { ano: ano }, function(data){
      $("#select-anio2").html(data);
      });
       $.post("inc/busquedaPorAnio1.php", { ano: ano, modelo: modelo }, function(data){
       $("#resultados").html(data);
       });
      } 

function busquedaFinal(anio2){
  var ano2=anio2.value;
      var modelo=document.getElementById('modelo').value;
      var ano=document.getElementById('anio').value;
      var ano2=anio2.value;
      $.post("inc/busquedaPorAnio2.php", { ano: ano, modelo: modelo, ano: ano, ano2: ano2 }, function(data){
       $("#resultados").html(data);
       });
}      
      
$(document).ready(function(){
$('#buscar').click(function(){
  var ubicacion=document.getElementById("select-ubicacion").value;
  var desProd = document.getElementById("desProd").value;
  $.post("tabla.php", { desProd: desProd, ubicacion: ubicacion }, function(data){
    $("#resultados").html(data);
     }); 

  });
});


function agregarCarrito(idProducto){
 
 var cantidad=document.getElementById(idProducto).value;
 

 $('#carrito-compras-tienda').load("process/carrito.php?precio="+idProducto+"&cantidad="+cantidad);
 $('.modal-carrito').modal('show');
 }

 var existencias = '<?php echo $existenciasBajas;?>';

  if(existencias=="si"){
  
  Push.create("Favor de revisar existencias",{

  body: "Algunos de sus productos tienen menos de 6 piezas",
  icon: "assets/img/LOGOSA.png",
  timeout: 150000 
  });   

  }

     </script>
    
    
   
    <section id="store">
       <br>
       <div class="">
         
       </div>
        <div class="container">
          
            <div class="page-header">
              <h1> <small class="tittles-pages-logo">Store EWS</small></h1>
            </div>
            
 
<div style="width: 15%;font-size:15px;">
<!--<label>Buscar:</label><br> Etiqueta buscar  action="tabla.php" -->
</div>
<div style="display: inline-block; width: 25%;">
<input type="text" name="desProd" placeholder="Busqueda rapida." class="form-control" style="height:30px;" id="desProd">
</div>&nbsp &nbsp
<button name="buscar" id="buscar" class="btn btn-danger" type="submit">Buscar</button>
<div class="pull-right" style="display: inline-block; width: 20%;">
<select class="form-control" id="select-ubicacion" name="select-ubicacion" onchange="selectUbicacion(this);">
<option value="0">Filtrar por ubicacion:</option>	
<?php
if($_SESSION['acceso']>0 && $_SESSION['acceso']<5){
$consucursal=ejecutarSQL::consultar("select * from sucursal where idSucursal=".$_SESSION['sucursal']." AND  idUbicacion!=5");
$suc=mysqli_fetch_array($consucursal);
$conUbicacion=ejecutarSQL::consultar("select * from ubicacion where idUbicacion=".$suc['idUbicacion']);
$ubicacion=mysqli_fetch_array($conUbicacion);	
echo '<option value="'.$ubicacion['idUbicacion'].'">'.$ubicacion['nombreUbicacion'].'</option>';	
$conUbicacion=ejecutarSQL::consultar("select * from ubicacion where idUbicacion!=".$suc['idUbicacion']." AND  idUbicacion!=5");
while($ubicacion=mysqli_fetch_array($conUbicacion)){
echo '<option value="'.$ubicacion['idUbicacion'].'">'.$ubicacion['nombreUbicacion'].'</option>';
}
}else{
  $conUbicacion=ejecutarSQL::consultar("SELECT*from ubicacion WHERE idUbicacion!=5");
  while($ubicacion=mysqli_fetch_array($conUbicacion)){
    echo '<option value="'.$ubicacion['idUbicacion'].'">'.$ubicacion['nombreUbicacion'].'</option>';
    }
}
?>
</select>
</div>



<div id="pdf" style="display: inline-block;text-align:right; width: 10%;"></div>
<br><br>
              
<div id="resultados">
  <?php
	if(!$_SESSION['acceso']=="" && $_SESSION['acceso']!=1 && $_SESSION['acceso']!=5){
  $where="where idSucursal=".$_SESSION['sucursal'];  
  }else{
  $where="";  
  }
   $_SESSION['tablaProductos'][$_SESSION['contadorTabla']]='';
    $consulta= ejecutarSQL::consultar("SELECT * FROM producto INNER JOIN marca on marca.idMarca=producto.idMarca $where limit 50");
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
                   }   
                }else{
                    echo '<h2>No hay productos registrados en la tienda</h2>';
                }  
  ?>
</div>


                    
                </div>
            

        
    </section>
    
</body>
</html>

