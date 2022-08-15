<?php
	//Incluyo funciones generales del sitio
	include 'funciones/general/conexion.php'; include 'funciones/general/cabecera.php';	include 'funciones/general/pie_de_pagina.php';

	$n1_corregido = $_GET['n1_corregido']; $n2_corregido = $_GET['n2_corregido']; $n3_corregido = $_GET['n3_corregido'];
	$query = "SELECT * FROM nivel_1 NATURAL JOIN nivel_2 NATURAL JOIN nivel_3 WHERE nivel_3.n3_corregido LIKE '$n3_corregido'";
	$resultado = $mysqli->query($query);
	$elemento = $resultado->fetch_array(MYSQLI_ASSOC);
	$n1_id=$elemento['n1_id']; $n2_id=$elemento['n2_id']; $id_elemento=$elemento['n3_id'];
	$titulo = $elemento['n3_nombre']; $corregido = $elemento['n3_corregido'];	$descripcion = strip_tags($elemento['n3_descripcion']);

	$id_representante = 0;
	$query="SELECT * FROM `agenda_representantes_relaciones` WHERE `n1_id`='$n1_id' AND `n2_id`='$n2_id' AND `n3_id`='$id_elemento'";
	$resultado = $mysqli->query($query);
	if($resultado->num_rows==1)
	{
		$datos_relacion = $resultado->fetch_array(MYSQLI_ASSOC);
		$id_representante = $datos_relacion['id_agenda_representantes'];
	}
	
	$query = "SELECT * FROM `general` WHERE `identificador_tabla` LIKE 'n3_id' AND `id_elemento` = '$id_elemento'";
	$resultado = $mysqli->query($query);
	while($otros_datos = $resultado->fetch_array(MYSQLI_ASSOC))
	{
		$nombre_campo = $otros_datos['nombre'];
		$extras[$nombre_campo] = $otros_datos['contenido'];
	}
