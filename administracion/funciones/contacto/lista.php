<?php
	include '../../../funciones/general/conexion.php';
	
	$criterio = '';

	if($_GET['campo_ordenar']!='' && $_GET['asc_desc'] != '')
	{
		$criterio = "ORDER BY `".$_GET['campo_ordenar']."` ".$_GET['asc_desc'];
	}

	$query = "SELECT * FROM `contacto` WHERE 1 $criterio";
	$resultado = $mysqli->query($query);
	$i = 1;

	while($lista = $resultado->fetch_array(MYSQLI_ASSOC))
	{
		$id_asunto = $lista['asunto'];
		$query1 = "SELECT * FROM `contacto_asunto` WHERE `id_contacto_asunto` = $id_asunto";
		$resultado1 = $mysqli->query($query1);
		$asunto = $resultado1->fetch_array(MYSQLI_ASSOC);
		
		$archivos[$i]['id'] = $lista['id'];
		$archivos[$i]['nombre'] = $lista['nombre'];
		$archivos[$i]['apellido'] = $lista['apellido'];
		$archivos[$i]['asunto'] = $asunto['nombre'];
		$archivos[$i]['email'] = $lista['email'];
		$archivos[$i]['creado'] = $lista['creado'];
		$archivos[$i]['estilo'] = '';
		if($lista['visto']=='0000-00-00 00:00:00')
		{
			$archivos[$i]['estilo'] = "mensaje_nuevo";
		}
		$i++;
	}
	echo json_encode($archivos);
?>
