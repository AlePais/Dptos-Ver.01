<?php
	//Incluyo funciones generales del sitio
	include 'funciones/general/conexion.php'; include 'funciones/general/cabecera.php';	include 'funciones/general/pie_de_pagina.php';
	include 'funciones/general/zona_actividad.php';

	$n1_corregido = $_GET['n1_corregido']; $n2_corregido = $_GET['n2_corregido']; $n3_corregido = $_GET['n3_corregido'];

	$query = "SELECT * FROM nivel_1 NATURAL JOIN nivel_2 NATURAL JOIN nivel_3 WHERE nivel_3.n3_tipo LIKE 'blog_nivel_3' AND nivel_3.n3_corregido LIKE '$n3_corregido'";
	crear_variable($query);

	$id_tabla1=$elemento['n1_id'];	$id_tabla2=$elemento['n2_id'];	$id_tabla3=$elemento['n3_id'];

	$query2 = "SELECT * FROM `archivo` WHERE `tabla_asociada` LIKE 'nivel_3' AND `id_elemento` = '$id_tabla3' AND `tipo` LIKE 'imagen' ORDER BY `orden` ";
	$resultado2 = $mysqli -> query($query2);
	if($resultado2->num_rows==0)
	{
		$imagen1 = $raiz."interfaz/diseno/sin_imagen.jpg";
	}
	else
	{
		$imagen = $resultado2->fetch_array(MYSQLI_ASSOC);
		$imagen1 = $raiz.$imagen['carpeta'].$imagen['archivo'];
		$imagen = $resultado2->fetch_array(MYSQLI_ASSOC);
		$imagen2 = $raiz.$imagen['carpeta'].$imagen['archivo'];
	}

	$titulo = $elemento['n3_nombre'];	$descripcion = strip_tags($elemento['n3_descripcion']);

	$query = "SELECT * FROM `general` WHERE `identificador_tabla` LIKE 'n3_id' AND `id_elemento` = '$id_tabla3'";
	$resultado = $mysqli->query($query);
	if($resultado->num_rows)
	{
		while($otros_datos = $resultado->fetch_array(MYSQLI_ASSOC))
		{
			$nombre_campo = $otros_datos['nombre'];
			$extras[$nombre_campo] = $otros_datos['contenido'];
		}
	}

	$query2="SELECT * FROM `archivo` WHERE tabla_asociada LIKE 'nivel_1' AND `id_elemento` = '$id_tabla1' ORDER BY `orden` ASC LIMIT 1 ";
	$resultado2=$mysqli->query($query2);
	$imagen_sub=$resultado2->fetch_array(MYSQLI_ASSOC);
	$url_imagen_sub= $raiz.$imagen_sub['carpeta'].$imagen_sub['archivo'];
