<?php
include '../library/configServer.php';
include '../library/consulSQL.php';
$idProd=$_POST['recipient'];
$conProds=ejecutarSQL::consultar("SELECT * FROM producto where idProd=$idProd");
$prods=mysqli_fetch_array($conProds);
echo '<form action="process/updateProduct.php" method="post" role="form" style="margin: 20px;"  enctype="multipart/form-data" id="feditProd">';
echo '<input type="hidden" name="id" value="'.$idProd.'">';
echo '<div class="form-group">
<label>Código de producto</label>
<input type="text" class="form-control"  placeholder="Código" required  name="code-prod" value="'.$prods['codProd'].'">
</div>
<div class="form-group">
<label>Nombre de producto</label>
<input type="text" class="form-control"  placeholder="Nombre" required  name="prod-name" value="'.$prods['nombreProd'].'">
</div>
<div class="form-group">
<label>Codigo de SAT:</label>
<input type="text" class="form-control"  placeholder="Codigo de SAT" required name="prod-sat" value="'.$prods['codigoSat'].'">
</div>
<div class="form-group">
<label>Descripción de producto</label>
<textarea class="form-control"  placeholder="Descripción" required name="prod-des" rows="10" cols="40">'.$prods['desProd'].'</textarea>
</div>
<div class="form-group">
<label>Proveedor</label>
<select class="form-control" name="prod-Prove" id="select-proveedores">';
$proveedoresc=mysqli_query($con,"SELECT * FROM proveedor where idProveedor=".$prods['idProveedor']);
while($provc=mysqli_fetch_array($proveedoresc)){
    echo '<option value="'.$provc['idProveedor'].'">'.$provc['NombreProveedor'].'</option>';
}    

        $proveedoresc=mysqli_query($con,"SELECT * FROM proveedor  where idProveedor!=".$prods['idProveedor']);
        while($provc=mysqli_fetch_array($proveedoresc)){
            echo '<option value="'.$provc['idProveedor'].'">'.$provc['NombreProveedor'].'</option>';
        }
    
echo '</select>
</div>

<div class="form-group">
<label>Marca del producto</label>
<select class="form-control" name="prod-marca" id="select-marcas">';
$categoriac=mysqli_query($con,"SELECT * FROM marca where idMarca=".$prods['idMarca']);
while($catec=mysqli_fetch_array($categoriac)){
    echo '<option value="'.$catec['idMarca'].'">'.$catec['NombreMarca'].'</option>';
}
        $categoriac=mysqli_query($con,"SELECT * FROM marca  where idMarca!=".$prods['idMarca']);
        while($catec=mysqli_fetch_array($categoriac)){
            echo '<option value="'.$catec['idMarca'].'">'.$catec['NombreMarca'].'</option>';
        }

echo '</select>
</div>
';

echo '<div class="form-group">
<label>Categoria del producto</label>
<select class="form-control" name="prod-categoria" id="select-categoria">';

    
        $categoriac=mysqli_query($con,"SELECT * FROM categoria where idCategoria=".$prods['idCategoria']);
        while($catec=mysqli_fetch_array($categoriac)){
            echo '<option value="'.$catec['idCategoria'].'">'.$catec['descripcionCat'].'</option>';
        }
        $categoriac=mysqli_query($con,"SELECT * FROM categoria where idCategoria!=".$prods['idCategoria']);
        while($catec=mysqli_fetch_array($categoriac)){
            echo '<option value="'.$catec['idCategoria'].'">'.$catec['descripcionCat'].'</option>';
        }

echo '</select>
</div>';

echo '<div class="form-group">
<label>Precio de compra</label>
<input type="text" class="form-control"  name="pricec-prod" placeholder="Precio de Compra" required maxlength="20" value="'.$prods['precioCosto'].'">                                
</div>
<div class="form-group">
<label>Precio de venta</label>
<input type="text" class="form-control"  name="pricev-prod" placeholder="Precio de Compra" required maxlength="20" value="'.$prods['precioVenta'].'">                                
</div>
<div class="form-group">
<input type="checkbox" name="iva-prod" value="iva">&nbsp;&nbsp;Aplicar IVA
</div>';

echo '<div class="form-group"><label>Imagen del producto:</label></div>';                                
echo '<div class="form-group text-center" ><img src="assets/img-products/'.$prods['Imagen'].'" alt="Logo" width="200" height="200"></div>'; 
echo '<div class="form-group">                      
<input class="form-control" type="file" name="imgP">
</div>';

echo '<div></div>';

echo ' <div class=" form-group text-center">
<button type="submit" class="btn btn-primary btn-sm">Guardar</button>
<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Cancelar</button>
</div></form>';
?>