<?php
	function listado_blog($n1_id_depto, $n2_id_depto, $mysqli, $id_tabla1, $id_tabla2, $raiz)
	{
		$query="SELECT * FROM `relaciones` WHERE `n1_id`= '$n1_id_depto'";
		$clausula_2=1;
		if($n1_id_depto!=0)
		{
			$clausula_2 = "`n1_id`= '$n1_id_depto' AND ";
		}

		if($n2_id_depto!=0)
		{
			$clausula_2 = "`n2_id`= '$n2_id_depto' AND ";
		}
		$query="SELECT * FROM `relaciones` WHERE $clausula_2 `n1_id_blog` = '$id_tabla1' GROUP BY n3_id_blog";
		if($id_tabla2!='')
		{
			$query="SELECT * FROM `relaciones` WHERE $clausula_2 `n2_id_blog` = '$id_tabla2' GROUP BY n3_id_blog";
		}

		$resultado = $mysqli->query($query);

		while($datos=$resultado->fetch_array(MYSQLI_ASSOC))
		{
			$id_relacion=$datos['n3_id_blog'];
			$id_relacion1=$datos['n1_id_blog'];
			$query="SELECT * FROM `nivel_1` NATURAL JOIN `nivel_2` NATURAL JOIN `nivel_3` JOIN `archivo` ON nivel_3.n3_id = archivo.id_elemento WHERE nivel_3.n3_id = '$id_relacion' AND archivo.tabla_asociada LIKE 'nivel_3'  AND archivo.orden = 2 ORDER BY archivo.orden ASC LIMIT 1 ";
	
			$resultado1=$mysqli->query($query);
			$imagen=$resultado1->fetch_array(MYSQLI_ASSOC);
			$url_imagen= $raiz.$imagen['carpeta'].$imagen['archivo'];
			$categoria = $imagen['n1_nombre'];

			$n1_corregido = $imagen['n1_corregido']; $n2_corregido = $imagen['n2_corregido']; $id_tabla = $imagen['n3_id']; $nombre = $imagen['n3_nombre'];  $corregido = $imagen['n3_corregido'];
			$url_detalle=$raiz."blog/".$n1_corregido."/".$n2_corregido."/".$corregido;
			
			$query2="SELECT * FROM `archivo` WHERE tabla_asociada LIKE 'nivel_1' AND `id_elemento` = '$id_relacion1' ORDER BY `orden` ASC LIMIT 1 ";
			$resultado2=$mysqli->query($query2);
			$imagen_sub=$resultado2->fetch_array(MYSQLI_ASSOC);
			$url_imagen_sub= $raiz.$imagen_sub['carpeta'].$imagen_sub['archivo'];
?>
<div class="blog" onclick="location.href='<?php echo $url_detalle?>'" style="background-image:url(<?php echo $url_imagen?>)" >
	<div style="background-image:url(<?php echo $url_imagen_sub?>"> </div>
	<span>
		<h3><?php echo $imagen['n3_nombre']?></h3>
		<span><p><?php echo $imagen['n3_descripcion']?></span>
		<a href="<?php echo $url_detalle?>">Seguir leyendo</a>
	</span>	
</div>
<?php 	
		}
	}
?>