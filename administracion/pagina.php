<?php
	include 'funciones/general/funciones_administracion.php';
	// Variables [$_GET $id_elemento-$nombre] [general $tipo-$codigo_unico-$vista_from-$vista_boton-$tipo_consulta(ej n1_tipo)]
	
	//tipo_consulta es para que pueda leer la fila vacia de la consulta
	$titulo = 'Paginas';	$tabla = 'pagina';
	$query = "SELECT * FROM `pagina` WHERE `id_pagina` = '$id_elemento' ORDER BY `nombre_pagina` DESC";
	crear_variable($query);
?>
<html>
	<head>
		<?php include 'funciones/general/cabecera_administracion.php';?>
		<script type="text/javascript" src="funciones/pagina/func_pagina.js"></script>
	</head>
	<body>
		<?php include "funciones/general/encabezado.php";?>	
		<div id='cuerpo'>
			<div class="seccion_auto ancho_fijo_auto">						
				<div class="contenedor ">
					<div id="encabezado_titulo">
						<img src="<?php echo $raiz?>administracion/interfaz/iconos/<?php echo $tipo;?>.png">
						<p>
							<?php echo $titulo?>
							<a id='carga_elemento' style="<?php echo $vista_boton?>"> Agregar en <?php echo $titulo?></a>
						</p>												
					</div>
					<div class="seccion_autoc"></div>
					<form method="post" action="funciones/pagina/bd_pagina.php" style="<?php echo $vista_form?>" id='formulario' name='formulario'>
						<div class="columna_4 left">
							<div CLASS="formulario_div columna_1 ">
								<h2>General</h2>
								<input type='hidden' id='id_pagina' name='id_pagina' value='<?php echo $id_elemento?>'>
								<input type='hidden' id='url_origen' name='url_origen' value='<?php echo $archivo_actual?>'>
								<input type='hidden' id='tabla' name='tabla' value='<?php echo $tabla?>'>
								<p>
									<span>Nombre</span><input type='text' id='nombre_pagina' name='nombre_pagina' value='<?php echo $nombre_pagina?>' required>
								</p>
								<div class="seccion_autoc"></div>
							</div>								
							<div CLASS="columna_1 LEFT formulario_div">		
								<h2>SEO</h2>
								<p>
									<span>Titulo</span>
									<input type='text' id='titulo_pagina' name='titulo_pagina' value='<?php echo $titulo_pagina?>' maxlength="65">
								</p>
								<p>
									<span>Descripcion</span>
									<input type='text' id='descripcion_pagina' name='descripcion_pagina' value='<?php echo $descripcion_pagina?>' maxlength="145">
								</p>									
								<div class="seccion_autoc"></div>
							</div>
							<div class="columna_1 LEFT formulario_div">
								<h2>FONDO</h2>
								<div class="columna_1">
									<p>Color
									<input type="radio" name="fondo_tipo" value="color" alt="color" <?php if($fondo_tipo=='color'){echo "checked";}?> required>
									<p>Imagen
									<input type="radio" name="fondo_tipo" value="imagen" <?php if($fondo_tipo=='imagen'){echo "checked";}?> required>
									<input type='hidden' id='fondo_valor_anterior' name='fondo_valor_anterior' value='<?php echo $fondo_valor?>'> <!-- valor de fondo para usar en func_pagina.js --> 
								</div>
								<div id="fondo" class="columna_1 negro"></div>
								<div class="seccion_autoc"></div>
							</div>
							<div>
								<img id="recargar" src="interfaz/iconos/recargar.png">
								<select id="elementos_disponibles" name="elementos_disponibles">
									<option>Seleccion la seccion que desea agregar a esta pagina</option>
								</select>
								<p>
								<div id="agregar">+ agregar</div>
								<script>ordenar('lista_secciones');</script>
								<ul id="lista_secciones">
									<?php
										$query="SELECT * FROM pagina_seccion JOIN pagina ON  pagina_seccion.id_pagina = pagina.id_pagina JOIN seccion ON  pagina_seccion.id_seccion = seccion.id_seccion WHERE pagina.id_pagina = $id_elemento ORDER BY pagina_seccion.orden ASC";
										$resultado=$mysqli->query($query);
										if($resultado->num_rows>0)
										{
											while($elemento = $resultado -> fetch_array(MYSQLI_ASSOC))
											{
												$id = $elemento['id_seccion'];
												$nombre = $elemento['nombre_seccion'];
									?>
									<li id="ele_<?php echo $id?>">
										<input type="hidden" name="seccion_<?php echo $id?>"><?php echo $nombre?>
										<div id="eliminar" onClick="quita_imagen('ele_<?php echo $id?>')"> <b>Quitar</b></div>
									</li>
									<br>
									<?php
											}
										}
									?>
								</ul>
							</div>
						</div>
						<div class="columna_v745  right" style="margin:1%;">
							<div style="width:auto; height:auto; min-height:800px;">
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
						<div class="seccion_autoc"></div>		
						<div id="pie_titulo">
							<input type='submit' id='cargar' value='Guardar'>												
						</div>
					</form>
					<div class="">
						<?php listado_elementos('', '', 'nombre_pagina', 'id_pagina', 'nombre_pagina', 'corregido_pagina');?>
					</div>
				</div>
				<div class="seccion_autoc"></div>						
			</div>
		<div class="seccion_autoc"></div>
		<div id='pie_de_pagina'>
			<?php include "funciones/general/pie_de_pagina_me.php"; ?>	
		</div>
	</body>
