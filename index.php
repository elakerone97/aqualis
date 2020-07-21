<?php

define( 'DVWA_WEB_PAGE_TO_ROOT', '' );
require_once DVWA_WEB_PAGE_TO_ROOT . 'dvwa/includes/dvwaPage.inc.php';

dvwaPageStartup( array( 'authenticated', 'phpids' ) );

$page = dvwaPageNewGrab();
$page[ 'title' ]   = 'Welcome' . $page[ 'title_separator' ].$page[ 'title' ];
$page[ 'page_id' ] = 'home';

$page[ 'body' ] .= "
<div style=\"text-align:justify\" class=\"body_padded\">
	<h1>¡Bienvenido a Aqualis Mascotas!</h1>
	</br>
 	<img style=\"display:block;margin:0 auto\" src=\"../../dvwa/images/index.jpg\" alt=\"Aqualis Mascotas\"/></br>
	<h3 style=\"line-height: 20px;\">Tenemos más de 13 años de experiencia en la venta de mascotas: peces y aves tropicales, reptiles y pequeños roedores. También gestionamos desde la misma tienda un centro de recogida de perros y gatos, que viven con nosotros a la espera de que los adoptes en tu familia.</h3>
	</br>
	<h3 style=\"text-align:center\"><b>Puedes encontrarnos en c/ Valencia 21, Barcelona</b></h3>
	<p style=\"font-style:italic;border-top: 2px solid #098CC5;padding-top: 0.9em;\">La tecnología utilizada en este sitio web pertenece originalmente al proyecto Damn Vulnerable Web Application (DVWA), publicado bajo la licencia GNU General Public License v3, que nos permite usar y modificar su código para nuestros objetivos didácticos (esta web no es real ni tiene un objetivo lucrativo). Confiamos en haber elegido un modelo de web seguro sobre el que no se pueda hacer uso de vulnerabilidades conocidas en un ataque.</p>
	<p  style=\"font-style:italic;\">A continuación dejamos el texto que <span style=\"text-decoration: line-through;\"> no hemos leído</span>&nbsp;DVWA aporta en su web con información adicional y los disclaimers requeridos.</p>
	<hr />
	<br />

	<h2>Instrucciones generales</h2>
	<p>	Damn Vulnerable Web Application (DVWA) es una aplicación web PHP / MySQL muy vulnerable. Su objetivo principal es ayudar a los profesionales de seguridad a probar sus habilidades y herramientas en un entorno legítimo, ayudar a los desarrolladores web a comprender mejor los procesos de seguridad de las aplicaciones web y ayudar a estudiantes y profesores a aprender sobre la seguridad de las aplicaciones web en un entorno controlado.</p>
	<p>El objetivo de DVWA es practicar algunas de las vulnerabilidades web más comunes, con varios niveles de dificultad, con una interfaz simple y directa.</p>
	<p>DVWA también incluye un firewall de aplicaciones web (WAF), PHPIDS, que se puede habilitar en cualquier etapa para aumentar aún más la dificultad. Esto demostrará cómo agregar otra capa de seguridad puede bloquear ciertas acciones maliciosas. ¡Ten en cuenta que también existen varios métodos públicos para evitar estas protecciones (esto puede verse como una extensión para usuarios más avanzados)!</p>
	<p>Ten en cuenta que existen vulnerabilidades documentadas y no documentadas en este software de forma intencionada. Te recomendamos que intentes descubrir tantos problemas como sea posible.</p>
	<p>Hay un botón de ayuda en la parte inferior de cada página, que le permite ver sugerencias y consejos para esa vulnerabilidad. También hay enlaces adicionales para lecturas de fondo adicionales, que se relacionan con ese problema de seguridad.</p>
	<hr />
	<br />

	<h2>¡PELIGRO!</h2>
	<p><em>¡Damn Vulnerable Web Application es una aplicación muy vulnerable!</em> No la expongas de forma pública en Internet, ya que tu servidor se verá comprometido. Se recomienda usar un entorno virtual, como " . dvwaExternalLinkUrlGet( 'https://www.virtualbox.org/','VirtualBox' ) . " o " . dvwaExternalLinkUrlGet( 'https://www.vmware.com/','VMware' ) . ", configurados en modo NAT.</p>
	<br />
	<h3>Disclaimer</h3>
	<p>No nos hacemos responsables de la forma en que alguien usa esta aplicación. Hemos aclarado los propósitos de la aplicación y no debe usarse de manera maliciosa. Hemos emitido advertencias y tomado medidas para evitar que los usuarios instalen DVWA en servidores web activos. Si tu servidor web se ve comprometido a través de una instalación de DVWA, no es nuestra responsabilidad, es responsabilidad de la persona que lo descargue e instale.</p>
	<hr />
	<br />

	<h2>Otros recursos</h2>
	<p>DVWA tiene el objetivo de cubrir las vulnerabilidades en aplicaciones web más comunes hoy en día. Sin embargo, hay muchos otros problemas en los sitios alojados en Internet. Si deseas explorar cualquier vector de ataque adicional, o deseas desafíos más difíciles, puedes considerar los siguientes proyectos::</p>
	<ul>
		<li>" . dvwaExternalLinkUrlGet( 'http://www.itsecgames.com/', 'bWAPP') . "</li>
		<li>" . dvwaExternalLinkUrlGet( 'http://sourceforge.net/projects/mutillidae/files/mutillidae-project/', 'NOWASP') . " (conocido como " . dvwaExternalLinkUrlGet( 'http://www.irongeek.com/i.php?page=mutillidae/mutillidae-deliberately-vulnerable-php-owasp-top-10', 'Mutillidae' ) . ")</li>
		<li>" . dvwaExternalLinkUrlGet( 'https://www.owasp.org/index.php/OWASP_Broken_Web_Applications_Project', 'OWASP Broken Web Applications Project
') . "</li>
	</ul>
	<hr />
	<br />
</div>";

dvwaHtmlEcho( $page );

?>
