<?php 
require 'vendor/autoload.php';

try {

	# preparamos las credenciales
	$headers = array('api-usuario' 	=> 'demo33', 
					 'api-password' => 'demo');

	# hacemos la petición y enviamos los parametros
	$response = Unirest\Request::post('http://app.facturadigital.com.mx/api/cfdi/creditos', $headers);
	$consulta = $response->body;        // Parsed body

	# si la respuesta es exitosa
	if ( $response->code == 200 ) {
		
		$creditos_disponibles = $consulta->creditos;

		if ( $creditos_disponibles < 100000 ) {
			echo "<script>";
			echo "alert('ALERTA!! Tus timbres están por agotarse!! '); ";
			echo "</script>";
		}
		
	} else {
		# imprimimos la respuesta (JSON)
		echo $response->raw_body;
	}

} catch (Exception $e) {
	echo $e->getMessage();
}
?>