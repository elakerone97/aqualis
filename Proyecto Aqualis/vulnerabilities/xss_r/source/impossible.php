<?php

// Is there any input?
if( array_key_exists( "name", $_GET )) {
	// Check Anti-CSRF token
	checkToken( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], 'index.php' );

	// Get input
	$name = htmlspecialchars( $_GET[ 'name' ] );

	// Feedback for end user
	if ($_GET[ 'name' ] != '') {
		$html .= "<pre>¡Recibido! Muchas gracias por tus comentarios, ${name}</pre>";
	} else {
		$html .= "<pre>¡Recibido! Muchas gracias por tus comentarios.</pre>";
	}
}


// Generate Anti-CSRF token
generateSessionToken();

?>
