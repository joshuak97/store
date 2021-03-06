 <?php
    include './library/configServer.php';
    include './library/consulSQL.php';
    include './process/securityPanel.php';
   
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <title>Manage | Store EWS</title>
    <?php include './inc/link.php'; ?>
    <script type="text/javascript" src="js/admin.js"></script>
    <script src="js/push.min.js"></script>
</head>
<body id="container-page-configAdmin">
  <style>
  .valido:focus{
    border-color: green;
    color: green;   
  }
  .invalido:focus{
    border-color: red;
    color: red;   
  }
  </style>
  <script language="javascript">
//Funcion que actualiza la lista de proveedores:
 $(document).ready(function(){
$('#actualizarP').click(function(){
 $.ajax({
 url: 'inc/actualizarProv.php',
 type: 'post',

 success:function(responsedata){
  $('#select-proveedores').html(responsedata);
 }

 });

});
  });
	  
//Agregar productos a la lista desde el modal  
function agregarProducto(idProd){
$.post("inc/agregarProducto.php", { idProd: idProd }, function(data){
$("#tabProds").html(data);
});
$.post("inc/mostrarListaProductos.php", { idProd: idProd }, function(data){
$("#tabProds").html(data);
});
}	  
	  
  function consultarProds(){
     var atributo=document.getElementById("atributo").value;
     var valor= document.getElementById("valorProd").value;
     $.post("inc/tab-prods.php", { atributo: atributo, valor: valor }, function(data){
     $("#body-prods").html(data);
      });
}
//Evento keyup de busqueda en modal ConsultarProductos:
$(document).ready(function(){
$('#txtConsultarProd').keyup(function(){
 var nombreCliente=this.value;
 $.post("inc/tablaConsultarProductos.php", { nombreCliente: nombreCliente }, function(data){
 $("#tablaConsultarProductos").html(data);
 });

  });
}); 	  

//Evento keyup de busqueda en modal ConsultarEntradasProductos:
$(document).ready(function(){
$('#txtConsultarEntradasProd').keyup(function(){
 var valor=this.value;
 $.post("inc/tablaConsultarEntradasProd.php", { valor: valor }, function(data){
 $("#tablaConsultarEntradas").html(data);
 });

  });
});

//Evento keyup de busqueda en modal ConsultarSalidasProductos:
$(document).ready(function(){
$('#txtConsultarSalidasProd').keyup(function(){
 var valor=this.value;
 $.post("inc/tablaConsultarSalidasProd.php", { valor: valor }, function(data){
 $("#tablaConsultarSalidas").html(data);
 });
  });
});

//Metodo que visualiza la lista de productos a??adidos al cerrar el modal agregar productos 
//en el apartado de agregar productos por factura:
$(document).ready(function(){
$("#productosPopup").on("hidden.bs.modal", function () {
   var validar="validar"; 
   $.post("inc/mostrarListaProductos.php", { validar: validar }, function(data){
   $("#tabProd").html(data);
    });
});
});

//Funcion que realiza la busqueda de productos en modal consultar productos:	  
$(document).ready(function(){
$("#consultaClientesPopup").on("hidden.bs.modal", function () {
   var validar="validar"; 
   $.post("inc/mostrarRFC.php", { validar: validar }, function(data){
   $("#data-cliente").html(data);
    });
});
});   

//Funcion para modificar la cantidad de producto en la lista del apartado agregar productos por factura:

function modificarCantidad(posicion,componente){
var cantidad=componente.value;
$.post("inc/modificarCantidad.php", { cantidad: cantidad, posicion: posicion }, function(data){
   $("#data-cliente").html(data);
    });
}

//Funcion que actualiza la lista de proveedores en agregar productos por factura:
function actualizarProveedores(){

 $.ajax({
 url: 'inc/actualizarProvee.php',
 type: 'post',

 success:function(responsedata){
  $('#select-rfc-proveedor').html(responsedata);
 }

 });

}

 //Funcion que actualiza la lista de proveedores:
 $(document).ready(function(){
$('#actualizarP').click(function(){
 $.ajax({
 url: 'inc/actualizarProv.php',
 type: 'post',

 success:function(responsedata){
  $('#select-proveedores').html(responsedata);
 }

 });

});
  });

 
 
    
 //Funcion que actualiza la lista de proveedores:
 $(document).ready(function(){
$('#actualizarCat').click(function(){
 $.ajax({
 url: 'inc/actualizarCat.php',
 type: 'post',

 success:function(responsedata){
  $('#select-categoria').html(responsedata);
 }

 });

});
  });

//Funcion que actualiza la lista de lineas:
$(document).ready(function(){
$('#actualizarL').click(function(){
 $.ajax({
 url: 'inc/actualizarL.php',
 type: 'post',

 success:function(responsedata){
  $('#select-linea').html(responsedata);
 }

 });

});
  });  

 //Funcion que actualiza la lista de notas en select de panel Productos por Factura
function actualizarNotas(){
 $.ajax({
 url: 'inc/actualizarNotas.php',
 type: 'post',

 success:function(responsedata){
  $('#notaCp').html(responsedata);
 }

 });
}
//funcion que actualiza facturas en select de panel Productos por Factura
function actualizarFacturas(){
 $.ajax({
 url: 'inc/actualizarFacturas.php',
 type: 'post',

 success:function(responsedata){
  $('#facturaCp').html(responsedata);
 }

 });
}
//funcion que actualiza productos en select de panel Productos por Factura
function actualizarProductos(){
 $.ajax({
 url: 'inc/actualizarProds.php',
 type: 'post',

 success:function(responsedata){
  $('#prod-cp').html(responsedata);
 }

 });
}

//Evento del boton detalles

$(document).ready(function(){
$('#editarClientePopup').on('show.bs.modal', function (event) {
var button = $(event.relatedTarget) // Button that triggered the modal
var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
 // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
 var modal = $(this)
 $.post("inc/modalEditarClientes.php", { recipient: recipient }, function(data){
 $("#contenidoModalClientes").html(data);
 });
})
});
	  
//Evento del boton editar productos

$(document).ready(function(){
$('#editarProd').on('show.bs.modal', function (event){
var button = $(event.relatedTarget) // Button that triggered the modal
var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
 // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
 var modal = $(this)
 $.post("inc/modalEditarProducto.php", { recipient: recipient }, function(data){
 $("#contenidoEditarProd").html(data);
 });
})
});	  

 function addProductos(){
 var id_producto=document.getElementById('prod-cp').value;
 $.post("inc/listaProductos.php", { id_producto: id_producto }, function(data){
              $("#tabProds").html(data);
            }); 
 
 }
 
  function addSucursales(){
 var id_sucursal=document.getElementById('select-sucursales').value;
 $.post("inc/listaSucursales.php", { id_sucursal: id_sucursal }, function(data){
              $("#tabProd").html(data);
            }); 
 
 }


/*Envio del formulario con Ajax para a??adir cliente*/
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

//Funcion que guarda el id de la cuenta en su respectiva variable de sesion para la consulta en el modal detallesCP
function mostrarDetallesCP(idCuentaP){
$.post("inc/detallesCP1.php", { idCuentaP: idCuentaP }, function(data){
$("#tablaDetallesCP").html(data);
});
}
//Funcion que remplaza el contenido en el modal detallesCP
$(document).ready(function(){
$('#detallesCP').on('show.bs.modal', function (event) {
  $.post("inc/detallesCP.php", function(data){
    $("#tablaDetallesCP").html(data);
     });
})
});

//Evento de formulario de modal productos:  

$(document).ready(function(){
   $('#productosPopup form').submit(function(e) {
         e.preventDefault();
         
         var type=$('#productosPopup form').attr('method');
         var url=$('#productosPopup form').attr('action');
        
        /* Para que PHP reciba todos los archivos hay que definir
             el <input> con corchetes, de modo que aqu?? tenemos que
             indicarlo igual */
        if (this['imgM'].files.length) {
            var data = new FormData(this);
            /* En este caso s?? que hay que cambiar estos par??metros,
                 en particular contentType=false provoca una cabecera HTTP
                 'multipart/form-data; boundary=----...' */
            contentType = false;
            processData = false;
        } else {
            var data = $(this).serialize();
        }
        $.ajax({
            url: url,
            data: data,
            type: type,
            contentType: contentType,
            processData: processData
        }).done(function(data) {
            $("#addProducto").html(data);
        });
        return false;
    });

   });

 function mayus(id){

  id.value=id.value.toUpperCase();  
  
  }
function consultarInventario(){
var atributo=document.getElementById("atributoI").value;
var valor=document.getElementById("valorI").value;
var filtro=document.getElementById("filtroI").value;
var sucursal=document.getElementById("sucursalI").value;
var categoria=document.getElementById("categoriaI").value;

$.post("inc/tablaInventario.php", { atributo:atributo, valor:valor, filtro:filtro, sucursal:sucursal, categoria:categoria}, function(data){
$("#tablaInventario").html(data);
});

}

//Funcion que envia el formulario del  apartado productos por factura:



  $(document).ready(function(){
   $('#Pedidos form').submit(function(e) {
         e.preventDefault();
         var informacion=$('#Pedidos form').serialize();
         var metodo=$('#Pedidos form').attr('method');
         var peticion=$('#Pedidos form').attr('action');
         $.ajax({
            type: metodo,
            url: peticion,
            data:informacion,
            beforeSend: function(){
                $("#addCuentaPagar").html('Agregando nueva entrada <br><img src="assets/img/enviando.gif" class="center-all-contens">');
            },
            error: function() {
                $("#addCuentaPagar").html("Ha ocurrido un error en el sistema");
            },
            success: function (data) {

                $("#addCuentaPagar").html(data);
            }
        });
        return false;
    });

   });

//Funcion que actualiza la lista de marcas:  
 
$(document).ready(function(){
$('#actualizarM').click(function(){
 $.ajax({
 url: 'inc/actualizarMarca.php',
 type: 'post',

 success:function(responsedata){
  $('#select-marcas').html(responsedata);
 }

 });

});
  });
 
//Funcion que actualiza la lista de marcas:  
 
function consultaNombreProve(componente){
var valor=componente.value;
 $.post("inc/consultarProveedor.php", { valor: valor }, function(data){
        $("#nombreProvee").html(data);
        });
        $.post("inc/consultarFacturas.php", { valor: valor }, function(data){
        $("#select-facturas").html(data);
        });       
}


//Funcion que actualiza la lista de carros:
 
$(document).ready(function(){
$('#actualizarC').click(function(){
 $.ajax({
 url: 'inc/actualizarCarro.php',
 type: 'post',

 success:function(responsedata){
  $('#select-carros').html(responsedata);
 }

 });

});
  });

//Funcion que actualiza el select actualizar-modelos:

 $(document).ready(function(){
        $("#actualizar-linea").change(function () {
                              
          $("#actualizar-linea option:selected").each(function () {
            nombre_linea = $(this).val();
            $.post("inc/modelos.php", { nombre_linea: nombre_linea }, function(data){
              $("#actualizar-modelo").html(data);
            });            
          });

        })
      });
//Funcion que realiza el filtrado de las entradas en el apartado productos por factura

function consultarEntradas(){
var atributo=document.getElementById("atributoE").value;
var valor=document.getElementById("valorE").value;
var sucursal=document.getElementById("sucursalE").value;
$.post("inc/tablaConsultarE.php", { atributo: atributo,valor:valor,sucursal:sucursal }, function(data){
$("#tablaConsultarE").html(data);
});   
}

 //funcion que actualiza la tabla Actualizar Modelos

$(document).ready(function(){
$('#actualizar-buscar').click(function(){

  var actualizarLinea = document.getElementById("actualizar-linea").value;
  var actualizarModelo = document.getElementById("actualizar-modelo").value;
  var actualizarAnio = document.getElementById("actualizar-anio").value;
  var actualizarAnio2 = document.getElementById("actualizar-anio2").value;
  var where="";

  if (actualizarAnio2==0 && actualizarAnio!=0) {

  where="WHERE nombreLinea='"+actualizarLinea+"' AND nombreModelo='"+actualizarModelo+"' AND ano="+actualizarAnio;

}else if(actualizarAnio==0 && actualizarAnio2==0){

where="WHERE nombreLinea='"+actualizarLinea+"' AND nombreModelo='"+actualizarModelo+"'";

}else{

  where="WHERE nombreLinea='"+actualizarLinea+"' AND nombreModelo='"+actualizarModelo+"' AND ano>="+actualizarAnio+" AND ano<="+actualizarAnio2;
  }
   $.post("inc/tab-carros.php", { where: where }, function(data){
     $("#body-actualizar").html(data);
      });

  });
});


$(document).ready(function(){
 $("#tipo-compra").change(function () {
 var tipoCompra=$(this).val();
  $.post("inc/tipoCompra.php", { tipoCompra: tipoCompra }, function(data){
     $("#tipoCompra").html(data);
      });
})
});

function eliminarCarro(posicion){

$.post("inc/tablaModelosP.php", { posicion: posicion }, function(data){
$("#listaModelos").html(data);
});
 }
//lista de carros al eliminar modelos en modal a??adir productos
function eliminarCarroM(posicion){

$.post("inc/tablaModelosM.php", { posicion: posicion }, function(data){
$("#listaModelosM").html(data);
});
 } 
//lista de carros al eliminar modelos en modal editar productos
function eliminarCarroP(posicion){

$.post("inc/tablaModelosP.php", { posicion: posicion }, function(data){
$("#listaModelosP").html(data);
});
 } 

function eliminarEquivalencia(idProd){
  
 $.post("inc/tablaAplicaciones.php", { idProd: idProd }, function(data){
 $("#listaAplicaciones").html(data);
 });
 }

