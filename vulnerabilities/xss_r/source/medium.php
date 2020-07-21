<?php

header ("X-XSS-Protection: 0");

// Is there any input?
if( array_key_exists( "name", $_GET )) {
	// Get input
	$name = str_replace( '<script>', '', $_GET[ 'name' ] );

	if ($_GET[ 'name' ] != ''){
		$html .= "<pre>¡Recibido! Muchas gracias por tus comentarios, ${name}.</pre>";
	} else {
		$html .= "<pre>¡Recibido! Muchas gracias por tus comentarios.</pre>";
	}
}

?>
