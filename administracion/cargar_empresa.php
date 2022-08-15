<?php
	//Mediante las variables de session se verifica si el usuario esta logueado
	session_start();

	include 'funciones/general_2/funciones_administracion.php';
	$titulo = "Paginas";
	
	
	if(isset($_GET['id_elemento']) && isset($_GET['nombre_elemento']))
	{
		$id_elemento = $_GET['id_elemento'];
		$vista_form = "";
		$vista_boton = "display:none";
		$query = "SELECT * FROM `pagina` WHERE `id_pagina` = '$id_elemento'";
		crear_variable($query);
	}
	else
	{
		//igualo todas las variables a "vacio" para poder utilizar el mismo formulario para modificacion que para carga
		$identificador =''; $nombre_pagina =''; $titulo_pagina='';	$descripcion_pagina=''; $fondo_tipo=''; $fondo_valor='';$contenido = '';$vista_form = "display:none";$vista_boton = ""; $fondo_valor='';
	}
?>
<html>
	<head>
		<?php include 'funciones/general_2/cabecera_administracion.php';?>
	</head>

	<body>
		<center>
			
			<?php include "funciones/general_2/encabezado.php"; ?>	
			
			<div id='cuerpo'>
				<table class="ancho_fijo" height="800px" align="top">
					<tr>
						<td class="menu_vertical">
							<?php include "funciones/general_2/menu_vertical.php"; ?>
						</td>
						<td class="contenedor">
							<h1><img src="<?php echo $raiz?>interfaz/iconos/<?php echo $tipo;?>.png"><?php echo $titulo?>
								<a id='carga_producto' style="<?php echo $vista_boton?>"> Crear <?php echo $titulo?></a>
							</h1>
						<form enctype="multipart/form-data"  method="post" action="funciones/pagina/bd_pagina.php" style="<?php echo $vista_form?>" id='formulario' name='formulario'>
							<br>
							<br>
							<br>
							<br>
							<hr>
							<h2>GENERAL</h2>
								<input type='hidden' id='id_pagina' name='id_pagina' value='<?php echo $id_elemento?>'>
								<input type='hidden' id='url_origen' name='url_origen' value='<?php echo $archivo_actual?>'>
								<p>
									<span>Nombre</span><input type='text' id='nombre_pagina' name='nombre_pagina' value='<?php echo $nombre_pagina?>' required>
								</p>
							<hr>
							<h2>SEO</h2>
								<p>
									<span>Titulo</span><input type='text' id='titulo_pagina' name='titulo_pagina' value='<?php echo $titulo_pagina?>' maxlength="65">
								</p>
								<p>
									<span>Descripcion</span><input type='text' id='descripcion_pagina' name='descripcion_pagina' value='<?php echo $descripcion_pagina?>' maxlength="145">
								</p>
							<hr>
							<h2>CONTENIDO Y DISEÑO</h2>
								FONDO
								<p>
									<span><input type="radio" name="fondo_tipo" value="color" <?php if($fondo_tipo=='color'){echo "checked";}?> required>Color</span>
									<span><input type="radio" name="fondo_tipo" value="imagen" <?php if($fondo_tipo=='imagen'){echo "checked";}?> required>imagen</span>
								</p>
								<br>
								<div id="fondo">
								</div>
								<p>
									<span>Contenido</span>
									<div style="width:auto; height:auto; min-height:500px;">
										<textarea id='contenido' name='contenido'><?php echo $contenido?></textarea>
									</div>
								</p>
							<hr>
							<center>
								<input type='submit' id='cargar' value='Guardar'>
							</center>
						</form>
						<div>
							<h2> Listado de <?php echo $titulo?></h2>
							<div class="alerta">Seleccione la pagina que desea modificar</div>
							<br>
							<ul id="sortable_3">
								<?php 
									$query = "SELECT * FROM `pagina` WHERE 1";
									$resultado = $mysqli->query($query);
									while($paginas = $resultado->fetch_array(MYSQLI_ASSOC))
										{
											$id = $paginas['id_pagina'];
											$nombre = $paginas['nombre_pagina'];
											$corregido = $paginas['corregido_pagina'];
									?>
									<li>
										<input type="hidden" name="<?php echo $id?>">
										<a href="?id_elemento=<?php echo $id?>&nombre_elemento=<?php echo $corregido?>"><?php echo $nombre?></a>
										<div id="eliminar" onClick="eliminar('<?php echo $id?>', 'id_pagina', 'pagina')"> <b>Eliminar</b></div>
									</li>
									<br>
									<?php
										}
									?>
							</ul>
						</div>						
						</td>
					</tr>
				</table>
			</div>
			<div id='pie_de_pagina'>
				<?php include "funciones/general/pie_de_pagina_me.php"; ?>	
			</div>
		</center>
	</body>
</html>
<form id="parametros_formulario">
	<input type='hidden' id='tipo' name='tipo' value='imagen'>
	<input type='hidden' id='codigo_unico' name='codigo_unico' value='<?php echo $codigo_unico?>'>
	<input type='hidden' id='tabla' name='tabla' value='pagina'>
	<input type='hidden' id='id' name='id' value=''>
	<input type='hidden' id='cantidad' name='cantidad' value='simple'> <!-- multiple o simple --> 
	<input type='hidden' id='fondo_valor_anterior' name='fondo_valor_anterior' value='<?php echo $fondo_valor?>'> <!-- valor de fondo para usar en func_pagina.js --> 
</form>