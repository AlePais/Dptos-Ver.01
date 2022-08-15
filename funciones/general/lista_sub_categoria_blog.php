<?php
	function listado_sub_categoria_blog($n1_id_depto, $n2_id_depto, $mysqli, $id_tabla, $raiz)
	{
		if($n1_id_depto!=0)
		{
			$clausula_2 = "`n1_id`= '$n1_id_depto'";
		}

		if($n2_id_depto!=0)
		{
			$clausula_2 = "`n2_id`= '$n2_id_depto'";
		}
		$query="SELECT * FROM `relaciones` WHERE $clausula_2 GROUP BY n2_id_blog";

		$resultado = $mysqli->query($query);

		while($datos=$resultado->fetch_array(MYSQLI_ASSOC))
		{
			$id_relacion=$datos['n2_id_blog'];
			$query="SELECT * FROM `nivel_1` NATURAL JOIN `nivel_2` JOIN `archivo` ON nivel_2.n2_id = archivo.id_elemento WHERE nivel_2.n2_id = '$id_relacion' AND archivo.tabla_asociada LIKE 'nivel_2' ORDER BY archivo.orden ASC LIMIT 1 ";
			$resultado2=$mysqli->query($query);
			$imagen=$resultado2->fetch_array(MYSQLI_ASSOC);
			$url_imagen= $raiz.$imagen['carpeta'].$imagen['archivo'];
			$categoria = $imagen['n2_nombre'];

			$clase="";
			if($id_tabla==$imagen['n2_id'])
			{
				$clase="boton_seleccionado";
			}
			$url_sub_categoria=$raiz."blog/".$imagen['n1_corregido']."/".$imagen['n2_corregido'];
?>
<a class="<?php echo $clase?>" href="<?php echo $url_sub_categoria?>">
	<div class="blog_iconos2"> 
		<div style="background-image:url(<?php echo $url_imagen;?>);" ></div>
		<p> <?php echo $categoria;?>
	</div> 
</a>
<?php
		}
	}
?>