<?php
	include_once 'conexion.php';
	include_once 'funciones_guardar.php';

	$_SESSION['n1_id']=0;
	$_SESSION['n2_id']=0;
	$_SESSION['tipo_alojamiento']=0;

	if(isset($tipo_alojamiento) && $tipo_alojamiento!='')
	{
		$_SESSION['n1_id']=$n1_id;
		$_SESSION['n2_id']=$n2_id;
		$_SESSION['tipo_alojamiento']=$tipo_alojamiento;

		$query = "SELECT * FROM `nivel_1` NATURAL JOIN `nivel_2` NATURAL JOIN `nivel_3` JOIN `general` ON general.id_elemento=nivel_3.n3_id WHERE nivel_3.n1_id = '$n1_id' AND nivel_3.n2_id = '$n2_id' AND general.nombre LIKE 'tipo_alojamiento' AND general.contenido = '$tipo_alojamiento'";
		$resultado=$mysqli->query($query);
		$datos = $resultado->fetch_array(MYSQLI_ASSOC);

		if($resultado->num_rows==1)
		{
			$location = $raiz.$datos['n1_corregido']."/".$datos['n2_corregido']."/".$datos['n3_corregido'];
		}
		else
		{
			$location = $raiz.$datos['n1_corregido']."/".$datos['n2_corregido'];
		}
	}
	else
	{
		if(isset($n2_id) && $n2_id!='')
		{
			$query = "SELECT * FROM `nivel_1` NATURAL JOIN `nivel_2` WHERE nivel_2.n2_id = '$n2_id'";
			$resultado=$mysqli->query($query);
			$datos = $resultado->fetch_array(MYSQLI_ASSOC);
			$_SESSION['n1_id']=$datos['n1_id'];
			$_SESSION['n2_id']=$datos['n2_id'];
			$location = $raiz.$datos['n1_corregido']."/".$datos['n2_corregido'];
		}
		else
		{
			$query = "SELECT * FROM `nivel_1` WHERE `n1_id` = '$n1_id'";
			$resultado=$mysqli->query($query);
			$datos = $resultado->fetch_array(MYSQLI_ASSOC);
			$_SESSION['n1_id']=$datos['n1_id'];
			$location = $raiz.$datos['n1_corregido']."/";
		}
	}
	header("Location: $location");
?>