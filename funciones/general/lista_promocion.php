<?php

	function listado_promocion($id_tabla1,$id_tabla3, $n2_id_depto, $mysqli, $raiz, $emisor_promo)
	{
		if(isset($_SESSION['id_agenda']))
		{
			$id_depto = $_SESSION['id_depto'];
			if($emisor_promo=='uno')
			{
				$query="SELECT * FROM `relaciones` WHERE `n3_id`= '$id_depto' AND `n3_id_blog` = '$id_tabla3'";
				$titulo_promociones='Promociones de esta empresa';
				$resultado=$mysqli->query($query);
				if($resultado->num_rows>0)
				{
					$query="SELECT * FROM `nivel_1` NATURAL JOIN `nivel_2` NATURAL JOIN `nivel_3` NATURAL JOIN `nivel_4` JOIN `archivo` ON nivel_4.n4_id = archivo.id_elemento WHERE nivel_3.n3_id = '$id_tabla3' AND archivo.tabla_asociada LIKE 'nivel_4' AND archivo.tipo LIKE 'imagen' GROUP BY nivel_4.n4_id ORDER BY archivo.orden ASC";
					$resultado=$mysqli->query($query);
				}
			}
			if($emisor_promo=='todo')
			{
				$query="SELECT * FROM `relaciones` WHERE `n3_id`= '$id_depto'";
				$titulo_promociones='Mas promociones disponibles';
				$resultado=$mysqli->query($query);
				if($resultado->num_rows>0)
				{
					$query="SELECT * FROM `nivel_1` NATURAL JOIN `nivel_2` NATURAL JOIN `nivel_3` NATURAL JOIN `nivel_4` JOIN `archivo` ON nivel_4.n4_id = archivo.id_elemento WHERE archivo.tabla_asociada LIKE 'nivel_4' AND archivo.tipo LIKE 'imagen' GROUP BY nivel_4.n4_id ORDER BY archivo.orden ASC";
					$resultado=$mysqli->query($query);
				}
			}
			if($resultado->num_rows>0)
			{
	?>
<div class="seccion_autoc"></div>
<div class="columna_1 left">
	<h1><?php echo $titulo_promociones?></h1>
	<?php
				while($promos=$resultado->fetch_array(MYSQLI_ASSOC))
				{
					$url_imagen= $raiz.$promos['carpeta'].$promos['archivo'];
					$categoria = $promos['n1_nombre'];

					$n1_corregido = $promos['n1_corregido']; $n2_corregido = $promos['n2_corregido']; $n3_corregido = $promos['n3_corregido'];  $corregido = $promos['n4_corregido']; $id_tablax = $promos['n4_id']; $nombre = $promos['n4_nombre'];
					$url_detalle=$raiz."blog/".$n1_corregido."/".$n2_corregido."/".$n3_corregido."/".$corregido;
	?>
	<div class="promocion_empresa" style="background-image:url(<?php echo $url_imagen;?>">
		<span> 
			<a href="<?php echo $url_detalle?>"><p><?php echo $nombre?><p></a>
		</span>
	</div>
	<?php
				}
	?>
	</div>
	<?php
			}
		}
	}
?>