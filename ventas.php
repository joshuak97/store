<?php

include './library/configServer.php';
include './library/consulSQL.php';
?>

<!DOCTYPE html>
<html lang="es">
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    <title>Ventas</title>
    <?php include './inc/link.php'; ?>
    <?php

if($_SESSION['acceso']==""){
header("Location: index.php");	
}
ini_set('date.timezone','America/Mexico_City');
$fechaVenta=date('Y-m-d ',time());
$productosContado=array();
$productosCredito=array();
$contador=0;
$contador1=0;
$contador2=0;
$consultaProductos=ejecutarSQL::consultar("SELECT*FROM producto");
while($resProductos=mysqli_fetch_array($consultaProductos)){
$ventasProductos=ejecutarSQL::consultar("SELECT*FROM venta_contado WHERE idProd like '%".$resProductos['idProd'].",%' AND Fecha like '%$fechaVenta%'");
$numVentas=mysqli_num_rows($ventasProductos);
if($numVentas>0){
$productosContado[$contador]=$resProductos['idProd'];
}
}
?>
    <script type="text/javascript" src="js/chartJS/Chart.min.js"></script>
</head>
<body id="container-page-index">
 <?php include './inc/navbar.php';
  
    include './process/notificacion.php';
    $_SESSION['contadorDev']=0;
    ?>
  <script language="javascript">

 function generarVR(id){
  $.post("inc/idVenta.php", { id: id }, function(data){
  $("#resPDF").html(data);
  });
  $('#comprobanteVR').modal('show'); 
  }
 
 function consultarProd(componente){
 var nombreCliente=componente.value;
 $.post("inc/tablaConsultarProductosBajas.php", { nombreCliente: nombreCliente }, function(data){
 $("#tablaConsultarProductosBajas").html(data);
 });
  }
//Metodo que se utiliza para aprobar o rechazar las devoluciones por falla desde el panel de administrador
function gestionarDevolucionPorFalla(idDev,accion){
 if(accion=='Rechazar'){  
 $.post("process/gestionDevolucionPorFalla.php", { idDev: idDev, accion:accion }, function(data){
 $("#resGestionDevR"+idDev).html(data);
 });
}else{
  $.post("process/gestionDevolucionPorFalla.php", { idDev: idDev, accion:accion }, function(data){
 $("#resGestionDevA"+idDev).html(data);
 });
}
 }  
//Metodo que se utiliza para aprobar o rechazar las bajas por falla desde el panel de administrador
 function gestionarBajasPorFalla(idBaja,accion){
 if(accion=='Rechazar'){  
 $.post("process/gestionBajasPorFalla.php", { idBaja: idBaja, accion:accion }, function(data){
 $("#resGestionR"+idBaja).html(data);
 });
}else{
  $.post("process/gestionBajasPorFalla.php", { idBaja: idBaja, accion:accion }, function(data){
 $("#resGestionA"+idBaja).html(data);
 });
}
 }
//Funcion que se utilza para dar de alta bajas por falla
 function agregarBajas(idProd){
 $.post("inc/agregarBajas.php", { idProd: idProd }, function(data){
 $("#tablaConsultarProductosBajas").html(data);
 });
 }
//Funcion que se utiliza para dar de alta cancelaciones
 function addDevolucion(){
    var where=document.getElementById('folioVenta').value;  
    $.post("process/addDevolucion.php", { where: where }, function(data){
  $("#resDev").html(data);
  }); 
  }
  //Funcion que se utiliza para dar de alta devoluciones por falla
  function addDevolucionDF(){
    var where=document.getElementById('txtfolioVentaDF').value;  
    $.post("process/addDevolucionPorFallos.php", { where: where }, function(data){
  $("#resDevDF").html(data);
  }); 
  }
  

  function cantidadDev(posicion,elemento){
  var cantidad=elemento.value;
  $.post("inc/cantidadesDev.php", { cantidad: cantidad,posicion: posicion }, function(data){
  $("#resDevDF").html(data);
  });
  }	  
	  //Evento que muestra la venta en el modal nueva cancelacion

function consultaVenta(){
var folioVenta=document.getElementById('txtfolioVenta').value;
 $.post("inc/consultarVenta.php", { folioVenta: folioVenta }, function(data){
 $("#venta").html(data);
 });
}
//Evento que muestra la venta en el modal devolucion por fallas
function consultaVentaFallo(){
var folioVenta=document.getElementById('txtfolioVentaDF').value;
 $.post("inc/consultarVentaDF.php", { folioVenta: folioVenta }, function(data){
 $("#ventaDF").html(data);
 });
}
  //Evento keyup de busqueda en apartado devoluciones:
  $(document).ready(function(){
$('#inputConsulta').keyup(function(){
 var atributo=document.getElementById('atributoDev').value;    
 var valor=this.value;
 $.post("inc/tablaDev.php", { atributo: atributo, valor: valor }, function(data){
 $("#tablaDevoluciones").html(data);
 });

  });
});   

