<?php 

include './library/configServer.php';
include './library/consulSQL.php';


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Facturar</title>
    <?php include './inc/link.php';
  
     ?>
     <script src="./js/push.min.js"></script>
</head>
 <?php include './inc/navbar.php'; ?>
     <?php
session_start();
$_SESSION['idCliente']=0;
include './process/notificacion.php';

?>
<body id="container-page-index">
<style>
 .conClientes:hover{
 background:#F0E68C;
 }
 </style>
 <script language="javascript">
 
//rfc-cliente
$(document).ready(function(){
$("#btnFacturar").click(function () {
var uso=document.getElementById('txtUso').value;
if(uso!="NO"){    
var rfcCliente=document.getElementById("rfc-cliente").value;    
$.post("inc/idCliente.php", { rfcCliente: rfcCliente }, function(data){
$("#cliente-res").html(data);
});
$.ajax({
 url: "factura_digital/ejemplo_timbradoContado.php",
 type: 'post',
 data: rfcCliente,
 beforeSend: function(){
 $("#cliente-res").html('Facturando<br><img src="assets/img/enviando.gif" class="center-all-contens">');
 },
 success:function(responsedata){
  $('#cliente-res').html(responsedata);
 }
 });
}else{
$("#errorPopup").modal("show");     
}
});
}); 
//Funcion que permite ajustar el uso que el cliente dará al cdfi al seleccionar una opcion:
function cambiarUsoCDFI(componente){
var uso=componente.value;  
if(uso!="NO"){  
$.post("inc/usoCDFI.php", { uso: uso }, function(data){
$("#cliente-res").html(data);
});
}else{
$("#errorPopup").modal("show");     
}
}
//funcion que se activa al abrirse el modal factura:

