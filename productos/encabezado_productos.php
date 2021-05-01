
<?php 

	if ($con){
?>
    <table  style="width: 100%;margin-top:30px;">
        <tr>

            <td style="width: 20%; color: #444444;">
            <img style="width: 100%;" src="../assets/img/logosa.jpeg" alt="Logo">   
                
            </td>
			<td style="width: 60%; color: #34495e;font-size:12px;text-align:center">
            <?php
            if($_SESSION['sucursalInventario']!=0){
                $consultaSuc=ejecutarSQL::consultar("SELECT nombreSucursal,nombreUbicacion FROM sucursal inner join ubicacion on sucursal.idUbicacion=ubicacion.idUbicacion");
                $resSuc=mysqli_fetch_array($consultaSuc);
            ?>
                <span style="color: #34495e;font-size:14px;font-weight:bold">Inventario de productos <?php echo $resSuc['nombreSucursal']." ".$resSuc['nombreUbicacion'];?>.</span>
                <?php
            }else{
                ?>
             <span style="color: #34495e;font-size:14px;font-weight:bold">Inventario de productos Ework Solutions.</span>
                
                <?php
            }
                ?>
            </td>
			<td style="width: 20%;text-align:right">
              	                
			</td>
			
        </tr>
    </table>
	<?php }?>	