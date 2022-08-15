<?php
	include '../../../funciones/general/conexion.php';
	include '../../../funciones/general/funciones_guardar.php';
	
	$query = "SELECT * FROM `relaciones` WHERE `n1_id` = '$n1_id_depto' AND `n2_id` = '$n2_id_depto' AND`n3_id` = '$n3_id_depto' AND`n1_id_blog` = '$n1_id' AND `n2_id_blog` = '$n2_id' AND`n3_id_blog` = '$n3_id'";
	$resultado = $mysqli -> query ($query);
	
	if($resultado->num_rows==0)
	{
		if($n3_id==0)
		{
			$query="INSERT INTO `relaciones` (`n1_id`, `n2_id`, `n3_id`) VALUES ('$n1_id_depto','$n2_id_depto','$n3_id_depto')";
			$resultado = $mysqli -> query ($query);
		}
		else
		{
			$query="INSERT INTO `relaciones` (`n1_id`, `n2_id`, `n3_id`, `n1_id_blog`, `n2_id_blog`, `n3_id_blog`) VALUES ('$n1_id_depto', '$n2_id_depto', '$n3_id_depto', '$n1_id', '$n2_id', '$n3_id')";
			$resultado = $mysqli -> query ($query);
		}
	}
?>