<?php
	//Incluyo funciones generales del sitio
	include 'funciones/general/conexion.php'; include 'funciones/general/cabecera.php';	include 'funciones/general/pie_de_pagina.php';
	include 'funciones/general/zona_actividad.php';

	if(isset($_GET['n1_corregido']))
	{
		$n1_corregido = $_GET['n1_corregido'];
		$query = "SELECT * FROM `nivel_1` WHERE `n1_corregido` LIKE '$n1_corregido'";
	}
	else
	{
		$query = "SELECT * FROM `nivel_1` WHERE `n1_tipo` LIKE 'blog_nivel_1' ORDER BY `n1_orden` ASC";
	}

	$resultado = $mysqli->query($query);
	$contenido = $resultado->fetch_array(MYSQLI_ASSOC);

	$id_tabla1=$contenido['n1_id'];	$titulo = $contenido['n1_nombre'];	$descripcion = strip_tags($contenido['n1_descripcion']);
?>
<html>
	<head>
		<?php cabecera()?>
		<script src="<?php echo $raiz;?>funciones/general/jquery/jquery-2.1.4.min.js"></script>		
	</head>
	<body>
		<!-- bloque de encabezado-->
		<?php include 'funciones/general/encabezado.php';?>

		<!--Bloque cuerpo -->
		<div id="contenedor" class="gris_claro">
			<div class="seccion_g3	left  seccion_auto margin_principal" style="background-image:url(<?php echo $imagen_zona?>)">
				<div class="ancho_fijo_auto ">
					<div class="seccion_auto TITULO_BLOG margin-top_f80 columna_1a ">
						<h1>GUIA DE ACTIVIDADES EN</H1>
						<h2><?php echo $nombre_zona?></h2>
						<div class="seccion_autoc"></div>
					</div>						
				</div>
				<div class="seccion_autoc"></div>
			</div>
			<div class="columna_1 altura_auto" >
				<div class="formulario_index formulario_index_adap padding_20 margin-top_200 overflow left">
					<?php include 'funciones/general/formulario_vertical.php'?>
				</div>
			</div>
			<div class="columna_1 right seccion_auto transparente_blanco ">
				<div class=" encabezado-e-producto">
					<div class="ancho_fijo_auto formulario_index_horizontal overflow ">
						<?php include 'funciones/general/formulario_zona.php';?>
					</div>
				</div>
				<div class="columna_1 right seccion_auto gris_claro ">	
					<?php
						include 'funciones/general/lista_categoria_blog.php';
						listado_categoria_blog($n1_id_depto, $n2_id_depto, $mysqli, $id_tabla1, $raiz);
					?>
				</div>
				<div class="ancho_fijo_auto">
					<!-- Columna izquierda 75%  -->
					<div  class="columna_1 right seccion_auto margin_principal"> 
						<?php
							include 'funciones/general/lista_blog.php';
							listado_blog($n1_id_depto, $n2_id_depto, $mysqli, $id_tabla1, '', $raiz);
						?>
						<div class="seccion_auto_sep"></div> 
					</div>
					<div class="seccion_autoc"></div>
				</div>
				<div class="columna_1 right seccion_auto gris_claro ">
					<div class="columna_1 gris_claro2">
						<div class="ancho_fijo_auto">
						<div class="seccion_auto_sep"></div>
							<h1>¿Que tipo de actividad buscas en <?php echo $nombre_zona;?>? </h1>
							<div class="seccion_autoc"></div>
						</div>
					</div>
					<div class="ancho_fijo_auto">
						<?php
							include 'funciones/general/lista_sub_categoria_blog.php';
							listado_sub_categoria_blog($n1_id_depto, $n2_id_depto, $mysqli, $id_tabla1, $raiz);
						?>
						<div class="seccion_auto_sep"></div>
					</div>
					<div class="seccion_autoc"></div>
				</div>
				<div  class="seccion_g3	left  seccion_auto" style="background-image:url(<?php echo $imagen_zona?>)">
					<div class="seccion_autoc"></div>
					<div class="ancho_fijo_auto">
						<?php
							include 'funciones/general/lista_deptos_blog.php';
							listado_deptos_blog($n1_id_depto, $n2_id_depto, $mysqli, $id_tabla1, $raiz, $nombre_zona)
						?>
					</div>
					<div class="Seccion_autoc"></div>	
				</div>
				<!-------------------------->
				<?php pie_de_pagina()?>
			</div>
		</div>
	</body>
</html>