function idCliente(valor){
var nombreCliente=valor.value;
   $.post("inc/mostrarClientes.php", { nombreCliente: nombreCliente }, function(data){
              $("#rfc-cp").html(data);
            }); 
}

// a??adir nota:

function addNota(){
var folioNota=document.getElementById('folioNota').value;  
$.post("process/addNota.php", { folioNota: folioNota }, function(data){
 $("#addNota").html(data);
  }); 
}
//A??adir Linea de carro:
function addLinea(){
var folioNota=document.getElementById('nombreL').value;  
$.post("process/addLinea.php", { folioNota: folioNota }, function(data){
 $("#addLinea").html(data);
  }); 
}
// a??adir factura:

function addFactura(){
var numeroFactura=document.getElementById('numeroFactura').value; 
var fechaFactura=document.getElementById('fechaFactura').value;
$.post("process/addFactura.php", { numeroFactura: numeroFactura, fechaFactura: fechaFactura}, function(data){
 $("#addFactura").html(data);
  }); 
}

//Funcion que actualiza el select actualizar-sucursales desde select tipo de sucursal:

 $(document).ready(function(){
        $("#select-tipo-sucursal").change(function () {
                              
          $("#select-tipo-sucursal option:selected").each(function () {
            var idTipoSucursal= $(this).val();
            var idUbicacion=document.getElementById('select-ubicacion').value;
           $.post("inc/selectSucursales.php", { idUbicacion: idUbicacion, idTipoSucursal: idTipoSucursal }, function(data){
           $("#select-sucursales").html(data);
           });            
           
          });

        })
      });

//Funcion que actualiza el select actualizar-sucursales desde select ubicacion:

 $(document).ready(function(){
        $("#select-ubicacion").change(function () {
                              
          $("#select-ubicacion option:selected").each(function () {
            var idTipoSucursal=document.getElementById('select-tipo-sucursal').value; 
            var idUbicacion=$(this).val();
            $.post("inc/selectSucursales.php", { idUbicacion: idUbicacion, idTipoSucursal: idTipoSucursal }, function(data){
           $("#select-sucursales").html(data);
           });            
           
          });

        })
      });

function dateSelect(componente){
var valor=componente.value;
$.post("inc/dataSelect.php", { valor: valor}, function(data){
 $("#date-select").html(data);
  }); 
}
</script>

    <?php include './inc/navbar.php';
     include './process/notificacion.php';
     session_start();
     unset($_SESSION['contador3']);
	unset($_SESSION['cantidad3']);
	
	 unset($_SESSION['contadorEquivalencias']);
     unset($_SESSION['idEquivalencia']);
     unset($_SESSION['listaEquivalencias']);
     unset($_SESSION['contadorNombres']);
     unset($_SESSION['nombreModelo']);
     unset($_SESSION['contadorCarros']);
     unset($_SESSION['listaModelos']);
     unset($_SESSION['listaProd']);
     $_SESSION['idEquivalencia']=0;
     $_SESSION['idProveedor']=0;
     if(!isset($_SESSION['contador3'])){
     $_SESSION['contador3']=0;
     }
    if(!isset($_SESSION['contadorEquivalencias'])){
     $_SESSION['contadorEquivalencias']=0;
     }
     if(!isset($_SESSION['idEquivalencia'])){
        $_SESSION['idEquivalencia']=0;
        } 
    if(!isset($_SESSION['contadorCarros'])){
     $_SESSION['contadorCarros']=0;
     }
     if(!isset($_SESSION['contadorCarrosP'])){
        $_SESSION['contadorCarrosP']=0;
        }
     if(!isset($_SESSION['contadorNombres'])){
     $_SESSION['contadorNombres']=0;
     }
     if(!isset($_SESSION['contadorNombresP'])){
        $_SESSION['contadorNombresP']=0;
        }
     $SESSION['idEquivalencia']=0;
     ?>

     <script type="text/javascript">
      
      var existencias = '<?php echo $existenciasBajas;?>';

  if(existencias=="si"){
  
  Push.create("Favor de revisar existencias",{

  body: "Algunos de sus productos tienen menos de 6 piezas",
  icon: "assets/img/LOGOSA.png",
  timeout: 150000 
  });   

  } 

  function eliminarElemento(idProducto){
  
 $.post("inc/dellista.php", { idProducto: idProducto }, function(data){
 $("#tabProds").html(data);
 });
 }
 
   function eliminarElementoS(id_sucursal){
  
 $.post("inc/dellistaSuc.php", { id_sucursal: id_sucursal }, function(data){
 $("#tabProd").html(data);
 });
 }

//Boton a??adir modelos  
  
$(document).ready(function(){
$('#anadir-modelos').click(function(){
var nombreModelo=document.getElementById('select-carros').value;
var anio=document.getElementById('select-ano').value;
var anio2=document.getElementById('select-ano2').value;
$.post("inc/listaModelos.php", { nombreModelo: nombreModelo, anio: anio, anio2: anio2 }, function(data){
$("#listaModelos").html(data);
});
});
  });

//Boton a??adir modelos en boton a??adir productos 
  
function anadirModelos(){
var nombreModelo=document.getElementById('select-carrosP').value;
var anio=document.getElementById('select-anoP').value;
var anio2=document.getElementById('select-ano2P').value;
$.post("inc/listaModelosP.php", { nombreModelo: nombreModelo, anio: anio, anio2: anio2 }, function(data){
$("#listaModelosP").html(data);
});
}
//Boton a??adir modelos  en modal
  
$(document).ready(function(){
$('#anadir-modelosM').click(function(){
var nombreModelo=document.getElementById('select-carrosM').value;
var anio=document.getElementById('select-anoM').value;
var anio2=document.getElementById('select-ano2M').value;
$.post("inc/listaModelosM.php", { nombreModelo: nombreModelo, anio: anio, anio2: anio2 }, function(data){
$("#listaModelosM").html(data);
});
});
  });

//Boton a??adir equivalencias:

$(document).ready(function(){
$('#anadir-equivalencia').click(function(){
var idProd=document.getElementById('select-equivalencias').value;
$.post("inc/listaAplicaciones.php", { idProd: idProd }, function(data){
$("#equivalencias").html(data);
});
});
  });

//Boton a??adir equivalencias en modal editar productos:

function anadirEquivalencia(){
var idProd=document.getElementById('select-equivalenciasP').value;
$.post("inc/listaAplicaciones.php", { idProd: idProd }, function(data){
$("#equivalenciasP").html(data);
});
}

//Boton a??adir equivalencias:

$(document).ready(function(){
$('#anadir-equivalenciaM').click(function(){
var idProd=document.getElementById('select-equivalenciasM').value;
$.post("inc/listaAplicaciones.php", { idProd: idProd }, function(data){
$("#equivalenciasM").html(data);
});
});
  });  

//Metodo para verificar codigo de producto:

function verificarCodigoProducto(componente){
var codProd=componente.value;
var idSucursal=document.getElementById("sucursalProd").value;
$.post("inc/verificarProd.php", { codProd: codProd,idSucursal: idSucursal }, function(data){
$("#verCodProd").html(data);
});
}
//Metodo para verificar codigo de producto en modal:
function verificarCodigoProductoM(componente){
var codProd=componente.value;
var idSucursal=document.getElementById("sucursalProdM").value;
$.post("inc/verificarProdM.php", { codProd: codProd,idSucursal: idSucursal }, function(data){
$("#verCodProdM").html(data);
});
}
$(document).ready(function(){
$('#buscarProds').click(function(){

  var atributo=document.getElementById("atributo").value;
  var valor= document.getElementById("valorProd").value;
  $.post("inc/tab-prods.php", { atributo: atributo, valor: valor }, function(data){
     $("#body-prods").html(data);
      });

  });
});
     </script>
    <section id="prove-product-cat-config">
        <div class="container">
            <div class="page-header">
 ?? ?? ?? ?? ?? ?? <h1>Panel de administraci??n <small class="tittles-pages-logo">Store EWS
				</small></h1>
            </div>
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#Productos" role="tab" data-toggle="tab">Productos</a></li>
            <li role="presentation"><a href="#Pedidos" role="tab" data-toggle="tab">Productos por Factura</a></li>
              <li role="presentation"><a href="#Proveedores" role="tab" data-toggle="tab">Proveedores</a></li>
              <li role="presentation"><a href="#Categorias" role="tab" data-toggle="tab">Marcas</a></li>
              <li role="presentation"><a href="#Admins" role="tab" data-toggle="tab">Usuarios</a></li>
              <li role="presentation"><a href="#Clientes" role="tab" data-toggle="tab">Clientes</a></li>
              <?php
              if($_SESSION['acceso']==1){
              echo '
              <li role="presentation"><a href="#Inventario" role="tab" data-toggle="tab">Inventario</a></li>
              <li role="presentation"><a href="#Sucursales" role="tab" data-toggle="tab">Sucursales</a></li>
              <li role="presentation"><a href="#Ubicaciones" role="tab" data-toggle="tab">Ubicaciones</a></li>
              <li role="presentation"><a href="#Ajustes" role="tab" data-toggle="tab">Ajustes</a></li>';
             
              }else if($_SESSION['acceso']==2){
               echo '
               <li role="presentation"><a href="#Inventario" role="tab" data-toggle="tab">Inventario</a></li>
               <li role="presentation"><a href="#Ajustes" role="tab" data-toggle="tab">Ajustes</a></li>';
			  }else{
			  }
              ?>
            </ul>

            <?php
            if ($_GET['alert'] == 1) {
                echo "<div class='alert alert-success alert-dismissable'>
                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                        <h4>  <i class='icon fa fa-check-circle'></i> Exito!</h4>
                        El producto ha sido eliminado correctamente.
                      </div>";
              }
            ?>
            <div class="tab-content">
                <!--==============================Panel productos===============================-->
                <div role="tabpanel" class="tab-pane fade in active" id="Productos">
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <br><br>
                        <div id="add-product">
                            <h2 class="text-primary text-center"><small><i class="fa fa-plus"></i></small>&nbsp;&nbsp;Agregar un producto nuevo</h2>
                            <form role="form" action="process/regproduct.php" method="post" enctype="multipart/form-data">
                             <?php 
								if($_SESSION['acceso']==1){  
								?>
								<br>
								 <div class="form-group">
								 <label>Sucursal de producto:</label>
									 <select name="sucursal-prod" id="sucursalProd" class="form-control">
									 <?php
									  $proveedoresc=mysqli_query($con,"SELECT * FROM sucursal inner join ubicacion on sucursal.idUbicacion=ubicacion.idUbicacion where idSucursal!=7 and idSucursal=".$_SESSION['sucursal']);
                                      while($provc=mysqli_fetch_array($proveedoresc)){
                                      echo '<option value="'.$provc['idSucursal'].'">'.$provc['idSucursal']."-".$provc['nombreSucursal']."-".$provc['nombreUbicacion'].'</option>';
                                        }
									$proveedoresc=mysqli_query($con,"SELECT * FROM sucursal inner join ubicacion on sucursal.idUbicacion=ubicacion.idUbicacion where idSucursal!=7 and idSucursal!=".$_SESSION['sucursal']);
                                      while($provc=mysqli_fetch_array($proveedoresc)){
                                      echo '<option value="'.$provc['idSucursal'].'">'.$provc['idSucursal']."-".$provc['nombreSucursal']."-".$provc['nombreUbicacion'].'</option>';
                                        }
								      ?>
									 </select>
                              </div> 
								<?php
								}else{
                                echo "<input type='hidden' id='sucursalProd' name='sucursal-prod' value='".$_SESSION['sucursal']."'>";    
                                }
								?>    
							<div class="form-group">
								 <label>C??digo de producto</label>
                                <input type="text" class="form-control"  placeholder="C??digo" required  name="prod-codigo" id="codProds" onkeyup="verificarCodigoProducto(this);">
                              </div>
                              <div id="verCodProd"></div>
                              <div class="form-group">
                                <label>Nombre de producto</label>
                                <input type="text" class="form-control"  placeholder="Nombre" required  name="prod-name">
                              </div>
                               
                              <div class="form-group">
                                <label>Codigo de SAT:</label>
                                <input type="text" class="form-control"  placeholder="Codigo de SAT" required name="prod-sat">
                              </div>
                              <div class="form-group">
                                <label>Descripci??n de producto</label>
                                <textarea class="form-control"  placeholder="Descripci??n" required name="prod-des" rows="10" cols="40"></textarea>
                              </div>
                              <div class="form-group">
                                <label>Proveedor</label>
                                <select class="form-control" name="prod-prov" id="select-proveedores">
                                    <?php 
                                        $proveedoresc=mysqli_query($con,"SELECT * FROM proveedor order by NombreProveedor asc");
                                        while($provc=mysqli_fetch_array($proveedoresc)){
                                            echo '<option value="'.$provc['idProveedor'].'">'.$provc['NombreProveedor'].'</option>';
                                        }
                                    ?>
                                </select>
                              </div>

                              <div class="form-group">                                 
                                 &nbsp<input type="button" value="A??adir Nuevo Proveedor" data-toggle="modal" data-target="#proveedorPopup" >
                                 
                                 &nbsp &nbsp<input type="button" value="Actualizar" id="actualizarP">
                                 </div>

                              <div class="form-group">
                                <label>Marca del producto</label>
                                <select class="form-control" name="prod-marca" id="select-marcas">
                                
                                    <?php 
                                        $categoriac=mysqli_query($con,"SELECT * FROM marca order by NombreMarca asc");
                                        while($catec=mysqli_fetch_array($categoriac)){
                                            echo '<option value="'.$catec['idMarca'].'">'.$catec['NombreMarca'].'</option>';
                                        }
                                    ?>
                                </select>
                              </div>
                              <div class="form-group">
                                 
                                 &nbsp<input type="button" value="A??adir Nueva Marca" data-toggle="modal" data-target="#marcaPopup">
                                 &nbsp &nbsp <input type="button" value="Actualizar" id="actualizarM">

                               </div>
                              <div class="form-group">
                                <label>Categoria del producto</label>
                                <select class="form-control" name="prod-categoria" id="select-categoria" required>
                                
                                    <?php 
                                        $categoriac=mysqli_query($con,"SELECT * FROM categoria order by descripcionCat asc");
                                        while($catec=mysqli_fetch_array($categoriac)){
                                            echo '<option value="'.$catec['idCategoria'].'">'.$catec['descripcionCat'].'</option>';
                                        }
                                    ?>
                                </select>
                              </div>

                              <div class="form-group">
                                 
                                 &nbsp<input type="button" value="A??adir Nueva Categoria" data-toggle="modal" data-target="#categoriaPopup">
                                 &nbsp &nbsp <input type="button" value="Actualizar" id="actualizarCat">

                               </div> 
                            
                               
                               <div class="form-group">
                                <label>Precio Compra</label>
                                <input type="text" class="form-control"  name="prod-price" placeholder="Precio de Compra" required maxlength="20">                                
                              </div>
                              <div class="form-group">
                                <label>Precio Venta</label>
                                <input type="text" class="form-control"  name="prodv-price" placeholder="Precio de Venta" required maxlength="20">                                
                              </div>
                              <div class="form-group">
                              <input type="checkbox" name="iva-prod" value="iva">&nbsp;&nbsp;Aplicar IVA
                              </div>
 
                                <input type="hidden" value="0" class="form-control"  name="prod-stock">
                        
                              
                              <div class="form-group">
                                <label>Imagen de producto</label>
                                <input type="file" name="img">
                                <p class="help-block">Formato de imagenes admitido png, jpg, gif, jpeg</p>
                              </div>
                                <input type="hidden"  name="admin-name" value="<?php echo $_SESSION['nombreUser'] ?>">
                              <p class="text-center"><button type="submit" class="btn btn-primary">Agregar a la tienda</button></p>
                              <div id="res-form-add" style="width: 100%; text-align: center; margin: 0;"></div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <br><br>
                        <div id="del-prod-form">
                            <h2 class="text-danger text-center"><small><i class="fa fa-trash-o"></i></small>&nbsp;&nbsp;Eliminar un producto</h2>
                             <form action="process/delprod.php" method="post" role="form">
                                 <div class="form-group">
                                     <label>Productos</label>
                                     <select class="form-control" name="prod-code">
                                         <?php 
	                    					if($_SESSION['acceso']!=1){
											$condicion="WHERE idSucursal=".$_SESSION['sucursal'];	
											}else{
											$condicion="";
											}
                                             $productoc=mysqli_query($con,"SELECT * FROM producto $condicion order by nombreProd asc");
									         $numProdDel=mysqli_num_rows($productoc);
									        if($numProdDel>0){
                                             while($prodc=mysqli_fetch_array($productoc)){
                                                 echo '<option value="'.$prodc['idProd'].'">'.$prodc['nombreProd'].'</option>';
                                             }
											}else{
											 echo '<option value="0">No se encontraron productos</option>';
											}	
                                         ?>
                                     </select>
                                 </div>
                                 <p class="text-center"><button type="submit" class="btn btn-danger">Eliminar</button></p>
                                 <br>
                                 <div id="res-form-del-prod" style="width: 100%; text-align: center; margin: 0;"></div>
                             </form>
                         </div>
                    </div>
                    <div class="col-xs-12">
                        <br><br>
                        <div class="panel panel-info">
                            <div class="panel-heading text-center"><i class="fa fa-refresh fa-2x"></i><h3>Actualizar datos de producto</h3>
                            <div class="panel-heading">
                                  <!-- Filtro de la tabla Actualizar Modelos -->

                                <label>Buscar por:</label>&nbsp;&nbsp;
                                <div style="display:inline-block;width:20%;"><select name="actualizar-linea" class="form-control" id="atributo"> <!--Desplegable del atributo -->
  <option value="desProd">Descripcion:</option> 
  <option value="codProd">Codigo de producto:</option>
  <option value="codigoSat">Codigo del SAT:</option>      
  <option value="nombreProd">Nombre de producto:</option>
  <option value="NombreMarca">Marca:</option>
  <option value="NombreProveedor">Proveedor:</option>

