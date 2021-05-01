<?php
include '../library/configServer.php';
include '../library/consulSQL.php';

$marcaCodigo=$_POST['marca-codigo'];
$marcaNombre=$_POST['marca-nombre'];

if(!$marcaCodigo=="" && !$marcaNombre==""){
    consultasSQL::InsertSQL("marca", "CodigoMarca, NombreMarca", "'$marcaCodigo','$marcaNombre'");
            
            
            echo "<script>
                                        $('#marcaPopup').hide();
                                        $('body').removeClass('modal-open');
                                        $('.modal-backdrop').remove();                               
                                        </script>";
}else {
    echo '<div id="resultado-marca"><img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Error los campos no deben de estar vacíos</p></div>';
}


?>