<?php
//echo $_POST['atributo'];
//echo $_POST['valor'];
include '../library/configServer.php';
include '../library/consulSQL.php';

if(!$_POST['valor']==""){
if($_POST['atributo']=='NombreProveedor'){

$folio="";
$consultaCuentasPagar= ejecutarSQL::consultar("SELECT * FROM cuentaspagar inner join proveedor on cuentaspagar.idProveedor=proveedor.idProveedor where estado_cuentaP!='pagado' AND ".$_POST['atributo']." like '%".$_POST['valor']."%'");	
$resCuentasP=mysqli_num_rows($consultaCuentasPagar);
if($resCuentasP>0){
echo '<table class="table table-bordered" style="text-align:center;font-size: 13px;">';
echo '<tr class="encabezado"><td><strong>Proveedor</strong></td><td><strong>Forma de compra</strong></td><td><strong>Folio</strong></td><td><strong>Tipo de pago</strong></td><td><strong>Fecha de compra</strong></td><td><strong>Fecha de pago</strong></td><td><strong>Total de la compra</strong></td><td><strong>Marcar como pagado</strong></td></tr>';
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
echo '<tr onclick="detallesCuentaP('.$cuentasPagar['idCuentaP'].');"><td>'.$cuentasPagar['NombreProveedor'].'</td><td>'.$cuentasPagar['concepto'].'</td><td>'.$folio.'</td><td>'.$cuentasPagar['tipo_compra'].'</td><td>'.$cuentasPagar['fecha_compra'].'</td><td>'.$cuentasPagar['fecha_pago'].'</td><td>$'.$cuentasPagar['costoCompra'].'</td><td class="text-center">
<input type="hidden" id="'.$cuentasPagar['idCuentaP'].'" value="'.$cuentasPagar['idCuentaP'].'"><a id="marcarPagado" title="Marcar como pagado" class="btn btn-danger btn-xs" onclick="pagarCuentaP('.$cuentasPagar['idCuentaP'].');">
  <span class="glyphicon glyphicon-ok"></span>
</a>
</td></tr>';
}
echo '</table>';
}else{
echo '<h4>No se encontraron cuentas por pagar.</h4>';  
}
}else if($_POST['atributo']=='folioNota'){
    $folio="";
    $consultaCuentasPagar= ejecutarSQL::consultar("SELECT * FROM cuentaspagar inner join proveedor on cuentasPagar.idProveedor=proveedor.idProveedor inner join notas on cuentasPagar.idConcepto=notas.idNota where estado_cuentaP!='pagado' AND concepto='nota' AND ".$_POST['atributo']." like '%".$_POST['valor']."%'");	
    $resCuentasP=mysqli_num_rows($consultaCuentasPagar);
    if($resCuentasP>0){
    echo '<table class="table table-bordered" style="text-align:center;font-size: 13px;">';
    echo '<tr  class="encabezado"><td><strong>Proveedor</strong></td><td><strong>Forma de compra</strong></td><td><strong>Folio</strong></td><td><strong>Tipo de pago</strong></td><td><strong>Fecha de compra</strong></td><td><strong>Fecha de pago</strong></td><td><strong>Total de la compra</strong></td><td><strong>Marcar como pagado</strong></td></tr>';
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
    echo '<tr onclick="detallesCuentaP('.$cuentasPagar['idCuentaP'].');"><td>'.$cuentasPagar['NombreProveedor'].'</td><td>'.$cuentasPagar['concepto'].'</td><td>'.$folio.'</td><td>'.$cuentasPagar['tipo_compra'].'</td><td>'.$cuentasPagar['fecha_compra'].'</td><td>'.$cuentasPagar['fecha_pago'].'</td><td>$'.$cuentasPagar['costoCompra'].'</td><td class="text-center">
    <input type="hidden" id="'.$cuentasPagar['idCuentaP'].'" value="'.$cuentasPagar['idCuentaP'].'"><a id="marcarPagado" title="Marcar como pagado" class="btn btn-danger btn-xs" onclick="pagarCuentaP('.$cuentasPagar['idCuentaP'].');">
      <span class="glyphicon glyphicon-ok"></span>
    </a>
    </td></tr>';
    }
    echo '</table>';
    }else{
    echo '<h4>No se encontraron cuentas por pagar.</h4>';  
    }  
}else if($_POST['atributo']=='numero_factura'){
    $folio="";
    $consultaCuentasPagar= ejecutarSQL::consultar("SELECT * FROM cuentaspagar inner join proveedor on cuentasPagar.idProveedor=proveedor.idProveedor inner join facturas on cuentasPagar.idConcepto=facturas.id_factura where estado_cuentaP!='pagado' AND concepto='facturas' AND ".$_POST['atributo']." like '%".$_POST['valor']."%'");	
    $resCuentasP=mysqli_num_rows($consultaCuentasPagar);
    if($resCuentasP>0){
    echo '<table class="table table-bordered" style="text-align:center;font-size: 13px;">';
    echo '<tr  class="encabezado"><td><strong>Proveedor</strong></td><td><strong>Forma de compra</strong></td><td><strong>Folio</strong></td><td><strong>Tipo de pago</strong></td><td><strong>Fecha de compra</strong></td><td><strong>Fecha de pago</strong></td><td><strong>Total de la compra</strong></td><td><strong>Marcar como pagado</strong></td></tr>';
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
    echo '<tr onclick="detallesCuentaP('.$cuentasPagar['idCuentaP'].');"><td>'.$cuentasPagar['NombreProveedor'].'</td><td>'.$cuentasPagar['concepto'].'</td><td>'.$folio.'</td><td>'.$cuentasPagar['tipo_compra'].'</td><td>'.$cuentasPagar['fecha_compra'].'</td><td>'.$cuentasPagar['fecha_pago'].'</td><td>$'.$cuentasPagar['costoCompra'].'</td><td class="text-center">
    <input type="hidden" id="'.$cuentasPagar['idCuentaP'].'" value="'.$cuentasPagar['idCuentaP'].'"><a id="marcarPagado" title="Marcar como pagado" class="btn btn-danger btn-xs" onclick="pagarCuentaP('.$cuentasPagar['idCuentaP'].');">
      <span class="glyphicon glyphicon-ok"></span>
    </a>
    </td></tr>';
    }
    echo '</table>';
    }else{
    echo '<h4>No se encontraron cuentas por pagar.</h4>';  
    }  
}}
?>