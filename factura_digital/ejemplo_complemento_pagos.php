<?php 
require 'vendor/autoload.php';
	# llenamos los datos de nuestro CFDI
	# crearemos un xml de prueba
	$d = array();

	# datos basicos SAT
	$d['Serie'] 			= 'PYMNT';
	$d['Folio'] 			= rand(101,9999);  #'101';
	$d['Fecha'] 			= 'AUTO';
	$d['SubTotal'] 			= '0';
	$d['Moneda'] 			= 'XXX';
	$d['Total'] 			= '0';
	$d['TipoDeComprobante'] = 'P';
	$d['LugarExpedicion'] 	= '67150';

	# opciones de personalización (opcionales)
	$d['LeyendaFolio'] 		= "COMPROBANTE DE PAGO"; # leyenda opcional para poner a lado del folio: FACTURA, RECIBO, NOTA DE CREDITO, ETC.

	# Regimen fiscal del emisor ligado al tipo de operaciones que representa este CFDI
	$d['Emisor']['RegimenFiscal'] = '612'; # ver catálogo del SAT

	# Datos del receptor
	$d['Receptor']['Rfc'] = 'NDI120326HF5';
	$d['Receptor']['Nombre'] = 'Novatech Digital SA de CV';
	$d['Receptor']['ResidenciaFiscal'] = null; # solo se usa cuando el receptor no esté dado de alta en el SAT
	$d['Receptor']['NumRegIdTrib'] = null; # para extranjeros
	$d['Receptor']['UsoCFDI'] = 'P01'; # uso que le dará el cliente al cfdi

	# Receptor -> Domicilio (OPCIONAL)
	$d["Receptor"]["Calle"] = "Palmas";
	$d["Receptor"]["NoExt"] = "9810";
	$d["Receptor"]["NoInt"] = null;
	$d["Receptor"]["Colonia"] = "Anahuac";
	$d["Receptor"]["Municipio"] = "Apodaca";
	$d["Receptor"]["Estado"] = "Nuevo Leon";
	$d["Receptor"]["Pais"] = "México";
	$d["Receptor"]["CodigoPostal"] = "67349";

	# Inicia definición de conceptos
	# Conceptos --> concepto #1
	$d['Conceptos'][0]['ClaveProdServ'] = '84111506';
	$d['Conceptos'][0]['Cantidad'] = "1";
	$d['Conceptos'][0]['ClaveUnidad'] = 'ACT'; # Clave SAT
	$d['Conceptos'][0]['Descripcion'] = 'Pago'; #maximo 1000 caracteres
	$d['Conceptos'][0]['ValorUnitario'] = '0';
	$d['Conceptos'][0]['Importe'] = '0';
	$d['Concepto'][0]['Descuento'] = null; # no se permiten valores negativos


	# Inicia Complemento de Recepcion de Pagos
	# PAGO 1:
	$d['Complemento']['Pagos'][0]['FechaPago'] = "2017-11-09T12:00:00"; # ver Fecha Pago
	$d['Complemento']['Pagos'][0]['FormaDePagoP'] = "02";  # ver catálogo  c_FormaPago
	$d['Complemento']['Pagos'][0]['MonedaP'] = 'MXN';
	$d['Complemento']['Pagos'][0]['TipoCambioP'] = ''; # opcional
	$d['Complemento']['Pagos'][0]['Monto'] = '9500.00';
	$d['Complemento']['Pagos'][0]['NumOperacion'] = ''; # opcional
	$d['Complemento']['Pagos'][0]['RfcEmisorCtaOrd'] = ''; # opcional
	$d['Complemento']['Pagos'][0]['NomBancoOrdExt'] = ''; # opcional
	$d['Complemento']['Pagos'][0]['CtaOrdenante'] = ''; # opcional
	$d['Complemento']['Pagos'][0]['RfcEmisorCtaBen'] = ''; # opcional
	$d['Complemento']['Pagos'][0]['CtaBeneficiario'] = ''; # opcional
	$d['Complemento']['Pagos'][0]['TipoCadPago'] = ''; # opcional
	$d['Complemento']['Pagos'][0]['CertPago'] = ''; # opcional
	$d['Complemento']['Pagos'][0]['CadPago'] = ''; # opcional
	$d['Complemento']['Pagos'][0]['SelloPago'] = ''; # opcional

	# complemento pagos --> documentos relacionados
	# PAGO 1 --> DOCUMENTO RELACIONADO 1
	$d['Complemento']['Pagos'][0]['DoctoRelacionado'][0]['IdDocumento'] = "31FBF471-DCFD-46A5-B235-CADD520A9CC0"; # UUID documento 
	$d['Complemento']['Pagos'][0]['DoctoRelacionado'][0]['Serie'] = "A";
	$d['Complemento']['Pagos'][0]['DoctoRelacionado'][0]['Folio'] = "23205";
	$d['Complemento']['Pagos'][0]['DoctoRelacionado'][0]['MonedaDR'] = "MXN"; 
	$d['Complemento']['Pagos'][0]['DoctoRelacionado'][0]['TipoCambioDR'] = "";
	$d['Complemento']['Pagos'][0]['DoctoRelacionado'][0]['MetodoDePagoDR'] = "PUE";
	$d['Complemento']['Pagos'][0]['DoctoRelacionado'][0]['NumParcialidad'] = "1";
	$d['Complemento']['Pagos'][0]['DoctoRelacionado'][0]['ImpSaldoAnt'] = "2499.80"; # ultimo saldo (antes de recibir este pago)
	$d['Complemento']['Pagos'][0]['DoctoRelacionado'][0]['ImpPagado'] = "100.00"; # importe pagado
	$d['Complemento']['Pagos'][0]['DoctoRelacionado'][0]['ImpSaldoInsoluto'] = "2399.80"; # saldo restante despues de haber recibido este pago

	# PAGO 1 --> DOCUMENTO RELACIONADO 2
	$d['Complemento']['Pagos'][0]['DoctoRelacionado'][1]['IdDocumento'] = "31FBF471-DCFD-46A5-B235-CADD520A9CC0"; # UUID documento
	$d['Complemento']['Pagos'][0]['DoctoRelacionado'][1]['Serie'] = "A";
	$d['Complemento']['Pagos'][0]['DoctoRelacionado'][1]['Folio'] = "23225";
	$d['Complemento']['Pagos'][0]['DoctoRelacionado'][1]['MonedaDR'] = "MXN"; 
	$d['Complemento']['Pagos'][0]['DoctoRelacionado'][1]['TipoCambioDR'] = "";
	$d['Complemento']['Pagos'][0]['DoctoRelacionado'][1]['MetodoDePagoDR'] = "PUE";
	$d['Complemento']['Pagos'][0]['DoctoRelacionado'][1]['NumParcialidad'] = "2";
	$d['Complemento']['Pagos'][0]['DoctoRelacionado'][1]['ImpSaldoAnt'] = "2499.80"; # ultimo saldo (antes de recibir este pago)
	$d['Complemento']['Pagos'][0]['DoctoRelacionado'][1]['ImpPagado'] = "100.00"; # importe pagado
	$d['Complemento']['Pagos'][0]['DoctoRelacionado'][1]['ImpSaldoInsoluto'] = "2399.80"; # saldo restante despues de haber recibido este pago

	# PAGO 1 --> IMPUESTOS
	#$d['Complemento']['Pagos'][0]['Impuestos']['TotalImpuestosRetenidos'] = "50.00";
	#$d['Complemento']['Pagos'][0]['Impuestos']['TotalImpuestosTrasladados'] = "80.00";

	# PAGO 1 --> IMPUESTOS --> RETENCIONES
	#$d['Complemento']['Pagos'][0]['Impuestos']['Retenciones'][0]['Impuesto'] = "001";
	#$d['Complemento']['Pagos'][0]['Impuestos']['Retenciones'][0]['Importe'] = "50.00";

	# PAGO 1 --> IMPUESTOS --> TRASLADOS
	#$d['Complemento']['Pagos'][0]['Impuestos']['Traslados'][0]['Impuesto'] = "001";
	#$d['Complemento']['Pagos'][0]['Impuestos']['Traslados'][0]['TipoFactor'] = "Tasa";
	#$d['Complemento']['Pagos'][0]['Impuestos']['Traslados'][0]['TasaOCuota'] = "0.160000";
	#$d['Complemento']['Pagos'][0]['Impuestos']['Traslados'][0]['Importe'] = "16.00";

	#$d['printxml'] = true; # imprimirá el XML generado en la respuesta, antes de ser enviado al SAT

	echo "<pre>";
	print_r( json_encode($d) );
	echo "</pre>";

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
?>