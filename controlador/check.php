<?php
	include_once "./../modelos/conexion.php";
	$usuario = $_POST["usuario"];
	$password = $_POST["password"];
	$sql = "SELECT * FROM CUENTA";
	$resultado = $conexion->query( $sql );
	while( $renglon = $resultado->fetch_assoc() ){
		if( ( strcmp($usuario, $renglon["usuario"]) == 0 ) && ( strcmp( $password, $renglon["password"] ) == 0 ) ){
			if( strcmp("ADMINISTRADOR", $renglon["tipo_cuenta"] ) == 0  ){
				header("Location: ./../vistas/administrador.html" );
			}else if( strcmp("EMPLEADO", $renglon["tipo_cuenta"] ) == 0 ){
				header("Location: ./../vistas/empleado.html" );
			}else{
				header( "Location: ./../vistas/cliente.html" );
			}
		}
	}
?>