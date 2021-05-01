<?php
include './library/consulSQL.php';
    include './process/securityPanel.php';

$mysqli = new mysqli("localhost","store_user","77_S0luti0ns_77","ews"); 

	
	$queryM = "SELECT*FROM marca";
	$resultadoM = $mysqli->query($queryM);
	
	$html= "<option>Actualizado</option>";
		while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['idMarca']."'>".$rowM['NombreMarca']."</option>";
        	
	}
	
	echo $html;
	
?>

