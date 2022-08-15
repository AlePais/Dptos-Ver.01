<?php
	//Incluyo funciones generales del sitio
	include 'funciones/general/conexion.php'; include 'funciones/general/crea_variables.php'; include 'funciones/general/cabecera.php';	include 'funciones/general/pie_de_pagina.php';

	$n3_corregido = $_GET['n3_corregido'];

	$query = "SELECT * FROM nivel_3 WHERE nivel_3.n3_corregido LIKE '$n3_corregido'";
	crear_variable($query);

	$id_representante = 0;
	$query="SELECT * FROM `agenda_representantes_relaciones` WHERE `n3_id`='$n3_id'";
	$resultado = $mysqli->query($query);
	if($resultado->num_rows==1)
	{
		$datos_relacion = $resultado->fetch_array(MYSQLI_ASSOC);
		$id_representante = $datos_relacion['id_agenda_representantes'];
	}

	$query = "SELECT * FROM `general` WHERE `identificador_tabla` LIKE 'n3_id' AND `id_elemento` = '$n3_id'";
	$resultado = $mysqli->query($query);
	while($otros_datos = $resultado->fetch_array(MYSQLI_ASSOC))
	{
		$nombre_campo = $otros_datos['nombre'];
		$extras[$nombre_campo] = $otros_datos['contenido'];
	}
	
	if(!isset($extras['min_huespedes']) || $extras['min_huespedes']==0)
	{
		$extras['min_huespedes']=1;
	}
	if(!isset($extras['max_huespedes']) || $extras['max_huespedes']==0)
	{
		$extras['max_huespedes']='';
	}
