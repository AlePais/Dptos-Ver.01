<?php
	include 'funciones/general/funciones_administracion.php';
	// Variables [$_GET $id_elemento-$nombre] [general $tipo-$codigo_unico-$vista_from-$vista_boton-$tipo_consulta(ej n1_tipo)]

	//tipo_consulta es para que pueda leer la fila vacia de la consulta
	$query = "SELECT * FROM `email_marketing` WHERE `id_email_marketing` = '$id_elemento'";
	crear_variable($query);
	$titulo = 'Email - Marketing'; $tabla = 'email_marketing';
?>
<html>
	<head>
		<?php include 'funciones/general/cabecera_administracion.php';?>
		<script src="funciones/email/marketing/email_marketing.js" type="text/javascript"></script>
	</head>
	<body>
		<?php include "funciones/general/encabezado.php";?>	
		<div id='cuerpo'>
			<div class="seccion_auto ancho_fijo_auto">						
				<div class="contenedor ">
					<div id="encabezado_titulo">
						<img src="<?php echo $raiz?>interfaz/iconos/<?php echo $tipo;?>.png">
						<div class="seccion_autoc1"></div>
					</div>
					<div class="seccion_autoc"></div>
						<form method="post" action="funciones/email/marketing/bd_email_marketing.php" style="<?php echo $vista_form?>" id='formulario' name='formulario'>
							<input type='hidden' id='id_email_marketing' name='id_email_marketing' value='<?php echo $id_elemento?>'>
							<input type='hidden' id='url_origen' name='url_origen' value='<?php echo $archivo_actual?>'>
							<input type='hidden' id='tabla' name='tabla' value='<?php echo $tabla?>'>
							<input type='hidden' id='relacion' name='relacion' value='<?php echo $relacion?>'>
							<input type='hidden' id='n1_orden' name='n1_orden' value='<?php echo $n1_orden?>'>
							<input type='hidden' id='tabla' name='tabla' value='<?php echo $tabla?>'>
							<div class="columna_4 left">
								<div class="formulario_div columna_1 ">
									<h2>Destinatarios</h2>
									<p>
										<span>Tipo de destinatario</span>
										<select id="tipo_destinatario" name="tipo_destinatario">
											<option value="segmento" <?php if($tipo_destinatario=="segmento"){echo "selected";}?>>Segmento</option>
											<option value="lista" <?php if($tipo_destinatario=="lista"){echo "selected";}?>>Lista</option>
										</select>
									</p>									
									<p id="check_destinatarios">
									
									</p>
									<div class="seccion_autoc"></div>
								</div>
								<div class="formulario_div columna_1 ">	
									<h2><i> Datos descriptivos</i></h2><hr>
									<p>
										<span>Nombre campaña</span><input type='text' id='nombre' name='nombre' value='<?php echo $nombre?>' required>
									</p>
									<p>
										<span>Asunto</span><input type='text' id='asunto' name='asunto' value='<?php echo $asunto?>' required>
									</p>
									<div class="seccion_autoc"></div>
								</div>
								<div class="formulario_div columna_1 ">
									<h2><i> Programar envio </i></h2><hr>
									<p>
										<span>Fecha</span>
										<input type="date" id="envio_fecha" name="envio_fecha">
									</p>
									<p>
										<span>Horario</span>
										<input type="number" id="envio_hora" name="envio_hora" min="0" max="23" placeholder="Horas">
										<input type="number" id="envio_minuto" name="envio_minuto" min="0" max="59" placeholder="Minutos">
									</p>
									<div class="seccion_autoc"></div>
								</div>
							</div>
							<div class="columna_v745  right" style="margin:1%;">								
								<div style="width:auto; height:auto;">
									<textarea id='contenido' name='contenido'><?php echo $contenido?></textarea>
								</div>																	
								<div class="seccion_autoc"></div>						
							</div>
							<div class="columna_1 LEFT formulario_div">
								<div id="imagenes" class="right columna_1"></div>
								<div class="seccion_autoc"></div>						
							</div>
							<center>
								<input type='submit' id='cargar' value='Guardar'>
							</center>
						</form>
					<div>
						<?php listado_elementos('', '', 'id_email_marketing', 'id_email_marketing', 'nombre', 'corregido');?>
					</div>
				</div>
			</div>
		</div>
		<div class="seccion_autoc"></div>
		<div id='pie_de_pagina'>
			<?php include "funciones/general/pie_de_pagina_me.php"; ?>	
		</div>
	</body>
</html>