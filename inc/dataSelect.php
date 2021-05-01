<?php
if($_POST['valor']=='contado'){
echo'<label>Fecha de pago:</label>
<input type="date" class="form-control" name="cp-date" name="id-date">';
}else if($_POST['valor']=='credito'){
    echo'<label>Fecha de compra:</label>
    <input type="date" class="form-control" name="cp-date" name="id-date">';
    echo'<label>Fecha de pago:</label>
    <input type="date" class="form-control" name="cp-date2" name="id-date">';
}else{

}
?>