<?php

 include '../library/configServer.php';
 include '../library/consulSQL.php';

session_start();
$posicion=$_POST['posicion'];
$lineas=array();

for($u=0;$u<$_SESSION['contadorNombres'];$u++){
if($u<$_SESSION['contadorNombres']-2){
if($u==$posicion){
$contador=0;    
$listamodelosdel=array();
if($_SESSION['anio2'][$u]!=" "){    
$consmodelosdel=mysqli_query($con,"SELECT*FROM modeloCarros inner join anoCarros on modeloCarros.idAno=anoCarros.idAno where nombreModelo='".$_SESSION['nombreModelo'][$u]."' and ano>=".$_SESSION['anio'][$u]." AND ano<=".$_SESSION['anio2'][$u]);
}else{
    $consmodelosdel=mysqli_query($con,"SELECT*FROM modeloCarros inner join anoCarros on modeloCarros.idAno=anoCarros.idAno where nombreModelo='".$_SESSION['nombreModelo'][$u]."' and ano=".$_SESSION['anio'][$u]);    
}
while($idModelos=mysqli_fetch_array($consmodelosdel)){
for($r=0;$r<$_SESSION['contadorCarros'];$r++){

if($r<$_SESSION['contadorCarros']-1){
if($_SESSION['listaModelos'][$r]==$idModelos['idModelo']){

$_SESSION['listaModelos'][$r]==$_SESSION['listaModelos'][$r+1];       

}
}else{
    $_SESSION['contadorCarros']=$_SESSION['contadorCarros']-1;
}

}
}  
   
   
$_SESSION['nombreModelos'][$u]=$_SESSION['nombreModelos'][$u];     
$_SESSION['anio'][$u]=$_SESSION['anio'][$u];
$_SESSION['anio2'][$u]=$_SESSION['anio2'][$u];   
}
}else{
    $_SESSION['contadorNombres']=$_SESSION['contadorNombres']-1;
}
}


if($_SESSION['contadorNombres']>0){
echo '<table class="table table-bordered" style="text-align:center;">';
echo '<tr><td>Modelo</td><td>Eliminar</td></tr>';
for($o = 0;$o< $_SESSION['contadorNombres'];$o++){
 $consCarros2=mysqli_query($con,"SELECT*FROM modeloCarros inner join lineaCarros on modeloCarros.idLinea=lineaCarros.idLinea where nombreModelo='".$_SESSION['nombreModelo'][$o]."' limit 1");
      $carros2=mysqli_fetch_array($consCarros2);
 $lineas[$o]=$carros2['nombreLinea'];     
} 

for($i = 0;$i< $_SESSION['contadorNombres'];$i++){
          
   
            echo "<tr><td>".$lineas[$i]." ".$_SESSION['nombreModelo'][$i]."(".$_SESSION['anio'][$i].$_SESSION['anio2'][$i].")</td>
            <td class='text-center'>
      <span title='eliminar' class='btn btn-danger btn-xs' value='".$_SESSION['nombreModelo'][$i]."' onclick='eliminarCarroM(".$i.");'>
        <span class='glyphicon glyphicon-remove'></span>
      </span>
    </td>
    </tr>";
 
    }

echo "</table>"; 
}else{
echo " ";	
} 
?>