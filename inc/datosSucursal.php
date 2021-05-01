<?php
include '../library/configServer.php';
include '../library/consulSQL.php';
session_start();
$consultaNotas=ejecutarSQL::consultar("SELECT * FROM sucursal where idSucursal=".$_SESSION['sucursal']);
$sucursal=mysqli_fetch_array($consulta);
