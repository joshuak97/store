<?php

include '../library/configServer.php';
include '../library/consulSQL.php';
session_start();

$num_prod=count($_SESSION['producto']);
$formaPago=$_POST['formaPago'];

if($formaPago=='forma1'){

echo 'forma1';

}