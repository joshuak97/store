<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';

sleep(5);
$nameProve= $_POST['prove-name'];
$dirProve= $_POST['prove-dir'];
$rfcProve= $_POST['prove-rfc'];
$telProve= $_POST['prove-tel'];
$correoProve= $_POST['prove-correo'];
$webProve= $_POST['prove-web'];

if(!$correoProve=="" && !$nameProve=="" && !$dirProve=="" && !$telProve=="" && !$webProve==""){
    consultasSQL::InsertSQL("proveedor", "correo, NombreProveedor,RFC ,Direccion, Telefono, PaginaWeb", "'$correoProve','$nameProve','$rfcProve','$dirProve','$telProve','$webProve'");
    $idProv=mysqli_insert_id($con);
     echo '<img src="assets/img/correcto.png" class="center-all-contens"><br><p class="lead text-center">Proveedor añadido éxitosamente</p>';
}else {
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Error los campos no deben de estar vacíos</p>';
}