/*Envio del formulario con Ajax para añadir cliente*/
$(document).ready(function(){
   $('#formBajas').submit(function(e) {
         e.preventDefault();
         var informacion=$('#formBajas').serialize();
         var metodo=$('#formBajas').attr('method');
         var peticion=$('#formBajas').attr('action');
         $.ajax({
            type: metodo,
            url: peticion,
            data:informacion,
            beforeSend: function(){
                $("#addBajas").html('Agregando cliente <br><img src="assets/img/enviando.gif" class="center-all-contens">');
            },
            error: function() {
                $("#addBajas").html("Ha ocurrido un error en el sistema");
            },
            success: function (data) {

                $("#addBajas").html(data);
            }
        });
        return false;
    });

   });

  //Evento keyup de busqueda en apartado ventas realizadas:
  $(document).ready(function(){
$('#inputVenta').keyup(function(){
 var atributo=document.getElementById('atributoVenta').value;    
 var valor=this.value;
 $.post("inc/tablaVen.php", { atributo: atributo, valor: valor }, function(data){
 $("#tablaVentasR").html(data);
 });

  });
});

//Evento del boton detalles en apartado de cancelaciones

$(document).ready(function(){
$('#detallesDev').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  $.post("inc/modalDetallesDev.php", { recipient: recipient }, function(data){
    $("#contenido").html(data);
     });
})
});

//Evento del boton detalles en apartado devoluciones por fallo

$(document).ready(function(){
$('#detallesDevDF').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  $.post("inc/modalDetallesDevDF.php", { recipient: recipient }, function(data){
    $("#contenidoDF").html(data);
     });
})
});

//Evento al abrir modal y generar comprobante:

$(document).ready(function(){
$('#comprobanteVR').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  $.post("inc/vrPdf.php", { recipient: recipient }, function(data){
    $("#vrPDF").html(data);
     });
})
});

//Evento del boton detalles en apartado ventas realizadas

$(document).ready(function(){
$('#bajaAprobada').on('hidden.bs.modal', function (event) {
window.location.href="ventas.php";
})
});

//Evento del boton detalles en apartado ventas realizadas

$(document).ready(function(){
$('#detallesVR').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  $.post("inc/modalDetallesVR.php", { recipient: recipient }, function(data){
    $("#contenidoVR").html(data);
     });
})
});

  </script>
    <style>
        .caja{
            margin: auto;
            max-width: 250px;
            padding: 20px;
            border: 1px solid #BDBDBD;
        }
        .caja select{
            width: 100%;
            font-size: 16px;
            padding: 5px;
        }
        .resultados{
            margin: auto;
            margin-top: 40px;
            width: 1000px;
        }
     
        tr:hover{
        background:#F0E68C;
        }
        .encabezado{
        background:#DAD3BF; 
        }

    </style>  
    <section id="prove-product-cat-config">
        <div class="container">
            <div class="page-header">
              <h1>Ventas</h1>
            </div>
            <br><br>
            <div class="row">
            <!--Menu -->
               
            <ul class="nav nav-tabs" role="tablist">
			  <?php
			  if($_SESSION['acceso']==1){
			  echo '<li role="presentation" class="active"><a class="text-danger" href="#utilidad" role="tab" data-toggle="tab" style="font-size: 17px;">Utilidad por Producto</a></li>
              <li role="presentation"><a class="text-danger" href="#ventasDiarias" role="tab" data-toggle="tab" style="font-size: 17px;">Ventas diarias</a></li>
              ';	  
			 
        }else{
			  echo '
              <li role="presentation" class="active"><a class="text-danger" href="#ventasDiarias" role="tab" data-toggle="tab" style="font-size: 17px;">Ventas diarias</a></li>
			  ';
			  
        }
      
			  ?>
              
              <li role="presentation"><a class="text-danger" href="#ventasRealizadas" role="tab" data-toggle="tab" style="font-size: 17px;">Ventas realizadas</a></li>
              <li role="presentation"><a class="text-danger" href="#Devoluciones" role="tab" data-toggle="tab" style="font-size: 17px;">Cancelacion</a></li>              
            <?php
              if($_SESSION['acceso']<3 ){
                echo '<li role="presentation"><a class="text-danger" href="#devolucionFallas" role="tab" data-toggle="tab" style="font-size: 17px;">Devolucion por fallas</a></li>
                <li role="presentation" ><a class="text-danger" href="#bajaFallas" role="tab" data-toggle="tab" style="font-size: 17px;">Baja por fallas</a></li>
                ';
                 
              }
            ?>
            </ul>
            <div class="tab-content">
            <!--==============================Utilidad por producto===============================-->
			<?php
			 if($_SESSION['acceso']<2){	
            echo '<div role="tabpanel" class="tab-pane fade in active" id="utilidad">';
			 }else{
			 echo '<div role="tabpanel" class="tab-pane fade" id="utilidad">';
			 }
			?>
                <div class="row"> 
				<br><div style="text-align:right;"><a href='utilidades/pdfUtilidades.php' class='btn btn-danger' target='_blank'>Generar PDF &nbsp;&nbsp;<span class="glyphicon glyphicon-print"></span></a></div><br>
              
	      <div class="table-responsive" id="tablaVentasR" style="border: 1px solid #e0e1e1 !important;border-radius: 4px;padding: 10px;">
				
				<?php
				echo "<table class='table table-striped'>
