<?php
	//Mediante las variables de session se verifica si el usuario esta logueado
	session_start();

	include 'funciones/general/funciones_administracion.php';
	$titulo = "Crear Informe";
	
	if(isset($_GET['id_elemento']) && isset($_GET['nombre_elemento']))
	{
		$id_elemento = $_GET['id_elemento'];
		$vista_form = "";
		$vista_boton = "display:none";
		$query = "SELECT * FROM `cliente` WHERE `id_cliente` = '$id_elemento'";
		crear_variable($query);
	}
	else
	{
		//igualo todas las variables a "vacio" para poder utilizar el mismo formulario para modificacion que para carga
		$identificador =''; $nombre_pagina =''; $titulo_pagina='';	$descripcion_pagina=''; $fondo_tipo=''; $fondo_valor='';$contenido = '';$vista_form = "display:none";$vista_boton = ""; $fondo_valor='';$id_elemento ='0';
	}
?>
<html>
	<head>
		<?php include 'funciones/general/cabecera_administracion.php';?>
		
		<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
		<script>
			$( function() {
			var availableTags = [
			  "ActionScript",
			  "AppleScript",
			  "Asp",
			  "BASIC",
			  "C",
			  "C++",
			  "Clojure",
			  "COBOL",
			  "ColdFusion",
			  "Erlang",
			  "Fortran",
			  "Groovy",
			  "Haskell",
			  "Java",
			  "JavaScript",
			  "Lisp",
			  "Perl",
			  "PHP",
			  "Python",
			  "Ruby",
			  "Scala",
			  "Scheme"
			];
			$( "#tags" ).autocomplete({
			  source: availableTags
			});
			} );
		</script>
		
		
	</head>

	<body>
		<center>
			<div id='encabezado'>
				<?php include "funciones/general/encabezado.php"; ?>	
			</div>
			<div id='cuerpo'>
				<table class="ancho_fijo" height="800px" align="top">
					<tr>
						<td class="menu_vertical">
							<?php include "funciones/general/menu_vertical.php"; ?>
						</td>
						<td class="contenedor">
							<h1><img src="<?php echo $raiz?>interfaz/iconos/<?php echo $tipo;?>.png"><?php echo $titulo?>
								<a id='carga_producto' style="<?php echo $vista_boton?>"> Crear <?php echo $titulo?></a>
							</h1>
						<form enctype="multipart/form-data"  method="post" action="funciones/cliente/bd_cliente.php" style="<?php //echo $vista_form?>" id='formulario' name='formulario'>
							<input type='hidden' id='id_cliente' name='id_cliente' value='<?php echo $id_elemento?>'>
							<input type='hidden' id='url_origen' name='url_origen' value='<?php echo $archivo_actual?>'>
							<input type='hidden' id='id_representante' name='id_representante' value='<?php echo $_SESSION['id_representante'];?>'>
							<br>
							<br>
							<br>
							<br>
							<hr>
							<h2>Datos Obligatorios</h2>
							<div id='datos_obligatorios'>
								<p>
									<span>Nombre cliente</span><input type='text' id='nombre_cliente' name='nombre_cliente' value='<?php echo $nombre_cliente?>' required>
								</p>
								<p>
									<span>Email</span><input type='text' id='email_cliente' name='email_cliente' value='<?php echo $email_cliente?>' required>
								</p>
								<p>
									<span>Telefono</span><input type='text' id='telefono_cliente' name='telefono_cliente' value='<?php echo $telefono_cliente?>' required>
								</p>
								<hr>
							</div>
							<h2>Datos Recomendados</h2>
							<div id='datos_recomendados'>

									<p>
										<span>Empresa</span><input type='text' id='empresa' name='empresa' value='<?php echo $empresa?>' required>
									</p>
									<p>
										<span>Logo</span><input type='file' id='logo' name='logo' value='<?php echo $logo?>' required>
									</p>
									<p>
										<span>Pagina Actual</span><input type='text' id='pagina_url' name='pagina_url' value='<?php echo $pagina_url?>' required>
									</p>
									<p>
										<span>Pagina de referencia</span><input type='text' id='pagina_url' name='pagina_url' value='<?php echo $pagina_url?>' required>
									</p>
									<p>
										<span>Comentarios</span>
										<div style="width:auto; height:auto; min-height:500px;">
											<textarea id='comentario' name='comentario'><?php echo $comentario?></textarea>
										</div>
									</p>
									<hr>
							</div>
							<h2>Datos opcionales</h2>
							<div id='datos_opcionales'>
								<p><span>Agregar nombre cliente</span></p>
								<p><span>Agregar email</span></p>
								<p><span>Agregar telefono</span></p>
								<p><span>Agregar Red Social</span></p>
								<p><span><div class="ui-widget">
									<label for="tags">Tags: </label>
									<input id="tags">
								</div></span></p>
								
								<hr>
							</div>
							<center>
								<input type='submit' id='cargar' value='Guardar'>
							</center>
						</form>			
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
<script>
$(document).ready(function()
{
	$("#empresa").blur(function()
	{
		verificarEmpresa();
	});
});

function verificarEmpresa()
{
	// validar si empresa existe en primera instacia - hacerlo extensivo a validar cualquier campo
}

</script>