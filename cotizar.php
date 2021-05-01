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
              <h1>Cotizaciones</h1>
            </div>
            <br><br><br>
            <div class="row">
                
                  
                  <div style="width: 60%; display: inline-block;">
                    <select id="cotizaciones" class="form-control">
                    <option value="0">Consultar Cotizaciones:</option>
                    <?php
                    $consulta1=ejecutarSQL::consultar("SELECT * FROM cotizacion");
                   while($fila1 = mysqli_fetch_array($consulta1)) {

                    echo "<option value='".$fila1['idCotizacion']."''>".$fila1['titulo']."</option>";
                   }

                    ?>
                  </select></div>&nbsp &nbsp &nbsp
                 
                   <br>
                   <br>
                   <div id="tabla-cotizacion">
                  
                </div>
                <div class="text-center"><button class="btn btn-primary" id="agregarCot">Añadir al Carrito</button>&nbsp &nbsp
                  <a class="btn btn-primary" id="guardarCot" href='cotizar/factura_pdf.php' target="_blank">Guardar como PDF</a>
                </div>
                <div id="resultadosCot">
                  
                </div>
             
               
            </div>
        </div>
    </section>
    <?php include './inc/footer.php'; ?>
</body>
</html>