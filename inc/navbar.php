<?php 


 
    error_reporting(E_PARSE);
    if(!isset($_SESSION['contador'])){
        $_SESSION['contador'] = 0;
        }
  if(!isset($_SESSION['sumaTotal'])){
    $_SESSION['sumaTotal']=0;
  }
?>

<script language="javascript">

//Agregar cotizaciones desde modal:
$(document).ready(function() {
$('#cotizarPopup form').submit(function(e) {
         e.preventDefault();
         var informacion=$('#cotizarPopup form').serialize();
         var metodo=$('#cotizarPopup form').attr('method');
         var peticion=$('#cotizarPopup form').attr('action');
         $.ajax({
            type: metodo,
            url: peticion,
            data:informacion,
            beforeSend: function(){
                $("#res-modal-cotizar").html('Registrando <br><img src="assets/img/enviando.gif" class="center-all-contens">');
            },
            error: function() {
                $("#res-modal-cotizar").html("Ha ocurrido un error en el sistema");
            },
            success: function (data) {

                $("#res-modal-cotizar").html(data);
            }
        });
        return false;
    }); 
}); 
//Abrir caja desde modal:
$(document).ready(function() {
$('#abrirCajaPopup form').submit(function(e) {
         e.preventDefault();
         var informacion=$('#abrirCajaPopup form').serialize();
         var metodo=$('#abrirCajaPopup form').attr('method');
         var peticion=$('#abrirCajaPopup form').attr('action');
         $.ajax({
            type: metodo,
            url: peticion,
            data:informacion,
            beforeSend: function(){
                $("#resAbrirCaja").html('Registrando <br><img src="assets/img/enviando.gif" class="center-all-contens">');
            },
            error: function() {
                $("#resAbrirCaja").html("Ha ocurrido un error en el sistema");
            },
            success: function (data) {

                $("#resAbrirCaja").html(data);
            }
        });
        return false;
    }); 
}); 
//Cerrar caja desde modal:
$(document).ready(function() {
$('#cerrarCajaPopup form').submit(function(e) {
         e.preventDefault();
         var informacion=$('#cerrarCajaPopup form').serialize();
         var metodo=$('#cerrarCajaPopup form').attr('method');
         var peticion=$('#cerrarCajaPopup form').attr('action');
         $.ajax({
            type: metodo,
            url: peticion,
            data:informacion,
            beforeSend: function(){
                $("#resCerrarCaja").html('Registrando <br><img src="assets/img/enviando.gif" class="center-all-contens">');
            },
            error: function() {
                $("#resCerrarCaja").html("Ha ocurrido un error en el sistema");
            },
            success: function (data) {

                $("#resCerrarCaja").html(data);
            }
        });
        return false;
    }); 
}); 

//Evento al abrir modal cerrar caja 

$(document).ready(function(){
$('#cerrarCajaPopup').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Button that triggered the modal
var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
 // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
 var modal = $(this)
 $.post("inc/cuentaCaja.php", { recipient: recipient }, function(data){
 $("#cuentaCaja").html(data);
 });
})
});

function eliminarElemento(idProducto){
  
 $.post("inc/tablaCotizar.php", { idProducto: idProducto }, function(data){
 $("#carrito-compras-tienda").html(data);
 $("#mostrarVenta").html(data);
 });
 }

$(document).ready(function(){
$('#confirmarPedido').click(function(){
 where="ya llegue"
 $.post("process/validarCarrito.php", { where: where }, function(data){
    $("#res-car").html(data);
     });

  });
});

$(document).ready(function(){
$('#boton-cotizar').click(function(){
 where="ya llegue"
 $.post("process/validarCarritoCot.php", { where: where }, function(data){
    $("#res-car").html(data);
     });

  });
});

function modificarCantidadCarrito(posicion,componente){
var cantidad=componente.value;
$.post("inc/modificarCantidadCarrito.php", { cantidad: cantidad, posicion: posicion }, function(data){
   $("#totalCarrito").html(data);
   $("#totalCarrito2").html(data);
    });
}

</script>
<style type="text/css"> 
a:hover
{ 
text-decoration:none; 
cursor: pointer;


}

.equivalencia:hover
{ 
text-decoration:underline; 
cursor: pointer;


}

.aplicacion:hover
{ 
text-decoration:underline; 
cursor: pointer;


}

