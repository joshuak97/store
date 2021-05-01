<?php

session_start();

$folioVenta=$_POST['folioVenta'];

$_SESSION['folioVenta']=$folioVenta;

echo $_SESSION['folioVenta'];

?>