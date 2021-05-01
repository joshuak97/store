<?php 

	if ($con){
?>
    <table cellspacing="0" style="width: 100%;">
        <tr>

            <td style="width: 25%; color: #444444;">
                <img style="width: 100%;" src="../assets/img/logosa.jpeg" alt="Logo"><br>
                
            </td>
			<td style="width: 50%; color: #34495e;font-size:12px;text-align:center">
                <span style="color: #34495e;font-size:14px;font-weight:bold">Sa Patiño S.A. </span>
				<br>Direccion Ciudad Etc.
				Teléfono: 783 333 333<br>
				Email: Email_patiño@patiño.com
                
            </td>
			<td style="width: 25%;text-align:right">
              	<?php
                $sql=mysqli_query($con, "select numeroFactura from mis_facturas order by numeroFactura desc limit 1");
                $row=mysqli_num_rows($sql);
                if($row==0){
                $numero_factura=1;
                
                }else{
                $row2=mysqli_fetch_array($sql);  
                $numero_factura=$row2['numeroFactura']+1;
                }
                echo "FACTURA Nº ".$numero_factura;
                ?>
                
			</td>
			
        </tr>
    </table>
	<?php }?>	