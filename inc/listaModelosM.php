<?php
include '../library/configServer.php';
include '../library/consulSQL.php';
session_start();

$nombreModelo=$_POST['nombreModelo'];
$anio=$_POST['anio'];
$anio2=$_POST['anio2'];
$lineas=array();
if($anio!=0 && $anio2!=0){
for($v=$anio;$v<$anio2;$v++){
$conModelos=mysqli_query($con,"SELECT*FROM modeloCarros inner join anoCarros on modeloCarros.idAno=anoCarros.idAno where nombreModelo='".$nombreModelo."' and ano=".$v); 
$modelo=mysqli_fetch_array($conModelos); 
$_SESSION['listaModelos'][$_SESSION['contadorCarros']]=$modelo['idModelo'];
$_SESSION['contadorCarros']++;
}

$_SESSION['nombreModelo'][$_SESSION['contadorNombres']]=$nombreModelo;
$_SESSION['anio'][$_SESSION['contadorNombres']]=$anio;
$_SESSION['anio2'][$_SESSION['contadorNombres']]=" a ".$anio2;
$_SESSION['contadorNombres']++;

  
for($o = 0;$o< $_SESSION['contadorNombres'];$o++){
$consCarros2=mysqli_query($con,"SELECT*FROM modeloCarros inner join lineaCarros on modeloCarros.idLinea=lineaCarros.idLinea where nombreModelo='".$_SESSION['nombreModelo'][$o]."' limit 1");
     $carros2=mysqli_fetch_array($consCarros2);
$lineas[$o]=$carros2['nombreLinea'];     
}  

echo '<table class="table table-bordered" style="text-align:center;">';
echo '<tr><td>Aplicaciones:</td><td>Eliminar</td></tr>';

for($i = 0;$i< $_SESSION['contadorNombres'];$i++){
          
     echo '<tr><td>'.$lineas[$i]." ".$_SESSION['nombreModelo'][$i]."(".$_SESSION['anio'][$i].$_SESSION['anio2'][$i].")</td>
     <td class='text-center'>
     <span title='eliminar' class='btn btn-danger btn-xs'value='".$_SESSION['nombreModelo'][$i]."' onclick='eliminarCarroM(".$i.")'>
     <span class='glyphicon glyphicon-remove'></span>
     </span>
     </td>
     </tr>";

   }

echo "</table>"; 
}else if($anio!=0 && $anio2==0){
 $conModelos=mysqli_query($con,"SELECT*FROM modeloCarros inner join anoCarros on modeloCarros.idAno=anoCarros.idAno where nombreModelo='".$nombreModelo."' and ano=".$anio); 
 $modelo=mysqli_fetch_array($conModelos);
 $_SESSION['listaModelos'][$_SESSION['contadorCarros']]=$modelo['idModelo'];
 $_SESSION['contadorCarros']++;
 $_SESSION['nombreModelo'][$_SESSION['contadorNombres']]=$nombreModelo;
 $_SESSION['anio'][$_SESSION['contadorNombres']]=$anio;
 $_SESSION['anio2'][$_SESSION['contadorNombres']]="";
 $_SESSION['contadorNombres']++;
 
 for($o = 0;$o< $_SESSION['contadorNombres'];$o++){
   $consCarros2=mysqli_query($con,"SELECT*FROM modeloCarros inner join lineaCarros on modeloCarros.idLinea=lineaCarros.idLinea where nombreModelo='".$_SESSION['nombreModelo'][$o]."' limit 1");
        $carros2=mysqli_fetch_array($consCarros2);
   $lineas[$o]=$carros2['nombreLinea'];     
  }  
  
 
 echo '<table class="table table-bordered" style="text-align:center;">';
 echo '<tr><td>Aplicaciones:</td><td>Eliminar</td></tr>';

for($i = 0;$i< $_SESSION['contadorNombres'];$i++){           
     echo '<tr><td>'.$lineas[$i]." ".$_SESSION['nombreModelo'][$i]."(".$_SESSION['anio'][$i].$_SESSION['anio2'][$i].")</td>
     <td class='text-center'>
     <span title='eliminar' class='btn btn-danger btn-xs' value='".$_SESSION['nombreModelo'][$i]."' onclick='eliminarCarroM(".$i.")'>
     <span class='glyphicon glyphicon-remove'></span>
     </span>
     </td>
     </tr>"; 
   }
     echo "</table>";  
}else{

}
?>