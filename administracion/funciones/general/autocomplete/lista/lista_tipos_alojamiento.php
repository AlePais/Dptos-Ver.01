<?php
	include '../../../../../funciones/general/conexion.php';
	
	$query = "SELECT DISTINCT `contenido` FROM `general` WHERE `nombre` = 'tipo_alojamiento' AND `nombre` NOT LIKE '0'";
	$resultado = $mysqli->query($query);
	while($lista_alojamientos = $resultado->fetch_array(MYSQLI_ASSOC))
	{
		$lista[] = $lista_alojamientos['contenido'];
	}

	$dataType = "json";
	$json = '[';
	foreach($lista as $key => $valor)
	{
		$json .= '{"name": "' . $valor . '"}';
		if ($valor !== end($lista))
		{
			$json .= ',';	
		}
	}
	$json .= ']';

	header('Content-Type: application/json');
	echo $json;
?>