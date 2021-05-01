<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';

$nameAdmin= $_POST['admin-name'];
$passAdmin= md5($_POST['admin-pass']);
$nombreAdmin=$_POST['admin-nombre'];
$apellidoAdmin=$_POST['admin-apellido'];
$direccionAdmin=$_POST['admin-direccion'];
$telefonoAdmin=$_POST['admin-telefono'];
$accesoAdmin=$_POST['admin-acceso'];
$sucursal=$_POST['admin-suc'];
if(!$nameAdmin=="" && !$passAdmin=="" && !$nombreAdmin=="" && !$apellidoAdmin=="" && !$direccionAdmin=="" && !$telefonoAdmin=="" && !$accesoAdmin=="" && $sucursal!=0){
    $verificar=ejecutarSQL::consultar("select * from usuarios where user='".$nameAdmin."'");
    $verificaltotal = mysqli_num_rows($verificar);
    if($verificaltotal<=0){
        if(consultasSQL::InsertSQL("usuarios", "user, pass,idTipoU,Nombre,Apellido,Direccion,idSucursal", "'$nameAdmin','$passAdmin', $accesoAdmin,'$nombreAdmin','$apellidoAdmin','$direccionAdmin',$sucursal")){
            echo '<img src="assets/img/correcto.png" class="center-all-contens"><br><p class="lead text-center">Administrador añadido éxitosamente</p>';
             echo "<script>location.href='configAdmin.php'</script>";
        }else{
           echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Ha ocurrido un error.<br>Por favor intente nuevamente</p>'; 
        }
    }else{
        echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">El nombre que ha ingresado ya existe.<br>Por favor ingrese otro nombre</p>';
    }
}else {
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Error los campos no deben de estar vacíos</p>';
}