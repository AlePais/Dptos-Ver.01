<?php
	include 'funciones/general/funciones_administracion.php';
	include '../funciones/general/nombre_icono.php'; //funcion src_icono($variable) - devuelve TIPO_ARCHIVO.png

	// Variables [$_GET $id_elemento-$nombre] [general $tipo-$codigo_unico-$vista_from-$vista_boton-$tipo_consulta(ej n1_tipo)]

	$query = "SELECT * FROM `mensaje_recibido` WHERE `id` = '$id_elemento'";
	crear_variable($query);
	$titulo = 'Detalle mensaje '. $id_elemento ; $tabla = 'mensaje_recibido';
?>
<html>
	<head>
		<?php include 'funciones/general/cabecera_administracion.php';?>
	</head>
	<body>
		<?php include "funciones/general/encabezado.php";?>	
		<div id='cuerpo'>
			<div class="seccion_auto ancho_fijo_auto">						
				<div class="contenedor ">
					<div id="encabezado_titulo">
						<img src="<?php echo $raiz?>interfaz/iconos/<?php echo $tipo;?>.png">
					</div>
					<table class="ancho_fijo" height="800px" align="top">
						<tr>
							<td class="contenedor">
								<br>
								<br>		
								<li>
									<p><span>Id_mensaje:</span> <?php echo $id?>			
									<p><span>Nombre: </span> <?php echo $nombre?>
									<p><span>E-mail: </span> <?php echo $email?>
									<p><span>Telefono: </span> <?php echo $telefono?>
									<p><span>Asunto: </span> <?php echo $asunto?>
									<p><span>Contenido: </span> <?php echo $contenido?>
									<p><span>Recibido: </span> <?php echo $creado?>
								<?php
									$query1 = "SELECT * FROM `archivo` WHERE `tabla_asociada` LIKE '$tabla' AND `id_elemento` = '$id_elemento'";
									$resultado1 = $mysqli->query($query1);
									if($resultado1->num_rows>0)
									{
										while($adjuntos = $resultado1->fetch_array(MYSQLI_ASSOC))
										{
											$url = $raiz.$adjuntos['carpeta'].$adjuntos['archivo'];
											$icono = $raiz."interfaz/iconos/".src_icono($adjuntos['archivo'])
								?>
								<a target='_blank' href='<?php echo $url?>'><img src="<?php echo $icono?>"><?php echo $adjuntos['archivo'];?></a>
								<?php
										}
									}
								?>
								</li>
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="seccion_autoc"></div>
		<div id='pie_de_pagina'>
			<?php include "funciones/general/pie_de_pagina_me.php"; ?>	
		</div>
	</body>
</html>