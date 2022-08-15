<?php
	include '../../../funciones/general/conexion.php';

	$tabla_archivo = $_GET['tabla_archivo'];
	$nombre_campo = $_GET['nombre_campo'];
	$variable_comparar = $_GET['variable_comparar'];
	$nombre_id = $_GET['nombre_id'];
	$id_elemento = $_GET['id_elemento'];

	$query = "SELECT * FROM `$tabla_archivo` WHERE `$nombre_campo` LIKE '$variable_comparar' AND `$nombre_campo` NOT LIKE '' AND `$nombre_id` != $id_elemento";
	$resultado = $mysqli->query($query);
	
	if($resultado->num_rows!=0)
	{
		echo "El valor ya se encuentra registrado";
	}
?>