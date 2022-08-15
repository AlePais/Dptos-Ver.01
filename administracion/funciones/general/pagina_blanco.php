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
		<div id="contenedor">
			<?php echo $contenido?>
			<?php pie_de_pagina()?>	
		</div>
	</body>
</html>