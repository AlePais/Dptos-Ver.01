<?php
	include '../../../funciones/general/conexion.php';

	$id_departamento=$_GET['id_departamento'];
	$dias=$_GET['dias'];
	$descuento=$_GET['descuento'];

	$query = "SELECT * FROM `descuentos_dias` WHERE `id_departamento` = '$id_departamento' AND `dias` = '$dias'";
	$resultado=$mysqli->query($query);
	if($resultado->num_rows==0)
	{
		$query="INSERT INTO `descuentos_dias`(`id`, `id_departamento`, `dias`, `descuento`, `creado`, `modificado`) VALUES ('', '$id_departamento', '$dias', '$descuento', '', '')";
		$resultado=$mysqli->query($query);
		$respuesta="Agregado correctamente";
	}
	else
	{
		$respuesta="El descuento para ese numero de dias ya se encuentra definido";
	}

	echo $respuesta;
?>