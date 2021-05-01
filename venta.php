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
if($_SESSION['contador']==0){
echo '<script>window.location.href="index.php"</script>';
}
$_SESSION['idVentaContado']=0;
$_SESSION['abonoV']=0;
$_SESSION['tipoVenta']='';
$_SESSION['precio']=1;
$_SESSION['descuento']=0;
$_SESSION['desv']=0;
$_SESSION['rfcNuevoCliente']="";
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
 //Filtrado al seleccionar una linea:
 function seleccionPrecio(componente){
 var idPrecio=componente.value;
 $.post("inc/mostrarPrecios.php", { idPrecio: idPrecio }, function(data){
 $("#form-pago").html(data);
 });
 }      
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
//Funcion que mostrará el formulario segun el modo de pago:

$(document).ready(function(){
        $("#forma-compra").change(function () {
                              
          $("#forma-compra option:selected").each(function () {
          	
          	var formaCompra= $(this).val();
          	           
            $.post("inc/gPago.php", { formaCompra: formaCompra }, function(data){
              $("#form-pago").html(data);
            });  
                     
          });

        })
       });

//Funcion para obtener el abono a partir de los meses:

function abono(componente){
var mesesC=componente.value;
var total=document.getElementById("totalC").value;
$.post("inc/obtenerAbono.php", { mesesC:mesesC, total:total }, function(data){
$("#mostrar-abono").html(data);

});
}

function mostrarConsultaClientes(valor){
$.post("inc/obtenerRFC.php", { idCliente: valor }, function(data){
$("#data-cliente").html(data);
}); 
} 

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


 function mayus(id){

  id.value=id.value.toUpperCase();  
  
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

   

    <section id="container-pedido">
        <div class="container">
            <div class="page-header">
              <h1>Confirmar Venta</h1>
            </div>
            <br>
            <div class="row">
                
                <div class="col-xs-12 col-sm-7" style="border: 1px solid #e0e1e1 !important;border-radius: 4px;padding: 10px;">
                    <div id="form-venta" >
                        <form class="form-inline" action="process/pagarContado.php" method="post" role="form">
                                        
                                          

                                        <div class="text-center">
                                        <select class="form-control" id="forma-compra" name="forma-compra" style="width:100%">
                                         <option value="0">Seleccione su forma de compra:</option>
                                         <option value="contado">Contado</option>
                                         <option value="credito">A credito</option>
                                         <?php/*
                                         if($_SESSION['acceso']!=3){
                                          echo "<option value='proveedor'>Distribuidor</option>";
                                         }*/
                                         ?>
                                        </select></div>&nbsp &nbsp
                                        
                                        <?php
                                        echo '
                                          <input type="hidden" name="clien-name" value="'.$_SESSION['nombreUser'].'">
                                          <input type="hidden" name="clien-pass" value="'.$_SESSION['claveUser'].'">
                                          <input type="hidden"  name="clien-number" value="log">
                                        <br>';
                                        ?>
                                        <div id="form-pago">

                                        </div>

                                        <div id="desglose">

                                        </div>
                                      
                                   
                            <div id="venta-res" style="width: 100%; text-align: center; margin: 0;"></div>
                        </form>

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



  <!-- Modal agregar nuevo cliente -->

                              
    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="clientePopup">
    <div class="modal-dialog modal-sm">
    <div class="modal-content" id="modal-form-login">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
    <h4 class="modal-title text-center text-primary" id="myModalLabel">Agregar Nuevo Cliente</h4>
    </div>
    <form action="process/addCliente.php" method="post" role="form" style="margin: 20px;"  id="faddCliente">          
    <div class="popup">
    <div class="form-group">
    <label>Nombre</label>
    <input class="form-control" type="text" name="name-cliente" placeholder="Nombre del cliente" maxlength="30">
    </div>
    <div class="form-group">
    <label>Apellidos</label>
    <input class="form-control" type="text" name="apellido-cliente" placeholder="Apellidos del cliente" required="">
    </div> 
    <div class="form-group">
    <label>RFC</label>
    <input class="form-control" type="text" name="rfc-cliente" placeholder="RFC cliente" onkeyup="mayus(this);">
    </div>                           
    <div class="form-group">
    <label>Calle:</label>
    <input class="form-control" type="text" name="calle-cliente" placeholder="Dirección cliente" required="">
    </div>
    <div class="form-group">
    <label>No. Exterior</label>
    <input class="form-control" type="text" name="nexterior-cliente" placeholder="Dirección cliente" required="">
    </div>
    <div class="form-group">
    <label>No Interior</label>
    <input class="form-control" type="text" name="ninterior-cliente" placeholder="No. Interior" required="">
    </div>
    <div class="form-group">
    <label>Codigo Postal</label>
    <input class="form-control" type="text" name="cp-cliente" placeholder="Codigo Postal" required="">
    </div>
    <div class="form-group">
    <label>Colonia</label>
    <input class="form-control" type="text" name="colonia-cliente" placeholder="Colonia"  maxlength="50" required="">
    </div>
    <div class="form-group">
    <label>Estado:</label>
    <input class="form-control" type="text" name="estado-cliente" placeholder="Entidad federativa" required="">
    </div>
    <div class="form-group">
    <label>Municipio:</label>
    <input class="form-control" type="text" name="municipio-cliente" placeholder="Dirección del cliente" required="">
    </div>
    <div class="form-group">
    <div class="form-group">
    <label>Correo</label>
    <input class="form-control" type="text" name="correo-cliente" placeholder="Colonia"  maxlength="50" required="">
    </div>
    <label>Teléfono</label>
    <input class="form-control" type="text" name="tel-cliente" placeholder="Número telefónico" pattern="[0-9]{1,20}" maxlength="20" required="">
    </div>
    </div>                
    <div class="modal-footer">
    <button type="submit" class="btn btn-primary btn-sm">Agregar Cliente</button>
    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
    </div>
    <div class="" style="width: 100%; text-align: center; margin: 0;" id="addCliente"></div>
    </form>
    </div>
    </div>
    </div> <!-- Fin modal clientes -->
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