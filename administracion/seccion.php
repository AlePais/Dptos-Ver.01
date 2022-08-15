<?php
	include 'funciones/general/funciones_administracion.php';
	// Variables [$_GET $id_elemento-$nombre] [general $tipo-$codigo_unico-$vista_from-$vista_boton-$tipo_consulta(ej n1_tipo)]
	
	//tipo_consulta es para que pueda leer la fila vacia de la consulta
	$titulo = 'Secciones';	$tabla = 'seccion'; 
	$query = "SELECT * FROM `seccion` WHERE `id_seccion` = '$id_elemento' ORDER BY `nombre_seccion` DESC";
	crear_variable($query);
?>
<html>
	<head>
		<?php include 'funciones/general/cabecera_administracion.php';?>
		<script type="text/javascript" src="funciones/seccion/func_seccion.js"></script>
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
					<form method="post" action="funciones/seccion/bd_seccion.php" style="<?php echo $vista_form?>" id='formulario' name='formulario'>
						<div>
							<p>
								<span>Estilo de diseño</span>
								<select id="id_diseño" name="id_diseño">
									<?php
										$query="SELECT * FROM `diseño` WHERE 1";
										$resultado = $mysqli->query($query);
										while($lista = $resultado->fetch_array(MYSQLI_ASSOC))
										{
											$id = $lista['id_diseño']; $nombre = $lista['nombre'];
											$seleccionado ='';
											if($id == $id_diseño){$seleccionado='selected';}
									?>
									<option value="<?php echo $id?>" <?php echo $seleccionado?>> <?php echo $nombre?> </option>
									<?php
										}
									?>	
								<select>
							</p>
							<br>
							<br>
							<br>
							<br>
							ancho columna 1
							<div id="etiqueta"></div>
							<input type="range" id="ancho_col_1" min=0 max=100 value="<?php echo $columna1_ancho?>">
							<script>
							var elInput = document.querySelector('#ancho_col_1');
								if (elInput)
								{
								  var etiqueta = document.querySelector('#etiqueta');
								  if (etiqueta) {
									etiqueta.innerHTML = elInput.value;

									elInput.addEventListener('input', function() {
									  etiqueta.innerHTML = elInput.value;
										var valor_slide1 = elInput.value;
										var valor_slide2 = 100-valor_slide1;
										$("#columna1_ancho").val(valor_slide1);
										$("#columna2_ancho").val(valor_slide2);
										var valor_slide1 = elInput.value*0.9;
										var valor_slide2 = 90-valor_slide1;
										$("#div_1").attr('style', 'width:'+valor_slide1+'%; height:150px; float:left; border:2px solid transparent; background-color:red;');
										$("#div_2").attr('style', 'width:'+valor_slide2+'%; height:150px; float:left; border:2px solid transparent; background-color:blue;');
									}, false);
								  }
								}
							</script>
							<br>
							<br>
							<br>
							<br>
							<div>
								<script>ordenar('lista_elementos2');</script>
								<div id="lista_elementos2">
								<?php
									$div_1=
										"<div style='width:".($columna1_ancho*0.9)."%; height:150px; float:left; border:2px solid transparent; background-color:red;' id='div_1'>
											<input type='hidden' name='columna1_ancho' id='columna1_ancho' value='$columna1_ancho'>
											<p>1</p>
										</div>";
									$div_2=
										"<div style='width:".($columna2_ancho*0.9)."%; height:150px; float:left; border:2px solid transparent; background-color:blue;' id='div_2'>
											<input type='hidden' name='columna2_ancho' id='columna2_ancho' value='$columna2_ancho'>
											<p>2</p>
										</div>";
									if($columna1_posicion == 'left')
									{
										echo $div_1.$div_2;
									}
									else
									{
										echo $div_2.$div_1;
									}
								?>
									<div class="seccion_autoc"></div>
								</div>
								<div class="seccion_autoc"></div>
							</div>
						</div>
						<div class="columna_4 left">
							<div CLASS="formulario_div columna_1 ">
								<h2>General</h2>
								<input type='hidden' id='id_seccion' name='id_seccion' value='<?php echo $id_elemento?>'>
								<input type='hidden' id='url_origen' name='url_origen' value='<?php echo $archivo_actual?>'>
								<input type='hidden' id='tabla' name='tabla' value='<?php echo $tabla?>'>
								<p>
									<span>Nombre</span><input type='text' id='nombre_seccion' name='nombre_seccion' value='<?php echo $nombre_seccion?>' required>
								</p>
								<p>
									<span>Titulo</span><input type='text' id='titulo_seccion' name='titulo_seccion' value='<?php echo $titulo_seccion?>'>
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
								<span>FONDO RGBA</span>
								<br>
								<input type='text' id='fondo_rgba' name='fondo_rgba' value='<?php echo $fondo_rgba?>'>
								<div class="seccion_autoc"></div>
							</div>
						</div>
						<div class="columna_v745  right" style="margin:1%;">
							<div style="width:auto; height:auto; min-height:800px;">
								<textarea id='contenido' name='contenido'><?php echo $contenido?></textarea>
							</div>																	
							<div class="seccion_autoc"></div>						
						</div>
						<div class="columna_1 LEFT formulario_div" id="imagen">
							<div class="columna_1 left">
								<h4 class="columna_3 left">Lista de elementos con imagen</h4>
								<span>NO <input type="radio" name="lista_imagen" value="no" <?php if($lista_imagen=='no'){echo "checked";}?> required></span>
								<span>SI <input type="radio" name="lista_imagen" value="si" <?php if($lista_imagen=='si'){echo "checked";}?> required></span>
							</div>
							<div class="columna_1 left">
								<h4 class="columna_3 left">¿Con nombre?</h4>
								<span>NO <input type="radio" name="lista_nombre" value="no" <?php if($lista_nombre=='no'){echo "checked";}?> required></span>
								<span>SI <input type="radio" name="lista_nombre" value="si" <?php if($lista_nombre=='si'){echo "checked";}?> required></span>
							</div>
							<div class="columna_1 left">
								<h4 class="columna_3 left">¿Con descripcion?</h4>
								<span>NO <input type="radio" name="lista_descripcion" value="no" <?php if($lista_descripcion=='no'){echo "checked";}?> required></span>
								<span>SI <input type="radio" name="lista_descripcion" value="si" <?php if($lista_descripcion=='si'){echo "checked";}?> required></span>
							</div>
							<div id="lista" class="right columna_1">
							</div>
							<div class="seccion_autoc"></div>	
						</div>
						<div class="seccion_autoc"></div>
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
						<?php listado_elementos('', '', 'nombre_seccion', 'id_seccion', 'nombre_seccion', 'nombre_seccion');?>
					</div>
				</div>
				<div class="seccion_autoc"></div>						
			</div>
			<div class="seccion_autoc"></div>
			<div id='pie_de_pagina'>
				<?php include "funciones/general/pie_de_pagina_me.php"; ?>	
			</div>
		</div>
	</body>
