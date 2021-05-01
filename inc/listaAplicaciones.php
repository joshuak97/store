<?php

 include '../library/configServer.php';
 include '../library/consulSQL.php';
 session_start();

 $idProd=$_POST['idProd'];
 $SESSION['idEquivalencia']=0;

if($idProd!=0){
 $consultaAplicacion=mysqli_query($con,"SELECT idEquivalencia FROM producto where idProd=$idProd");
 $rescon=mysqli_fetch_array($consultaAplicacion);
 if($rescon['idEquivalencia']!=0){
 $_SESSION['idEquivalencia']=$rescon['idEquivalencia'];  
 $conEquivalencias=mysqli_query($con,"SELECT*FROM producto inner join marca ON producto.idMarca=marca.idMarca where idEquivalencia=".$rescon['idEquivalencia']);
 echo '<table class="table table-bordered" style="text-align:center;">';
 echo "<tr><td>Codigo</td><td>Equivalencias</td><td>Marca</td></tr>"; 
   
  while($productos=mysqli_fetch_array($conEquivalencias)){
  echo "<tr><td>".$productos['codProd']."</td><td>".$productos['nombreProd']."</td><td>".$productos['NombreMarca']."</td></tr>";
  }
echo "</table>";
 }else{
  $conprods=mysqli_query($con,"SELECT*FROM producto INNER JOIN marca ON producto.idMarca=marca.idMarca where idProd=".$idProd);  
  $productos=mysqli_fetch_array($conprods);  
 if(consultasSQL::InsertSQL("equivalencia","equivalencia,desEquivalencia","'".$productos['codProd']."','".$productos['codProd']." ".$productos['nombreProd']." ".$productos['NombreMarca']."'")){
  $conequivalencia=mysqli_query($con,"SELECT*FROM equivalencia ORDER BY idEquivalencia DESC limit 1");
  $equivalencia=mysqli_fetch_array($conequivalencia); 
  $_SESSION['idEquivalencia']=$equivalencia['idEquivalencia'];
  if(consultasSQL::UpdateSQL("producto","idEquivalencia=".$equivalencia['idEquivalencia'],"idProd=".$idProd)){
  echo '<table class="table table-bordered" style="text-align:center;">';
  echo "<tr><td>Codigo</td><td>Equivalencia</td><td>Marca</td></tr>";
  echo "<tr><td>".$productos['codProd']."</td><td>".$productos['nombreProd']."</td><td>".$productos['NombreMarca']."</td></tr>";  
  echo "</table>";
  }
}   
 } 
}
?>