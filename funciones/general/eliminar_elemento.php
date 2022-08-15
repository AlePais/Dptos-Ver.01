<?php
	include '../../../funciones/general/conexion.php';

	$id_elemento = $_GET['id_elemento'];
	$nombre_id = $_GET['nombre_id'];
	$tabla = $_GET['tabla'];

	$query = "DELETE FROM `$tabla` WHERE `$nombre_id` = '$id_elemento'";
	$resultado = $mysqli->query($query);
?>