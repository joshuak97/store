<?php
include '../library/configServer.php';
include '../library/consulSQL.php';
include '../inc/link.php';

session_start();

$nombreCliente=$_POST['nombreCliente'];

echo $nombreCliente;


/*$existencia=array();
$_SESSION['tipoVenta']='credito';
ini_set('date.timezone','America/Mexico_City');
$num_prod=$_SESSION['contador'];
$fechaVenta=date('Y-m-d , H:i:s',time());
$folioVenta=substr(date('YmdHis',time()), 2);
$modoPago=$_POST['forma-pago'];
$modoCompra=$_POST['forma-compra'];
$idProd="";
$idVendedor="";
$verdata=  ejecutarSQL::consultar("select idVendedor from vendedor where Clave='".$_SESSION['claveUser']."' and Nombre='".$_SESSION['nombreUser']."'");
$cantidad=array();
while($vendedor = mysqli_fetch_array($verdata)) {
    $idVendedor.=$vendedor['idVendedor'];
    }

for($i = 0;$i< $_SESSION['contador'];$i++){
    $consulta=ejecutarSQL::consultar("select * from producto where codProd='".$_SESSION['producto'][$i]."'");
    while($fila = mysqli_fetch_array($consulta)){
            $existencia[$i]=$fila['existencia']-$_SESSION['cantidad'][$i];
        	if($i==$_SESSION['contador']-1){
            $idProd.=$fila['idProd'];
    	}else{
    	 $idProd.=$fila['idProd'].",";	
    	}

   
    }
}

if(consultasSQL::InsertSQL("venta_contado", "idProd, NumFolio, Fecha, tipoPago, totalPagar,idVendedor", "'$idProd','$folioVenta','$fechaVenta','$modoPago',".$_SESSION['sumaTotal'].", '$idVendedor'")){


        
   for($u = 0;$u< $_SESSION['contador'];$u++){
    $consulta1=ejecutarSQL::consultar("SELECT existencia FROM producto where codProd='".$_SESSION['producto'][$u]."'");
    while($fila1 = mysqli_fetch_array($consulta1)){
    consultasSQL::UpdateSQL("producto"," existencia=".$existencia[$u], "codProd='".$_SESSION['producto'][$u]."'");    
        
}


}

    $_SESSION['idVentaContado']=$folioVenta;
   

}else{

$_SESSION['idVentaContado']=0;

}*/

?>