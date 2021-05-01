<?php
include '../library/configServer.php';
include '../library/consulSQL.php';
session_start();
$verificar1=  ejecutarSQL::consultar("SELECT porcentaje FROM precios where idPrecio=1");
$verificar2=  ejecutarSQL::consultar("SELECT porcentaje FROM precios where idPrecio=5");
$verificarPorcentaje = mysqli_fetch_array($verificar1);
$verificarIVA = mysqli_fetch_array($verificar2);
$porcentaje=$verificarPorcentaje['porcentaje'];
$iva=$verificarIVA['porcentaje'];
$idProd=$_POST['id'];
$codeProdUp=$_POST['code-prod'];
$nameProdUp=$_POST['prod-name'];
$codSat=$_POST['prod-sat'];
$desProdUp=$_POST['prod-des']; 
$marcaProdUp=$_POST['prod-marca'];
$categoriaProdUp=$_POST['prod-categoria'];
$pricecProdUp=$_POST['pricec-prod'];
$pricevProdUp=$_POST['pricev-prod'];
$siniva=0;
if(isset($_POST['iva-prod'])){
    $pricevProdUp=($pricevProdUp*$iva);
    }else{
    $pricevProdUp=($pricevProdUp*1);
    $siniva=1;    
    }
$proveProdUp=$_POST['prod-Prove'];
$carroProd="";
$idModelos="";
$desAplicacon="";

$contaError=0;
$nuevoIdModelos="";
$nuevoAplicaciones="";
$nuevoDesAplicacion="";
$conProd=ejecutarSQL::consultar("SELECT*FROM producto where idProd=".$idProd);
$prod=mysqli_fetch_array($conProd);

if(consultasSQL::UpdateSQL("producto", "idCategoria='$categoriaProdUp',codProd='$codeProdUp',nombreProd='$nameProdUp',codigoSat='$codSat',desProd='$desProdUp',precioCosto='$pricecProdUp',precioVenta='$pricevProdUp',idMarca='$marcaProdUp', idProveedor='$proveProdUp',siniva=".$siniva, "idProd='$idProd'")){
   
}else{
    $contaError++;
    echo '
    <br>
    <img class="center-all-contens" src="../assets/img/cancel.png">
    <p><strong>Error</strong></p>
       
 ';
}
if(!$_FILES['imgP']['name']==""){
    if(move_uploaded_file($_FILES['imgP']['tmp_name'],"../assets/img-products/".$_FILES['imgP']['name'])){
        if(consultasSQL::UpdateSQL("producto", "Imagen='".$_FILES['imgP']['name']."'", "idProd='$idProd'")){
         
        }else{
        $contaError++; 
        echo '<img src="../assets/img/incorrectofull.png" class="center-all-contens"><br>
        <h3>Ha ocurrido un error al editar los datos</h3>.
        <br>';   
        }
    }else{
        $contaError++;
        echo '<img src="../assets/img/incorrectofull.png" class="center-all-contens"><br>
              <h3>Ha ocurrido un error al cargar la imagen</h3>
              <br>';
        }
}




if($contaError==0){
echo '<script>window.location.href="../configAdmin.php";</script>';
}else{
    echo '<p class="lead text-cente">
    La pagina se redireccionara automaticamente. Si no es asi haga click en el siguiente boton.<br>
    <a href="../configAdmin.php" class="btn btn-primary btn-lg">Volver a administración</a>
    </p>';
}