<?php
session_start(); 

include '../library/configServer.php';
include '../library/consulSQL.php';
$num=$_POST['clien-number'];
if($num=='notlog'){
   $nameClien=$_POST['clien-name'];
   $passClien=  md5($_POST['clien-pass']); 
}
if($num=='log'){
   $nameClien=$_POST['clien-name'];
   $passClien=$_POST['clien-pass']; 
}
sleep(3);

$verdata=  ejecutarSQL::consultar("select * from usuarios where pass='".$passClien."' and user='".$nameClien."'");
$num= mysqli_num_rows($verdata);
if($num>0){
   $verAcc=ejecutarSQL::consultar("select * from usuarios where user='$nameClien' and pass='$passClien'");
   $acceso=mysqli_fetch_array($verAcc);
   $_SESSION['nombreUser']=$acceso['user'];
   $_SESSION['claveUser']=$acceso['pass'];
   $_SESSION['acceso']=$acceso['idTipoU'];
  echo "<script>location.href='venta.php'</script>";

}else{
    echo '<img src="assets/img/error.png" class="center-all-contens"><br>El nombre o contraseña invalidos por favor inicie sesion';
}
 