</select>
</div>&nbsp;&nbsp;&nbsp;
<div style="display:inline-block;width:20%;">
<input type="text" id="valorProd" class="form-control" onkeyup="consultarProds();"></div>
&nbsp;&nbsp;&nbsp;



                                </div>
                            </div>
                                                       
                            
                          <div class="table-responsive">

                              <table class="table table-bordered">
                                  <thead class="">
                                      <tr>
                                          <th class="text-center">ID</th>
                                          <th class="text-center">C??digo</th>
                                          <th class="text-center">Nombre</th>
                                          <th class="text-center">Marca Producto</th>
                                          <th class="text-center">Proveedor</th>
                                          <th class="text-center">Precio Costo</th>
                                          <th class="text-center">Existencia</th>
                                          <th class="text-center" style="width:10%;">Opciones</th>
                                      </tr>
                                  </thead>
                                  <tbody  style="text-align:center" id="body-prods">
                                     
                                  </tbody>
                              </table>
                          </div>
                        </div>
                    </div>
                </div>
                </div>
				 <!-- Modal consultar productos -->                              
                               <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="conProductosPopup">
                               <div class="modal-dialog modal-lg">
                               <div class="modal-content" id="modal-form-login">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
                               <h4 class="modal-title text-center text-primary" id="myModalLabel">Consultar productos</h4>
                                </div>
                              <form action="process/addProveedor.php" method="post" role="form" style="margin: 20px;" >
                 
                  <div class="popup">
                  <div class="text-center" style="display:inline-block;padding:2% 4%;width:100%;">
     <input type="text" class="form-control" id="txtConsultarProd" placeholder="Introduzca nombre del producto, marca, proveedor, codigo o numero de parte:">                                                   
    </div>
    <div id="tablaConsultarProductos" class="table-responsive" style="padding: 0% 4%;">
    </div>
                  </div>                
                  <div class="modal-footer">
                  <div class="text-center">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Salir</button>
                  </div>
                  </div>
                  <div class="" style="width: 100%; text-align: center; margin: 0;" id="addProveedor"></div>
              </form>
          </div>
      </div>
    </div> <!-- Fin modal consulta Productos -->
    <!-- Modal a??adir linea -->

                              
                              <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="lineaPopup">
                               <div class="modal-dialog modal-md">
                               <div class="modal-content" id="modal-form-login">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
                               <h4 class="modal-title text-center text-primary" id="myModalLabel">Nueva Linea</h4>
                                </div>
                                                 
                  <div style="padding:3%;">
                  <div class="form-group">
                  <label>Nombre de linea:</label>
                  <input type="text" placeholder="Nombre Linea" class="form-control" id="nombreL">
                  </div>
                  </div>                
                  <div class="modal-footer">
                   <div class="text-center">
                   <button onclick="addLinea();" class="btn btn-primary btn-sm">Agregar linea</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                   </div>
                  </div>
                  <div class="" style="width: 100%; text-align: center; margin: 0;" id="addLinea"></div>
            
          </div>
      </div>
    </div> <!-- Fin modal Proveedores -->
                 <!-- Modal agregar nuevo Proveedor -->

                              
                               <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="proveedorPopup">
                               <div class="modal-dialog modal-sm">
                               <div class="modal-content" id="modal-form-login">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
                               <h4 class="modal-title text-center text-primary" id="myModalLabel">Agregar Nuevo Proveedor</h4>
                                </div>
                              <form action="process/addProveedor.php" method="post" role="form" style="margin: 20px;"  id="faddProveedor">
                 
                  <div class="popup">
                  <div class="form-group">
                                    <label>Nombre</label>
                                    <input class="form-control" type="text" name="name-proveedor" placeholder="Nombre proveedor"  required="">
                                </div>
                                <div class="form-group">
                                    <label>RFC</label>
                                    <input class="form-control" type="text" name="rfc-proveedor" placeholder="RFC proveedor" required="">
                                </div>                                
                                <div class="form-group">
                                    <label>Direcci??n</label>
                                    <input class="form-control" type="text" name="dir-proveedor" placeholder="Direcci??n proveedor" required="">
                                </div>
                                <div class="form-group">
                                    <label>Correo</label>
                                    <input class="form-control" type="text" name="correo-proveedor" placeholder="Correo Electr??nico" required="">
                                </div>
                                <div class="form-group">
                                    <label>Tel??fono</label>
                                    <input class="form-control" type="number" name="tel-proveedor" placeholder="N??mero telef??nico" pattern="[0-9]{1,20}" maxlength="20" required="">
                                </div>
                                <div class="form-group">
                                    <label>P??gina web</label>
                                    <input class="form-control" type="text" name="web-proveedor" placeholder="P??gina web proveedor" required="">
                                </div>
                  </div>                
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Agregar Proveedor</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                  </div>
                  <div class="" style="width: 100%; text-align: center; margin: 0;" id="addProveedor"></div>
              </form>
          </div>
      </div>
    </div> <!-- Fin modal Proveedores -->
 <!-- Modal agregar nueva nota -->

                              
                               <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="notaPopup">
                               <div class="modal-dialog modal-sm">
                               <div class="modal-content" id="modal-form-login">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
                               <h4 class="modal-title text-center text-primary" id="myModalLabel">Agregar nueva nota</h4>
                                </div>
                              <form action="process/addNota.php" method="post" role="form" style="margin: 20px;"  id="faddNota">
                 
                  <div class="popup">
                  <div class="form-group">
                  <label>Folio de nota:</label>
                  <input class="form-control" type="text" id="folioNota">
                  </div>
                  </div>             
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm" onclick="addNota();">Agregar Nota</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                  </div>
                  <div class="" style="width: 100%; text-align: center; margin: 0;" id="addNota"></div>
              </form>
          </div>
      </div>
    </div> <!-- Fin modal notas -->	
     <!-- Modal agregar nueva factura -->

                              
                              <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="facturaPopup">
                               <div class="modal-dialog modal-sm">
                               <div class="modal-content" id="modal-form-login">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
                               <h4 class="modal-title text-center text-primary" id="myModalLabel">Agregar nueva factura</h4>
                                </div>
                              <form action="process/addfactura.php" method="post" role="form" style="margin: 20px;"  id="faddfactura">
                 
                  <div class="popup">
                  <div class="form-group">
                                    <label>Numero de Factura:</label>
                                    <input class="form-control" type="text" id="numeroFactura" name="folio-factura" placeholder="Numero Factura"  required="">
                                </div>
                                <div class="form-group">
                                <label>Fecha de emisi??n:</label>
                                    <input class="form-control" type="date" id="fechaFactura" name="folio-nota" placeholder="Folio Nota"  required="">                                      
                  </div> 
			  	  
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm" onclick="addFactura();">Agregar factura</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                  </div>
                  <div class="" style="width: 100%; text-align: center; margin: 0;" id="addFactura"></div>
								  </div>
					  </form>
								  
          </div>
      </div>
    </div> <!-- Fin modal Proveedores -->				
   
    <!-- Modal agregar nueva categoria -->

                              
                               <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="categoriaPopup">
                               <div class="modal-dialog modal-sm">
                               <div class="modal-content" id="modal-form-login">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
                               <h4 class="modal-title text-center text-primary" id="myModalLabel">Agregar nueva categoria</h4>
                                </div>
                              <form action="process/addCategoria.php" method="post" role="form" style="margin: 20px;"  id="faddCategoria">
                 
                  
                                 <div class="form-group">
                                    <label>Nombre</label>
                                    <input class="form-control" type="text" name="name-categoria" placeholder="Nombre categoria"  required="">
                                </div>
                               
                                 
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Agregar Categoria</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                  </div>
                  <div class="" style="width: 100%; text-align: center; margin: 0;" id="addCategoria"></div>
              </form>
          </div>
      </div>
    </div> <!-- Fin modal Agregar Categoria -->

     <!-- Modal agregar nueva equivalencia -->
                             
                                    <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="equivalenciaPopup">
                                    <div class="modal-dialog modal-sm">
                                    <div class="modal-content" id="modal-form-login">
                                    <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
                                    <h4 class="modal-title text-center text-primary" id="myModalLabel">Agregar nueva equivalencia</h4>
                                        </div>
                                    <form action="process/addEquivalencia.php" method="post" role="form" style="margin: 20px;"  id="faddEquivalencia">
                        
                        
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input class="form-control" type="text" name="name-equivalencia" placeholder="Nombre Equivalencia"  required="">
                                        </div>
                               
                                 
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Agregar Equivalencia</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                  </div>
                  <div class="" style="width: 100%; text-align: center; margin: 0;" id="addEquivalencia"></div>
              </form>
          </div>
      </div>
    </div> <!-- Fin modal Agregar nueva equivalencia -->

     <!-- Modal agregar nueva Marca -->

                              
                               <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="marcaPopup">
                               <div class="modal-dialog modal-sm">
                               <div class="modal-content" id="modal-form-login">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                               <h4 class="modal-title text-center text-primary" id="myModalLabel">Agregar Nueva Marca</h4>
                                </div>
                              <form action="process/addMarca.php" method="post" role="form" style="margin: 20px;"  id="faddMarca">
                 
                  <div class="popup">
                  <div class="form-group">
                                        <label>C??digo</label>
                                        <input class="form-control" type="text" name="marca-codigo" placeholder="C??digo de Marca" maxlength="9" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input class="form-control" type="text" name="marca-nombre" placeholder="Nombre de Marca" maxlength="30" required="">
                                    </div>
                  </div>                
                  <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm">Agregar Marca</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                  </div>
                  <div class="" style="width: 100%; text-align: center; margin: 0;" id="addMarca"></div>
              </form>
          </div>
      </div>
    </div> <!-- Fin modal marcas -->

    

     
    

                <!--==============================Panel Proveedores===============================-->
                <div role="tabpanel" class="tab-pane fade" id="Proveedores">
                    <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <br><br>
                        <div id="add-provee">
                            <h2 class="text-primary text-center"><small><i class="fa fa-plus"></i></small>&nbsp;&nbsp;Agregar un proveedor</h2>
                            <form action="process/regprove.php" method="post" role="form">

                                <div class="form-group">
                                    <label>Nombre</label>
                                    <input class="form-control" type="text" name="prove-name" placeholder="Nombre proveedor" required="">
                                </div>
                                <div class="form-group">
                                    <label>RFC</label>
                                    <input class="form-control" type="text" name="prove-rfc" placeholder="RFC proveedor" required="">
                                </div>
                                <div class="form-group">
                                    <label>Direcci??n</label>
                                    <input class="form-control" type="text" name="prove-dir" placeholder="Direcci??n proveedor" required="">
                                </div>
                                <div class="form-group">
                                    <label>Correo</label>
                                    <input class="form-control" type="text" name="prove-correo" placeholder="Correo Electr??nico"  maxlength="50" required="">
                                </div>
                                <div class="form-group">
                                    <label>Tel??fono</label>
                                    <input class="form-control" type="number" name="prove-tel" placeholder="N??mero telef??nico" pattern="[0-9]{1,20}" maxlength="20" required="">
                                </div>
                                <div class="form-group">
                                    <label>P??gina web</label>
                                    <input class="form-control" type="text" name="prove-web" placeholder="P??gina web proveedor" required="">
                                </div>
                                <p class="text-center"><button type="submit" class="btn btn-primary">A??adir proveedor</button></p>
                                <br>
                                <div id="res-form-add-prove" style="width: 100%; text-align: center; margin: 0;"></div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <br><br>
                        <div id="del-prove">
                            <h2 class="text-danger text-center"><small><i class="fa fa-trash-o"></i></small>&nbsp;&nbsp;Eliminar un proveedor</h2>
                            <form action="process/delprove.php" method="post" role="form">
                                <div class="form-group">
                                    <label>Proveedores</label>
                                    <select class="form-control" name="nit-prove">
                                        <?php 
                                            $proveNIT=mysqli_query($con,"SELECT * FROM proveedor order by NombreProveedor asc");
                                            while($PN=mysqli_fetch_array($proveNIT)){
                                                echo '<option value="'.$PN['idProveedor'].'">'.$PN['idProveedor'].' - '.$PN['NombreProveedor'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <p class="text-center"><button type="submit" class="btn btn-danger">Eliminar proveedor</button></p>
                                <br>
                                <div id="res-form-del-prove" style="width: 100%; text-align: center; margin: 0;"></div>
                            </form>
                        </div>    
                    </div>
                    <div class="col-xs-12">
                        <br><br>
                        <div class="panel panel-info">
                            <div class="panel-heading text-center"><i class="fa fa-refresh fa-2x"></i><h3>Actualizar datos de proveedor</h3></div>
                              <div class="table-responsive">
                              <table class="table table-bordered">
                                  <thead class="">
                                      <tr>
                                          <th class="text-center">ID</th>
                                          <th class="text-center">Nombre</th>
                                          <th class="text-center">RFC</th>
                                          <th class="text-center">Direcci??n</th>
                                          <th class="text-center">Telefono</th>
                                          <th class="text-center">Correo</th>
                                          <th class="text-center">P??gina web</th>
                                          <th class="text-center">Opciones</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                              $proveedores=mysqli_query($con,"SELECT * FROM proveedor order by NombreProveedor asc");
                                              $up=1;
                                              while($prov=mysqli_fetch_array($proveedores)){
                                                  echo '
                                                      <div id="update-proveedor">
                                                        <form method="post" action="process/updateProveedor.php" id="res-update-prove-'.$up.'">
                                                          <tr>
                                                              <td>
                                                                <input class="form-control" name="id" required="" value="'.$prov['idProveedor'].'" readonly>
                                                                </td>
                                                              <td><input class="form-control" type="text" name="prove-name" required="" value="'.$prov['NombreProveedor'].'"></td>
                                                              <td><input class="form-control" type="text-area" name="prove-rfc" required="" value="'.$prov['RFC'].'"></td>
                                                              <td><input class="form-control" type="text-area" name="prove-dir" required="" value="'.$prov['Direccion'].'"></td>
                                                              <td><input class="form-control" type="tel" name="prove-tel" required="" value="'.$prov['Telefono'].'"></td>
                                                              <td><input class="form-control" type="text-area" name="prove-correo"  required="" value="'.$prov['correo'].'"></td>
                                                              <td><input class="form-control" type="text-area" name="prove-web" required="" value="'.$prov['PaginaWeb'].'"></td>
                                                              <td class="text-center">
                                                                  <button type="submit" class="btn btn-sm btn-primary button-UP" value="res-update-prove-'.$up.'">Actualizar</button>
                                                                  <div id="res-update-prove-'.$up.'" style="width: 100%; margin:0px; padding:0px;"></div>
                                                              </td>
                                                          </tr>
                                                        </form>
                                                      </div>
                                                      ';
                                                  $up=$up+1;
                                              }
                                            ?>
                                  </tbody>
                              </table>
                          </div>
                        </div>
                    </div>
                </div>
                </div>
                <!--==============================Panel Marcas===============================-->
                <div role="tabpanel" class="tab-pane fade" id="Categorias">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <br><br>
                            <div id="add-categori">
                                <h2 class="text-info text-center"><small><i class="fa fa-plus"></i></small>&nbsp;&nbsp;Agregar Marcas</h2>
                                <form action="process/regcategori.php" method="post" role="form">
                                    <div class="form-group">
                                        <label>C??digo</label>
                                        <input class="form-control" type="text" name="marca-code" placeholder="C??digo de Marca" maxlength="9" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Nombre</label>
                                        <input class="form-control" type="text" name="marca-name" placeholder="Nombre de Marca" maxlength="30" required="">
                                    </div>
                                    <p class="text-center"><button type="submit" class="btn btn-primary">Agregar Marca</button></p>
                                    <br>
                                    <div id="res-form-add-categori" style="width: 100%; text-align: center; margin: 0;"></div>
                                </form>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <br><br>
                            <div id="del-categori">
                                <h2 class="text-danger text-center"><small><i class="fa fa-trash-o"></i></small>&nbsp;&nbsp;Eliminar una Marca</h2>
                                <form action="process/delcategori.php" method="post" role="form">
                                    <div class="form-group">
                                        <label>Marcas</label>
                                        <select class="form-control" name="categ-code">

                                            <?php 
                                                $categoriav=  ejecutarSQL::consultar("SELECT * FROM marca where idMarca!=1 order by NombreMarca asc");
                                                while($categv=mysqli_fetch_array($categoriav)){
                                                    echo '<option value="'.$categv['idMarca'].'"">'.$categv['idMarca'].' - '.$categv['NombreMarca'].'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <p class="text-center"><button type="submit" class="btn btn-danger">Eliminar Marca</button></p>
                                    <br>
                                    <div id="res-form-del-cat" style="width: 100%; text-align: center; margin: 0;"></div>
                                </form>
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <br><br>
                            <div class="panel panel-info">
                                <div class="panel-heading text-center"><i class="fa fa-refresh fa-2x"></i><h3>Actualizar Marca</h3></div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="">
                                            <tr>
                                                <th class="text-center">ID</th>
                                                <th class="text-center">C??digo Marca</th>
                                                <th class="text-center">Nombre Marca</th>
                                                <th class="text-center">Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                              $categorias=  ejecutarSQL::consultar("SELECT * FROM marca order by NombreMarca asc");
                                              $ui=1;
                                              while($cate=mysqli_fetch_array($categorias)){
                                                  echo '
                                                      <div id="update-category">
                                                        <form method="post" action="process/updateCategory.php" id="res-update-category-'.$ui.'">
                                                          <tr>
                                                              <td>
                                                                <input class="form-control" name="id" maxlength="9" required="" value="'.$cate['idMarca'].'" readonly>
                                                             </td>
                                                             <td><input class="form-control" type="text" name="marca-code" maxlength="9" required="" value="'.$cate['CodigoMarca'].'"></td>
                                                              <td><input class="form-control" type="text" name="marca-name" maxlength="30" required="" value="'.$cate['NombreMarca'].'"></td>
                                                             <td class="text-center">
                                                                  <button type="submit" class="btn btn-sm btn-primary button-UC" value="res-update-category-'.$ui.'">Actualizar</button>
                                                                  <div id="res-update-category-'.$ui.'" style="width: 100%; margin:0px; padding:0px;"></div>
                                                              </td>
                                                          </tr>
                                                        </form>
                                                      </div>
                                                      ';
                                                  $ui=$ui+1;
                                              }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
<!--==============================Panel Inventario===============================-->
<div role="tabpanel" class="tab-pane fade" id="Inventario">
                    <div class="row">
                        <div class="col-xs-12">
                        
                            <br><br>
                            <div class="panel panel-info">
                                <div class="panel-heading text-center"><i class="fa fa-search fa-2x"></i><h3>Consultar Inventario</h3></div>
                                <div class="col-md-2 panel-heading">
                                <select class="form-control" id="atributoI" onchange="consultarInventario();">
                                <option value="desProd">Descripcion:</option>
                                <option value="desProd"> Codigo de producto:</option>
                                <option value="NombreMarca"> Marca:</option>
                                <option value="nombreSucursal"> Sucursal:</option>
                                </select>
                                </div> 
                                <div class="col-md-2 panel-heading"><input class="form-control" id="valorI" onkeyup="consultarInventario();"></div> 
                                
                                <div class="col-md-2 panel-heading"> 
                                <select class="form-control" id="sucursalI" onchange="consultarInventario();">
                                <?php
                                if($_SESSION['acceso']!=1){
                                ?>
                                 <option value="<?php echo $_SESSION['sucursal'];?>" >Mi sucursal</option>
                                <?php
                                }else{
                                ?>
                                <option value="0">Todas las sucursales</option>
                                <?php
                                $conSucursal=mysqli_query($con,"SELECT*FROM sucursal inner join ubicacion on sucursal.idUbicacion=ubicacion.idUbicacion where idSucursal!=7");	
                                while($sucur=mysqli_fetch_array($conSucursal)){
                                echo "<option value=".$sucur['idSucursal'].">".$sucur['nombreSucursal']."-".$sucur['nombreUbicacion']."</option>";    
                                }
                                }
                                ?>
                                </select>
                                </div>
                                <div class="col-md-2 panel-heading"> 
                                <select class="form-control" id="categoriaI" onchange="consultarInventario();">
                                <option value="0">Categoria:</option>
                                <?php 
                                $conSucursal=mysqli_query($con,"SELECT*FROM categoria");	
                                while($sucur=mysqli_fetch_array($conSucursal)){
                                echo "<option value=".$sucur['idCategoria'].">".$sucur['descripcionCat']."</option>";    
                                }
                                ?>
                                </select>
                                </div>
                                <div class="col-md-2 panel-heading"> 
                                <select class="form-control" id="filtroI" onchange="consultarInventario();">
                                <option value="0">Todo</option>
                                <option value="1">Da??ado</option>
                                </select>
                                </div>
                                <div class="col-md-2 panel-heading" style="text-align:center;"> 
                                <a class="btn btn-md btn-danger" target="_blank" href="productos/pdfProductos.php"><i class="fa fa-print"></i>Imprimir</a>
                                </div>
                                <div class="table-responsive" id="tablaInventario">
                                
                                    <table class="table table-bordered" style="text-align:center">
                                        <thead class="">
                                            <tr>
                                                <th class="text-center">ID</th>
                                                <th class="text-center">Codigo</th>
                                                <th class="text-center">Producto</th>
                                                <th class="text-center">Costo</th>
                                                <th class="text-center">Precio de venta</th>
                                                <th class="text-center">Existencia</th>
                                                <th class="text-center">Da??ado</th>
                                                <?php
                                                if($_SESSION['acceso']==1){
                                                ?>
                                                <th class="text-center">sucursal</th>
                                                <?php
                                                }
                                                ?>   
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            
                                           

                                            if($_SESSION['acceso']==1){
                                                $_SESSION['todo']=true;
                                                $_SESSION['sucursalInventario']=0;
                                              $categorias=  ejecutarSQL::consultar("SELECT * FROM producto inner join marca on producto.idMarca=marca.idMarca inner join sucursal on producto.idSucursal=sucursal.idSucursal inner join ubicacion on sucursal.idUbicacion=ubicacion.idUbicacion order by idProd asc limit 100");
                                            //Esta variable almacena el filtrado del inventario 
                                              $_SESSION['consultaInventario']="SELECT * FROM producto inner join marca on producto.idMarca=marca.idMarca";
                                            //Para generar pdf, NO BORRAR.
                                            $_SESSION['complemento']="order by idProd asc";
                                                $_SESSION['condiciones']="";
                                            }else{
                                            $_SESSION['sucursalInventario']=$_SESSION['sucursal'];
                                            $categorias=  ejecutarSQL::consultar("SELECT * FROM producto inner join marca on producto.idMarca=marca.idMarca where idSucursal=$_SESSION[sucursal] order by idProd asc limit 100");
                                            $_SESSION['consultaInventario']="SELECT * FROM producto inner join marca on producto.idMarca=marca.idMarca";//Esta variable almacena el filtrado del inventario 
                                            $_SESSION['complemento']="order by idProd asc";
                                            $_SESSION['condiciones']="where idSucursal=$_SESSION[sucursal]";
                                            //Para generar pdf, NO BORRAR.   
                                            }
                                              $ui=1;
                                              while($cate=mysqli_fetch_array($categorias)){
                                                  echo '
                                                      <div id="update-category">
                                                       <tr>
                                                       <td>'.$ui.'</td>
                                                       <td>'.$cate['codProd'].'</td>
                                                       <td>'.$cate['nombreProd']." ".$cate['NombreMarca'].'</td>
                                                       <td>$'.$cate['precioCosto'].'</td> 
                                                       <td>$'.$cate['precioVenta'].'</td>
                                                       <td>'.$cate['existencia'].'</td> 
                                                       <td>'.$cate['stockDanado'].'</td>';     
                                                       
                                                if($_SESSION['acceso']==1){
                                               
                                                echo '<td>'.$cate['nombreSucursal']." ".$cate['nombreUbicacion'].'</td>';
                                               
                                                }
                                               
                                                       echo '</tr>
                                                    
                                                      </div>
                                                      ';
                                                  $ui=$ui+1;
                                              }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
                <!--==============================Panel Admins===============================-->
                <div role="tabpanel" class="tab-pane fade" id="Admins">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <br><br>
                            <div id="add-admin">
                                <h2 class="text-info text-center"><small><i class="fa fa-plus"></i></small>&nbsp;&nbsp;Agregar Usuarios:</h2>
                                <form action="process/regAdmin.php" method="post" role="form">
                                    <div class="form-group">
                                        <label>Nombre de usuario:</label>
                                        <input class="form-control" type="text" name="admin-name" placeholder="Nombre" maxlength="21" required="">
                                    </div>
                                     <div class="form-group">
                                        <label>Contrase??a</label>
                                        <input class="form-control" type="password" name="admin-pass" placeholder="Contrase??a" required="">
                                    </div>
                                    <div class="form-group">
                                        <label>Nombre:</label>
                                        <input class="form-control" type="text" name="admin-nombre" placeholder="Nombre(s)" required="">
                                    </div>
                                     <div class="form-group">
                                        <label>Apellido</label>
                                        <input class="form-control" type="text" name="admin-apellido" placeholder="Apellidos" required="">
                                    </div>
                                     <div class="form-group">
                                        <label>Direccion</label>
                                        <input class="form-control" type="text" name="admin-direccion" placeholder="Direccion" required="">
                                    </div>
                                     <div class="form-group">
                                        <label>Correo electronico:</label>
                                        <input class="form-control" type="text" name="admin-telefono" placeholder="Correo electronico" required="">
                                    </div>
                                     <div class="form-group">
                                        <label>Acceso:</label>
                                      <?php
                                        if($_SESSION['acceso']==1){
                                        echo '<select class="form-control" type="text" name="admin-acceso" required="">
                                        <option value="0">Seleccione tipo de usuario</option>
                                        <option value="2">Administrador</option>
                                        <option value="3">Vendedor</option>
                                    
										 </select>';
                                         
                                      }else{
                                        echo '<select class="form-control" type="text" name="admin-acceso" required="">
                                        <option value="0">Seleccione tipo de usuario</option>
                                        <option value="3">Vendedor</option>
										 </select>';
                                        
                                      }
                                        ?>
                                       
                                    </div>
                                     <div class="form-group">
                                      <label>Tipo de Sucursal:</label>
                                      <select name="admin-tipo-suc" class="form-control" id="select-tipo-sucursal">
                                        <?php
										if($_SESSION['acceso']==1){  
										echo '<option value="0">Seleccione tipo de sucursal:</option>
                                        <option value="1">Matriz</option>
                                        <option value="2">Sucursal</option>';
										}else{
										$conSucursal=mysqli_query($con,"SELECT*FROM sucursal where idSucursal=".$_SESSION['sucursal']);	
										$sucur=mysqli_fetch_array($conSucursal);
										if($sucur['idTipoSucursal']==1){	
										echo '
										<option value="1">Matriz</option>
                                        ';
										}else{
										echo '<option value="2">Sucursal</option>';
										}
										}
											?>
                                      </select> 
                                     </div>
                                      <div class="form-group">
                                      <label>Ubicacion:</label>
                                      <select name="admin-ubic" class="form-control" id="select-ubicacion">
                                        <option value="0">Seleccione ubicacion:</option>
                                        <?php 
										if($_SESSION['acceso']==1){   
                                        $conubicaciones=mysqli_query($con,"SELECT*FROM ubicacion order by nombreUbicacion asc");
                                        while ($conUbic=mysqli_fetch_array($conubicaciones)) {
                                        echo "<option value='".$conUbic['idUbicacion']."'>".$conUbic['nombreUbicacion']."</option>";
                                        }
										}else{
										$conSucursal=mysqli_query($con,"SELECT*FROM sucursal where idSucursal=".$_SESSION['sucursal']);	
										$sucur=mysqli_fetch_array($conSucursal);	
										 $conubicaciones=mysqli_query($con,"SELECT*FROM ubicacion where idUbicacion=".$sucur['idUbicacion']);
                                        while ($conUbic=mysqli_fetch_array($conubicaciones)) {
                                        echo "<option value='".$conUbic['idUbicacion']."'>".$conUbic['nombreUbicacion']."</option>";
                                        }	
										}	
                                        ?>
                                      </select> 
                                     </div>
                                     <div class="form-group">
                                      <label>Sucursal:</label>
                                      <select name="admin-suc" class="form-control" id="select-sucursales">
                                        <option value="0">Seleccione sucursal:</option>
                                      
                                      <?php
                                     //echo '<input type="button" class="btn btn-primary" value="Agregar" onclick="addSucursales();"></div>';
                                     //echo '<div  id="tabProd" class="form-group"></div>';
                                      ?>
                                     
                                     </select><br></div>
                                    <p class="text-center"><button type="submit" class="btn btn-primary">Agregar Usuario</button></p>
                                    <br>
                                    <div id="res-form-add-admin" style="width: 100%; text-align: center; margin: 0;"></div>
                                    </div>
                                    
                                </form>
                            </div>
                     
						
                        <div class="col-xs-12 col-sm-6">
                            <br><br>
                            <div id="del-admin">
                                <h2 class="text-danger text-center"><small><i class="fa fa-trash-o"></i></small>&nbsp;&nbsp;Eliminar usuarios</h2>
                                <form action="process/deladmin.php" method="post" role="form">
                                    <div class="form-group">
                                        <label>Usuarios</label>
                                        <select class="form-control" name="name-admin">
                                            <?php
											$conUsuario=  ejecutarSQL::consultar("select * from usuarios where user='".$_SESSION['nombreUser']."' AND pass='".$_SESSION['claveUser']."'");
											$user=mysqli_fetch_array($conUsuario);
											 if($_SESSION['acceso']==1){
                                                $adminCon=  ejecutarSQL::consultar("select * from usuarios where idTipoU!=5 order by user asc");
											 }else{
												 
											 $adminCon= ejecutarSQL::consultar("select * from usuarios where idTipoU!=5 and idSucursal=".$_SESSION['sucursal']." AND idTipoU!=1 AND idUsuario!=".$user['idUsuario']." order by user asc");	 
											 }
                                                while($AdminD=mysqli_fetch_array($adminCon)){
                                                    echo '<option value="'.$AdminD['user'].'">'.$AdminD['user'].'</option>';
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <p class="text-center"><button type="submit" class="btn btn-danger">Eliminar Usuario</button></p>
                                    <br>
                                    <div id="res-form-del-admin" style="width: 100%; text-align: center; margin: 0;"></div>
                                </form>
                            </div>
                        </div>
                      
                        <div class="col-xs-12">
                       
                        <br><br>
                        <div class="panel panel-info">
                            <div class="panel-heading text-center"><i class="fa fa-refresh fa-2x"></i><h3>Actualizar datos de usuario</h3></div>
                              <div class="table-responsive">
                              <table class="table table-bordered">
                                  <thead class="">
                                      <tr>
                                          <th class="text-center">ID</th>
                                          <th class="text-center">Usuario</th>
                                          <th class="text-center">Nombre</th>
                                          <th class="text-center">Apellidos</th>
                                          <th class="text-center">Direccion</th>
                                          <th class="text-center">Correo</th>
                                          <th class="text-center">Sucursal</th>
                                          <th class="text-center">Acceso</th>
                                          <th class="text-center">Opciones</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                              $usu=mysqli_query($con,"SELECT * FROM usuarios INNER JOIN sucursal on sucursal.idSucursal=usuarios.idSucursal where idTipoU!=5 order by nombreSucursal asc");
                                              $up=1;
                                              while($usuarios=mysqli_fetch_array($usu)){

                                                  echo '
                                                      <div id="update-user">
                                                        <form method="post" action="process/updateUser.php" id="res-update-user-'.$up.'">
                                                          <tr>
                                                              <td>
                                                                <input class="form-control" name="id" required="" value="'.$usuarios['idUsuario'].'" readonly>
                                                                </td>
                                                              <td><input class="form-control" type="text" name="user-user" maxlength="30" required="" value="'.$usuarios['user'].'"></td>
                                                              <td><input class="form-control" type="text-area" name="user-name" required="" value="'.$usuarios['Nombre'].'"></td>
                                                              <td><input class="form-control" type="text-area" name="user-apellidos" required="" value="'.$usuarios['Apellido'].'"></td>
                                                              <td><input class="form-control" type="text-area" name="user-dir" required="" value="'.$usuarios['Direccion'].'"></td>
                                                              <td><input class="form-control" type="text-area" name="user-tel" required="" value="'.$usuarios['email'].'"></td>
                                                              <td><select name="user-suc" class="form-control">';
                                                              $sc=mysqli_query($con,"SELECT * FROM sucursal WHERE idSucursal=".$usuarios['idSucursal']." and idSucursal!=7 order by nombreSucursal asc");
                                                              while($Suc=mysqli_fetch_array($sc)){
                                                              echo "<option value='".$Suc['idSucursal']."'>".$Suc['nombreSucursal']."</option>";
                                                              }
                                                              $resSuc=mysqli_query($con,"SELECT * FROM sucursal WHERE idSucursal!=".$usuarios['idSucursal']." and idSucursal!=7 order by nombreSucursal asc");
                                                               while($Sucl=mysqli_fetch_array($resSuc)){
                                                                echo "<option value='".$Sucl['idSucursal']."'>".$Sucl['nombreSucursal']."</option>";
                                                               }                  
                                                              echo '</select></td>';
                                                              $contipou=mysqli_query($con,"SELECT * FROM tipo_usuario WHERE idTipoU=".$usuarios['idTipoU']." order by descripcionUsuario asc");
                                                              $tipou=mysqli_fetch_array($contipou);
                                                              echo '<td>
                                                              <input class="form-control" name="tipoUser" required="" value="'.$tipou['descripcionUsuario'].'" readonly>
                                                              </td>';
                                                              echo '<td class="text-center">
                                                              <button type="submit" class="btn btn-sm btn-primary button-UUS" value="res-update-user-'.$up.'">Actualizar</button>
                                                                  <div id="res-update-user-'.$up.'" style="width: 100%; margin:0px; padding:0px;"></div>
                                                              </td>
                                                              
                                                          </tr>
                                                        </form>
                                                      </div>
                                                      ';
                                                  $up=$up+1;
                                              }
                                            ?>
                                  </tbody>
                              </table>
                          </div>
                        
                        </div>
                    </div>
                    </div>
                </div>
                <!--==============================Panel Productos por Factura===============================-->
                <div role="tabpanel" class="tab-pane fade" id="Pedidos">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            
                            <br><br>
                            <div style="border: 1px solid #e0e1e1 !important;border-radius: 4px;padding: 10px;">
                            <h2 class="text-primary text-center"><small><i class="fa fa-plus"></i></small>&nbsp;&nbsp;Agregar productos por factura</h2><br><br>
                                <form action="process/addCuentaPagar.php" method="post" role="form" enctype="multipart/form-data">
                                    <?php
                                    if($_SESSION['acceso']==1){
                                    ?>
                                    <div class="form-group">
                                    <input type="hidden" name="user-entrada" value="<?php echo $_SESSION['idUser'];?>"> 
                                        <label>Sucursal:</label>
                                        <select name="sucursal-entrada" class="form-control" required>
                                           <option value="0">Seleccione una sucursal:</option>
                                           <?php
                                $conSucursal=mysqli_query($con,"SELECT*FROM sucursal inner join ubicacion on sucursal.idUbicacion=ubicacion.idUbicacion where idSucursal!=7");	
                                while($sucur=mysqli_fetch_array($conSucursal)){
                                echo "<option value=".$sucur['idSucursal'].">".$sucur['nombreSucursal']."-".$sucur['nombreUbicacion']."</option>";    
                                }
                            
                                ?>
                                        </select>
                                    </div>
                                    <?php
                                    }else{
                                    ?>
                                   <input type="hidden" name="user-entrada" value="<?php echo $_SESSION['idUser'];?>"> 
                                    <input type="hidden" name="sucursal-entrada" value="<?php echo $_SESSION['sucursal'];?>">
                                   
                                    <?php
                                    }
                                    ?>  

                                    <div class="form-group">
                                        <label>Tipo de Comprobante:</label>
                                        <select name="tipo-compra" class="form-control">
                                           <option value="N">Seleccione:</option>
                                           <option value="nota">Nota</option>
                                           <option value="factura">Factura</option>
                                        </select>
                                    </div>
    <div class="form-group">
	<label>Folio de Nota o factura:</label>                                   
    <input type="text" class="form-control" name="nota-cp" id="notaCp">
    </div>
                                    <div class="form-group">
	<label>RFC Proveedor:</label>
	<select name="rfc-proveedor" id="select-rfc-proveedor" class="form-control" onchange="consultaNombreProve(this);">
    <?php
    $consultaProvees=ejecutarSQL::consultar("SELECT * FROM proveedor order by RFC asc");
	echo '<option value="0">Seleccione proveedor:</option>';  
    while($provees=mysqli_fetch_array($consultaProvees)){
	echo '<option value="'.$provees['idProveedor'].'">'.$provees['RFC'].'</option>';	
    }	
    ?>  
    </select>
    </div>
<div class="form-group" id="nombreProvee">
<label>Nombre proveedor:</label>
<input type="text"  class="form-control" readonly>
</div>	  

<div class="form-group"><a type="button" style="display:inline-block" data-toggle="modal" data-target="#proveedorPopup">Agregar nuevo proveedor</a>
 &nbsp &nbsp<a type="button" style="display:inline-block" id="actualizarProvee" onclick="actualizarProveedores();">Actualizar</a>
</div>

<div class="form-group">
<label>Producto:</label><br>                                    
    <select class="form-control" name="prod-cp" id="prod-cp" style="width:83%;display:inline-block;">
<?php
if($_SESSION['acceso']==1){
$consultaProd=ejecutarSQL::consultar("select * from producto inner join marca on producto.idMarca=marca.idMarca order by nombreProd asc");
}else{
    $consultaProd=ejecutarSQL::consultar("select * from producto inner join marca on producto.idMarca=marca.idMarca where idSucursal=$_SESSION[sucursal] order by nombreProd asc");
}
while($prod= mysqli_fetch_array($consultaProd)) {

echo "<option value='".$prod['idProd']."'>".$prod['codProd']."-".$prod['nombreProd']."-".$prod['nombreMarca']."</option>";

}
?>
</select>&nbsp;&nbsp;<input type="button" class="btn btn-primary" value="Agregar" onclick="addProductos();"></div>

<div class="form-group"><a type="button" style="display:inline-block" data-toggle="modal" data-target="#productosPopup">Agregar nuevo Producto</a>&nbsp;&nbsp;&nbsp;&nbsp;<a type="button" style="display:inline-block" data-toggle="modal" data-target="#conProductosPopup">Consultar productos</a>&nbsp;&nbsp;&nbsp;&nbsp;
 <a onclick="actualizarProductos();">Actualizar</a></div>

<div  id="tabProds" class="form-group"></div> 

<div class="form-group" id="date-select">
<label>Fecha de Entrada:</label>
<input type="date" class="form-control" name="cp-date" id="cp-date" required>
<input type="hidden" class="form-control" name="cp-date2" id="cp-date2" value="0">
</div>
<br>
                                    <p class="text-center"><button type="submit" class="btn btn-primary">Aceptar</button>&nbsp;&nbsp;&nbsp;<button type="submit" class="btn btn-primary">Cancelar</button></p>
                                    <br>
                                    <div id="addCuentaPagar" style="width: 100%; text-align: center; margin: 0;"></div>
                                </form>
                            </div> 
                            <br><br>
                           
                        </div>
                        <!--Div Botones-->
                        <div class="col-xs-12 col-sm-6">
                            <br><br>
                        <div style="border: 1px solid #e0e1e1 !important;border-radius: 4px;padding: 10px;" class="text-center">
                        <h2 class="text-primary text-center"><small><i class="fa fa-search"></i></small>&nbsp;&nbsp;Entradas/salidas por producto</h2>
                        <br><a class="btn btn-md btn-success" data-toggle="modal" data-target="#consultarEntradas"><i class="fa fa-search"></i> Consultar Entradas</a>
                        <a class="btn btn-md btn-danger" data-toggle="modal" data-target="#consultarSalidas"><i class="fa fa-search"></i> Consultar Salidas</a>
                       <!-- <a class="btn btn-md btn-warning" data-toggle="modal" data-target="#reporteEntradaSalidas"><i class="fa fa-print"></i> Reporte</a>-->
                        <br><br>
                        </div>
                            </div><!--Fin div botones-->
                        <div class="col-xs-12">
                            <br><br>
                            <div class="panel panel-info">
                                <div class="panel-heading text-center"><i class="fa fa-search fa-2x"></i><h3>Consultar Entradas</h3></div>
                                <div class="col-md-4 panel-heading"> 
                                <select class="form-control" id="atributoE" onchange="consultarEntradas();">
                                <option value="folio_concepto">Consultar por folio:</option>
                                <option value="fecha_compra">Consultar por fecha:</option>                          
                                </select>
                                </div>
                                <div class="col-md-4 panel-heading"> 
                               <input type="text" id="valorE" class="form-control" onkeyup="consultarEntradas();">
                                </div>
                                <div class="col-md-4 panel-heading"> 
                                <select class="form-control" id="sucursalE" onchange="consultarEntradas();">
                                <?php
                                if($_SESSION['acceso']!=1){
                                ?>
                                 <option value="<?php echo $_SESSION['sucursal'];?>" >Mi sucursal</option>
                                <?php
                                }else{
                                ?>
                                <option value="0">Todas las sucursales</option>
                                <?php
                                $conSucursal=mysqli_query($con,"SELECT*FROM sucursal inner join ubicacion on sucursal.idUbicacion=ubicacion.idUbicacion where idSucursal!=7");	
                                while($sucur=mysqli_fetch_array($conSucursal)){
                                echo "<option value=".$sucur['idSucursal'].">".$sucur['nombreSucursal']."-".$sucur['nombreUbicacion']."</option>";    
                                }
                                }
                                ?>
                                </select>
                                </div>
                                <div class="table-responsive" id="tablaConsultarE">
                                    <table class="table table-bordered" style="text-align:center;">
                                        <thead class="">
                                            <tr>
                                                <th class="text-center">N??</th>
                                                <th class="text-center">Folio</th>
                                                <th class="text-center">Concepto</th>
                                                <th class="text-center">Costo</th>
                                                <th class="text-center">Fecha de entrada</th>
                                                <th class="text-center">Fecha de registro</th>
                                                <th class="text-center">Registra</th>
                                                <?php
                                                if($_SESSION['acceso']==1){
                                                ?>
                                                <th class="text-center">Sucursal</th>
                                                <?php
                                                }
                                                ?>
                                                <th class="text-center">Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if($_SESSION['acceso']==1){
                                              $categorias=  ejecutarSQL::consultar("SELECT * FROM cuentaspagar inner join sucursal on cuentaspagar.idSucursal=sucursal.idSucursal inner join ubicacion on sucursal.idUbicacion=ubicacion.idUbicacion inner join usuarios on cuentaspagar.idUsuario=usuarios.idUsuario order by idCuentaP desc limit 60");
                                            }else{
                                                $categorias=ejecutarSQL::consultar("SELECT * FROM cuentaspagar inner join usuarios on cuentaspagar.idUsuario=usuarios.idUsuario where cuentaspagar.idSucursal=$_SESSION[sucursal] order by idCuentaP desc limit 60");
                                            
                                            }
                                              $ui=1;
                                              while($cate=mysqli_fetch_array($categorias)){
                                                  echo '
                                                    
                                                       
                                                          <tr>
                                                              <td>'.$ui.'</td>
                                                              <td>'.$cate['folio_concepto'].'</td>
                                                             <td>'.$cate['concepto'].'</td>
                                                              <td>'.$cate['costoCompra'].'</td>
                                                              <td>'.$cate['fecha_compra'].'</td>
                                                              <td>'.$cate['fecha_registro'].'</td>
                                                              <td>'.$cate['Nombre']." ".$cate['Apellido'].'</td>';
                                                             if($_SESSION['acceso']==1){
                                                             echo ' <td>'.$cate['nombreSucursal']." ".$cate['nombreUbicacion'].'</td>';
                                                             }
                                                             echo '<td class="text-center">
                                                             <a class="btn btn-danger btn-sm" title="Detalle" data-toggle="modal" data-target="#detallesCP" onclick="mostrarDetallesCP('.$cate['idCuentaP'].')"><i class="fa fa-list"></i></a>&nbsp;';
                                                             echo  '<a class="btn btn-warning btn-sm" title="Editar"><i class="fa fa-edit"></i></a>'; 
                                                             echo '</td>';
                                                             ?>
                                           
                                                             <?php
                                                             echo '</tr>';
                                                         
                                                          $ui=$ui+1;
                                                    ?>
                                           
                                            <?php
                                              }
                                            ?>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                                </div>
                    </div>
                </div>
                
                                                         <!-- reporte entradas y salidas -->

                              
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="reporteEntradaSalidas">
<div class="modal-dialog modal-md">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title text-center text-warning" id="myModalLabel">Generar Reporte:</h4>
</div>
<form action="Reportes/reporte.php" method="post" target="_blank">
                  <div class="popup">
                   <?php
                  if($_SESSION['acceso']==1){
                  ?>
                 
                  <div class="text-center" style="display:inline-block;padding:2% 4%;width:100%;">
                  <label class="float-rigth">Sucursal:</label>
                  
                   <select type="text" class="form-control" name="sucursalR">  
                   <option value="0">Todas las sucursales</option>
                   <?php
                   $conSucursal=mysqli_query($con,"SELECT*FROM sucursal inner join ubicacion on sucursal.idUbicacion=ubicacion.idUbicacion where idSucursal!=7");	
                   while($sucur=mysqli_fetch_array($conSucursal)){
                   echo "<option value=".$sucur['idSucursal'].">".$sucur['nombreSucursal']."-".$sucur['nombreUbicacion']."</option>";    
                   }
                   ?>
                   </select>                                                 
                 
    </div>
 <?php
                  }
                  ?>
    <div class="text-center" style="display:inline-block;padding:2% 4%;width:100%;">
    <label>Reportar:</label>
    <Select class="form-control" name="conceptoR">
    <option value="entradas">Entradas</option>
    <option value="salidas">Salidas</option>
    </select>
    </div>

    <div class="text-center" style="display:inline-block;padding:2% 4%;width:100%;">
    <label>Fecha:</label>
    <input type="date" class="form-control" data-date-format="dd-mm-yyyy" name="fechaR" autocomplete="off" required="">
    </div>

    <div class="text-center" style="display:inline-block;padding:2% 4%;width:100%;">
    <label>Hasta:</label>
    <input type="date" class="form-control" data-date-format="dd-mm-yyyy" name="hastaR" autocomplete="off" required="">
    
    </div>

                 

                  </div>
                  <div class="modal-footer">
                    <div class="text-center">
                    <button type="submit" id="generarReporte" class="btn btn-danger btn-sm">Generar</button>
                    <button class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                    </div>
                    </form>
                  </div> 
                  
                  
             
          </div>
      </div>
    </div> <!-- Fin modal reporte entradas y salidas -->

     <!-- Consultar entradas -->

                              
<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="consultarEntradas">
<div class="modal-dialog modal-lg">
<div class="modal-content" id="modal-form-login">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
<h4 class="modal-title text-center text-success" id="myModalLabel">Consultar Entradas por producto</h4>
</div>
                  <div class="popup">
                  <div class="text-center" style="display:inline-block;padding:2% 4%;width:100%;">
     <input type="text" class="form-control" id="txtConsultarEntradasProd" placeholder="Introduzca el codigo del producto">                                                   
    </div>
                 <div class="table-responsive" id="tablaConsultarEntradas">
                 
                 </div>

                  </div>
                  <div class="modal-footer">
                    <div class="text-center">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Salir</button>
                    </div>
                  </div> 
                  
                  
             
          </div>
      </div>
    </div> <!-- Fin modal consultar entradas -->

     <!-- Consultar salidas -->

                              
     <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="consultarSalidas">
                               <div class="modal-dialog modal-lg">
                               <div class="modal-content" id="modal-form-login">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                               <h4 class="modal-title text-center text-danger" id="myModalLabel">Consultar Salidas por producto</h4>
                                </div>
                  <div class="popup">
                  <div class="text-center" style="display:inline-block;padding:2% 4%;width:100%;">
     <input type="text" class="form-control" id="txtConsultarSalidasProd" placeholder="Introduzca codigo de producto">                                                   
    </div>
                 <div class="table-responsive" id="tablaConsultarSalidas">
                 
                 </div>

                  </div>
                  <div class="modal-footer">
                    <div class="text-center">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Salir</button>
                    </div>
                  </div> 
                  
                  
             
          </div>
      </div>
    </div> <!-- Fin modal consultar salidas -->

                                                         <!-- Modal agregar nueva Marca -->

                              
                                                         <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="detallesCP">
                               <div class="modal-dialog modal-md">
                               <div class="modal-content" id="modal-form-login">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                               <h4 class="modal-title text-center text-danger" id="myModalLabel">Detalle de Entrada</h4>
                                </div>
                  <div class="popup">
                 <div class="table-responsive" id="tablaDetallesCP">
                 
                 </div>

                  </div>
                  <div class="modal-footer">
                    <div class="text-center">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Aceptar</button>
                    </div>
                  </div> 
                  
                  
             
          </div>
      </div>
    </div> <!-- Fin modal marcas -->
                 <!--==============================Panel Ajustes===============================-->
        <div role="tabpanel" class="tab-pane fade" id="Ajustes">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">    
                            <br><br>
                            <div id="suc-info">
                            <h2 class="text-primary text-center"><small><i class="fa fa-refresh"></i></small>&nbsp;&nbsp;Datos</h2><br><br>
                                <form action="process/updateInfoSuc.php" method="post" enctype="multipart/form-data" role="form">
                                <?php
                                 $inforSuc=ejecutarSQL::consultar("SELECT*FROM sucursal WHERE idSucursal=".$_SESSION['sucursal']);
                                 $Sucur=mysqli_fetch_array($inforSuc);
                                 echo '<input type="hidden" name="id" value="'.$Sucur['idSucursal'].'">';
                                 echo '<div class="form-group">
                                 <label>Nombre de Sucursal:</label>
                                 <input class="form-control" type="text" name="name-suc" value="'.$Sucur['nombreSucursal'].'">
                                 </div>';
                                 echo '<div class="form-group">
                                 <label>Direcci??n:</label>
                                 <input class="form-control" name="dir-suc" type="text" value="'.$Sucur['direccion'].'">
                                 </div>';
								 echo '<div class="form-group">
                                 <label>Corte de caja automatico:</label>
                                 <input class="form-control" name="corte-suc" type="time" max="22:30" min="10:00" step="1" value="'.$Sucur['horaCorte'].'">
                                 </div>';	
                                 echo '<div class="form-group">
                                 <label>Ubicaci??n:</label>
                                 <select class="form-control" name="ubic-suc">';
                                 $consulUbic=ejecutarSQL::consultar("SELECT*FROM ubicacion WHERE idUbicacion=".$Sucur['idUbicacion']);
                                 while( $ubica=mysqli_fetch_array($consulUbic)){
                                 echo '<option value="'.$ubica['idUbicacion'].'">'.$ubica['nombreUbicacion'].'</option>';
                                 }
                                 $consulUbic=ejecutarSQL::consultar("SELECT*FROM ubicacion WHERE idUbicacion!=".$Sucur['idUbicacion']);
                                 while( $ubica=mysqli_fetch_array($consulUbic)){
                                 echo '<option value="'.$ubica['idUbicacion'].'">'.$ubica['nombreUbicacion'].'</option>';
                                 }
                                 echo '</select>
                                 </div>';  
                                 echo '<div class="form-group"><label>Logo de sucursal:</label></div>';                                
                                 echo '<div class="form-group text-center" ><img src="assets/img/'.$Sucur['logo'].'" alt="Logo" width="100" height="100"></div>'; 
                                 echo '<div class="form-group">                      
                                 <input class="form-control" type="file" name="logo-suc">
                                 </div>';
                                ?>  
                                
                                    <p class="text-center"><button type="submit" class="btn btn-primary">Actualizar</button></p>
                                    <br>
                                    <div id="res-form-del-pedido" style="width: 100%; text-align: center; margin: 0;"></div>
                                </form>
                            </div> 
                            <br><br>
                           
                        </div>
                        <div class="col-xs-12 col-sm-6">    
                            <br><br>
                            <div id="suc-info">
                            <h2 class="text-primary text-center"><small><i class="fa fa-refresh"></i></small>&nbsp;&nbsp;Perfil</h2><br><br>
                            <form action="process/updatePerfil.php" method="post" enctype="multipart/form-data" role="form">
                            <?php
                             echo '<input type="hidden" name="id" value="'.$Sucur['idSucursal'].'">';
                             echo '<div class="form-group">
                             <label>Color de Menu:</label>
                             <input class="form-control" type="color" name="color-suc" value="'.$Sucur['color'].'">
                             </div>';
                             echo '<div class="form-group"><label>Fondo de aplicacion:</label></div>';
                             echo '<div class="form-group text-center" ><img src="assets/img/'.$Sucur['fondoSuc'].'" alt="Logo" width="200" height="200"></div>';
                             echo '<div class="form-group">                      
                             <input class="form-control" type="file" name="fondo-suc">
                             </div>';
                            ?><br>
                             <p class="text-center"><button type="submit" class="btn btn-primary">Actualizar</button></p>
                                </form>
                    </div>
                    </div>
                        
                    </div>
                </div>
                
    <!--==============================Panel Clientes===============================-->
    <div role="tabpanel" class="tab-pane fade" id="Clientes">
    <div class="row">
    <div class="col-xs-12 col-sm-6">
    <br><br>
    <div id="add-cliente">
    <h2 class="text-primary text-center"><small><i class="fa fa-plus"></i></small>&nbsp;&nbsp;Agregar Clientes</h2><br><br>
        <form action="process/addCliente.php" method="post" role="form">
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
    <input class="form-control" type="text" name="calle-cliente" placeholder="Direcci??n cliente" required="">
    </div>
    <div class="form-group">
    <label>No. Exterior</label>
    <input class="form-control" type="text" name="nexterior-cliente" placeholder="Direcci??n cliente" required="">
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
    <label>Estado:</label>
    <select class="form-control" name="estado-cliente" required="">
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
    <label>Tel??fono</label>
    <input class="form-control" type="text" name="tel-cliente" placeholder="N??mero telef??nico" pattern="[0-9]{1,20}" maxlength="20" required="">
    </div>   
                                <p class="text-center"><button type="submit" class="btn btn-primary">Agregar Cliente</button></p>
                                <br>
                                
                                <div id="res-form-add-cliente" style="width: 100%; text-align: center; margin: 0;"></div>
                                </form>
                            </div> 
                           
                                              
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <br><br>
                        <div id="del-cliente" style="border: 1px solid #e0e1e1 !important;border-radius: 4px;padding: 10px;">
                       <h2 class="text-danger text-center"><small><i class="fa fa-trash-o"></i></small>&nbsp;&nbsp;Eliminar clientes</h2>
                       <form action="process/delCliente.php" method="post" role="form">
                       <div class="form-group">
                          <label>Clientes:</label>
                          <select class="form-control" name="nit-clien">
                            <option value="0">Seleccione cliente:</option>
                              <?php 
                                   $ubicNIT=mysqli_query($con,"SELECT * FROM cliente order by NombreCompleto asc");
                                   while($SN=mysqli_fetch_array($ubicNIT)){
                                             echo '<option value="'.$SN['idCliente'].'">'.$SN['idCliente'].' - '.$SN['NombreCompleto']."-".$SN['RFC'].'</option>';
                                   }
                               ?>
                           </select>
                          </div>
                           <p class="text-center"><button type="submit" class="btn btn-danger">Eliminar cliente</button></p>
                           <br>
                           <div id="res-form-del-cliente" style="width: 100%; text-align: center; margin: 0;"></div>
                            </form>
                        </div>    
                    </div>    
                    <div class="col-xs-12">
                        <?php
                        if($_SESSION['acceso']==1){
                        ?>
                        <br><br>
                        <div class="panel panel-info">
                            <div class="panel-heading text-center"><i class="fa fa-refresh fa-2x"></i><h3>Actualizar datos de cliente</h3></div>
                              <div class="table-responsive">
                              <table class="table table-bordered">
                                  <thead class="">
                                      <tr>
                                          <th class="text-center">ID</th>
                                          <th class="text-center">Nombre</th>
                                          <th class="text-center">RFC</th>
                                          <th class="text-center">Direccion</th>
                                          <th class="text-center">Telefono</th>
                                          <th class="text-center">Email</th>
                                          <th class="text-center">Opciones</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                              $usu=mysqli_query($con,"SELECT * FROM cliente order by NombreCompleto asc");
                                              $up=1;
                                              while($usuarios=mysqli_fetch_array($usu)){

                                                  echo '
                                                      <div id="update-cliente">
                                                        
                                                          <tr>
                                                              <td>
                                                                <input class="form-control" name="id" required="" value="'.$usuarios['idCliente'].'" readonly>
                                                                </td>
                                                              <td><input class="form-control" type="text" name="user-user" maxlength="30" required="" value="'.$usuarios['NombreCompleto'].'" readonly></td>
                                                              <td><input class="form-control" type="text-area" name="user-name" required="" value="'.$usuarios['RFC'].'" readonly></td>
                                                              <td><input class="form-control" type="text-area" name="user-apellidos" required="" value="'.$usuarios['Calle']." ".$usuarios['noExterior']." ".$usuarios['noInterior']." ".$usuarios['colonia']." ".$usuarios['municipio']." ".$usuarios['estado'].'" readonly></td>
                                                              <td><input class="form-control" type="text-area" name="user-dir" required="" value="'.$usuarios['Telefono'].'" readonly></td>
                                                             <td><input class="form-control" type="text-area" name="user-tel" required="" value="'.$usuarios['Email'].'" readonly></td>
                                                             <td class="text-center">
                                                              <button class="btn btn-sm btn-warning"  data-toggle="modal" data-target="#editarClientePopup" data-whatever="'.$usuarios['idCliente'].'">Editar</button>
                                                                  <div id="res-update-user-'.$up.'" style="width: 100%; margin:0px; padding:0px;"></div>
                                                              </td>
                                                              
                                                          </tr>
                                                        </div>';
                                                  $up=$up+1;
                                              }
                                            ?>
                                  </tbody>
                              </table>
                          </div>
                          <?php
                        }
                          ?>
                          </div>
                        </div>
                    </div>
                </div>
                 <!-- Modal editar clientes-->
         <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="editarClientePopup">
                               <div class="modal-dialog modal-sm">
                               <div class="modal-content" id="modal-form-login">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
                               <h4 class="modal-title text-center text-primary" id="myModalLabel">Editar Clientes</h4>
                                </div>
                              
                 
                  <div class="popup"  id='contenidoModalClientes' style="padding: 5%;">          
                  </div>
                 
                  </div>
                 
			    <div style="width: 100%; text-align: center; margin: 0;" id="editCliente"></div>
              
          </div>
      </div>
     <!-- Fin modal editar clientes -->
               <?php
            if($_SESSION['acceso']==1){
               ?>
                      <!--==============================Panel Sucursales===============================-->
                <div role="tabpanel" class="tab-pane fade" id="Sucursales">
                    <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <br><br>
                        <div id="add-sucursal" style="border: 1px solid #e0e1e1 !important;border-radius: 4px;padding: 10px;">
                            <h2 class="text-primary text-center"><small><i class="fa fa-plus"></i></small>&nbsp;&nbsp;Agregar nueva sucursal</h2>
                            <form action="process/regsuc.php" method="post" role="form">

                                <div class="form-group">
                                    <label>Nombre:</label>
                                    <input class="form-control" type="text" name="suc-name" placeholder="Nombre sucursal" maxlength="30" required="">
                                </div>
                                <div class="form-group">
                                    <label>Direcci??n:</label>
                                    <input class="form-control" type="text" name="suc-dir" placeholder="Direccion completa" required="">
                                </div>
                                <div class="form-group">
                                    <label>Ubicacion:</label>
                                    <select name="suc-ubicacion" class="form-control">
                                      <?php
                                      $consutaUbic=mysqli_query($con,"SELECT*FROM ubicacion where idUbicacion!=5 order by nombreUbicacion asc");
                                      while($resubicaciones=mysqli_fetch_array($consutaUbic)){
                                       echo "<option value='".$resubicaciones['idUbicacion']."'>".$resubicaciones['nombreUbicacion']."</option>"; 
                                      }

                                      ?>
                                    </select>
                                </div>
                                <p class="text-center"><button type="submit" class="btn btn-primary">Agregar sucursal</button></p>
                                <br>
                                <div id="res-form-add-sucursal" style="width: 100%; text-align: center; margin: 0;"></div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <br><br>
                        <div id="del-sucursal" style="border: 1px solid #e0e1e1 !important;border-radius: 4px;padding: 10px;">
                       <h2 class="text-danger text-center"><small><i class="fa fa-trash-o"></i></small>&nbsp;&nbsp;Eliminar una sucursal</h2>
                       <form action="process/delsucursal.php" method="post" role="form">
                       <div class="form-group">
                          <label>Sucursales:</label>
                          <select class="form-control" name="nit-suc">
                            <option value="0">Seleccione sucursal:</option>
                              <?php 
                                   $ubicNIT=mysqli_query($con,"SELECT * FROM sucursal where idSucursal!=7 order by nombreSucursal asc");
                                   while($SN=mysqli_fetch_array($ubicNIT)){
                                             echo '<option value="'.$SN['idSucursal'].'">'.$SN['idSucursal'].' - '.$SN['nombreSucursal'].'</option>';
                                   }
                               ?>
                           </select>
                          </div>
                           <p class="text-center"><button type="submit" class="btn btn-danger">Eliminar sucursal</button></p>
                           <br>
                           <div id="res-form-del-sucursal" style="width: 100%; text-align: center; margin: 0;"></div>
                            </form>
                        </div>    
                    </div>
                    <div class="col-xs-12">
                        <br><br>
                        <div class="panel panel-info">
                            <div class="panel-heading text-center"><i class="fa fa-refresh fa-2x"></i><h3>Actualizar datos de sucursal</h3></div>
                              <div class="table-responsive">
                              <table class="table table-bordered">
                                  <thead class="">
                                      <tr>
                                          <th class="text-center">ID</th>
                                          <th class="text-center">Nombre</th>
                                          <th class="text-center">Direcci??n</th>
                                          <th class="text-center">Ubicacion</th>
                                    
                                          <th class="text-center">Opciones</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                              $suc=mysqli_query($con,"SELECT * FROM sucursal where idSucursal!=7 order by nombreSucursal asc");
                                              $up=1;
                                              while($sucursales=mysqli_fetch_array($suc)){

                                                  echo '
                                                      <div id="update-sucursal">
                                                        <form method="post" action="process/updateSucursal.php" id="res-update-suc-'.$up.'">
                                                          <tr>
                                                              <td>
                                                                <input class="form-control" name="id" required="" value="'.$sucursales['idSucursal'].'" readonly>
                                                                </td>
                                                              <td><input class="form-control" type="text" name="suc-name" maxlength="30" required="" value="'.$sucursales['nombreSucursal'].'"></td>
                                                              <td><input class="form-control" type="text-area" name="suc-dir" required="" value="'.$sucursales['direccion'].'"></td>
                                                              <td><select name="suc-ubic" class="form-control">';
                                                              $ubc=mysqli_query($con,"SELECT * FROM ubicacion WHERE idUbicacion=".$sucursales['idUbicacion']);
                                                              while($ubicacionSuc=mysqli_fetch_array($ubc)){
                                                              echo "<option value='".$ubicacionSuc['idUbicacion']."'>".$ubicacionSuc['nombreUbicacion']."</option>";
                                                              }
                                                              $resUbicaciones=mysqli_query($con,"SELECT * FROM ubicacion WHERE idUbicacion!=".$sucursales['idUbicacion']);
                                                               while($ubicacionesSuc=mysqli_fetch_array($resUbicaciones)){
                                                                echo "<option value='".$ubicacionesSuc['idUbicacion']."'>".$ubicacionesSuc['nombreUbicacion']."</option>";
                                                               }                  
                                                              echo '</select></td>
                             
                                                              <td class="text-center">
                                                              <button type="submit" class="btn btn-sm btn-primary button-US" value="res-update-suc-'.$up.'">Actualizar</button>
                                                                  <div id="res-update-suc-'.$up.'" style="width: 100%; margin:0px; padding:0px;"></div>
                                                              </td>
                                                          </tr>
                                                        </form>
                                                      </div>
                                                      ';
                                                  $up=$up+1;
                                              }
                                            ?>
                                  </tbody>
                              </table>
                          </div>
                        </div>
                    </div>
                </div>
                </div>
               
                <!--==============================Panel Ubicaciones===============================-->
                <div role="tabpanel" class="tab-pane fade" id="Ubicaciones">
                    <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <br><br>
                        <div id="addUbicacion" style="border: 1px solid #e0e1e1 !important;border-radius: 4px;padding: 10px;">
                            <h2 class="text-primary text-center"><small><i class="fa fa-plus"></i></small>&nbsp;&nbsp;Agregar nueva Ubicacion</h2>
                            <form action="process/regubicacion.php" method="post" role="form">

                                <div class="form-group">
                                    <label>Nombre de ubicacion</label>
                                    <input class="form-control" type="text" name="ub-name" placeholder="Nombre Ubicacion" maxlength="30" required="">
                                </div>
                                
                                <p class="text-center"><button type="submit" class="btn btn-primary">A??adir Ubicacion</button></p>
                                <br>
                                <div id="res-form-add-ubicacion" style="width: 100%; text-align: center; margin: 0;"></div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <br><br>
                        <div id="delUbicacion" style="border: 1px solid #e0e1e1 !important;border-radius: 4px;padding: 10px;">
                            <h2 class="text-danger text-center"><small><i class="fa fa-trash-o"></i></small>&nbsp;&nbsp;Eliminar ubicacion</h2>
                            <form action="process/delubic.php" method="post" role="form">
                                <div class="form-group">
                                    <label>Ubicaciones</label>
                                    <select class="form-control" name="nit-ubic">
                                        <?php 
                                            $ubicNIT=mysqli_query($con,"SELECT * FROM ubicacion where idUbicacion!=5 order by nombreUbicacion asc");
                                            while($UN=mysqli_fetch_array($ubicNIT)){
                                                echo '<option value="'.$UN['idUbicacion'].'">'.$UN['idUbicacion'].' - '.$UN['nombreUbicacion'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <p class="text-center"><button type="submit" class="btn btn-danger">Eliminar ubicacion</button></p>
                                <br>
                                <div id="res-form-del-ubicacion" style="width: 100%; text-align: center; margin: 0;"></div>
                            </form>
                        </div>    
                    </div>
                    <div class="col-xs-12">
                        <br><br>
                        <div class="panel panel-info">
                            <div class="panel-heading text-center"><i class="fa fa-refresh fa-2x"></i><h3>Actualizar datos de ubicacion</h3></div>
                              <div class="table-responsive">
                              <table class="table table-bordered">
                                  <thead class="">
                                      <tr>
                                          <th class="text-center">ID</th>
                                          <th class="text-center">Nombre</th>
                                          <th class="text-center">Opciones</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                              $ubicaciones=mysqli_query($con,"SELECT * FROM ubicacion where idUbicacion!=5 order by nombreUbicacion asc");
                                              $up=1;
                                              while($ubicacion=mysqli_fetch_array($ubicaciones)){
                                                  echo '
                                                      <div id="update-ubicacion">
                                                        <form method="post" action="process/updateUbicacion.php" id="res-update-prove-'.$up.'">
                                                          <tr>
                                                              <td>
                                                                <input class="form-control" name="id" required="" value="'.$ubicacion['idUbicacion'].'" readonly>
                                                                </td>
                                                              <td><input class="form-control" type="text" name="ubic-name" maxlength="70" required="" value="'.$ubicacion['nombreUbicacion'].'"></td>
                                                              <td class="text-center">
                                                                  <button type="submit" class="btn btn-sm btn-primary button-UU" value="res-update-prove-'.$up.'">Actualizar</button>
                                                                  <div id="res-update-prove-'.$up.'" style="width: 100%; margin:0px; padding:0px;"></div>
                                                              </td>
                                                          </tr>
                                                        </form>
                                                      </div>
                                                      ';
                                                  $up=$up+1;
                                              }
                                            ?>
                                  </tbody>
                              </table>
                          </div>
                        </div>
                    </div>
                </div>
                </div>
                 <!--==============================Panel Precios===============================-->
                <div role="tabpanel" class="tab-pane fade" id="Precios">
                    <div class="row">                        
                        <div class="col-xs-12" style="width: 80%;">
                            <br><br>
                            <div class="panel panel-info">
                                <div class="panel-heading text-center"><i class="fa fa-refresh fa-2x"></i><h3>Actualizar Precios</h3></div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead class="">
                                            <tr>
                                                <th class="text-center">ID</th>
                                                <th class="text-center">Descripcion</th>
                                                <th class="text-center">Porcentaje de Ganancia:</th>
                                                <th class="text-center">Opciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                              $precios=  ejecutarSQL::consultar("SELECT * FROM precios");
                                              $ui=1;
                                              while($prec=mysqli_fetch_array($precios)){
                                                  echo '
                                                      <div id="update-precios">
                                                        <form method="post" action="process/updatePrecios.php" id="res-update-precios-'.$ui.'">
                                                          <tr>
                                                              <td>
                                                                <input class="form-control" name="id" maxlength="9" required="" value="'.$prec['idPrecio'].'" readonly>
                                                             </td>
                                                             <td><input class="form-control" type="text" name="des-prec" maxlength="9" required="" value="'.$prec['descripcion'].'" readonly></td>
                                                              <td><input class="form-control" type="text" name="por-prec" maxlength="30" required="" value="'.($prec['porcentaje']*100-100).'"></td>
                                                             <td class="text-center">
                                                                  <button type="submit" class="btn btn-sm btn-primary button-UPC" value="res-update-precios-'.$ui.'">Actualizar</button>
                                                                  <div id="res-update-precios-'.$ui.'" style="width: 100%; margin:0px; padding:0px;"></div>
                                                              </td>
                                                          </tr>
                                                        </form>
                                                      </div>
                                                      ';
                                                  $ui=$ui+1;
                                              }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                              </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            <?php
            }
                ?>
        </div>
    </section>
    	<!-- Modal editar producto -->

                              
                               <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="editarProd">
                               <div class="modal-dialog modal-md">
                               <div class="modal-content" id="modal-form-login">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
                               <h4 class="modal-title text-center text-primary" id="myModalLabel">Editar Producto</h4>
                                </div>
                              
                 
                  <div class="popup" id="contenidoEditarProd">
                  
                  </div>                
                  <div class="modal-footer">
                   
                  </div>
                  <div class="" style="width: 100%; text-align: center; margin: 0;" id="addProveedor"></div>
              </form>
          </div>
      </div>
    </div> <!-- Fin modal Proveedores -->
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
                                    <label>Direcci??n</label>
                                    <input class="form-control" type="text" name="dir-cliente" placeholder="Direcci??n cliente" required="">
                                </div>
                                <div class="form-group">
                                    <label>Correo</label>
                                    <input class="form-control" type="text" name="correo-cliente" placeholder="Correo Electr??nico"  maxlength="50" required="">
                                </div>
                                <div class="form-group">
                                    <label>Tel??fono</label>
                                    <input class="form-control" type="number" name="tel-cliente" placeholder="N??mero telef??nico" pattern="[0-9]{1,20}" maxlength="20" required="">
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
        <!-- Modal productos -->

                              
                               <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="productosPopup">
                               <div class="modal-dialog modal-md">
                               <div class="modal-content" id="modal-form-login">
                               <div class="modal-header">
                               <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
                               <h4 class="modal-title text-center text-primary" id="myModalLabel">Agregar nuevo producto</h4>
                                </div>
                              <form action="process/addProducto.php" method="post"  enctype="multipart/form-data" style="margin: 20px;" id="faddProducto">
                 
                  <div class="popup">
					  <?php 
								if($_SESSION['acceso']==1){  
								?>
								<br>
								 <div class="form-group">
								 <label>Sucursal de producto:</label>
									 <select name="sucursal-prodM" id="sucursalProdM" class="form-control">
									 <?php
									  $proveedoresc=mysqli_query($con,"SELECT * FROM sucursal inner join ubicacion on sucursal.idUbicacion=ubicacion.idUbicacion where idSucursal=".$_SESSION['sucursal']);
                                      while($provc=mysqli_fetch_array($proveedoresc)){
                                      echo '<option value="'.$provc['idSucursal'].'">'.$provc['idSucursal']."-".$provc['nombreSucursal']."-".$provc['nombreUbicacion'].'</option>';
                                        }
									$proveedoresc=mysqli_query($con,"SELECT * FROM sucursal inner join ubicacion on sucursal.idUbicacion=ubicacion.idUbicacion where idSucursal!=".$_SESSION['sucursal']);
                                      while($provc=mysqli_fetch_array($proveedoresc)){
                                      echo '<option value="'.$provc['idSucursal'].'">'.$provc['idSucursal']."-".$provc['nombreSucursal']."-".$provc['nombreUbicacion'].'</option>';
                                        }
								      ?>
									 </select>
                              </div> 
								<?php
								}else{
                                    echo "<input type='hidden' name='sucursal-prodM' id='sucursalProdM' value='".$_SESSION['sucursal']."'>";
                                }
								?>  
                                  
                  <div class="form-group">
                                <label>C??digo de producto</label>
                                <input type="text" class="form-control"  placeholder="C??digo" required  name="prod-codigo" id="codProdsM" onkeyup="verificarCodigoProductoM(this);">
                              </div>
                              <div id="verCodProdM"></div>
                              <div class="form-group">
                                <label>Nombre de producto</label>
                                <input type="text" class="form-control"  placeholder="Nombre" required  name="prod-name">
                              </div>
                             
                              <div class="form-group">
                                <label>Codigo de SAT:</label>
                                <input type="text" class="form-control"  placeholder="Codigo de SAT" required name="prod-sat">
                              </div>
                              <div class="form-group">
                                <label>Descripci??n de producto</label>
                                <textarea class="form-control"  placeholder="Descripci??n" required name="prod-des" rows="10" cols="40"></textarea>
                              </div>
                              <div class="form-group">
                                <label>Proveedor</label>
                                <select class="form-control" name="prod-prov" id="select-proveedoresM">
                                    <?php 
                                        $proveedoresc=mysqli_query($con,"SELECT * FROM proveedor order by NombreProveedor asc");
                                        while($provc=mysqli_fetch_array($proveedoresc)){
                                            echo '<option value="'.$provc['idProveedor'].'">'.$provc['NombreProveedor'].'</option>';
                                        }
                                    ?>
                                </select>
                              </div>

                                <div class="form-group">
                                <label>Marca del producto</label>
                                <select class="form-control" name="prod-marca" id="select-marcasM">
                                
                                    <?php 
                                        $categoriac=mysqli_query($con,"SELECT * FROM marca order by NombreMarca asc");
                                        while($catec=mysqli_fetch_array($categoriac)){
                                            echo '<option value="'.$catec['idMarca'].'">'.$catec['NombreMarca'].'</option>';
                                        }
                                    ?>
                                </select>
                              </div>

                              <div class="form-group">
                                <label>Categoria del producto</label>
                                <select class="form-control" name="prod-categoria" required>
                                
                                    <?php 
                                        $categoriac=mysqli_query($con,"SELECT * FROM categoria order by descripcionCat asc");
                                        while($catec=mysqli_fetch_array($categoriac)){
                                            echo '<option value="'.$catec['idCategoria'].'">'.$catec['descripcionCat'].'</option>';
                                        }
                                    ?>
                                </select>
                              </div>
                               <div class="form-group">
                                <label>Precio Compra</label>
                                <input type="text" class="form-control"  name="prod-price" placeholder="Precio de Compra" required maxlength="20">                                
                              </div>
                              <div class="form-group">
                                <label>Precio Venta</label>
                                <input type="text" class="form-control"  name="prodv-price" placeholder="Precio de Venta" required maxlength="20">                                
                              </div>
                              <div class="form-group">
                              <input type="checkbox" name="iva-prod" value="iva">&nbsp;&nbsp;Aplicar IVA
                              </div>
                              
                              <div class="form-group">
                                <label>Imagen de producto</label>
                                <input type="file" name="imgM">
                                <p class="help-block">Formato de imagenes admitido png, jpg, gif, jpeg</p>
                              </div>
                                <input type="hidden"  name="admin-name" value="<?php echo $_SESSION['nombreUser'] ?>">
                  <div class="modal-footer">
                    <div class="text-center">
                    <button type="submit" class="btn btn-primary btn-sm">Agregar Producto</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
                  </div>
                  </div>
                  <div class="" style="width: 100%; text-align: center; margin: 0;" id="addProducto"></div>
              </form>
          </div>
      </div>
    </div> <!-- Fin modal productos -->

    <?php include './inc/footer.php'; ?>
</body>
</html>
