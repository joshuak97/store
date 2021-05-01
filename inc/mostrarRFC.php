<?php
include '../library/configServer.php';
include '../library/consulSQL.php';
session_start();
echo '<input type="text" value="'.$_SESSION['rfcNuevoCliente'].'" placeholder="Introduzca RFC del cliente" name="rfc-clientes" id="rfc-cliente" class="form-control" style="width:62%;" required> &nbsp &nbsp<input class="btn btn-danger" value="nuevo cliente" type="button" data-toggle="modal" data-target="#clientePopup">&nbsp &nbsp<input class="btn btn-danger" value="Consultar" type="button" data-toggle="modal" data-target="#consultaClientesPopup">'
?>