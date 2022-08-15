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
?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8">
	    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
		<link rel="icon" type="image/png" href="interfaz/favicon.png" />
		<title>Recuperar Contraseña</title>
		<link rel="StyleSheet" href="css/estilo.css" type="text/css">
	</head>
	<body>
		<center>	
		
				<?php include "funciones/general/encabezado_me.php"; ?>	
			
			<div id="cuerpo" >
			<center>
			<br>
			<br>
			<br>
			<br>
				<table class="ancho_cuerpo">
					<tr>
						<td class="ingreso">
								<center>
										<form enctype="multipart/form-data"  method="get" action="funciones/reenvio_datos_ingreso.php">
											<table class="ancho_cuerpo">
												<tr>
														<td colspan="2">
														<center>
															<img src="../interfaz/logo.png">
															<h2>¿Olvidaste tu contraseña?<p><small><small> Recuperala ingresando tu email</small></small> </h2>
															<hr>
														</center>
														</td>
												</tr>
												<tr>
													<td>
														<p>Email:</p>
													</td>
													<td > 
														<input type="text" name="email" id="usuario"></input>
													</td>
												</tr>
												<tr>
													<td> 
														<a href="ingreso.php"> Ya recorde mi contraseña, quiero ingresar </a> 
													</td>
													<td>
														<center> <input type="submit" value="enviar" id="enviar"></input> </center>
													</td>
												</tr>
											</table>
										</form>
								</center>
						</td>
					</tr>
				</table>
				<br>
				<br>
				<br><br><br>
				<?php include "funciones/general/pie_de_pagina_me.php"; ?>
			</center>
			</div>
		</center>
	</body>
</html>