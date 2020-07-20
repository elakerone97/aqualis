<?php

/*

This file contains all of the code to setup the initial MySQL database. (setup.php)

*/

if( !defined( 'DVWA_WEB_PAGE_TO_ROOT' ) ) {
	define( 'DVWA_WEB_PAGE_TO_ROOT', '../../../' );
}

if( !@($GLOBALS["___mysqli_ston"] = mysqli_connect( $_DVWA[ 'db_server' ],  $_DVWA[ 'db_user' ],  $_DVWA[ 'db_password' ] )) ) {
	dvwaMessagePush( "Could not connect to the MySQL service.<br />Please check the config file." );
	if ($_DVWA[ 'db_user' ] == "root") {
		dvwaMessagePush( 'Your database user is root, if you are using MariaDB, this will not work, please read the README.md file.' );
	}
	dvwaPageReload();
}


// Create database
$drop_db = "DROP DATABASE IF EXISTS {$_DVWA[ 'db_database' ]};";
if( !@mysqli_query($GLOBALS["___mysqli_ston"],  $drop_db ) ) {
	dvwaMessagePush( "Could not drop existing database<br />SQL: " . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) );
	dvwaPageReload();
}

$create_db = "CREATE DATABASE {$_DVWA[ 'db_database' ]};";
if( !@mysqli_query($GLOBALS["___mysqli_ston"],  $create_db ) ) {
	dvwaMessagePush( "Could not create database<br />SQL: " . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) );
	dvwaPageReload();
}
dvwaMessagePush( "Database has been created." );


// Create table 'users'
if( !@((bool)mysqli_query($GLOBALS["___mysqli_ston"], "USE " . $_DVWA[ 'db_database' ])) ) {
	dvwaMessagePush( 'Could not connect to database.' );
	dvwaPageReload();
}

$create_tb = "CREATE TABLE users (user_id int(6),first_name varchar(15),last_name varchar(15), user varchar(15), password varchar(32),avatar varchar(70), last_login TIMESTAMP, failed_login INT(3), dni CHAR(9), telefono CHAR(9), PRIMARY KEY (user_id));";
if( !mysqli_query($GLOBALS["___mysqli_ston"],  $create_tb ) ) {
	dvwaMessagePush( "Table could not be created<br />SQL: " . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) );
	dvwaPageReload();
}
dvwaMessagePush( "'users' table was created." );


// Insert some data into users
$base_dir= str_replace ("setup.php", "", $_SERVER['SCRIPT_NAME']);
$avatarUrl  = $base_dir . 'hackable/users/';

$insert = "INSERT INTO users VALUES
	('1','admin','admin','admin',MD5('password'),'{$avatarUrl}admin.jpg', NOW(), '0','NULL','NULL'),
	('2','Javier','Núñez','rnunez',MD5('perro'),'{$avatarUrl}perro.jpg', NOW(), '0','18064755A','656495596'),
	('3','Marcos','Jiménez','mjimenez',MD5('gato'),'{$avatarUrl}gato.jpg', NOW(), '0','51373072L','628218287'),
	('4','Raúl','Muñoz','rmunoz',MD5('serpiente'),'{$avatarUrl}serpiente.jpg', NOW(), '0','50573473S','630426839'),
	('5','David','Alonso','dalonso',MD5('lagarto'),'{$avatarUrl}lagarto.jpg', NOW(), '0','41106626Z','684716805'),
	('6','Víctor','Martín','vmartin',MD5('pez'),'{$avatarUrl}pez.jpg', NOW(), '0','56527094V','612086334'),
	('7','Carlos','Pascual','cpascual',MD5('mandalorian74'),'{$avatarUrl}carlos.jpg', NOW(), '0','40580488H','661702245');
	";
if( !mysqli_query($GLOBALS["___mysqli_ston"],  $insert ) ) {
	dvwaMessagePush( "Data could not be inserted into 'users' table<br />SQL: " . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) );
	dvwaPageReload();
}
dvwaMessagePush( "Data inserted into 'users' table." );


// Create guestbook table
$create_tb_guestbook = "CREATE TABLE guestbook (comment_id SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT, comment varchar(300), name varchar(100), PRIMARY KEY (comment_id));";
if( !mysqli_query($GLOBALS["___mysqli_ston"],  $create_tb_guestbook ) ) {
	dvwaMessagePush( "Table could not be created<br />SQL: " . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) );
	dvwaPageReload();
}
dvwaMessagePush( "'guestbook' table was created." );


// Insert data into 'guestbook'
$insert = "INSERT INTO guestbook VALUES
	('1','La tienda que necesitaba nuestro barrio desde hace años!.','Javier'),
	('2','Echo en falta en la tienda una jaula más grande para mi suricato, que cada día crece más...','Fer Chen'),
	('3','Un trato de 10, me ayudaron a elegir la decoración para mi acuario durante casi una hora. ','Rosaura');
	";

if( !mysqli_query($GLOBALS["___mysqli_ston"],  $insert ) ) {
	dvwaMessagePush( "Data could not be inserted into 'guestbook' table<br />SQL: " . ((is_object($GLOBALS["___mysqli_ston"])) ? mysqli_error($GLOBALS["___mysqli_ston"]) : (($___mysqli_res = mysqli_connect_error()) ? $___mysqli_res : false)) );
	dvwaPageReload();
}
dvwaMessagePush( "Data inserted into 'guestbook' table." );



// Copy .bak for a fun directory listing vuln
$conf = DVWA_WEB_PAGE_TO_ROOT . 'config/config.inc.php';
$bakconf = DVWA_WEB_PAGE_TO_ROOT . 'config/config.inc.php.bak';
if (file_exists($conf)) {
	// Who cares if it fails. Suppress.
	@copy($conf, $bakconf);
}

dvwaMessagePush( "Backup file /config/config.inc.php.bak automatically created" );

// Done
dvwaMessagePush( "<em>Setup successful</em>!" );

if( !dvwaIsLoggedIn())
	dvwaMessagePush( "Please <a href='login.php'>login</a>.<script>setTimeout(function(){window.location.href='login.php'},5000);</script>" );
dvwaPageReload();

?>
