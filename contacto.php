<?php
	//Incluyo funciones generales del sitio
	include 'funciones/general/conexion.php'; include 'funciones/general/cabecera.php'; include 'funciones/general/pie_de_pagina.php';
?>
<html>
	<head>
		<?php cabecera()?>
	</head>
	<body> 
		<!--Bloque cuerpo -->
		<div id="popup" style="display: none;" onclick="cerrar_popup();">
		</div>
		<div id="contenedor" style="" class="gris_claro"">
			<!-- bloque de encabezado-->
			<?php
				include 'funciones/general/encabezado.php';
				$query1 = "SELECT * FROM `pagina_seccion` NATURAL JOIN `seccion` WHERE `id_pagina` = (SELECT `id_pagina` FROM `pagina` WHERE corregido_pagina LIKE '$archivo_actual') ORDER BY pagina_seccion.orden ASC";
				$resultado1=$mysqli->query($query1);
				while($secciones  = $resultado1->fetch_array(MYSQLI_ASSOC))
				{
					$id_seccion=$secciones['id_seccion']; $nombre_seccion=$secciones['nombre_seccion']; $titulo_seccion=$secciones['titulo_seccion']; $corregido_seccion=$secciones['corregido_seccion']; $contenido = $secciones['contenido']; $fondo_tipo = $secciones['fondo_tipo'];$secciones['fondo_rgba']; $id_diseño = $secciones['id_diseño']; $columna1_posicion = $secciones['columna1_posicion']; $columna1_ancho = $secciones['columna1_ancho']; $columna2_posicion = $secciones['columna2_posicion']; $columna2_ancho = $secciones['columna2_ancho'];
						
					if ($columna2_ancho==100 OR $columna1_ancho==100 )
					{
						$columna2_ancho = $columna2_ancho; $columna1_ancho = $columna1_ancho;
					}
					else
					{
						$columna2_ancho = $columna2_ancho-1; $columna1_ancho = $columna1_ancho-1;
					}
						
					if($fondo_tipo == 'imagen')
					{
						$fondo_valor = $secciones['fondo_valor'];
						$query2 = "SELECT * FROM `archivo` WHERE `id_archivo`='$fondo_valor' AND `categoria` LIKE 'fondo'";
						$resultado2 = $mysqli->query($query2);
						$datos_imagen = $resultado2->fetch_array(MYSQLI_ASSOC);
						$url = $raiz.$datos_imagen['carpeta'].$datos_imagen['archivo']; 
						$fondo = "background-image:url($url)";
					}
					else
					{
						$fondo_valor = $secciones['fondo_valor'];
						$fondo = "background-color: $fondo_valor";
					}

					if($columna1_ancho==0)
					{
						$columna1="display:none;";
					}
					else
					{
						$columna1="width:$columna1_ancho%;";
					}
			?>
			<a class="ancla" name="<?php echo $nombre_seccion?>" id="<?php echo $nombre_seccion?>"></a>
			<?php
				$galeria_class ="galeria_sin_descripcion";
				$galeria_parametros ="";
				$clase2="ancho_fijo_auto";
				$id_oculto = '';
				$funcion_mostrar = '';
				$height_div='';
				$formulario=0;

				switch($id_diseño)
				{
					case 1:
						$clase1="diseno_1  seccion_auto";
						$clase2="";
						$galeria_class ="galeria_principal";
						//$galeria_animacion="animated bounceInDown";
						//$id_animacionjava ="id_java-anima".$id_seccion;
						//$animacionjava = "onclick='$id_animacionjava.style.height=500px;'";
						break;
					case 2:
						$clase1="diseno_2 seccion_auto";
						$clase2="ancho_fijo_auto";
						$galeria_class ="galeria_sin_descripcion";
						$galeria_parametros ="slidesToShow: 8, autoplay: true, autoplaySpeed: 2000, dots: false, arrows: false,  slidesToScroll:8, "; 
						break;
					case 3:
						$clase1="diseno_3 seccion_auto ";							
						$galeria_class ="galeria_principal";
						$galeria_animacion="animated bounceInDown";
						break;
					case 4:
						$clase1="diseno_4 seccion_auto ";
						$galeria_parametros ="slidesToShow: 4, dots: false, slidesToScroll:1, rows:2,"; 
						$galeria_class ="galeria_clientes";
						break;
					case 5:
						$clase1="diseno_5 seccion_auto";
						$galeria_class ="galeria_sin_descripcion";
						$galeria_parametros ="slidesToShow: 4, dots: false, slidesToScroll:1, rows:1,"; 
						break;
					case 6:
						$clase1="diseno_5 seccion_auto";
						$clase2="";
						$galeria_class ="galeria_sin_descripcion";
						$galeria_parametros ="slidesToShow: 8, autoplay: true, autoplaySpeed: 2000, dots: false, arrows: false,  slidesToScroll:8, "; 
						$galeria_class ="galeria_sin_descripcion";

						break;
					case 7:
						$clase1="diseno_7 seccion_auto";
						$clase2="ancho_fijo_auto";
						$galeria_class ="galeria_team";
						$galeria_parametros ="slidesToShow: 4, dots: false, slidesToScroll:1, rows:1,"; 
						$formulario=1;
						break;
					case 8:
						$clase1="diseno_8 seccion_auto";
						$clase2="";
						$galeria_class ="galeria_sin_descripcion";
						$galeria_parametros ="slidesToShow: 5, dots: false, slidesToScroll: 1, ";
						break;	
					case 9:
						$clase1="seccion_auto";
						$galeria_parametros ="slidesToShow: 3, slidesToScroll: 3, dots: false,  autoplay: true,  autoplaySpeed: 2000,";
						$galeria_class ="galeria_clientes";
						break;	
					case 10:
						$clase1="diseno_18 seccion_auto";
						$clase2="";
						$galeria_class ="galeria_sin_descripcion";
						$galeria_parametros ="slidesToShow: 5, dots: false, slidesToScroll: 1, ";
						break;	
					case 11:
						$clase1="diseno_15 seccion_auto";
						$galeria_class ="galeria_sin_descripcion";
						break;	
				}
			?>
			<div class="<?php echo $clase1?>" style="<?php echo $fondo?>; background-color:<?php echo $secciones['fondo_rgba'];?>">
				<div class="<?php echo $clase2?>">
					<div class="titulo" onclick="<?php echo $funcion_mostrar?>">
						<?php
							if($titulo_seccion!='')
							{
						?>
						<h1><?php echo $titulo_seccion;?></h1><hr></hr>
						<div class="seccion_autoc"></div>
						<?php
							}
						?>
					</div>
					<div id="<?php echo $id_oculto?>" class="<?php echo $columna1_posicion?>" style="<?php echo $columna1 ?>">
						<?php
							if($formulario==1)
							{
								include 'funciones/general/formulario_contacto_div.php';
						?>
						<script type="text/javascript">
							$(document).ready(function(){
							$("#formulario_contacto").submit(function(e){
							//---------------^---------------
							e.preventDefault();
								$.ajax({
									type: "POST",
									url: "<?php echo $raiz?>funciones/contacto/bd_contacto.php",
									data: $("#formulario_contacto").serialize(), // Adjuntar los campos del formulario enviado.
									success: function(respuesta)
									{
										$("#formulario_contacto")[0].reset();
										alert(respuesta);
									}
								 });
								});
							});
						</script>
						<?php
							}
						?>
						<span class="animated" ><?php echo $contenido;?></span>
						<div class="seccion_autoc"></div>
					</div>
					<?php
						$query = "SELECT * FROM `archivo` WHERE `identificador_tabla` LIKE 'id_seccion' AND `id_elemento` LIKE '$id_seccion' AND `tipo` = 'imagen' AND `categoria` = 'imagenes' AND `nombre` = '' ORDER BY `orden`";
						$resultado=$mysqli->query($query);
						if($resultado->num_rows==1)
						{
							$imagen=$resultado->fetch_array(MYSQLI_ASSOC);
							$url_imagen = $raiz.$imagen['carpeta'].$imagen['archivo'];
					?>
					<div class="<?php echo $columna2_posicion?> min-height_galeria" STYLE=" background-image:url(<?php echo $url_imagen;?>); width:<?php echo $columna2_ancho?>%"></div>
					<?php
						}
						if($resultado->num_rows>1)
						{
					?>
					<div id="galeria_<?php echo $id_seccion?>" class="galeria " style="width: <?php echo $columna2_ancho?>%">
						<?php
							$query ="SELECT * FROM `archivo` WHERE `identificador_tabla` LIKE 'id_seccion' AND `id_elemento` = '$id_seccion' AND `categoria` LIKE 'imagenes' ORDER BY `orden` ASC";
							$resultado=$mysqli->query($query);
							while($galeria = $resultado->fetch_array(MYSQLI_ASSOC))
							{
								$url = $raiz.$galeria['carpeta'].$galeria['archivo'];
						?>
						<div class="<?php echo $galeria_class?>" > <!-- Imprimo funcion para mostrar en pop up-->
							<img data-lazy="<?php echo $url?>" onclick="
							<?php if($id_seccion==22 OR $id_seccion==23 )
							{					
								echo "muestra_popup('".$url."')";
							}?>">
						</div>
						<?php
							}
						?>
					</div>
					<script type="text/javascript">
						$(document).ready(function(){
						  $('#galeria_<?php echo $id_seccion?>').slick({
								dots: true,
								slidesToShow: 1,
								<?php echo $galeria_parametros;?>
						  });
						});
					</script>
					<?php
						}
					?>
					<span class="seccion_autoc"></span>
					<?php
						$query = "SELECT * FROM `archivo` WHERE `identificador_tabla` LIKE 'id_seccion' AND `id_elemento` = '$id_seccion' AND `categoria` = 'lista' ORDER BY `orden`";
						$resultado=$mysqli->query($query);
						if($resultado->num_rows>0)
						{
					?>		
					<div id="lista_<?php echo $id_seccion?>" class="galeria " style="width: <?php echo $columna2_ancho?>%">
						<?php
							$i=1;
							while($extras=$resultado->fetch_array(MYSQLI_ASSOC))
							{
								$imagen_extra=$raiz.$extras['carpeta'].$extras['archivo'];
								$nombre=$extras['nombre'];
								$descripcion=$extras['descripcion'];
								$color_texto='';
								if($i==1 && $id_seccion == 17)
								{
									$color_texto = "color: rgb(3,73,145) !important;";
								}
						?>
						<div class="<?php echo $galeria_class;?>" >
							<img data-lazy="<?php echo $imagen_extra;?>">
							<span class="<?php echo $galeria_animacion?>" > 
								<h3 style="<?php echo $color_texto?>"><?php echo $extras['nombre'];?></h3>
								<p><?php echo $extras['descripcion'];?> </p>									
							</span> 
						</div>
						<?php
								$i=2;
							}
						?>
					</div>
					<script type="text/javascript">
						$(document).ready(function(){$('#lista_<?php echo $id_seccion?>').slick({<?php echo $galeria_parametros;?>});});
					</script>
					<?php
						}
					?>

					<span class="seccion_autoc"></span>
				</div>
						<span class="seccion_autoc"></span>	

			</div>
			<script> <!-- oculto animacion !-->
				$(document).ready(function(){
						$("#contenedor").scroll(function() 
						{
							$('#<?php echo $nombre_seccion."anima";?>').each(function()
							{
							var imagePos = $(this).offset().top;
							var topOfWindow = $(window).scrollTop();
							if (imagePos < topOfWindow+400) 
								{
								$(this).addclass("");
								}
							});
						});
					});
			</script>
			<?php
				}
			?>
			<?php  pie_de_pagina()?>
		</div>
		<span class="seccion_autoc"></span>	
	</body>
	<span class="seccion_autoc"></span>
</html>