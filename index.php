<?php
	//Incluyo funciones generales del sitio
	include 'funciones/general/conexion.php'; include 'funciones/general/cabecera.php'; include 'funciones/general/pie_de_pagina.php';

	$n1_tipo = "departamento_nivel_1"; $n2_tipo = "departamento_nivel_2"; $n3_tipo = "departamento_nivel_3";
?>
<html>
	<head>
		<?php cabecera()?>
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

		<!--Bloque cuerpo -->
		<div id="contenedor" class="gris_claro" style="<?php echo $fondo?>">
			<div class="seccion_g " id="slides">
				<?php
					$query = "SELECT * FROM `archivo` WHERE `identificador_tabla` LIKE 'id_pagina' AND `id_elemento` LIKE '$id_pagina' AND `tipo` = 'imagen' AND `categoria` LIKE 'imagenes' ORDER BY `orden`";
					$resultado=$mysqli->query($query);
					if($resultado->num_rows==1)
					{
						$galeria = $resultado->fetch_array(MYSQLI_ASSOC);
						$url = $raiz.$galeria['carpeta'].$galeria['archivo'];
				?>
				<div style="background-image:url(<?php echo $url?>); height:100%;" class="img-responsive"/></div>
				<?php
					}
				?>
				<?php
					if($resultado->num_rows>1)
					{
						while($galeria = $resultado->fetch_array(MYSQLI_ASSOC))
						{
							$url = $raiz.$galeria['carpeta'].$galeria['archivo'];
				?>
					<div style="background-image:url(<?php echo $url?>); height:100%;" class="img-responsive"/></div>
				<?php
						}
				?>
				<a href="#" class="slidesjs-previous slidesjs-navigation"><i class="icon-chevron-left icon-large"></i></a>
				<a href="#" class="slidesjs-next slidesjs-navigation"><i class="icon-chevron-right icon-large"></i></a>
				<?php
					}
				?>
			</div>
			<div class="columna_1 left  seccion_auto  " >
				<div class="columna_1 altura_auto" >
					<div class="formulario_index padding_20 margin-top_200 overflow left">
						<?php include $raiz.'funciones/general/formulario_vertical.php'?>
					</div>
				</div>
				<div class="columna_1 left  seccion_auto seccion_g3  " >	
					<div class="ancho_fijo_auto ">
						<div class="seccion_auto ct_blanco columna_1 ">
							<?php echo $contenido_general?>
						</div>						
					</div>
					<div class="seccion_autoc"></div>
				</div>
			</div>
			<div class="seccion_autoc"></div>
			<div class="columna_1 right seccion_auto margin_principal blanco ">
				<div class=" encabezado-e-producto">
					<div class="ancho_fijo_auto formulario_index_horizontal overflow ">
						<?php include $raiz.'funciones/general/formulario_horizontal.php'?>
					</div>	
				</div>
				<div class="seccion_autoc"></div>
				<div class="ancho_fijo_auto">
					<?php
						include $raiz.'funciones/general/lista_deptos.php';
						$clausula = "nivel_3.n3_tipo = '$n3_tipo'";
						listado_deptos($clausula, $mysqli, $raiz)
					?>
					<div class="seccion_auto_sep"></div> 
				</div>
				<div class="seccion_autoc"> </div>  
			</div>
			<div class="seccion_autoc"></div>
			<?php pie_de_pagina()?>	
		</div>
	</body>
</html>