<?php
	include '../../../funciones/general/conexion.php';
	include '../../../funciones/general/funciones_guardar.php';
	
	$query = "SELECT * FROM `agenda_representantes_relaciones` WHERE `id_agenda_representantes` = '$id_agenda_representantes' AND `n1_id` = '$n1_id_depto' AND `n2_id` = '$n2_id_depto' AND`n3_id` = '$n3_id_depto'";
	$resultado = $mysqli -> query ($query);
	
	if($resultado->num_rows==0)
	{
		if($id_agenda_representantes==0)
		{
			$query="INSERT INTO `agenda_representantes_relaciones` (`n1_id`, `n2_id`, `n3_id`) VALUES ('$n1_id_depto','$n2_id_depto','$n3_id_depto')";
			$resultado = $mysqli -> query ($query);
		}
		else
		{
			$query="INSERT INTO `agenda_representantes_relaciones` (`id_agenda_representantes`,`n1_id`, `n2_id`, `n3_id`) VALUES ('$id_agenda_representantes','$n1_id_depto', '$n2_id_depto', '$n3_id_depto')";
			$resultado = $mysqli -> query ($query);
		}
	}
?>