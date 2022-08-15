<?php
	include '../../../funciones/general/conexion.php';

	$i=1;
	if(!isset($_GET['ordenar']))
	{
		$tabla = $_POST['tabla'];
		$tipo = $_POST['tipo'];
		$url_origen = $_POST['url_origen'];
		
		$numero = str_replace ("nivel_", "", $tabla);
		$n_id = "n".$numero."_id";
		$n_orden = "n".$numero."_orden";

		foreach($_POST as $id => $valor)
		{
			if($id!="tabla" && $id!="tipo" && $id!="url_origen")
			{
				$query = "UPDATE `$tabla` SET `$n_orden` = '$i' WHERE `$n_id` = '$id'";
				$mysqli->query($query);
				$i++;
			}
		}
	}
	else
	{
		$tabla = $_GET['tabla'];
		$tipo = $_GET['tipo'];
		$url_origen = $_GET['url_origen'];
		$ordenar = $_GET['ordenar'];
		
		$numero = str_replace ("nivel_", "", $tabla);
		$n_nombre = "n".$numero."_nombre";
		$n_id = "n".$numero."_id";
		$n_tipo = "n".$numero."_tipo";
		$n_orden = "n".$numero."_orden";
		
		
		$query = "SELECT * FROM `$tabla` WHERE `$n_tipo` = '$tipo' ORDER BY `$n_nombre` $ordenar ";
		$mysqli->query($query);
		$resultado = $mysqli->query($query);
		while($elementos = $resultado->fetch_array(MYSQLI_ASSOC))
		{
			$id = $elementos[$n_id];
			$query1 = "UPDATE `$tabla` SET `$n_orden` = '$i' WHERE `$n_id` = '$id'";
			$mysqli->query($query1);
			$i++;
		}
	}

	header("Location: ../../$url_origen");
?>
