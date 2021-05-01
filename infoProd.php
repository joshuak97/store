<?php
include './library/configServer.php';
include './library/consulSQL.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Productos</title>
    <?php include './inc/link.php';
    $CodigoProducto=$_GET['CodProd'];
    ?>

</head>
<body id="container-page-product">
    <?php include './inc/navbar.php'; ?>

    <script language="javascript">
  
  function mostrarEquivalencias(idEquivalencia,codProd,existencias){
    var d = document.getElementById("tabAplicaciones");
    while (d.hasChildNodes())
    d.removeChild(d.firstChild);  
    $.post("inc/tabEquivalencias.php", { idEquivalencia: idEquivalencia, codProd:codProd, existencias:existencias }, function(data){
    $("#tabEquivalencias").html(data);
    });
  }
  function mostrarAplicaciones(codigoProducto){
    var d = document.getElementById("tabEquivalencias");
    while (d.hasChildNodes())
    d.removeChild(d.firstChild);
    $.post("inc/tabAplicaciones.php", { codigoProducto:codigoProducto }, function(data){
    $("#tabAplicaciones").html(data);
    });
  }

  function agregarCarrito(idProducto){
 
 var cantidad=document.getElementById(idProducto).value;
 

 $('#carrito-compras-tienda').load("process/carrito.php?precio="+idProducto+"&cantidad="+cantidad);
 $('.modal-carrito').modal('show');
 }
</script>

<section id="infoproduct">
    <div class="container">
            <div class="row">
                <div class="page-header">
                   <h1> <small class="tittles-pages-logo">STORE EWS</small></h1>
                </div>



                      <?php 
                    
                    $productoinfo=  ejecutarSQL::consultar("SELECT*FROM producto INNER JOIN marca on marca.idMarca=producto.idMarca inner join categoria on producto.idCategoria=categoria.idCategoria WHERE idProd='".$CodigoProducto."'");
                    while($fila=mysqli_fetch_array($productoinfo)){
                        echo '
                            <div class="col-xs-12 col-sm-6" style="heigth="30%">
                                <h2>Información de producto</h2>
                                <br>
                                <h4><strong>Nombre: </strong>'.$fila['nombreProd'].'</h4><br>
                                <h4><strong>Marca: </strong>'.$fila['NombreMarca'].'</h4><br>
                                <h4><strong>Categoria: </strong>'.$fila['descripcionCat'].'</h4><br>
                                <h4><strong>Codigo SAT: </strong>'.$fila['codigoSat'].'</h4><br>
                                <h4><strong>Codigo de producto: </strong>'.$fila['codProd'].'</h4><br>
                                <h4><strong>Descripción: </strong>'.$fila['desProd'].'</h4><br>';
                                if(!$_SESSION['acceso']==""){
								echo '<h4><strong>Precio: </strong>$'.$fila['precioVenta'].'</h4><br>';
								}else{
								echo '<h4><a href="#" data-toggle="modal" data-target=".modal-login">Inicie sesión para ver nuestros precios</a></h4><br>';
								}
                                echo '<h4><strong>Cantidad: </strong></h4>
                                <input id="'.$fila['idProd'].'" name="cantidad-prod" class="form-control" type="number" style="width:24%;height:10%" min="1" max="'.$fila['existencia'].'" value="1">
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                
                                <img class="img-responsive" src="assets/img-products/'.$fila['Imagen'].'" width="250" height="250">
                            </div>
                            <br><br><br>
                            <div class="col-xs-12 text-center">
                                <a href="product.php" class="btn btn-lg btn-primary"><i class="fa fa-mail-reply"></i>&nbsp;&nbsp;Regresar a la tienda</a> &nbsp;&nbsp;&nbsp; 
                                <button class="btn btn-lg btn-success botonCarrito" onclick="agregarCarrito(\''.$fila['idProd'].'\')"><i class="fa fa-shopping-cart"></i>&nbsp;&nbsp; Añadir al carrito</button>
                            </div>';
                    }
?>
               
         
             
        
    </section>
    <?php include './inc/footer.php'; ?>
</body>
</html>