<thead>
<tr>
<th scope='col'>ID Producto</th>
<th scope='col'>Nombre del Producto</th>
<th scope='col'>Cantidad</th>
<th scope='col'>Precio de Compra</th>
<th scope='col'>Precio de Venta</th>
<th scope='col'>Utilidad Unitaria</th>
<th scope='col'>Utilidad Total</th>
<th scope='col'>Sucursal</th>
</tr>
</thead>
<tbody>";// style='text-align:center;'

$conVentas=ejecutarSQL::consultar("SELECT*FROM producto inner join sucursal on producto.idSucursal=sucursal.idSucursal order by nombreProd");
while($ventas=mysqli_fetch_array($conVentas)){
$utilidad=$ventas['precioVenta']-$ventas['precioCosto'];
$utilidadT=$utilidad*$ventas['existencia'];
echo '<tr>
<th scope="row">'.$ventas['idProd'].'</th>
<td>'.$ventas['nombreProd'].'</td>
<td>'.$ventas['existencia'].'</td>
<td> $'.$ventas['precioCosto'].'</td>
<td> $'.$ventas['precioVenta'].'</td>
<td> $'.number_format($utilidad,2).'</td>
<td> $'.number_format($utilidadT,2).'</td>
<td> '.$ventas['nombreSucursal'].'</td>
</tr>';
}
echo "</tbody></table>";
				?>
                </div>
					<br><br>
                <div class="table-responsive" id="tablaVentasR" style="border: 1px solid #e0e1e1 !important;border-radius: 4px;padding: 10px;">
				<?php
				echo "<table class='table table-striped'>
<thead>
<tr>
<th scope='col'>Total Invertido en Producto</th>
<th scope='col'>Utilidad por precio de venta</th>
<th scope='col'>Utilidad NETO</th>
</tr>
</thead>
<tbody>";// style='text-align:center;'

$conVentas=ejecutarSQL::consultar("SELECT * FROM producto");
while($ventas=mysqli_fetch_array($conVentas)){
$inversion=$inversion+($ventas['precioCosto']*$ventas['existencia']);
$utilidad=$utilidad+(($ventas['precioVenta']-$ventas['precioCosto'])*$ventas['existencia']);
$total=$total+($ventas['precioVenta']*$ventas['existencia']);

	}
echo '<tr>
<th scope="row"> $'.number_format($inversion,2).'</th>
<td> $'.number_format($total,2).'</td>
<td> $'.number_format($utilidad,2).'</td>
</tr>';

echo "</tbody></table>";
				?>
                </div>
                </div>				
                </div>
               
              
         <!--==============================Ventas Diarias===============================-->
		<?php		
		 if($_SESSION['acceso']<2){		
         echo '<div role="tabpanel" class="tab-pane fade" id="ventasDiarias">';
		 }else{
		 echo '<div role="tabpanel" class="tab-pane fade in active" id="ventasDiarias">';
		 }
	     ?>
            <div class="row" >
                <div class="col-xs-12 "><br>
                <label>Consultar por</label>&nbsp;&nbsp;&nbsp;
                <div style="width:20%;display:inline-block">
                <select id="atributoVenta" class="form-control">
                <option value="NumFolio">Folio de Venta:</option>
                </select style="display:inline-block"></div>
                &nbsp;&nbsp;&nbsp;<input type="text" id="inputVentaD" class="form-control" style="display:inline-block;width:40%;">
				<br><br>
                <div class="table-responsive" id="tablaVentasR" style="border: 1px solid #e0e1e1 !important;border-radius: 4px;padding: 10px;">
				<?php
				echo "<table class='table table-striped'>
