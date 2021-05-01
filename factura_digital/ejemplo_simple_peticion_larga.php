<?php 
require 'vendor/autoload.php';
session_start();
try {
	$d = array();

	# datos basicos SAT
	$d['Serie'] 			= 'F';
	$d['Folio'] 			= '987750';
	$d['Fecha'] 			= 'AUTO';
	$d['FormaPago'] 		= '01';
	$d['CondicionesDePago'] = 'CONDICIONES';
	$d['SubTotal'] 			= '200.00';
	$d['Descuento'] 		= '50.00'; # o bien: null
	$d['Moneda'] 			= 'USD';
	$d['TipoCambio'] 		= "15.4646";
	$d['Total'] 			= '174.00';
	$d['TipoDeComprobante'] = 'I';
	$d['MetodoPago'] 		= 'PUE';
	$d['LugarExpedicion'] 	= '67150';

	# opciones de personalización (opcionales)
	$d['LeyendaFolio'] 		= "FACTURA"; # leyenda opcional para poner a lado del folio: FACTURA, RECIBO, NOTA DE CREDITO, ETC.

	# Regimen fiscal del emisor ligado al tipo de operaciones que representa este CFDI
	$d['Emisor']['RegimenFiscal'] = '601'; # ver catálogo del SAT

	# Datos del receptor
	$d['Receptor']['Rfc'] = 'XEXX010101000';
	$d['Receptor']['Nombre'] = 'John Deere, Inc';
	$d['Receptor']['ResidenciaFiscal'] = 'USA'; # solo se usa cuando el receptor no esté dado de alta en el SAT
	$d['Receptor']['NumRegIdTrib'] = '362382580'; # para extranjeros
	$d['Receptor']['UsoCFDI'] = 'G03'; # uso que le dará el cliente al cfdi

	# Receptor -> Domicilio (OPCIONAL)
	$d["Receptor"]["Calle"] = "Palmas";
	$d["Receptor"]["NoExt"] = "9810";
	$d["Receptor"]["Colonia"] = "Anahuac";
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

	# concepto 2
	$d['Conceptos'][1]['ClaveProdServ'] = '01010101';
	$d['Conceptos'][1]['NoIdentificacion'] = '01'; #codigo interno o SKU, GTIN, codigo de barras, etc.
	$d['Conceptos'][1]['Cantidad'] = 1.00;
	$d['Conceptos'][1]['ClaveUnidad'] = 'KGM'; # Clave SAT
	$d['Conceptos'][1]['Unidad'] = 'PZA'; # Unidad de Medida
	$d['Conceptos'][1]['Descripcion'] = 'MEMORIA USB'; #maximo 1000 caracteres
	$d['Conceptos'][1]['ValorUnitario'] = '100.00';
	$d['Conceptos'][1]['Importe'] = '100.00';
	$d['Conceptos'][1]['Descuento'] = '25.00';

	# concepto 2 --> impuestos
	$d['Conceptos'][1]['Impuestos']['Traslados'][0]['Base'] 		= '75.00';
	$d['Conceptos'][1]['Impuestos']['Traslados'][0]['Impuesto'] 	= '002';
	$d['Conceptos'][1]['Impuestos']['Traslados'][0]['TipoFactor'] 	= 'Tasa';
	$d['Conceptos'][1]['Impuestos']['Traslados'][0]['TasaOCuota'] 	= '0.160000';
	$d['Conceptos'][1]['Impuestos']['Traslados'][0]['Importe'] 		= '12.00';

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



	$d['printxml'] = true;


	echo "<pre>";
	print_r( json_encode($d) );
	echo "</pre>";

	# preparamos los datos
	$headers = array('Accept' 		=> 'application/json', 
					'api-usuario' 	=> 'demo33', 
					'api-password' 	=> 'demo');

	$parametros_body = array('jsoncfdi' => json_encode($d));
	$body = Unirest\Request\Body::form($parametros_body);

	# hacemos la petición y enviamos los parametros
	$response = Unirest\Request::post('http://app.facturadigital.com.mx/api/cfdi/generar', $headers, $body);

	$response->code;        // HTTP Status code
	$response->headers;     // Headers
	$response->body;        // Parsed body
	$response->raw_body;    // Unparsed body

	# si el timbrado es exitoso (200):
	if ( $response->code == 200 ) {
		# imprimimos los datos del CFDI
		echo "<pre>";
		var_dump( $response->body );
		echo "</pre>";
	} else {
		# imprimimos la respuesta (JSON)
		echo $response->raw_body;
	}

} catch (Exception $e) {
	echo $e->getMessage();
}


?>