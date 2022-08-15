<?php
	include '../general/conexion.php';
	include '../general/funciones_guardar.php';
	include '../general/crea_variables.php';
	include '../../administracion/funciones/general/bd_basico.php';
	include '../general/phpmailer/class.phpmailer.php';

	$query = "SELECT * FROM `usuario` WHERE `id` = '1'";
	$resultado =  $mysqli->query($query);
	$datos = $resultado->fetch_array(MYSQLI_ASSOC);
	$valor_dolar = $datos['dolar'];

	$operacion='insertar';
	$fecha_reserva=$fecha_actual;
	$precio=intval($precio_calculado);
	$precio_pesos = $precio*$valor_dolar;

	$location="../../contacto?notificacion=contacto_enviado";

	$bd_reserva=new bd_basico($operacion, 'reserva');
	$bd_reserva->agregar_dato('id_departamento',$id_departamento);
	$bd_reserva->agregar_dato('nombre',$nombre);
	$bd_reserva->agregar_dato('apellido',$apellido);
	$bd_reserva->agregar_dato('telefono',$telefono);
	$bd_reserva->agregar_dato('email',$email_usuario);
	$bd_reserva->agregar_dato('cant_huespedes',$cant_huespedes);
	$bd_reserva->agregar_dato('in_fecha',$in_fecha);
	$bd_reserva->agregar_dato('out_fecha',$out_fecha);
	$bd_reserva->agregar_dato('consulta',$consulta);
	$bd_reserva->agregar_dato('precio',$precio);
	$bd_reserva->agregar_dato('medio_pago',$medio_pago);
	$bd_reserva->agregar_dato('estado','pendiente');
	$bd_reserva->agregar_dato('fecha_contacto',$fecha_reserva);
	$bd_reserva->realizar_consulta($mysqli);
	$id_reserva= $bd_reserva->ultimo_id;
	$compara = "http://departamentosenalquiler.com.ar/prueba";
	
	//datos necesarios para publicacion de pago
	$query = "SELECT * FROM nivel_1 NATURAL JOIN nivel_2 NATURAL JOIN nivel_3 WHERE nivel_3.n3_id LIKE '$id_departamento'";
	$resultado = $mysqli->query($query);
	$elemento = $resultado->fetch_array(MYSQLI_ASSOC);

	//logo de la empresa
	$query = "SELECT * FROM `archivo` WHERE `categoria` LIKE 'logo' ORDER BY `id_archivo` DESC";
	$resultado = $mysqli->query($query);
	$logo = $resultado->fetch_array(MYSQLI_ASSOC);
	$url_logo = $compara."/".$logo['carpeta'].$logo['archivo'];
	$pago_correcto = $compara."/funciones/reservar/pago_correcto.php?id_reserva=".$id_reserva;
	$pago_incorrecto = $compara."/funciones/reservar/pago_incorrecto.php?id_reserva=".$id_reserva;
	$pago_pendiente = $compara."/funciones/reservar/pago_pendiente.php?id_reserva=".$id_reserva;
	
	
	
	$query = "SELECT * FROM `general` WHERE `tabla_asociada` LIKE 'agenda_representantes' AND `id_elemento` LIKE '$id_representante'";
	$resultado = $mysqli->query($query);
	while($datos_representante = $resultado->fetch_array(MYSQLI_ASSOC))
	{
		$indice = $datos_representante['nombre'];
		$medios_pago[$indice] = $datos_representante['contenido'];
	}
	
	if($medio_pago =='mercadopago')
	{
		require_once('../e-commerce/mercadopago/lib/mercadopago.php');
		$mp = new MP($medios_pago['client_id_mercadopago'], $medios_pago['client_secret_mercadopago']);
		$preference_data = array(
			"items"=>array(
						array(
							"title" => $elemento['n3_nombre'],
							"picture_url" =>$url_logo,
							"quantity" => 1,
							"currency_id" => "ARS", // Available currencies at: https://api.mercadopago.com/currencies
							"unit_price" => $precio_pesos
						)),
						"payer" => array(
							"name" => $nombre,
							"surname" => $apellido,
							"email" =>  $email_usuario,
							"date_created" => $fecha_reserva
						),
						"back_urls" => array(
							"success" => $pago_correcto,
							"failure" => $pago_incorrecto,
							"pending" => $pago_pendiente
						),
						"notification_url" => "https://www.your-site.com/ipn",
						"external_reference" => "Reference_1234",
						"expires" => false,
						"expiration_date_from" => null,
						"expiration_date_to" => null
						);
			$preference = $mp->create_preference($preference_data);
			$location = $preference['response']['init_point'];
			header("Location: $location");
	}
	if($medio_pago =='todo_pago')
	{
		require_once('../e-commerce/TodoPago/vendor/autoload.php');
		$mode = "test";//identificador de entorno obligatorio, la otra opción es "prod"
		$http_header = array('Authorization'=>$medios_pago['credencial_todo_pago']);//authorization key del ambiente requerido
		$connector = new TodoPago\Sdk($http_header, $mode); // $mode: "test" para developers, "prod" para producción
		
		$optionsSAR_comercio = array (
			'Security'=> '1234567890ABCDEF1234567890ABCDEF',
			'EncodingMethod'=>'XML',
			'Merchant'=>305,
			'URL_OK'=>$pago_correcto,
			'URL_ERROR'=> $pago_incorrecto
			);
			
		$optionsSAR_operacion = array (
			'MERCHANT'=> $medios_pago['nro_comercio_todo_pago'], //dato fijo (número identificador del comercio)
			'OPERATIONID'=>$id_reserva, //número único que identifica la operación, generado por el comercio.
			'CURRENCYCODE'=> 32, //por el momento es el único tipo de moneda aceptada
			'AMOUNT'=>$precio_pesos,
			'CSBTCITY'=>$elemento['n1_nombre']."-".$elemento['n2_nombre'], //Ciudad de facturación, REQUERIDO.
			'CSBTCOUNTRY'=>'AR', //País de facturación. REQUERIDO. Código ISO.
			'CSBTCUSTOMERID'=>'453458', //Identificador del usuario al que se le emite la factura. REQUERIDO. No puede contener un correo electrónico.
			'CSBTIPADDRESS'=>'192.0.0.4', //IP de la PC del comprador. REQUERIDO.
			'CSBTEMAIL'=>$email_usuario, //Mail del usuario al que se le emite la factura. REQUERIDO.
			'CSBTFIRSTNAME'=>$nombre ,//Nombre del usuario al que se le emite la factura. REQUERIDO.
			'CSBTLASTNAME'=>$apellido, //Apellido del usuario al que se le emite la factura. REQUERIDO.
			'CSBTPHONENUMBER'=>"11111111", //Teléfono del usuario al que se le emite la factura. No utilizar guiones, puntos o espacios. Incluir código de país. REQUERIDO.
			'CSBTPOSTALCODE'=>' C1010AAP', //Código Postal de la dirección de facturación. REQUERIDO.
			'CSBTSTATE'=>'B', //Provincia de la dirección de facturación. REQUERIDO. Ver tabla anexa de provincias.
			'CSBTSTREET1'=>'Cerrito 740', //Domicilio de facturación (calle y nro). REQUERIDO.
			// 'CSBTSTREET2'=>'Piso 8', //Complemento del domicilio. (piso, departamento). OPCIONAL.
			'CSPTCURRENCY'=>'ARS', //Moneda. REQUERIDO.
			'CSPTGRANDTOTALAMOUNT'=>'125.38', //Con decimales opcional usando el punto como separador de decimales. No se permiten comas, ni como separador de miles ni como separador de decimales. REQUERIDO. (Ejemplos:$125,38-> 125.38 $12-> 12 o 12.00)
			// 'CSMDD7'=>'', // Fecha registro comprador(num Dias). OPCIONAL.
			// 'CSMDD8'=>'Y', //Usuario Guest? (Y/N). En caso de ser Y, el campo CSMDD9 no deberá enviarse. OPCIONAL.
			// 'CSMDD9'=>'', //Customer password Hash: criptograma asociado al password del comprador final. OPCIONAL.
			// 'CSMDD10'=>'', //Histórica de compras del comprador (Num transacciones). OPCIONAL.
			// 'CSMDD11'=>'', //Customer Cell Phone. OPCIONAL.
			'CSSTCITY'=>'rosario', //Ciudad de envío de la orden. REQUERIDO.
			'CSSTCOUNTRY'=>'AR', //País de envío de la orden. REQUERIDO.
			'CSSTEMAIL'=>'jose@gmail.com', //Mail del destinatario, REQUERIDO.
			'CSSTFIRSTNAME'=>'Jose', //Nombre del destinatario. REQUERIDO.
			'CSSTLASTNAME'=>'Perez', //Apellido del destinatario. REQUERIDO.
			'CSSTPHONENUMBER'=>'541155893737', //Número de teléfono del destinatario. REQUERIDO.
			'CSSTPOSTALCODE'=>'1414', //Código postal del domicilio de envío. REQUERIDO.
			'CSSTSTATE'=>'D', //Provincia de envío. REQUERIDO. Son de 1 caracter
			'CSSTSTREET1'=>'San Martín 123', //Domicilio de envío. REQUERIDO.
			// 'CSMDD12'=>'',//Shipping DeadLine (Num Dias). NO REQUERIDO.
			// 'CSMDD13'=>'',//Método de Despacho. NO REQUERIDO.
			// 'CSMDD14'=>'',//Customer requires Tax Bill ? (Y/N). NO REQUERIDO.
			// 'CSMDD15'=>'',//Customer Loyality Number. NO REQUERIDO.
			// 'CSMDD16'=>'',//Promotional / Coupon Code. NO REQUERIDO.
			//Retail: datos a enviar por cada producto, los valores deben estar separados con #:
			'CSITPRODUCTCODE'=>'electronic_good', //Código de producto. REQUERIDO. Valores posibles(adult_content;coupon;default;electronic_good;electronic_software;gift_certificate;handling_only;service;shipping_and_handling;shipping_only;subscription)
			'CSITPRODUCTDESCRIPTION'=>$elemento['n3_descripcion'], //Descripción del producto. REQUERIDO.
			'CSITPRODUCTNAME'=>$elemento['n3_nombre'], //Nombre del producto. REQUERIDO.
			'CSITPRODUCTSKU'=>'LEVJNSL36GN', //Código identificador del producto. REQUERIDO.
			'CSITTOTALAMOUNT'=>'1254.40', //CSITTOTALAMOUNT=CSITUNITPRICE*CSITQUANTITY "999999[.CC]" Con decimales opcional usando el punto como separador de decimales. No se permiten comas, ni como separador de miles ni como separador de decimales. REQUERIDO.
			'CSITQUANTITY'=>'1', //Cantidad del producto. REQUERIDO.
			'CSITUNITPRICE'=>'1254.40'//Formato Idem CSITTOTALAMOUNT. REQUERIDO.
			);

		$rta = $connector->sendAuthorizeRequest($optionsSAR_comercio, $optionsSAR_operacion);
		if($rta['StatusCode'] != -1)
		{
			var_dump($rta);
		}
		else
		{
			setcookie('RequestKey',$rta["RequestKey"],  time() + (86400 * 30), "/");
			header("Location: ".$rta["URL_Request"]);		
		}
	}
	if($medio_pago =='paypal')
	{
		include 'paypal.php';
	}
?>
