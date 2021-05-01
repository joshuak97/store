<?php
session_start();
include './../library/configServer.php';
include './../library/consulSQL.php';
$consultaCliente=ejecutarSQL::consultar("SELECT*FROM cliente where RFC='".$_POST['rfcCliente']."'");
$rw_cliente=mysqli_fetch_array($consultaCliente);
$_SESSION['idCliente']=$rw_cliente['idCliente'];
?>