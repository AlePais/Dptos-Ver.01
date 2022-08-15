<?php
	if(isset($_SESSION['n2_id']) && $_SESSION['n2_id']!=0)
	{
		$n2_id_depto=$_SESSION['n2_id'];
		$query="SELECT n1_id,n2_id, n2_nombre FROM `nivel_1` NATURAL JOIN nivel_2  WHERE nivel_2.n2_id='$n2_id_depto'";
		$nivel='nivel_2';
		$prefijo='n2';
	}
	else
	{
		$n2_id_depto=0;
		$nivel='nivel_1';
		$prefijo='n1';

		if(isset($_SESSION['n1_id']) && $_SESSION['n1_id']!=0)
		{
			if(isset($_SESSION['n1_id']) && $_SESSION['n1_id']!=0)
			{
				$n1_id_depto=$_SESSION['n1_id'];
				$clausula_1="`n1_id`= '$n1_id_depto'";
			}
			else
			{
				$clausula_1="1";
			}
			$query="SELECT `n1_id`, `n1_nombre` FROM `nivel_1` WHERE $clausula_1";
		}
		else
		{
			$query="SELECT `n1_id`, `n1_nombre` FROM `nivel_1` WHERE `n1_tipo` LIKE 'departamento_nivel_1' ORDER BY `n1_orden` ASC";
		}
	}
	$resultado=$mysqli->query($query);
	$datos_zona=$resultado->fetch_array(MYSQLI_ASSOC);

	$n1_id_depto=$datos_zona['n1_id'];
	if(isset($datos_zona['n2_id']))
	{
		$n2_id_depto=$datos_zona['n2_id'];
	}

	$campo_id=$prefijo.'_id';
	$id_zona=$datos_zona[$campo_id];
	$campo_nombre=$prefijo.'_nombre';
	$nombre_zona=$datos_zona[$campo_nombre];

	$query2 = "SELECT * FROM `archivo` WHERE `tabla_asociada` LIKE '$nivel' AND `id_elemento` = '$id_zona' ORDER BY `orden`";
	$resultado2 = $mysqli -> query($query2);
	if($resultado2->num_rows==0)
	{
		$imagen_zona = $raiz."interfaz/diseno/sin_imagen.jpg";
	}
	else
	{
		$imagen_zona = $resultado2->fetch_array(MYSQLI_ASSOC);
		$imagen_zona = $raiz.$imagen_zona['carpeta'].$imagen_zona['archivo']; 
	}		
?>