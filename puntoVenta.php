<?php 

include './library/configServer.php';
include './library/consulSQL.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Venta</title>
    <?php include './inc/link.php';
  
     ?>
<script src="js/push.min.js"></script>
</head>
 <?php include './inc/navbar.php'; ?>
     <?php
session_start();
$_SESSION['idVentaContado']=0;
$_SESSION['abonoV']=0;
$_SESSION['tipoVenta']='';
$_SESSION['precio']=1;
$_SESSION['descuento']=0;
$_SESSION['desv']=0;
$_SESSION['rfcNuevoCliente']="";
if(isset($_GET['limpiar'])){
    unset($_SESSION['producto']);
    unset($_SESSION['productos2']);
    $_SESSION['contador']=0;   
    unset($_SESSION['sumaTotal']);
    unset($_SESSION['cantidad']);
    unset($_SESSION['cantidad2']);
}
include './process/notificacion.php';
?>
<body id="container-page-index">
<
 <style>
 .conClientes:hover{
 background:#F0E68C;
 }
 </style>
 <script language="javascript">
   
//funcion que se activa al abrirse el modal nota:

$(document).ready(function(){
$('#notaPopup').on('show.bs.modal', function (event) {
  var recipient="hola";
  $.post("inc/notaPdf.php", { recipient: recipient }, function(data){
    $("#frameComprobante").html(data);
     });
})
});

//Evento al cerrar el modal de comprobante:
//funcion que se activa al abrirse el modal nota:

$(document).ready(function(){
$('#notaPopup').on('hidden.bs.modal', function (event) {
  window.location.href='index.php';
})
});
$(document).ready(function(){
$("#clientePopup").on("hidden.bs.modal", function () {
   var validar="validar"; 
   var d = document.getElementById("addCliente");
   while (d.hasChildNodes())
   d.removeChild(d.firstChild);  
   $.post("inc/mostrarRFC.php", { validar: validar }, function(data){
   $("#data-cliente").html(data);
    });
});
}); 
$(document).ready(function(){
$("#consultaClientesPopup").on("hidden.bs.modal", function () {
   var validar="validar"; 
   $.post("inc/mostrarRFC.php", { validar: validar }, function(data){
   $("#data-cliente").html(data);
    });
});
}); 



function mostrarConsultaClientes(valor){
$.post("inc/obtenerRFC.php", { idCliente: valor }, function(data){
$("#data-cliente").html(data);
}); 
} 

//consultar productos en modal en el modulo punto de venta:



//Abrir caja desde modal:
$(document).ready(function() {
$('#abrirCajaPopup2 form').submit(function(e) {
         e.preventDefault();
         var informacion=$('#abrirCajaPopup2 form').serialize();
         var metodo=$('#abrirCajaPopup2 form').attr('method');
         var peticion=$('#abrirCajaPopup2 form').attr('action');
         $.ajax({
            type: metodo,
            url: peticion,
            data:informacion,
            beforeSend: function(){
                $("#resAbrirCaja2").html('Registrando <br><img src="assets/img/enviando.gif" class="center-all-contens">');
            },
            error: function() {
                $("#resAbrirCaja2").html("Ha ocurrido un error en el sistema");
            },
            success: function (data) {

                $("#resAbrirCaja2").html(data);
            }
        });
        return false;
    }); 
}); 


/*Envio del formulario con Ajax para añadir cliente*/
  $(document).ready(function(){
   $('#clientePopup form').submit(function(e) {
         e.preventDefault();
         var informacion=$('#clientePopup form').serialize();
         var metodo=$('#clientePopup form').attr('method');
         var peticion=$('#clientePopup form').attr('action');
         $.ajax({
            type: metodo,
            url: peticion,
            data:informacion,
            beforeSend: function(){
                $("#addCliente").html('Agregando cliente <br><img src="assets/img/enviando.gif" class="center-all-contens">');
            },
            error: function() {
                $("#addCliente").html("Ha ocurrido un error en el sistema");
            },
            success: function (data) {

                $("#addCliente").html(data);
            }
        });
        return false;
    });

   });
  //Evento keyup de busqueda en modal ConsultarClientes:
  $(document).ready(function(){
$('#consultarNombre').keyup(function(){
 var nombreCliente=this.value;
 $.post("inc/tablaConsultarClientes.php", { nombreCliente: nombreCliente }, function(data){
 $("#tablaConsultarClientes").html(data);
 });

  });
});     
  /*Envio del formulario de venta*/
  $(document).ready(function(){
   $('#form-venta form').submit(function(e) {
         e.preventDefault();
         var informacion=$('#form-venta form').serialize();
         var metodo=$('#form-venta form').attr('method');
         var peticion=$('#form-venta form').attr('action');
         $.ajax({
            type: metodo,
            url: peticion,
            data:informacion,
            error: function() {
                $("#errorPopup").modal('toggle');
            },
            success: function (data) {

                $("#form-venta").html(data);
                //$("#errorPopup").modal('toggle');
            }
        });
        return false;
    });

   }); 

