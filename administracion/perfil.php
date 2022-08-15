<?php
	include 'funciones/general/funciones_administracion.php';
	// Variables [$_GET $id_elemento-$nombre] [general $tipo-$codigo_unico-$vista_from-$vista_boton-$tipo_consulta(ej n1_tipo)]

	//tipo_consulta es para que pueda leer la fila vacia de la consulta
	$titulo = 'Mi perfil';	$tabla = 'usuario';
	$query = "SELECT * FROM `usuario` WHERE `id` = '$id_elemento'";
	crear_variable($query);

	$separar_dolar = explode(".", $dolar);
	$dolar_entero=$separar_dolar[0];
	$dolar_decimal=$separar_dolar[1];
?>
<html>
	<head>
		<?php include 'funciones/general/cabecera_administracion.php';?>
	</head>
	<body>
		<?php include "funciones/general/encabezado.php";?>	
		<div id='cuerpo'>
			<div class="seccion_auto ancho_fijo_auto">						
				<div class="contenedor">
					<div id="encabezado_titulo">
						<img src="<?php echo $raiz?>interfaz/iconos/am_perfil.png">
						<p>Mi perfil</p>
						<p>Modifique los datos que se mostraran en la web</p>
					</div>
					<div class="alerta">DEJE VACIOS LOS CAMPOS QUE NO DESEA QUE SE MUESTREN EN SU WEB - SALVO CONTRASEÑA</div>
					<form enctype="multipart/form-data"  method="post" action="funciones/perfil/db_perfil.php" id="formulario">	
						<div class="columna_3 left">
							<h2>Datos de contacto</h2>
							<input type='hidden' id='tabla' name='tabla' value='<?php echo $tabla?>'>
							<input type='hidden' id='id_elemento' name='id_elemento' value='<?php echo $id_elemento?>'>
							<input type='hidden' id='url_origen' name='url_origen' value='<?php echo $archivo_actual?>'>
							<p> <span> Nombre</span> <input type='text' id='nombre' name='nombre' value='<?php echo $nombre?>'> </p>
							<p> <span> E-mail </span> <input type='text' id='email' name='email' value='<?php echo $email?>'> </p>
							<p> <span> Contraseña </span> <input type='password' id='password' name='password' value='<?php echo $password?>'> </p>
							<p> <span> Repetir contraseña </span> <input type='password' id='repetir' name='repetir' value='<?php echo $password?>'> </p>
							<p> <span> Telefono </span> <input type='text' id='telefono' name='telefono' value='<?php echo $telefono?>'> </p>
							<p> <span> Direccion </span> <input type='text' id='direccion' name='direccion' value='<?php echo $direccion?>'></p>
							<p> <span> Horario </span> <input type='text' id='horario' name='horario' value='<?php echo $horario?>'> </p>
							<div class="seccion_autoc"></div>
							<p> <span> VALOR DOLAR U$S </span> <input type='number' id='dolar_entero' name='dolar_entero' value='<?php echo $dolar_entero?>' min="0" style="width: 40%;">,<input type='number' id='dolar_decimal' name='dolar_decimal' value='<?php echo $dolar_decimal?>' min="0" max="99" style="width: 40%;"></p>
							<div class="seccion_autoc"></div>
						</div>
						<div class="columna_3 left">
							<h2>Redes sociales</h2>
							<?php
								foreach($redes_sociales as $nombre_red=>$datos)
								{
									$icono_red = $raiz."interfaz/iconos/".$datos['icono'];
									$corregido = $datos['corregido'];
									
									$query="SELECT * FROM `general` WHERE `tipo` = 'redes_sociales' AND `identificador_tabla` = 'id' AND `id_elemento` = '$id_elemento' AND `nombre` LIKE '$corregido'";
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
								<span>
									<img src="<?php echo $icono_red?>">
									<?php echo $nombre_red?>
								</span>
								<input type='text' id='<?php echo $corregido?>' name='<?php echo $corregido?>' value='<?php echo $contenido?>'>
							</p>
							<?php
								}
							?>							
							<div class="seccion_autoc"></div>
						</div>
						<div class="columna_3 LEFT">
							<div>
								<h2>Logo de la empresa</h2>
								<div id="logo" class="columna_1 negro"></div>
								<div class="seccion_autoc"></div>
							</div>
							<div>
								<h2>Favicon</h2>
								<div id="favicon" class="columna_1 negro"></div>
								<div class="seccion_autoc"></div>
							</div>
							<div class="seccion_autoc"></div>
						</div>
						<div class="seccion_autoc"></div>
						<div class="seccion_autoc"></div>
						<div id="encabezado_titulo">
							<input type='submit' id='modificar' value='Guardar Modificacion'>							
						</div>
					</form>
				</div>
				<div class="seccion_autoc"></div>						
			</div>
			<div class="seccion_autoc"></div>
			<div id='pie_de_pagina'>
				<?php include "funciones/general/pie_de_pagina_me.php"; ?>	
			</div>
		</div>
	</body>
