<?php

include './library/configServer.php';
include './library/consulSQL.php';

$_SESSION['idCot']=0;
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <title>Cotizaciones</title>
    <?php include './inc/link.php'; ?>
</head>
<body id="container-page-index">

  <script language="javascript">
  
  //Filtrado de vehiculos al seleccionar un cliente 
  
  $(document).ready(function(){
        $("#select-cliente").change(function () {
        
          $("#select-cliente option:selected").each(function () {
            idCliente = $(this).val();
            $.post("inc/selectVehiculos.php", { idCliente: idCliente }, function(data){
              $("#select-vehiculos").html(data);
            });            
          });

        })
      });



/*Envio del formulario con Ajax para añadir Venta*/
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
                $("#venta-res").html("Ha ocurrido un error al registrar Venta");
            },
            success: function (data) {
                $("#ventaPopup").modal("toggle");;
            }
        });
        return false;
    });
});

// Evento para visualizar cotizaciones desde el select

 $(document).ready(function(){
        $("#cotizaciones").change(function () {
                              
          $("#cotizaciones option:selected").each(function () {
            id_cot = $(this).val();
            $.post("inc/mostrarCot.php", { id_cot: id_cot }, function(data){
              $("#tabla-cotizacion").html(data);
            });            
          });

        })
      });

//Evento del boton guardar cotizacion

$(document).ready(function(){
$('#agregarCot').click(function(){
 var where="ya llegue";
 $.post("inc/agregarCot.php", { where: where }, function(data){
    $("#carrito-compras-tienda").html(data);
     });

  });
});

function VentanaCentrada(theURL,winName,features, myWidth, myHeight, isCenter) { //v3.0
  if(window.screen)if(isCenter)if(isCenter=="true"){
    var myLeft = (screen.width-myWidth)/2;
    var myTop = (screen.height-myHeight)/2;
    features+=(features!='')?',':'';
    features+=',left='+myLeft+',top='+myTop;
  }
  window.open(theURL,winName,features+((features!='')?',':'')+'width='+myWidth+',height='+myHeight);
}



  </script>
    <?php include './inc/navbar.php'; ?>
    <section id="container-pedido">
        <div class="container">
            <div class="page-header">
              <h1>Ordenes de Taller</h1>
            </div>
            <br><br>
            <div class="row">
            <!--Menu -->
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a class="text-danger" href="#Productos" role="tab" data-toggle="tab" style="font-size: 17px;">Nueva Orden</a></li>
              <li role="presentation"><a class="text-danger" href="#Proveedores" role="tab" data-toggle="tab" style="font-size: 17px;">Consultar Ordenes</a></li>
            </ul>   
                  
         

            <!--==============================Panel Nueva Orden===============================-->
                <div role="tabpanel" class="tab-pane fade in active" id="nuevaOrden">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <br><br>
                        <div id="add-product">
                            <h2 class="text-danger text-center"><small><i class="fa fa-plus"></i></small>&nbsp;&nbsp;Nueva Orden</h2>
                            <form role="form" action="process/regproduct.php" method="post" enctype="multipart/form-data">           
                              
                              <div class="form-group">
                                <label style="font-size: 16px;">Cliente</label>
                                <select class="form-control" name="nombre-cliente" id="select-cliente
                                  <option value="0">Seleccione cliente:</option>
                                    <?php 
                                        $proveedoresc=mysqli_query($con,"SELECT * FROM cliente");
                                        while($provc=mysqli_fetch_array($proveedoresc)){
                                            echo '<option value="'.$provc['idCliente'].'">'.$provc['NombreCompleto'].'</option>';
                                        }
                                    ?>
                                </select>
                              </div>

                              <div class="form-group">                                 
                                 &nbsp<input type="button" class="btn btn-danger" value="Añadir nuevo cliente" data-toggle="modal" data-target="#clientePopup" >
                                 
                                 &nbsp &nbsp<input type="button" class="btn btn-danger" value="Actualizar" id="actualizarP">
                                 </div>

                             
                                <label style="font-size: 16px;">Tipo de Servicio:</label>
                                <input type="text" class="form-control"  placeholder="Tipo Servicio" required maxlength="20" pattern="[0-9]{1,20}" name="servicio">
                              </div>
                              
                              <div class="form-group">
                                <label style="font-size: 16px;">Imagen de producto</label>
                                <input type="file" name="img">
                                <p class="help-block"style="font-size: 16px;">Formato de imagenes admitido png, jpg, gif, jpeg</p>
                              </div>
                                <input type="hidden"  name="admin-name" value="<?php echo $_SESSION['nombreUser'] ?>">
                              <p class="text-center"><button type="submit" class="btn btn-danger">Agregar Orden</button></p>
                              <div id="res-form-add" style="width: 100%; text-align: center; margin: 0;"></div>
                            </form>
                        </div>
                    </div>
                 <!--<div class="col-xs-12 col-sm-6">
                        <br><br>
                        <div id="del-prod-form">
                            <h2 class="text-danger text-center"><small><i class="fa fa-trash-o"></i></small>&nbsp;&nbsp;Eliminar un producto</h2>
                             <form action="process/delprod.php" method="post" role="form">
                                 <div class="form-group">
                                     <label>Productos</label>
                                     <select class="form-control" name="prod-code">
                                         <?php 
                                             $productoc=mysqli_query($con,"SELECT * FROM producto");
                                             while($prodc=mysqli_fetch_array($productoc)){
                                                 echo '<option value="'.$prodc['idProd'].'">'.$prodc['nombreProd'].'</option>';
                                             }
                                         ?>
                                     </select>
                                 </div>
                                 <p class="text-center"><button type="submit" class="btn btn-danger">Eliminar</button></p>
                                 <br>
                                 <div id="res-form-del-prod" style="width: 100%; text-align: center; margin: 0;"></div>
                             </form>
                         </div>
                    </div> -->
                    
                </div>
                </div>

                <!--Fin del panel Nueva orden-->             
               
            </div>
        </div>
    </section>
    <?php include './inc/footer.php'; ?>
</body>
</html>