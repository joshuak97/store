<?php
include '../library/configServer.php';
include '../library/consulSQL.php';
session_start();


$consultadev=ejecutarSQL::consultar("SELECT*FROM baja_falla where idBaja=$_POST[idBaja]");
$resBaja=mysqli_fetch_array($consultadev);

if($_POST['accion']=="Aprobar"){//Si la accion a realizar es aprobar
 
    $consultaProd=ejecutarSQL::consultar("SELECT existencia,stockDanado FROM producto where idProd=$resBaja[idProd]");
    $prod=mysqli_fetch_array($consultaProd);
    $nuevaExistencia=$prod['existencia']-$resBaja['cantidadBaja'];
    $nuevoStock=$prod['stockDanado']+$resBaja['cantidadBaja'];
    
    if(consultasSQL::UpdateSQL("producto", "stockDanado=$nuevoStock, existencia=".$nuevaExistencia, "idProd=$resBaja[idProd]")){
        consultasSQL::UpdateSQL("baja_falla", "estado='Aprobado'", "idBaja=$_POST[idBaja]");
        echo "<script>$('#bajaAprobada').modal('toggle');</script>";
        
    }else{
            echo "<script>$('#bajaError').modal('toggle');</script>";    
        }

}else{//Si la accion es rechazar
    if($resBaja['estado']=="Aprobado"){//Si el estado de la baja es aprobado
    
        $consultaProd=ejecutarSQL::consultar("SELECT existencia,stockDanado FROM producto where idProd=$resBaja[idProd]");
        $prod=mysqli_fetch_array($consultaProd);
        $nuevaExistencia=$prod['existencia']+$resBaja['cantidadBaja'];
        $nuevoStock=$prod['stockDanado']-$resBaja['cantidadBaja']; 
        
        if(consultasSQL::UpdateSQL("producto", "stockDanado=$nuevoStock, existencia=".$nuevaExistencia, "idProd=$resBaja[idProd]")){
            consultasSQL::UpdateSQL("baja_falla", "estado='Rechazado'", "idBaja=$_POST[idBaja]");
            echo "<script>$('#bajaAprobada').modal('toggle');</script>";
            }else{
                echo "<script>$('#bajaError').modal('toggle');</script>";    
            }

    }else{
        consultasSQL::UpdateSQL("baja_falla", "estado='Rechazado'", "idBaja=$_POST[idBaja]");
        echo "<script>$('#bajaAprobada').modal('toggle');</script>";
    }
}
?>