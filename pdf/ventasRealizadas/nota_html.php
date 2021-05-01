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
    $numero_factura=0;
    include("encabezado_factura.php");?>

    <br>
    

	
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
               
    </table>
    
       <br>
		<table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
        <tr>
		
          <td style="width:35%;" class="midnight-blue">VENDEDOR</td>
		  <td style="width:25%;" class="midnight-blue">FECHA</td>
		   <td style="width:40%;" class="midnight-blue">FORMA DE PAGO</td>
		
		
        </tr>
		<tr>
           <td style="width:35%;">
			<?php 
				$sql_user=mysqli_query($con,"select * from usuarios where idUsuario=".$rw_venta['idVendedor']);
				$rw_user=mysqli_fetch_array($sql_user);
				$id_vendedor=$rw_user['idUsuario'];
				echo $rw_user['Nombre']." ".$rw_user['Apellido'];
			?>
		   </td>
		  <td style="width:25%;"><?php echo date("d/m/Y");?></td>
		   <td style="width:40%;" >
				<?php 
				if($rw_venta['tipoPago']==1){
                echo 'Efectivo';
				}else if($rw_venta['tipoPago']==3){
                echo 'Pago con tarjeta';
				}else{
				echo 'Efectivo';	
				}
			
				?>
		   </td>
        </tr>
		
        
   
    </table>
	<br>
  
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <tr>
            <th style="width: 10%;text-align:center" class='midnight-blue'>CANT.</th>
            <th style="width: 60%" class='midnight-blue'>DESCRIPCION</th>
            <th style="width: 15%;text-align: right" class='midnight-blue'>PRECIO UNIT.</th>
            <th style="width: 15%;text-align: right" class='midnight-blue'>PRECIO TOTAL</th>
			
        </tr>

<?php

$nums=1;
$sumador_total=0;
$sumador_Iva=0;
$sqlPrecio=mysqli_query($con, "SELECT * from precios where idPrecio=".$rw_venta['tipoPago']);
$rowPrecio=mysqli_fetch_array($sqlPrecio);
$sqlIva=mysqli_query($con, "SELECT * from precios where idPrecio=5");
$rowIva=mysqli_fetch_array($sqlIva);
$iva=$rowIva['porcentaje']-1;
$contador=0;
$prod=array();
$cant=array();
$productos=explode(" ",$rw_venta['idProd']);
for($i=0;$i<count($productos);$i++){
$producto=explode(",",$productos[$i]);
$prod[$i]=$producto[0];
$cant[$i]=$producto[1];
$contador++;
}
for($u=0;$u<$contador;$u++){

$sql=mysqli_query($con, "SELECT * from producto inner join marca on producto.idMarca=marca.idMarca where idProd=".$prod[$u]);
while ($row=mysqli_fetch_array($sql))
	{
	if($rowPrecio['idPrecio']==1){
	$id_producto=$row["codProd"];
		$codigo_producto=$row['codProd'];
		$cantidad=$cant[$u];
		$nombre_producto=$row['codProd']."-".$row['nombreProd']." ".$row['NombreMarca'];
		$imp=$row['precioVenta']*$iva;
		$precio_venta=$row['precioVenta'];	
		$precio_venta_f=number_format($precio_venta,2);//Formateo variables
		$precio_venta_r=str_replace(",","",$precio_venta_f);//Reemplazo las comas
		$precio_total=$precio_venta_r*$cantidad;
		$precio_total_f=number_format($precio_total,2);//Precio total formateado
		$precio_total_r=str_replace(",","",$precio_total_f);//Reemplazo las comas
		$sumador_total+=$precio_total_r;//Sumador
		
	
	}else{
		$id_producto=$row["codProd"];
		$codigo_producto=$row['codProd'];
		$cantidad=$cant[$u];
		$nombre_producto=$row['codProd']."-".$row['nombreProd']." ".$row['NombreMarca'];
		$imp=$row['precioVenta']*$iva;
		if($row['siniva']==0){
		$precio_venta=$row['precioVenta']*$rowIva['porcentaje'];
		}else{
		$precio_venta=$row['precioVenta'];	
		}	
		$precio_venta_f=number_format($precio_venta,2);//Formateo variables
		$precio_venta_r=str_replace(",","",$precio_venta_f);//Reemplazo las comas
		$precio_total=$precio_venta_r*$cantidad;
		$precio_total_f=number_format($precio_total,2);//Precio total formateado
		$precio_total_r=str_replace(",","",$precio_total_f);//Reemplazo las comas
		$sumador_total+=$precio_total_r;//Sumador

	}
}
$sumador_Iva=$sumador_total*$iva;
if ($nums%2==0){
		$clase="clouds";
	} else {
		$clase="silver";
	}
	?>

        <tr>
            <td class='<?php echo $clase;?>' style="width: 10%; text-align: center"><?php echo $cantidad; ?></td>
            <td class='<?php echo $clase;?>' style="width: 60%; text-align: left;"><?php echo $nombre_producto;?></td>
            <td class='<?php echo $clase;?>' style="width: 15%; text-align: right"><?php echo $precio_venta_f;?></td>
            <td class='<?php echo $clase;?>' style="width: 15%; text-align: right"><?php echo $precio_total_f;?></td>
            
        </tr>

	<?php 
	//Insert en la tabla detalle_cotizacion
	
	$nums++;
	}
	$impuesto=13;
	$subtotal=number_format($sumador_total-$sumador_Iva,2,'.','');
	$total_iva=$sumador_Iva;
	$total_iva=number_format($total_iva,2,'.','');
	$total_factura=$subtotal+$total_iva;
?>
	  
        <tr>
            <td colspan="3" style="width: 85%; text-align: right;">SUBTOTAL $ </td>
            <td style="width: 15%; text-align: right;"> <?php echo number_format($subtotal,2);?></td>
        </tr>
		<tr>
            <td colspan="3" style="width: 85%; text-align: right;">IVA (<?php echo $iva*100; ?>)% <?php echo "$";?> </td>
            <td style="width: 15%; text-align: right;"> <?php echo number_format($total_iva,2);?></td>
        </tr><tr>
            <td colspan="3" style="width: 85%; text-align: right;">TOTAL <?php echo "$";?> </td>
            <td style="width: 15%; text-align: right;"> <?php echo number_format($total_factura,2);?></td>
        </tr>
		
    </table>
	
	
	
	<br>
	<div style="font-size:11pt;text-align:center;font-weight:bold">Gracias por su compra!</div>
	
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

<?php

unset($_SESSION['producto']);
unset($_SESSION['productos2']);
unset($_SESSION['contador']);
unset($_SESSION['sumaTotal']);
unset($_SESSION['cantidad']);
unset($_SESSION['cantidad2']);
    
?>