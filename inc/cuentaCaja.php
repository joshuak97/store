<?php
 session_start();
 include '../library/configServer.php';
 include '../library/consulSQL.php';
 ini_set('date.timezone','America/Mexico_City');
 //Primero que nada consultamos cuando fue el ultimo corte del usuario
 $verCC=ejecutarSQL::consultar("select*from corteCaja where idUsuario=".$_SESSION['idUser']." order by idCorte desc limit 1");
 $numcc=mysqli_num_rows($verCC);
 $montoGastos=0;
 $montoVentas=0;
 $montoCaja=0;
 $montoFinal=0;
 if($numcc>0){
 $cc=mysqli_fetch_array($verCC);
 $fechaCompletaCorte=$cc['fecha'];
 $fechaCorte=explode(" ",$cc['fecha']);
 $fecha=$fechaCorte[0];
 //Verificamos que el ultimo corte que se registro del usuario sea de caja abierta 
 if($cc['estado']=='abierta'){
 $montoCaja=$cc['monto'];    
    
 //Segundo, obtenemos los gastos de la jornada:
 $conDevoluciones=ejecutarSQL::consultar("SELECT*FROM gastos where fecha_registro>'$fechaCompletaCorte' AND fecha_Gasto>='$fecha' AND idVendedor=".$_SESSION['idUser']);
$res=mysqli_num_rows($conDevoluciones);
if($res>0){
while($gastos=mysqli_fetch_array($conDevoluciones)){
$montoGastos+=$gastos['monto'];
}
}
//Consultamos las ventas realizadas durante la jornada
$conVentas=ejecutarSQL::consultar("SELECT*FROM venta_contado where Fecha>'$fechaCompletaCorte' AND idVendedor=".$_SESSION['idUser']);
while($resVentas=mysqli_fetch_array($conVentas)){
$montoVentas+=$resVentas['totalPagar'];
}
//Realizamos la operacion para obtener el total de efectivo en caja:
$montoFinal=$montoCaja+$montoVentas-$montoGastos;
echo '<div class="form-group"><label>Se abre caja con ($):</label>
<input type="number" class="form-control" placeholder="$0.00" step="0.01" value="'.$montoCaja.'" name="montoCaja" readonly></div>';   
echo '<div class="form-group"><label>Total de Ventas ($):</label>
<input type="number" class="form-control" placeholder="$0.00" step="0.01" value="'.$montoVentas.'" name="montoVentas" readonly></div>';    
echo '<div class="form-group"><label>Total de gastos ($):</label>
<input type="number" class="form-control" placeholder="$0.00" step="0.01" value="'.$montoGastos.'" name="montoGastos" readonly></div>';     
echo '<div class="form-group"><label>Total en caja ($):</label>
<input type="number" class="form-control" placeholder="$0.00" step="0.01" value="'.$montoFinal.'" name="monto" readonly></div>';     
}else{
    echo '<div class="form-group"><label>Se abre caja con ($):</label>
    <input type="number" class="form-control" placeholder="$0.00" step="0.01" name="montoCaja" readonly></div>';   
    echo '<div class="form-group"><label>Total de Ventas ($):</label>
    <input type="number" class="form-control" placeholder="$0.00" step="0.01"  name="montoVentas" readonly></div>';    
    echo '<div class="form-group"><label>Total de gastos ($):</label>
    <input type="number" class="form-control" placeholder="$0.00" step="0.01"  name="montoGastos" readonly></div>';     
    echo '<div class="form-group"><label>Total en caja ($):</label>
    <input type="number" class="form-control" placeholder="$0.00" step="0.01" name="monto" readonly></div>';                    
}
 }else{
    echo '<div class="form-group"><label>Se abre caja con ($):</label>
    <input type="number" class="form-control" placeholder="$0.00" step="0.01" name="montoCaja" readonly></div>';   
    echo '<div class="form-group"><label>Total de Ventas ($):</label>
    <input type="number" class="form-control" placeholder="$0.00" step="0.01"  name="montoVentas" readonly></div>';    
    echo '<div class="form-group"><label>Total de gastos ($):</label>
    <input type="number" class="form-control" placeholder="$0.00" step="0.01"  name="montoGastos" readonly></div>';     
    echo '<div class="form-group"><label>Total en caja ($):</label>
    <input type="number" class="form-control" placeholder="$0.00" step="0.01" name="monto" readonly></div>';      
 }
?>