<?php 
require 'vendor/autoload.php';
try {

	# preparamos las credenciales
	$headers = array('api-usuario' 	=> 'demo33', 
					 'api-password' => 'demo',
					 'uuid'			=> '364AACD5-E066-4FAB-B24A-10EB9699A9D8', # UUID a cancelar
					);

	# hacemos la petición y enviamos los parametros
	$response = Unirest\Request::post('http://app.facturadigital.com.mx/api/cfdi/cancelar', $headers);
	$consulta = $response->body;        // Parsed body

	# si la respuesta es exitosa
	if ( $response->code == 200 ) {
		
		echo "CFDI cancelado exitosamente!";
		var_dump($consulta);
		
	} else {
		# imprimimos la respuesta (JSON)
		# IMPORTANTE!!!!!!!!!!!!!!!!!
		# En ambiente de pruebas NO se puede cancelar, ya que la conexion va directa al SAT. Sin embargo
		# si obtienes esta respuesta, es que tu método de cancelacion está implementada correctamente.
		echo $response->raw_body;
	}

} catch (Exception $e) {
	echo $e->getMessage();
}
?>