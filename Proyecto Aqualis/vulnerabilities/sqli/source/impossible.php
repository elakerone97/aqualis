<?php

if( isset( $_GET[ 'Submit' ] ) ) {
	// Check Anti-CSRF token
	checkToken( $_REQUEST[ 'user_token' ], $_SESSION[ 'session_token' ], 'index.php' );

	// Get input
	$id = $_GET[ 'id' ];

	// Was a number entered?
	if(is_numeric( $id )) {
		// Check the database
		$data = $db->prepare( 'SELECT first_name, last_name, telefono FROM users WHERE user_id = (:id) LIMIT 1;' );
		$data->bindParam( ':id', $id, PDO::PARAM_INT );
		$data->execute();
		$row = $data->fetch();

		// Make sure only 1 result is returned
		if( $data->rowCount() == 1 ) {
			// Get values
			$first = utf8_decode( $row[ 'first_name' ]);
			$last  = utf8_decode( $row[ 'last_name' ]);
			$tlf = utf8_decode( $row[ 'telefono' ]);

			// Feedback for end user
			$html .= "<pre>ID: {$id}<br />Nombre: {$first}<br />Apellido: {$last}<br />Teléfono: {$tlf}</pre>";
		}
	}
}

// Generate Anti-CSRF token
generateSessionToken();

?>
