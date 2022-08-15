<?php
	//Incluyo funciones generales del sitio
	include '../general/conexion.php'; 
	
	include '../general/cabecera.php';
	include '../general/pie_de_pagina.php';

	$n1_tipo = "categoria"; $n2_tipo = "sub_categoria"; $n3_tipo = "articulo";

	$datos=$_GET['datos'];
	
	$datos = explode("_", $datos);
	$id_promocion=$datos[0];
	$id_agenda=$datos[1];
	
	$query = "SELECT * FROM `nivel_4`WHERE `n4_id`='$id_promocion'";
	$resultado = $mysqli->query($query);
	$contenido = $resultado->fetch_array(MYSQLI_ASSOC);
	$nombre_promocion = $contenido['n4_nombre'];
	$id_tabla = $contenido['n4_id'];
	
	
	$query2 = "SELECT * FROM `imagen` WHERE `tabla` LIKE 'nivel_4' AND `id_tabla` = '$id_tabla' ORDER BY `orden` ";
	$resultado2 = $mysqli -> query($query2);
	if($resultado2->num_rows==0)
	{
		$imagen = $raiz."interfaz/diseno/sin_imagen.jpg";
	}
	else
	{
		$imagen = $resultado2->fetch_array(MYSQLI_ASSOC);
		$imagen = $raiz.$imagen['carpeta'].$imagen['corregido'];
	}	
?>
<html>
	<head>
		<?php cabecera()?>
	</head>
	<body>
		<!-- bloque de encabezado-->
		<?php include '../general/encabezado.php';?>

			<!--Bloque cuerpo -->
	<div id="contenedor" class="gris_claro" style="<?php echo $fondo?>;">
			<div class="seccion_auto margin_principal" >
				<div class="ancho_fijo_auto" style="min-height: 70%;" >
					<div class="columna_1a left  transparente_blanco  margin-top_f10 padding_10 ">
						<div class="columna_2 left formulario_compra blanco">
						<form action="db_promocion.php" METHOD="POST" >
							<h1> CONFIRME LA UTILIZACION DEL DESCUENTO</h1>
							<h2><?php echo $nombre_promocion?></h2>
							<div class="seccion_autoc"></div>
							<p>Escriba su email, como empresa.
							<p><input type='email' id='email' name='email' style="    border: 1px solid rgb(200,200,200);
    background: rgba(240,240,240,0.4);" required>
							<input type='hidden' id='id_promocion' name='id_promocion' value='<?php echo $id_promocion?>'>
							<input type='hidden' id='id_agenda' name='id_agenda' value='<?php echo $id_agenda?>'>
							<div class="seccion_auto_sep"></div>
							<p><label>Confirmo la utilizacion del descuento</label><input type="checkbox" id='confirma' name='confirma' value='si' required>
							<div class="seccion_auto_sep"></div>
							<input type="submit" value="Utilizar promocion">
							<div class="seccion_auto_sep"></div>
						</form>
					</div>
						<div class=" columna_3 fila_1 right  seccion_auto margin_principal" style="background-image:url(<?php echo $imagen?>);    height: 350px;    width: 350px;    background-size: cover;">
					
					
						<div class="seccion_autoc"></div>
					</div>
					</div>
					
					<div class="seccion_autoc"></div>
				</div>
			</div>
			<div class="seccion_autoc"></div>
<!-- ---------------------- -->				
			<?php pie_de_pagina()?>
		</div>
	</body>
</html>

