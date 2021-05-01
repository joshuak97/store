<?php
include 'library/configServer.php';
include 'library/consulSQL.php';

?>



<!DOCTYPE html>
<html lang="es">
<head>
    <title>Saldos</title>
    <?php include 'inc/link.php'; ?>
</head>
<body id="container-page-index">
<?php
?>
 <style>
 tr:hover{
 background:#F0E68C;
 }
 .encabezado{
  background:#DAD3BF; 
 }
 </style>
  <script language="javascript">
    
 //Evento para marcar como pagada una cuenta en el apartado cuentas por pagar:
function pagarCuentaP(componente){
var idCuenta=document.getElementById(componente).value;
$.post("inc/pagarCuentaP.php", { idCuenta: idCuenta }, function(data){
    $("#tabCuentasPagar").html(data);
     });
}

$(document).ready(function(){
$('#nombre-cliente').keyup(function(){
 var nombreCliente=document.getElementById("nombre-cliente").value;
 $.post("inc/cPagar.php", { nombreCliente: nombreCliente }, function(data){
    $("#res-cuentas-pagar").html(data);
     });

  });
});
//Funcion que registra gastos desde el modal:
function addGasto(){
var descripcion=document.getElementById("descripcion").value;
var comprobante=document.getElementById("comprobante").value;
var folio=document.getElementById("folio").value;
var monto=document.getElementById("monto").value;
var fechaG=document.getElementById("fechaG").value;
$.post("process/addGasto.php", { descripcion: descripcion, comprobante:comprobante,folio: folio, monto: monto, fechaG  }, function(data){
$("#addG").html(data);
});
}
//evento que consulta las cuentas por pagar dependiendo el valor seleccionado en el select buscar por:

$(document).ready(function(){
$('#valorBuscar').keyup(function(){
 var atributo=document.getElementById("atributo").value;
 var valor=this.value;
 
 $.post("inc/filtroCp.php", { valor: valor, atributo: atributo }, function(data){
 $("#tablaCuentasPagar").html(data);
 });

  });
});
//evento que consulta las cuentas por pagar dependiendo el valor seleccionado en el select buscar por:

$(document).ready(function(){
$('#valorG').keyup(function(){
 var atributo=document.getElementById("atributoG").value;
 var valor=this.value;
 
 $.post("inc/filtroG.php", { valor: valor, atributo: atributo }, function(data){
 $("#tablaG").html(data);
 });

  });
});

function detallesCuentaP(id){
  $.post("inc/idCuentaP.php", { id: id }, function(data){
   $("#res-cuentas").html(data);
   });
  $('#detallesCP').modal('show'); 
   //  window.open("configAdmin.php","ventana1","width=120,height=300,scrollbars=YES"); 
}


//Evento del boton detalles

$(document).ready(function(){
$('#detallesVenta').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Detalles de venta: ' + recipient);
  $.post("inc/modalcPagar.php", { recipient: recipient }, function(data){
    $("#contenido").html(data);
     });
})
});

//funcion que se activa al abrirse el modal detalles CP:

$(document).ready(function(){
$('#detallesCP').on('show.bs.modal', function (event) {
  var recipient="hola";
  $.post("inc/framePdf.php", { recipient: recipient }, function(data){
    $("#framePDF").html(data);
     });
})
});


function abonar(componente,folioCuenta){
var abono=document.getElementById(componente).value;
$.post("inc/abonar.php", { abono: abono, folioCuenta: folioCuenta }, function(data){
    $("#resAbono").html(data);
     });
}
  </script>
    <?php include './inc/navbar.php';
    session_start();

    $_SESSION['contador3']=0;
    


     ?>
    <section id="container-pedido">
        <div class="container">
            <div class="page-header">
              <h1>Saldos</h1>
            </div>
            <br>
<!--Tabla de navegacion -->

