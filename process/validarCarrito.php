<?php

$where=$_POST['where'];

session_start();

if($_SESSION['sumaTotal']<=0){

echo "<script>$('#noProductos').modal('toggle');</script>";

}else{
echo "<script>location.href='process/validarCompra.php'</script>";	
}
?>