.dropdown-menu>li>a {
text-decoration:none;
  color:white;
} 
.dropdown-toggle:hover{
    text-decoration:none; 
}
.dropdown-toggle:active{
    text-decoration:none; 
}
.dropdown-toggle:focus{
    text-decoration:none; 
}
.open{
    text-decoration:none; 
}
.dropdown-menu{
    background-color:rgba(0,0,0,.7);
    color:white;
}
</style>
<section id="container-carrito-compras">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div id="carrito-compras-tienda"></div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <p class="text-center" style="font-size: 80px;">
                    <i class="fa fa-shopping-cart"></i>
                </p>
                <p class="text-center">
                <a href="process/vaciarcarrito.php" class="btn btn-danger btn-block"><i class="fa fa-trash"></i>Vaciar carrito</a><div id="res-car"></div> 
               
               
                    <a href="#" class="btn btn-success btn-block" id="confirmarPedido"><i class="fa fa-dollar"></i>Confirmar pedido</a>
                    
               
                          
        <!-- <div id="paypal-button-container"></div>
         
         <script>
           paypal.Buttons().render('#paypal-button-container');
           // This function displays Smart Payment Buttons on your web page.
         </script>-->
                        <?php
                          
                    if(!$_SESSION['nombreUser']==""){
                    echo'<a  id="boton-cotizar" class="btn btn-warning btn-block"><i class="glyphicon glyphicon-pencil"></i>Cotizar</a>'; 
                    }
                    ?>
                </p>
            </div>
        </div>
    </div>
</section>
<?php
$colorNav="";
if($_SESSION['acceso']==""){ 
$colorNav="background:#000053;opacity:.9;";
}else{
$conSucNav=ejecutarSQL::consultar("SELECT*FROM sucursal WHERE idSucursal=".$_SESSION['sucursal']);
$dataSucNav=mysqli_fetch_array($conSucNav);    
$colorNav="background:".$dataSucNav['color'].";opacity:.9;";
}

