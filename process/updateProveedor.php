<?php
include '../library/configServer.php';
include '../library/consulSQL.php';

sleep(5);

$id=$_POST['id'];
$nameProveUp=$_POST['prove-name'];
$rfcProveUp=$_POST['prove-rfc'];
$dirProveUp=$_POST['prove-dir'];
$telProveUp=$_POST['prove-tel'];
$correoProveUp=$_POST['prove-correo'];
$webProveUp=$_POST['prove-web'];

if(consultasSQL::UpdateSQL("proveedor"," NombreProveedor='$nameProveUp',correo='$correoProveUp',RFC='$rfcProveUp',Direccion='$dirProveUp',Telefono='$telProveUp',PaginaWeb='$webProveUp'", "idProveedor='$id'")){
    echo '
    <br>
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
    </script>
 ';
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