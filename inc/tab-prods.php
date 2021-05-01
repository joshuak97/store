<?php

include '../library/configServer.php';
include '../library/consulSQL.php';

session_start();
if($_SESSION['acceso']!=1){
	$where="AND idSucursal=".$_SESSION['sucursal'];
}else{
$where="";
}


$categorias=  ejecutarSQL::consultar("SELECT * FROM producto inner join proveedor on producto.idProveedor=proveedor.idProveedor inner join marca on producto.idMarca=marca.idMarca where ".$_POST['atributo']." like '%".$_POST['valor']."%' $where limit 100");
$prods=mysqli_num_rows($categorias);
if($prods>0){
     $ui=1;
     while($product=mysqli_fetch_array($categorias)){
        echo '<div id="update-product">
        <tr>
        <td>
         '.$product['idProd'].'
        </td>
        <td>
          '.$product['codProd'].'
        </td>
        <td>'.$product['nombreProd'].'</td>
        <td>'.$product['NombreMarca'].'</td>
     <td>'.$product['NombreProveedor'].'</td>
     <td>'.$product['precioCosto'].'</td>
     <td>'.$product['existencia'].'</td>';
     if($_SESSION['acceso']==1){
     $conSuc=ejecutarSQL::consultar("SELECT nombreSucursal FROM sucursal where idSucursal=".$product['idSucursal']);  
     $conSuc=mysqli_fetch_array($conSuc);
     echo '<td>'.$conSuc['nombreSucursal'].'</td>';
     }
      echo '<td><button class="btn btn-warning btn-sm" value="'.$product['idProd'].'"  data-whatever="'.$product['idProd'].'" data-toggle="modal" data-target="#editarProd"><i class="fa fa-edit"></i></button>
      <button class="btn btn-danger btn-sm" value="'.$product['idProd'].'"  data-whatever="'.$product['idProd'].'" data-toggle="modal" data-target="#delProdPopup" style="display:inline-block;"><i class="fa fa-trash"></i></button>
      ';
      echo '                              
      <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="delProdPopup">
      <div class="modal-dialog modal-sm">
      <div class="modal-content" id="modal-form-login">
      <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="btnClose">&times;</button>
      <h4 class="modal-title text-center text-danger" id="myModalLabel">¿Desea eliminar este producto?</h4>
       </div>
     <form action="process/delprod.php?val=1" method="post" role="form" style="margin: 20px;"  id="faddProveedor">                  
    <input type="hidden" name="prod-code" value="'.$product['idProd'].'">

<button type="submit" class="btn btn-primary btn-sm">Si</button>
<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">No</button>
</div>
<div class="" style="width: 100%; text-align: center; margin: 0;" id="addProveedor"></div>
</form>
</div>

</div>';
      echo '</td>';
      $ui=$ui+1;

    }
      
}else{
echo '<td></td><td><h4>No se han encontrado resultados</h4></td><td></td><td></td><td></td><td></td><td></td><td></td>';
}   
   ?>