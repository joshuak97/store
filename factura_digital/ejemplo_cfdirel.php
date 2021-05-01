<?php 
require 'vendor/autoload.php';

try {

	# llenamos los datos de nuestro CFDI
	# crearemos un xml de prueba
	$d = array();

	$d['printxml'] = true; # nos permite imprimir el xml generado para debug

	# datos basicos SAT
	$d['Serie'] 			= 'F';
	$d['Folio'] 			= '987750';  #'101';
	$d['Fecha'] 			= 'AUTO';
	$d['FormaPago'] 		= '01';
	$d['CondicionesDePago'] = 'CONDICIONES';
	$d['SubTotal'] 			= '200.00';
	$d['Descuento'] 		= null; # o bien: null
	$d['Moneda'] 			= 'MXN';
	$d['TipoCambio'] 		= 1;
	$d['Total'] 			= '232.00';
	$d['TipoDeComprobante'] = 'I';
	$d['MetodoPago'] 		= 'PUE';
	$d['LugarExpedicion'] 	= '67150';
	$d['extra1'] = "info extra 1";
	$d['extra2'] = "info extra 2";
	$d['extra3'] = "info extra 3";
	$d['extra15'] = "info extra 15";

	# opciones de personalización (opcionales)
	$d['LeyendaFolio'] 		= "FACTURA"; # leyenda opcional para poner a lado del folio: FACTURA, RECIBO, NOTA DE CREDITO, ETC.

	# codigo de confirmación PAC para cfdis mayores a $20 millones
	$d['Confirmacion'] = null;

	# CFDIs relacionados
	$d['CfdiRelacionados']['TipoRelacion'] 	= '01'; # c_TipoRelacion (Catálogo SAT)
	$d['CfdiRelacionados'][0]['UUID'] 		= '4956BB44-5281-4B5C-BF10-453D4EC5178B';
	$d['CfdiRelacionados'][1]['UUID'] 		= '4956BB44-5281-4B5C-BF10-453D4EC5178B';
	$d['CfdiRelacionados'][2]['UUID'] 		= '4956BB44-5281-4B5C-BF10-453D4EC5178B';
	$d['CfdiRelacionados'][3]['UUID'] 		= '4956BB44-5281-4B5C-BF10-453D4EC5178B';

	# Regimen fiscal del emisor ligado al tipo de operaciones que representa este CFDI
	$d['Emisor']['RegimenFiscal'] = '612'; # ver catálogo del SAT

	# Datos del receptor
	$d['Receptor']['Rfc'] 			= 'NDI120326HF5';
	$d['Receptor']['Nombre'] 		= 'Novatech Digital SA de CV';
	$d['Receptor']['ResidenciaFiscal'] = null; # solo se usa cuando el receptor no esté dado de alta en el SAT
	$d['Receptor']['NumRegIdTrib'] 	= null; # para extranjeros
	$d['Receptor']['UsoCFDI'] 		= 'G03'; # uso que le dará el cliente al cfdi

	# Receptor -> Domicilio (OPCIONAL)
	$d["Receptor"]["Calle"] 		= "Palmas";
	$d["Receptor"]["NoExt"] 		= null;
	$d["Receptor"]["NoInt"] 		= null;
	$d["Receptor"]["Colonia"] 		= "Anahuac";
	$d["Receptor"]["Localidad"] 	= null;
	$d["Receptor"]["Referencia"] 	= null;
	$d["Receptor"]["Municipio"] 	= "Apodaca";
	$d["Receptor"]["Estado"] 		= "Nuevo Leon";
	$d["Receptor"]["Pais"] 			= "México";
	$d["Receptor"]["CodigoPostal"] 	= "67349";

	# >> conceptos <<
	# concepto 1
	$d['Conceptos'][0]['ClaveProdServ'] 	= '01010101';
	$d['Conceptos'][0]['NoIdentificacion'] 	= '01'; #codigo interno o SKU, GTIN, codigo de barras, etc.
	$d['Conceptos'][0]['Cantidad'] 			= 1.00;
	$d['Conceptos'][0]['ClaveUnidad'] 		= 'ZZ'; # Clave SAT
	$d['Conceptos'][0]['Unidad'] 			= 'Pieza'; # Unidad de Medida
	$d['Conceptos'][0]['Descripcion'] 		= 'Mezcal Oaxaca'; #maximo 1000 caracteres
	$d['Conceptos'][0]['ValorUnitario'] 	= '200.00';
	$d['Conceptos'][0]['Importe'] 			= '200.00';
	$d['Conceptos'][0]['Descuento'] 		= null; # no se permiten valores negativos
	$d['Conceptos'][0]['extra1'] = "dato extra 1";
	$d['Conceptos'][0]['extra5'] = "dato extra 5";
	$d['Conceptos'][0]['extra10'] = "dato extra 10";

	# concepto 1 -> impuestos
	$d['Conceptos'][0]['Impuestos']['Traslados'][0]['Base'] 		= '200.00';
	$d['Conceptos'][0]['Impuestos']['Traslados'][0]['Impuesto'] 	= '002';
	$d['Conceptos'][0]['Impuestos']['Traslados'][0]['TipoFactor'] 	= 'Tasa';
	$d['Conceptos'][0]['Impuestos']['Traslados'][0]['TasaOCuota'] 	= '0.160000';
	$d['Conceptos'][0]['Impuestos']['Traslados'][0]['Importe'] 		= '32.00';


	# Impuestos
	$d['Impuestos']['TotalImpuestosTrasladados'] 	= '32.00';

	# Definimos a detalle los traslados
	$d['Impuestos']['Traslados'][0]['Impuesto'] 	= '002'; # 001=ISR, 002=IVA, 003=IEPS
	$d['Impuestos']['Traslados'][0]['TipoFactor'] 	= 'Tasa';
	$d['Impuestos']['Traslados'][0]['TasaOCuota'] 	= '0.160000'; # 16%
	$d['Impuestos']['Traslados'][0]['Importe'] 		= '32.00'; # Monto

	echo "<pre>";
	print_r( json_encode($d) );
	echo "</pre>";

	die();

	# preparamos los datos
	$headers = array('Accept' 		=> 'application/json', 
					'api-usuario' 	=> 'SAOA890320M87', 
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

		$stringXMLTimbrado = base64_decode( $respuestaTimbrado->cfdi->XmlBase64 );

		# guardamos el XML en archivo local, y le ponemos el nombre del UUID
		file_put_contents( $UUID . ".xml", $stringXMLTimbrado);

	} else {
		# imprimimos la respuesta (JSON)
		echo $response->raw_body;
	}



} catch (Exception $e) {
	echo $e->getMessage();
}


?>