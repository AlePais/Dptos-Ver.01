<form enctype='multipart/form-data' method='POST' id="formulario_horizontal" action='<?php echo $raiz?>funciones/general/define_zona.php'>
	<input type="hidden" id="raiz" name="raiz" value="<?php echo $raiz?>">
	<input type="hidden" id="url_actual" name="url_actual" value="<?php echo $url?>">
	<div class="seccion_autoc10"></div>
	<label> <h2>Ver guia de actividades</h2></label>
	<label>Elegir zona 
		<select id='n1_idx' name='n1_idx' required>
			<option value="">Elegir la zona</option>
			<?php
				$query="SELECT * FROM `nivel_1` WHERE `n1_tipo` = 'departamento_nivel_1'";
				$resultado = $mysqli->query($query);
				while($lista = $resultado->fetch_array(MYSQLI_ASSOC))
				{
					$id = $lista['n1_id']; $nombre = $lista['n1_nombre'];
					$seleccionado ='';
					if($id == $n1_id_depto){$seleccionado='selected';}
			?>
			<option value="<?php echo $id?>" <?php echo $seleccionado?>> <?php echo $nombre?> </option>
			<?php
				}
			?>
		</select>
	</label>
	<label>  Elegir localidad  <!-- cargar con sub_categorias -->
		<select id='n2_idx' name='n2_idx'>
			<option value="0">Seleccione departamento o localidad</option>
			<?php
				$query="SELECT * FROM `nivel_2` WHERE `n1_id` = '$n1_id_depto' AND`n2_tipo` = 'departamento_nivel_2'";
				$resultado = $mysqli->query($query);
				while($lista = $resultado->fetch_array(MYSQLI_ASSOC))
				{
					$id = $lista['n2_id']; $nombre = $lista['n2_nombre'];
					$seleccionado ='';
					if($id == $_SESSION['n2_id']){$seleccionado='selected';}
			?>
			<option value="<?php echo $id?>" <?php echo $seleccionado?>> <?php echo $nombre?> </option>
			<?php
				}
			?>
		</select>
		<select id='n3_idx' name='n3_idx' style="display:none"></select>
	</label>
	<div class="seccion_autoc10"></div>
	<div class="boton_2 right" >
		<img src="<?php echo $raiz?>interfaz/iconos/busqueda.png"><input type="submit" value="Buscar actividades en zona">
	</div>
	<div class="seccion_autoc10"></div>
</form>