$(document).ready(function(){
$('#facturaPopup').on('show.bs.modal', function (event) {
  var recipient="contado";

  $.post("inc/facturaPdf.php", { recipient: recipient }, function(data){
    $("#frameFactura").html(data);
     });
})
});
//Funcion que se activa al cerrar modal factura:
$(document).ready(function(){
$("#facturaPopup").on("hidden.bs.modal", function () {
window.location.href="process/vaciarcarrito.php";   
});
}); 
//Evento que se activa al cerrar el modal agregar clientes:
$(document).ready(function(){
$("#clientePopup").on("hidden.bs.modal", function () {
   var validar="validar"; 
   var d = document.getElementById("addCliente");
   while (d.hasChildNodes())
   d.removeChild(d.firstChild);  
   $.post("inc/mostrarRFCTaller.php", { validar: validar }, function(data){
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
    $.post("inc/clienteContado.php", { validar: validar }, function(data){
   $("#cliente-res").html(data);
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
//Funcion muestra los estados segun el pais:

$(document).ready(function(){
        $("#paisCliente").change(function () {
                              
          $("#paisCliente option:selected").each(function () {
          	
          	var pais= $(this).val();
          	           
            $.post("inc/estadoCliente.php", { pais: pais }, function(data){
              $("#estadoCliente").html(data);
            });  
                     
          });

        })
       });       

//Funcion para obtener el abono a partir de los meses:

function abono(componente){
var mesesC=componente.value;
var total='<?php echo $_SESSION["sumaTotal"] ?>';btnFactu
var abono=total/mesesC;
var valor=abono.toFixed(2);
document.getElementById("mostrar-abono").innerHTML ='$'+valor;

}

function mostrarConsultaClientes(valor){
$.post("inc/obtenerRFC.php", { idCliente: valor }, function(data){
$("#data-cliente").html(data);
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
  //Evento keyup de busqueda en modal ConsultarClientes:
  $(document).ready(function(){
$('#consultarNombre').keyup(function(){
 var nombreCliente=this.value;
 $.post("inc/tablaConsultarClientes.php", { nombreCliente: nombreCliente }, function(data){
 $("#tablaConsultarClientes").html(data);
 });

  });
});   
$(document).ready(function(){
$("#consultaClientesPopup").on("hidden.bs.modal", function () {
   var validar="validar"; 
   $.post("inc/mostrarRFCTaller.php", { validar: validar }, function(data){
   $("#data-cliente").html(data);
    });
});
}); 
//Funcion que permite consultar el nombre del cliente al escribir en el campo "introduzca RFC del cliente":
function consultaNombre(componente){
valor=componente.value;
$.post("inc/consultaNombre.php", { valor: valor }, function(data){
 $("#nameCliente").html(data);
 });
}
  
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
<?php
$_SESSION['rfcNuevoCliente']="";
$_SESSION['usoCDFI']="";
unset($_SESSION['producto']);
unset($_SESSION['precioProd']);
unset($_SESSION['precioProdC']);
unset($_SESSION['productos2']);
unset($_SESSION['contador']);
unset($_SESSION['sumaTotal']);
unset($_SESSION['cantidad']);
unset($_SESSION['cantidad2']);
?>
    <section id="container-pedido">
        <div class="container">
            <div class="page-header">
              <h1>Confirmar Factura:</h1>
            </div>
            <br>
            <div class="row">
                
                <div class="col-xs-12 col-sm-6" style="border: 1px solid #e0e1e1 !important;border-radius: 4px;padding: 10px;">
                <br><h3 class="text-center">Datos del cliente:</h3><br>
                    <div id="form-venta">
                       
                                        
                                          

                                  <div style="width:100%;">
                                  <div class="form-group"><select id="txtUso" name="txtUso" class="form-control" onchange="cambiarUsoCDFI(this);">
                                  <option value="NO">Seleccione la utilidad que el cliente dará al comprobante:</option>
                                  <option value="G01">Adquisición de mercancias</option>		
                                  <option value="G02">Devoluciones, descuentos o bonificaciones</option>		
                                  <option value="G03">Gastos en general</option>		
                                  <option  value="I01">	Construcciones</option>		
                                  <option value="I02">Mobilario y equipo de oficina por inversiones</option>		
                                  <option value="I03">Equipo de transporte</option>		
                                  <option value="I04">Equipo de computo y accesorios</option>		
                                  <option value="I05">Dados, troqueles, moldes, matrices y herramental</option>		
                                  <option value="I06">Comunicaciones telefónicas</option>		
                                  <option value="I07">Comunicaciones satelitales</option>		
                                  <option value="I08">Otra maquinaria y equipo</option>		
                                  <option value="D01">Honorarios médicos, dentales y gastos hospitalarios.</option>
                                  <option value="D02">Gastos médicos por incapacidad o discapacidad.</option>
                                  <option value="D03">Gastos funerales.</option>
                                  <option value="D04">Donativos.</option>
                                  <option value="D05">Intereses reales efectivamente pagados por créditos hipotecarios (casa habitación)</option>
                                  <option value="D06">Aportaciones voluntarias al SAR.</option>
                                  <option value="D07">Primas por seguros de gastos médicos.</option>
                                  <option value="D08">Gastos de transportación escolar obligatoria.</option>
                                  <option value="D09">Depósitos en cuentas para el ahorro, primas que tengan como base planes de pensiones.</option>
                                  <option value="D10">Pagos por servicios educativos (colegiaturas)</option>
                                  <option value="P01">Por definir</option>
                                  </select></div> 
                                  <div id="data-cliente">
                                  <div class="form-group">
                                  <input type="text" placeholder="Introduzca RFC del cliente" onkeyup="consultaNombre(this);" id="rfc-cliente" name="rfc-clientes" id="rfc-cliente" class="form-control" required>    
                                  </div>
                                  <div class="form-group"><input type="text" placeholder="Nombre del cliente" name="nombre-cliente" id="nameCliente" class="form-control" readonly></div>  
                                   </div>
                                   <div class="form-group" id="nameCliente">
                                  
                                </div>
                                <input class="btn btn-danger" value="nuevo cliente" type="button" data-toggle="modal" data-target="#clientePopup">&nbsp &nbsp<input class="btn btn-danger" value="Consultar" type="button" data-toggle="modal" data-target="#consultaClientesPopup">     
                               
                                <div class="text-center"><button id="btnFacturar" class="btn btn-success">Facturar</button></div>
                                        <?php
                                        echo '
                                          <input type="hidden" name="clien-name" value="'.$_SESSION['nombreUser'].'">
                                          <input type="hidden" name="clien-pass" value="'.$_SESSION['claveUser'].'">
                                          <input type="hidden"  name="clien-number" value="log">
                                        <br>';
                                        ?>
                                   
                            <div id="cliente-res" style="width: 100%; text-align: center; margin: 0;"></div>
                      
                    </div>

                    
                </div>
               
           
        </div>
        
        <div class="col-xs-12 col-sm-6">
                    <img class="img-responsive center-all-contens" src="assets/img/LOGOSA.png" style="opacity: .4">
                </div>
    </section>
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
    <label>Colonia</label>
    <input class="form-control" type="text" name="colonia-cliente" placeholder="Colonia"  maxlength="50" required="">
    </div>
    <div class="form-group">
    <label>Municipio:</label>
    <input class="form-control" type="text" name="municipio-cliente" placeholder="Municipio" required="">
    </div>
    <div class="form-group">
    <label>Pais:</label>
    <select class="form-control" name="pais-cliente" id="paisCliente" required="">
    <?php
    $consultaPais= ejecutarSQL::consultar("SELECT * FROM pais order by paisnombre asc");
    echo "<option value='N'>Seleccione pais:</option>";
    while($estados=mysqli_fetch_array($consultaPais)){
    echo "<option value='".$estados['paisnombre']."'>".$estados['paisnombre']."</option>";
    }    
    ?>    
    </select>
    </div>
    <div class="form-group">
    <label>Estado:</label>
    <select class="form-control" name="estado-cliente" id="estadoCliente" required="">
    <?php
    $consultaEstado= ejecutarSQL::consultar("SELECT * FROM estado where ubicacionpaisid=42 order by estadonombre asc");
    echo "<option value='N'>Seleccione estado:</option>";
    while($estados=mysqli_fetch_array($consultaEstado)){
    echo "<option value='".$estados['estadonombre']."'>".$estados['estadonombre']."</option>";
    }    
    ?>    
    </select>
    </div>
	<div class="form-group">
    <label>Codigo Postal</label>
    <input class="form-control" type="text" name="cp-cliente" placeholder="Codigo Postal" required="">
    </div>								
    <div class="form-group">
    <div class="form-group">
    <label>Correo</label>
    <input class="form-control" type="text" name="correo-cliente" placeholder="Correo electronico"  maxlength="50" required="">
    </div>
    <label>Teléfono</label>
    <input class="form-control" type="text" name="tel-cliente" placeholder="Número telefónico" pattern="[0-9]{1,20}" maxlength="20" required="">
    </div>   
    </div>                
    <div class="modal-footer">
    <div class="text-center">
    <button type="submit" class="btn btn-primary btn-sm">Agregar Cliente</button>
    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
    </div>
    </div>
    <div class="" style="width: 100%; text-align: center; margin: 0;" id="addCliente"></div>
    </form>
    </div>
    </div>
    </div> <!-- Fin modal clientes -->
 <!-- Modal error -->

                              
                              <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="errorPopup">
                               <div class="modal-dialog modal-sm">
                               <div class="modal-content">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
                               <h4 class="modal-title text-center text-primary" id="myModalLabel">Error</h4>
                               </div>
                               <div class="text-center" style="height: 40%">
                                
                                <img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Debe seleccionar el uso que el cliente dará al comprobante</p>
                                
                               </div>

                  <div class="modal-footer">
                    <div class="text-center">
                    <button class="btn btn-danger btn-sm"  data-dismiss="modal" id="botonNo" style="font-size:medium;">Aceptar</button>
                   </div>                  
                  </div>
                  <div class="" style="width: 100%; text-align: center; margin: 0;" id="addVen"></div>
          </div>
      </div>
    </div> <!-- Fin modal error -->
<!-- Modal mostrar factura: -->


                              
                              <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="facturaPopup">
                               <div class="modal-dialog modal-md">
                               <div class="modal-content">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
                               <h4 class="modal-title text-center text-primary" id="myModalLabel">Factura</h4>
                               </div>
                              <div id="frameFactura"></div>
                              

                  <div class="modal-footer">
                                     
                  </div>
                  <div class="" style="width: 100%; text-align: center; margin: 0;" id="addProveedor"></div>
              </form>
          </div>
      </div>
    </div> <!-- Fin modal factura-->


    <?php include './inc/footer.php'; ?>
</body>
</html>