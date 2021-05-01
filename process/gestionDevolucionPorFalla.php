<?php
include '../library/configServer.php';
include '../library/consulSQL.php';
session_start();
$validar=0;
$consultadev=ejecutarSQL::consultar("SELECT*FROM devoluciones_por_fallas where idDevolucionFalla=$_POST[idDev]");
$resDev=mysqli_fetch_array($consultadev);
//Obtenemos los id y de los productos de la devolucion 
$articulos=explode(" ",$resDev['descripcionDF']);

if($_POST['accion']=="Aprobar"){//Si la accion a realizar es aprobar
    for($i=0;$i<count($articulos);$i++){
    $articulo=explode(",",$articulos[$i]);
    if($articulo[0]!=""){
    $consultaProd=ejecutarSQL::consultar("SELECT stockDanado FROM producto where idProd=".$articulo[0]);
    $prod=mysqli_fetch_array($consultaProd);
   
    $nuevoStock=$prod['stockDanado']+$articulo[1];
    
    if(consultasSQL::UpdateSQL("producto", "stockDanado=$nuevoStock", "idProd=".$articulo[0])){
        
        
    }else{
        $validar=1;
            echo "<script>$('#bajaError').modal('toggle');</script>";
    break;    
        }
        
    }
    }
    if($validar==0){
        echo "<script>$('#bajaAprobada').modal('toggle');</script>";
        consultasSQL::UpdateSQL("devoluciones_por_fallas", "estadoDF='Aprobado'", "idDevolucionFalla=$_POST[idDev]");
    }

}else{//Si la accion es rechazar
    if($resDev['estadoDF']=="Aprobado"){//Si el estado de la baja es aprobado
    
        for($i=0;$i<count($articulos);$i++){
            $articulo=explode(",",$articulos[$i]);
            if($articulo[0]!=""){
            $consultaProd=ejecutarSQL::consultar("SELECT stockDanado FROM producto where idProd=".$articulo[0]);
            $prod=mysqli_fetch_array($consultaProd);
           
            $nuevoStock=$prod['stockDanado']-$articulo[1];
            
            if(consultasSQL::UpdateSQL("producto", "stockDanado=$nuevoStock", "idProd=".$articulo[0])){
                
                
            }else{
                $validar=1;
                    echo "<script>$('#bajaError').modal('toggle');</script>";
            break;    
                }
            }
        }
            if($validar==0){
                echo "<script>$('#bajaAprobada').modal('toggle');</script>";
                consultasSQL::UpdateSQL("devoluciones_por_fallas", "estadoDF='Rechazado'", "idDevolucionFalla=$_POST[idDev]");
            }

    }else{
        consultasSQL::UpdateSQL("devoluciones_por_fallas", "estadoDF='Rechazado'", "idDevolucionFalla=$_POST[idDev]");
        echo "<script>$('#bajaAprobada').modal('toggle');</script>";
    }
}


?>