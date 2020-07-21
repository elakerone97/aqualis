<?php

// Is there any input?
if ( array_key_exists( "default", $_GET ) && !is_null ($_GET[ 'default' ]) ) {

	# White list the allowable languages
	switch ($_GET['default']) {
		case "Francés":
		case "Inglés":
		case "Alemán":
		case "Español":
			# ok
			break;
		default:
			header ("location: ?default=Español");
			exit;
	}
}

?>
