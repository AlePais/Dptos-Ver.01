<?php
	function pie_de_pagina()
	{
		global $empresa, $redes_sociales, $raiz, $mysqli, $seccion_contacto, $seccion_pie_de_pagina, $url, $fondo_contacto;
?>
<div id="pie_de_pagina" class="seccion_auto" style="background-image:url(interfaz/diseno/fondo_servicios.jpg);"> <!-- Comienzo de Pie de pagina  -->
	<div class="ancho_fijo_auto_pie pie_de_pagina ">
		<?php 	
			$query = "SELECT `nombre`, `email`, `direccion`, `telefono`, `horario`  FROM `usuario` WHERE 1";
			$resultado = $mysqli->query($query);
			$datos = $resultado->fetch_array(MYSQLI_ASSOC);
		?>
		<div class="columna_1 right blanco" >
			<div class="ancho_fijo_auto">
				<div class="columna_4 left">
					<h1>
						<a class="center" href="<?php echo $raiz?>index" >
							<img src="<?php echo $raiz?>interfaz/logo.png" alt="<?php echo $titulo?>" title="<?php echo $titulo?>" ></img>
						</a>
					</h1>
				</div>
				<div class="columna_4 left">
					<li><?php echo $datos['nombre']?> </li>
					<li><?php echo $datos['direccion'] ?></li>
					<li><?php echo $datos['telefono'] ?></li>
					<li><?php echo $datos['horario'] ?></li>
					<li><?php echo $datos['email'] ?></li>
				</div>
				<div class="columna_4 left">
					<LI><a href="<?php echo $raiz;?>index">Inicio - Home</a></li>
					<li><a href="<?php echo $raiz;?>contacto">Cotizaciones</a></LI>
					<li><a href="<?php echo $raiz;?>contacto">Contacto</a></LI>
				</div>
				<div class="columna_4 left">
					<?php echo $seccion_pie_de_pagina?>
				</div>
				<div class="seccion_autoc"></div>
			</div>
			<div class="columna_1 right violeta">
				<div class="ancho_fijo_auto" id="redes_sociales" >
					<?php
						foreach($redes_sociales as $nombre_red=>$datos)
						{
							$icono_red = $raiz."interfaz/iconos/".$datos['icono'];
							$corregido = $datos['corregido'];
							
							$query="SELECT * FROM `general` WHERE `tipo` = 'redes_sociales' AND `identificador_tabla` = 'id' AND `id_elemento` = '1' AND `nombre` LIKE '$corregido'";
							$resultado = $mysqli->query($query);
							if($resultado->num_rows>0)
							{
								$datos_extra = $resultado-> fetch_array(MYSQLI_ASSOC);
								$contenido = $datos_extra['contenido'];
							}
							else
							{
								$contenido='';
							}
					?>
					<a href="http://<?php echo $contenido;?>">
						<img src="<?php echo $icono_red?>" alt="<?php echo $nombre_red;?>"></img>
					</a>
					<?php
						}
					?>
				</div>
			</div>	
		</div>
		<div class="seccion_autoc"></div>
	</div>
	<div class="seccion_autoc"></div><!-- Nivelacion de div  -->
</div>
<div id="desarrollo">
	<center>
		Desarrollado por:  <b> <a href="http://desarrollo-web.mercadoempresa.com"> www.mercadoempresa.com</a></b><img src="http://desarrollo.mercadoempresa.com/interfaz/logo.png">
	</center>
</div>
<!-- Cargas de Fuentes / mejora la velocidad de carga del sitio   -->	
<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">
<?php
	}
?>