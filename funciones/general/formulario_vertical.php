<form enctype='multipart/form-data' method='POST' id="formulario_vertical" action='<?php echo $raiz?>funciones/general/buscar.php'>
	<p>Donde Buscas <b>¿Departamento en Alquiler temporario?</b></p>
	<div class="seccion_autoc10"></div>
	<div class="seccion_autoc10"></div>
	<label>  Elegir zona 
		<select id='n1_id' name='n1_id' required>
			<option value="">Elegir la zona</option>
			<?php
				$query="SELECT * FROM `nivel_1` WHERE `n1_tipo` = 'departamento_nivel_1'";
				$resultado = $mysqli->query($query);
				while($lista = $resultado->fetch_array(MYSQLI_ASSOC))
				{
				$id = $lista['n1_id']; $nombre = $lista['n1_nombre'];
				$seleccionado ='';
				if(isset($_SESSION['n1_id']) && $id == $_SESSION['n1_id']){$seleccionado='selected';}
			?>
			<option value="<?php echo $id?>" <?php echo $seleccionado?>> <?php echo $nombre?> </option>
			<?php
				}
			?>
		</select>
	</label>
	<label>Elegir departamento o localidad<!-- cargar con sub_categorias -->
		<?php
			$habilitado='';
			if(!isset($_SESSION['n1_id']) || $_SESSION['n1_id']==0)
			{
				$habilitado='disabled';
			}
		?>
		<select id='n2_id' name='n2_id' <?php echo $habilitado?>>
			<option value="">Seleccione departamento o localidad</option>
			<?php
				if(isset($_SESSION['n1_id']) && $_SESSION['n1_id']!=0)
				{
					$query="SELECT * FROM `nivel_2` WHERE `n1_id` = '".$_SESSION['n1_id']."' AND `n2_tipo` = 'departamento_nivel_2'";
					$resultado = $mysqli->query($query);
					while($lista = $resultado->fetch_array(MYSQLI_ASSOC))
					{
						$id = $lista['n2_id']; $nombre = $lista['n2_nombre'];
						$seleccionado ='';
						if(isset($_SESSION['n2_id']) && $id == $_SESSION['n2_id']){$seleccionado='selected';}
			?>
			<option value="<?php echo $id?>" <?php echo $seleccionado?>> <?php echo $nombre?> </option>
			<?php
					}
				}
			?>
		</select>
	</label>
	<label> Tipo de alojamiento
		<?php
			$habilitado='';
			if(!isset($_SESSION['n2_id']) || $_SESSION['n2_id']==0)
			{
				$habilitado='disabled';
			}
		?>
		<select id='tipo_alojamiento' name='tipo_alojamiento' <?php echo $habilitado?>>
			<option value="">Seleccione tipo de alojamiento</option>
			<?php
				if(isset($_SESSION['n2_id']) && $_SESSION['n2_id']!=0)
				{
					$query="SELECT `contenido` FROM `nivel_3` JOIN `general` ON general.id_elemento=nivel_3.n3_id WHERE nivel_3.n2_id = '".$_SESSION['n2_id']."' AND nivel_3.n3_tipo = 'departamento_nivel_3' AND general.nombre LIKE 'tipo_alojamiento'";
					$resultado = $mysqli->query($query);
					while($lista_n3 = $resultado->fetch_array(MYSQLI_ASSOC))
					{
						$tipo_alojamiento[$lista_n3['contenido']] = $lista_n3['contenido'];
					}
					sort($tipo_alojamiento);
					foreach($tipo_alojamiento as $valor)
					{
						if(isset($_SESSION['tipo_alojamiento']) && $valor == $_SESSION['tipo_alojamiento']){$seleccionado='selected';}
			?>
			<option value="<?php echo $valor?>" <?php echo $seleccionado?>> <?php echo $valor?> </option>
			<?php
					}
				}
			?>
		</select>
	</label>
	<div class="boton_2 right" ><img src="<?php echo $raiz?>interfaz/iconos/busqueda.png"><input type="submit" value="Buscar Departamento"></div>
	<div class="seccion_autoc10"></div>
</form>
<script>
	$( document ).ready(function()
	{
		var n1_id=document.getElementById('n1_id');
		addEvent(n1_id,'change',function(){inicia_sub_categoria('<?php echo $raiz?>', 'departamento_nivel_2', 'n1_id', 'n2_id', 'tipo_alojamiento')},false);
		var n2_id=document.getElementById('n2_id');
		addEvent(n2_id,'change',function(){inicia_articulo('<?php echo $raiz?>', 'departamento_nivel_3', 'n1_id', 'n2_id', 'tipo_alojamiento')},false);
	});
</script>