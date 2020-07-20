
<?php

header ("X-XSS-Protection: 0");

// Is there any input?
if( array_key_exists( "name", $_GET )) {
	// Feedback for end user

	if ($_GET[ 'name' ] != ''){
		$html .= '<pre>¡Recibido! Muchas gracias por tus comentarios, ' . $_GET[ 'name' ] . '.</pre>';

	} else {
		$html .= '<pre>¡Recibido! Muchas gracias por tus comentarios.</pre>';
	}
}

?>