<ul class="nav nav-tabs" role="tablist">
<li role="presentation" class="active"><a href="#CuentasCobrar" role="tab" data-toggle="tab" >Cuentas por cobrar</a></li>
<!--<li role="presentation"><a href="#CuentasPagar" role="tab" data-toggle="tab" >Cuentas por pagar</a></li>-->
<?php
if($_SESSION['acceso']<=2){

?>
<li role="presentation"><a href="#congastos" role="tab" data-toggle="tab" >Gastos</a></li>
<?php
}
?>
</ul> 
<div class="tab-content">
<div role="tabpanel" class="tab-pane fade in active" id="CuentasCobrar">
<div class="row" id="tabAplicaciones">
<br>
<br>&nbsp &nbsp &nbsp
<div class="text-center col-md-2">

                    <h4>Consultar:</h4>  

                    </div>
                     <div class="col-md-8">
                     <input type="text" class="form-control" name="nombre-cliente" placeholder="Introduzca folio de venta,nombre o RFC del cliente" id="nombre-cliente">  
                    </div>
                   
            <div class="row">
               
            <br>
              
                   <div id="res-cuentas-pagar" class="table-responsive" style="border: 1px solid #e0e1e1 !important;border-radius: 4px;padding: 10px;">
                   <table class="table table-bordered" style="text-align:center;font-size: 17px;">
                   <tr><td><strong>Nombre del cliente</strong></td><td><strong>Fecha de Venta</strong></td><td><strong>Ultimo Abono</strong></td><td><strong>Monto</strong></td><td><strong>Total a Pagar</strong></td><td><strong>Restante</strong></td><td><strong>Detalles</strong></td></tr>
                   
                   </table>
                </div>
             
                <div id="resultadosPagar">
                  
                </div>
             
               
            </div>
        </div>
</div>
<div role="tabpanel" class="tab-pane fade" id="congastos">
<div class="row" id="tabAplicaciones">
<div class="col-xs-12 "><br>
                <label>Consultar por</label>&nbsp;&nbsp;&nbsp;
                <div style="width:20%;display:inline-block">
                <select id="atributoG" class="form-control">
                <option value="descripcion">Descripcion:</option>
                <option value="folio_gasto">Folio:</option>
                <?php
                if($_SESSION['acceso']==1){
                ?>
                <option value="fecha_gasto">Fecha de gasto:</option>
                <option value="fecha_registro">Fecha de registro:</option>
                <?php
                }
                ?>
                </select style="display:inline-block"></div>&nbsp;&nbsp;&nbsp;<input type="text" id="valorG" class="form-control" style="display:inline-block;width:40%;">
                &nbsp;&nbsp;&nbsp;<div  style="display:inline-block;text-align:center;"><button class="btn btn-danger right"  data-toggle="modal" data-target="#nuevoGasto"><small><i class="fa fa-plus"></i></small>&nbsp;&nbsp;Nuevo gasto</button>&nbsp;&nbsp;
				</div><br>
				<br>
                <div class="table-responsive" id="tablaG" style="border: 1px solid #e0e1e1 !important;border-radius: 4px;padding: 10px;">
				<?php
				echo "<table class='table table-striped'>
<thead>
<tr>
<th scope='col'>Folio</th>
<th scope='col'>Descripcion</th>
<th scope='col'>Tipo de comprobante</th>
<th scope='col'>Costo</th>
<th scope='col'>Fecha de gasto</th>
<th scope='col'>Fecha de registro</th>
<th scope='col'>Registra</th>";
if($_SESSION['acceso']==1){
echo "<th scope='col'>Sucursal</th>";
}
echo "</tr>
</thead>
<tbody>";// style='text-align:center;'
$montoTotal=0;
if(!$_SESSION['acceso']!=1){
    ini_set('date.timezone','America/Mexico_City');
    $fecha=date('Y-m-d',time());
    $conDevoluciones=ejecutarSQL::consultar("SELECT*FROM gastos inner join usuarios on gastos.idVendedor=usuarios.idUsuario inner join sucursal on gastos.idSucursal=sucursal.idSucursal where fecha_gasto like '%$fecha%' order by fecha_gasto desc");
}else{
    $conDevoluciones=ejecutarSQL::consultar("SELECT*FROM gastos inner join usuarios on gastos.idVendedor=usuarios.idUsuario inner join sucursal on gastos.idSucursal=sucursal.idSucursal order by fecha_gasto desc limit 100");
}
$res=mysqli_num_rows($conDevoluciones);
if($res>0){
while($devoluciones=mysqli_fetch_array($conDevoluciones)){
echo '<tr>
<th scope="row">'.$devoluciones['folio_gasto'].'</th>
<td>'.$devoluciones['descripcion'].'</td>
<td>'.$devoluciones['comprobante'].'</td>
<td>$'.$devoluciones['monto'].'</td>
<td>'.$devoluciones['fecha_gasto'].'</td>
<td>'.$devoluciones['fecha_registro'].'</td>
<td>'.$devoluciones['user'].'</td>
<td>'.$devoluciones['nombreSucursal'].'</td>
</tr>';
$montoTotal+=$devoluciones['monto'];
}
}else{
   echo  "<tr><td></td><td></td><td></td><td><h4>No se encontraron gastos registrados hoy</h4></td><td></td><td></td><td></td><td></td></tr>";
    }

