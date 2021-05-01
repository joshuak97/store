<?php
include './library/consulSQL.php';
    include './process/securityPanel.php';

$mysqli = new mysqli("localhost","store_user","77_S0luti0ns_77","ews"); 

	
	$queryM = "SELECT*FROM proveedor";
	$resultadoM = $mysqli->query($queryM);
	
	$html= " ";
		while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['idProveedor']."'>".$rowM['NombreProveedor']."</option>";
        	
	}
	
	echo $html;
	
?>

