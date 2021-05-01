<?php
include '../library/configServer.php';
include '../library/consulSQL.php';
session_start();
ini_set('date.timezone','America/Mexico_City');
$fechaDevolucion=date('Y-m-d , H:i:s',time());
$descripcion="";
$folioVenta=$_POST['where'];
$costoDev=0;
if($_SESSION['acceso']!=1){
$estado="Pendiente";
}else{
$estado="Aprobado";
}


if($_SESSION['contadorDev']!=0){
for($i=0;$i<$_SESSION['contadorDev'];$i++){
    if($_SESSION['cantDev'][$i]>0){
        $consultaProd=ejecutarSQL::consultar("SELECT*FROM producto inner join marca on producto.idMarca=marca.idMarca where idProd=".$_SESSION['listaDev'][$i]);
        $prod=mysqli_fetch_array($consultaProd);
        $costoDev+=$prod['precioVenta']*$_SESSION['cantDev'][$i];
        if($i==$_SESSION['contadorDev']-1){
            $descripcion.=$_SESSION['listaDev'][$i].",".$_SESSION['cantDev'][$i];
        }else{
            $descripcion.=$_SESSION['listaDev'][$i].",".$_SESSION['cantDev'][$i]." ";  
        }
        }
   
    }
    
    $cuentaError=0;
 $costoDevolucion=number_format($costoDev,2);  

    if(consultasSQL::InsertSQL("devoluciones_por_fallas", "folioVentaDF,fechaDevolucionDF,descripcionDF,costoDevolucionDF,usuarioDF,idSucursalDF,estadoDF","'$folioVenta','$fechaDevolucion','$descripcion',$costoDev,'".$_SESSION['idUser']."',".$_SESSION['sucursal'].",'$estado'")){
        if($_SESSION['acceso']==1){ 
        for($i=0;$i<$_SESSION['contadorDev'];$i++){
            if($_SESSION['cantDev'][$i]>0){
                $consultaProd=ejecutarSQL::consultar("SELECT*FROM producto where idProd=".$_SESSION['listaDev'][$i]);
                $prod=mysqli_fetch_array($consultaProd);
                
                $nuevoStock=$prod['stockDanado']+$_SESSION['cantDev'][$i]; 
                
                if(consultasSQL::UpdateSQL("producto", "stockDanado=".$nuevoStock, "idProd=".$_SESSION['listaDev'][$i])){
                
                }else{
                $cuentaError++;    
                break;
                echo '<img src="assets/img/incorrectofull.png" class="center-all-contens"><br>
                <h3>Ha ocurrido un error al registrar la devolucion de producto '.$prod['nombreProd'].' '.$prod['NombreMarca'].'</h3>
                <br>';        
                
                }
            }
            }
        }   
    }else{
        $cuentaError++;
        echo '<img src="assets/img/incorrectofull.png" class="center-all-contens"><br>
        <h3>Ha ocurrido un error al registrar la devolucion</h3>
        <br>';    
    }

    if($cuentaError==0){
    echo '<img src="assets/img/correctofull.png" class="center-all-contens"><br>
    <h3>Devolución registrada con éxito</h3>
    <br> <script>
    setTimeout(function(){
    url ="ventas.php";
    $(location).attr("href",url);
    },2000);
    </script>';
    }

$_SESSION['contadorDev']=0;
}else{

}
?>