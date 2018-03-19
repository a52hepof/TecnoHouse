<?php

	/*
	* Escript para conectarse a la base de datos y cargar la informacion.
	*/
	$nombreServidor = 'localhost';
	$usuario        = 'id5118088_technohouse';
	$password       = '12345';
	$dbnombre		= 'id5118088_inmobiliaria';

	$conexion = new mysqli( $nombreServidor, $usuario, $password, $dbnombre );

	if( $conexion->connect_error ){
		die( "Fallo la conexion: " . $conexion->connect_error );
	}

	$error = [];
	//sql para crear todas las tablas
	$TablaCuenta = "CREATE TABLE IF NOT EXISTS CUENTA(
				id_cuenta 	INT				AUTO_INCREMENT PRIMARY KEY,
				usuario		VARCHAR( 70 )	NOT NULL,
				password 	VARCHAR( 100 )	NOT NULL,
				tipo_cuenta	VARCHAR( 20 )	NOT NULL,

				CONSTRAINT chk_tipo_cuenta CHECK( tipo_cuenta = 'ADMINISTRADOR' | tipo_cuenta = 'EMPLEADO' | tipo_cuenta = 'CLIENTE'  )
				)";
	
	$TablaAdministrador = "CREATE TABLE IF NOT EXISTS ADMINISTRADOR(
				id_administrador	INT 				AUTO_INCREMENT PRIMARY KEY,
				nombre 				VARCHAR( 100 )		NOT NULL,
				apellido_paterno	VARCHAR( 50 )		NOT NULL,
				apellido_materno	VARCHAR( 50 ),
				id_cuenta			INT 				NOT NULL
			)";
	
	$TablaDireccion = "
			CREATE TABLE IF NOT EXISTS DIRECCION(
				id_direccion	 INT 			AUTO_INCREMENT PRIMARY KEY,
				ciudad			VARCHAR( 70 )	NOT NULL,
				colonia			VARCHAR( 70 )	NOT NULL,
				calle			VARCHAR( 70 )	NOT NULL,
				numero			VARCHAR( 10 )	NOT NULL
			)";

	$TablaTelefono = "
			CREATE TABLE IF NOT EXISTS TELEFONO(
				id_telefono 	INT 			PRIMARY KEY,
				id_direccion 	INT 			NOT NULL,
				telefono 		VARCHAR( 20 )	NOT NULL,

				CONSTRAINT telefono_fk FOREIGN KEY( id_direccion )
					REFERENCES DIRECCION( id_direccion )
			)";

	$TablaAgencia = "
			CREATE TABLE IF NOT EXISTS AGENCIA(
				id_agencia	 	INT 			AUTO_INCREMENT PRIMARY KEY,
				fax			 	VARCHAR( 50 )	NOT NULL,
				id_direccion	INT 			NOT NULL,
				id_titular		INT 			NOT NULL,
				id_zona   		INT 			NOT NULL
			)";
	$TablaEmpleado = "
			CREATE TABLE IF NOT EXISTS EMPLEADO(
				id_empleado 		INT 				AUTO_INCREMENT PRIMARY KEY,
				id_agencia 			INT 				NOT NULL,
				nombre 				VARCHAR( 60 )		NOT NULL,
				apellido_paterno	VARCHAR( 60 )		NOT NULL,
				apellido_materno	VARCHAR( 60 ),
				tipo_empleado		VARCHAR( 60 )		NOT NULL,
				id_cuenta			INT 				NOT NULL,

				CONSTRAINT empleado_fk FOREIGN KEY( id_agencia )
					REFERENCES AGENCIA( id_agencia ) 
			)";

	$TablaTitular = "
			CREATE TABLE IF NOT EXISTS TITULAR(
				id_titular 	INT 	AUTO_INCREMENT PRIMARY KEY,
				id_empleado INT 	NOT NULL,

				CONSTRAINT titular_fk FOREIGN KEY( id_empleado )
					REFERENCES EMPLEADO( id_empleado )
			)";

	$TablaVendedor = "
				CREATE TABLE IF NOT EXISTS VENDEDOR(
				id_vendedor 	INT 	AUTO_INCREMENT PRIMARY KEY,
				id_empleado		INT 	NOT NULL,

				CONSTRAINT vendedor_fk FOREIGN KEY( id_empleado )
					REFERENCES EMPLEADO( id_empleado )
			)";

	$TablaCliente = "
			CREATE TABLE IF NOT EXISTS CLIENTE(
				id_cliente 			INT 				AUTO_INCREMENT PRIMARY KEY,
				id_vendedor			INT 				NOT NULL,
				nombre 				VARCHAR( 60 )       NOT NULL,
				apellido_paterno	VARCHAR( 60 )		NOT NULL,
				apellido_materno	VARCHAR( 60 ),
				correo				VARCHAR( 60 )		NOT NULL,
				id_cuenta			INT,
				id_direccion 		INT 				NOT NULL,

				CONSTRAINT cliente_fk FOREIGN KEY( id_vendedor )
					REFERENCES VENDEDOR( id_vendedor )
			)";

	$TablaZona = "
			CREATE TABLE IF NOT EXISTS ZONA(
				id_zona 		INT 			PRIMARY KEY,
				nombre_zona		VARCHAR( 60 )	NOT NULL
			)";

	$TablaInmueble = "
			CREATE TABLE IF NOT EXISTS INMUEBLE(
				id_inmueble 		INT 			AUTO_INCREMENT PRIMARY KEY,
				id_zona 			INT 			NOT NULL,
				id_cliente 			INT,
				propietario			VARCHAR( 100 )	NOT NULL,
				tipo_renta_venta	VARCHAR( 15 )	NOT NULL,
				tipo_local_piso	VARCHAR( 20 )	NOT NULL,
				
				CONSTRAINT chk_tipo_inmueble 
					CHECK( tipo_local_piso = 'LOCAL' | tipo_local_piso = 'PISO' ),
				CONSTRAINT refzona_fk FOREIGN KEY( id_zona )
					REFERENCES ZONA( id_zona ),
				CONSTRAINT refcliente_fk FOREIGN KEY( id_cliente )
					REFERENCES CLIENTE( id_cliente )
			)";

	$TablaLocal = "
			CREATE TABLE IF NOT EXISTS LOCAL(
				id_local		INT 		AUTO_INCREMENT PRIMARY KEY,
				id_inmueble 	INT 		NOT NULL,
				licencia		INT,

				CONSTRAINT local_fk FOREIGN KEY( id_inmueble )
					REFERENCES INMUEBLE( id_inmueble )
			)";

	$TablaPiso = "
			CREATE TABLE IF NOT EXISTS PISO(
				id_piso 			INT 			AUTO_INCREMENT PRIMARY KEY,
				id_inmueble 		INT 			NOT NULL,
				num_habitaciones	INT 			NOT NULL,
				num_banios 			INT 			NOT NULL,
				tipo_ambiente 		VARCHAR( 10 ) 	NOT NULL,
				tipo_gas 			VARCHAR( 10 )	NOT NULL,

				CONSTRAINT chk_tipo_ambiente CHECK( tipo_ambiente = 'INTERIOR' | tipo_ambiente = 'EXTERIOR' ),
				CONSTRAINT chk_tipo_gas	CHECK( tipo_gas = 'NATURAL' | tipo_gas = 'CIUDAD' | tipo_gas = 'BUTANO'  ),
				CONSTRAINT	piso_fk FOREIGN KEY( id_inmueble )
					REFERENCES INMUEBLE( id_inmueble )	
			)";

	$TablaVenta = "
			CREATE TABLE IF NOT EXISTS VENTA(
				id_venta		INT 			AUTO_INCREMENT PRIMARY KEY,
				id_inmueble 	INT 			NOT NULL,
				precio_venta 	INT,
				hipotecado 		VARCHAR( 10 ),

				CONSTRAINT venta_fk FOREIGN KEY( id_inmueble )
					REFERENCES INMUEBLE( id_inmueble )
			)";

	$TablaAlquiler = "
			CREATE TABLE IF NOT EXISTS ALQUILER(
				id_alquiler 		INT 		AUTO_INCREMENT PRIMARY KEY,
				id_inmueble 		INT 		NOT NULL,
				precio_alquiler		INT 		NOT NULL,
				fianza				INT 		NOT NULL,

				CONSTRAINT alquiler_fk FOREIGN KEY( id_inmueble )
					REFERENCES INMUEBLE( id_inmueble )
			)";

	$tablas = [ $TablaCuenta, $TablaAdministrador, $TablaDireccion, $TablaTelefono, $TablaAgencia, $TablaEmpleado, $TablaTitular, $TablaVendedor,
			    $TablaCliente, $TablaZona, $TablaInmueble, $TablaLocal, $TablaPiso, $TablaVenta, $TablaAlquiler ];
	foreach ($tablas as $key => $sql) {
		$query = $conexion->query( $sql );
	}
	if( !$query ){
		$error[] = "Tabla ". $conexion->error;
	}else{
		$error[] = " Se creo correctamente. "; 
	}

	$conexion->close();
?>