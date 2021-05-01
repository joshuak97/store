<?php 
$sql_venta=mysqli_query($con,"select * from venta_contado where idVenta=".$_SESSION['idVentaM']);
$rw_venta=mysqli_fetch_array($sql_venta);
	if ($con){
?>
    <table cellspacing="0" style="width: 100%;">
        <tr>

            <td style="width: 25%; color: #444444;">
                <img style="width: 100%;" src="../../assets/img/logosa.jpeg" alt="Logo"><br>
                
            </td>
			<td style="width: 50%; color: #34495e;font-size:12px;text-align:center">
                <span style="color: #34495e;font-size:14px;font-weight:bold">EWORK SOLUTIONS S.A. </span>
				<br>Calle 3 Sur #541 Guadalupe Hidalgo 75799 Tehuacán, Puebla.
				Teléfono: +52 (238)2011511<br>
				Email: ventastehuacan@eworksolutions.com.mx
                
            </td>
			<td style="width: 25%;text-align:right">
              	<?php              
                echo "FOLIO: ".$rw_venta['NumFolio'];
                ?>
                
			</td>
			
        </tr>
    </table>
	<?php }?>	