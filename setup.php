<?php

define( 'DVWA_WEB_PAGE_TO_ROOT', '' );
require_once DVWA_WEB_PAGE_TO_ROOT . 'dvwa/includes/dvwaPage.inc.php';

dvwaPageStartup( array( 'phpids' ) );

$page = dvwaPageNewGrab();
$page[ 'title' ]   = 'Setup' . $page[ 'title_separator' ].$page[ 'title' ];
$page[ 'page_id' ] = 'setup';

if( isset( $_POST[ 'create_db' ] ) ) {
	// Anti-CSRF
	if (array_key_exists ("session_token", $_SESSION)) {
		$session_token = $_SESSION[ 'session_token' ];
	} else {
		$session_token = "";
	}

	checkToken( $_REQUEST[ 'user_token' ], $session_token, 'setup.php' );

	if( $DBMS == 'MySQL' ) {
		include_once DVWA_WEB_PAGE_TO_ROOT . 'dvwa/includes/DBMS/MySQL.php';
	}
	elseif($DBMS == 'PGSQL') {
		// include_once DVWA_WEB_PAGE_TO_ROOT . 'dvwa/includes/DBMS/PGSQL.php';
		dvwaMessagePush( 'PostgreSQL is not yet fully supported.' );
		dvwaPageReload();
	}
	else {
		dvwaMessagePush( 'ERROR: Invalid database selected. Please review the config file syntax.' );
		dvwaPageReload();
	}
}

// Anti-CSRF
generateSessionToken();

$page[ 'body' ] .= "
<div class=\"body_padded\">
	<h1>Configuración de la base de datos <img src=\"" . DVWA_WEB_PAGE_TO_ROOT . "dvwa/images/spanner.png\" /></h1>

	<p>Haz click en en el botoón 'Crear / reiniciar DB' para crear o reiniciar la base de datos de la aplicación web.<br />


	<p>Si la BD ya existe, <em>toda la información será reseteada según la configuración del servidor</em>.<br />

	<hr />
	<br />

	<h2>Estado de la configuración</h2>

	{$DVWAOS}<br />
	Backend database: <em>{$DBMS}</em><br />
	PHP version: <em>" . phpversion() . "</em><br />
	<br />
	{$SERVER_NAME}<br />
	<br />
	{$phpDisplayErrors}<br />
	{$phpSafeMode}<br/ >
	{$phpURLInclude}<br/ >
	{$phpURLFopen}<br />
	{$phpMagicQuotes}<br />
	{$phpGD}<br />
	{$phpMySQL}<br />
	{$phpPDO}<br />
	<br />
	{$MYSQL_USER}<br />
	{$MYSQL_PASS}<br />
	{$MYSQL_DB}<br />
	{$MYSQL_SERVER}<br />
	<br />
	{$DVWARecaptcha}<br />
	<br />
	{$DVWAUploadsWrite}<br />
	{$DVWAPHPWrite}<br />
	<br />
	<br />
	{$bakWritable}
	<br />
	<i><span class=\"failure\">Los módulos en rojo</span> indican que habrá futuros problemas al intentar completar algunos módulos.</i><br />
	<br />
	Si ves dehabilitada la función <i>allow_url_fopen</i> o <i>allow_url_include</i>, haz los cambios necesarios en el archivo php.ini y reinicia el servidor Apache.<br />
	<pre><code>allow_url_fopen = On
allow_url_include = On</code></pre>

	<br /><br /><br />

	<!-- Create db button -->
	<form action=\"#\" method=\"post\">
		<input name=\"create_db\" type=\"submit\" value=\"Crear / reiniciar BD\">
		" . tokenField() . "
	</form>
	<br />
	<hr />
</div>";

dvwaHtmlEcho( $page );

?>
