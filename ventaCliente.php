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
<script src="https://www.paypal.com/sdk/js?client-id=AWj4p0gKHPD5olvvQlXXT2UK_FcAWGdXLwUB9e-6dDC7knc5vE9Ok1X1NZZZ6DQQ5CtsFxj2DVpwhGU_&currency=MXN"></script> 
<script src="js/paypalMoneda.js?client-id=AWj4p0gKHPD5olvvQlXXT2UK_FcAWGdXLwUB9e-6dDC7knc5vE9Ok1X1NZZZ6DQQ5CtsFxj2DVpwhGU_"></script>

     <?php
session_start();
if($_SESSION['contador']==0){
echo '<script>window.location.href="index.php"</script>';
}

include './process/notificacion.php';

?>
<body id="container-page-index">

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
              <h1>Confirmar Compra</h1>
            </div>
            <br>
            <div class="row">
                
                <div class="col-xs-12 col-sm-7" style="border: 1px solid #e0e1e1 !important;border-radius: 4px;padding: 10px;">
                    <div id="form-venta" >
                      
                                        
    <?php
    echo '<table class="table table-bordered" style="text-align:center;">';

    echo '<tr><td><strong>Articulo</strong></td><td><strong>Precio Unitario</strong></td><td><strong>Total</strong></td><td><strong>Cantidad</strong></td></tr>';
    
    $suma=0;
    for($i = 0;$i< $_SESSION['contador'];$i++){
        $consulta=ejecutarSQL::consultar("select * from producto inner join marca on producto.idMarca=marca.idMarca where idProd=".$_SESSION['producto'][$i]);
        while($fila = mysqli_fetch_array($consulta)) {
                echo "<tr><td>".$fila['nombreProd'].' '.$fila['NombreMarca']."</td><td>$".number_format($fila['precioVenta'],2)."</td><td>$".number_format($fila['precioVenta']*$_SESSION['cantidad'][$i],2)."</td>
                <td> ".$_SESSION['cantidad'][$i]."</td>
        </tr>";
        $suma += $fila['precioVenta']*$_SESSION['cantidad'][$i];
        }
    }
    echo "<tr><td>Subtotal:</td><td>$".number_format($suma,2)."</td><td></td><td></td></tr>";
    echo "</table>";
    $_SESSION['sumaTotal']=$suma;
   
    ?>

                                        
                                        
                                        <?php
                                        echo '
                                          <input type="hidden" name="clien-name" value="'.$_SESSION['nombreUser'].'">
                                          <input type="hidden" name="clien-pass" value="'.$_SESSION['claveUser'].'">
                                          <input type="hidden"  name="clien-number" value="log">
                                        <br>';
                                        ?>
                                       
                                       <script>
                            
          
  paypal.Buttons({
    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: '<?php echo $_SESSION["sumaTotal"];?>'
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
        // This function shows a transaction success message to your buyer.
        $.post("process/pagoExitoso.php", function(data){
        $("#form-venta").html(data);
        });
      // Call your server to save the transaction
      return fetch('/paypal-transaction-complete', {
          method: 'post',
          headers: {
            'content-type': 'application/json'
          },
          body: JSON.stringify({
            orderID: data.orderID
          })
        });
      });
    }
  }).render('#paypal-button-container2');
  //This function displays Smart Payment Buttons on your web page.
</script>
                                        <div id="paypal-button-container2">

                                        </div>
                                      
                                   
                            <div id="venta-res" style="width: 100%; text-align: center; margin: 0;"></div>
                        

                    </div>
                    
                </div>
                <div class="col-xs-12 col-sm-5">
                    <img class="img-responsive center-all-contens" src="assets/img/LOGOSA.png" style="opacity: .4">
                </div>
            </div>
        </div>
    </section>
 

   




    <?php include './inc/footer.php'; ?>
</body>
</html>
