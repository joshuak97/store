<?php
include '../library/configServer.php';
include '../library/consulSQL.php';
session_start();
$idCliente=$_POST['idCliente'];
$consulta=ejecutarSQL::consultar("SELECT*FROM cliente where idCliente=".$idCliente);
$cliente=mysqli_fetch_array($consulta);
$_SESSION['rfcNuevoCliente']=$cliente['RFC'];
?>