//Funcion que consulta productos en el modulo punto de venta:

function consultarProds(componente){
var valor=componente.value;    
$.post("inc/consultarProductosPV.php", { valor: valor }, function(data){
 $("#tablaConsultarProductosPV").html(data);
 });
}
//Agregar carrito desde modal en modulo punto de venta
function agregarCarritoPVmodal(codProd){
var cantidad=1;
 if(codProd!=""){
 $('#mostrarVenta').load("process/carritoPV.php?codProd="+codProd+"&cantidad="+cantidad);
 $("#carrito-compras-tienda").load("process/carrito.php");
 }else{
 $('#codigoVacio').modal('toggle');    
 }

}
//Evento que agrega productos al carrito en modulo PV:
function agregarCarritoPV(){
 var codProd=document.getElementById('codeProdPV').value;
 var cantidad=1;
 if(codProd!=""){
 $('#mostrarVenta').load("process/carritoPV.php?codProd="+codProd+"&cantidad="+cantidad);
 $("#carrito-compras-tienda").load("process/carrito.php");
 }else{
 $('#codigoVacio').modal('toggle');    
 }
 } 

//Evento al precionar la tecla enter sobre el campo de texto codeProd

function enterpressalert(e, textarea){
var code = (e.keyCode ? e.keyCode : e.which);
if(code == 13) { //Enter keycode
    agregarCarritoPV();
}
}


 function mayus(id){

  id.value=id.value.toUpperCase();  
  
  }
 
  //Boton que valida la venta:

  function venta(){
     var where="";
    $.post("process/validarCarrito.php", { where: where }, function(data){
    $("#res-car").html(data);
     });

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

<?php
if($_SESSION['acceso']!=1 && $_SESSION['acceso']!=3 && $_SESSION['acceso']!=2){
   echo "<script>window.location.href='index.php'</script>";
    }
?>   

    <section id="container-pedido">
        <div class="container">
            <div class="page-header">
              <h1>Punto de Venta <small>Store EWS</small></h1>
            </div>
            <br>
            <div class="row">
                
                <div class="col-xs-12 col-sm-7" style="border: 1px solid #e0e1e1 !important;border-radius: 4px;padding: 10px;">
                    <div id="form-venta" >
                    <div class="text-center">
                                        <input type="text" class="form-control" id="codeProdPV" onKeyPress="enterpressalert(event, this)" placeholder="Ingrese codigo de producto">
                                        </div>
                                        <br>
                                        <div class="text-center">
                                        <button class="btn btn-danger btn-md" onclick="agregarCarritoPV();">Agregar <span class="fa fa-plus"></span></button>
                                        <div style="display:inline-block;width:1%;"></div>
                                        <button class="btn btn-danger btn-md" data-toggle="modal" data-target="#conProds">Consultar productos<span class="fa fa-search"></span></button>
                                        </div>
                                        <br>
                                        <div class="text-center" id="mostrarVenta">
                                        <?php
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
                                                                                                                       
                                        ?>
                                        </div>
                                        <div id="btnVender" class="text-center"><a class="btn btn-danger btn-md" onclick="venta();">Vender</a>&nbsp;&nbsp;<a class="btn btn-warning btn-md" href="puntoVenta.php?limpiar=1">Limpiar</a>&nbsp;&nbsp;<a href="ventas.php?id=Devoluciones"class="btn btn-danger btn-md">Cancelar Venta</a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-5">
                    <img class="img-responsive center-all-contens" src="assets/img/LOGOSA.png" style="opacity: .4">
                </div>
            </div>
        </div>
    </section>
    <!-- Modal desea factura? -->

                              
                               <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="ventaPopup">
                               <div class="modal-dialog modal-sm" style="width:30%;">
                               <div class="modal-content">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
                               <h4 class="modal-title text-center text-primary" id="myModalLabel">Venta Exitosa</h4>
                               </div>
                               <form method="post" action="facturar.php" target="_blank">
                               <div class="text-center" style="height: 40%">
                                
                                <img src="assets/img/correcto.png" class="center-all-contens"><br><p class="lead text-center">¿Desea realizar una factura?</p>
                                
                               </div>

                  <div class="modal-footer">
                    <div class="text-center">
                    <button type="submit" class="btn btn-success btn-sm" style="width:20%;font-size:medium;">Si</button>
                    <button class="btn btn-danger btn-sm"  data-dismiss="modal" id="botonNo" style="width: 20%;font-size:medium;">No</button>
                   </div>                  
                  </div>
                  <div class="" style="width: 100%; text-align: center; margin: 0;" id="addProveedor"></div>
              </form>
          </div>
      </div>
    </div> <!-- Fin modal desea factura? -->

    <!-- Modal comprobante nota -->

                              
                              <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="notaPopup">
                               <div class="modal-dialog modal-md">
                               <div class="modal-content">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
                               <h4 class="modal-title text-center text-primary" id="myModalLabel">Comprobante</h4>
                               </div>
                              <div id="frameComprobante"></div>
                              

                  <div class="modal-footer">
                     <div class="text-center"><button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Terminar</button>&nbsp;&nbsp;<a class="btn btn-success" href="facturar.php">Facturar</a></div>                
                  </div>
                  <div class="" style="width: 100%; text-align: center; margin: 0;" id="addProveedor"></div>
              </form>
          </div>
      </div>
    </div> <!-- Fin modal comprobante-->
   
<!-- Modal consultar cliente -->

   <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="consultaClientesPopup">
   <div class="modal-dialog modal-lg text-center" style="width:80%">
    <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
    <h4 class="modal-title text-center text-danger" id="myModalLabel">Consultar Clientes</h4>
    </div>
   
    <div class="text-center" style="display:inline-block;padding:2% 4%;width:100%;">
     <input type="text" class="form-control" id="consultarNombre" placeholder="Introduzca nombre del cliente">                                                   
    </div>
    <div id="tablaConsultarClientes" style="padding: 0% 4%;">
    </div>

                  <div class="modal-footer">
                    <div class="text-center">
                    <button type="button" class="btn btn-danger btn-md" data-dismiss="modal">Salir</button>
                   </div>                  
                  </div>
                  <div class="" style="width: 100%; text-align: center; margin: 0;" id="addProveedor"></div>
              </form>
          </div>
      </div>
    </div> <!-- consultar cliente -->

 <!-- Modal consultar productos -->                              
 <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="conProds">
                               <div class="modal-dialog modal-lg">
                               <div class="modal-content" id="modal-form-login">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
                               <h4 class="modal-title text-center text-primary" id="myModalLabel">Consultar productos</h4>
                                </div>
                   
                 
                  <div class="popup">
                  <div class="text-center" style="display:inline-block;padding:2% 4%;width:100%;">
     <input type="text" class="form-control" onkeyup="consultarProds(this);" placeholder="Introduzca nombre del producto, marca, proveedor o codigo :">                                                   
    </div>
    <div id="tablaConsultarProductosPV" style="padding: 0% 4%;">
    </div>
                  </div>                
                  <div class="modal-footer">
                  <div class="text-center">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Salir</button>
                  </div>
                  </div>
             
              </form>
          </div>
      </div>
    </div> <!-- Fin modal consulta Productos -->


<!-- Modal no hay existencias -->

                              
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="errorExistencia">
                               <div class="modal-dialog modal-md">
                               <div class="modal-content">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
                               <h4 class="modal-title text-center text-danger" id="myModalLabel">Producto agotado</h4>
                               </div>
                              <div class="text-center">
                              <img class="img-responsive center-all-contens" src="assets/img/incorrecto.png">
                               <h4>Este producto no cuenta con existencias suficientes</h4>
                              </div>
                              <div class="modal-footer"></div>
          </div>
      </div>
    </div>
    <!-- Fin Modal carrito -->
    <!-- Modal abrir caja -->
                              
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="abrirCajaPopup2">
                               <div class="modal-dialog modal-md">
                               <div class="modal-content">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
                               <h4 class="modal-title text-center text-primary" id="myModalLabel">¿Desea abrir caja?</h4>
                               </div>
                               <form method="post" action="process/abrirCaja2.php">                            
                                <br>
                                <div class="text-center" style="padding:30px;">
                                <label>Monto Inicial:</label>
                                <input type="number" class="form-control" placeholder="$0.00" step="0.01" name="monto">
                                </div>
                                <div id="resAbrirCaja2"></div>
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
    <?php include './inc/footer.php'; ?>
</body>
</html>
<!-- Modal codigo vacio -->

                              
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="codigoVacio">
                               <div class="modal-dialog modal-md">
                               <div class="modal-content">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
                               <h4 class="modal-title text-center text-danger" id="myModalLabel">Incorrecto</h4>
                               </div>
                              <div class="text-center">
                              <img class="img-responsive center-all-contens" src="assets/img/incorrecto.png">
                               <h4>Ingrese un codigo de producto valido, o de su sucursal</h4>
                              </div>
                              <div class="modal-footer"></div>
          </div>
      </div>
    </div>
    <!-- Fin Modal carrito -->

    