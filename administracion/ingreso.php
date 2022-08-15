<?php
	include '../funciones/general/conexion.php';

	if (isset($_GET['notificacion']))
	{
		$notificacion = $_GET['notificacion'];
	}
	
	if(isset($_GET['notificacion']))
	{
		if ($notificacion == "usuario_contrasena")
		{
			echo "<script language='javascript'>alert('Nombre o contraseña incorrectos, intente nuevamente')</script>";
		}
	if ($notificacion == "enviado_mail")
		{
			echo "<script language='javascript'>alert('Los datos de ingreso fueron enviados a su email')</script>";
		}
	}
	
	$query = "SELECT * FROM `archivo` WHERE `categoria` LIKE 'logo' ORDER BY `id_archivo` DESC";
	$resultado = $mysqli->query($query);
	$logo = $resultado->fetch_array(MYSQLI_ASSOC);
	$url_logo = $raiz.$logo['carpeta'].$logo['archivo']
?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
	    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
		<link rel="icon" type="image/png" href="interfaz/favicon.png" />
		<title>Ingreso a administracion</title>
		<link rel="StyleSheet" href="css/estilo.css" type="text/css">
	</head>
	<body>
		<center>	
			<div id='encabezado'>
				<?php include "funciones/general/encabezado_me.php"; ?>	
			</div>
			<div id="contenedor" style="background-image:url(http://www.mercadoempresa.com/recurso/interfaz/fondo/plataforma_ingreso.jpg)" >
				<div class="ancho_fijo_auto min-height_1">					
					<div class="ingreso columna_4 left margin_principal">
						<form enctype="multipart/form-data"  method="post" action="funciones/ingreso/func_ingreso.php">
							<img src="<?php echo $url_logo?>">
							<span></span>
							<h2>Area de cliente</h2>
							<input type="text" name="nombre" id="nombre" placeholder="Usuario"></input>
							<input type="password" name="password" id="password" placeholder="contraseña">
							<span></span>
							<input type="submit" class="Boton_ingreso" value="ingresar" id="ingresar">
							<span></span>
							<p><a href="recuperar_password.php"> ¿Olvidaste tu contraseña? </a> 
						</form>
					</div>
				</div>
				<div class="seccion_autoc"></div>
				<?php include "funciones/general/pie_de_pagina_me.php"; ?>
			</div>
		</center>
	</body>
</html>
