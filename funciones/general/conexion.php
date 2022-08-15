<?php
	//Mediante las variables de session se verifica si el usuario esta logueado
	session_start();
	
// mostrar errores
	//error_reporting(E_ALL);
	//ini_set('display_errors', '1');

	$fecha_actual = date("Y-m-d H:i:s");
	$fecha_actual_solo = date("Y-m-d");
	
//Datos para envio de emails automaticos (contacto, reclamo, etc)
	$notificacion_email = 'notificaciones@diegomalito.com.ar';
	$notificacion_nombre = 'Diego A. Malito - Concejal Avellaneda';
	
//$url crea la direccion que se utilizara para compartir
	$url="http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	$archivo_actual = basename($_SERVER['PHP_SELF']);
	$url_actual=$url;

	$compara = "http://".$_SERVER['HTTP_HOST']; 
	$base = "$compara/40%20-%20departamentos%20en%20alquiler/01%20-%20web/";
	$direccion_resumida = str_replace($base, '', $url);
	$numero_nivel = substr_count($direccion_resumida, "/");
	//$base es la url hasta antes del index.php

	$raiz="";

	if ($numero_nivel > 0)
	{
		for($i=0; $i < $numero_nivel; $i++)
		{
			$raiz = $raiz."../";
		}
	}
	else
	{
		$raiz="";
	}

	$extra_articulo = array('descripcion_corta', 'precio', 'promocion', 'url_mercadolibre', 'url_mercadopago', 'texto_alternativo');
		
	// primer valor= nombre con el que se mostrara -- Segundo valor= nombre del icono -- tercer valor= nombre con el que se guardara
	$redes_sociales=array('FanPage - Facebook' => array("icono" => 'facebook.png', "corregido"=>'facebook', "tipo"=>'url'),
						  'Twitter' => array("icono" => 'twitter.png', "corregido"=>'twitter', "tipo"=>'url'),
						  'Linkedin' => array("icono" => 'linkedin.png', "corregido"=>'linkedin', "tipo"=>'url'),
						  'Blogspot' => array("icono" => 'blogspot.png', "corregido"=>'blogspot', "tipo"=>'url'),
						  'Youtube' => array("icono" => 'youtube.png', "corregido"=>'youtube', "tipo"=>'url'),
						  'E-shop Mercadolibre' => array("icono" => 'mercadolibre.png', "corregido"=>'mercadolibre', "tipo"=>'url'),
						  'Google Plus' => array("icono" => 'google.png', "corregido"=>'google', "tipo"=>'url'),
						  'Instagram' => array("icono" => 'instagram.png', "corregido"=>'instagram', "tipo"=>'url'),
						  'WhatsApp' => array("icono" => 'whatsapp.png', "corregido"=>'whatsapp', "tipo"=>'tel_celular'),
						  'Wikipedia' => array("icono" => 'wikipedia.png', "corregido"=>'wikipedia', "tipo"=>'url'));
	$departamento=array('Descripcion Corta' => array("corregido"=>'descripcion_corta', "tipo"=>'text'),
						  'Ambientes' => array("corregido"=>'ambientes', "tipo"=>'number'),
						  'Tipo de alojamiento' => array("corregido"=>'tipo_alojamiento', "tipo"=>'text'),
						  'Cant. minima de huespedes' => array("corregido"=>'min_huespedes', "tipo"=>'number'),
						  'Cant. Maxima de huespedes' => array("corregido"=>'max_huespedes', "tipo"=>'number'),
						  'Precio [USD]' => array("corregido"=>'precio', "tipo"=>'number'),
						  'Direccion de Departamento' => array("corregido"=>'direccion_casa', "tipo"=>'text'),
						  'Direccion de hospital' => array("corregido"=>'direccion_hospital', "tipo"=>'text'),
						  'Direccion de policia' => array("corregido"=>'direccion_policia', "tipo"=>'text'),
						  'Clave WIFI' => array("corregido"=>'clave_wifi', "tipo"=>'text'));
						  
	$adicional_departamento=array('Cochera' => array("corregido"=>'cochera', "tipo"=>'select', "menu"=>'select'),
								  'Lavanderia' => array("corregido"=>'lavanderia', "tipo"=>'select', "menu"=>'select'),
								  'Desayuno' => array("corregido"=>'desayuno', "tipo"=>'select', "menu"=>'select'),
								  'Cama Adicional' => array("corregido"=>'cama', "tipo"=>'select', "menu"=>'select'));

	$blog=array('Telefono' => array("corregido"=>'telefono', "tipo"=>'text'),
				'Direccion' => array("corregido"=>'direccion', "tipo"=>'text'),
				'Provincia' => array("corregido"=>'provincia', "tipo"=>'text'),
				'Pagina Web' => array("corregido"=>'pagina_web', "tipo"=>'text'),
				'E-Mail' => array("corregido"=>'email', "tipo"=>'text'),
				'Horario' => array("corregido"=>'horario', "tipo"=>'text'),
				'Google Maps' => array("corregido"=>'url_googlemaps', "tipo"=>'text'));
				
	$agenda_representantes=array('CLIENT_ID - Mercado Pago' => array("corregido"=>'client_id_mercadopago', "tipo"=>'text'),
								'CLIENT_SECRET - Mercado Pago' => array("corregido"=>'client_secret_mercadopago', "tipo"=>'text'),
								'Nro. de Comercio (Merchant ID) - Todo Pago' => array("corregido"=>'nro_comercio_todo_pago', "tipo"=>'text'),
								'Credenciales (API Keys) - Todo Pago' => array("corregido"=>'credencial_todo_pago', "tipo"=>'text'),
								'ClientID - PayPal' => array("corregido"=>'client_id_paypal', "tipo"=>'text'),
								'ClientSecret - PayPal' => array("corregido"=>'client_secret_paypal', "tipo"=>'text'),
								'CBU' => array("corregido"=>'representante_cbu', "tipo"=>'text'),
								'CUIL/CUIT' => array("corregido"=>'representante_cuil', "tipo"=>'text'));

	//conexion a base de datos
	$servidor = "localhost";
	$usuario = "c0860093_dptoalq";
	$password = "ke48RAbufu";
	$base_de_datos = "c0860093_dptoalq";
	$mysqli = new mysqli($servidor, $usuario, $password, $base_de_datos);
	
	unset($usuario);
	unset($password);
	unset($base_de_datos);

	$mysqli->set_charset("utf8");

	function desconectar()
	{
		global $mysqli ;
		$mysqli->close();
	}

	$query = "SELECT * FROM `pagina` WHERE `corregido_pagina` LIKE '$archivo_actual'";
	$resultado = $mysqli->query($query);

	if($resultado->num_rows>0)
	{
		$contenido = $resultado->fetch_array(MYSQLI_ASSOC);
		$id_pagina = $contenido['id_pagina'];
		$titulo = $contenido['titulo_pagina'];
		$descripcion = $contenido['descripcion_pagina'];
		$contenido_general = $contenido['contenido'];
		$fondo_tipo = $contenido['fondo_tipo'];
		if($fondo_tipo == 'imagen')
		{
			$fondo_valor = $contenido['fondo_valor'];
			$query2 = "SELECT * FROM `archivo` WHERE `id_archivo`='$fondo_valor'";
			$resultado2 = $mysqli->query($query2);
			$datos_imagen = $resultado2->fetch_array(MYSQLI_ASSOC);
			$url = $raiz.$datos_imagen['carpeta']."/".$datos_imagen['archivo'];
			$fondo = "background-image:url($url)";
		}
		else
		{
			$fondo_valor = $contenido['fondo_valor'];
			$fondo = "background-color: $fondo_valor";
		}
		$galeria_imagenes=$contenido['galeria_imagenes'];
	}

	$resultado->free();
?>