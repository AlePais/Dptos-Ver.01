<div class="formulario right  margin-top_f10" >
	<form enctype='multipart/form-data' method='POST' id="formulario_consulta" action='funciones/contacto/enviar_contacto.php'>	
		<h1>Consulta online</h1>	
		<input type='hidden' name='pagina_origen' id='pagina_origen' value='<?php echo $url?>'></input>
		<input type='hidden' id='codigo_unico' name='codigo_unico' value='<?php echo $codigo_unico?>'>
		<input type="text" placeholder="Empresa" id="empresa" name="empresa"> </input>
		<input type="text" placeholder="Nombre" id="nombre" name="nombre" required> </input>
		<input type="text" placeholder="Email" id="email_usuario" name="email_usuario" required></input>
		<input type="text" placeholder="Telefono" id="telefono" name="telefono"></input>
		<!--<input type="date" name="inicio_fecha"><input type="time" name="inicio_hora">
		<input type="hidden" name="fin_fecha"><input type="hidden" name="fin_hora"> -->
		<select placeholder="Asunto" id="asunto" name="asunto" required> <!-- Cargar de Base de Datos -->
			<?php
				$n1_tipo = "categoria_contacto";
				$query_n1 = "SELECT * FROM `nivel_1` WHERE `n1_tipo` LIKE '$n1_tipo' ORDER BY `n1_orden` ASC";
				$resultado_n1 = $mysqli->query($query_n1);
				while($contenido_n1 = $resultado_n1->fetch_array(MYSQLI_ASSOC))
				{
					$n1_id = $contenido_n1['n1_id'];
					$n1_nombre = $contenido_n1['n1_nombre'];
			?>
			<option value="<?php echo $n1_id?>"><?php echo $n1_nombre?></option>
			<?php
				}
			?>
		</select>
		<textarea id="consulta" name="consulta" placeholder="¿Que desea consultar?*" required></textarea>
		<!--<div id="imagenes"></div>
		<div id="archivos"></div> -->
		<input type="submit" class="boton" Value="Enviar"> </input> 
		<div class="seccion_autoc"></div>
	</form>
</div>

<form id="parametros_archivo">
	<input type='hidden' id='tipo' name='tipo' value='archivo'>
	<input type='hidden' id='id_elemento' name='id_elemento' value='0'>
	<input type='hidden' id='codigo_unico' name='codigo_unico' value='<?php echo $codigo_unico?>'>
	<input type='hidden' id='tabla_archivo' name='tabla_archivo' value='archivo'>
	<!-- nombre_id es el nombre del campo id en la tabla a la que se agrega el archivo. --> 
	<input type='hidden' id='nombre_id' name='nombre_id' value='id_elemento'>
	<input type='hidden' id='id' name='id' value=''>
	<input type='hidden' id='cantidad' name='cantidad' value='multiple'> <!-- multiple o simple --> 
</form>
<script type="text/javascript">formulario_carga('archivos', 'parametros_archivo')</script>


<script type="text/javascript">
	$(document).ready(function(){
	$("#formulario_consulta").submit(function(e) {
    //---------------^---------------
    e.preventDefault();
    var nombre = $('#nombre').val();
    var empresa = $('#empresa').val();
    var email_usuario = $('#email_usuario').val();
    var asunto = $('#asunto').val();
	
	var url = "<?php echo $raiz?>funciones/contacto/enviar_contacto.php"; // El script a dónde se realizará la petición.
		$.ajax({
			type: "POST",
			url: url,
			data: $("#formulario_consulta").serialize(), // Adjuntar los campos del formulario enviado.
			success: function()
			{
			}
		 });
		 $("#div_archivo").empty();
		 document.getElementById('formulario_consulta').reset();
		 alert('Su consulta ha sido enviada');
	});
	});
</script>