<thead>
<tr>
<th scope='col'>Folio</th>
<th scope='col'>Fecha de venta</th>
<th scope='col'>Tipo de pago</th>
<th scope='col'>Total</th>
<th scope='col'>Vendedor</th>
<th scope='col'>Detalles</th>
</tr>
</thead>
<tbody>";// style='text-align:center;'
$now=date('Y-m-d ',time());
$conVentas=ejecutarSQL::consultar("SELECT*FROM venta_contado inner join usuarios on venta_contado.idVendedor=usuarios.idUsuario where Fecha like '%$now%' order by Fecha desc");
$numV=mysqli_num_rows($conVentas);
if($numV>0){
while($ventas=mysqli_fetch_array($conVentas)){
$user=ejecutarSQL::consultar("SELECT*FROM usuarios where idUsuario=".$ventas['idVendedor']);	
$user=mysqli_fetch_array($user);	
echo '<tr>
<th scope="row">'.$ventas['NumFolio'].'</th>
<td>'.$ventas['Fecha'].'</td>';
if($ventas['tipoPago']==1){
echo '<td>Efectivo</td>';
}else if($ventas['tipoPago']==3){
    echo '<td>Pago con tarjeta</td>';
}else{
    echo '<td>Efectivo</td>';
}
echo '<td>'.$ventas['totalPagar'].'</td>
<td>'.$user['user'].'</td>
<td>
      <a id="detalle" title="detalles" class="btn btn-warning btn-xs"  onclick="generarVR('.$ventas['idVenta'].');">
        <span class="glyphicon glyphicon-list-alt"></span>
      </a>
    </td>
</tr>';
}
echo "</tbody></table>";
}else{
 echo '<td></td><td></td><td></td><td><h4>No se han realizado ventas hoy</h4></td><td></td><td></td>';  
 echo "</tbody></table>"; 
}
				?>
                </div>

                </div>
            </div>
                </div>
                <!--==============================Devoluciones===============================-->
                <div role="tabpanel" class="tab-pane fade" id="Devoluciones">
                    
                <div class="row" >
                <div class="col-xs-12 "><br>
                <label>Consultar por</label>&nbsp;&nbsp;&nbsp;
                <div style="width:20%;display:inline-block">
                <select id="atributoDev" class="form-control">
                <option value="fechaDevolucion">Fecha:</option>
                <option value="folioVenta">Folio de Venta:</option>
                </select style="display:inline-block"></div>&nbsp;&nbsp;&nbsp;<input type="text" id="inputConsulta" class="form-control" style="display:inline-block;width:40%;">
                &nbsp;&nbsp;&nbsp;<div  style="display:inline-block"><button class="btn btn-success" data-toggle="modal" data-target="#nuevaDevolucion"><small><i class="fa fa-plus"></i></small>&nbsp;&nbsp;Nueva cancelacion</button>&nbsp;&nbsp;
				<button class="btn btn-success"><a href="puntoVenta.php" style="color:white;"><i class="fa fa-plus">&nbsp;&nbsp;Vender</a></i></button></div><br>
				<br>
                <div class="table-responsive" id="tablaDevoluciones" style="border: 1px solid #e0e1e1 !important;border-radius: 4px;padding: 10px;">
				<?php
				echo "<table class='table table-striped'>
<thead>
<tr>
<th scope='col'>Venta</th>
<th scope='col'>Fecha de cancelacion</th>
<th scope='col'>Aprueba</th>
<th scope='col'>Detalles</th>
</tr>
</thead>
<tbody>";// style='text-align:center;'

$conDevoluciones=ejecutarSQL::consultar("SELECT*FROM devoluciones where idSucursal=".$_SESSION['sucursal']." order by fechaDevolucion desc limit 100");
while($devoluciones=mysqli_fetch_array($conDevoluciones)){
echo '<tr>
<th scope="row">'.$devoluciones['folioVenta'].'</th>
<td>'.$devoluciones['fechaDevolucion'].'</td>
<td>'.$devoluciones['usuario'].'</td>
<td>
      <a id="detalle" title="detalles" class="btn btn-danger btn-xs"  data-toggle="modal" data-target="#detallesDev" data-whatever="'.$devoluciones['idDevolucion'].'">
        <span class="glyphicon glyphicon-list-alt"></span>
      </a>
    </td>
</tr>';
}
echo "</tbody></table>";
				?>
                </div>

                </div>
            </div>

   </div>         
