<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';

sleep(5);
$codeMarca= $_POST['marca-code'];
$nameMarca= $_POST['marca-name'];

if(!$codeMarca=="" && !$nameMarca==""){
    consultasSQL::InsertSQL("marca", "CodigoMarca, NombreMarca", "'$codeMarca','$nameMarca'");
            echo '<img src="assets/img/correcto.png" class="center-all-contens"><br><p class="lead text-center">Categoría añadida éxitosamente</p>';
}else {
    echo '<img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Error los campos no deben de estar vacíos</p>';
}

