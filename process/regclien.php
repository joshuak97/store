<?php
include '../library/configServer.php';
include '../library/consulSQL.php';



$fullnameCliente= $_POST['clien-fullname'];
$nameUser=$_POST['clien-name'];
$apeCliente= $_POST['clien-lastname'];
$passCliente= md5($_POST['clien-pass']);
$emailCliente= $_POST['clien-email'];
 
if(!$nameUser=="" && !$apeCliente=="" && !$emailCliente=="" && !$fullnameCliente=="" && !$passCliente==""){
   
    $verificar=  ejecutarSQL::consultar(" SELECT* FROM usuarios where email='$emailCliente'");
    echo "SELECT* FROM usuarios where email='$emailCliente'";
    $verificaltotal = mysqli_num_rows($verificar);
   
    if($verificaltotal<=0){
        $verificar2=  ejecutarSQL::consultar(" SELECT* FROM usuarios where user='$nameUser'");
        echo " SELECT* FROM usuarios where user='$nameUser'";
        $verificaltotal2 = mysqli_num_rows($verificar2);
     
        if($verificaltotal2<=0){
    
        if(consultasSQL::InsertSQL("usuarios", "user, pass,idTipoU,Nombre,Apellido,idSucursal", "'$nameUser','$passCliente',5,'$fullnameCliente','$apeCliente',7")){
         echo   "usuarios", "user, pass,idTipoU,Nombre,Apellido,idSucursal", "'$nameUser','$passCliente',5,'$fullnameCliente','$apeCliente',7";
            echo '<img src="assets/img/ok.png" class="center-all-contens"><br>El registro se completo con éxito';

        }else{
           echo '<img src="assets/img/error.png" class="center-all-contens"><br>Ha ocurrido un error.<br>Por favor intente nuevamente'; 
        }
    }else{
        echo '<img src="assets/img/error.png" class="center-all-contens"><br>El nombre de usuario que ha ingresado ya esta registrado.';   
    }
    }else{
       echo '<img src="assets/img/error.png" class="center-all-contens"><br>El Correo electronico que ha ingresado ya esta registrado.';
    }
}else {
    echo '<img src="assets/img/error.png" class="center-all-contens"><br>Error los campos no deben de estar vacíos';
}