echo "</tbody></table><br><br>";
echo "<table class='table table-striped text-center'>
<thead>
<tr>

<th scope='col'><strong>Gasto total</strong></th>
</tr>
</thead>
<tbody>";
echo"
<th scope='col'>$".number_format($montoTotal,2)."</th>";
echo "</tbody></table>";
				?>
                </div>
        </div>
</div>
</div>
<div role="tabpanel" class="tab-pane fade" id="gastos" >
<div class="row" id="tabAplicaciones">

            
        </div>
</div>
<div role="tabpanel" class="tab-pane fade" id="CuentasPagar">
<div class="row">
<div id="tabCuentasPagar">
<br><br>
<label>Buscar por</label>&nbsp;&nbsp;
<div style="display:inline-block;width:15%;"><select class="form-control" name="atributo" id="atributo">
<option value="NombreProveedor">Proveedor:</option>
<option value="numero_factura">Factura:</option>
<option value="folioNota">Nota:</option>
</select></div>&nbsp;&nbsp;
<div style="display:inline-block;width:20%;"><input type="text" id="valorBuscar" class="form-control"></div><br><br>
<div id="">

</div>
</div>
</div>
</div>
</div>
            

         <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="detallesVenta">
                               <div class="modal-dialog modal-sm" style="width: 50%;">
                               <div class="modal-content" id="modal-form-login">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
                               <h4 class="modal-title text-center text-primary" id="myModalLabel">Detalles de Venta</h4>
                                </div>
                             
                 
                  <div class="popup"  id='contenido' style="padding: 5%;">

                    

                  </div>
                  <div class="modal-footer">
                  <div class="text-center" id="resAbono"></div>
                  </div>
                  <div class="" style="width: 100%; text-align: center; margin: 0;" id="addProveedor"></div>
       
          </div>
      </div>
    </div> <!-- Fin modal Detalles de venta -->
        
    </section>
    <?php include 'inc/footer.php'; ?>
</body>
</html>
 <!-- Modal nuevo gasto -->

                               <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="nuevoGasto">
                               <div class="modal-dialog modal-sm">
                               <div class="modal-content" id="modal-form-login">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
                               <h4 class="modal-title text-center text-primary" id="myModalLabel">Nuevo Gasto</h4>
                                </div>
                           
                  <form action="process/addGasto.php" method="post">
                  <div class="popup" style="padding:5%;">
                  
                  <label>Descripcion:</label><br>	  
                  <div class="form-group">
                  <input class="form-control" type="text" name="des-gasto" placeholder="Descripcion de gasto"  required="" id="descripcion">
                  </div>
                  <label>Comprobante de gasto:</label><br>	  
                  <div class="form-group">
                  <select id="comprobante" name="gasto-comprobante" class="form-control">
                  <option value="">Seleccione un tipo de comprobante</option>
                  <option value="nota">Nota</option>
                  <option value="factura">Factura</option>
                  </select>
                  </div>
                  <label>Folio:</label><br>	  
                  <div class="form-group">
                  <input id="folio" class="form-control" type="text" name="folio-gasto" placeholder="Folio del comprobante de gasto"  required="">
                  </div>
                  <label>Monto:</label><br>
                  <div class="form-group">
                  <input id="monto" class="form-control" type="text" name="monto-gasto" value="0.00" placeholder="0.00"  pattern="^[0-9]+\.?[0-9]*$" required="">
                  </div>
                  <label>Fecha de gasto:</label><br>
                  <div class="form-group">
                  <input class="form-control" type="date" name="fecha-gasto" placeholder=""  required="" id="fechaG">
                  </div>
                  <div class="text-center">
                  <button type="submit" class="btn btn-success btn-sm" onclick="addGasto();">Agregar</button>
                  &nbsp;&nbsp;<button class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
					        </div>
                  </form>
                  </div>                 
                 <div class="modal-footer" id="addG"> 
                     </div>            
          </div>
      </div>
    </div> <!-- Fin modal Proveedores -->     
<!-- Modal detalles cuenta pagar -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="detallesCP">
                               <div class="modal-dialog modal-md">
                               <div class="modal-content" id="modal-form-login">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
                               <h4 class="modal-title text-center text-primary" id="myModalLabel">Detalles de Cuenta Pagar</h4>
                                </div>
                               <div id="framePDF"></div>
                  <div class="modal-footer">
                  <div class="text-center" id="resAbono"></div>
                  </div>
                  <div class="" style="width: 100%; text-align: center; margin: 0;" id="addProveedor"></div>
       
          </div>
      </div>
    </div> <!-- Fin modal Detalles de cuenta pagar -->

                              
                              