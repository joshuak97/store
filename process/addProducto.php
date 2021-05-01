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
        $numPart="1";
        $prodSat= $_POST['prod-sat'];
        $marcaProd= $_POST['prod-marca'];
        $carroProd="";
        $desAplicacon="";
        $preciocProd=$_POST['prod-price'];
        $desProd= $_POST['prod-des'];
        $adminProd= $_POST['admin-name'];
        $equivalencia=$_SESSION['idEquivalencia'];
        $siniva=0;
        if(isset( $_POST['iva-prod'])){
            $preciovProd=number_format($_POST['prodv-price']*$iva,2);
            }else{
            $siniva=1;    
            $preciovProd=number_format($_POST['prodv-price'],2);    
            }
        $lineas=array();
 
        
    if(!$codeProd=="" && !$nameProd=="" && !$provProd=="" && !$marcaProd=="" && !$preciocProd=="" && !$desProd=="" && !$_FILES['imgM']['name']=="" && !$prodSat==""){
        $verificar=  ejecutarSQL::consultar("SELECT * FROM producto WHERE codProd='".$codeProd."' AND idSucursal=".$_POST['sucursal-prodM']);
        $verificaltotal = mysqli_num_rows($verificar);
        if($verificaltotal<=0){
        if(move_uploaded_file($_FILES['imgM']['tmp_name'],"../assets/img-products/".$_FILES['imgM']['name'])){
        if(consultasSQL::InsertSQL("producto", "idProveedor, idMarca,codigoSat,codProd,nombreProd,precioCosto, precioVenta,Imagen, desProd,idSucursal,siniva", "$provProd,$marcaProd,$prodSat,'$codeProd', '$nameProd','$preciocProd','$preciovProd','".$_FILES['imgM']['name']."','$desProd',".$_POST['sucursal-prodM'].",".$siniva)){
        if(isset($_POST['sucursal-prodM'])){
		consultasSQL::UpdateSQL("producto", "idSucursal=".$_POST['sucursal-prodM'], "codProd='$codeProd'");	
		}
		echo '<img src="assets/img/correctofull.png" class="center-all-contens"><br>
        <h3>El producto se añadio a la tienda con éxito</h3>
         <br>';
        $_SESSION['contadorCarros']=0;
        $_SESSION['contadorNombres']=0;
        unset($_SESSION['listaModelos']);
        unset($_SESSION['contadorEquivalencias']);
        unset($_SESSION['listaEquivalencias']);
        unset($_SESSION['nombreModelo']);
        unset($_SESSION['anio']);
        unset($_SESSION['anio2']);
        $verificar=  ejecutarSQL::consultar("SELECT * FROM producto WHERE codProd='".$codeProd."'");
        $prodct=mysqli_fetch_array($verificar);
        unset($_SESSION['nombreModelo']);//$codeProd
        $_SESSION['cantidad3'][$_SESSION['contador3']]=1;
        $_SESSION['listaProd'][$_SESSION['contador3']]= $prodct['idProd'];
        $_SESSION['contador3']++;
        echo "<script>
        var d = document.getElementById('listaModelosM');
         while (d.hasChildNodes())
         d.removeChild(d.firstChild); 
         var e = document.getElementById('verCodProdM');
         while (e.hasChildNodes())
         e.removeChild(e.firstChild);  
        document.getElementById('faddProducto').reset();                         
        </script>";
        }else{
        echo '<img src="assets/img/incorrectofull.png" class="center-all-contens"><br>
        <h3>Ha ocurrido un error. Por favor intente nuevamente</h3>
       <br>';
        }   
        }else{
        echo '<img src="assets/img/incorrectofull.png" class="center-all-contens"><br>
              <h3>Ha ocurrido un error al cargar la imagen</h3>
              <br>';
        }
        }else{
        echo '<img src="assets/img/incorrectofull.png" class="center-all-contens"><br>
                    <h3>El Código de producto ya esta registrado.<br>Por favor ingrese otro código de producto</h3>
                    <br>';
            } 
        }else {
            echo '
                <img src="assets/img/incorrectofull.png" class="center-all-contens">
                <br>
                <h3>Error los campos no deben de estar vacíos</h3>
               <br>';
        }
       
       
        ?>
