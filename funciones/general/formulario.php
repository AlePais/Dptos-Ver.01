<?php

	function formulario($asunto, $archivo, $pagina_origen, $base_url, $producto_servicio)
	{
	$asuntos = explode("-", $asunto);
?>
			<form enctype='multipart/form-data' method='POST' action='<?php echo $base_url?>funciones/general/enviar_email.php'>
				<input type='hidden' name='pagina_origen' id='pagina_origen' value="<?php echo $pagina_origen?>"></input>
				<input type='hidden' name='producto_servicio' id='producto_servicio' value="<?php echo $producto_servicio?>"></input>
				<input type='text' name='nombre' id='nombre' placeholder="Nombre*" required></input>
				<input type='email' name='email' id='email'  placeholder="E-Mail*" required></input>
				<div class="clearfix"></div>
				<input type='text' name='telefono' id='telefono' placeholder="Telefono" required></input>
				<br>
				<br>
				Asunto* <span></span>
				<select name='asunto' id='asunto' required>
					<option value=''>Seleccione el asunto</option>"
					<?php
						for($i=0; isset($asuntos[$i]); $i++)
						{
							echo "<option value='".$asuntos[$i]."'>".ucwords($asuntos[$i])."</option>";
						}
					?>
				</select>
				<?php
					if ($archivo == "si")
					{
						echo "<br><br> Adjuntar: <input type='file' name='archivo' id='archivo'></input>";
					}
				?>
					<textarea name='consulta' id='consulta' placeholder="¿Cual es su consulta?*" required></textarea>
				<center>
					Los campos con * son obligatorios
					<p><center><input type='submit' value='Enviar' class='boton'></center>
				</center>
			</form>
<?php
	}
?>