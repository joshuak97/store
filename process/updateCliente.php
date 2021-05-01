<?php
include '../library/configServer.php';
include '../library/consulSQL.php';

sleep(3);

$id=$_POST['id'];
$nombre= $_POST['name-cliente'];
$apellido=$_POST['apellido-cliente'];
$nombreCompleto=$nombre." ".$apellido;
$rfc=$_POST['rfc-cliente'];
$calle=$_POST['calle-cliente'];
$noExterior= $_POST['nexterior-cliente'];
$noInterior= $_POST['ninterior-cliente'];
$colonia= $_POST['colonia-cliente'];
$cp= $_POST['cp-cliente'];
$municipio= $_POST['municipio-cliente'];
$estado= $_POST['estado-cliente'];
$telefono= $_POST['tel-cliente'];
$email= $_POST['correo-cliente'];

if(consultasSQL::UpdateSQL("cliente","Nombre='".$nombre."',Apellido='".$apellido."',NombreCompleto='".$nombreCompleto."',RFC='".$rfc."',Calle='".$calle."',noExterior='$noExterior',noInterior='$noInterior',colonia='$colonia',municipio='$municipio',estado='$estado',codigoPostal='$cp',Telefono='$telefono',Email='$email'","idCliente=$id")){
    echo '<br>
    <img class="center-all-contens" src="assets/img/Check.png">
    <p><strong>Hecho</strong></p>
    <p class="text-center">
        Recargando<br>
        en 7 segundos
    </p>
    <script>
        setTimeout(function(){
        url ="configAdmin.php";
        $(location).attr("href",url);
        },7000);
    </script>';
}else{
    echo '
    <br>
    <img class="center-all-contens" src="assets/img/cancel.png">
    <p><strong>Error</strong></p>
    <p class="text-center">
        Recargando<br>
        en 7 segundos
    </p>
    <script>
        setTimeout(function(){
        url ="configAdmin.php";
        $(location).attr("href",url);
        },7000);
    </script>
 ';
}

?>