</html>
<form id="parametros_logo">
	<input type='hidden' id='parametros' name='parametros' value='parametros_logo'>
	<input type='hidden' id='codigo_unico' name='codigo_unico' value='logo_<?php echo $codigo_unico?>'>
	<input type='hidden' id='tabla' name='tabla' value='archivo'><!--la tabla en la que guardo datos de archivo/imagen-->
	<input type='hidden' id='tabla_asociada' name='tabla_asociada' value='usuario'><!--//tabla del elemento al que le pertenece el archivo/imagen-->
	<input type='hidden' id='id_elemento' name='id_elemento' value='<?php echo $id_elemento?>'><!--//id del elemento de la tabla_asociada-->
	<input type='hidden' id='titulo' name='titulo' value=''><!--Titulo de fieldset donde se encuentra formulario de carga de archivo-->
	<input type='hidden' id='categoria' name='categoria' value='logo'><!--fondo, adjunto, galeria, presentancion-->
	<input type='hidden' id='tipo' name='tipo' value='imagen'><!--Tipo elemento que se carga (imagen, archivo, icono)-->
	<input type='hidden' id='adm_nombre' name='adm_nombre' value='0'> <!-- admite campo (input type:text) nombre 0=no, 1=si -->
	<input type='hidden' id='adm_descripcion' name='adm_descripcion' value='0'> <!--admite campo (textarea) descripcion 0=no, 1=si -->
	<input type='hidden' id='cantidad' name='cantidad' value='simple'> <!-- multiple o simple -->
	<input type='hidden' id='etiqueta' name='etiqueta' value='Seleccione el logo de su empresa'> <!--Texto que aparecera en el boton de subir archivo-->
	<input type='hidden' id='tipo_miniatura' name='tipo_miniatura' value='imagen'> <!--Tipo de miniatura imagen/icono_archivo-->
	<script>
		$( document ).ready(function(){formulario_carga('logo', 'parametros_logo')});//primer parametro, el div donde se mete el formulario, el segundo es el id de el form donde estan los parametros
	</script>
</form>
<form id="parametros_favicon">
	<input type='hidden' id='parametros' name='parametros' value='parametros_favicon'>
	<input type='hidden' id='codigo_unico' name='codigo_unico' value='favicon_<?php echo $codigo_unico?>'>
	<input type='hidden' id='tabla' name='tabla' value='archivo'><!--la tabla en la que guardo datos de archivo/imagen-->
	<input type='hidden' id='tabla_asociada' name='tabla_asociada' value='usuario'><!--//tabla del elemento al que le pertenece el archivo/imagen-->
	<input type='hidden' id='id_elemento' name='id_elemento' value='<?php echo $id_elemento?>'><!--//id del elemento de la tabla_asociada-->
	<input type='hidden' id='titulo' name='titulo' value=''><!--Titulo de fieldset donde se encuentra formulario de carga de archivo-->
	<input type='hidden' id='categoria' name='categoria' value='favicon'><!--fondo, adjunto, galeria, presentancion-->
	<input type='hidden' id='tipo' name='tipo' value='imagen'><!--Tipo elemento que se carga (imagen, archivo, icono)-->
	<input type='hidden' id='adm_nombre' name='adm_nombre' value='0'> <!-- admite campo (input type:text) nombre 0=no, 1=si -->
	<input type='hidden' id='adm_descripcion' name='adm_descripcion' value='0'> <!--admite campo (textarea) descripcion 0=no, 1=si -->
	<input type='hidden' id='cantidad' name='cantidad' value='simple'> <!-- multiple o simple -->
	<input type='hidden' id='etiqueta' name='etiqueta' value='Seleccione el favicon de su web'> <!--Texto que aparecera en el boton de subir archivo-->
	<input type='hidden' id='tipo_miniatura' name='tipo_miniatura' value='imagen'> <!--Tipo de miniatura imagen/icono_archivo-->
	<script>
		$( document ).ready(function(){formulario_carga('favicon', 'parametros_favicon')});//primer parametro, el div donde se mete el formulario, el segundo es el id de el form donde estan los parametros
	</script>
</form>