<html>
    <head>
        <title>Producto</title>
        <meta charset="UTF-8">
        <meta http-equiv="Refresh" content="12;url=../configAdmin.php">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/font-awesome.min.css">
        <link rel="stylesheet" href="../css/normalize.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/style.css">
        <link rel="stylesheet" href="../css/media.css">
        <link rel="Shortcut Icon" type="image/x-icon" href="../assets/icons/logo.ico" />
        <script src="../js/jquery.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/autohidingnavbar.min.js"></script>
    </head>
    <body>
        <section>
        <div class="container">
        <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-3 text-center">
        <?php
        session_start();
        include '../library/configServer.php';
        include '../library/consulSQL.php';

        $verificar1=  ejecutarSQL::consultar("SELECT porcentaje FROM precios where idPrecio=1");
        $verificar2=  ejecutarSQL::consultar("SELECT porcentaje FROM precios where idPrecio=5");
        $verificarPorcentaje = mysqli_fetch_array($verificar1);
        $verificarIVA = mysqli_fetch_array($verificar2);
        $porcentaje=$verificarPorcentaje['porcentaje'];
        $iva=$verificarIVA['porcentaje'];
        $codeProd= $_POST['prod-codigo'];
        $nameProd= $_POST['prod-name'];
        $provProd= $_POST['prod-prov'];
        $prodSat= $_POST['prod-sat'];
        $marcaProd= $_POST['prod-marca'];
        $categoriaProd= $_POST['prod-categoria'];
        $preciocProd=$_POST['prod-price'];
        $unidadesProd= $_POST['prod-stock'];
        $desProd= $_POST['prod-des'];
        $adminProd= $_POST['admin-name'];
        $siniva=0;
        if(isset( $_POST['iva-prod'])){
        $preciovProd=($_POST['prodv-price']*$iva);
        }else{
        $siniva=1;    
        $preciovProd=($_POST['prodv-price']*$siniva);    
        }
        $lineas=array();
       
       
    if(!$codeProd=="" && !$nameProd=="" && $categoriaProd!=0 && !$provProd=="" && !$marcaProd=="" && !$preciocProd=="" && !$_FILES['img']['name']=="" && !$prodSat==""){
        $verificar=  ejecutarSQL::consultar("SELECT * FROM producto WHERE codProd='".$codeProd."' AND idSucursal=".$_POST['sucursal-prod']);
        $verificaltotal = mysqli_num_rows($verificar);
        if($verificaltotal<=0){
        if(move_uploaded_file($_FILES['img']['tmp_name'],"../assets/img-products/".$_FILES['img']['name'])){
        if(consultasSQL::InsertSQL("producto", "idCategoria,idProveedor, idMarca,codigoSat,codProd,nombreProd,precioCosto, precioVenta, existencia, Imagen, desProd,idSucursal,siniva", "$categoriaProd,$provProd,$marcaProd,$prodSat,'$codeProd', '$nameProd','$preciocProd','$preciovProd',$unidadesProd,'".$_FILES['img']['name']."','$desProd',".$_SESSION['sucursal'].",".$siniva)){
		if(isset($_POST['sucursal-prod'])){
		consultasSQL::UpdateSQL("producto", "idSucursal=".$_POST['sucursal-prod'], "codProd='$codeProd'");	
		}
			
        echo '<img src="../assets/img/correctofull.png" class="center-all-contens"><br>
        <h3>El producto se añadio a la tienda con éxito</h3>
        <p class="lead text-cente">
        La pagina se redireccionara automaticamente. Si no es asi haga click en el siguiente boton.<br>
        <a href="../configAdmin.php" class="btn btn-primary btn-lg">Volver a administración</a>
        </p>';
        }else{
        echo '<img src="../assets/img/incorrectofull.png" class="center-all-contens"><br>
        <h3>Ha ocurrido un error. Por favor intente nuevamente</h3>
        <p class="lead text-cente">
        La pagina se redireccionara automaticamente. Si no es asi haga click en el siguiente boton.<br>
        <a href="../configAdmin.php" class="btn btn-primary btn-lg">Volver a administración</a>
        </p>';
        }   
        }else{
        echo '<img src="../assets/img/incorrectofull.png" class="center-all-contens"><br>
              <h3>Ha ocurrido un error al cargar la imagen</h3>
              <p class="lead text-cente">
              La pagina se redireccionara automaticamente. Si no es asi haga click en el siguiente boton.<br>
              <a href="../configAdmin.php" class="btn btn-primary btn-lg">Volver a administración</a>
              </p>';
        }
        }else{
        echo '<img src="../assets/img/incorrectofull.png" class="center-all-contens"><br>
                    <h3>El Código de producto ya esta registrado.<br>Por favor ingrese otro código de producto</h3>
                    <p class="lead text-cente">
                        La pagina se redireccionara automaticamente. Si no es asi haga click en el siguiente boton.<br>
                        <a href="../configAdmin.php" class="btn btn-primary btn-lg">Volver a administración</a>
                    </p>';
            } 
        }else {
            echo '
                <img src="../assets/img/incorrectofull.png" class="center-all-contens">
                <br>
                <h3>Error los campos no deben de estar vacíos</h3>
                <p class="lead text-cente">
                    La pagina se redireccionara automaticamente. Si no es asi haga click en el siguiente boton.<br>
                    <a href="../configAdmin.php" class="btn btn-primary btn-lg">Volver a administración</a>
                </p>';
        }
			
        
        $_SESSION['contadorCarros']=0;
        $_SESSION['contadorNombres']=0;
        unset($_SESSION['listaModelos']);
        unset($_SESSION['contadorEquivalencias']);
        unset($_SESSION['listaEquivalencias']);
        unset($_SESSION['nombreModelo']);
        unset($_SESSION['anio']);
        unset($_SESSION['anio2']);
        unset($_SESSION['nombreModelo']);
        ?>
                </div>
            </div>
        </div>
    </section>
</body>
</html>