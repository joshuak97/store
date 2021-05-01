<?php
include '../library/configServer.php';
include '../library/consulSQL.php';

sleep(5);

$id=$_POST['id'];
$codeMarcaUp=$_POST['marca-code'];
$nameMarcaUp=$_POST['marca-name'];

if(consultasSQL::UpdateSQL("marca", "CodigoMarca='$codeMarcaUp',NombreMarca='$nameMarcaUp'", "idMarca='$id'")){
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

