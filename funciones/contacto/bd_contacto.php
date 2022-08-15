<?php
	include '../general/conexion.php';
	include '../general/funciones_guardar.php';
	include '../general/crea_variables.php';
	include '../general/phpmailer/class.phpmailer.php';
	include '../../administracion/funciones/general/bd_basico.php';

	if($campo_oculto=='')
	{
		$bd_contacto=new bd_basico('insertar', 'contacto');
		$bd_contacto->agregar_dato('empresa',$empresa);
		$bd_contacto->agregar_dato('nombre',$nombre);
		$bd_contacto->agregar_dato('apellido',$apellido);
		$bd_contacto->agregar_dato('email',$email);
		$bd_contacto->agregar_dato('telefono',$telefono);
		// $bd_contacto->agregar_dato('inicio_fecha',$inicio_fecha);
		// $bd_contacto->agregar_dato('inicio_hora',$inicio_hora);
		// $bd_contacto->agregar_dato('fin_fecha',$fin_fecha);
		// $bd_contacto->agregar_dato('fin_hora',$fin_hora);
		$bd_contacto->agregar_dato('asunto',$asunto);
		$bd_contacto->agregar_dato('contenido',$contenido);
		$bd_contacto->agregar_dato('creado',$fecha_actual);
		$bd_contacto->realizar_consulta($mysqli);

		$query1 = "SELECT * FROM `contacto_asunto` WHERE `id_contacto_asunto` = $asunto";
		$resultado1 = $mysqli->query($query1);
		$asunto = $resultado1->fetch_array(MYSQLI_ASSOC);
		$asunto_texto= $asunto['nombre'];

		$query = "SELECT * FROM `email_autorespuesta` WHERE `relacion` LIKE 'formulario_contacto'";
		$resultado = $mysqli->query($query);
		while($mensaje = $resultado->fetch_array(MYSQLI_ASSOC))
		{
			$adjuntar = true;
			if($mensaje['destinatario'] == 'visitante')
			{
				$mensaje['destinatario'] = $email;
				$adjuntar = false;
			}
			
			$mensaje['contenido']  = str_replace('$asunto', utf8_decode($asunto_texto), $mensaje['contenido']);
			$mensaje['contenido']  = str_replace('$fecha_contacto', $fecha_actual, $mensaje['contenido']);
			foreach($_POST as $nombre_campo => $valor)
			{
				$mensaje['contenido']  = str_replace('$'.$nombre_campo, utf8_decode($valor), $mensaje['contenido']);
			}

			$envio_email = new PHPMailer();
			$envio_email->From      = $notificacion_email;
			$envio_email->FromName  = $notificacion_nombre;
			$envio_email->Subject   = $mensaje['asunto'] ;
			$envio_email->Body      = $mensaje['contenido'] ;
			$envio_email->IsHTML(true);
			$envio_email->AddAddress($mensaje['destinatario'] );
			// $envio_email->Send();
		}
		echo "Su consulta ha sido recibida, a la brevedad nos comunicaremos con usted";
	}
?>