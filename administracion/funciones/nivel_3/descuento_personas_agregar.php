<?php
	include '../../../funciones/general/conexion.php';

	$id_departamento=$_GET['id_departamento'];
	$personas=$_GET['personas'];
	$descuento=$_GET['descuento'];

	$query = "SELECT * FROM `descuentos_personas` WHERE `id_departamento` = '$id_departamento' AND `personas` = '$personas'";
	$resultado=$mysqli->query($query);
	if($resultado->num_rows==0)
	{
		$query="INSERT INTO `descuentos_personas`(`id`, `id_departamento`, `personas`, `descuento`, `creado`, `modificado`) VALUES ('', '$id_departamento', '$personas', '$descuento', '', '')";
		$resultado=$mysqli->query($query);
		$respuesta="Agregado correctamente";
	}
	else
	{
		$respuesta="El descuento para ese numero de personas ya se encuentra definido";
	}

	echo $respuesta;
?>