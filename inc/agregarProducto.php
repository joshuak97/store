<?php
session_start();
$_SESSION['cantidad3'][$_SESSION['contador3']]=1;
$_SESSION['listaProd'][$_SESSION['contador3']]= $_POST['idProd'];
$_SESSION['contador3']++;
?>