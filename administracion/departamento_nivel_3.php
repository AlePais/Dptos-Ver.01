<?php
	include 'funciones/general/funciones_administracion.php';
	// Variables [$_GET $id_elemento-$nombre] [general $tipo-$codigo_unico-$vista_from-$vista_boton-$tipo_consulta(ej n1_tipo)]

	//tipo_consulta es para que pueda leer la fila vacia de la consulta
	$query = "SELECT * FROM `nivel_3` WHERE `n3_id` = '$id_elemento'"; crear_variable($query);
	$titulo = 'Departamento'; $tabla = 'nivel_3';
	$n1_tipo='departamento_nivel_1'; $n2_tipo='departamento_nivel_2'; $n3_tipo='departamento_nivel_3'; $tipo=$n3_tipo;
?>
<html>
	<head>
		<?php include 'funciones/general/cabecera_administracion.php';?>
		<script language="javascript" src="funciones/nivel_3/nivel_3.js"></script>
		<script language="javascript" src="funciones/general/calendario/calendario.js"></script>
		<script src="funciones/general/autocomplete/dist/jquery.easy-autocomplete.min.js" type="text/javascript" ></script>
	</head>
	<body>
		<?php include "funciones/general/encabezado.php";?>	
		<div id='cuerpo'>
			<div class="seccion_auto ancho_fijo_auto">						
				<div class="contenedor ">
					<div id="encabezado_titulo">
						<img src="<?php echo $raiz?>interfaz/iconos/<?php echo $tipo;?>.png">
						<p><?php echo $titulo?>
							<a id='carga_elemento' style="<?php echo $vista_boton?>"> Agregar en <?php echo $titulo?></a>
							<a href="departamento_nivel_2.php"> Ir a Localidad/Departamento</a>
							<a href="departamento_nivel_1.php"> Ir a Zona</a>
						</p>
						<div class="seccion_autoc1"></div>
					</div>
					<div class="seccion_autoc"></div>
					<form method="post" action="funciones/nivel_3/bd_nivel_3.php" style="<?php echo $vista_form?>" id='formulario' name='formulario'>
						<input type='hidden' id='n3_id' name='n3_id' value='<?php echo $id_elemento?>'>
						<input type='hidden' id='n1_tipo' name='n1_tipo' value='<?php echo $n1_tipo?>'>
						<input type='hidden' id='n2_tipo' name='n2_tipo' value='<?php echo $n2_tipo?>'>
						<input type='hidden' id='n3_tipo' name='n3_tipo' value='<?php echo $n3_tipo?>'>
						<input type='hidden' id='n3_orden' name='n3_orden' value='<?php echo $n3_orden?>'>
						<input type='hidden' id='url_origen' name='url_origen' value='<?php echo $archivo_actual?>'>
						<input type='hidden' id='tabla' name='tabla' value='<?php echo $tabla?>'>
						<div class="columna_4 left">
							<div class="formulario_div columna_1">
								<h2>Datos descriptivos</h2>
								<p><span>Categoria</span>
									<select id='n1_id' name='n1_id' required>
										<option value="">Seleccione la Zona</option>
										<?php
											$query="SELECT * FROM `nivel_1` WHERE `n1_tipo` = '$n1_tipo'";
											$resultado = $mysqli->query($query);
											while($lista = $resultado->fetch_array(MYSQLI_ASSOC))
											{
											$id = $lista['n1_id']; $nombre = $lista['n1_nombre'];
											$seleccionado ='';
											if($id == $n1_id){$seleccionado='selected';}
										?>
										<option value="<?php echo $id?>" <?php echo $seleccionado?>> <?php echo $nombre?> </option>
										<?php
											}
										?>
									</select>
								</p>
								<p>
									<span>Localidad/Departamento</span>
									<select id='n2_id' name='n2_id' required>
										<option value="">Seleccione la Localidad/Departamento</option>
										<?php
											if($n2_id!=0)
											{
												$query="SELECT * FROM `nivel_2` WHERE `n1_id` = '$n1_id' AND `n2_tipo` = '$n2_tipo'";
												$resultado = $mysqli->query($query);
												while($lista = $resultado->fetch_array(MYSQLI_ASSOC))
												{
													$id = $lista['n2_id']; $nombre = $lista['n2_nombre'];
													$seleccionado ='';
													if($id == $n2_id){$seleccionado='selected';}
										?>
										<option value="<?php echo $id?>" <?php echo $seleccionado?>> <?php echo $nombre?> </option>
										<?php
												}
											}
										?>
									</select>
								</p>
								<p>
									<span>Nombre</span><input type='text' id='n3_nombre' name='n3_nombre' value='<?php echo $n3_nombre?>' required>
								</p>
								<div class="seccion_autoc"></div>
							</div>
						</div>
						<div class="columna_v745  right" style="margin:1%;">
							<div style="width:auto; height:auto; min-height:500px;">
								<textarea id='n3_descripcion' name='n3_descripcion'><?php echo $n3_descripcion?></textarea>
							</div>
						</div>	
						<div class="seccion_autoc"></div>
						<div class="formulario_div columna_1">
							<div class="columna_4 left">
								<h2>Informacion adicional</h2>
								<?php
									foreach($departamento as $nombre_dato=>$datos)
									{
										$corregido = $datos['corregido'];
										$tipo_input = $datos['tipo'];
										
										$query="SELECT * FROM `general` WHERE `tipo` = 'extra_departamento' AND `identificador_tabla` = 'n3_id' AND `id_elemento` = '$id_elemento' AND `nombre` LIKE '$corregido'";
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
								<p>
									<span><?php echo $nombre_dato?></span>
									<input type='<?php echo $tipo_input?>' id='<?php echo $corregido?>' name='<?php echo $corregido?>' value='<?php echo $contenido?>'>
								</p>
								<?php
										if($corregido=='tipo_alojamiento')
										{
										?>
											<script>
												var options =
												{
													url: "funciones/general/autocomplete/lista/lista_tipos_alojamiento.php",
													getValue: "name",
													list:
													{
														match:
														{
															enabled: true
														}
													}
												};
												$("#<?php echo $corregido?>").easyAutocomplete(options);
											</script>
										<?php
										}
									}
								?>
								<div class="seccion_autoc"></div>
							</div>
							<div class="columna_v745  right" style="margin:1%;">
								<div class="columna_1 LEFT formulario_div">
									<div class="columna_1 left">
										<h3 class="columna_3 left">IMAGEN/GALERIA</h3>
										<b>(si agrega mas de un elemento se mostrara como galeria de imagenes)</b>
									</div>
									<div id="imagenes" class="right columna_1"></div>
									<div class="seccion_autoc"></div>						
								</div>
								<div class="columna_1 LEFT formulario_div">
									<div class="columna_1 left">
										<h3 class="columna_3 left">Archivos adjuntos</h3>
									</div>
									<div id="adjuntos" class="right columna_1"></div>
									<div class="seccion_autoc"></div>		
								</div>
								<div class="seccion_autoc"></div>
							</div>
							<div class="seccion_autoc"></div>
							<div class="formulario_div columna_4 left " id="reserva">
							</div>
							
							<div class="columna_v745  right" style="margin:1%;">
								<div id="calendario">
									<script>
										$( document ).ready(function(){cargar_datos(<?php echo date("n")?>,2018,<?php echo $id_elemento?>);});
									</script>
								</div>
							</div>
							<div class="seccion_autoc"></div>
							<div class="formulario_div columna_4 left ">
								<script>
									$( document ).ready(function(){cargar_descuentos_dias(<?php echo $n3_id?>)});
								</script>
								<h2>DESCUENTOS POR DIAS</h2>
								<p>si numero de dias es mayor o igual a:</p>
								
								<span>Numero de dias</span>
								<input type="number" id="dias" name="dias">
								<span>Descuento[%]</span>
								<input type="number" id="descuento_dias" name="descuento_dias">
								<div class="boton_agregar2"  onClick="agrega_descuento_dias()">Agregar descuento +</div>
								<div id="descuentos_dias"></div>
								<div class="seccion_autoc"></div>
							</div>
							<div class="formulario_div columna_4 left">
								<script>
									$( document ).ready(function(){cargar_descuentos_personas(<?php echo $n3_id?>)});
								</script>
								<h2>DESCUENTOS POR personas</h2>
								<p>si cantidad de personas es mayor o igual a:</p>
								
								<span>Numero de personas</span>
								<input type="number" id="personas" name="personas">
								<span>Descuento[%]</span>
								<input type="number" id="descuento_personas" name="descuento_personas">
								<div class="boton_agregar2" onClick="agrega_descuento_personas()">Agregar descuento +</div>
								<div id="descuentos_personas"></div>
								<div class="seccion_autoc"></div>
							</div>
							<div class="formulario_div columna_4 left ">
								<h2>Adicionales por departamento</h2>
								<p>si cantidad de personas es mayor o igual a:</p>
								<?php
									$menu='';//para titulo
									foreach($adicional_departamento as $nombre_dato=>$datos)
									{
										$corregido = $datos['corregido'];

										$estado_opc_1=''; $estado_opc_2=''; $estado_opc_3=''; $unidad_opc_1=''; $unidad_opc_2=''; $unidad_opc_3='';$valor=0;$visualizacion='';
										$query="SELECT * FROM `adicional_departamento` WHERE `departamento_asociado` = '$id_elemento' AND `nombre` LIKE '$corregido'";
										$resultado = $mysqli->query($query);
										if($resultado->num_rows>0)
										{
											$datos_extra = $resultado-> fetch_array(MYSQLI_ASSOC);
											
											switch($datos_extra['estado'])
											{
												case 1:
													$estado_opc_1='selected';
													$visualizacion = 'disabled';
													break;
												case 2:
													$estado_opc_2='selected';
													break;
												case 3:
													$estado_opc_3='selected';
													$visualizacion = 'disabled';
													break;
											}
											switch($datos_extra['unidad'])
											{
												case 1:
													$unidad_opc_1='selected';
													break;
												case 2:
													$unidad_opc_2='selected';
													break;
												case 3:
													$unidad_opc_3='selected';
													break;
											}
											$valor = $datos_extra['valor'];
										}

										switch($datos['tipo'])
										{
											case 'select':
												$campo_1 = "<select id='".$corregido."_estado' name='".$corregido."_estado' onChange='cambia_select(this.id)' >";
												$campo_1 = $campo_1."<option value='1' $estado_opc_1>si, gratis</option>";
												$campo_1 = $campo_1."<option value='2' $estado_opc_2>si, pago</option>";
												$campo_1 = $campo_1."<option value='3' $estado_opc_3>no</option>";
												$campo_1 = $campo_1."</select>";
												$campo_2 = "<select id='".$corregido."_unidad' name='".$corregido."_unidad' $visualizacion>";
												$campo_2 = $campo_2."<option value='1' $unidad_opc_1>%</option>";
												$campo_2 = $campo_2."<option value='2' $unidad_opc_2>U\$S</option>";
												$campo_2 = $campo_2."<option value='3' $unidad_opc_3>$</option>";
												$campo_2 = $campo_2."</select>";
												$campo_3 = "<input type='number' id='".$corregido."_valor' name='".$corregido."_valor' value='$valor' $visualizacion>";
												break;
											// case 'text' || 'number':
												// $campo_1 = "<input type='".$datos['tipo']."' id='".$corregido."' name='".$corregido." value='".$contenido."'>";
												// break;
										}
								?>
								<p>
									<span><?php echo $nombre_dato?></span>
									<?php echo $campo_1.$campo_2.$campo_3;?>
								</p>
								<?php
									}
								?>								
							</div>
							
							<div class="seccion_autoc"></div>
							<center>
								<input type='submit' id='cargar' value='Guardar'>
							</center>
						</div>
					</form>
					<div>
						<?php listado_elementos('n3_tipo', $n3_tipo, 'n3_orden', 'n3_id', 'n3_nombre', 'n3_corregido');?>
					</div>
				</div>
			</div>
		</div>
		<div class="seccion_autoc"></div>
		<div id='pie_de_pagina'>
			<?php include "funciones/general/pie_de_pagina_me.php"; ?>	
		</div>
	</body>