?>
<html>
	<head>
		<?php cabecera()?>
		<!-- Definicion administrador de facebook -->
		<meta property="fb:admins" content="{1403873840}"/>
		<link href="<?php echo $raiz?>interfaz/<?php echo $n3_tipo."/".$elemento['n4_corregido']?>" rel="image_src" />
		<meta property="og:image" content="<?php echo $raiz?>interfaz/<?php echo $n3_tipo."/".$elemento['n4_corregido']?>" />   
		<script src="<?php echo $raiz;?>funciones/general/magnific/dist/jquery.magnific-popup.min.js"></script>
		<link  href="<?php echo $raiz;?>funciones/general/fotorama/fotorama.css" rel="stylesheet"> <!-- 3 KB -->
		<script src="<?php echo $raiz;?>funciones/general/fotorama/fotorama.js"></script> <!-- 16 KB -->
		<script type="text/javascript">
			$(document).ready(function(){$('#popup-gallery').magnificPopup({delegate: 'a',type: 'image',tLoading: 'Loading image #%curr%...',mainClass: 'mfp-img-mobile',gallery: {enabled: true,navigateByImgClick: true,preload: [0,1]
			// Will preload 0 - before current, and 1 after the current image
			},image: {tError: '<a href="%url%">La imagen #%curr%</a> no pudo ser cargada.',}});});
		</script>
		<script type="text/javascript">
			$(document).ready(function(){
			  $('#galeria_departamento').slick({
					dots: false,
					slidesToShow: 1,
					autoplay:true,	
					autoplaySpeed:3000,
					arrows:false,
					asNavFor: '#miniaturas',
					infinite: false
				 });
				$('#miniaturas').slick({
				  slidesToShow: 10,
				  slidesToScroll: 1,
				  asNavFor: '#galeria_departamento',
				  dots: false,
				  centerMode: true,
				  focusOnSelect: true,
				});
			});

		</script>
	</head>
	<body>
		<!-- bloque de encabezado-->
		<?php include 'funciones/general/encabezado.php';?>
		<!--Bloque cuerpo -->
		<div id="contenedor" CLASS="GRIS_CLARO" >
			<a name="servicios"></a>
			<div class="seccion_auto margin_principal" >
				<div id="galeria_departamento" style="width:100%;">
					<?php
						$id_elemento=$elemento['n3_id'];				
						$query ="SELECT * FROM `archivo` WHERE `tipo` LIKE 'imagen' AND  `tabla_asociada` LIKE 'nivel_3' AND `id_elemento` = '$id_elemento' ORDER BY `orden`";
						$resultado=$mysqli->query($query);
						while($galeria = $resultado->fetch_array(MYSQLI_ASSOC))
						{
							$ubicacion_imagen = $raiz.$galeria['carpeta'].$galeria['archivo'];
					?>
					<div class="">
						<img data-lazy="<?php echo $ubicacion_imagen?>" >
					</div>
					<?php
						}
					?>
				</div>
				<div id="miniaturas" style="width:100%;">
					<?php
						$id_elemento=$elemento['n3_id'];				
						$query ="SELECT * FROM `archivo` WHERE `tipo` LIKE 'imagen' AND  `tabla_asociada` LIKE 'nivel_3' AND `id_elemento` = '$id_elemento' ORDER BY `orden`";
						$resultado=$mysqli->query($query);
						while($galeria = $resultado->fetch_array(MYSQLI_ASSOC))
						{
							$ubicacion_imagen = $raiz.$galeria['carpeta'].$galeria['archivo'];
					?>
					<div>
						<img data-lazy="<?php echo $ubicacion_imagen?>" >
					</div>
					<?php
						}
					?>
				</div>
				<div class="columna_1 right seccion_auto transparente_blanco ">
					<div class=" encabezado-e-producto_detalle  ">
						<div class="ancho_fijo_auto ">									
							<div class="columna_3 left"><p><img src="<?php echo $raiz; ?>interfaz/iconos/i_dormitorio.png"><?php echo $elemento['n3_nombre']?></div>
							<div class="columna_3 left"><p><img src="<?php echo $raiz; ?>interfaz/iconos/i_localidad.png"><?php echo $elemento['n2_nombre']?><a href="<?php echo $raiz.$elemento['n1_corregido']."/".$elemento['n2_corregido']?>"> (otros departamentos)</a></div>
							<div class="columna_3 left"><p style="color:rgb(174,61,202);"><?php if($extras['precio']!=''){ echo $extras['precio'];}?></div>
							<div class="seccion_autoc"></div>
						</div>
					</div>
				</div>		
				<div class="ancho_fijo_auto">
					<div class="seccion_autoc"></div>
					<div class="seccion_auto">
						<div class="columna_v78  left articulo " >
							<div class="columna_1 blanco left">
								<h1> <?php echo $elemento['n3_nombre']?></h1>
								<p><?php echo $elemento['n2_nombre']?><a href="<?php echo $raiz.$elemento['n1_corregido']."/".$elemento['n2_corregido']?>"> Ver mas</a>
								<br>
								<p> <?php echo $extras['descripcion_corta'];?>
								<h1><?php if($extras['precio']!=''){ echo $extras['precio'];}?></h1>
								<br>
							</div>
							<div class="columna_1 fila_f40 left"></div>
							<div class="columna_1 blanco left">
								<?php
									$id_elemento=$elemento['n3_id'];				
									$query ="SELECT * FROM `archivo` WHERE `tipo` LIKE 'archivo' AND `tabla_asociada` LIKE 'nivel_3' AND `id_elemento` = '$id_elemento' ORDER BY `orden`";
									$resultado=$mysqli->query($query);
									while($archivo = $resultado->fetch_array(MYSQLI_ASSOC))
									{
										$extension = explode(".", $archivo['archivo']);
										$icono = src_icono(end($extension));
										$icono=$raiz."interfaz/iconos/".$icono;
										$ubicacion_archivo = $raiz.$archivo['carpeta'].$archivo['archivo'];
								?>
								<a href="<?php echo $ubicacion_archivo?>" download><img src="<?php echo $icono?>"><?php echo $archivo['archivo']?></a>
								<?php
									}
								?>
								<h1> Mas datos sobre la ubicación:</h1>
								<p><?php echo $elemento['n3_descripcion']?></p>
							</div>
							<div class="columna_1 fila_f40 left"></div>
							<div class="seccion_auto blanco"> <!-- Complemento Redes sociales -->
								<div id="fb-root"></div>
								<div class="fb-comments" data-href="<?php echo $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];?>" data-width="100%" data-numposts="5"></div>
								<div class="seccion_autoc"></div> 
							</div>
						</div>
						<div class="columna_4 right  seccion_auto " >
							<?php include 'funciones/general/funcion_compartir_redes.php'; ?>
							<div class="seccion_auto"></div>
							<div class="formulario_compra center_relat seccion_auto blanco boton_1" >
								<center>
									<h2 style="color:white !important;"><a href="<?php echo $raiz?>reservar/<?php echo $n3_corregido?>">Reservar AHORA</h2><!-- <span class="transparente_azul" ><a class="right_a  padding_10 margin_10" href="<?php echo $raiz?>acerca.php"> <img src="<?php echo $raiz;?>interfaz/iconos/reclamos.png"></a></span> -->
								</center>
								<div class="seccion_autoc"></div>
							</div>
							<div class="seccion_autoc"></div>
						</div>
					</div>
				</div>
				<div class="columna_1 fila_f40 "></div>	
				<div class="columna_1 right seccion_auto gris_claro2 ">	
					<div class="seccion_autoc margin_principal"></div>
					<div class="ancho_fijo_auto  ">
						<?php
							include 'funciones/general/lista_deptos.php';
							$id_consulta =  $elemento['n2_id'];
							$clausula = "nivel_3.n3_tipo = 'departamento_nivel_3' AND nivel_3.n2_id = '$id_consulta'";
							listado_deptos($clausula, $mysqli, $raiz)
						?>
						<div class="seccion_auto_sep"> </div> 
					</div>
						<div class="seccion_autoc"></div>
				</div>
				<div class="seccion_autoc"></div>
			</div>
			<div class="seccion_autoc"></div>
				<!--Bloque pie de pagina -->
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
<?php
function src_icono($variable)
	{
		switch($variable)
		{
			case 'pdf':
				$icono = 'pdf.png';
				break;
			case 'doc':
				$icono = 'word.png';
				break;
			case 'docx':
				$icono = 'word.png';
				break;
			case 'xls':
				$icono = 'excel.png';
				break;
			case 'xlsx':
				$icono = 'excel.png';
				break;
			case 'ppt':
				$icono = 'powerpoint.png';
				break;
			case 'pptx':
				$icono = 'powerpoint.png';
				break;
			case 'png' || 'jpg' || 'gif':
				$icono = 'imagen.png';
				break;
			default:
				$icono= 'archivo.png';
				break;
		}
		return $icono;
	}
?>