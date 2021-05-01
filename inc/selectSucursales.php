 <?php

 include '../library/consulSQL.php';

$idTipoSucursal=$_POST['idTipoSucursal'];
$idUbicacion=$_POST['idUbicacion'];

$queryM=ejecutarSQL::consultar("SELECT*FROM sucursal WHERE idTipoSucursal=".$idTipoSucursal." AND idUbicacion=".$idUbicacion);
echo "<option value='0'>Seleccione sucursal:</option>";


	while($rowM=mysqli_fetch_array($queryM)){
		echo "<option value='".$rowM['idSucursal']."'>".$rowM['nombreSucursal']."-".$rowM['direccion']."</option>";
        	
	}
	


 ?>