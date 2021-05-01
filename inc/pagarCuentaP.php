<?php
include '../library/configServer.php';
include '../library/consulSQL.php';
if($consultaCuentaP= consultasSQL::UpdateSQL("cuentasPagar"," estado_cuentaP='pagado'", "idCuentaP=".$_POST['idCuenta'])){
    $folio="";
    
    $consultaCuentasPagar= ejecutarSQL::consultar("SELECT * FROM cuentasPagar inner join proveedor on cuentasPagar.idProveedor=proveedor.idProveedor where estado_cuentaP!='pagado'");	
    $resCuentasP=mysqli_num_rows($consultaCuentasPagar);
if($resCuentasP>0){
    echo '<table class="table table-bordered" style="text-align:center;font-size: 13px;">';
    echo '<tr><td><strong>Proveedor</strong></td><td><strong>Forma de compra</strong></td><td><strong>Folio</strong></td><td><strong>Tipo de pago</strong></td><td><strong>Fecha de compra</strong></td><td><strong>Fecha de pago</strong></td><td><strong>Total de la compra</strong></td><td><strong>Marcar como pagado</strong></td></tr>';
    while($cuentasPagar=mysqli_fetch_array($consultaCuentasPagar)){
    if($cuentasPagar['concepto']=='nota'){
    $consultaConcepto= ejecutarSQL::consultar("SELECT * FROM notas where idNota=".$cuentasPagar['idConcepto']);
    $nota=mysqli_fetch_array($consultaConcepto);
    $folio=$nota['folioNota'];
    }else{
      $consultaConcepto= ejecutarSQL::consultar("SELECT * FROM facturas where id_factura=".$cuentasPagar['idConcepto']);
      $nota=mysqli_fetch_array($consultaConcepto);
      $folio=$nota['numero_factura'];
    }
    echo '<tr><td>'.$cuentasPagar['NombreProveedor'].'</td><td>'.$cuentasPagar['concepto'].'</td><td>'.$folio.'</td><td>'.$cuentasPagar['tipo_compra'].'</td><td>'.$cuentasPagar['fecha_compra'].'</td><td>'.$cuentasPagar['fecha_pago'].'</td><td>$'.$cuentasPagar['costoCompra'].'</td><td class="text-center">
    <input type="hidden" id="'.$cuentasPagar['idCuentaP'].'" value="'.$cuentasPagar['idCuentaP'].'"><a id="marcarPagado" title="Marcar como pagado" class="btn btn-danger btn-xs" onclick="pagarCuentaP('.$cuentasPagar['idCuentaP'].');">
    <span class="glyphicon glyphicon-ok"></span>
    </a>
    </td></tr>';
    }
    echo '</table>';
}
}else{
  echo '<h4>No se encontraron cuentas por pagar.</h4>';  
}
?>