<?php 

include '../library/configServer.php';
include '../library/consulSQL.php';


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Venta</title>
    <?php include '../inc/link.php';
  
     ?>
     <script src="../js/push.min.js"></script>
</head>
 <?php include '../inc/navbar.php'; ?>
     <?php
session_start();
$_SESSION['idVentaContado']=0;
$_SESSION['tipoVenta']='';
include '../process/notificacion.php';

?>
<body id="container-page-index">
<
 <script language="javascript">

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
var total='<?php echo $_SESSION["sumaTotal"] ?>';
var abono=total/mesesC;
var valor=abono.toFixed(2);
document.getElementById("mostrar-abono").innerHTML ='$'+valor;

}

//funcion para obtener el rfc del cliente:

function idCliente(valor){
var nombreCliente=valor.value;
   $.post("inc/mostrarClientes.php", { nombreCliente: nombreCliente }, function(data){
              $("#rfc-clientes").html(data);
            }); 
}

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

                $("#ventaPopup").modal('toggle');
            }
        });
        return false;
    });

   }); 

 function mayus(id){

  id.value=id.value.toUpperCase();  
  
  }



  
  
//  var formaCompra = document.getElementById("forma-compra").value;
//  var formaPago=document.getElementById("forma-pago").value;
//  var meses=document.getElementById("meses").value;
//  var nombreCliente=document.getElementById("idCliente").value;
//alert(nombreCliente);
  //$.post("process/pagarCredito.php", { nombreCliente: nombreCliente }, function(data){
   // $("#desglose").html(data);
    // }); 

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
              <h1>Confirmar Compra</h1>
            </div>
            <br>
            <div class="row">
                
                <div class="col-xs-12 col-sm-6">
                    <div id="form-venta">
                        <form class="form-inline" action="process/pagarContado.php" method="post" role="form">
                                        
                                          

                                        <div style="width:100%;">
                                  <label>Cliente:</label>;
                                  <div class="form-inline"><input type="text" placeholder="Introduzca nombre del cliente" name="id-cliente" id="id-cliente" class="form-control" style="width:60%;" onkeyup="idCliente(this);" required> &nbsp &nbsp<input class="btn btn-danger" value="nuevo cliente" type="button" data-toggle="modal" data-target="#clientePopup"></div><br>;

                                 <label>RFC:</label></br>

                                   <select name="rfc-cliente" class="form-control" style="width:60%;" required id="rfc-clientes"></select><br><br>
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
                <div class="col-xs-12 col-sm-6">
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
                    <a href="process/vaciarCarrito.php" class="btn btn-danger btn-sm"  style="width: 20%;font-size:medium;">No</a>
                   </div>                  
                  </div>
                  <div class="" style="width: 100%; text-align: center; margin: 0;" id="addProveedor"></div>
              </form>
          </div>
      </div>
    </div> <!-- Fin modal desea factura? -->

<!-- Modal error cliente -->

                              
                               <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="errorPopup">
                               <div class="modal-dialog modal-sm" style="width:30%;">
                               <div class="modal-content">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
                               <h4 class="modal-title text-center text-danger" id="myModalLabel">Ha ocurrido un Error</h4>
                               </div>
                               <form method="post" action="facturar/factura_pdf.php" target="_blank">
                               <div class="text-center" style="height: 40%">
                                
                                <img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Favor de intentar otra vez</p>
                                
                               </div>

                  <div class="modal-footer">
                    <div class="text-center">
                    <button id="btn-si" type="submit" class="btn btn-success btn-sm" style="width:20%;font-size:medium;">Si</button>
                    <a href="process/vaciarcarrito.php" class="btn btn-danger btn-sm"  style="width: 20%;font-size:medium;">No</a>
                   </div>                  
                  </div>
                  <div class="" style="width: 100%; text-align: center; margin: 0;" id="addProveedor"></div>
              </form>
          </div>
      </div>
    </div> <!-- error cliente -->



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
                                    <input class="form-control" type="text" name="name-cliente" placeholder="Nombre cliente" maxlength="30">
                                </div>
                                <div class="form-group">
                                    <label>Apellido</label>
                                    <input class="form-control" type="text" name="apellido-cliente" placeholder="Apellido cliente" required="">
                                </div> 
                                <div class="form-group">
                                    <label>RFC</label>
                                    <input class="form-control" type="text" name="rfc-cliente" placeholder="RFC cliente" onkeyup="mayus(this);">
                                </div>                                
                                
                                <div class="form-group">
                                    <label>Dirección</label>
                                    <input class="form-control" type="text" name="dir-cliente" placeholder="Dirección cliente" required="">
                                </div>
                                <div class="form-group">
                                    <label>Correo</label>
                                    <input class="form-control" type="text" name="correo-cliente" placeholder="Correo Electrónico"  maxlength="50" required="">
                                </div>
                                <div class="form-group">
                                    <label>Teléfono</label>
                                    <input class="form-control" type="number" name="tel-cliente" placeholder="Número telefónico" pattern="[0-9]{1,20}" maxlength="20" required="">
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

    <?php include './inc/footer.php'; ?>
</body>
</html>