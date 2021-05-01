<?php
session_start();
error_reporting(E_PARSE);
if ($_SESSION['acceso'] == 1 || $_SESSION['acceso'] == 2 ) {
    
} else {
    header("Location: index.php");
    exit();
}