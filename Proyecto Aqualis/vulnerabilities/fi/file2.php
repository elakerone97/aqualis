<?php

$page[ 'body' ] .= "
<div class=\"body_padded\">
	<h1>Ganadores ¡Disfraza a tu mascota!</h1>

	<div>Aquí puedes ver a los ganadores de los últimos 3 meses en nuestro concurso ¡Disfraza a tu mascota!         </div>                                                                                                                          </br>

	<div class=\"vulnerable_code_area\">
		<br/>                                                                                                                   
		<h3 style=\"font-size:30px\">Garfield</h3>                                                                                <hr />                                                                                                                 
		<img src=\"./images/garfield.jpg\">                           
		<br/><br/>                                            
		[<em><a href=\"?page=include.php\">Atrás</a></em>]	</div>

	<h2>Más información</h2>
	<ul>
		<li>" . dvwaExternalLinkUrlGet( 'https://en.wikipedia.org/wiki/Remote_File_Inclusion' ) . "</li>
		<li>" . dvwaExternalLinkUrlGet( 'https://www.owasp.org/index.php/Top_10_2007-A3' ) . "</li>
	</ul>
</div>\n";

?>
