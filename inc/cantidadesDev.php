<?php
session_start();
$_SESSION['cantDev'][$_POST['posicion']]=$_POST['cantidad'];
?>