</html>
<form id="parametros_imagenes">
	<input type='hidden' id='parametros' name='parametros' value='parametros_imagenes'>
	<input type='hidden' id='codigo_unico' name='codigo_unico' value='imagen_<?php echo $codigo_unico?>'>
	<input type='hidden' id='tabla' name='tabla' value='archivo'><!--la tabla en la que guardo datos de archivo/imagen-->
	<input type='hidden' id='tabla_asociada' name='tabla_asociada' value='nivel_3'><!--//tabla del elemento al que le pertenece el archivo/imagen-->
	<input type='hidden' id='id_elemento' name='id_elemento' value='<?php echo $id_elemento?>'><!--//id del elemento de la tabla_asociada-->
	<input type='hidden' id='titulo' name='titulo' value=''><!--Titulo de fieldset donde se encuentra formulario de carga de archivo-->
	<input type='hidden' id='categoria' name='categoria' value='imagenes'><!--Titulo de fieldset donde se encuentra formulario de carga de archivo-->
	<input type='hidden' id='tipo' name='tipo' value='imagen'><!--Tipo elemento que se carga (imagen, archivo, icono)-->
	<input type='hidden' id='adm_nombre' name='adm_nombre' value='0'> <!-- admite campo (input type:text) nombre 0=no, 1=si -->
	<input type='hidden' id='adm_descripcion' name='adm_descripcion' value='0'> <!--admite campo (textarea) descripcion 0=no, 1=si -->
	<input type='hidden' id='cantidad' name='cantidad' value='multiple'> <!-- multiple o simple -->
	<input type='hidden' id='etiqueta' name='etiqueta' value='Agregar imagenes a la seccion'> <!--Texto que aparecera en el boton de subir archivo-->
	<input type='hidden' id='tipo_miniatura' name='tipo_miniatura' value='imagen'> <!--Tipo de miniatura imagen/icono_archivo-->
	<script>
		$( document ).ready(function(){formulario_carga('imagenes', 'parametros_imagenes')});//primer parametro, el div donde se mete el formulario, el segundo es el id de el form donde estan los parametros
	</script>
