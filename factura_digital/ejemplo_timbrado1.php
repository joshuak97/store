<?php 
require 'vendor/autoload.php';

try {

	# llenamos los datos de nuestro CFDI
	# crearemos un xml de prueba
	$d = array();

	#$d['printxml'] = true; # nos permite imprimir el xml generado para debug

	# datos basicos SAT
	$d['Serie'] 			= 'F';
	$d['Folio'] 			= '987750';  #'101';
	$d['Fecha'] 			= 'AUTO';
	$d['FormaPago'] 		= '01';
	$d['CondicionesDePago'] = 'CONDICIONES';
	$d['SubTotal'] 			= '200.00';
	$d['Descuento'] 		= '50.00'; # o bien: null
	$d['Moneda'] 			= 'MXN';
	$d['TipoCambio'] 		= 1;
	$d['Total'] 			= '174.00';
	$d['TipoDeComprobante'] = 'I';
	$d['MetodoPago'] 		= 'PUE';
	$d['LugarExpedicion'] 	= '67150';

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
	$d['Receptor']['Rfc'] = 'NDI120326HF5';
	$d['Receptor']['Nombre'] = 'Novatech Digital SA de CV';
	# $d['Receptor']['ResidenciaFiscal'] = 'MEX'; # solo se usa cuando el receptor no esté dado de alta en el SAT
	$d['Receptor']['NumRegIdTrib'] = ''; # para extranjeros
	$d['Receptor']['UsoCFDI'] = 'G03'; # uso que le dará el cliente al cfdi

	# Receptor -> Domicilio (OPCIONAL)
	$d["Receptor"]["Calle"] = "Palmas";
	$d["Receptor"]["NoExt"] = "9810";
	#$d["Receptor"]["NoInt"] = null;
	$d["Receptor"]["Colonia"] = "Anahuac";
	#$d["Receptor"]["Localidad"] = null;
	#$d["Receptor"]["Referencia"] = null;
	$d["Receptor"]["Municipio"] = "Apodaca";
	$d["Receptor"]["Estado"] = "Nuevo Leon";
	$d["Receptor"]["Pais"] = "México";
	$d["Receptor"]["CodigoPostal"] = "67349";

	# >> conceptos <<
	# concepto 1
	$d['Conceptos'][0]['ClaveProdServ'] = '01010101';
	$d['Conceptos'][0]['NoIdentificacion'] = '01'; #codigo interno o SKU, GTIN, codigo de barras, etc.
	$d['Conceptos'][0]['Cantidad'] = 1.00;
	$d['Conceptos'][0]['ClaveUnidad'] = 'KGM'; # Clave SAT
	$d['Conceptos'][0]['Unidad'] = 'Kilo'; # Unidad de Medida
	$d['Conceptos'][0]['Descripcion'] = 'PANTALLA LCD SHARP'; #maximo 1000 caracteres
	$d['Conceptos'][0]['ValorUnitario'] = '100.00';
	$d['Conceptos'][0]['Importe'] = '100.00';
	$d['Conceptos'][0]['Descuento'] = '25.00'; # no se permiten valores negativos

	# concepto 1 -> impuestos
	$d['Conceptos'][0]['Impuestos']['Traslados'][0]['Base'] 		= '75.00';
	$d['Conceptos'][0]['Impuestos']['Traslados'][0]['Impuesto'] 	= '002';
	$d['Conceptos'][0]['Impuestos']['Traslados'][0]['TipoFactor'] 	= 'Tasa';
	$d['Conceptos'][0]['Impuestos']['Traslados'][0]['TasaOCuota'] 	= '0.160000';
	$d['Conceptos'][0]['Impuestos']['Traslados'][0]['Importe'] 		= '12.00';






	$d['Conceptos'][1]['ClaveProdServ'] = '01010101';
	$d['Conceptos'][1]['NoIdentificacion'] = '01'; #codigo interno o SKU, GTIN, codigo de barras, etc.
	$d['Conceptos'][1]['Cantidad'] = 1.00;
	$d['Conceptos'][1]['ClaveUnidad'] = 'KGM'; # Clave SAT
	$d['Conceptos'][1]['Unidad'] = 'PZA'; # Unidad de Medida
	$d['Conceptos'][1]['Descripcion'] = 'MEMORIA USB'; #maximo 1000 caracteres
	$d['Conceptos'][1]['ValorUnitario'] = '100.00';
	$d['Conceptos'][1]['Importe'] = '100.00';
	$d['Conceptos'][1]['Descuento'] = '25.00';


	$d['Conceptos'][1]['Impuestos']['Traslados'][0]['Base'] 		= '75.00';
	$d['Conceptos'][1]['Impuestos']['Traslados'][0]['Impuesto'] 	= '002';
	$d['Conceptos'][1]['Impuestos']['Traslados'][0]['TipoFactor'] 	= 'Tasa';
	$d['Conceptos'][1]['Impuestos']['Traslados'][0]['TasaOCuota'] 	= '0.160000';
	$d['Conceptos'][1]['Impuestos']['Traslados'][0]['Importe'] 		= '12.00';

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
	$d['Impuestos']['TotalImpuestosTrasladados'] 	= '24.00';

	# Definimos a detalle las retenciones
	#$d['Impuestos']['Retenciones'][0]['Impuesto'] 	= '001'; # 001=ISR, 002=IVA, 003=IEPS
	#$d['Impuestos']['Retenciones'][0]['Importe'] 	= 0.00;

	# Definimos a detalle los traslados
	$d['Impuestos']['Traslados'][0]['Impuesto'] 	= '002'; # 001=ISR, 002=IVA, 003=IEPS
	$d['Impuestos']['Traslados'][0]['TipoFactor'] 	= 'Tasa';
	$d['Impuestos']['Traslados'][0]['TasaOCuota'] 	= '0.160000'; # 16%
	$d['Impuestos']['Traslados'][0]['Importe'] 		= '24.00'; # Monto

	#echo "<pre>";
	#print_r( json_encode($d) );
	#echo "</pre>";

	# preparamos los datos
	$headers = array('Accept' 		=> 'application/json', 
					'api-usuario' 	=> 'demo33', 
					'api-password' 	=> 'demo', 
					'jsoncfdi' 		=>  json_encode($d) );

	# hacemos la petición y enviamos los parametros
	$response = Unirest\Request::post('http://app.facturadigital.com.mx/api/cfdi/generar', $headers);

	$response->code;        // HTTP Status code
	$response->headers;     // Headers
	$response->body;        // Parsed body
	$response->raw_body;    // Unparsed body

	#header('Content-Type: text/xml');
	#echo "<pre>";
	echo $response->raw_body;
	#echo "</pre>";

	
	# si el timbrado es exitoso (200):
	if ( $response->code == 200 ) {
		# imprimimos los datos del CFDI
		echo "<pre>";
		var_dump( $response->body );
		echo "</pre>";

		# tomamos los datos en varibles
		$respuestaTimbrado = $response->body;

		$UUID = $respuestaTimbrado->cfdi->UUID;
		echo "<h3>El UUID timbrado es: " .  $UUID . "</h3>";

		$urlPDF = $respuestaTimbrado->cfdi->PDF;

		$stringXMLTimbrado = base64_decode( $respuestaTimbrado->cfdi->XmlBase64 );

		# guardamos el XML en archivo local, y le ponemos el nombre del UUID
		file_put_contents( $UUID . ".xml", $stringXMLTimbrado);

		# descarga el PDF
		copy( $urlPDF , $UUID . ".pdf" );

	} else {
		# imprimimos la respuesta (JSON)
		echo $response->raw_body;
	}
	

} catch (Exception $e) {
	echo $e->getMessage();
}


?>