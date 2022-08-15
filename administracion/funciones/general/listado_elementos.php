<?php 
	// listado_elementos($titulo, $tabla, $campo_criterio, $criterio, $campo_ordenar, $campo_id, $campo_nombre, $campo_corregido)
	// $campo_criterio = nombre del campo a utilizar en el criterio
	// $criterio = criterio de seleccion. En general, el tipo
	// $campo_ordenar = campo por el cual ordenar la consulta
	// $campo_id = nombre del campo id
	// $campo_nombre = nombre del campo nombre
	// $campo_corregido = nombre del campo nombre_corregido

	function listado_elementos($campo_criterio, $criterio, $campo_ordenar, $campo_id, $campo_nombre, $campo_corregido)
	{
		global $mysqli;	global $archivo_actual;	global $titulo;	global $tabla;
?>
	
	<div class="seccion_autoc"></div>
	<div class="columna_3 right">
		<h2> Listado de elementos cargados en <?php echo $titulo?></h2>
		<div class="alerta">Seleccione el elemento que desea modificar</div>
		<div class="alerta">Arrastres con el mouse los elementos para cambiar el orden de aparicion en su sitio</div>
	</div>
	
	<div class="columna_3 left">
	<form action="funciones/general/guarda_orden.php" method="post" >
		<script>ordenar('lista_elementos');</script>
		<ul id="lista_elementos">
			<?php
				$clausula =1;
				if ($campo_criterio !='')
				{
					$clausula = "`$campo_criterio` LIKE '$criterio'";
				}
				$query = "SELECT * FROM `$tabla` WHERE $clausula ORDER BY `$campo_ordenar` ASC";
				$resultado = $mysqli->query($query);
				$resultado->num_rows;
				if($resultado->num_rows>0)
				{
					while($lista_elementos = $resultado->fetch_array(MYSQLI_ASSOC))
					{
						$id = $lista_elementos[$campo_id];
						if($id!=1)
						{
							$nombre = $lista_elementos[$campo_nombre];
							$corregido = $lista_elementos[$campo_corregido];
			?>
			<li>
				<input type="hidden" name="<?php echo $id?>">
				<a href="?id_elemento=<?php echo $id?>&nombre=<?php echo $corregido?>"><?php echo $nombre?></a>
				<div id="eliminar" onClick="eliminar('<?php echo $id?>', '<?php echo $campo_id?>', '<?php echo $tabla?>')"> <b>Eliminar</b></div>
			</li>
			<br>
			<?php
						}
					}
				}
			?>
		</ul>
		<input type='hidden' id='url_origen' name='url_origen' value='<?php echo $archivo_actual?>'>
		<input type="hidden" name="tabla" value="<?php echo $tabla?>">
		<input type="hidden" name= "tipo" value="<?php echo $criterio?>">
		
			<div class="seccion_autoc"></div>
	</div>	
	<div class="seccion_autoc"></div>	
	<div id="pie_titulo">
		<a href="funciones/general/guarda_orden.php?url_origen=<?php echo $archivo_actual?>&tipo=<?php echo $criterio?>&tabla=<?php echo $tabla?>&ordenar=ASC">Alfabeticamente Ascendente</a>
		<a href="funciones/general/guarda_orden.php?url_origen=<?php echo $archivo_actual?>&tipo=<?php echo $criterio?>&tabla=<?php echo $tabla?>&ordenar=DESC">Alfabeticamente Descendente</a>
		
		<input type="submit" value="guardar orden">		
		
	</div>	
	</form>
<?php
	}
?>