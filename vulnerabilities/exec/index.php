<?php

define( 'DVWA_WEB_PAGE_TO_ROOT', '../../' );
require_once DVWA_WEB_PAGE_TO_ROOT . 'dvwa/includes/dvwaPage.inc.php';

dvwaPageStartup( array( 'authenticated', 'phpids' ) );

$page = dvwaPageNewGrab();
$page[ 'title' ]   = 'Vulnerability: Command Injection' . $page[ 'title_separator' ].$page[ 'title' ];
$page[ 'page_id' ] = 'exec';
$page[ 'help_button' ]   = 'exec';
$page[ 'source_button' ] = 'exec';

dvwaDatabaseConnect();

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
		break;
}

require_once DVWA_WEB_PAGE_TO_ROOT . "vulnerabilities/exec/source/{$vulnerabilityFile}";

$page[ 'body' ] .= "
<div class=\"body_padded\">
	<h1>Consulta de stock</h1>

	<div class=\"vulnerable_code_area\">
		<h2>Introduce un animal (en minúsculas) para ver su stock actual</h2>
		<h4><i>Mascotas disponibles para consulta: pez, perro, gato, tortuga, lagarto, conejo, serpiente, loro.</i></h4>

		<form name=\"ping\" action=\"#\" method=\"post\">
			<p>
				Introduce mascota:
				<input type=\"text\" name=\"ip\" size=\"30\">
				<input type=\"submit\" name=\"Submit\" value=\"Consultar\">
			</p>\n";

if( $vulnerabilityFile == 'impossible.php' )
	$page[ 'body' ] .= "			" . tokenField();

$page[ 'body' ] .= "
		</form>
		{$html}
	</div>

	<h2>Más información</h2>
	<ul>
		<li>" . dvwaExternalLinkUrlGet( 'http://www.scribd.com/doc/2530476/Php-Endangers-Remote-Code-Execution' ) . "</li>
		<li>" . dvwaExternalLinkUrlGet( 'http://www.ss64.com/bash/' ) . "</li>
		<li>" . dvwaExternalLinkUrlGet( 'http://www.ss64.com/nt/' ) . "</li>
		<li>" . dvwaExternalLinkUrlGet( 'https://www.owasp.org/index.php/Command_Injection' ) . "</li>
	</ul>
</div>\n";

dvwaHtmlEcho( $page );

?>
