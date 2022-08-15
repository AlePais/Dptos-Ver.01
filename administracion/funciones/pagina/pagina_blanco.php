<?php
	//Incluyo funciones generales del sitio
	include 'funciones/general/conexion.php'; include 'funciones/general/cabecera.php'; include 'funciones/general/pie_de_pagina.php';

	$n1_tipo = "categoria"; $n2_tipo = "sub_categoria"; $n3_tipo = "articulo";
?>
<html>
	<head>
		<?php cabecera()?>
	</head>
	<body>
		<!-- bloque de encabezado-->
		<?php include 'funciones/general/encabezado.php';?>

		<!--Bloque cuerpo -->
		<div id="contenedor" class="gris_claro" style="<?php echo $fondo?>;">
			<div class="seccion_auto margin_principal" >
				<div class="ancho_fijo_auto" >
					<div class="columna_2 left  transparente_verde  margin-top_f10 padding_10 "  >
						<?php echo $contenido_general?>
					</div>		
				</div>
			</div>
			<div class="seccion_autoc"></div>
<!-- ---------------------- -->				
			<?php pie_de_pagina()?>
		</div>
	</body>
</html>