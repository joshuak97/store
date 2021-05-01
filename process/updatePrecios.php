<?php
include '../library/configServer.php';
include '../library/consulSQL.php';

$id=$_POST['id'];
$des=$_POST['des-prec'];
$por=$_POST['por-prec']/100+1;
if($id!=1 && $id!=5){
if(consultasSQL::UpdateSQL("precios", "porcentaje=$por", "idPrecio=$id")){	
    echo '
    <br>
    <img class="center-all-contens" src="assets/img/Check.png">
    <p><strong>Hecho</strong></p>
    <p class="text-center">
        Recargando<br>
        en 7 segundos
    </p>
    <script>
        setTimeout(function(){
        url ="configAdmin.php";
        $(location).attr("href",url);
        },7000);
    </script>
 ';
}else{
    echo '
    <br>
    <img class="center-all-contens" src="assets/img/cancel.png">
    <p><strong>Error</strong></p>
    <p class="text-center">
        Recargando<br>
        en 7 segundos
    </p>
    <script>
        setTimeout(function(){
        url ="configAdmin.php";
        $(location).attr("href",url);
        },7000);
    </script>
 ';
}

}else if($id==1){
    $consultaPrecio= ejecutarSQL::consultar("SELECT * FROM precios where idPrecio=1");//En caso de actualizar el precio de contado consultamos el precio actual
    $precio=mysqli_fetch_array($consultaPrecio);
    $porcentaje=$precio['porcentaje'];
    if(consultasSQL::UpdateSQL("precios", "porcentaje=$por", "idPrecio=$id")){
        $consultaIVA= ejecutarSQL::consultar("SELECT * FROM precios where idPrecio=5");
        $iva=mysqli_fetch_array($consultaIVA);
        $consultaProductos= ejecutarSQL::consultar("SELECT * FROM producto");	
    while($producto=mysqli_fetch_array($consultaProductos)){
    $preIva=$producto['precioCosto']*$porcentaje*$iva['porcentaje'];
    if($producto['precioVenta']<$preIva){
    $nuevoPrecio=$producto['precioCosto']*$por;    
    consultasSQL::UpdateSQL("producto", "precioVenta=".round($nuevoPrecio), "idProd=".$producto['idProd']);    
    }else{
    $nuevoPrecio=$producto['precioCosto']*$por*$iva['porcentaje'];    
    consultasSQL::UpdateSQL("producto", "precioVenta=".round($nuevoPrecio), "idProd=".$producto['idProd']);     
    }    
    }
        echo '
        <br>
        <img class="center-all-contens" src="assets/img/Check.png">
        <p><strong>Hecho</strong></p>
        <p class="text-center">
            Recargando<br>
            en 7 segundos
        </p>
        <script>
            setTimeout(function(){
            url ="configAdmin.php";
            $(location).attr("href",url);
            },7000);
        </script>
     ';
    }else{
        echo '
        <br>
        <img class="center-all-contens" src="assets/img/cancel.png">
        <p><strong>Error</strong></p>
        <p class="text-center">
            Recargando<br>
            en 7 segundos
        </p>
        <script>
            setTimeout(function(){
            url ="configAdmin.php";
            $(location).attr("href",url);
            },7000);
        </script>
     ';
    }
}else if($id==5){
    $consultaPrecio= ejecutarSQL::consultar("SELECT * FROM precios where idPrecio=1");//En caso de actualizar el precio de contado consultamos el precio actual
    $precio=mysqli_fetch_array($consultaPrecio);
    $porcentaje=$precio['porcentaje'];
    $consultaIVA= ejecutarSQL::consultar("SELECT * FROM precios where idPrecio=5");
    $iva=mysqli_fetch_array($consultaIVA);
    
    if(consultasSQL::UpdateSQL("precios", "porcentaje=$por", "idPrecio=$id")){   
    $consultaProductos= ejecutarSQL::consultar("SELECT * FROM producto");	
    while($producto=mysqli_fetch_array($consultaProductos)){
    $preIva=$producto['precioCosto']*$porcentaje*$iva['porcentaje'];
    if($producto['precioVenta']==$preIva){
    $nuevoPrecio=$producto['precioCosto']*$porcentaje*$por;    
    consultasSQL::UpdateSQL("producto", "precioVenta=".round($nuevoPrecio), "idProd=".$producto['idProd']);     
    }else{
       
    }    
    }
        echo '
        <br>
        <img class="center-all-contens" src="assets/img/Check.png">
        <p><strong>Hecho</strong></p>
        <p class="text-center">
            Recargando<br>
            en 7 segundos
        </p>
        <script>
            setTimeout(function(){
            url ="configAdmin.php";
            $(location).attr("href",url);
            },7000);
        </script>
     ';
    }else{
        echo '
        <br>
        <img class="center-all-contens" src="assets/img/cancel.png">
        <p><strong>Error</strong></p>
        <p class="text-center">
            Recargando<br>
            en 7 segundos
        </p>
        <script>
            setTimeout(function(){
            url ="configAdmin.php";
            $(location).attr("href",url);
            },7000);
        </script>
     ';
    }
}else{
echo '<h4>Error al actualizar precio</h4>';    
}

?>