<?php

include '../library/configServer.php';
include '../library/consulSQL.php';
session_start();
$nombreCliente=$_POST['name-cliente'];
$rfcCliente=$_POST['rfc-cliente'];
$calleCliente=$_POST['calle-cliente'];
$noExterior=$_POST['nexterior-cliente'];
$noInterior=$_POST['ninterior-cliente'];
$cp=$_POST['cp-cliente'];
$coloniaCliente=$_POST['colonia-cliente'];
$estadoCliente=$_POST['estado-cliente'];
$municipioCliente=$_POST['municipio-cliente'];
$correoCliente=$_POST['correo-cliente'];
$telCliente=$_POST['tel-cliente'];
$apellidoCliente=$_POST['apellido-cliente'];
$nombreCompleto=$nombreCliente." ".$apellidoCliente;


if(!$correoCliente=="" && !$nombreCliente=="" && !$rfcCliente=="" && !$calleCliente==""  && !$noExterior==""  && !$noInterior==""  && !$cp==""  && !$coloniaCliente==""  && !$estadoCliente==""  && !$municipioCliente=="" && !$telCliente=="" && !$apellidoCliente==""){
    
 $verificar=  ejecutarSQL::consultar("SELECT * FROM cliente WHERE Nombre='".$nombreCliente."' AND Apellido='".$apellidoCliente."' AND RFC='".$rfcCliente."' AND Calle='".$calleCliente."' AND Email='".$coloniaCliente."' AND Email='".$estadoCliente."' AND Email='".$municipioCliente."' AND Email='".$correoCliente."' AND Telefono=".$telCliente);
            $verificaltotal = mysqli_num_rows($verificar);
            if($verificaltotal<=0){

    consultasSQL::InsertSQL("cliente", "Email, Nombre,NombreCompleto,RFC ,Calle,noExterior,noInterior, codigoPostal,colonia,estado,municipio,Telefono,Apellido", "'$correoCliente','$nombreCliente','$nombreCompleto','$rfcCliente','$calleCliente','$noExterior','$noInterior','$cp','$coloniaCliente','$estadoCliente','$municipioCliente','$telCliente','$apellidoCliente'");
    echo '<div id="resultadoP"><img src="assets/img/correcto.png" class="center-all-contens"><br><p class="lead text-center">Cliente registrado de manera exitosa</p></div>';
     echo "<script>
     document.getElementById('faddCliente').reset();                     
     </script>";
     
$_SESSION['rfcNuevoCliente']=$rfcCliente;
}else{

echo '<div id="resultadoP"><img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">El cliente ya existe</p></div>';
$_SESSION['rfcNuevoCliente']="";
}
}else{
        $_SESSION['rfcNuevoCliente']="";
     echo '<div id="resultadoP"><img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Error los campos no deben de estar vacíos</p></div>';
}

?>