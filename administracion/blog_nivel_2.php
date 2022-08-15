<?php
	include 'funciones/general/funciones_administracion.php';
	// Variables [$_GET $id_elemento-$nombre] [general $tipo-$codigo_unico-$vista_from-$vista_boton-$tipo_consulta(ej n1_tipo)]

	//tipo_consulta es para que pueda leer la fila vacia de la consulta
	$query = "SELECT * FROM `nivel_2` WHERE `n2_id` = '$id_elemento'";
	crear_variable($query);
	$titulo = 'Sub Categoria Blog'; $tabla = 'nivel_2'; $n1_tipo='blog_nivel_1'; $n2_tipo='blog_nivel_2'; $tipo=$n2_tipo;
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
						<p><?php echo $titulo?>
							<a id='carga_elemento' style="<?php echo $vista_boton?>"> Agregar <?php echo $titulo?></a>
							<a href="blog_nivel_3.php"> Articulos Blog</a>
							<a href="blog_nivel_1.php"> Categoria Blog </a>	
						</p>
						<div class="seccion_autoc1"></div>
					</div>
					<div class="seccion_autoc"></div>
					<form method="post" action="funciones/nivel_2/bd_nivel_2.php" style="<?php echo $vista_form?>" id='formulario' name='formulario'>
						<input type='hidden' id='n2_id' name='n2_id' value='<?php echo $id_elemento?>'>
						<input type='hidden' id='n2_tipo' name='n2_tipo' value='<?php echo $tipo?>'>
						<input type='hidden' id='n2_orden' name='n2_orden' value='<?php echo $n2_orden?>'>
						<input type='hidden' id='url_origen' name='url_origen' value='<?php echo $archivo_actual?>'>
						<input type='hidden' id='tabla' name='tabla' value='<?php echo $tabla?>'>
						<div class="columna_4 left">
							<div CLASS="formulario_div columna_1 ">
								<h2>Datos descriptivos</h2>
								<p><span>Categoria</span>
								<select id='n1_id' name='n1_id' required>
									<option value="">Seleccione la categoria</option>
									<?php
										$query="SELECT * FROM `nivel_1` WHERE `n1_tipo` = '$n1_tipo'";
										$resultado = $mysqli->query($query);
										while($lista = $resultado->fetch_array(MYSQLI_ASSOC))
										{
											$id = $lista['n1_id']; $nombre = $lista['n1_nombre'];
											$seleccionado ='';
											if($id == $n1_id){$seleccionado='selected';}
									?>
									<option value="<?php echo $id?>" <?php echo $seleccionado?>> <?php echo $nombre?> </option>
									<?php
										}
									?>
								</select>
								</p>
								<p>
									<span>Nombre</span><input type='text' id='n2_nombre' name='n2_nombre' value='<?php echo $n2_nombre?>' required>
								</p>
								<div class="seccion_autoc"></div>
							</div>
						</div>
						<div class="columna_v745  right" style="margin:1%;">								
							<div style="width:auto; height:auto; min-height:500px;">
								<textarea id='n2_descripcion' name='n2_descripcion'><?php echo $n2_descripcion?></textarea>
							</div>
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
						<?php listado_elementos('n2_tipo', $n2_tipo, 'n2_orden', 'n2_id', 'n2_nombre', 'n2_corregido');?>
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
<form id="parametros_imagenes">
	<input type='hidden' id='parametros' name='parametros' value='parametros_imagenes'>
	<input type='hidden' id='codigo_unico' name='codigo_unico' value='imagen_<?php echo $codigo_unico?>'>
	<input type='hidden' id='tabla' name='tabla' value='archivo'><!--la tabla en la que guardo datos de archivo/imagen-->
	<input type='hidden' id='tabla_asociada' name='tabla_asociada' value='nivel_2'><!--//tabla del elemento al que le pertenece el archivo/imagen-->
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