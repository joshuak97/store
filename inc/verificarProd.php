<?php
include '../library/configServer.php';
include '../library/consulSQL.php';
$codProd=$_POST['codProd'];
if(!$codProd==""){
$consultaCodProd=ejecutarSQL::consultar("SELECT * FROM producto where codProd='$codProd' AND idSucursal=".$_POST['idSucursal']);
$validar=mysqli_num_rows($consultaCodProd);
if($validar>0){
echo '<label style="color:red;">Este codigo ya se encuentra registrado.</label>';	
echo '<script>
var campo=document.getElementById("codProds");
campo.classList.remove("valido");
campo.classList.add("invalido");
</script>'; 
}else{
echo '<label style="color:green;">Codigo disponible.</label>';
echo '<script>
var campo=document.getElementById("codProds");
campo.classList.remove("invalido");
campo.classList.add("valido");
</script>';	    
}
}else{
 echo '<script>';   
 echo 'campo.classList.remove("invalido");';
 echo 'campo.classList.remove("valido");';   
echo '</script>';
}	
?>