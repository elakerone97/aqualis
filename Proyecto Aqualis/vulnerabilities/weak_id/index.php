<?php

define( 'DVWA_WEB_PAGE_TO_ROOT', '../../' );
require_once DVWA_WEB_PAGE_TO_ROOT . 'dvwa/includes/dvwaPage.inc.php';

dvwaPageStartup( array( 'authenticated', 'phpids' ) );

$page = dvwaPageNewGrab();
$page[ 'title' ]   = 'Vulnerability: Weak Session IDs' . $page[ 'title_separator' ].$page[ 'title' ];
$page[ 'page_id' ] = 'weak_id';
$page[ 'help_button' ]   = 'weak_id';
$page[ 'source_button' ] = 'weak_id';
dvwaDatabaseConnect();

$method            = 'GET';
$vulnerabilityFile = '';
switch( $_COOKIE[ 'security' ] ) {
	case 'low':
		$vulnerabilityFile = 'low.php';
		break;
	case 'medium':
		$vulnerabilityFile = 'medium.php';
		break;
	case 'high':
		$vulnerabilityFile = 'high.php';
		break;
	default:
		$vulnerabilityFile = 'impossible.php';
		$method = 'POST';
		break;
}

require_once DVWA_WEB_PAGE_TO_ROOT . "vulnerabilities/weak_id/source/{$vulnerabilityFile}";


$page[ 'body' ] .= <<<EOF
<div class="body_padded">
	<h1>Encuesta segura</h1>

	<p>
		Para conocer mejor los gustos de nuestros clientes, queremos saber cuál es tu animal favorito.
	</p><p>
		Para tu seguridad, cada vez que envíes se generará un ID de sesión diferente.<br />
	</p>
	<input type=\"text\"></input></br></br>

	<form method="post">
		<input type="submit" value="Enviar" />
	</form>
$html
</div>
EOF;

/*
Maybe display this, don't think it is needed though
if (isset ($cookie_value)) {
	$page[ 'body' ] .= <<<EOF
	The new cookie value is $cookie_value
EOF;
}
*/

dvwaHtmlEcho( $page );

?>
