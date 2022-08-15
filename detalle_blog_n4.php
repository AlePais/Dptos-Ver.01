<?php
	//Incluyo funciones generales del sitio
	include 'funciones/general/conexion.php'; include 'funciones/general/cabecera.php';	include 'funciones/general/pie_de_pagina.php';
	include 'funciones/general/zona_actividad.php';

	$n1_corregido = $_GET['n1_corregido']; $n2_corregido = $_GET['n2_corregido']; $n3_corregido = $_GET['n3_corregido']; $n4_corregido = $_GET['n4_corregido'];

	$query = "SELECT * FROM nivel_1 NATURAL JOIN nivel_2 NATURAL JOIN nivel_3 NATURAL JOIN nivel_4 WHERE nivel_3.n3_tipo LIKE 'blog_nivel_3' AND nivel_3.n3_corregido LIKE '$n3_corregido'";
	$resultado = $mysqli->query($query);
	$elemento = $resultado->fetch_array(MYSQLI_ASSOC);

	$id_tabla1=$elemento['n1_id'];	$id_tabla2=$elemento['n2_id'];	$id_tabla3=$elemento['n3_id'];	$id_tabla4=$elemento['n4_id'];

	$query2 = "SELECT * FROM `archivo` WHERE `tabla_asociada` LIKE 'nivel_3' AND `id_elemento` = '$id_tabla3' AND `tipo` LIKE 'imagen' ORDER BY `orden` ";
	$resultado2 = $mysqli -> query($query2);
	if($resultado2->num_rows==0)
	{
		$imagen = $raiz."interfaz/diseno/sin_imagen.jpg";
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
	
	$query2="SELECT * FROM `archivo` WHERE `tabla_asociada` LIKE 'nivel_1' AND `id_elemento` = '$id_tabla1' ORDER BY `orden` ASC LIMIT 1 ";
	$resultado2=$mysqli->query($query2);
	$imagen_sub=$resultado2->fetch_array(MYSQLI_ASSOC);
	$url_imagen_sub= $raiz.$imagen_sub['carpeta'].$imagen_sub['archivo'];
?>
<html>
	<head>
		<?php cabecera()?>
		<!-- Definicion administrador de facebook -->
		<script src="<?php echo $raiz;?>funciones/general/magnific/dist/jquery.magnific-popup.min.js"></script>
		<link  href="<?php echo $raiz;?>funciones/general/fotorama/fotorama.css" rel="stylesheet"> <!-- 3 KB -->
		<script src="<?php echo $raiz;?>funciones/general/fotorama/fotorama.js"></script> <!-- 16 KB -->
		<script type="text/javascript">
			$(document).ready(function(){$('#popup-gallery').magnificPopup({delegate: 'a',type: 'image',tLoading: 'Loading image #%curr%...',mainClass: 'mfp-img-mobile',gallery: {enabled: true,navigateByImgClick: true,preload: [0,1]
			// Will preload 0 - before current, and 1 after the current image
			},image: {tError: '<a href="%url%">La imagen #%curr%</a> no pudo ser cargada.',}});});
		</script>
		<script>
			$(function() {
			  $('#slides').slidesjs({
				width: 940,
				height: 528,
				navigation: false,
				play:
				{
					effect: "slide",
					// [string] Can be either "slide" or "fade".
					interval: 3000,
					// [number] Time spent on each slide in milliseconds.
					auto: true,
					// [boolean] Start playing the slideshow on load.
					swap: true,
					// [boolean] show/hide stop and play buttons
					pauseOnHover: true,
					// [boolean] pause a playing slideshow on hover
					restartDelay: 2500
					// [number] restart delay on inactive slideshow
				},
				navigation:
				{
					active: false,
					// [boolean] Generates next and previous buttons.
					// You can set to false and use your own buttons.
					// User defined buttons must have the following:
					// previous button: class="slidesjs-previous slidesjs-navigation"
					// next button: class="slidesjs-next slidesjs-navigation"
					effect: "fade"
					// [string] Can be either "slide" or "fade".
				}});
			});
		</script>
	</head>
	<body>
		<!-- bloque de encabezado-->
		<?php include 'funciones/general/encabezado.php';?>
		<link rel="stylesheet" href="<?php echo $raiz;?>funciones\general\magnific\dist\magnific-popup.css">		
		<!--Bloque cuerpo -->
		<div id="contenedor" CLASS="GRIS_CLARO" >
			<div class="seccion_g4	left  seccion_auto margin_principal" style="background-image:url(<?php echo $imagen2?>)">
				<div class="seccion_autoc"></div>
			</div>
			<div class="seccion_auto margin_principal blanco" >
				<div class="ancho_fijo_auto">
					<div class="seccion_autoc"></div>
					<div class="seccion_auto ">
						<div class="columna_v78  left articulo " >
							<div class="columna_1 blanco right">
								<div class="logo_empresa"> <img src="<?php echo $imagen1;?>"> </div>
								<div class="seccion_auto_sep"></div>
								<div class="seccion_auto_sep"></div>
								<h1> De la empresa</h1>
								<p><?php echo $elemento['n3_descripcion']?></p>
								
								<div class="promocion_detalle">
									<div class="columna_1a right">
										<div style="margin:2.5%;" class="fotorama"    data-width="100%"      data-ratio="800/600"     data-minwidth="100%"     data-minheight="300" data-maxheight="500px"  data-ratio="800/600" data-nav="thumbs"  data-autoplay="true" data-autoplay="3000" data-fit="cover" >
										<?php
											$id_tabla=$elemento['n4_id'];				
											$query ="SELECT * FROM `archivo` WHERE `tabla_asociada` LIKE 'nivel_4' AND `id_elemento` = '$id_tabla' AND `tipo` LIKE 'imagen' ORDER BY `orden`";
											$resultado=$mysqli->query($query);
											while($galeria_safari = $resultado->fetch_array(MYSQLI_ASSOC))
											{
												$ubicacion_imagen = $raiz.$galeria_safari['carpeta'].$galeria_safari['archivo'];
										?>
											<a href="<?php echo $ubicacion_imagen?>"> <img src="<?php echo $ubicacion_imagen?>">  </a>
										<?php
											}
										?>
										</div>
										<?php echo $elemento['n4_descripcion']?>
										<div class="seccion_autoc"></div>
									</div>
									<div class="columna_3 left ">
									<div class="promocion_boucher">
										<span> <!-- Titulo descuento -->
											<p><?php echo $elemento['n4_nombre']?></p>
											<div class="seccion_autoc"></div>
										</span>
										<?php
										
											 $url_validar=$base.'funciones/usuario/validar_promocion.php?datos='.$id_tabla."_".$_SESSION['id_agenda'];
										?>
										<img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=<?php echo $url_validar?>&choe=UTF-8" title="Validar promocion"/>
										
											<p> Presenta el codigo QR en el LOCAL</p>
											
											<div class="seccion_autoc"></div>											
										</div>
										<div class="seccion_autoc"></div>
									</div>
									<div class="seccion_autoc"></div>									
									</div>
								</div>
								<div class="seccion_autoc"></div>
								<div class="seccion_autoc"></div>
								<div class="columna_1 gris_claro left">
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
							<div class="seccion_autoc"></div>
						</div>
					</div>
				</div>
			<div class="columna_1 fila_f40 "></div>	
			<div class="columna_1 right seccion_auto gris_claro2 ">	
				<div class="ancho_fijo_auto">
						<div class="seccion_auto_sep"></div>
				<?php
					include_once 'funciones/general/lista_blog.php';
					listado_blog($n1_id_depto, $n2_id_depto, $mysqli, $id_tabla1, $id_tabla2, $raiz);
				?>
				</div>
			</div>
			<div class="columna_1 blanco">
				<div class="ancho_fijo_auto">
						<div class="seccion_auto_sep"></div>
				<?php
					include_once 'funciones/general/lista_promocion.php';
					listado_promocion($id_tabla1, $id_tabla3, $n2_id_depto, $mysqli, $raiz, 'todo')
				?>
				</div>
				<div class="seccion_autoc"></div>	
			</div>
			<div  class="seccion_g3	left  seccion_auto margin_principal" style="background-image:url(<?php echo $imagen_zona?>)">
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
						<div class="seccion_autoc"></div>
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