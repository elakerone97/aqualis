<?php

if( isset( $_POST[ 'Submit' ]  ) ) {
	// Check Anti-CSRF token
	checkToken( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], 'index.php' );

	// Get input
	$target = $_REQUEST[ 'ip' ];
	$animal = stripslashes( $target );


	// Check IF input is a valid animal
	if((strcmp($animal,'pez')==0) || (strcmp($animal,'perro')==0) || (strcmp($animal,'gato')==0) || (strcmp($animal,'loro')==0) || (strcmp($animal,'conejo')==0) || (strcmp($animal,'serpiente')==0) || (strcmp($animal,"lagarto")==0) || (strcmp($animal,"tortuga")==0)) {

		// Determine OS and execute the stock command.
		if( stristr( php_uname( 's' ), 'Windows NT' ) ) {
			// Windows
			$cmd = shell_exec( 'stock  ' . $target );
		}
		else {
			// *nix
			$cmd = shell_exec( 'stock  ' . $target );
		}

		// Feedback for the end user
		$html .= "<pre>{$cmd}</pre>";
	}
	else {
		// Ops. Let the user name theres a mistake
		$html .= '<pre>Mascota no encontrada.</pre>';
	}
}

// Generate Anti-CSRF token
generateSessionToken();

?>
