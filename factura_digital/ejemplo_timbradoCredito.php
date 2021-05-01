<?php 
session_start();
include '../library/consulSQL.php';
require 'vendor/autoload.php';
ini_set('date.timezone','America/Mexico_City');
if(!$_SESSION['folioVentaRealizada']==""){		
$conVenta=ejecutarSQL::consultar("SELECT*FROM venta_credito where NumFolioC='".$_SESSION['folioVentaRealizada']."'");
$venta=mysqli_fetch_array($conVenta);
$conFacturas=ejecutarSQL::consultar("select*from mis_facturas order by idFact desc limit 1");
$numFacturas=mysqli_num_rows($conFacturas);
if($numFacturas>0){
$factura=mysqli_fetch_array($conFacturas);
$folio=$factura['folio_factura']+1;
}else{
$folio='1';
}
$consultaPrecios=ejecutarSQL::consultar("select * from precios where idPrecio=2");
$resprecioCredito=mysqli_fetch_array($consultaPrecios);
$precioCredito=$resprecioCredito['porcentaje'];
$consultaIva=ejecutarSQL::consultar("select * from precios where idPrecio=5");
$iva=mysqli_fetch_array($consultaIva);
$civa=0;  
$fecha=date('d/m/Y , H:i:s',time());
$idVenta=$venta['idVentaC'];
$tipoVenta="credito";
$idCliente=$venta['idCliente'];
$totalFactura=$venta['totalPagar'];
$idVendedor=$venta['idVendedor'];
$uso=$_SESSION['usoCDFI'];
$ivaTotal=0;
if(consultasSQL::InsertSQL("mis_facturas","folio_factura,fecha_emision,idVenta,tipoVenta,idCliente,idVendedor,total_factura","'$folio','$fecha',$idVenta,'$tipoVenta',$idCliente,$idVendedor,$totalFactura")){
	try {
		# llenamos los datos de nuestro CFDI
		# crearemos un xml de prueba
		$d = array();
		#$d['printxml'] = true; # nos permite imprimir el xml generado para debug
	
		# datos basicos SAT
		$d['Serie'] 			= 'F';
		$d['Folio'] 			= $folio;  #'101';  
		$d['Fecha'] 			= 'AUTO';
		//01=Efectivo 04=tarjeta de credito 28=tarjeta de debito
	
			$formaPago='99';
		
		$d['FormaPago'] 		= $formaPago;
		$d['CondicionesDePago'] = 'Pago en parcialidades';
		$conProductos=explode(" ",$venta['idProd']);//Obtenemos la lista de productos que contiene la venta:
		$suma=0;
		$total=0;
		$numProd=number_format(count($conProductos),2);
		$descuento=0;
		$d['Descuento']= '0.00';	
		$d['Moneda'] 			= 'MXN';
		$d['TipoCambio'] 		= 1;
		//$d['Total'] 			= number_format($total,2,'.','');
		$d['TipoDeComprobante'] = 'I';
		$d['MetodoPago'] 		= 'PPD';
		$d['LugarExpedicion'] 	= '92800';
	
		# opciones de personalización (opcionales)
		$d['LeyendaFolio'] 		= "FACTURA"; # leyenda opcional para poner a lado del folio: FACTURA, RECIBO, NOTA DE CREDITO, ETC.
	
		# codigo de confirmación PAC para cfdis mayores a $20 millones
		# $d['Confirmacion'] = null;
	
		# CFDIs relacionados
		# $d['CfdiRelacionados']['TipoRelacion'] = null;
		# $d['CfdiRelacionados'][0]['UUID'] = null;
	
		# Regimen fiscal del emisor ligado al tipo de operaciones que representa este CFDI
		$d['Emisor']['RegimenFiscal'] = '612'; # ver catálogo del SAT
	    
		# Datos del receptor
		$conCliente=ejecutarSQL::consultar("SELECT * FROM cliente where idCliente=".$venta['idCliente']);
		$cliente=mysqli_fetch_array($conCliente);
		if($cliente['pais']=='Mexico'){
		$rfc=$cliente['RFC'];
		}else{
		$rfc=$cliente['rfcGenerico'];;
		}
		$d['Receptor']['Rfc'] =$rfc;
		$d['Receptor']['Nombre'] =$cliente['NombreCompleto'];
		# $d['Receptor']['ResidenciaFiscal'] = 'MEX'; # solo se usa cuando el receptor no esté dado de alta en el SAT
		if($cliente['pais']!='Mexico'){
		$rfcGenerico=$cliente['rfcGenerico'];
		}else{
		$rfcGenerico=' ';
		}
		$d['Receptor']['NumRegIdTrib'] =$rfcGenerico; # para extranjeros
		$d['Receptor']['UsoCFDI'] = $uso; # uso que le dará el cliente al cfdi
	
		# Receptor -> Domicilio (OPCIONAL)
		$d["Receptor"]["Calle"] = $cliente['Calle'];
		$d["Receptor"]["NoExt"] = $cliente['noExterior'];
		#$d["Receptor"]["NoInt"] = null;
		$d["Receptor"]["Colonia"] = $cliente['colonia'];
		#$d["Receptor"]["Localidad"] = null;
		#$d["Receptor"]["Referencia"] = null;
		$d["Receptor"]["Municipio"] = $cliente['municipio'];
		$d["Receptor"]["Estado"] = $cliente['estado'];
		$d["Receptor"]["Pais"] = $cliente['pais'];
		$d["Receptor"]["CodigoPostal"] = $cliente['codigoPostal'];
	    $ivaFinal=0;
		for($x=0;$x<count($conProductos);$x++){
		
		$prods=explode(",",$conProductos[$x]);
		$conProd=ejecutarSQL::consultar("SELECT * FROM producto where idProd=".$prods[0]);
		$prodres=mysqli_fetch_array($conProd);
		# >> conceptos <<
		
		# concepto 1      
    
		$d['Conceptos'][$x]['ClaveProdServ'] =$prodres['codigoSat'];
		$d['Conceptos'][$x]['NoIdentificacion'] =$prodres['codProd']; #codigo interno o SKU, GTIN, codigo de barras, etc.
		$d['Conceptos'][$x]['Cantidad'] =$prods[1];
		$d['Conceptos'][$x]['ClaveUnidad'] = 'H87'; # Clave SAT
		$d['Conceptos'][$x]['Unidad'] = 'Pieza'; # Unidad de Medida
        $d['Conceptos'][$x]['Descripcion'] =$prodres['desProd']; #maximo 1000 caracteres
        
		if($prodres['siniva']==0){
        $precioC=number_format($prodres['precioCosto']*$precioCredito*$iva['porcentaje'],2);
        echo $precioC."<br>";
        $ivau=$precioC*0.16;
        echo $ivau;
        $pu=$precioC-$ivau;
        echo "<br>".$pu;
		$d['Conceptos'][$x]['ValorUnitario'] =$pu;
		$importe=number_format($pu*$prods[1],2,'.','');
        $totalIva=$ivau*$prods[1];
        echo "<br>".$totalIva;
		}else{
        $pu=$prodres['precioCosto']*$precioCredito;
		$d['Conceptos'][$x]['ValorUnitario']=$pu;
		$importe=number_format($pu*$prods[1],2,'.','');    
		}
        $base=$importe;
        echo "Importe: ".$importe."<br>";
		$d['Conceptos'][$x]['Importe'] =$importe;
		
		
		$d['Conceptos'][$x]['Descuento'] = '0.00'; # no se permiten valores negativos
	
		if($prodres['siniva']==0){		
		
		
		$d['Conceptos'][$x]['Impuestos']['Traslados'][0]['Base']=$base+$totalIva;
		$d['Conceptos'][$x]['Impuestos']['Traslados'][0]['Impuesto'] 	= '002';
		$d['Conceptos'][$x]['Impuestos']['Traslados'][0]['TipoFactor'] = 'Tasa';
		$d['Conceptos'][$x]['Impuestos']['Traslados'][0]['TasaOCuota'] ='0.160000';
	//	if($prodres['siniva']==0){
		$d['Conceptos'][$x]['Impuestos']['Traslados'][0]['Importe']    =$totalIva;
		$civa++;
		}else{
		$totalIva=0;	
		}
		$ivaFinal+=$totalIva;
		$suma+=$base;
	
		# concepto 1 -> impuestos
	   
		
	//	}else{
		//	$d['Conceptos'][$x]['Impuestos']['Traslados'][0]['Importe']  ='0.00';
		//}
	
		}


		$subtotal=number_format($suma,2,'.','');
		echo "Subtotal: ".$subtotal."<br>";
		$d['SubTotal'] 			= $subtotal;
		$d['Total'] 			=number_format($subtotal-$descuento+$ivaFinal,2,".","");
		/*
		$d['Concepto'][0]['Impuestos']['Retenciones'][0]['Base'] = 1;
		$d['Concepto'][0]['Impuestos']['Retenciones'][0]['Impuesto'] = '002';
		$d['Concepto'][0]['Impuestos']['Retenciones'][0]['TipoFactor'] = 'Tasa';
		$d['Concepto'][0]['Impuestos']['Retenciones'][0]['TasaOCuota'] = 16.000;
		$d['Concepto'][0]['Impuestos']['Retenciones'][0]['Importe'] = 150.00;
		*/
	
		/*
		$d['Concepto'][0]['InformacionAduanera'][0]['NumeroPedimento'] = '10 47 4344 8783676';
		$d['Concepto'][0]['InformacionAduanera'][1]['NumeroPedimento'] = '10 47 6564 1197423';
		*/
	
		# concepto 2
		#$d['Conceptos'][1]['ClaveProdServ'] = '01010101';
		#$d['Conceptos'][1]['NoIdentificacion'] = '01'; #codigo interno o SKU, GTIN, codigo de barras, etc.
		#$d['Conceptos'][1]['Cantidad'] = 1.00;
		#$d['Conceptos'][1]['ClaveUnidad'] = 'F52';
		#$d['Conceptos'][1]['Unidad'] = 'TONELADA';
		#$d['Conceptos'][1]['Descripcion'] = 'ESTRUCTURA DE ACERO INOXIDABLE SKX478'; #maximo 1000 caracteres
		#$d['Conceptos'][1]['ValorUnitario'] = 500.00;
		#$d['Conceptos'][1]['Importe'] = 500.00; # solo valores positivos si el tipo de comprobante es "I", "E", "N". Si es "T" puede ser mayor o igual a cero. Si es "P" (Pago), debe ser cero forzosamente.
		#Conceptos$d['Concepto'][1]['Descuento'] = null; # no se permiten valores negativos
	
		# concepto 2 -> impuestos
		/*
		$d['Concepto'][1]['Impuestos']['Traslados'][0]['Base'] = 1;
		$d['Concepto'][1]['Impuestos']['Traslados'][0]['Impuesto'] = 'IVA';
		$d['Concepto'][1]['Impuestos']['Traslados'][0]['TipoFactor'] = 'Tasa';
		$d['Concepto'][1]['Impuestos']['Traslados'][0]['TasaOCuota'] = 1;
		$d['Concepto'][1]['Impuestos']['Traslados'][0]['Importe'] = 85.00;
	
		$d['Concepto'][1]['Impuestos']['Traslados'][1]['Base'] = 2;
		$d['Concepto'][1]['Impuestos']['Traslados'][1]['Impuesto'] = 'ISR';
		$d['Concepto'][1]['Impuestos']['Traslados'][1]['TipoFactor'] = 'Tasa';
		$d['Concepto'][1]['Impuestos']['Traslados'][1]['TasaOCuota'] = 1;
		$d['Concepto'][1]['Impuestos']['Traslados'][1]['Importe'] = 240.00;
	
		$d['Concepto'][1]['Impuestos']['Traslados'][2]['Base'] = 2;
		$d['Concepto'][1]['Impuestos']['Traslados'][2]['Impuesto'] = 'IEPS';
		$d['Concepto'][1]['Impuestos']['Traslados'][2]['TipoFactor'] = 'Tasa';
		$d['Concepto'][1]['Impuestos']['Traslados'][2]['TasaOCuota'] = 1;
		$d['Concepto'][1]['Impuestos']['Traslados'][2]['Importe'] = 150.00;
	
		$d['Concepto'][1]['Impuestos']['Retenciones'][0]['Base'] = 2;
		$d['Concepto'][1]['Impuestos']['Retenciones'][0]['Impuesto'] = 'IVA';
		$d['Concepto'][1]['Impuestos']['Retenciones'][0]['TipoFactor'] = 'Tasa';
		$d['Concepto'][1]['Impuestos']['Retenciones'][0]['TasaOCuota'] = 1;
		$d['Concepto'][1]['Impuestos']['Retenciones'][0]['Importe'] = 150.00;
	
		$d['Concepto'][1]['InformacionAduanera'][0]['NumeroPedimento'] = '10 47 3807 8003832';
		$d['Concepto'][1]['InformacionAduanera'][1]['NumeroPedimento'] = '10 47 3807 4322343';
	
		$d['Concepto'][1]['CuentaPredial']['Numero'] = '4328942809'; */
	
		# Impuestos
		#$d['Impuestos']['TotalImpuestosRetenidos'] 	= 0.000000;
		$d['Impuestos']['TotalImpuestosTrasladados'] 	= number_format($ivaFinal,2,'.','');
	
		# Definimos a detalle las retenciones
		#$d['Impuestos']['Retenciones'][0]['Impuesto'] 	= '001'; # 001=ISR, 002=IVA, 003=IEPS
		#$d['Impuestos']['Retenciones'][0]['Importe'] 	= 0.00;
	
		# Definimos a detalle los traslados
		if($civa>0){
		$d['Impuestos']['Traslados'][0]['Impuesto'] 	= '002'; # 001=ISR, 002=IVA, 003=IEPS
		$d['Impuestos']['Traslados'][0]['TipoFactor'] 	= 'Tasa';
		$d['Impuestos']['Traslados'][0]['TasaOCuota'] 	= '0.160000'; # 16%
		$d['Impuestos']['Traslados'][0]['Importe'] 		= number_format($ivaFinal,2,'.',''); # Monto
		}
		#echo "<pre>";
		#print_r( json_encode($d) );
		#echo "</pre>";
	
		# preparamos los datos
		$headers = array('Accept' 		=> 'application/json', 
						'api-usuario' 	=> 'demo33', 
						'api-password' 	=> 'demo', 
						'jsoncfdi' 		=>  json_encode($d) );
	   //	'api-usuario' 	=> 'RIMM770401BD6', 
			//  'api-password' 	=> '77_S0luti0ns_77',
		# hacemos la petición y enviamos los parametros
		$response = Unirest\Request::post('http://app.facturadigital.com.mx/api/cfdi/generar', $headers);
	
		$response->code;        // HTTP Status code
		$response->headers;     // Headers
		$response->body;        // Parsed body
		$response->raw_body;    // Unparsed body
	
		#header('Content-Type: text/xml');
		#echo "<pre>";
		//echo $response->raw_body;
		#echo "</pre>";
	
		
		# si el timbrado es exitoso (200):
		if ( $response->code == 200 ) {
			# imprimimos los datos del CFDI
		/*	echo "<pre>";
			var_dump( $response->body );
			echo "</pre>";*/
	
			# tomamos los datos en varibles
			$respuestaTimbrado = $response->body;
	
			$UUID = $respuestaTimbrado->cfdi->UUID;
			//echo "<h3>El UUID timbrado es: " .  $UUID . "</h3>";
	
			$urlPDF = $respuestaTimbrado->cfdi->PDF;
	
			$stringXMLTimbrado = base64_decode( $respuestaTimbrado->cfdi->XmlBase64 );
	
			# guardamos el XML en archivo local, y le ponemos el nombre del UUID
			file_put_contents( $UUID . ".xml", $stringXMLTimbrado);
	
			# descarga el PDF
			copy( $urlPDF , $UUID . ".pdf" );
			if(consultasSQL::UpdateSQL("mis_facturas", "folio_fiscal='".$UUID ."'", "idVenta=$idVenta")){
				echo '<script>
				window.location.href="'.$urlPDF.'/'.$UUID.'.pdf";
				</script>';
				}
	
		} else {
			# imprimimos la respuesta (JSON)
			echo $response->raw_body;
		}
		
		
	} catch (Exception $e) {
		echo $e->getMessage();
	}


}else{
	echo '<img src="../assets/img/incorrectofull.png" class="center-all-contens"><br>
	<h3>Ha ocurrido un error al generar la factura</h3>';	
}
}else{
	echo '<img src="../assets/img/incorrectofull.png" class="center-all-contens"><br>
	<h3>No se han encontrado ventas realizadas</h3>';	
}
?>