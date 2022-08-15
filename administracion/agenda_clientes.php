<?php
	include 'funciones/general/funciones_administracion.php';
	// Variables [$_GET $id_elemento-$nombre] [general $tipo-$codigo_unico-$vista_from-$vista_boton-$tipo_consulta(ej n1_tipo)]

	//tipo_consulta es para que pueda leer la fila vacia de la consulta
	$query = "SELECT * FROM `agenda_clientes` WHERE `id_agenda` = '$id_elemento'";
	crear_variable($query);
	$titulo = 'Agenda de clientes';	$tabla = 'agenda_clientes'; $tipo='agenda_clientes';
?>
<html>
	<head>
		<?php include 'funciones/general/cabecera_administracion.php';?>
		<script language="javascript" src="funciones/nivel_3/blog.js"></script>
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
						</p>
						<div class="seccion_autoc1"></div>
					</div>
					<div class="seccion_autoc"></div>
					<form method="post" action="funciones/agenda_clientes/bd_agenda_clientes.php" style="<?php echo $vista_form?>" id='formulario' name='formulario'>
						<br>
						<br>
						<div class=" formulario_div columna_4 left">
							<h2> Datos usuario</h2><hr>
							<input type='hidden' id='id_agenda' name='id_agenda' value='<?php echo $id_elemento?>'>
							<input type='hidden' id='tabla' name='tabla' value='<?php echo $tabla?>'>
							<input type='hidden' id='url_origen' name='url_origen' value='<?php echo $archivo_actual?>'>
							<p> <span>Nombre</span><input type='text' id='nombre' name='nombre' value='<?php echo $nombre?>' maxlength="100" required ></p>
							<p> <span>E-mail</span><input type='text' id='email' name='email' value='<?php echo $email?>' maxlength="100" required ></p>
							<br>
							<p> <span>Telefono</span><input type='text' id='telefono' name='telefono' value='<?php echo $telefono?>' maxlength="100" required ></p>
							<p> <span>Facebook</span><input type='text' id='facebook' name='facebook' value='<?php echo $facebook?>' maxlength="100" required ></p>
							<br>
						</div>	
						<div class="formulario_div  columna_4 left">
							<fieldset>
								<h2> Foto de perfil</h2>
								<div id="imagenes" class="right columna_1"></div>
							</fieldset>
							<div class="seccion_autoc_menu_2"></div>
						</div>
						<div class="formulario_div  columna_4 left gris_claro">
							<h2><i>Check In / Check Out</i></h2><hr>
							<p> <span>Check in</span><input type='date' id='check_in' name='check_in' value='<?php echo $check_in?>' required ></p>
							<p> <span>Check out</span><input type='date' id='check_out' name='check_out' value='<?php echo $check_out?>'required ></p>
							<div class="seccion_autoc_menu_2"></div>
						</div>
						<div class="formulario_div columna_4 left gris">
							<fieldset>
								<h1>Departamento asociado</h1>
								<p><label><span> Zona </span>
								<select id='n1_id_depto' name='n1_id_depto' required>
									<option value="">Elegir la zona</option>
									<?php
										$query="SELECT * FROM `nivel_1` WHERE `n1_tipo` = 'departamento_nivel_1'";
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
								</label>
								<p><label><span> Sub-zona </span> <!-- cargar con sub_categorias -->
									<?php
										$habilitado='';
										if ($n2_id==0)
										{
											$habilitado='disabled';
										}
									?>
								<p><select id='n2_id_depto' name='n2_id_depto' <?php echo $habilitado?>>
									<option value="">Seleccione departamento o localidad</option>
									<?php
										if ($n1_id!=0)
										{
											echo $query="SELECT * FROM `nivel_2` WHERE `n2_tipo` = 'departamento_nivel_2' AND `n1_id`='$n1_id'";
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
								</label>
								<p> <label><span> Nombre departanto</span>
									<?php
										if ($n3_id==0)
										{
											$habilitado='disabled';
										}
									?>
									<select id='n3_id_depto' name='n3_id_depto' <?php echo $habilitado?>>
										<option value="">Seleccione cantidad de habitaciones</option>
										<?php
											if ($n2_id!=0)
											{
												$query="SELECT * FROM `nivel_3` WHERE `n3_tipo` = 'departamento_nivel_3' AND `n2_id`='$n2_id'";
												$resultado = $mysqli->query($query);
												while($lista = $resultado->fetch_array(MYSQLI_ASSOC))
												{
												$id = $lista['n3_id']; $nombre = $lista['n3_nombre'];
												$seleccionado ='';
												if($id == $n3_id){$seleccionado='selected';}
										?>
										<option value="<?php echo $id?>" <?php echo $seleccionado?>> <?php echo $nombre?> </option>
										<?php
												}
											}
										?>
									</select>
								</label>
							</fieldset>
							<div class="seccion_autoc_menu_2"></div>
						</div>
						<div class="seccion_autoc_menu_2"></div>
						<div class="columna_1" id="pie_titulo">
						<center>
							<input type='submit' id='cargar' value='Guardar'>
						</center>
						</div>
					</form>
					<div>
						<?php listado_elementos('', '', 'nombre', 'id_agenda', 'nombre', 'corregido');?>
					</div>						
				</div>
			</div>
		</div>
		<div id='pie_de_pagina'>
		<?php include "funciones/general/pie_de_pagina_me.php"; ?>	
		</div>
	</body>
</html>
<form id="parametros_imagenes">
	<input type='hidden' id='parametros' name='parametros' value='parametros_imagenes'>
	<input type='hidden' id='codigo_unico' name='codigo_unico' value='imagen_<?php echo $codigo_unico?>'>
	<input type='hidden' id='tabla' name='tabla' value='archivo'><!--la tabla en la que guardo datos de archivo/imagen-->
	<input type='hidden' id='tabla_asociada' name='tabla_asociada' value='agenda'><!--//tabla del elemento al que le pertenece el archivo/imagen-->
	<input type='hidden' id='id_elemento' name='id_elemento' value='<?php echo $id_elemento?>'><!--//id del elemento de la tabla_asociada-->
	<input type='hidden' id='titulo' name='titulo' value=''><!--Titulo de fieldset donde se encuentra formulario de carga de archivo-->
	<input type='hidden' id='categoria' name='categoria' value='imagenes'><!--Titulo de fieldset donde se encuentra formulario de carga de archivo-->
	<input type='hidden' id='tipo' name='tipo' value='imagen'><!--Tipo elemento que se carga (imagen, archivo, icono)-->
	<input type='hidden' id='adm_nombre' name='adm_nombre' value='0'> <!-- admite campo (input type:text) nombre 0=no, 1=si -->
	<input type='hidden' id='adm_descripcion' name='adm_descripcion' value='0'> <!--admite campo (textarea) descripcion 0=no, 1=si -->
	<input type='hidden' id='cantidad' name='cantidad' value='simple'> <!-- multiple o simple -->
	<input type='hidden' id='etiqueta' name='etiqueta' value='Agregar imagen de perfil'> <!--Texto que aparecera en el boton de subir archivo-->
	<input type='hidden' id='tipo_miniatura' name='tipo_miniatura' value='imagen'> <!--Tipo de miniatura imagen/icono_archivo-->
	<script>
		$( document ).ready(function(){formulario_carga('imagenes', 'parametros_imagenes')});//primer parametro, el div donde se mete el formulario, el segundo es el id de el form donde estan los parametros
	</script>
</form>