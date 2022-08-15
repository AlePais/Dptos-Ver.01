<?php
	include 'funciones/general/funciones_administracion.php';
	// Variables [$_GET $id_elemento-$nombre] [general $tipo-$codigo_unico-$vista_from-$vista_boton-$tipo_consulta(ej n1_tipo)]

	//tipo_consulta es para que pueda leer la fila vacia de la consulta
	$query = "SELECT * FROM `email_autorespuesta` WHERE `id_email_autorespuesta` = '$id_elemento'";
	crear_variable($query);
	$titulo = 'Email - Autorespuestas'; $tabla = 'email_autorespuesta';
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
						<div class="seccion_autoc1"></div>
					</div>
					<div class="seccion_autoc"></div>
						<form method="post" action="funciones/email/email_autorespuesta/bd_email_autorespuesta.php" style="<?php echo $vista_form?>" id='formulario' name='formulario'>
							<input type='hidden' id='id_email_autorespuesta' name='id_email_autorespuesta' value='<?php echo $id_elemento?>'>
							<input type='hidden' id='url_origen' name='url_origen' value='<?php echo $archivo_actual?>'>
							<input type='hidden' id='tabla' name='tabla' value='<?php echo $tabla?>'>
							<input type='hidden' id='relacion' name='relacion' value='<?php echo $relacion?>'>
							<input type='hidden' id='n1_orden' name='n1_orden' value='<?php echo $n1_orden?>'>
							<input type='hidden' id='tabla' name='tabla' value='<?php echo $tabla?>'>
							<div class="columna_4 left">
								<div CLASS="formulario_div columna_1 ">
									<h2><i> Datos descriptivos</i></h2><hr>
									<p>
										<span>Destinatario(direccion de email o escriba visitante)</span><input type='text' id='destinatario' name='destinatario' value='<?php echo $destinatario?>' required>
									</p>
									<p>
										<span>Nombre</span><input type='text' id='nombre' name='nombre' value='<?php echo $nombre?>' required>
									</p>
									<p>
										<span>Asunto</span><input type='text' id='asunto' name='asunto' value='<?php echo $asunto?>' required>
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
								<div class="columna_1 left">
									<h3 class="columna_3 left">IMAGEN/GALERIA</h3>
									<b>(si agrega mas de un elemento se mostrara como galeria de imagenes)</b>
								</div>
								<div id="imagenes" class="right columna_1"></div>
								<div class="seccion_autoc"></div>						
							</div>
							<center>
								<input type='submit' id='cargar' value='Guardar'>
							</center>
						</form>
					<div>
						<?php listado_elementos('', '', 'id_email_autorespuesta', 'id_email_autorespuesta', 'nombre', 'corregido');?>
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