</form>
<form id="parametros_adjunto">
	<input type='hidden' id='parametros' name='parametros' value='parametros_adjunto'>
	<input type='hidden' id='codigo_unico' name='codigo_unico' value='archivo_<?php echo $codigo_unico?>'>
	<input type='hidden' id='tabla' name='tabla' value='archivo'><!--la tabla en la que guardo datos de archivo/imagen-->
	<input type='hidden' id='tabla_asociada' name='tabla_asociada' value='nivel_3'><!--//tabla del elemento al que le pertenece el archivo/imagen-->
	<input type='hidden' id='id_elemento' name='id_elemento' value='<?php echo $id_elemento?>'><!--//id del elemento de la tabla_asociada-->
	<input type='hidden' id='titulo' name='titulo' value=''><!--Titulo de fieldset donde se encuentra formulario de carga de archivo-->
	<input type='hidden' id='categoria' name='categoria' value='archivos'><!--Titulo de fieldset donde se encuentra formulario de carga de archivo-->
	<input type='hidden' id='tipo' name='tipo' value='archivo'><!--Tipo elemento que se carga (imagen, archivo, icono)-->
	<input type='hidden' id='adm_nombre' name='adm_nombre' value='0'> <!-- admite campo (input type:text) nombre 0=no, 1=si -->
	<input type='hidden' id='adm_descripcion' name='adm_descripcion' value='0'> <!--admite campo (textarea) descripcion 0=no, 1=si -->
	<input type='hidden' id='cantidad' name='cantidad' value='multiple'> <!-- multiple o simple -->
	<input type='hidden' id='etiqueta' name='etiqueta' value='Agregar archivo al departamento'> <!--Texto que aparecera en el boton de subir archivo-->
	<input type='hidden' id='tipo_miniatura' name='tipo_miniatura' value='icono_archivo'> <!--Tipo de miniatura imagen/icono_archivo-->
	<script>
		$( document ).ready(function(){formulario_carga('adjuntos', 'parametros_adjunto')});//primer parametro, el div donde se mete el formulario, el segundo es el id de el form donde estan los parametros
	</script>
</form>