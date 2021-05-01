<?php

include '../library/configServer.php';
include '../library/consulSQL.php';

session_start();

ini_set('date.timezone','America/Mexico_City');

$FechaCot=date('Y-m-d , H:i:s',time());
$tituloCot=$_POST['nombreCot'];
$idProd="";
$subtotal=$_SESSION['sumaTotal'];
$idVendedor="";
$estatus="Pendiente";
$verdata=  ejecutarSQL::consultar("select idUsuario from usuarios where pass='".$_SESSION['claveUser']."' and user='".$_SESSION['nombreUser']."'");

while($vendedor = mysqli_fetch_array($verdata)) {
    $idVendedor.=$vendedor['idVendedor'];
    }

for($i = 0;$i< $_SESSION['contador'];$i++){
    $consulta=ejecutarSQL::consultar("select * from producto where codProd='".$_SESSION['producto'][$i]."'");
    while($fila = mysqli_fetch_array($consulta)){
    	if($i==$_SESSION['contador']-1){
            $idProd.=$fila['idProd'].",".$_SESSION['cantidad'][$i];
    	}else{
    	 $idProd.=$fila['idProd'].",".$_SESSION['cantidad'][$i]." ";	
    	}
   
    }


}

if($tituloCot!="" && $idProd!=""){
if(consultasSQL::InsertSQL("cotizacion", "titulo, idProd,FechaCot,subtotal, idVendedor,estatus", "'$tituloCot','$idProd','$FechaCot','$subtotal','$idVendedor', '$estatus'")){
echo '<div id="resultadoC"><img src="assets/img/correcto.png" class="center-all-contens"><br><p class="lead text-center">Categoría añadida éxitosamente</p></div>';
            unset($_SESSION['producto']);
            unset($_SESSION['productos2']);
            unset($_SESSION['contador']);
            unset($_SESSION['sumaTotal']);
            unset($_SESSION['cantidad']);
            unset($_SESSION['cantidad2']);
             echo "<script>
                    location.href='index.php'                               
                   </script>"; 

}else{

echo "Error en el sistema";

}
}else{

echo "Ingrese titulo de la cotizacion o agregue articulos al carrito";

 echo "<script>
            location.href='index.php'                               
      </script>"; 

}

?>