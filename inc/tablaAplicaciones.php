<?php

 include '../library/configServer.php';
 include '../library/consulSQL.php';

session_start();
$idProd=$_POST['idProd'];

for($u=0;$u<$_SESSION['contadorEquivalencias'];$u++){

if($u<$_SESSION['contadorEquivalencias']-1){
if($_SESSION['listaEquivalencias'][$u]==$idProd){

$_SESSION['listaEquivalencias'][$u]==$_SESSION['listaEquivalencias'][$u+1];		

}
}else{
	$_SESSION['contadorEquivalencias']=$_SESSION['contadorEquivalencias']-1;
}

}
if($_SESSION['contadorEquivalencias']>0){
echo '<table class="table table-bordered" style="text-align:center;">';
echo '<tr><td>Codigo</td><td>Nombre</td><td>Eliminar</td></tr>';
for($i = 0;$i< $_SESSION['contadorEquivalencias'];$i++){
    $consulta=ejecutarSQL::consultar("SELECT * from producto  where idProd=".$_SESSION['listaEquivalencias'][$i]);
    while($fila = mysqli_fetch_array($consulta)) {
            echo "<tr><td>".$fila['codProd']."</td>
            <td>".$fila['nombreProd']."</td>
            <td class='text-center'>
      <span title='eliminar' class='btn btn-danger btn-xs'value='".$_SESSION['listaEquivalencias'][$i]."' onclick='eliminarEquivalencia(".$_SESSION['listaEquivalencias'][$i].")'>
        <span class='glyphicon glyphicon-remove'></span>
      </span>
    </td>
    </tr>";
 
    }
}
echo "</table>";
}else{
echo " ";	
} 
?>