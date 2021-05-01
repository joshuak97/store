<?php 
require 'vendor/autoload.php';
try {

	# preparamos las credenciales
	$headers = array('api-usuario' 	=> 'demo33', 
					 'api-password' => 'demo',
					 'uuid'			=> '97DCFE0F-6620-4064-8732-D0EFED9D6947',
					 'rfcemisor'	=> 'WCA161006TN9',
					 'rfcreceptor'	=> 'RSD160118CG7',
					 'total'		=> '26220.64'
					);

	# hacemos la petición y enviamos los parametros
	$response = Unirest\Request::post('http://app.facturadigital.com.mx/api/cfdi/validar', $headers);
	$consulta = $response->body;        // Parsed body

	# si la respuesta es exitosa
	if ( $response->code == 200 ) {
		
		echo "<pre>";
		print_r($consulta);
		echo "</pre>";
		
	} else {

		echo $response->raw_body;

	}

} catch (Exception $e) {
	echo $e->getMessage();
}
?>