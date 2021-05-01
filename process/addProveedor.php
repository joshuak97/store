

<?php



include '../library/configServer.php';
include '../library/consulSQL.php';

$nombreProvedor=$_POST['name-proveedor'];
$rfcProveedor=$_POST['rfc-proveedor'];
$dirProveedor=$_POST['dir-proveedor'];
$correoProveedor=$_POST['correo-proveedor'];
$telProveedor=$_POST['tel-proveedor'];
$webProveedor=$_POST['web-proveedor'];



if(!$correoProveedor=="" && !$nombreProvedor=="" && !$rfcProveedor=="" && !$dirProveedor=="" && !$telProveedor=="" && !$webProveedor==""){
    
 $verificar=  ejecutarSQL::consultar("SELECT * FROM proveedor WHERE NombreProveedor='".$nombreProvedor."' AND RFC='".$rfcProveedor."' AND Direccion='".$dirProveedor."' AND correo='".$correoProveedor."' AND Telefono='".$telProveedor."' AND PaginaWeb='".$webProveedor."'");
            $verificaltotal = mysqli_num_rows($verificar);
            if($verificaltotal<=0){

    consultasSQL::InsertSQL("proveedor", "correo, NombreProveedor,RFC ,Direccion, Telefono, PaginaWeb", "'$correoProveedor','$nombreProvedor','$rfcProveedor','$dirProveedor','$telProveedor','$webProveedor'");
    
     echo '<div id="resultadoP"><img src="assets/img/correcto.png" class="center-all-contens"><br><p class="lead text-center">Proveedor añadido éxitosamente</p></div>';
     

                                        echo "<script>
                                        document.getElementById('faddProveedor').reset();
                                        $('#proveedorPopup').hide();
                                        $('body').removeClass('modal-open');
                                        $('.modal-backdrop').remove();                               
                                        </script>";

}
}else{

     echo '<div id="resultadoP"><img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Error los campos no deben de estar vacíos</p></div>';
}

 ?>