echo '<nav id="navbar-auto-hidden" style="'.$colorNav.'">';        
?>
        <div class="row hidden-xs"><!-- Menu computadoras y tablets -->
            <div class="col-xs-4">
            <?php
                if($_SESSION['acceso']==""){           
                echo '<figure class="logo-navbar" ><img src="assets/img/CONTORNO.png"" alt="Logo" width="125" height="75"></figure>';
                echo '<p class="text-navbar tittles-pages-logo"></p>'; 
                }else{
                $conSuc=ejecutarSQL::consultar("SELECT*FROM sucursal WHERE idSucursal=".$_SESSION['sucursal']);
                $dataSuc=mysqli_fetch_array($conSuc);
                 echo '<figure class="logo-navbar" ><img src="assets/img/CONTORNO.png"" alt="Logo" width="125" height="75"></figure>';
                echo '<p class="text-navbar tittles-pages-logo"></p>'; 
				//echo '<figure class="logo-navbar" ><img src="assets/img/'.$dataSuc['logo'].'" alt="Logo" width="55" height="55"></figure>';
                //echo '<p class="text-navbar tittles-pages-logo">'.$dataSuc['nombreSucursal'].'</p>';     
                }
                ?>
            </div>
            <div class="col-xs-8">
                <div class="contenedor-tabla pull-right">
                    <div class="contenedor-tr">
                        

                        <?php
                            if($_SESSION['acceso']==1){
                                echo '
                                    
           
                                <a href="index.php" class="table-cell-td" style="width:10%;">Inicio</a>
                        <a href="product.php" class="table-cell-td" style="width:10%;">Productos</a>
                                 <a href="cuentasPagar.php" class="table-cell-td" style="width:10%;">Saldos</a> 
                                    <a href="cotizar.php" class="table-cell-td" style="width:10%;">Cotizaciones</a>
                                    <a href="ventas.php" class="table-cell-td" style="width:10%;">Ventas</a>
                                    <a href="puntoVenta.php" class="table-cell-td" style="width:11%;">Punto V.</a>
                                    <a href="configAdmin.php" class="table-cell-td" style="width:11%;">Administración</a>
                                    <a href="#" style="width:15%;" class="table-cell-td carrito-button-nav all-elements-tooltip" data-toggle="tooltip" data-placement="bottom" title="Ver carrito de compras">
                                        <i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i>
                                    </a>
                                     <a href="#" class="table-cell-td" data-toggle="modal" data-target=".modal-logout">
                                        <i class="fa fa-user"></i>&nbsp;&nbsp;'.$_SESSION['nombreUser'].'
                                    </a>  
                                 ';
                            }else if($_SESSION['acceso']==2){
                                echo '
                                    
           
                                <a href="index.php" class="table-cell-td" style="width:10%;">Inicio</a>
                        <a href="product.php" class="table-cell-td" style="width:10%;">Productos</a>                          
                                 <a href="cuentasPagar.php" class="table-cell-td" style="width:10%;">Saldos</a> 
                                    <a href="cotizar.php" class="table-cell-td" style="width:10%;">Cotizaciones</a>
                                    <a href="ventas.php" class="table-cell-td" style="width:10%;">Ventas</a>
                                    <a href="puntoVenta.php" class="table-cell-td" style="width:10%;">Punto V.</a>
                                    <a href="configAdmin.php" class="table-cell-td" style="width:10%;">Administración</a>
                                    <a href="#" style="width:12%;" class="table-cell-td carrito-button-nav all-elements-tooltip" data-toggle="tooltip" data-placement="bottom" title="Ver carrito de compras">
                                        <i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i>
                                    </a>
                                    <div class="dropdown">
                                    <a href="#" style="width:28%;color:white;" class="table-cell-td dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-user"></i>&nbsp;&nbsp;'.$_SESSION['nombreUser'].'
                                </a>
  <ul class="dropdown-menu">
    <li><a href="#" data-toggle="modal" data-target="#cerrarCajaPopup">Corte de Caja</a></li>
    <li><a href="#" data-toggle="modal" data-target=".modal-logout">Cerrar Sesión</a></li>
  </ul>
</div>                          
                                 ';
                            }else if($_SESSION['acceso']==3){
                                echo '
                                  <a href="index.php" class="table-cell-td" style="width:12%;">Inicio</a>
                        <a href="product.php" class="table-cell-td" style="width:12%;">Productos</a>       
                             <a href="cuentasPagar.php" class="table-cell-td" style="width:12%;">Saldos</a> 
                                   <a href="ventas.php" class="table-cell-td" style="width:12%;">Ventas</a>
                                   <a href="puntoVenta.php" class="table-cell-td" style="width:11%;">Punto V.</a>
                                   <a href="cotizar.php" class="table-cell-td" style="width:12%;">Cotizaciones</a> 
                                    
                                    <a href="#" style="width:16%;" class="table-cell-td carrito-button-nav all-elements-tooltip" data-toggle="tooltip" data-placement="bottom" title="Ver carrito de compras">
                                        <i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i>
                                    </a>
                                    <div class="dropdown">
                                    <a href="#" style="width:30%;color:white;" class="table-cell-td dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-user"></i>&nbsp;&nbsp;'.$_SESSION['nombreUser'].'
                                </a>
  <ul class="dropdown-menu">
  <li><a href="#" data-toggle="modal" data-target="#cerrarCajaPopup">Corte de Caja</a></li>
    <li><a href="#" data-toggle="modal" data-target=".modal-logout">Cerrar Sesión</a></li>
  </ul>
</div>                          
                                 ';
                            }else if($_SESSION['acceso']==5){
                                echo '
                             <a href="index.php" class="table-cell-td" style="width:13%;">Inicio</a>
                        <a href="product.php" class="table-cell-td" style="width:13%;">Productos</a>       
                                    <a href="miCuenta.php" class="table-cell-td" style="width:13%;">Mis Cuenta</a> 
                                    <a href="cotizar.php" class="table-cell-td" style="width:13%;">Cotizaciones</a> 
                                    <a href="pedidosOnline.php" class="table-cell-td" style="width:13%;">Mis pedidos</a> 
                                    <a href="#" class="table-cell-td carrito-button-nav all-elements-tooltip" data-toggle="tooltip" data-placement="bottom" title="Ver carrito de compras">
                                        <i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i>
                                    </a>
                                    
                                    <a href="#" style="color:white;" data-toggle="modal" data-target=".modal-logout" class="table-cell-td dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-user"></i>&nbsp;&nbsp;'.$_SESSION['nombreUser'].'
                                </a>
  
                      
                                 ';
                            }else{
                                echo ' 
                                    <a href="index.php" class="table-cell-td" style="width:20%;">Inicio</a>
                        <a href="product.php" class="table-cell-td" style="width:20%;">Productos</a>
                        <a href="registration.php" class="table-cell-td" style="width:20%;">Registro</a>
                                    <a href="#" style="width:20%;" class="table-cell-td carrito-button-nav all-elements-tooltip" data-toggle="tooltip" data-placement="bottom" title="Ver carrito de compras">
                                        <i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i>
                                    </a>
                                    <a href="#" class="table-cell-td" style="width:20%;" data-toggle="modal" data-target=".modal-login">
                                        <i class="fa fa-user"></i>&nbsp;&nbsp;Login
                                    </a>
                                 ';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="row visible-xs"><!-- Mobile menu navbar -->
            <div class="col-xs-12">
                <button class="btn btn-default pull-left button-mobile-menu" id="btn-mobile-menu">
                    <i class="fa fa-th-list"></i>&nbsp;&nbsp;Menú
                </button>
                <a href="#" id="button-shopping-cart-xs" class="elements-nav-xs all-elements-tooltip carrito-button-nav" data-toggle="tooltip" data-placement="bottom" title="Ver carrito de compras">
                    <i class="fa fa-shopping-cart"></i>&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-caret-down"></i>
                </a>
                <?php
                if($_SESSION['acceso']==1){echo '
                    <a href="#"  id="button-login-xs" class="elements-nav-xs" data-toggle="modal" data-target=".modal-logout">
                        <i class="fa fa-user"></i>&nbsp; '.$_SESSION['nombreUser'].' 
                    </a>';
                }else if($_SESSION['acceso']==2){
                    echo '
                    <a href="#"  id="button-login-xs" class="elements-nav-xs" data-toggle="modal" data-target=".modal-logout">
                        <i class="fa fa-user"></i>&nbsp; '.$_SESSION['nombreUser'].' 
                    </a>';
                }else{
                    echo '
                       <a href="#" data-toggle="modal" data-target=".modal-login" id="button-login-xs" class="elements-nav-xs">
                        <i class="fa fa-user"></i>&nbsp; Iniciar Sesión
                        </a> 
                   ';
                }
                ?>
            </div>
        </div>
    </nav>
    <!-- Modal login -->
    <div class="modal fade modal-login" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-sm">
          <div class="modal-content" id="modal-form-login">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                  <h4 class="modal-title text-center text-primary" id="myModalLabel" style="font-size: 17px;">Iniciar sesión en STORE EWS</h4>
                </div>
            <form action="process/login.php" method="post" role="form" style="margin: 20px;" class="FormCatElec" data-form="login">
                  <div class="form-group">
                    <br>
                      <label><span class="glyphicon glyphicon-user"></span>&nbsp;Nombre</label>
                      <input type="text" class="form-control" name="nombre-login" placeholder="Escribe tu nombre" required=""/>
                  </div>
                  <div class="form-group">
                      <label><span class="glyphicon glyphicon-lock"></span>&nbsp;Contraseña</label>
                      <input type="password" class="form-control" name="clave-login" placeholder="Escribe tu contraseña" required=""/>
                  </div>
                  <br>
                  <div class="modal-footer">
                    <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-sm">Iniciar sesión</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                    </div>
                  </div>
                  <div class="ResFormL" style="width: 100%; text-align: center; margin: 0;"></div>
              </form>
          </div>
      </div>
    </div>
    <!-- Fin Modal login -->
    <!-- Desplegables de saldo -->
 


   <!-- Fin desplegable-->
    <div id="mobile-menu-list" class="hidden-sm hidden-md hidden-lg" style="<?php echo $colorNav?>">
        <br>
        <h3 class="text-center tittles-pages-logo">Store EWS</h3>
        <button class="btn btn-default button-mobile-menu" id="button-close-mobile-menu">
        <i class="fa fa-times"></i>
        </button>
        <br><br>

        <ul class="list-unstyled text-center">
            <li><a href="index.php">Inicio</a></li>
            <li><a href="product.php">Productos</a></li>
            <?php 
                if($_SESSION['acceso']==1){
                    echo '<li><a href="cuentasPagar.php">Saldos</a></li>
                         <li><a href="OrdenTaller.php">Ordenes</a></li>
                         <li><a href="ventas.php">Ventas</a></li>
						 <li><a href="cotizar.php">Cotizaciones</a></li>
                         <li><a href="configAdmin.php">Administración</a></li>';
                }else if($_SESSION['acceso']==2){
                    echo '<li><a href="cuentasPagar.php">Saldos</a></li>
                         <li><a href="OrdenTaller.php">Ordenes</a></li>
						 <li><a href="ventas.php">Ventas</a></li>
                         <li><a href="cotizar.php">Cotizaciones</a></li>
                         <li><a href="configAdmin.php">Administración</a></li>';
                }else if($_SESSION['acceso']==2){
                    echo '<li><a href="cuentasPagar.php">Saldos</a></li>
                         <li><a href="cotizar.php">Cotizaciones</a></li>';
                }else if($_SESSION['acceso']==3){
                    echo '<li><a href="OrdenTaller.php">Ordenes</a></li>
                         <li><a href="cotizar.php">Cotizaciones</a></li>';
                }
            ?>
        </ul>
    </div>
 
    <!-- Modal carrito -->
    <div class="modal fade modal-carrito" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="padding: 20px;">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <br>
            <p class="text-center"><i class="fa fa-shopping-cart fa-5x"></i></p>
            <p class="text-center">El producto se añadio al carrito</p>
            <p class="text-center"><button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Aceptar</button></p>
          </div>
      </div>
    </div>
    <!-- Fin Modal carrito -->
    <!-- Modal añadir producto-->
    <div class="modal fade" id="noProductos" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="padding: 20px;">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <br>
            <p class="text-center"><i class="fa fa-shopping-cart fa-5x"></i></p>
            <p class="text-center">No se han agregado productos al carrito</p>
            <p class="text-center"><button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">Aceptar</button></p>
          </div>
      </div>
    </div>
    <!-- Fin Modal añadir carrito -->
     <!-- Modal cotizar -->

                              
                               <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="cotizarPopup">
                               <div class="modal-dialog modal-sm" style="width:30%;">
                               <div class="modal-content">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
                               <h4 class="modal-title text-center text-primary" id="myModalLabel">Nueva Cotización</h4>
                               </div>
                               <form method="post" action="process/regCotizacion.php">
                                                              
                                <br>
                                <div class="text-center" style="padding:30px;"  id="res-modal-cotizar">
                                <input type="text" class="form-control" placeholder="Ingrese el titulo de la nueva cotización" name="nombreCot">
                                </div>
                                <br>
                                

                              

                  <div class="modal-footer">
                    <div class="text-center">
                    <button type="submit" class="btn btn-success btn-sm" style="width:20%;font-size:medium;">Aceptar</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal" style="width: 20%;font-size:medium;">Cancelar</button>
                   </div>
                                      
                  </div>
                 
              </form>
          </div>
      </div>
    </div> <!-- Fin modal Cotizar -->
    <!-- Modal abrir caja -->
                              
                               <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="abrirCajaPopup">
                               <div class="modal-dialog modal-md">
                               <div class="modal-content">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
                               <h4 class="modal-title text-center text-primary" id="myModalLabel">¿Desea abrir caja?</h4>
                               </div>
                               <form method="post" action="process/abrirCaja.php">                            
                                <br>
                                <div class="text-center" style="padding:30px;">
                                <label>Monto Inicial:</label>
                                <input type="number" class="form-control" placeholder="$0.00" step="0.01" name="monto">
                                </div>
                                <div id="resAbrirCaja"></div>
                                <br>
                                

                              

                  <div class="modal-footer">
                    <div class="text-center">
                    <button type="submit" class="btn btn-success btn-sm" style="width:20%;">Abrir</button>
                    <a class="btn btn-danger btn-sm" href="index.php"  style="width: 20%;">No deseo Abrir Caja</a>
                   </div>
                                      
                  </div>
              </form>
          </div>
      </div>
    </div> <!-- Fin modal abrir caja -->
    <!-- Modal cerrar caja -->
                              
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="cerrarCajaPopup">
                               <div class="modal-dialog modal-md">
                               <div class="modal-content">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
                               <h4 class="modal-title text-center text-primary" id="myModalLabel">¿Desea Realizar corte de caja?</h4>
                               </div>
                               <form method="post" action="process/cerrarCaja.php">                            
                                <br>
                                <div class="text-center" style="padding:30px;" id="cuentaCaja">
                                <label>Total en caja:</label>
                                <input type="number" class="form-control" placeholder="$0.00" step="0.01" name="monto" readonly>
                                </div>
                                <div id="resCerrarCaja"></div>
                                <br>
                                

                              

                  <div class="modal-footer">
                    <div class="text-center">
                    <button type="submit" class="btn btn-success btn-sm" style="width:20%;">Realizar corte</button>
                    <a class="btn btn-danger btn-sm" data-dismiss="modal"  style="width: 20%;">Cancelar</a>
                   </div>
                                      
                  </div>
                 
              </form>
          </div>
      </div>
    </div> <!-- Fin modal cerrar caja -->
    <!-- Modal logout -->
    <div class="modal fade modal-logout" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="padding: 20px;">
      <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <br>
            <p class="text-center">¿Quieres cerrar la sesión?</p>
            <p class="text-center"><i class="fa fa-exclamation-triangle fa-5x"></i></p>
            <p class="text-center">
                <a href="process/logout.php" class="btn btn-primary btn-sm">Cerrar la sesión</a>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
            </p>
          </div>
      </div>
    </div>
    <!-- Fin Modal logout -->