<!--==============================Panel de Devolucion por Fallas===============================-->
<div role="tabpanel" class="tab-pane fade" id="devolucionFallas">
                    
                    <div class="row" >
                    <div class="col-xs-12 "><br>
                    <label>Consultar por</label>&nbsp;&nbsp;&nbsp;
                    <div style="width:20%;display:inline-block">
                    <select id="atributoDev" class="form-control">
                    <option value="fechaDevolucion">Fecha:</option>
                    <option value="folioVenta">Folio de Venta:</option>
                    </select style="display:inline-block"></div>&nbsp;&nbsp;&nbsp;<input type="text" id="inputConsulta" class="form-control" style="display:inline-block;width:40%;">
                    &nbsp;&nbsp;&nbsp;<div  style="display:inline-block">
                    <button class="btn btn-success" data-toggle="modal" data-target="#mDevFallos"><small><i class="fa fa-plus"></i></small>&nbsp;&nbsp;Nueva devolucion por fallos</button>&nbsp;&nbsp;
           </div><br>
            <br>
                    <div class="table-responsive" id="tablaDevolucionesDF" style="border: 1px solid #e0e1e1 !important;border-radius: 4px;padding: 10px;">
            <?php
            echo "<table class='table table-striped'>
    <thead>
    <tr>
    <th scope='col'>Venta</th>
    <th scope='col'>Fecha de devolucion</th>
    
    <th scope='col'>Reporta</th>
        <th scope='col'>Estado</th>
    <th scope='col'>Detalles</th>";
    if($_SESSION['acceso']==1){
    echo "<th scope='col'>Opciones</th>";
    }
    echo "
    </tr>
    </thead>
    <tbody>";// style='text-align:center;'
    if($_SESSION['acceso']!=1){
    $whereDF="where idSucursalDF=".$_SESSION['sucursal'];
    }
    $conDevoluciones=ejecutarSQL::consultar("SELECT*FROM devoluciones_por_fallas $whereDF order by fechaDevolucionDF desc limit 100");
    while($devoluciones=mysqli_fetch_array($conDevoluciones)){
      $user=ejecutarSQL::consultar("SELECT*FROM usuarios where idUsuario=".$devoluciones['usuarioDF']);	
      $user=mysqli_fetch_array($user);
    echo '<tr>
    <th scope="row">'.$devoluciones['folioVentaDF'].'</th>
    <td>'.$devoluciones['fechaDevolucionDF'].'</td>
    <td>'.$user['Nombre']." ".$user['Apellido'].'</td>
    <td>'.$devoluciones['estadoDF'].'</td>
    <td>
          <a id="detalle" title="detalles" class="btn btn-danger btn-xs"  data-toggle="modal" data-target="#detallesDevDF" data-whatever="'.$devoluciones['idDevolucionFalla'].'">
            <span class="glyphicon glyphicon-list-alt"></span>
          </a>
        </td>';
        if($_SESSION['acceso']==1){
          echo "<td>";
        if($devoluciones['estadoDF']!="Aprobado"){
          echo "<a class='btn btn-success btn-sm' title='Aprobar' data-toggle='modal' data-target='#confirmarADevolucion$devoluciones[idDevolucionFalla]'><i class='fa fa-check'></i></a>&nbsp;";
        }
        if($devoluciones['estadoDF']!="Rechazado"){
          echo "<a class='btn btn-danger btn-sm' title='Rechazar' data-toggle='modal' data-target='#confirmarRDevolucion$devoluciones[idDevolucionFalla]'><i class='fa  fa-times'></i></a>
          </td>";
        }
          } ?>
          
          <!-- Modal devolucionRechazada -->

                              
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="confirmarRDevolucion<?php echo $devoluciones['idDevolucionFalla'];?>">
                               <div class="modal-dialog modal-sm">
                               <div class="modal-content">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
                               <h4 class="modal-title text-center text-primary" id="myModalLabel">¿Desea rechazar esta Devolucion?</h4>
                               </div>
                               <div class="text-center" style="height: 40%">  
                               </div>

                  <div class="modal-footer">
                    <div class="text-center">
                    <button class="btn btn-success btn-sm"  data-dismiss="modal" onclick="gestionarDevolucionPorFalla(<?php echo $devoluciones['idDevolucionFalla'];?>,'Rechazar');" id="botonNo" style="font-size:medium;">Si</button>
                    <button class="btn btn-danger btn-sm"  data-dismiss="modal" id="botonNo" style="font-size:medium;">No</button>
                   <br>
                   </div>                  
                  </div>
                  <div class="" style="width: 100%; text-align: center; margin: 0;" id="resGestionDevR<?php echo $devoluciones['idDevolucionFalla'];?>"></div>
          </div>
      </div>
    </div> <!-- Fin modal devolucionRechazada -->
<!-- Modal devolucionAprobada -->

                              
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="confirmarADevolucion<?php echo $devoluciones['idDevolucionFalla'];?>">
                               <div class="modal-dialog modal-sm">
                               <div class="modal-content">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
                               <h4 class="modal-title text-center text-primary" id="myModalLabel">¿Desea Aprobar esta Devolucion?</h4>
                               </div>
                               <div class="text-center" style="height: 40%">  
                               </div>

                  <div class="modal-footer">
                    <div class="text-center">
                    <button class="btn btn-success btn-sm" data-dismiss="modal" onclick="gestionarDevolucionPorFalla(<?php echo $devoluciones['idDevolucionFalla'];?>,'Aprobar');" style="font-size:medium;" >Si</button>
                    <button class="btn btn-danger btn-sm"  data-dismiss="modal" id="botonNo" style="font-size:medium;">No</button>
                   <br>
                   </div>                  
                  </div>
                  <div class="" style="width: 100%; text-align: center; margin: 0;" id="resGestionDevA<?php echo $devoluciones['idDevolucionFalla'];?>"></div>
          </div>
      </div>
    </div> <!-- Fin modal devolucionAprobada -->
          
          <?php
        echo '</tr>';
    }
    echo "</tbody></table>";
            ?>
                    </div>
    
                    </div>
                </div>
    
       </div>         
                <!--==============================Panel de Bajas de producto por Fallas===============================-->
            <div role="tabpanel" class="tab-pane fade" id="bajaFallas">
            <div class="row" >
                <div class="col-xs-12 "><br>
                <label>Consultar por</label>&nbsp;&nbsp;&nbsp;
                <div style="width:20%;display:inline-block">
                <select id="atributoVenta" class="form-control">
                <option value="fechaBaja">Fecha:</option>
                <option value="codProd">Codigo de producto:</option>
                <option value="codProd">Descripcion de Baja:</option>
                </select style="display:inline-block"></div>
                &nbsp;&nbsp;&nbsp;<input type="text" id="inputVenta2" class="form-control" style="display:inline-block;width:40%;">&nbsp;&nbsp;
                <a class="btn btn-success" data-toggle="modal" data-target="#nuevaBaja"><i class="fa fa-plus"></i>Agregar Baja por Fallas</a>
				<br><br>
                <div class="table-responsive" id="tablaVentasR" style="border: 1px solid #e0e1e1 !important;border-radius: 4px;padding: 10px;">
				<?php
				echo "<table class='table table-striped'>
