<h3 class="blog_iconos_h3">¿Que hacer en <?php echo $nombre_zona;?>?
 </h3><?php
	function listado_categoria_blog($n1_id_depto, $n2_id_depto, $mysqli, $id_elemento, $raiz)
	{
		$clausula_2='1';
		if($n1_id_depto!=0)
		{
			$clausula_2 = "`n1_id`= '$n1_id_depto'";
		}
		if($n2_id_depto!=0)
		{
			$clausula_2 = "`n2_id`= '$n2_id_depto'";
		}
		$query="SELECT * FROM `relaciones` WHERE $clausula_2 GROUP BY n1_id_blog ";
		$resultado = $mysqli->query($query);

		while($datos=$resultado->fetch_array(MYSQLI_ASSOC))
		{
			$id_relacion=$datos['n1_id_blog'];
			$query="SELECT * FROM `nivel_1` JOIN `archivo` ON nivel_1.n1_id = archivo.id_elemento WHERE nivel_1.n1_id = '$id_relacion' AND archivo.tabla_asociada LIKE 'nivel_1' ORDER BY archivo.orden ASC LIMIT 1 ";
			$resultado2=$mysqli->query($query);
			$imagen=$resultado2->fetch_array(MYSQLI_ASSOC);
			$url_imagen= $raiz.$imagen['carpeta'].$imagen['archivo'];
			$categoria = $imagen['n1_nombre'];
			$clase='';
			if($id_elemento==$imagen['n1_id'])
			{
				$clase="boton_seleccionado";
			}
			$url_categoria=$raiz."blog/".$imagen['n1_corregido'];
?>
<a href="<?php echo $url_categoria?>">
	<div class="blog_iconos <?php echo $clase?>">
		<img src="<?php echo $url_imagen?>" alt="<?php echo $categoria?>" title="<?php echo $categoria?>">
	</div>
</a>
<?php
		}
	}
?>