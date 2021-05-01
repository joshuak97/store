<?php
include '../library/configServer.php';



	
	$queryM = "SELECT*FROM categoria order by idCategoria desc";
	$resultadoM = mysqli_query($con,$queryM);
	
	
		while($rowM=mysqli_fetch_array($resultadoM)){
		echo "<option value='".$rowM['idCategoria']."'>".$rowM['descripcionCat']."</option>";
        	
	}
	

	
?>