<?php
session_start();

if ($_SESSION['tipoVenta']=='contado') {

echo "<script>window.location.href='facturarContado.php'</script>";
 	
 } else if($_SESSION['tipoVenta']=='credito'){

echo "<script>window.location.href='facturarCredito.php'</script>";

}else{

}
?>