</html>
<form id="parametros_fondo">
	<input type='hidden' id='parametros' name='parametros' value='parametros_fondo'>
	<input type='hidden' id='codigo_unico' name='codigo_unico' value='fondo_<?php echo $codigo_unico?>'>
	<input type='hidden' id='tabla' name='tabla' value='archivo'><!--la tabla en la que guardo datos de archivo/imagen-->
	<input type='hidden' id='tabla_asociada' name='tabla_asociada' value='seccion'><!--//tabla del elemento al que le pertenece el archivo/imagen-->
	<input type='hidden' id='id_elemento' name='id_elemento' value='<?php echo $id_elemento?>'><!--//id del elemento de la tabla_asociada-->
	<input type='hidden' id='titulo' name='titulo' value=''><!--Titulo de fieldset donde se encuentra formulario de carga de archivo-->
	<input type='hidden' id='categoria' name='categoria' value='fondo'><!--fondo, adjunto, galeria, presentancion-->
	<input type='hidden' id='tipo' name='tipo' value='imagen'><!--Tipo elemento que se carga (imagen, archivo, icono)-->
	<input type='hidden' id='adm_nombre' name='adm_nombre' value='0'> <!-- admite campo (input type:text) nombre 0=no, 1=si -->
	<input type='hidden' id='adm_descripcion' name='adm_descripcion' value='0'> <!--admite campo (textarea) descripcion 0=no, 1=si -->
	<input type='hidden' id='cantidad' name='cantidad' value='simple'> <!-- multiple o simple -->
	<input type='hidden' id='etiqueta' name='etiqueta' value='Seleccione el fondo de la seccion'> <!--Texto que aparecera en el boton de subir archivo-->
	<input type='hidden' id='tipo_miniatura' name='tipo_miniatura' value='imagen'> <!--Tipo de miniatura imagen/icono_archivo-->