<thead>
<tr>
<th scope='col'>Codigo</th>
<th scope='col'>Producto</th>
<th scope='col'>Fecha</th>
<th scope='col'>Descripcion</th>
<th scope='col'>Cantidad</th>
<th scope='col'>Registró</th>
<th scope='col'>Estado</th>";
if($_SESSION['acceso']==1){
echo "<th scope='col'>Opciones</th>";
}
echo "</tr>
</thead>
<tbody>";// style='text-align:center;'
					
if($_SESSION['acceso']!=1){
$where="WHERE idSucursalBaja=".$_SESSION['sucursal'];	
}else{
$where="";
}
$conVentas=ejecutarSQL::consultar("SELECT*FROM baja_falla inner join producto on baja_falla.idProd=producto.idProd inner join marca on producto.idMarca=marca.idMarca $where order by fechaBaja desc limit 100");
while($ventas=mysqli_fetch_array($conVentas)){
$user=ejecutarSQL::consultar("SELECT*FROM usuarios where idUsuario=".$ventas['usuarioBaja']);	
$user=mysqli_fetch_array($user);	
echo '<tr>
<th scope="row">'.$ventas['codProd'].'</th>
<td>'.$ventas['nombreProd']." ".$ventas['nombreMarca'].'</td>';
$idBaja=$ventas['idBaja'];
echo '<td>'.$ventas['fechaBaja'].'</td>
<td>'.$ventas['descripcionBaja'].'</td>
<td>'.$ventas['cantidadBaja'].'</td>
<td>'.$user['Nombre']." ".$user['Apellido'].'</td>
<td>'.$ventas['estado'].'</td>';
if($_SESSION['acceso']==1){
  echo "<td>";
if($ventas['estado']!="Aprobado"){
  echo "<a class='btn btn-success btn-sm' title='Aprobar' data-toggle='modal' data-target='#confirmarABaja$ventas[idBaja]'><i class='fa fa-check'></i></a>&nbsp;";
}
if($ventas['estado']!="Rechazado"){
  echo "<a class='btn btn-danger btn-sm' title='Rechazar' data-toggle='modal' data-target='#confirmarRBaja$ventas[idBaja]'><i class='fa  fa-times'></i></a>
  </td>";
  }
}
?>
<!-- Modal bajaRechazada -->

                              
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="confirmarRBaja<?php echo $ventas['idBaja'];?>">
                               <div class="modal-dialog modal-sm">
                               <div class="modal-content">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
                               <h4 class="modal-title text-center text-primary" id="myModalLabel">¿Desea rechazar esta Baja?</h4>
                               </div>
                               <div class="text-center" style="height: 40%">  
                               </div>

                  <div class="modal-footer">
                    <div class="text-center">
                    <button class="btn btn-success btn-sm"  data-dismiss="modal" onclick="gestionarBajasPorFalla('<?php echo $ventas['idBaja'];?>','Rechazar');" id="botonNo" style="font-size:medium;">Si</button>
                    <button class="btn btn-danger btn-sm"  data-dismiss="modal" id="botonNo" style="font-size:medium;">No</button>
                   <br>
                   </div>                  
                  </div>
                  <div class="" style="width: 100%; text-align: center; margin: 0;" id="resGestionR<?php echo $ventas['idBaja'];?>"></div>
          </div>
      </div>
    </div> <!-- Fin modal bajaRechazada -->
<!-- Modal bajaAprobada -->

                              
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="confirmarABaja<?php echo $ventas['idBaja'];?>">
                               <div class="modal-dialog modal-sm">
                               <div class="modal-content">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
                               <h4 class="modal-title text-center text-primary" id="myModalLabel">¿Desea Aprobar esta Baja?</h4>
                               </div>
                               <div class="text-center" style="height: 40%">  
                               </div>

                  <div class="modal-footer">
                    <div class="text-center">
                    <button class="btn btn-success btn-sm" data-dismiss="modal" onclick="gestionarBajasPorFalla('<?php echo $ventas['idBaja'];?>','Aprobar');" style="font-size:medium;" >Si</button>
                    <button class="btn btn-danger btn-sm"  data-dismiss="modal" id="botonNo" style="font-size:medium;">No</button>
                   <br>
                   </div>                  
                  </div>
                  <div class="" style="width: 100%; text-align: center; margin: 0;" id="resGestionA<?php echo $ventas['idBaja'];?>"></div>
          </div>
      </div>
    </div> <!-- Fin modal bajaAprobada -->
<?php
echo '</tr>';
}
echo "</tbody></table>
";
				?>
                </div>

                </div>
            </div>
                </div>                
              <!--==============================Ventas Realizadas===============================-->
              <div role="tabpanel" class="tab-pane fade" id="ventasRealizadas">
            <div class="row" >
                <div class="col-xs-12 "><br>
                <label>Consultar por</label>&nbsp;&nbsp;&nbsp;
                <div style="width:20%;display:inline-block">
                <select id="atributoVenta" class="form-control">
                <option value="Fecha">Fecha:</option>
                <option value="NumFolio">Folio de Venta:</option>
                </select style="display:inline-block"></div>
                &nbsp;&nbsp;&nbsp;<input type="text" id="inputVenta" class="form-control" style="display:inline-block;width:40%;">
				<br><br>
                <div class="table-responsive" id="tablaVentasR" style="border: 1px solid #e0e1e1 !important;border-radius: 4px;padding: 10px;">
				<?php
				echo "<table class='table table-striped'>
