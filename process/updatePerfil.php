<?php
include '../library/configServer.php';
include '../library/consulSQL.php';

sleep(3);

$id=$_POST['id'];
$color= $_POST['color-suc'];

if(!$_FILES['fondo-suc']['name']==""){
if(move_uploaded_file($_FILES['fondo-suc']['tmp_name'],"../assets/img/".$_FILES['fondo-suc']['name'])){    
if(consultasSQL::UpdateSQL("sucursal","color='$color', fondoSuc='".$_FILES['fondo-suc']['name']."'", "idSucursal=$id")){
    echo '<br>
    <img class="center-all-contens" src="assets/img/Check.png">
    <p><strong>Datos actualizados</strong></p>
    <script>window.location.href="../configAdmin.php"</script>';
}else{
    echo '
    <br>
    <img class="center-all-contens" src="assets/img/cancel.png">
    <p><strong>Error</strong></p>
 ';
}
}
}else{
    if(consultasSQL::UpdateSQL("sucursal","color='$color'", "idSucursal=$id")){
        echo '<br>
        <img class="center-all-contens" src="assets/img/Check.png">
        <p><strong>Datos actualizados</strong></p>
        <script>window.location.href="../configAdmin.php"</script>';
    }else{
        echo '
        <br>
        <img class="center-all-contens" src="assets/img/cancel.png">
        <p><strong>Error</strong></p>
     ';
    }
}
?>