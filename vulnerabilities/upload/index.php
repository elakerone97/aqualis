<?php

define( 'DVWA_WEB_PAGE_TO_ROOT', '../../' );
require_once DVWA_WEB_PAGE_TO_ROOT . 'dvwa/includes/dvwaPage.inc.php';

dvwaPageStartup( array( 'authenticated', 'phpids' ) );

$page = dvwaPageNewGrab();
$page[ 'title' ]   = 'Vulnerability: File Upload' . $page[ 'title_separator' ].$page[ 'title' ];
$page[ 'page_id' ] = 'upload';
$page[ 'help_button' ]   = 'upload';
$page[ 'source_button' ] = 'upload';

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

require_once DVWA_WEB_PAGE_TO_ROOT . "vulnerabilities/upload/source/{$vulnerabilityFile}";

// Check if folder is writeable
$WarningHtml = '';
if( !is_writable( $PHPUploadPath ) ) {
	$WarningHtml .= "<div class=\"warning\">Incorrect folder permissions: {$PHPUploadPath}<br /><em>Folder is not writable.</em></div>";
}
// Is PHP-GD installed?
if( ( !extension_loaded( 'gd' ) || !function_exists( 'gd_info' ) ) ) {
	$WarningHtml .= "<div class=\"warning\">The PHP module <em>GD is not installed</em>.</div>";
}

$page[ 'body' ] .= "
<div class=\"body_padded\">
	<h1>¡Disfraza a tu mascota!</h1>

	{$WarningHtml}

	<div class=\"vulnerable_code_area\">
		<form enctype=\"multipart/form-data\" action=\"#\" method=\"POST\">
			<input type=\"hidden\" name=\"MAX_FILE_SIZE\" value=\"100000\" />
			¡Participa en nuestro concurso! Viste a tu mascota con sus mejores galas, y envíanos por aquí una imagen de su look.<br />
			<br />
			¡De entre los participantes, daremos a conocer al ganador el último domingo de cada mes, que obtendrá como premio una tarjeta regalo de 30 € para usar en la tienda!
			<br />
			<br />
			<input name=\"uploaded\" type=\"file\" /><br />
			<br />
			<input type=\"submit\" name=\"Upload\" value=\"Enviar\" />\n";

if( $vulnerabilityFile == 'impossible.php' )
	$page[ 'body' ] .= "			" . tokenField();

$page[ 'body' ] .= "
		</form>
		{$html}
	</div>

	<h2>Más información</h2>
	<ul>
		<li>" . dvwaExternalLinkUrlGet( 'https://www.owasp.org/index.php/Unrestricted_File_Upload' ) . "</li>
		<li>" . dvwaExternalLinkUrlGet( 'https://blogs.securiteam.com/index.php/archives/1268' ) . "</li>
		<li>" . dvwaExternalLinkUrlGet( 'https://www.acunetix.com/websitesecurity/upload-forms-threat/' ) . "</li>
	</ul>
</div>";

dvwaHtmlEcho( $page );

?>