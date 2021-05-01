<?php 
require 'vendor/autoload.php';

try {
	$d = array();

	# datos basicos SAT
	$d['Serie'] 			= 'F';
	$d['Folio'] 			= '987750';
	$d['Fecha'] 			= 'AUTO';
	$d['FormaPago'] 		= '01';
	$d['CondicionesDePago'] = 'CONDICIONES';
	$d['SubTotal'] 			= '100.00';
	$d['Descuento'] 		= null; # comentar linea o poner valor: null
	$d['Moneda'] 			= 'MXN';
	$d['TipoCambio'] 		= 1;
	$d['Total'] 			= '119.00';
	$d['TipoDeComprobante'] = 'I';
	$d['MetodoPago'] 		= 'PUE';
	$d['LugarExpedicion'] 	= '67150';

	# opciones de personalización (opcionales)
	$d['LeyendaFolio'] 		= "FACTURA"; # leyenda opcional para poner a lado del folio: FACTURA, RECIBO, NOTA DE CREDITO, ETC.

	# Regimen fiscal del emisor ligado al tipo de operaciones que representa este CFDI
	$d['Emisor']['RegimenFiscal'] = '612'; # ver catálogo del SAT

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
	$d['Conceptos'][0]['Descripcion'] = 'HOSPEDAJE'; #maximo 1000 caracteres
	$d['Conceptos'][0]['ValorUnitario'] = '100.00';
	$d['Conceptos'][0]['Importe'] = '100.00';
	#$d['Conceptos'][0]['Descuento'] = '25.00'; # no se permiten valores negativos

	# concepto 1 -> impuestos
	$d['Conceptos'][0]['Impuestos']['Traslados'][0]['Base'] 		= '100.00';
	$d['Conceptos'][0]['Impuestos']['Traslados'][0]['Impuesto'] 	= '002';
	$d['Conceptos'][0]['Impuestos']['Traslados'][0]['TipoFactor'] 	= 'Tasa';
	$d['Conceptos'][0]['Impuestos']['Traslados'][0]['TasaOCuota'] 	= '0.160000';
	$d['Conceptos'][0]['Impuestos']['Traslados'][0]['Importe'] 		= '16.00';

	# Impuestos
	#$d['Impuestos']['TotalImpuestosRetenidos'] 	= 0.000000;
	$d['Impuestos']['TotalImpuestosTrasladados'] 	= '16.00';

	# Definimos a detalle las retenciones
	#$d['Impuestos']['Retenciones'][0]['Impuesto'] 	= '001'; # 001=ISR, 002=IVA, 003=IEPS
	#$d['Impuestos']['Retenciones'][0]['Importe'] 	= 0.00;

	# Definimos a detalle los traslados
	$d['Impuestos']['Traslados'][0]['Impuesto'] 	= '002'; # 001=ISR, 002=IVA, 003=IEPS
	$d['Impuestos']['Traslados'][0]['TipoFactor'] 	= 'Tasa';
	$d['Impuestos']['Traslados'][0]['TasaOCuota'] 	= '0.160000'; # 16%
	$d['Impuestos']['Traslados'][0]['Importe'] 		= '16.00'; # Monto

	# Complemento
	$d['Complemento']['ImpuestosLocales']['version'] = "1.0";
	$d['Complemento']['ImpuestosLocales']['TotaldeRetenciones'] = "0.00";
	$d['Complemento']['ImpuestosLocales']['TotaldeTraslados'] = "3.00";

	# ciclo de retenciones locales
	#$d['Complemento']['ImpuestosLocales']['RetencionesLocales'][0]['ImpLocRetenido'] = "Retencion ISN";
	#$d['Complemento']['ImpuestosLocales']['RetencionesLocales'][0]['TasadeRetencion'] = "1.00";
	#$d['Complemento']['ImpuestosLocales']['RetencionesLocales'][0]['Importe'] = "120.00";

	# ciclo de traslados locales
	$d['Complemento']['ImpuestosLocales']['TrasladosLocales'][0]['ImpLocTrasladado'] = "ISH";
	$d['Complemento']['ImpuestosLocales']['TrasladosLocales'][0]['TasadeTraslado'] = "3.00";
	$d['Complemento']['ImpuestosLocales']['TrasladosLocales'][0]['Importe'] = "3.00";


	$d['printxml'] = true;


	echo "<pre>";
	print_r( json_encode($d) );
	echo "</pre>";

	# preparamos los datos
	$headers = array('api-usuario' 	=> 'demo33', 
					'api-password' 	=> 'demo', 
					'jsoncfdi' 		=>  json_encode($d)
				);

	# hacemos la petición y enviamos los parametros
	$response = Unirest\Request::post('http://app.facturadigital.com.mx/api/cfdi/generar', $headers);

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

		#$xml = base64_decode( $response->body->cfdi->XmlBase64 );
		#print_r( $xml );
	} else {
		# imprimimos la respuesta (JSON)
		echo $response->raw_body;
	}

} catch (Exception $e) {
	echo $e->getMessage();
}


?>