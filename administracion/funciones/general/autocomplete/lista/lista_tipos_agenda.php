<?php
	include '../../../../../funciones/general/conexion.php';
	
	$query = "SELECT DISTINCT `categoria` FROM `agenda` WHERE `categoria` NOT LIKE '0'";
	$resultado = $mysqli->query($query);
	while($lista_agenda = $resultado->fetch_array(MYSQLI_ASSOC))
	{
		$lista[] = $lista_agenda['categoria'];
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