</html>
<form id="parametros_fondo">
	<input type='hidden' id='parametros' name='parametros' value='parametros_fondo'>
	<input type='hidden' id='codigo_unico' name='codigo_unico' value='fondo_<?php echo $codigo_unico?>'>
	<input type='hidden' id='tabla' name='tabla' value='archivo'><!--la tabla en la que guardo datos de archivo/imagen-->
	<input type='hidden' id='tabla_asociada' name='tabla_asociada' value='pagina'><!--//tabla del elemento al que le pertenece el archivo/imagen-->
	<input type='hidden' id='id_elemento' name='id_elemento' value='<?php echo $id_elemento?>'><!--//id del elemento de la tabla_asociada-->
	<input type='hidden' id='titulo' name='titulo' value=''><!--Titulo de fieldset donde se encuentra formulario de carga de archivo-->
	<input type='hidden' id='categoria' name='categoria' value='fondo'><!--fondo, adjunto, galeria, presentancion-->
	<input type='hidden' id='tipo' name='tipo' value='imagen'><!--Tipo elemento que se carga (imagen, archivo, icono)-->
	<input type='hidden' id='adm_nombre' name='adm_nombre' value='0'> <!-- admite campo (input type:text) nombre 0=no, 1=si -->
	<input type='hidden' id='adm_descripcion' name='adm_descripcion' value='0'> <!--admite campo (textarea) descripcion 0=no, 1=si -->
	<input type='hidden' id='cantidad' name='cantidad' value='simple'> <!-- multiple o simple -->
	<input type='hidden' id='etiqueta' name='etiqueta' value='Seleccione el fondo de la pagina'> <!--Texto que aparecera en el boton de subir archivo-->
	<input type='hidden' id='tipo_miniatura' name='tipo_miniatura' value='imagen'> <!--Tipo de miniatura imagen/icono_archivo-->
</form>
<form id="parametros_imagenes">
	<input type='hidden' id='parametros' name='parametros' value='parametros_imagenes'>
	<input type='hidden' id='codigo_unico' name='codigo_unico' value='imagen_<?php echo $codigo_unico?>'>
	<input type='hidden' id='tabla' name='tabla' value='archivo'><!--la tabla en la que guardo datos de archivo/imagen-->
	<input type='hidden' id='tabla_asociada' name='tabla_asociada' value='pagina'><!--//tabla del elemento al que le pertenece el archivo/imagen-->
	<input type='hidden' id='id_elemento' name='id_elemento' value='<?php echo $id_elemento?>'><!--//id del elemento de la tabla_asociada-->
	<input type='hidden' id='titulo' name='titulo' value=''><!--Titulo de fieldset donde se encuentra formulario de carga de archivo-->
	<input type='hidden' id='categoria' name='categoria' value='imagenes'><!--Titulo de fieldset donde se encuentra formulario de carga de archivo-->
	<input type='hidden' id='tipo' name='tipo' value='imagen'><!--Tipo elemento que se carga (imagen, archivo, icono)-->
	<input type='hidden' id='adm_nombre' name='adm_nombre' value='0'> <!-- admite campo (input type:text) nombre 0=no, 1=si -->
	<input type='hidden' id='adm_descripcion' name='adm_descripcion' value='0'> <!--admite campo (textarea) descripcion 0=no, 1=si -->
	<input type='hidden' id='cantidad' name='cantidad' value='multiple'> <!-- multiple o simple -->
	<input type='hidden' id='etiqueta' name='etiqueta' value='Agregar imagenes a la seccion'> <!--Texto que aparecera en el boton de subir archivo-->
	<input type='hidden' id='tipo_miniatura' name='tipo_miniatura' value='imagen'> <!--Tipo de miniatura imagen/icono_archivo-->
	<script>
		$( document ).ready(function(){formulario_carga('imagenes', 'parametros_imagenes')});//primer parametro, el div donde se mete el formulario, el segundo es el id de el form donde estan los parametros
	</script>
</form>