<?php
	include '../../../funciones/general/conexion.php';
	include '../../../funciones/general/funciones_guardar.php';
	include '../../../funciones/general/crea_variables.php';
	include '../general/bd_basico.php';
	include '../general/bd_archivo.php';

	$identificador_tabla='n1_id';

	$estado = $_POST['estado'];

	foreach($estado as $id=>$valor_estado)
	{
		$query="UPDATE `reserva` SET `estado` = '$valor_estado' WHERE `id_reserva` = '$id'";
		$mysqli->query($query);
	}

	$anterior=$_SERVER['HTTP_REFERER'];
	header("Location: $anterior");
?>
