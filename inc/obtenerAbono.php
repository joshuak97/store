<?php
if($_POST['total']>0 && $_POST['mesesC']>0){

$total=$_POST['total'];
$meses=number_format($_POST['mesesC'],2);
$abono=$total/$meses;


echo "$".number_format($abono,2);
}
?>