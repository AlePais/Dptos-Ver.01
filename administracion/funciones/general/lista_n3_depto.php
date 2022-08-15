<?php
	include '../../../funciones/general/conexion.php';

	$n2_id=$_GET['n2_id'];
	$n3_tipo=$_GET['n3_tipo'];
	$query = "SELECT contenido FROM `nivel_3` JOIN `general` ON general.id_elemento=nivel_3.n3_id WHERE nivel_3.n2_id=$n2_id AND nivel_3.n3_tipo = '$n3_tipo' AND general.nombre LIKE 'tipo_alojamiento'";
	$resultado = $mysqli->query($query);

	while($lista_n3=$resultado->fetch_array(MYSQLI_ASSOC))
	{
		$tipo_alojamiento[$lista_n3['contenido']] = $lista_n3['contenido'];
	}

	sort($tipo_alojamiento);

	$cad='[';
	foreach($tipo_alojamiento as $valor)
	{
		$cad.="{'tipo_alojamiento':'".$valor."'},";
	}
	$cad.=']';
	
	echo $cad;

?>