<?php
	include 'funciones/general/funciones_administracion.php';
	// Variables [$_GET $id_elemento-$nombre] [general $tipo-$codigo_unico-$vista_from-$vista_boton-$tipo_consulta(ej n1_tipo)]

	$titulo = 'Mensajes Recibidos'; $tabla = 'mensaje_recibido';
?>
<html>
	<head>
		<?php include 'funciones/general/cabecera_administracion.php';?>
		<script language="javascript" src="funciones/mensajes_recibidos/mensajes_recibidos.js"></script>
	</head>
	<body>
		<?php include "funciones/general/encabezado.php";?>	
		<div id='cuerpo'>
			<div class="seccion_auto ancho_fijo_auto">						
				<div class="contenedor ">
					<div id="encabezado_titulo">
						<img src="<?php echo $raiz?>interfaz/iconos/<?php echo $tipo;?>.png">
					</div>
					<table class="ancho_fijo" height="auto" align="top">
						<tr>
							<td class="contenedor" style="margin-top:0px !important;">
								<hr>
								<a id='carga_producto'class="right" href="categoria_contacto.php" style="<?php echo $vista_boton?>"> Administrar Categorias de contacto </a>
								<div class="filtros" >
									<li id="filtros_ordenar">
										<span>Ident.<input type="button" id="id" value="-" ></span>
										<span>Nombre<input type="button" id="nombre" value="-"> </span>
										<span>Email<input type="button" id="email" value="-"></span>
										<span>Asunto<input type="button" id="asunto" value="-"></span>
										<span>Fecha<input type="button" id="creado" value="-"></span>
									</li>
									<input type="hidden" id="campo_ordenar" value=''>
									<input type="hidden" id="asc_desc" value=''>
									<br>				
								</div>	
								<div id='listado_mensajes'></div>		
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="seccion_autoc"></div>
		<div id='pie_de_pagina'>
			<?php include "funciones/general/pie_de_pagina_me.php"; ?>	
		</div>
	</body>
</html>