<?php

header ("X-XSS-Protection: 0");

// Is there any input?
if( array_key_exists( "name", $_GET )) {
	// Get input
	$name = preg_replace( '/<(.*)s(.*)c(.*)r(.*)i(.*)p(.*)t/i', '', $_GET[ 'name' ] );

	// Feedback for end user
	if ($_GET[ 'name' ] != '') {
		$html .= "<pre>¡Recibido! Muchas gracias por tus comentarios, ${name}.</pre>";
	} else {
		$html .= "<pre>¡Recibido! Muchas gracias por tus comentarios.</pre>";
	}
}

?>
