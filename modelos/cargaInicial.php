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

	//Cuentas de Administradores
	$sql = "
	INSERT INTO CUENTA( id_cuenta, usuario, password, tipo_cuenta ) VALUES( DEFAULT, 'rodolfo66', 'esponjoso23', 'ADMINISTRADOR' );";
	$sql .= "
	INSERT INTO CUENTA( id_cuenta, usuario, password, tipo_cuenta ) VALUES( DEFAULT, 'krustacio', 'cascarudo', 'ADMINISTRADOR' );";
	$sql .= "
	INSERT INTO CUENTA( id_cuenta, usuario, password, tipo_cuenta ) VALUES( DEFAULT, 'frenetico78', 'vasoVacio23', 'ADMINISTRADOR' );";
	$sql .="
	INSERT INTO CUENTA( id_cuenta, usuario, password, tipo_cuenta ) VALUES( DEFAULT, 'mochila23', 'escolar', 'ADMINISTRADOR' );";
	$sql .= "
	INSERT INTO CUENTA( id_cuenta, usuario, password, tipo_cuenta ) VALUES( DEFAULT, 'hojaenblanco', 'sinescribir', 'ADMINISTRADOR' );";

	//Cuentas de empleados
	$sql .= "
	INSERT INTO CUENTA( id_cuenta, usuario, password, tipo_cuenta ) VALUES( DEFAULT, 'libropastadura', 'bibliotecaDCB', 'EMPLEADO' );";
	$sql .= "
	INSERT INTO CUENTA( id_cuenta, usuario, password, tipo_cuenta ) VALUES( DEFAULT, 'plumapquepinta', 'colorrojo', 'EMPLEADO' );";
	$sql .= "
	INSERT INTO CUENTA( id_cuenta, usuario, password, tipo_cuenta ) VALUES( DEFAULT, 'nuncavende', 'departamentos', 'EMPLEADO' );";
	$sql .= "
	INSERT INTO CUENTA( id_cuenta, usuario, password, tipo_cuenta ) VALUES( DEFAULT, 'infeliz44', 'enlavida:(', 'EMPLEADO' );";
	$sql .= "
	INSERT INTO CUENTA( id_cuenta, usuario, password, tipo_cuenta ) VALUES( DEFAULT, 'robocop22', 'matargatitos', 'EMPLEADO' );";
	$sql .= "
	INSERT INTO CUENTA( id_cuenta, usuario, password, tipo_cuenta ) VALUES( DEFAULT, 'killermaster', 'runlatexunico', 'EMPLEADO' );";
	$sql .= "
	INSERT INTO CUENTA( id_cuenta, usuario, password, tipo_cuenta ) VALUES( DEFAULT, 'sevahacerono', 'carnitasada', 'EMPLEADO' );";
	$sql .= "
	INSERT INTO CUENTA( id_cuenta, usuario, password, tipo_cuenta ) VALUES( DEFAULT, 'yurikoyti', 'perestroika', 'EMPLEADO' );";
	$sql .= "
	INSERT INTO CUENTA( id_cuenta, usuario, password, tipo_cuenta ) VALUES( DEFAULT, 'simsimi', 'inteligenciartifical', 'EMPLEADO' );";
	$sql .= "
	INSERT INTO CUENTA( id_cuenta, usuario, password, tipo_cuenta ) VALUES( DEFAULT, 'yoamoelbueno', 'delmaincra', 'EMPLEADO' );";

	//Cuentas de clientes
	$sql .= "
	INSERT INTO CUENTA( id_cuenta, usuario, password, tipo_cuenta ) VALUES( DEFAULT, 'soyrico', 'noesciertojeje', 'CLIENTE' );";
	$sql .= "
	INSERT INTO CUENTA( id_cuenta, usuario, password, tipo_cuenta ) VALUES( DEFAULT, 'adivinante', 'siemprepierde', 'CLIENTE' );";
	$sql .= "
	INSERT INTO CUENTA( id_cuenta, usuario, password, tipo_cuenta ) VALUES( DEFAULT, 'computadora', 'barata123', 'CLIENTE' );";
	$sql .= "
	INSERT INTO CUENTA( id_cuenta, usuario, password, tipo_cuenta ) VALUES( DEFAULT, 'pantallalcd', '18pulgadas', 'CLIENTE' );";
	$sql .= "
	INSERT INTO CUENTA( id_cuenta, usuario, password, tipo_cuenta ) VALUES( DEFAULT, 'amorenelaire', 'foreveralone', 'CLIENTE' );";

	//ADMINISTRADOR
	$sql .= "
	INSERT INTO ADMINISTRADOR( id_administrador, nombre, apellido_paterno, apellido_materno, id_cuenta ) VALUES( DEFAULT, 'Rodolfo', 'Casares', 'Espinoza' , 1 );";
	$sql .= "
	INSERT INTO ADMINISTRADOR( id_administrador, nombre, apellido_paterno, apellido_materno, id_cuenta ) VALUES( DEFAULT, 'Nieto', 'Blanco', NULL, 2 );";
	$sql .= "
	INSERT INTO ADMINISTRADOR( id_administrador, nombre, apellido_paterno, apellido_materno, id_cuenta ) VALUES( DEFAULT, 'Andres', 'Obrador', 'Lopes', 3 );";
	$sql .= "
	INSERT INTO ADMINISTRADOR( id_administrador, nombre, apellido_paterno, apellido_materno, id_cuenta ) VALUES( DEFAULT, 'Elena', 'Sincope', NULL, 4 );";
	$sql .= "
	INSERT INTO ADMINISTRADOR( id_administrador, nombre, apellido_paterno, apellido_materno, id_cuenta ) VALUES( DEFAULT, 'Millie', 'Rosalina', 'Servadillo', 5 );";

	//DIRECCION
	$sql .= "
	INSERT INTO DIRECCION( id_direccion, ciudad, colonia, calle, numero ) VALUES( 1, 'MEXICO', 'ROSALES', 'PEDRO SOLA', '23' );";
	$sql .= "
	INSERT INTO DIRECCION( id_direccion, ciudad, colonia, calle, numero ) VALUES( 2, 'CIUDAD JUAREZ', 'ARBOLEADA', 'AGUACALIENTE', '19' );";
	$sql .= "
	INSERT INTO DIRECCION( id_direccion, ciudad, colonia, calle, numero ) VALUES( 3, 'SALTILLO', 'CLEOPATRA', 'RICARDO FLORES MAGON', '23' );";
	$sql .= "
	INSERT INTO DIRECCION( id_direccion, ciudad, colonia, calle, numero ) VALUES( 4, 'CHIMALHUACAN', 'CENTRO', 'MOCTEZUMA', '1002' );";
	$sql .= "
	INSERT INTO DIRECCION( id_direccion, ciudad, colonia, calle, numero ) VALUES( 5, 'GUADALUPE', 'SANTA URSULA', 'FRESNO', '10' );";
	$sql .= "
	INSERT INTO DIRECCION( id_direccion, ciudad, colonia, calle, numero ) VALUES( 6, 'REYNOSA', 'TABACO', 'MIRADOR', '60' );";
	$sql .= "
	INSERT INTO DIRECCION( id_direccion, ciudad, colonia, calle, numero ) VALUES( 7, 'TORREON', 'MELCHOR OCAMPO', 'CARMELITA', '22' );";
	$sql .= "
	INSERT INTO DIRECCION( id_direccion, ciudad, colonia, calle, numero ) VALUES( 8, 'MORELIA', 'PINOTEPA', 'GONZALES', '67' );";
	$sql .= "
	INSERT INTO DIRECCION( id_direccion, ciudad, colonia, calle, numero ) VALUES( 9, 'TOLUCA DE LERDO', 'SANTA MARIA', 'NUMERO 33', '100' );";
	$sql .= "
	INSERT INTO DIRECCION( id_direccion, ciudad, colonia, calle, numero ) VALUES( 10, 'GENERAL ESCOBEDO', 'MIRADOR', 'CACAHUATE', '83' );";
	$sql .= "
	INSERT INTO DIRECCION( id_direccion, ciudad, colonia, calle, numero ) VALUES( 11, 'VILLAHERMOSA', 'OLIMPO', 'SINALOA', '1' );";
	$sql .= "
	INSERT INTO DIRECCION( id_direccion, ciudad, colonia, calle, numero ) VALUES( 12, 'CELAYA', 'AULLIDOS DEL NORTE', 'AMAPOLA', '55' );";
	$sql .= "
	INSERT INTO DIRECCION( id_direccion, ciudad, colonia, calle, numero ) VALUES( 13, 'CUERNAVACA', 'PETROLEO', 'VICTORIA', '66' );";
	$sql .= "
	INSERT INTO DIRECCION( id_direccion, ciudad, colonia, calle, numero ) VALUES( 14, 'CANCUN', 'HEROICA', 'SAN JOSE MILPALTA', '11' );";
	$sql .= "
	INSERT INTO DIRECCION( id_direccion, ciudad, colonia, calle, numero ) VALUES( 15, 'TEPIC', 'DOLARES MEXICANOS', 'ELOTE CON CHILITO', '15' );";
	$sql .= "
	INSERT INTO DIRECCION( id_direccion, ciudad, colonia, calle, numero ) VALUES( 16, 'URUAPAN', 'LOS MOCHIS', 'RESPIRO', '90' );";
	$sql .= "
	INSERT INTO DIRECCION( id_direccion, ciudad, colonia, calle, numero ) VALUES( 17, 'MEXICALI', 'TENEYUCAN', 'CEREZOS', '44' );";
	$sql .= "
	INSERT INTO DIRECCION( id_direccion, ciudad, colonia, calle, numero ) VALUES( 18, 'SALTILLO', 'CHINA', 'MAGNOLIAS', '4' );";
	$sql .= "
	INSERT INTO DIRECCION( id_direccion, ciudad, colonia, calle, numero ) VALUES( 19, 'ZAPOPAN', 'LOS GONZALES', 'HUMAREDA', '23' );";
	$sql .= "
	INSERT INTO DIRECCION( id_direccion, ciudad, colonia, calle, numero ) VALUES( 20, 'TIJUANA', 'PRIMAVERA', 'ROCA CALIENTE', '39' );";

	//TELEFONO
	$sql .= "
	INSERT INTO TELEFONO( id_telefono, id_direccion, telefono ) VALUES( 1, 1, '0445529167777' );";
	$sql .= "
	INSERT INTO TELEFONO( id_telefono, id_direccion, telefono ) VALUES( 2, 2, '0445567891011' );";
	$sql .= "
	INSERT INTO TELEFONO( id_telefono, id_direccion, telefono ) VALUES( 3, 3, '0445541516171' );";
	$sql .= "
	INSERT INTO TELEFONO( id_telefono, id_direccion, telefono ) VALUES( 4, 4, '0445502122232' );";
	$sql .= "
	INSERT INTO TELEFONO( id_telefono, id_direccion, telefono ) VALUES( 5, 5, '0445562728292' );";
	$sql .= "
	INSERT INTO TELEFONO( id_telefono, id_direccion, telefono ) VALUES( 6, 6, '0445523334353' );";
	$sql .= "
	INSERT INTO TELEFONO( id_telefono, id_direccion, telefono ) VALUES( 7, 7, '0445579695942' );";
	$sql .= "
	INSERT INTO TELEFONO( id_telefono, id_direccion, telefono ) VALUES( 8, 8, '0445557974700' );";
	$sql .= "
	INSERT INTO TELEFONO( id_telefono, id_direccion, telefono ) VALUES( 9, 9, '0445535752588' );";
	$sql .= "
	INSERT INTO TELEFONO( id_telefono, id_direccion, telefono ) VALUES( 10, 10, '0445530405064' );";
	$sql .= "
	INSERT INTO TELEFONO( id_telefono, id_direccion, telefono ) VALUES( 11, 11, '0445553565255' );";
	$sql .= "
	INSERT INTO TELEFONO( id_telefono, id_direccion, telefono ) VALUES( 12, 12, '0445589808687' );";
	$sql .= "
	INSERT INTO TELEFONO( id_telefono, id_direccion, telefono ) VALUES( 13, 13, '0445576757473' );";
	$sql .= "
	INSERT INTO TELEFONO( id_telefono, id_direccion, telefono ) VALUES( 14, 14, '0445545464744' );";
	$sql .= "
	INSERT INTO TELEFONO( id_telefono, id_direccion, telefono ) VALUES( 15, 15, '0445590929345' );";

	//ZONA
	$sql .= "
	INSERT INTO ZONA( id_zona, nombre_zona ) VALUES( 1, 'ALPHA' );";
	$sql .="
	INSERT INTO ZONA( id_zona, nombre_zona ) VALUES( 2, 'BRAVO' );";
	$sql .= "
	INSERT INTO ZONA( id_zona, nombre_zona ) VALUES( 3, 'CHARLIE' );";
	$sql .= "
	INSERT INTO ZONA( id_zona, nombre_zona ) VALUES( 4, 'DELTA' );";
	$sql .= "
	INSERT INTO ZONA( id_zona, nombre_zona ) VALUES( 5, 'ECHO' );";
	$sql .= "
	INSERT INTO ZONA( id_zona, nombre_zona ) VALUES( 6, 'FOXTROT' );";
	$sql .= "
	INSERT INTO ZONA( id_zona, nombre_zona ) VALUES( 7, 'GOLF' );";
	$sql .= "
	INSERT INTO ZONA( id_zona, nombre_zona ) VALUES( 8, 'HOTEL' );";
	$sql .= "
	INSERT INTO ZONA( id_zona, nombre_zona ) VALUES( 9, 'INDIA' );";
	$sql .= "
	INSERT INTO ZONA( id_zona, nombre_zona ) VALUES( 10, 'JULIET' );";
	$sql .= "
	INSERT INTO ZONA( id_zona, nombre_zona ) VALUES( 11, 'KILO' );";
	$sql .= "
	INSERT INTO ZONA( id_zona, nombre_zona ) VALUES( 12, 'LIMA' );";
	$sql .= "
	INSERT INTO ZONA( id_zona, nombre_zona ) VALUES( 13, 'MIKE' );";
	$sql .= "
	INSERT INTO ZONA( id_zona, nombre_zona ) VALUES( 14, 'NOVEMBER' );";
	$sql .= "
	INSERT INTO ZONA( id_zona, nombre_zona ) VALUES( 15, 'OSCAR' );";
	$sql .= "
	INSERT INTO ZONA( id_zona, nombre_zona ) VALUES( 16, 'PAPA' );";
	$sql .= "
	INSERT INTO ZONA( id_zona, nombre_zona ) VALUES( 17, 'QUEBEC' );";
	$sql .= "
	INSERT INTO ZONA( id_zona, nombre_zona ) VALUES( 18, 'ROMEO' );";
	$sql .= "
	INSERT INTO ZONA( id_zona, nombre_zona ) VALUES( 19, 'SIERRA' );";
	$sql .= "
	INSERT INTO ZONA( id_zona, nombre_zona ) VALUES( 20, 'TANGO' );";


	//AGENCIA
	$sql .= "
	INSERT INTO AGENCIA( id_agencia, fax, id_direccion, id_titular, id_zona ) VALUES( DEFAULT, '4245787', 1, 1, 1  );";
	$sql .= "
	INSERT INTO AGENCIA( id_agencia, fax, id_direccion, id_titular, id_zona ) VALUES( DEFAULT, '424534434', 2, 2, 2  );";
	$sql .= "
	INSERT INTO AGENCIA( id_agencia, fax, id_direccion, id_titular, id_zona ) VALUES( DEFAULT, '4535345234', 3, 3, 3  );";
	$sql .= "
	INSERT INTO AGENCIA( id_agencia, fax, id_direccion, id_titular, id_zona ) VALUES( DEFAULT, '980193472', 4, 4, 4  );";
	$sql .= "
	INSERT INTO AGENCIA( id_agencia, fax, id_direccion, id_titular, id_zona ) VALUES( DEFAULT, '999456932', 5, 5, 5  );";
	$sql .= "
	INSERT INTO AGENCIA( id_agencia, fax, id_direccion, id_titular, id_zona ) VALUES( DEFAULT, '024234399', 6, 6, 6  );";
	$sql .= "
	INSERT INTO AGENCIA( id_agencia, fax, id_direccion, id_titular, id_zona ) VALUES( DEFAULT, '092349832', 7, 7, 7  );";
	$sql .= "
	INSERT INTO AGENCIA( id_agencia, fax, id_direccion, id_titular, id_zona ) VALUES( DEFAULT, '678593744', 8, 8, 8  );";
	$sql .= "
	INSERT INTO AGENCIA( id_agencia, fax, id_direccion, id_titular, id_zona ) VALUES( DEFAULT, '087468392', 9, 9, 9  );";
	$sql .= "
	INSERT INTO AGENCIA( id_agencia, fax, id_direccion, id_titular, id_zona ) VALUES( DEFAULT, '093409032', 10, 10, 10 );";

		//EMPLEADO
	$sql .= "
	INSERT INTO EMPLEADO( id_empleado, id_agencia, nombre, apellido_paterno, apellido_materno, tipo_empleado, id_cuenta ) VALUES( DEFAULT, 1, 'Jesus', 'Brumoso', NULL, 'TITULAR', 6 );";
	$sql .= "
	INSERT INTO EMPLEADO( id_empleado, id_agencia, nombre, apellido_paterno, apellido_materno, tipo_empleado, id_cuenta ) VALUES( DEFAULT, 2, 'Muriel', 'Coraje', NULL, 'TITULAR', 7 );";
	$sql .= "
	INSERT INTO EMPLEADO( id_empleado, id_agencia, nombre, apellido_paterno, apellido_materno, tipo_empleado, id_cuenta ) VALUES( DEFAULT, 3, 'Misa', 'Lawliet', NULL, 'TITULAR', 8 );";
	$sql .= "
	INSERT INTO EMPLEADO( id_empleado, id_agencia, nombre, apellido_paterno, apellido_materno, tipo_empleado, id_cuenta ) VALUES( DEFAULT, 4, 'Veronica', 'Amane', NULL, 'TITULAR', 9 );";
	$sql .= "
	INSERT INTO EMPLEADO( id_empleado, id_agencia, nombre, apellido_paterno, apellido_materno, tipo_empleado, id_cuenta ) VALUES( DEFAULT, 5, 'Cynthya', 'Garcia', 'Morales', 'TITULAR', 10 );";
	$sql .= "
	INSERT INTO EMPLEADO( id_empleado, id_agencia, nombre, apellido_paterno, apellido_materno, tipo_empleado, id_cuenta ) VALUES( DEFAULT, 6, 'Uriel', 'Balderas', 'Garcia', 'VENDEDOR', 11 );";
	$sql .= "
	INSERT INTO EMPLEADO( id_empleado, id_agencia, nombre, apellido_paterno, apellido_materno, tipo_empleado, id_cuenta ) VALUES( DEFAULT, 7, 'Vicente', 'Fernandez', 'Fernandez', 'VENDEDOR', 12 );";
	$sql .= "INSERT INTO EMPLEADO( id_empleado, id_agencia, nombre, apellido_paterno, apellido_materno, tipo_empleado, id_cuenta ) VALUES( DEFAULT, 8, 'Vanessa', 'Verde', 'Ayala', 'VENDEDOR', 13 );";
	$sql .= "
	INSERT INTO EMPLEADO( id_empleado, id_agencia, nombre, apellido_paterno, apellido_materno, tipo_empleado, id_cuenta ) VALUES( DEFAULT, 9, 'Patricia', 'Navarro', 'Cervantes', 'VENDEDOR', 14 );";
	$sql .= "
	INSERT INTO EMPLEADO( id_empleado, id_agencia, nombre, apellido_paterno, apellido_materno, tipo_empleado, id_cuenta ) VALUES( DEFAULT, 10, 'Rosa', 'Gutierrez', 'Valencia', 'VENDEDOR', 15 );";

	//TITULAR
	$sql .= "
	INSERT INTO TITULAR( id_titular, id_empleado ) VALUES( DEFAULT, 1 );";
	$sql .= "
	INSERT INTO TITULAR( id_titular, id_empleado ) VALUES( DEFAULT, 2 );";
	$sql .= "
	INSERT INTO TITULAR( id_titular, id_empleado ) VALUES( DEFAULT, 3 );";
	$sql .= "
	INSERT INTO TITULAR( id_titular, id_empleado ) VALUES( DEFAULT, 4 );";
	$sql .= "
	INSERT INTO TITULAR( id_titular, id_empleado ) VALUES( DEFAULT, 5 );";
	$sql .= "
	INSERT INTO TITULAR( id_titular, id_empleado ) VALUES( DEFAULT, 6 );";
	$sql .= "
	INSERT INTO TITULAR( id_titular, id_empleado ) VALUES( DEFAULT, 7 );";
	$sql .= "
	INSERT INTO TITULAR( id_titular, id_empleado ) VALUES( DEFAULT, 8 );";
	$sql .= "
	INSERT INTO TITULAR( id_titular, id_empleado ) VALUES( DEFAULT, 9 );";
	$sql .= "
	INSERT INTO TITULAR( id_titular, id_empleado ) VALUES( DEFAULT, 10 );";

	//VENDEDOR
	$sql .= "
	INSERT INTO VENDEDOR( id_vendedor, id_empleado ) VALUES( DEFAULT, 6 );";
	$sql .= "
	INSERT INTO VENDEDOR( id_vendedor, id_empleado ) VALUES( DEFAULT, 7 );";
	$sql .= "
	INSERT INTO VENDEDOR( id_vendedor, id_empleado ) VALUES( DEFAULT, 8 );";
	$sql .= "
	INSERT INTO VENDEDOR( id_vendedor, id_empleado ) VALUES( DEFAULT, 9 );";
	$sql .= "
	INSERT INTO VENDEDOR( id_vendedor, id_empleado ) VALUES( DEFAULT, 10 );";

	//CLIENTE
	$sql .= "
	INSERT INTO CLIENTE( id_cliente, id_vendedor, nombre, apellido_paterno, apellido_materno, correo, id_cuenta, id_direccion ) VALUES( DEFAULT, 1, 'Luis', 'Galaviz', NULL, 'floresdeabril@gmail.com', 11, 11 );";
	$sql .= "
	INSERT INTO CLIENTE( id_cliente, id_vendedor, nombre, apellido_paterno, apellido_materno, correo, id_cuenta, id_direccion ) VALUES( DEFAULT, 2, 'Joger', 'Torres', 'Moniac', 'corazonbandido@gmail.com', 12, 12 );";
	$sql .= "
	INSERT INTO CLIENTE( id_cliente, id_vendedor, nombre, apellido_paterno, apellido_materno, correo, id_cuenta, id_direccion ) VALUES( DEFAULT, 3, 'Francisco', 'Jemes', 'Valencia', 'floresdeabril@gmail.com', 13, 13 );";
	$sql .= "
	INSERT INTO CLIENTE( id_cliente, id_vendedor, nombre, apellido_paterno, apellido_materno, correo, id_cuenta, id_direccion ) VALUES( DEFAULT, 4, 'Josue', 'Brincos', NULL, 'pollorostizado@gmail.com', 14, 14 );";
	$sql .= "
	INSERT INTO CLIENTE( id_cliente, id_vendedor, nombre, apellido_paterno, apellido_materno, correo, id_cuenta, id_direccion ) VALUES( DEFAULT, 5, 'Fernando', 'Gonzales', 'Flores', 'zapatorojo@gmail.com', 15, 15 );";

	//INMUEBLE
	$sql .= "
	INSERT INTO INMUEBLE( id_inmueble, id_zona, id_cliente, propietario, tipo_renta_venta, tipo_local_piso ) VALUES( DEFAULT, 11, NULL, 'Checo Perez', 'RENTA', 'LOCAL' );";
	$sql .= "
	INSERT INTO INMUEBLE( id_inmueble, id_zona, id_cliente, propietario, tipo_renta_venta, tipo_local_piso ) VALUES( DEFAULT, 12, NULL, 'Julion Alvarez', 'RENTA', 'PISO' );";
	$sql .= "
	INSERT INTO INMUEBLE( id_inmueble, id_zona, id_cliente, propietario, tipo_renta_venta, tipo_local_piso ) VALUES( DEFAULT, 13, NULL, 'Paquita del Barrio', 'VENTA', 'LOCAL' );";
	$sql .= "
	INSERT INTO INMUEBLE( id_inmueble, id_zona, id_cliente, propietario, tipo_renta_venta, tipo_local_piso ) VALUES( DEFAULT, 14, NULL, 'Frencisco Ceballos', 'VENTA', 'PISO' );";
	$sql .= "
	INSERT INTO INMUEBLE( id_inmueble, id_zona, id_cliente, propietario, tipo_renta_venta, tipo_local_piso ) VALUES( DEFAULT, 15, NULL, 'Pedro Sola', 'RENTA', 'LOCAL' );";

	//VENTA
	$sql .= "
	INSERT INTO VENTA( id_venta, id_inmueble, precio_venta, hipotecado ) VALUES( DEFAULT, 3 , 1200000, 'NO' );";
	$sql .= "
	INSERT INTO VENTA( id_venta, id_inmueble, precio_venta, hipotecado ) VALUES( DEFAULT, 4 , 900000, 'NO' );";

	//ALQUILER
	$sql .= "
	INSERT INTO ALQUILER( id_alquiler, id_inmueble, precio_alquiler, fianza ) VALUES( DEFAULT, 1, 5000, 2500 );";
	$sql .= "
	INSERT INTO ALQUILER( id_alquiler, id_inmueble, precio_alquiler, fianza ) VALUES( DEFAULT, 2 , 6000, 3000 );";
	$sql .= "
	INSERT INTO ALQUILER( id_alquiler, id_inmueble, precio_alquiler, fianza ) VALUES( DEFAULT, 5 , 4000, 1500 );";

	//LOCAL
	$sql .= "
	INSERT INTO LOCAL( id_local, id_inmueble, licencia ) VALUES( DEFAULT, 1, 1 );";
	$sql .= "
	INSERT INTO LOCAL( id_local, id_inmueble, licencia ) VALUES( DEFAULT, 3, 1 );";
	$sql .= "
	INSERT INTO LOCAL( id_local, id_inmueble, licencia ) VALUES( DEFAULT, 5, 1 );";

	//PISO
	$sql .= "
	INSERT INTO PISO( id_piso, id_inmueble, num_habitaciones, num_banios, tipo_ambiente, tipo_gas ) VALUES( DEFAULT, 2, 2, 2, 'INTERIOR', 'CIUDAD' );";
	$sql .= "
	INSERT INTO PISO( id_piso, id_inmueble, num_habitaciones, num_banios, tipo_ambiente, tipo_gas ) VALUES( DEFAULT, 4, 2, 1, 'EXTERIOR', 'BUTANO' );";

	if( $conexion->multi_query( $sql ) === TRUE ){
		;
	}else{
		echo "Error al cargar los datos.";
	}
	
	$conexion->close();
?>