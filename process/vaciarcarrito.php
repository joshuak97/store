<?php
session_start();
unset($_SESSION['producto']);
unset($_SESSION['productos2']);
unset($_SESSION['contador']);
unset($_SESSION['sumaTotal']);
unset($_SESSION['cantidad']);
unset($_SESSION['cantidad2']);

?>

<script>
    window.location = "../index.php";
</script>