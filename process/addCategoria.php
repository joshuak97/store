<?php

include '../library/configServer.php';
include '../library/consulSQL.php';

$marcaCodigo=$_POST['name-categoria'];

if(!$marcaCodigo==""){
    consultasSQL::InsertSQL("categoria", "descripcionCat", "'$marcaCodigo'");
            
            
            echo "<script>
                                        $('#categoriaPopup').hide();
                                        $('body').removeClass('modal-open');
                                        $('.modal-backdrop').remove();                               
                                        </script>";
}else {
    echo '<div id="resultado-marca"><img src="assets/img/incorrecto.png" class="center-all-contens"><br><p class="lead text-center">Error los campos no deben de estar vacíos</p></div>';
}


?>