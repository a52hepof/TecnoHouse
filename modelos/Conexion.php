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

	//sql para crear todas las tablas
	$sql = "	CREATE TABLE CUENTA(
				id_cuenta 	INT				AUTO_INCREMENT PRIMARY KEY,
				usuario		VARCHAR( 70 )	NOT NULL,
				password 	VARCHAR( 100 )	NOT NULL,
				tipo_cuenta	VARCHAR( 20 )	NOT NULL,

				CONSTRAINT chk_tipo_cuenta CHECK( tipo_cuenta = 'ADMINISTRADOR' | tipo_cuenta = 'EMPLEADO' | tipo_cuenta = 'CLIENTE'  )
			);
			ALTER TABLE ADD CONSTRAINT cuenta_pk PRIMARY KEY( id_cuenta );
			--
			--TABLE: ADMINISTRADOR
			--
			CREATE TABLE ADMINISTRADOR(
				id_administrador	INT 				AUTO_INCREMENT PRIMARY KEY,
				nombre 				VARCHAR( 100 )		NOT NULL,
				apellido_paterno	VARCHAR( 50 )		NOT NULL,
				apellido_materno	VARCHAR( 50 ),
				id_cuenta			INT 				NOT NULL
			);
			ALTER TABLE ADD CONSTRAINT administrador_pk PRIMARY KEY( id_administrador );
			
			--
			--TABLE: DIRECCION
			CREATE TABLE DIRECCION(
				id_direccion	 INT 			AUTO_INCREMENT PRIMARY KEY,
				ciudad			VARCHAR( 70 )	NOT NULL,
				colonia			VARCHAR( 70 )	NOT NULL,
				calle			VARCHAR( 70 )	NOT NULL,
				numero			VARCHAR( 10 )	NOT NULL
			);
			ALTER TABLE DIRECCION ADD CONSTRAINT direccion_pk PRIMARY KEY( id_direccion );

			--
			-- TABLE: TELEFONO
			--
			CREATE TABLE TELEFONO(
				id_telefono 	INT 			NOT NULL,
				id_direccion 	INT 			NOT NULL,
				telefono 		VARCHAR( 20 )	NOT NULL,

				CONSTRAINT telefono_fk FOREIGN KEY( id_direccion )
					REFERENCES DIRECCION( id_direccion )
			);
			ALTER TABLE TELEFONO ADD CONSTRAINT telefono_pk PRIMARY KEY( id_telefono );

			--
			-- TABLE: AGENCIA
			--
			CREATE TABLE AGENCIA(
				id_agencia	 	INT 			AUTO_INCREMENT PRIMARY KEY,
				fax			 	VARCHAR( 50 )	NOT NULL,
				id_direccion	INT 			NOT NULL,
				id_titular		INT 			NOT NULL,
				id_zona   		INT 			NOT NULL
			);
			ALTER TABLE AGENCIA ADD CONSTRAINT agencia_fk PRIMARY KEY( id_agencia );


			--
			--TABLE: EMPLEADO
			--
			CREATE TABLE EMPLEADO(
				id_empleado 		INT 				AUTO_INCREMENT PRIMARY KEY,
				id_agencia 			INT 				NOT NULL,
				nombre 				VARCHAR( 60 )		NOT NULL,
				apellido_paterno	VARCHAR( 60 )		NOT NULL,
				apellido_materno	VARCHAR( 60 ),
				tipo_empleado		VARCHAR( 60 )		NOT NULL,
				id_cuenta			INT 				NOT NULL,

				CONSTRAINT empleado_fk FOREIGN KEY( id_agencia )
					REFERENCES AGENCIA( id_agencia ) 
			);
			ALTER TABLE EMPLEADO ADD CONSTRAINT empleado_pk PRIMARY KEY( id_empleado );

			--
			--TABLE: TITULAR
			--
			CREATE TABLE TITULAR(
				id_titular 	INT 	AUTO_INCREMENT PRIMARY KEY,
				id_empleado INT 	NOT NULL,

				CONSTRAINT titular_fk FOREIGN KEY( id_empleado )
					REFERENCES EMPLEADO( id_empleado )
			);
			ALTER TABLE TITULAR ADD CONSTRAINT titular_pk PRIMARY KEY( id_titular );

			--
			--TABLE: VENDEDOR
			--
			CREATE TABLE VENDEDOR(
				id_vendedor 	INT 	AUTO_INCREMENT PRIMARY KEY,
				id_empleado		INT 	NOT NULL,

				CONSTRAINT vendedor_fk FOREIGN KEY( id_empleado )
					REFERENCES EMPLEADO( id_empleado )
			);
			ALTER TABLE VENDEDOR ADD CONSTRAINT vendedor_pk PRIMARY KEY( id_vendedor );

			--
			--TABLE: CLIENTE
			--
			CREATE TABLE CLIENTE(
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
			);
			ALTER TABLE CLIENTE ADD CONSTRAINT cliente_pk PRIMARY KEY( id_cliente );

			--
			--TABLE: ZONA
			--
			CREATE TABLE ZONA(
				id_zona 		INT 			NOT NULL,
				nombre_zona		VARCHAR( 60 )	NOT NULL
			);

			ALTER TABLE ZONA ADD CONSTRAINT zona_pk PRIMARY KEY( id_zona );

			--
			--TABLE: INMUEBLE
			--
			CREATE TABLE INMUEBLE(
				id_inmueble 		INT 			AUTO_INCREMENT PRIMARY KEY,
				id_zona 			INT 			NOT NULL,
				id_cliente 			INT,
				propietario			VARCHAR( 100 )	NOT NULL,
				tipo_renta_venta	VARCHAR( 15 )	NOT NULL,
				tipo_local_piso	VARCHAR( 20 )	NOT NULL,

				--Revisamos que los datos ingresados sean consistentes al tipo de inmueble.
				CONSTRAINT chk_tipo_inmueble 
					CHECK( tipo_local_piso = 'LOCAL' | tipo_local_piso = 'PISO' ),
				CONSTRAINT refzona_fk FOREIGN KEY( id_zona )
					REFERENCES ZONA( id_zona ),
				CONSTRAINT refcliente_fk FOREIGN KEY( id_cliente )
					REFERENCES CLIENTE( id_cliente )
			);
			ALTER TABLE INMUEBLE ADD CONSTRAINT inmueble_pk PRIMARY KEY( id_inmueble );

			--
			--TABLE: LOCAL
			--
			CREATE TABLE LOCAL(
				id_local		INT 		AUTO_INCREMENT PRIMARY KEY,
				id_inmueble 	INT 		NOT NULL,
				licencia		INT,

				CONSTRAINT local_fk FOREIGN KEY( id_inmueble )
					REFERENCES INMUEBLE( id_inmueble )
			);
			ALTER TABLE LOCAL ADD CONSTRAINT local_pk PRIMARY KEY( id_local );

			--
			--TABLE:PISO
			--
			CREATE TABLE PISO(
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
			);
			ALTER TABLE PISO ADD CONSTRAINT piso_pk PRIMARY KEY( id_piso );

			--
			--TABLE: VENTA
			--
			CREATE TABLE VENTA(
				id_venta		INT 			AUTO_INCREMENT PRIMARY KEY,
				id_inmueble 	INT 			NOT NULL,
				precio_venta 	INT,
				hipotecado 		VARCHAR( 10 ),

				CONSTRAINT venta_fk FOREIGN KEY( id_inmueble )
					REFERENCES INMUEBLE( id_inmueble )
			);
			ALTER TABLE VENTA ADD CONSTRAINT venta_pk PRIMARY KEY( id_venta);

			--
			--TABLE: ALQUILER
			--
			CREATE TABLE ALQUILER(
				id_alquiler 		INT 		AUTO_INCREMENT PRIMARY KEY,
				id_inmueble 		INT 		NOT NULL,
				precio_alquiler		INT 		NOT NULL,
				fianza				INT 		NOT NULL,

				CONSTRAINT alquiler_fk FOREIGN KEY( id_inmueble )
					REFERENCES INMUEBLE( id_inmueble )
			);
			ALTER TABLE ALQUILER ADD CONSTRAINT alquiler_pk PRIMARY KEY( id_alquiler );";

	if( $conexion->query( $sql ) == TRUE ){
		echo "Se crearon bien tooodas las tablas.";
	}else{
		echo "Ocurrio un error al crear las tablas: ". $conexion->error;
	}

	$conexion->close();
?>