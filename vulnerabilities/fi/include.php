<?php

// Check if the right PHP functions are enabled
$WarningHtml = '';
if( !ini_get( 'allow_url_include' ) ) {
	$WarningHtml .= "<div class=\"warning\">The PHP function <em>allow_url_include</em> is not enabled.</div>";
}
if( !ini_get( 'allow_url_fopen' ) ) {
	$WarningHtml .= "<div class=\"warning\">The PHP function <em>allow_url_fopen</em> is not enabled.</div>";
}


$page[ 'body' ] .= "
<div class=\"body_padded\">
	<h1>Ganadores ¡Disfraza a tu mascota!</h1>

	<div>Aquí puedes ver a los ganadores de los últimos 3 meses en nuestro concurso ¡Disfraza a tu mascota!</div>
	</br>

	{$WarningHtml}

	<div class=\"vulnerable_code_area\">
		[<em><a href=\"?page=file1.php\">Sticky</a></em>] - [<em><a href=\"?page=file2.php\">Garfield</a></em>] - [<em><a href=\"?page=file3.php\">Coyote</a></em>]
	</div>

	<h2>Más información</h2>
	<ul>
		<li>" . dvwaExternalLinkUrlGet( 'https://en.wikipedia.org/wiki/Remote_File_Inclusion' ) . "</li>
		<li>" . dvwaExternalLinkUrlGet( 'https://www.owasp.org/index.php/Top_10_2007-A3' ) . "</li>
	</ul>
</div>\n";

?>
