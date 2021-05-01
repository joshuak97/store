<?php
include '../library/configServer.php';
include '../library/consulSQL.php';
$consulta=ejecutarSQL::consultar("SELECT*FROM mis_facturas order by idFact desc limit 1");
$datosFactura=mysqli_fetch_array($consulta);
echo '<iframe src="https://app.facturadigital.com.mx/docs/pdf/'.$datosFactura['folio_fiscal'].'.pdf" width="600" height="700">Detalles de factura</iframe>';
?>