<thead>
<tr>
<th scope='col'>Folio</th>
<th scope='col'>Fecha de venta</th>
<th scope='col'>Tipo de pago</th>
<th scope='col'>Total</th>
<th scope='col'>Vendedor</th>
<th scope='col'>Detalles</th>
</tr>
</thead>
<tbody>";// style='text-align:center;'
if($_SESSION['acceso']==1){
$conVentas=ejecutarSQL::consultar("SELECT*FROM venta_contado inner join usuarios on venta_contado.idVendedor=usuarios.idUsuario order by Fecha desc limit 100");
}else{
$conVentas=ejecutarSQL::consultar("SELECT*FROM venta_contado inner join usuarios on venta_contado.idVendedor=usuarios.idUsuario where venta_contado.idSucursal=$_SESSION[sucursal] order by Fecha desc limit 100");

}
while($ventas=mysqli_fetch_array($conVentas)){
echo '<tr>
<th scope="row">'.$ventas['NumFolio'].'</th>
<td>'.$ventas['Fecha'].'</td>';
if($ventas['tipoPago']==1){
echo '<td>Efectivo</td>';
}else if($ventas['tipoPago']==3){
    echo '<td>Pago con tarjeta</td>';
}else{
    echo '<td>Efectivo</td>';
}
echo '<td>'.$ventas['totalPagar'].'</td>
<td>'.$ventas['user'].'</td>
<td>
      <a id="detalle" title="detalles" class="btn btn-warning btn-xs"  onclick="generarVR('.$ventas['idVenta'].');">
        <span class="glyphicon glyphicon-list-alt"></span>
      </a>
    </td>
</tr>';
}
echo "</tbody></table>";
				?>
                </div>

                </div>
            </div>
                </div>

               
			</div>		

            
         
               
    </section>
    <?php include './inc/footer.php'; ?>
