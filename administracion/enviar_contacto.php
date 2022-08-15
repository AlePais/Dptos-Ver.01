<?php
	include '../general/conexion.php';
	include '../general/funciones_guardar.php';
	include '../general/crea_variables.php';
	include '../general/phpmailer/class.phpmailer.php';
	include '../../administracion/funciones/general/bd_basico.php';
	include '../../administracion/funciones/general/bd_archivo.php';

	$identificador_tabla='id';$tabla = 'mensaje_recibido'; $location=$raiz."administracion/".$url_origen; $creado=$fecha_actual; 

	$bd_contacto=new bd_basico('insertar', 'mensaje_recibido');
	$bd_contacto->agregar_dato('empresa',$empresa);
	$bd_contacto->agregar_dato('nombre',$nombre);
	$bd_contacto->agregar_dato('email',$email_usuario);
	$bd_contacto->agregar_dato('telefono',$telefono);
	$bd_contacto->agregar_dato('inicio_fecha',$inicio_fecha);
	$bd_contacto->agregar_dato('inicio_hora',$inicio_hora);
	$bd_contacto->agregar_dato('fin_fecha',$fin_fecha);
	$bd_contacto->agregar_dato('fin_hora',$fin_hora);
	$bd_contacto->agregar_dato('asunto',$asunto);
	$bd_contacto->agregar_dato('consulta',$contenido);
	$bd_contacto->agregar_dato('creado',$creado);
	$bd_contacto->realizar_consulta($mysqli);
	$id_contacto= $bd_contacto->ultimo_id;
	$id_elemento = $id_contacto;

	if(isset($_POST['adjuntos']))
	{
		$ancho=190; $alto=0; $calidad=50; $ajuste='maxWidth';
		$tabla_asociada=$tabla;
		$array_archivo = $_POST['adjuntos'];
		$carpeta_destino = "adjunto/".$id_contacto."/";
		$categoria = 'adjunto';
		archivo($array_archivo, $carpeta_destino, $categoria, $tabla_asociada, $identificador_tabla, $id_elemento, $ancho, $alto, $ajuste, $calidad);
	}

	$query = "SELECT * FROM `email_autorespuesta` WHERE `relacion` LIKE 'formulario_contacto'";
	$resultado = $mysqli->query($query);
	while($mensaje = $resultado->fetch_array(MYSQLI_ASSOC))
	{
		$adjuntar = true;
		if($mensaje['destinatario'] == 'visitante')
		{
			$mensaje['destinatario'] = $email_usuario;
			$adjuntar = false;
		}
		
		foreach($_POST as $nombre_campo => $valor)
		{
			$mensaje['contenido']  = str_replace('$'.$nombre_campo, $valor, $mensaje['contenido']);
		}

		$envio_email = new PHPMailer();
		$envio_email->From      = $notificacion_email;
		$envio_email->FromName  = $notificacion_nombre;
		$envio_email->Subject   = $mensaje['asunto'] ;
		$envio_email->Body      = $mensaje['contenido'] ;
		$envio_email->IsHTML(true);
		$envio_email->AddAddress($mensaje['destinatario'] );
		if($adjuntar)
		{
			$query1 = "SELECT * FROM `archivo` WHERE `tabla_asociada` LIKE '$tabla' AND `id_elemento` = '$id_elemento'";
			$resultado1 = $mysqli->query($query1);
			if($resultado1->num_rows>0)
			{
				while($adjuntos = $resultado1->fetch_array(MYSQLI_ASSOC))
				{
					$url = $raiz.$adjuntos['carpeta'].$adjuntos['archivo'];
					$envio_email->addAttachment($url); 
				}
			}
		}
		$envio_email->Send();
	}
?>