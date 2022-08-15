<div class="formulario_index margin-top_f10" >
	<form enctype='multipart/form-data' method='POST' id="formulario_contacto">	
		<h1>Consulta online</h1>
		<br>
			<input type='hidden' name='pagina_origen' id='pagina_origen' value='<?php echo $url?>'></input>
		<input type='hidden' id='codigo_unico' name='codigo_unico' value='<?php echo $codigo_unico?>'>
		<input type="text" placeholder="Empresa" id="empresa" name="empresa"> </input>
		<input type="text" placeholder="Nombre" id="nombre" name="nombre" required> </input>
		<input type="text" placeholder="Apellido" id="apellido" name="apellido" required> </input>
		<input type="text" placeholder="Email" id="email" name="email" required></input>

		<input type="text" placeholder="Telefono" id="telefono" name="telefono"></input>
		<!-- <input type="date" name="inicio_fecha"><input type="time" name="inicio_hora">
		<input type="hidden" name="fin_fecha"><input type="hidden" name="fin_hora"> -->
		<select style="text" placeholder="Asunto" id="asunto" name="asunto" required> <!-- Cargar de Base de Datos -->
			<?php
				$query_n1 = "SELECT * FROM `contacto_asunto` WHERE 1";
				$resultado_n1 = $mysqli->query($query_n1);
				while($contenido = $resultado_n1->fetch_array(MYSQLI_ASSOC))
				{
					$id = $contenido['id_contacto_asunto'];
					$nombre = $contenido['nombre'];
			?>
			<option value="<?php echo $id?>"><?php echo $nombre?></option>
			<?php
				}
			?>
		</select>
		<textarea id="contenido" name="contenido" placeholder="¿Que desea consultar?*" required></textarea>
		
		<label for="campo_oculto" class="escondido_form">¡Si ves esto, no llenes el siguiente campo!</label>
		<input name="campo_oculto" class="escondido_form"/>

		<input type="submit" class="boton_a " Value="Enviar"> </input> 
		<div class="seccion_autoc"></div>
	</form>
</div>