</body>
</html>
 <!-- Modal nueva cancelacion-->

                               <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="nuevaDevolucion">
                               <div class="modal-dialog modal-md">
                               <div class="modal-content" id="modal-form-login">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
                               <h4 class="modal-title text-center text-primary" id="myModalLabel">Nueva cancelacion</h4>
                                </div>
                              <form action="process/addDevolucion.php" method="post" role="form" style="margin: 20px;"  id="faddProveedor">
                 
                  <div class="popup">
				 <label>Introduzca folio de venta:</label><br>	  
                  <div class="form-group" style="width:84%;display:inline-block;">
                                    
                                    <input class="form-control" type="text" name="folio-venta" placeholder="Folio de Venta"  required="" id="txtfolioVenta" >
                                </div>&nbsp;&nbsp;&nbsp;<input type="button" class="btn btn-danger btn-sm"  value="Aceptar" onclick="consultaVenta();" id="botonAceptar">
			      <div id="venta"></div>
				  <div class="text-center" id="devolucionBody"></div>
                                
                  </div>                
                 <div class="modal-footer">
					
					 </div>
                  <div class="" style="width: 100%; text-align: center; margin: 0;" id="resDev"></div>
              </form>
          </div>
      </div>
    </div> <!-- Fin modal Devoluciones -->

    <!-- Modal nueva devolucion-->

    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="mDevFallos">
                               <div class="modal-dialog modal-md">
                               <div class="modal-content" id="modal-form-login">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
                               <h4 class="modal-title text-center text-primary" id="myModalLabel">Nueva devolucion por fallos</h4>
                                </div>
                              <form action="process/addDevolucionPorFallos.php" method="post" role="form" style="margin: 20px;"  id="faddDevFallos">
                 
                  <div class="popup">
				 <label>Introduzca folio de venta:</label><br>	  
                  <div class="form-group" style="width:84%;display:inline-block;">
                                    
                                    <input class="form-control" type="text" name="folio-venta" placeholder="Folio de Venta"  required="" id="txtfolioVentaDF" >
                                </div>&nbsp;&nbsp;&nbsp;<input type="button" class="btn btn-danger btn-sm"  value="Aceptar" onclick="consultaVentaFallo();" id="botonAceptar">
			      <div id="ventaDF"></div>
				  <div class="text-center" id="devolucionFalloBody"></div>
                                
                  </div>                
                 <div class="modal-footer">
					
					 </div>
                  <div class="" style="width: 100%; text-align: center; margin: 0;" id="resDevDF"></div>
              </form>
          </div>
      </div>
    </div> <!-- Fin modal Devoluciones Fallos -->


 <!-- Modal nueva devolucions -->

                               <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="detallesDev">
                               <div class="modal-dialog modal-md">
                               <div class="modal-content" id="modal-form-login">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
                               <h4 class="modal-title text-center text-primary" id="myModalLabel">Detalles devolución</h4>
                                </div>
                              <form action="process/addDevolucion.php" method="post" role="form" style="margin: 20px;"  id="faddProveedor">
                 
                  <div class="popup">
				
				  <div class="text-center" id="contenido"></div>
                                
                  </div>                
                 <div class="modal-footer">
                 <div class="text-center">
                 <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Aceptar</button>
					</div> 
					 </div>
                  <div class="" style="width: 100%; text-align: center; margin: 0;" id="detDev"></div>
              </form>
          </div>
      </div>
    </div> <!-- Fin modal nueva devolucion -->
 <!-- Modal error -->

                              
 <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="errorBaja">
                               <div class="modal-dialog modal-sm">
                               <div class="modal-content">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
                               <h4 class="modal-title text-center text-primary" id="myModalLabel">Error</h4>
                               </div>
                               <div class="text-center" style="height: 40%">
                                
                                <img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Ha ocurrido un error, intente nuevamente</p>
                                
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
     <!-- Modal bajaAprobada -->

                              
     <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="bajaAprobada">
                               <div class="modal-dialog modal-sm">
                               <div class="modal-content">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
                               <h4 class="modal-title text-center text-primary" id="myModalLabel">Error</h4>
                               </div>
                               <div class="text-center" style="height: 40%">
                                
                                <img src="assets/img/correcto.png" class="center-all-contens"><br><p class="lead text-center">Actualizacion exitosa</p>
                                
                               </div>

                  <div class="modal-footer">
                    <div class="text-center">
                    <button class="btn btn-danger btn-sm"  data-dismiss="modal" id="botonNo" style="font-size:medium;">Aceptar</button>
                   </div>                  
                  </div>
                  <div class="" style="width: 100%; text-align: center; margin: 0;" id="addVen"></div>
          </div>
      </div>
    </div> <!-- Fin modal bajaAprobada -->
 <!-- Modal nueva Baja -->                              
 <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="nuevaBaja">
                               <div class="modal-dialog modal-lg">
                               <div class="modal-content" id="modal-form-login">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
                               <h4 class="modal-title text-center text-primary" id="myModalLabel">Nueva Baja</h4>
                                </div>
                              
                  <div class="popup">
                 
                  <div class="text-center" style="display:inline-block;padding:2% 4%;width:100%;">
     <input type="text" class="form-control" onkeyup="consultarProd(this);" placeholder="Introduzca nombre del producto, marca, proveedor, codigo o numero de parte:">                                                   
    </div>
    <form action="process/addBajas.php" method="post" id="formBajas">
    <div id="tablaConsultarProductosBajas" style="padding: 0% 4%;">
    </div>
    </form>
                  </div>                
                  <div class="modal-footer">
                  <div class="text-center">
                  <div class="" style="width: 100%; text-align: center; margin: 0;" id="addBajas"></div>
                  </div>
                  </div>
                  
            
          </div>
      </div>
    </div> <!-- Fin modal nueva Baja -->
    
 <!-- Modal nueva devolucions -->

 <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="detallesDevDF">
                               <div class="modal-dialog modal-md">
                               <div class="modal-content" id="modal-form-login">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
                               <h4 class="modal-title text-center text-primary" id="myModalLabel">Detalles devolución por fallo</h4>
                                </div>
                           
                  <div class="popup">
				
				  <div class="text-center" id="contenidoDF"></div>
                                
                  </div>                
                 <div class="modal-footer">
                 <div class="text-center">
                 <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Aceptar</button>
					</div> 
					 </div>
                  <div class="" style="width: 100%; text-align: center; margin: 0;" id="detDev"></div>
            
          </div>
      </div>
    </div> <!-- Fin modal Proveedores -->

    <!-- Modal nueva devolucions -->

                               <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="detallesVR">
                               <div class="modal-dialog modal-md">
                               <div class="modal-content" id="modal-form-login">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
                               <h4 class="modal-title text-center text-primary" id="myModalLabel">Detalles venta realizada</h4>
                                </div>
                           
                 
                  <div class="popup" style="padding:5%;">
				
				  <div class="text-center" id="contenidoVR"></div>
                                
                  </div>                
                 <div class="modal-footer">
                 <div class="text-center">
                 <button type="button" class="btn btn-warning btn-sm" data-dismiss="modal">Aceptar</button>
					</div> 
                     </div>
                  <div class="" style="width: 100%; text-align: center; margin: 0;" id="detDev"></div>
            
          </div>
      </div>
    </div> <!-- Fin modal Proveedores -->                              
    <!-- Modal Comprobante -->
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="comprobanteVR">
                               <div class="modal-dialog modal-md">
                               <div class="modal-content" id="modal-form-login">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
                               <h4 class="modal-title text-center text-primary" id="myModalLabel">Detalles de Venta</h4>
                                </div>
                               <div id="vrPDF"></div>
                 
                  
                  <div class="modal-footer">
                 
                  </div>
                  
       
          </div>
      </div>
    </div> <!-- Fin modal comprobante -->