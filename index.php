<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inicio | EWORK</title>
    <?php include './inc/link.php'; 
    include 'library/configServer.php';
    include 'library/consulSQL.php';
     
    ?>
</head>
<body id="container-page-index">
    <?php include './inc/navbar.php';
	session_start();?>
    <script src="js/push.min.js"></script>
    <div class="jumbotron" id="jumbotron-index">
      <h1><span class="tittles-pages-logo">EWORK SOLUTIONS</span></h1>
      <p>
          Bienvenido al sistema punto de venta en linea.
      </p>
    </div>
     
<?php
     
include 'process/notificacion.php';
?>
 
<script language="javascript">

  function agregarCarrito(idProducto){
 
 var cantidad=document.getElementById(idProducto).value;
 

 $('#carrito-compras-tienda').load("process/carrito.php?precio="+idProducto+"&cantidad="+cantidad);
 $('.modal-carrito').modal('show');
 }

var existencias = '<?php echo $existenciasBajas;?>';

  if(existencias=="si"){
  
  Push.create("Favor de revisar existencias",{

  body: "Algunos de sus productos casi se agotan",
  icon: "assets/img/LOGOSA.png",
  timeout: 150000 
  });   

  }

</script>



    <section id="new-prod-index">
         <div class="container">
            <div class="page-header">
                <h1>Novedades <small>productos</small></h1>
            </div>
            <div class="row text-center">
              <?php
			     
                  $idSucursal=$_SESSION['sucursal'];
				  if($_SESSION['acceso']>1 && $_SESSION['acceso']<5){
                  $consulta= ejecutarSQL::consultar("SELECT * FROM producto INNER JOIN marca on marca.idMarca=producto.idMarca WHERE idSucursal=$idSucursal order by idProd desc limit 20");
				  }else{
				   $consulta= ejecutarSQL::consultar("SELECT * FROM producto INNER JOIN marca on marca.idMarca=producto.idMarca inner join sucursal on producto.idSucursal=sucursal.idSucursal order by idProd desc limit 20");
					  
				  }
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
                                 $sucursalProd= ejecutarSQL::consultar("SELECT * FROM sucursal inner join ubicacion on sucursal.idUbicacion=ubicacion.idUbicacion where idSucursal=".$fila['idSucursal']); 
                                  $prodSuc=mysqli_fetch_array($sucursalProd);
                                 echo'<p class="text-center"><h4 class="text-center">"Disponible en sucursal '.$prodSuc['nombreSucursal'].'"</h4></p>';
                                        if($fila['idSucursal']==$_SESSION['sucursal']){
						  $sucursalProd= ejecutarSQL::consultar("SELECT * FROM sucursal inner join ubicacion on sucursal.idUbicacion=ubicacion.idUbicacion where idSucursal=".$fila['idSucursal']); 
						 $prodSuc=mysqli_fetch_array($sucursalProd);						
					 /*echo'<p class="text-center"><h4 class="text-center">"De venta en sucursal '.$prodSuc['nombreSucursal'].'"</h4></p>';		*/				
                     echo '<p class="text-center">
                         <a href="infoProd.php?CodProd='.$fila['idProd'].'" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp; Detalles</a>&nbsp;&nbsp;';
                        if($fila['existencia']>0){
                         echo '<button class="btn btn-success btn-sm" onclick="agregarCarrito( \''.$fila['idProd'].'\' );"><i class="fa fa-shopping-cart"></i>&nbsp; Añadir</button>&nbsp;&nbsp;';       
                        } 
                   echo  '</p>';
					 }else{
					  $sucursalProd= ejecutarSQL::consultar("SELECT * FROM sucursal inner join ubicacion on sucursal.idUbicacion=ubicacion.idUbicacion where idSucursal=".$fila['idSucursal']); 
						 $prodSuc=mysqli_fetch_array($sucursalProd);
                    /*  echo'<p class="text-center"><h4 class="text-center">"De venta en sucursal '.$prodSuc['nombreSucursal'].'"</h4></p>';*/
                     
                        echo '<p class="text-center">
                        <a href="infoProd.php?CodProd='.$fila['idProd'].'" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp; Detalles</a>&nbsp;&nbsp;';
                       if($fila['existencia']>0){
                        echo '<button class="btn btn-success btn-sm" onclick="agregarCarrito( \''.$fila['idProd'].'\' );"><i class="fa fa-shopping-cart"></i>&nbsp; Añadir</button>&nbsp;&nbsp;';       
                       } 
                  echo  '</p>';
                  
                     
                     }
                     
        
                     
                  echo '</div>

                 </div>';
              
             echo '</div>     
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
      <!--<section id="reg-info-index">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 text-center">
                   <article style="margin-top:20%;">
                        <p><i class="fa fa-users fa-4x"></i></p>
                        <h3 >Registrate</h3>
                        <p>Registrese y hagase vendedor de <span class="tittles-pages-logo">SA Patiño</span> .</p>
                        <p ><a href="registration.php" class="btn btn-info btn-block">Registrarse</a></p>   
                   </article>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <img width="450px" src="assets/img/LOGOSA.png" alt="Smart-TV" class="img-responsive">
                </div>
            </div>
        </div>
    </section>-->
    <?php include './inc/footer.php'; ?>
</body>
</html>