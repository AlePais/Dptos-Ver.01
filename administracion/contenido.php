<?php
	include 'funciones/general/funciones_administracion.php';
	// Variables [$_GET $id_elemento-$nombre] [general $tipo-$codigo_unico-$vista_from-$vista_boton-$tipo_consulta(ej n1_tipo)]
	
	//tipo_consulta es para que pueda leer la fila vacia de la consulta
	$titulo = 'Contenido';	$tabla = 'contenido';
	// $query = "SELECT * FROM `contenido` WHERE `id` = '$id_elemento'";
	// crear_variable($query);
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
						<div class="bienvenida columna_1 seccion_auto">
							<div class="columna_2 fila_1 left">
								<h1>!Bienvenido $nombre, Gracias por ingresar!</h1>
								<p>Te presentamos la nueva plataforma de administracion de tu sitio web.
								<p> Mejoramos la navegacion, presencia y agregamos nuevas herramientas administrativas y publicitarias.
								<P> Dejamos que navegues por tu plataforma e investigues un poco
								<p> Mira el nuevo video introductorio para entender mejor la plataforma							
								
							</div>
							<div class="columna_2 left">
							<iframe style="margin:10%;" width="80%" height="480" src="https://www.youtube.com/embed/K_HDj3nctus" frameborder="0" allowfullscreen></iframe>
							</div>
						
						</div>
						<div id="encabezado_titulo">
							<img src="<?php echo $raiz?>administracion/interfaz/iconos/<?php echo $tipo;?>.png">
							<p><?php echo $titulo?>
							<a id='carga_elemento' style="<?php echo $vista_boton?>"> Agregar en <?php echo $titulo?></a>	</p>												
						</div>
						
						<div class="e-panel" style="background-image:url(<?php echo $raiz?>administracion/interfaz/fondo/productos.jpg)" onclick="location.href='<?php echo $raiz.$n1_corregido."/".$n2_corregido."/".$corregido?>'" >
							<div class="productos" style="background-image:url(<?php echo $raiz?>administracion/interfaz/iconos/am_pagina.png)" ></div>
							<span> 
								PRODUCTOS
							</span>
						</div>
						<div class="e-panel" style="background-image:url(<?php echo $raiz?>administracion/interfaz/fondo/servicios.jpg)" onclick="location.href='<?php echo $raiz.$n1_corregido."/".$n2_corregido."/".$corregido?>'" >
							<div class="servicios" style="background-image:url(<?php echo $raiz?>administracion/interfaz/iconos/am_articulos.png)" ></div>
							<span> 
								SERVICIOS
							</span>
						</div>
						<div class="e-panel" style="background-image:url(<?php echo $raiz?>administracion/interfaz/fondo/articulos.jpg)" onclick="location.href='<?php echo $raiz.$n1_corregido."/".$n2_corregido."/".$corregido?>'" >
							<div class="articulos" style="background-image:url(<?php echo $raiz?>administracion/interfaz/iconos/am_correo.png)" ></div>
							<span> 
								ARTICULOS
							</span>
						</div>
						<div class="e-panel" style="background-image:url(<?php echo $raiz?>administracion/interfaz/fondo/productos.jpg)" onclick="location.href='<?php echo $raiz.$n1_corregido."/".$n2_corregido."/".$corregido?>'" >
							<div class="productos" style="background-image:url(<?php echo $raiz?>administracion/interfaz/iconos/am_pagina.png)" ></div>
							<span> 
								PRODUCTOS
							</span>
						</div>
						<div class="e-panel" style="background-image:url(<?php echo $raiz?>administracion/interfaz/fondo/servicios.jpg)" onclick="location.href='<?php echo $raiz.$n1_corregido."/".$n2_corregido."/".$corregido?>'" >
							<div class="servicios" style="background-image:url(<?php echo $raiz?>administracion/interfaz/iconos/am_articulos.png)" ></div>
							<span> 
								SERVICIOS
							</span>
						</div>
						<div class="e-panel" style="background-image:url(<?php echo $raiz?>administracion/interfaz/fondo/articulos.jpg)" onclick="location.href='<?php echo $raiz.$n1_corregido."/".$n2_corregido."/".$corregido?>'" >
							<div class="articulos" style="background-image:url(<?php echo $raiz?>administracion/interfaz/iconos/am_correo.png)" ></div>
							<span> 
								ARTICULOS
							</span>
						</div>
					
						<div class="seccion_autoc"></div>
					</div>
				</div>
	<div class="seccion_autoc"></div>				
				<div id='pie_de_pagina'>
					<?php include "general/pie_de_pagina_me.php"; ?>	
				</div>
			</div>

	</body>
</html>
<link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:100" rel="stylesheet">
