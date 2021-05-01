<style type="text/css">

table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
.midnight-blue{
	background:#2c3e50;
	padding: 4px 4px 4px;
	color:white;
	font-weight:bold;
	font-size:12px;
}
.silver{
	background:white;
	padding: 3px 4px 3px;
}
.clouds{
	background:#ecf0f1;
	padding: 3px 4px 3px;
}
.border-top{
	border-top: solid 1px #bdc3c7;
	
}
.border-left{
	border-left: solid 1px #bdc3c7;
}
.border-right{
	border-right: solid 1px #bdc3c7;
}
.border-bottom{
	border-bottom: solid 1px #bdc3c7;
}
table.page_footer {width: 100%; border: none; background-color: white; padding: 15mm;border-collapse:collapse; border: none;}
}
</style>
<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >
        
    <?php 
    
    include("encabezado_productos.php");

	?>
   <br>
	<br>
	<div style="text-align:center;width:100%;" >
    <table class="table table-bordered" style="width: 100%; text-align: center;font-size: 12px">
		
        <tr>
		   <td style="width:8%" class='midnight-blue'>N°</td> 		
           <td style="width:15%" class='midnight-blue'>Nombre del Producto</td> 	
           <td style="width:8%" class='midnight-blue'>Cantidad</td>
		   <td style="width:15%" class='midnight-blue'>Precio de Compra</td>
		   <td style="width:15%" class='midnight-blue'>Precio de Venta</td>
			<td style="width:15%" class='midnight-blue'>Utilidad Unitaria</td>
			<td style="width:15%" class='midnight-blue'>Utilidad Total</td>

   
        </tr>
		 
        <?php
		$con=1;
$conVentas=ejecutarSQL::consultar("SELECT*FROM producto order by nombreProd");
while($ventas=mysqli_fetch_array($conVentas)){
$utilidad=$ventas['precioVenta']-$ventas['precioCosto'];
$utilidadT=$utilidad*$ventas['existencia'];
//echo '<div class="background-image: url(../assets/img/CONTORNO.png);">';	
echo '<tr>
<th scope="row">'.$con.'</th>
<td>'.$ventas['nombreProd'].'</td>
<td>'.$ventas['existencia'].'</td>
<td> $'.$ventas['precioCosto'].'</td>
<td> $'.$ventas['precioVenta'].'</td>
<td> $'.number_format($utilidad,2).'</td>
<td> $'.number_format($utilidadT,2).'</td>

</tr>';
$con++;	
}
    
    

        ?>

   </table>
	<br><br>
	<table class="table table-bordered" style="width: 100%; text-align: center;font-size: 12px">
		
        <tr>
		   <td style="width:35%" class='midnight-blue'>Total Invertido en Producto</td> 		
           <td style="width:35%" class='midnight-blue'>Utilidad por precio de venta</td> 	
           <td style="width:30%" class='midnight-blue'>Utilidad NETO</td>
		   

     
        </tr>
		<?php
       $conVentas=ejecutarSQL::consultar("SELECT * FROM producto");
while($ventas=mysqli_fetch_array($conVentas)){
$inversion=$inversion+($ventas['precioCosto']*$ventas['existencia']);
$utilidad=$utilidad+(($ventas['precioVenta']-$ventas['precioCosto'])*$ventas['existencia']);
$total=$total+($ventas['precioVenta']*$ventas['existencia']);

	}
echo '<tr>
<th scope="row"> $'.number_format($inversion,2).'</th>
<td> $'.number_format($total,2).'</td>
<td> $'.number_format($utilidad,2).'</td>
</tr>';
?>
		</table>
	</div>
	
	<page_footer>
        <table class="page_footer">
            <tr>

                <td style="width: 50%; text-align: left">
                    P&aacute;gina [[page_cu]]/[[page_nb]]
                </td>
                <td style="width: 50%; text-align: right">
                    &copy; <?php echo "EworkSolutions"; echo  $anio=date('Y'); ?>
                </td>
            </tr>
        </table>
		
    </page_footer>
	  

</page>

