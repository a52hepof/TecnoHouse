<?php
	$nombreServidor = 'localhost';
	$usuario        = 'id5118088_technohouse';
	$password       = '12345';
	$dbnombre		= 'id5118088_inmobiliaria';
	$conexion = new mysqli( $nombreServidor, $usuario, $password, $dbnombre );
	if( $conexion->connect_error ){
		die( "Fallo la conexion: " . $conexion->connect_error );
	}
?>