</form>
<form id="parametros_lista">
	<input type='hidden' id='parametros' name='parametros' value='parametros_lista'>
	<input type='hidden' id='codigo_unico' name='codigo_unico' value='lista_<?php echo $codigo_unico?>'>
	<input type='hidden' id='tabla' name='tabla' value='archivo'><!--la tabla en la que guardo datos de archivo/imagen-->
	<input type='hidden' id='tabla_asociada' name='tabla_asociada' value='seccion'><!--//tabla del elemento al que le pertenece el archivo/imagen-->
	<input type='hidden' id='id_elemento' name='id_elemento' value='<?php echo $id_elemento?>'><!--//id del elemento de la tabla_asociada-->
	<input type='hidden' id='titulo' name='titulo' value='LISTA: <?php echo $nombre_seccion?>'><!--Titulo de fieldset donde se encuentra formulario de carga de archivo-->
	<input type='hidden' id='categoria' name='categoria' value='lista'><!--Titulo de fieldset donde se encuentra formulario de carga de archivo-->
	<input type='hidden' id='tipo' name='tipo' value='imagen'><!--Tipo elemento que se carga (imagen, archivo, icono)-->
	<input type='hidden' id='adm_nombre' name='adm_nombre' value='0'> <!-- admite campo (input type:text) nombre 0=no, 1=si -->
	<input type='hidden' id='adm_descripcion' name='adm_descripcion' value='0'> <!--admite campo (textarea) descripcion 0=no, 1=si -->
	<input type='hidden' id='cantidad' name='cantidad' value='multiple'> <!-- multiple o simple -->
	<input type='hidden' id='etiqueta' name='etiqueta' value='Agregar imagen a listado'> <!--Texto que aparecera en el boton de subir archivo-->
	<input type='hidden' id='tipo_miniatura' name='tipo_miniatura' value='imagen'> <!--Tipo de miniatura imagen/icono_archivo-->
	<script>
		//$( document ).ready(function(){formulario_carga('cliente', 'parametros_cliente')});//primer parametro, el div donde se mete el formulario, el segundo es el id de el form donde estan los parametros
	</script>
</form>
<form id="parametros_imagenes">
	<input type='hidden' id='parametros' name='parametros' value='parametros_imagenes'>
	<input type='hidden' id='codigo_unico' name='codigo_unico' value='imagen_<?php echo $codigo_unico?>'>
	<input type='hidden' id='tabla' name='tabla' value='archivo'><!--la tabla en la que guardo datos de archivo/imagen-->
	<input type='hidden' id='tabla_asociada' name='tabla_asociada' value='seccion'><!--//tabla del elemento al que le pertenece el archivo/imagen-->
	<input type='hidden' id='id_elemento' name='id_elemento' value='<?php echo $id_elemento?>'><!--//id del elemento de la tabla_asociada-->
	<input type='hidden' id='titulo' name='titulo' value=''><!--Titulo de fieldset donde se encuentra formulario de carga de archivo-->
	<input type='hidden' id='categoria' name='categoria' value='imagenes'><!--Titulo de fieldset donde se encuentra formulario de carga de archivo-->
	<input type='hidden' id='tipo' name='tipo' value='imagen'><!--Tipo elemento que se carga (imagen, archivo, icono)-->
	<input type='hidden' id='adm_nombre' name='adm_nombre' value='0'> <!-- admite campo (input type:text) nombre 0=no, 1=si -->
	<input type='hidden' id='adm_descripcion' name='adm_descripcion' value='0'> <!--admite campo (textarea) descripcion 0=no, 1=si -->
	<input type='hidden' id='cantidad' name='cantidad' value='multiple'> <!-- multiple o simple -->
	<input type='hidden' id='etiqueta' name='etiqueta' value='Agregar imagenes a la seccion'> <!--Texto que aparecera en el boton de subir archivo-->
	<input type='hidden' id='tipo_miniatura' name='tipo_miniatura' value='imagen'> <!--Tipo de miniatura imagen/icono_archivo-->
</form>