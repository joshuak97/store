<?php
include './library/consulSQL.php';
    include './process/securityPanel.php';
$mysqli = new mysqli('localhost', 'root', '', 'sa_patino'); 

$nombre_linea = $_POST['nombre_linea'];


	
	$queryM = "SELECT Distinct nombreModelo FROM modeloCarros inner join lineaCarros on modeloCarros.idLinea=lineaCarros.idLinea WHERE nombreLinea = '$nombre_linea' ORDER BY nombreModelo asc";
	$resultadoM = $mysqli->query($queryM);
	
	$html= " ";
		while($rowM = $resultadoM->fetch_assoc())
	{
		$html.= "<option value='".$rowM['nombreModelo']."'>".$rowM['nombreModelo']."</option>";
        	
	}
	
	echo $html;
	
?>

