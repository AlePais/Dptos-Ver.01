<?php
	//Incluyo funciones generales del sitio
	include 'funciones/general/conexion.php'; include 'funciones/general/cabecera.php';	include 'funciones/general/pie_de_pagina.php';
	
	$n1_corregido = $_GET['n1_corregido'];$n2_corregido = $_GET['n2_corregido'];
	$query = "SELECT * FROM `nivel_2` WHERE `n2_corregido` LIKE '$n2_corregido'";
	$resultado = $mysqli->query($query);
	$elemento = $resultado->fetch_array(MYSQLI_ASSOC);
	$id_elemento=$elemento['n2_id'];

	$query2 = "SELECT * FROM `archivo` WHERE `tabla_asociada` LIKE 'nivel_2' AND `id_elemento` = '$id_elemento' ORDER BY `orden`";
	$resultado2 = $mysqli -> query($query2);
	if($resultado2->num_rows==0)
	{
		$imagen = $raiz."interfaz/diseno/sin_imagen.jpg";
	}
	else
	{
		$imagen = $resultado2->fetch_array(MYSQLI_ASSOC);
		$imagen = $raiz.$imagen['carpeta'].$imagen['archivo']; 
	}
	$titulo = $elemento['n2_nombre'];	$descripcion = strip_tags($elemento['n2_descripcion']);
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
			<div class="seccion_g2 left  seccion_auto margin_principal" style="background-image:url(<?php echo $imagen?>)">
				<div class="ancho_fijo_auto ">
					<div class="seccion_auto transparente_negro columna_2 ">
						<h1><?php echo $elemento['n2_nombre'];?></h1>
						<?php echo $elemento['n2_descripcion'];?>
						<div class="seccion_autoc"></div>
					</div>						
				</div>
				<div class="seccion_autoc"></div>
			</div>
			<div class="columna_1 right seccion_auto transparente_blanco ">
				<div class=" encabezado-e-producto">
					<div class="ancho_fijo_auto formulario_index_horizontal overflow ">
						<?php include 'funciones/general/formulario_horizontal.php'?>
					</div>	
				</div>
				<div class="seccion_autoc"></div>
				<div class="ancho_fijo_auto ">
					<!-- Columna izquierda 75%  -->
					<div  class="columna_1 right seccion_auto margin_principal">
						<?php
							include 'funciones/general/lista_deptos.php';
							$id_consulta =  $elemento['n2_id'];
							$clausula = "nivel_3.n3_tipo = 'departamento_nivel_3' AND nivel_3.n2_id = '$id_consulta'";
							listado_deptos($clausula, $mysqli, $raiz)
						?>
						<div class="seccion_auto_sep"></div> 
					</div>
					<div class="seccion_autoc"></div>
				</div>
				<div class="seccion_autoc"></div>
			</div>
			<div class="seccion_autoc"></div>
			<?php pie_de_pagina()?>	
		</div>
	</body>
</html>