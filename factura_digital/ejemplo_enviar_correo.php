<?php 
require 'vendor/autoload.php';
try {

	# preparamos las credenciales
	$headers = array('api-usuario' 	=> 'demo33', 
					 'api-password' => 'demo',
					 'uuid'			=> '364AACD5-E066-4FAB-B24A-10EB9699A9D8', # aqui va el UUID del cfdi que quieres enviar
					 'destinatario' => 'javier@novatechlabs.com', # aqui van los correos del cliente, si son varios puedes separarlos con coma (abc@hotmail.com,def@hotmail.com)
					 'cco'			=> 'soporte@facturadigital.com.mx', # aqui puedes poner tus correos y siempre te llegará copia 
					 'mensaje'		=> '' # mensaje en el mail, puede venir html
					);

	# hacemos la petición y enviamos los parametros
	$response = Unirest\Request::post('http://app.facturadigital.com.mx/api/cfdi/correo', $headers);
	$consulta = $response->body;        // Parsed body

	# si la respuesta es exitosa
	if ( $response->code == 200 ) {
		
		echo "CFDI enviado exitosamente!";
		
	} else {
		# imprimimos la respuesta (JSON)
		echo $response->raw_body;
	}

} catch (Exception $e) {
	echo $e->getMessage();
}
?>