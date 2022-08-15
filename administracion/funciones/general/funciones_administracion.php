<?php
	include '../funciones/general/conexion.php';
	include '../funciones/general/crea_variables.php';
	include 'listado_elementos.php';

	// verifico que usuario este logueado, si no, lo envio a pagina de login
	$id_usuario = $_SESSION['id_usuario'];

	if(!isset($id_usuario))
	{
		header("Location: ingreso.php?notificacion=debe_loguearse");
	}

	if(isset($_SESSION['notificacion']))
	{
		$notificacion = $_SESSION['notificacion'];

		switch($notificacion)
		{
			case 'modificado_correctamente':
				$mensaje = "Los datos fueron modificados correctamente";
				break;
			case 'agregado_correctamente':
				$mensaje = "El elemento fue agregado correctamente";
				break;
			case 'eliminado_correctamente':
				$mensaje = "El elemento fue eliminado correctamente";
				break;
			case 'error_carga':
				$mensaje = "No pudo realizarse la carga, intente nuevamente. \n\ En caso de persistir el error notifique al administrador";
				break;
		}
		if(isset($mensaje))
		{
			echo "<script language='javascript'>alert('".$mensaje."')</script>";
		}
		unset($_SESSION['notificacion']);
	}

	// mediante el nombre del archivo, defino el tipo de elemento
	$tipo = str_replace('.php', '', $archivo_actual);
	$codigo_unico = uniqid('MeEm_');

	if(isset($_GET['id_elemento']) && isset($_GET['nombre']))
	{
		$id_elemento=$_GET['id_elemento'];
		$nombre_elemento=$_GET['nombre'];
		$vista_form = ""; $vista_boton = "display:none";
		$tipo_consulta = $tipo;
	}
	else
	{
		$id_elemento = 1; $nombre=null; $vista_form = "display:none"; $vista_boton = ""; $nombre_elemento=''; $tipo_consulta = '';
	}
?>