?>
<html>
	<head>
		<?php cabecera()?>
		<script language="javascript" src="<?php echo $raiz?>funciones/reservar/calendario/calendario.js"></script>
		<script language="javascript" src="<?php echo $raiz?>funciones/reservar/reserva.js"></script>
	</head>
	<body>
		<!-- bloque de encabezado-->
		<?php include 'funciones/general/encabezado.php';?>

		<!--Bloque cuerpo -->
		<div id="contenedor" class="GRIS_CLARO" >
			<div class="seccion_auto margin_principal" >
				<form enctype='multipart/form-data' method='post' id="formulario_reserva" action='<?php echo $raiz?>funciones/reservar/db_reserva.php'>	
					<div class="ancho_fijo_auto">
						<div class="topcorner formulario_compra blanco">
							<div id="galeria_1" class="galeria " style="width:100%;">
								<?php
									$query ="SELECT * FROM `archivo` WHERE `tipo` LIKE 'imagen' AND  `tabla_asociada` LIKE 'nivel_3' AND `id_elemento` = '$n3_id' ORDER BY `orden`";
									$resultado=$mysqli->query($query);
									while($galeria = $resultado->fetch_array(MYSQLI_ASSOC))
									{
										$ubicacion_imagen = $raiz.$galeria['carpeta'].$galeria['archivo'];
								?>
									<div>
										<img data-lazy="<?php echo $ubicacion_imagen?>" >
									</div>
								<?php
									}
								?>
							</div>
							<script type="text/javascript">
								$(document).ready(function(){
								  $('#galeria_1').slick({
										dots: true,
										slidesToShow: 1,
										autoplay:true,	
										autoplaySpeed:3000,
										arrows:false
									 });
								});
							</script>
							<span>
								<p>Dia y horario de check-in (12hs)</p>
								<input type="date" name="in_fecha" id="in_fecha" onChange="marcarFecha(this.value)" required></p>
								<p>Dia y horario de check-out (10hs)</p>
								<input type="date" name="out_fecha" id="out_fecha" onChange="marcarFecha(this.value)" required></p>
							</span>
							<span>
								<div class="seccion_autoc"></div>
								<h1>U$S<div id="precio">0 <p>Complete datos necesarios para obtener cotizacion</p></div></h1>
								<label>
									<input type="checkbox" id="cbox1" value="first_checkbox" required> Acepto Terminos y Condiciones	
								</label>
								<br>
								<input type="submit" value="Solicitar Reserva">
							</span>
							<div class="seccion_autoc"></div>
						</div>
					</div>
					<div class="columna_1a margin-top_f10">
						<div class="ancho_fijo_auto">
							<div class="formulario_compra center_relat seccion_auto blanco" >
								<center>
									<h2>¡Ya Falta Poco! hace tu Reservar para <input style="width:auto !important; margin:0px;" type="number" placeholder="Cant. personas" id="cant_huespedes" name="cant_huespedes" min="<?php echo $extras['min_huespedes']?>" max="<?php echo $extras['max_huespedes']?>" onChange="CalculoPrecio()"  value='1' required> </input>personas</h2>
								</center>
								<div class="seccion_autoc"></div>
								<div class="left columna_2 ">
									<div class="columna_1 left">
										<h3>Completa tus datos</h3>	
										<input type='hidden' id='precio_calculado' name='precio_calculado' required></input>
										<input type='hidden' id='pagina_origen' name='pagina_origen' value='<?php echo $url?>'></input>
										<input type="hidden" id="id_departamento" name="id_departamento" value="<?php echo $n3_id?>"> </input>
										<input type="hidden" id="id_representante" name="id_representante" value="<?php echo $id_representante?>"> </input>
										<input type="text" placeholder="Nombre" id="nombre" name="nombre" required> </input>
										<input type="text" placeholder="Apellido" id="apellido" name="apellido" required> </input>
										<input type="text" placeholder="Telefono" id="telefono" name="telefono" required> </input>
										<input type="email" placeholder="Email" id="email_usuario" name="email_usuario" required> </input>
										
										<div class="seccion_autoc"></div>
									</div>
									<div class="seccion_autoc"></div>
									<div class="columna_1 left">
										<h3 class="onclick" onclick="estado(consulta)">Datos extras</h3>	
										<textarea name="consulta" class="extra" id="consulta" placeholder="Complete si tiene informacion importante para agregar" ></textarea>
										<div class="seccion_autoc"></div>
										<div class="columna_1 botones_compra columna_a">
											<h3 class="onclick" onclick="estado(extra)">Seleccione servicios extra</h3>
											<ul id="extra"; class="extra";>
												<?php
													foreach($adicional_departamento as $nombre_dato=>$datos)
													{
														$corregido = $datos['corregido'];

														$query="SELECT * FROM `adicional_departamento` WHERE `departamento_asociado` = '$n3_id' AND `nombre` LIKE '$corregido' AND `estado` != 3";
														$resultado = $mysqli->query($query);
														if($resultado->num_rows>0)
														{
															$datos_extra = $resultado-> fetch_array(MYSQLI_ASSOC);
															$id_adicional = $datos_extra['id'];
															$nombre = $datos_extra['nombre'];
															
															if($datos_extra['estado']==1 || $datos_extra['valor']==0)	
															{
																$precio = "<b>gratis</b>";
															}
															else
															{
																switch($datos_extra['unidad'])
																{
																	case 1:
																		$unidad='%';
																		break;
																	case 2:
																		$unidad='U$S';
																		break;
																	case 3:
																		$unidad='$';
																		break;
																}
																$precio = "adicional de: ".$unidad.$datos_extra['valor'];
															}
														}
												?>
												<li>
													<input type="checkbox" onChange="CalculoPrecio()" name="<?php echo $corregido;?>" id=<?php echo $corregido;?> value="<?php echo $id_adicional?>">
													<label><?php echo $corregido;?><?php echo $precio;?></label>
												</li>
												<?php
													}
												?>
											</ul>
											<div class="seccion_autoc"></div>
										</div>
										<div class="seccion_autoc"></div>
										<div  class="botones_compra columna_a">
											<h3 class="onclick" onclick="estado(metodos_pagos)">Seleccion de metodo de pago</h3>
											<ul id="metodos_pagos" class="metodos_pagos bouncein">
												<?php
													if($id_representante!=0)
													{
														$query = "SELECT * FROM `general` WHERE `tabla_asociada` LIKE 'agenda_representantes' AND `id_elemento` LIKE '$id_representante'";
														$resultado = $mysqli->query($query);
														while($datos_representante = $resultado->fetch_array(MYSQLI_ASSOC))
														{
															$indice = $datos_representante['nombre'];
															$medios_pago[$indice] = $datos_representante['contenido'];
														}

														if(array_key_exists('client_id_mercadopago', $medios_pago) && array_key_exists('client_secret_mercadopago', $medios_pago))
														{
															if($medios_pago['client_id_mercadopago']!='' && $medios_pago['client_secret_mercadopago']!='')
															{
												?>
												<li>
													<input type="radio" id="f-option" name="medio_pago" value="mercadopago"></input>
													<label for="f-option">Mercado Pago</label>    
													<div class="check"></div>
												</li>
												<?php
															}
														}
														if(array_key_exists('nro_comercio_todo_pago', $medios_pago) && array_key_exists('credencial_todo_pago', $medios_pago))
														{
															if($medios_pago['nro_comercio_todo_pago']!='' && $medios_pago['credencial_todo_pago']!='')
															{
												?>
												<li>
													<input type="radio" id="g-option" name="medio_pago" value="todo_pago"></input>
													<label for="g-option">Todo Pago</label>    
													<div class="check"></div>
												</li>
												<?php
															}
														}
														if(array_key_exists('client_id_paypal', $medios_pago) && array_key_exists('client_secret_paypal', $medios_pago))
														{
															if($medios_pago['client_id_paypal']!='' && $medios_pago['client_secret_paypal']!='')
															{
												?>
												<li>
													<input type="radio" id="h-option" name="medio_pago" value="paypal"></input>
													<label for="h-option">PayPal</label>    
													<div class="check"></div>
												</li>
												<?php
															}
														}
														
													}
												?>
												<li>
													<input type="radio" id="i-option" name="medio_pago" value="a_definir" required></input>
													<label for="i-option">A coordinar</label>    
													<div class="check"></div>
												</li>
											</ul>
										</div>
									</div>
								</div>		
								<div class="columna_2 right">								
									<div class="columna_1">
										<h3>Seleccione la fecha de <b id="seleccionando">CHECK IN</b> </h3>
										<input type="hidden" name="month" id="month" value="<?php echo date("n")?>">
										<input type="hidden" name="year" id="year" value="<?php echo date("Y")?>">
										<input type="hidden" name="id_departamento" value="<?php echo $n3_id?>">
										<div id="calendario">
											<script>
												$( document ).ready(function(){draw_calendar_v1();});
											</script>
										</div>
									</div>
									<div class="seccion_autoc"></div>	
								</div>
								<div class="seccion_autoc"></div>	
							</div>
						</div>
					</div>
					<div class="seccion_autoc"></div>
				</form>	
			</div>
			<div class="seccion_autoc"></div>
			<!--Bloque pie de pagina -->
			<?php pie_de_pagina()?>	
		</div>
	</body>
</html>
<script>
	$("#in_fecha").blur(VerificarCheckIn);
</script>