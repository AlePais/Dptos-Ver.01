<?php
	include '../../../funciones/general/conexion.php';
	include '../../../funciones/general/funciones_guardar.php';
	// id_usuario - nombre - email - password - repetir - acepta_terminos - acepta_email - fecha_actual

	$query = "UPDATE `usuario` $parametros_update WHERE `id` = '$id_usuario'";

	$resultado = $mysqli->query($query);

	header("Location: ../../../administracion/perfil.php?notificacion=modificacion_correcta");
?>