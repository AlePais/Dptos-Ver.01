<div class="seccion_auto_sep"></div>

<?php
	function listado_deptos_blog($n1_id_depto, $n2_id_depto, $mysqli, $id_tabla, $raiz, $nombre_zona)
	{
		$clausula_2 = 1;
		$clausula_3 ='';
		if($n1_id_depto!=0)
		{
			$clausula_2 = "`n1_id`= '$n1_id_depto'";
			$clausula_3 = "`n1_id`= '$n1_id_depto' AND";
		}
		if($n2_id_depto!=0)
		{
			$clausula_2 = "`n2_id`= '$n2_id_depto'";
			$clausula_3 = "`n2_id`= '$n2_id_depto' AND ";
		}
		$query="SELECT `id_relacion` FROM `relaciones` WHERE $clausula_2 GROUP BY n3_id_blog";
		$resultado=$mysqli->query($query);
		$actividades_zona=$resultado->num_rows;
		
		$query1 = "SELECT * FROM `nivel_1` NATURAL JOIN nivel_2 NATURAL JOIN nivel_3 WHERE $clausula_3 nivel_3.n3_tipo = 'departamento_nivel_3' GROUP BY nivel_3.n3_id ORDER BY nivel_3.n3_orden "; 
		$resultado1 = $mysqli -> query($query1);
		$deptos_zona=$resultado1->num_rows;
	?>
<div class="seccion_auto TITULO_BLOG columna_2 right ">
	<h1 style="text-aling:center;">¿Buscas un alquiler en <b><?php echo $nombre_zona?></b> ?</h1>
		<!--	<div class="blog_estadisticas">
			<div>1</div>
			<span style="background-image:url(<?php // echo $raiz; ?>interfaz/iconos/i_dormitorio.png"></span>
			<p> Departamentos cerca de esta actividad </p>								
		</div>	-->
		<div class="blog_estadisticas">
			<div><?php echo $deptos_zona?></div>
			<span style="background-image:url(<?php echo $raiz; ?>interfaz/iconos/i_localidad2.png"></span>
			<p>Departamentos en <?php echo $nombre_zona?> </p>								
		</div>
		<div class="blog_estadisticas">
			<div><?php echo $actividades_zona?></div>
			<span style="background-image:url(<?php echo $raiz; ?>interfaz/iconos/i_descuentos.png"></span>
			<p>Cantidad de actividades en la zona</p>								
		</div>
	<div class="seccion_autoc"></div>
</div>
<?php
		while($productos = $resultado1 ->fetch_array(MYSQLI_ASSOC))
		{
			$n1_corregido = $productos['n1_corregido']; $n2_corregido = $productos['n2_corregido']; $id_tabla = $productos['n3_id']; $nombre = $productos['n3_nombre'];  $corregido = $productos['n3_corregido'];
			
			$query2 = "SELECT * FROM `archivo` WHERE `tabla_asociada` LIKE 'nivel_3' AND `id_elemento` = '$id_tabla' ORDER BY `orden` ";
			$resultado2 = $mysqli -> query($query2);
			if($resultado2->num_rows==0)
			{
				$imagen = $raiz."interfaz/diseno/sin_imagen.jpg";
			}
			else
			{
				$imagen = $resultado2->fetch_array(MYSQLI_ASSOC);
				$imagen = $raiz.$imagen['carpeta'].$imagen['archivo']; 
			}

			$query3 = "SELECT * FROM `general` WHERE `identificador_tabla` LIKE 'n3_id' AND `id_elemento` = '$id_tabla' AND `nombre` LIKE 'precio'";
			$resultado3 = $mysqli->query($query3);
			$precio = $resultado3->fetch_array(MYSQLI_ASSOC)
?>
<div class="e-producto" onclick="location.href='<?php echo $raiz.$n1_corregido."/".$n2_corregido."/".$corregido?>'">
	<div style="background-image:url(<?php echo $imagen?>)"></div>
	<span>
		<h2><img src="<?php echo $raiz;?>interfaz/iconos/i_dormitorio.png"><?php echo $productos['n1_nombre']?></h2>
		<p><img src="<?php echo $raiz;?>interfaz/iconos/i_localidad.png"><?php echo $productos['n2_nombre']?></p>
		<span> Desde: <b><?php echo $precio['contenido']?></b></span>
		<a href="<?php echo $raiz.$n1_corregido."/".$n2_corregido."/".$corregido?>" alt="<?php echo $texto_alternativo['contenido']?>" ><img src="<?php echo $raiz;?>interfaz/iconos/busqueda.png" alt="<?php echo $texto_alternativo['contenido']?>"></a>
	</span>
</div>
<?php
		}
	}
?>