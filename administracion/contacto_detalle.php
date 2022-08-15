<?php
	include 'funciones/general/funciones_administracion.php';
	// Variables [$_GET $id_elemento-$nombre] [general $tipo-$codigo_unico-$vista_from-$vista_boton-$tipo_consulta(ej n1_tipo)]

	//tipo_consulta es para que pueda leer la fila vacia de la consulta
	$query = "SELECT * FROM `contacto` WHERE `id` = '$id_elemento'";
	crear_variable($query);
	$titulo = "Detalle contacto N°$id - $nombre $apellido";
	$tabla = 'nivel_1'; 'blog_nivel_1'; $tipo="reclamos";

	$query1 = "SELECT `nombre` AS `nombre_asunto` FROM `contacto_asunto` WHERE `id_contacto_asunto`= '$asunto'";
	crear_variable($query1);

	$query2="UPDATE `contacto` SET `visto`='$fecha_actual' WHERE `id` = '$id_elemento'";
	$mysqli->query($query2);
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
						<span class="eliminar2"> x </span></p>
						<div class="seccion_autoc1"></div>
					</div>
					<div class="seccion_autoc"></div>
					<div class="columna_3 left">
						<span><b>ID_CONTACTO:<?php echo $id;?></b></span>
						<?php if($nombre!=''){				?><span><b><?php echo $nombre."</b><span> Nombre</span></span>";}?>
						<?php if($apellido!=''){			?><span><b><?php echo $apellido."</b><span> Apellido</span></span>";}?>
						<?php if($email!=''){				?><span><b><?php echo $email."</b><span> Email</span></span>";}?>
						<?php if($telefono!=''){			?><span><b><?php echo $telefono."</b><span> Telefono</span></span>";}?>
						<?php if($nombre_asunto!=''){		?><span><b><?php echo $nombre_asunto."</b><span> Asunto</span></span>";}?>
					</div>
					<div class="columna_1a right ">
						<div class="contenido_mensaje right">
							<?php if($creado!=''){				?><span><?php echo "Fecha contacto: $creado </span>";}?>	
							<div class="seccion_autoc"></div>							
							<?php if($contenido!=''){	 echo $contenido; }?>
						</div>
						<?php
							$query="SELECT * FROM `archivo` WHERE `tipo` LIKE 'archivo' AND `categoria`  LIKE 'adjunto'  AND `tabla_asociada` LIKE 'contacto' AND `identificador_tabla` = '$id'";
							$resultado = $mysqli->query($query);
							if($resultado->num_rows!=0)
							{
						?>
						<div class="adjuntos right oculto">
							<?php
									while($adjunto = $resultado->fetch_array(MYSQLI_ASSOC))
									{
										$archivo = $raiz.$adjunto['carpeta'].$adjunto['archivo'];
							?>
							<a target='_blank' href='<?php echo $archivo?>'><?php echo $nombre?></a>
							<?php
									}
							?>
						</div>
						<?php
							}
						?>
					</div>
				</div>
				<div class="seccion_autoc"></div>
			</div>
			<div id='pie_de_pagina'>
				<?php include "funciones/general/pie_de_pagina_me.php"; ?>	
			</div>
		</div>
	</body>
</html>