?>
<html>
	<head>
		<?php cabecera()?>
		<!-- Definicion administrador de facebook -->
		<meta property="fb:admins" content="{1403873840}"/>
		<link href="<?php echo $imagen1?>" rel="image_src" />
		<meta property="og:image" content="<?php echo $raiz?>interfaz/<?php echo $n3_tipo."/".$elemento['n4_corregido']?>" />   
	</head>
	<body>
		<!-- bloque de encabezado-->
		<?php include_once 'funciones/general/encabezado.php';?>
		<!--Bloque cuerpo -->
		<div id="contenedor" CLASS="GRIS_CLARO" >
			<a name="servicios"></a>
				<div class="seccion_g4	left margin_principal" style="background-image:url(<?php echo $imagen2?>)">
				<div class="seccion_autoc"></div>
			</div>
			<div class="seccion_auto margin_principal blanco" >
				<div class="ancho_fijo_auto">
					<div class="seccion_autoc"></div>
					<div class="seccion_auto ">
						<div class="columna_v78  left articulo " >
							
							<div class="columna_1 blanco left">
								<div class="logo_empresa"> <img src="<?php echo $imagen1;?>"> </div>
								<div class="seccion_auto_sep"></div>
								<div class="seccion_auto_sep"></div>
								<p><?php echo $elemento['n3_descripcion']?></p>
								<?php
									include_once 'funciones/general/lista_promocion.php';
									listado_promocion($id_tabla1, $id_tabla3, $n2_id_depto, $mysqli, $raiz, 'uno')
								?>
							</div>
							
						</div>
						<div class="columna_4 right blanco seccion_auto " >						
							<?php include 'funciones/general/funcion_compartir_redes.php'; ?>
							<div class="datos_empresa" >
								<div style="background-image:url(<?php echo $url_imagen_sub;?>);"></div><!-- ICONO DE CATEGORIA-->
								<h1> <?php echo $elemento['n3_nombre']?></h1>
								<?php 
									if(isset($extras['telefono']))
									{
								?>
								<p><img src="<?php echo $raiz;?>interfaz/iconos/ie_telefono.png"><?php echo $extras['telefono'];?>
								<?php
									}
									if(isset($extras['direccion']))
									{
								?>
								<p><img src="<?php echo $raiz;?>interfaz/iconos/ie_direccion.png"><?php echo $extras['direccion'];?>
								<?php
									}
									if(isset($extras['provincia']))
									{
								?>
								<p><img src="<?php echo $raiz;?>interfaz/iconos/ie_direccion2.png"><?php echo $extras['provincia'];?>
								<?php
									}
									if(isset($extras['pagina_web']))
									{
								?>
								<p><img src="<?php echo $raiz;?>interfaz/iconos/ie_web.png"><?php echo $extras['pagina_web'];?>
								<?php
									}
									if(isset($extras['email']))
									{
								?>
								<p><img src="<?php echo $raiz;?>interfaz/iconos/ie_mail.png"><?php echo $extras['email'];?>
								<?php
									}
									if(isset($extras['horario']))
									{
								?>
								<p><img src="<?php echo $raiz;?>interfaz/iconos/ie_horario.png"><?php echo $extras['horario'];?>
								<?php
									}
									if(isset($extras['url_googlemaps']))
									{
								?>
								<p><?php echo $extras['url_googlemaps'];?>
								<?php
									}
								?>
								<br>
							</div>
							<div class="seccion_autoc_sep"></div>
							<div class="columna_1 fila_f40 left"></div>
							<div class="seccion_auto blanco"> <!-- Complemento Redes sociales -->
								<div id="fb-root"></div>
								<div class="fb-comments" data-href="<?php echo $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];?>" data-width="100%" data-numposts="5"></div>
								<div class="seccion_autoc"></div> 
							</div>
						</div>
					</div>
				</div>
				<div class="columna_1 fila_f40 "></div>	
				<div  class="columna_1 right seccion_auto gris_claro margin_principal">
					<div class="ancho_fijo_auto">
						
						<div class="seccion_auto_sep"></div> 
						<?php
							include_once 'funciones/general/lista_blog.php';
							listado_blog($n1_id_depto, $n2_id_depto, $mysqli, $id_tabla1, $id_tabla2, $raiz);
						?>
						<div class="seccion_auto_sep"></div> 
					</div>
				</div>
				<div class="seccion_autoc"></div>
			</div>
			<div class="columna_1 blanco">
				<div class="ancho_fijo_auto">
						<div class="seccion_autoc"></div>
						<?php
							include_once 'funciones/general/lista_promocion.php';
							listado_promocion($id_tabla1, $id_tabla3, $n2_id_depto, $mysqli, $raiz, 'todo')
						?>
						<div class="seccion_autoc"></div>
				</div>			
			</div>
			<div  class="seccion_g3	left  seccion_auto" style="background-image:url(<?php echo $imagen_zona?>)">
				<div class="seccion_autoc"></div>
				<div class="ancho_fijo_auto">
					<?php
						include_once 'funciones/general/lista_deptos_blog.php';
						listado_deptos_blog($n1_id_depto, $n2_id_depto, $mysqli, $id_tabla1, $raiz, $nombre_zona)
					?>
				</div>
				<div class="Seccion_autoc"></div>	
			</div>
			<div class="columna_1 right seccion_auto gris_claro ">
				<div class="columna_1 gris_claro2">
					<div class="ancho_fijo_auto">
						<h1>¿Que tipo de actividad buscas en <?php echo $nombre_zona;?>? </h1>
						<div class="seccion_autoc_sep"></div>
					</div>
				</div>
				<div class="ancho_fijo_auto">
					<?php
						include_once 'funciones/general/lista_sub_categoria_blog.php';
						listado_sub_categoria_blog($n1_id_depto, $n2_id_depto, $mysqli, $id_tabla1, $raiz);
					?>
					<div class="seccion_autoc"></div>
				</div>
				<div class="seccion_autoc"></div>
			</div>
			<!-------------------------->
			<?php pie_de_pagina()?>	
		</div>
	</body>
</html>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>