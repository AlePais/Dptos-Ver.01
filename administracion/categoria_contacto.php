<?php
	include 'funciones/general/funciones_administracion.php';
	// Variables [$_GET $id_elemento-$nombre] [general $tipo-$codigo_unico-$vista_from-$vista_boton-$tipo_consulta(ej n1_tipo)]

	//tipo_consulta es para que pueda leer la fila vacia de la consulta
	$titulo = 'Asuntos consultas';	$tabla = 'nivel_1';	$n1_tipo = $tipo;
	$query = "SELECT `n1_id`, `n1_nombre`, `n1_descripcion`, `n1_orden` FROM `nivel_1` WHERE `n1_id` = '$id_elemento' AND `n1_tipo` LIKE '$tipo_consulta' ORDER BY `n1_id` DESC";
	crear_variable($query);
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
							<p><?php echo $titulo?></p>
							<a id='carga_elemento' style="<?php echo $vista_boton?>"> Agregar en <?php echo $titulo?></a>													
						</div>
						<div class="seccion_autoc"></div>
							<form method="post" action="funciones/nivel_1/bd_nivel_1.php" style="<?php echo $vista_form?>" id='formulario' name='formulario'>
								<div class="columna_1 left">
									<DIV CLASS="formulario_div columna_4 ">
										<h2><i>Asunto de contacto</i></h2><hr>
										<input type='hidden' id='n1_id' name='n1_id' value='<?php echo $id_elemento?>'>
										<input type='hidden' id='n1_tipo' name='n1_tipo' value='<?php echo $n1_tipo?>'>
										<input type='hidden' id='n1_orden' name='n1_orden' value='<?php echo $n1_orden?>'>
										<input type='hidden' id='url_origen' name='url_origen' value='<?php echo $archivo_actual?>'>
										<input type='hidden' id='tabla' name='tabla' value='<?php echo $tabla?>'>
										<p> <span>Nombre</span><input type='text' onBlur="verificaRepetido('nivel_1', this, 'n1_id', <?php echo $id_elemento?>)" id='n1_nombre' name='n1_nombre' value='<?php echo $n1_nombre?>' maxlength="100" required ><span class='error'></span></p>
									</div>
									<DIV CLASS="left columna_4 ">
										<div class="alerta">
										<b>Asuntos de contacto</B> 
										<p> En esta seccion puede describir los asuntos con los que desea que los usuarios se contacten, atravez del sitio web</p>
										</div>
										<div class="alerta">
										<p>Para eliminar un asunto, busque el listado de asuntos, en la pagina anterior, y clicke sobre el boton en rojo eliminar</p>
										</div>
									</div>
								</div>
								<!-- <p><span>Descripcion</span>	
								<p><div style="width:auto; height:auto; min-height:500px;">
									<textarea id='n1_descripcion' name='n1_descripcion'><?php echo $n1_descripcion?></textarea>
								</div></p>
								<br>
								<div id="imagenes"></div>
								<div id="archivos"></div>
								<p>-->
								<div class="seccion_autoc"></div>	
							<div id="pie_titulo">
								<input type='submit' id='cargar' value='Guardar'>												
							</div>
							</form>
							<div>
								<?php listado_elementos('n1_tipo', $n1_tipo, 'n1_orden', 'n1_id', 'n1_nombre', 'n1_corregido');?>
							</div>						
						</div>
						<div class="seccion_autoc"></div>						
				</div>
				<div class="seccion_autoc"></div>
		
			<div id='pie_de_pagina'>
				<?php include "funciones/general/pie_de_pagina_me.php"; ?>	
			</div>
		
	</body>
</html>

<form id="parametros_imagen">
	<input type='hidden' id='tipo' name='tipo' value='imagen'>
	<input type='hidden' id='id_elemento' name='id_elemento' value='<?php echo $id_elemento?>'>
	<input type='hidden' id='codigo_unico' name='codigo_unico' value='<?php echo $codigo_unico?>'>
	<input type='hidden' id='tabla_archivo' name='tabla_archivo' value='<?php echo $tabla?>'>
	<!-- nombre_id es el nombre del campo id en la tabla a la que se agrega el archivo. --> 
	<input type='hidden' id='nombre_id' name='nombre_id' value='n1_id'>
	<input type='hidden' id='id' name='id' value=''>
	<input type='hidden' id='cantidad' name='cantidad' value='multiple'> <!-- multiple o simple --> 
</form>
<script type="text/javascript">//formulario_carga('imagenes', 'parametros_imagen')</script>
<form id="parametros_archivo">
	<input type='hidden' id='tipo' name='tipo' value='archivo'>
	<input type='hidden' id='id_elemento' name='id_elemento' value='<?php echo $id_elemento?>'>
	<input type='hidden' id='codigo_unico' name='codigo_unico' value='<?php echo $codigo_unico?>'>
	<input type='hidden' id='tabla_archivo' name='tabla_archivo' value='<?php echo $tabla?>'>
	<!-- nombre_id es el nombre del campo id en la tabla a la que se agrega el archivo. --> 
	<input type='hidden' id='nombre_id' name='nombre_id' value='n1_id'>
	<input type='hidden' id='id' name='id' value=''>
	<input type='hidden' id='cantidad' name='cantidad' value='multiple'> <!-- multiple o simple --> 
</form>
<script type="text/javascript">//formulario_carga('archivos', 'parametros_archivo')</script>
