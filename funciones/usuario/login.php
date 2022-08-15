<?php
	include '../general/conexion.php';

	$email=$_POST["email"];
	$tipo=$_POST["tipo"];
	echo $url_actual=$_POST["url_actual"];

	if($tipo=='huesped')
	{
		$query = "SELECT * FROM `agenda` WHERE `email`='$email'";
		$resultado = $mysqli->query($query);

		if($resultado->num_rows == 1)
		{
			$usuario= $resultado->fetch_array(MYSQLI_ASSOC);
			$_SESSION['id_agenda']=$usuario['id_agenda'];
			$_SESSION['id_depto']=$usuario['n3_id'];
			
			
		 	$query2 = "SELECT * FROM `archivo` WHERE `tabla_asociada` LIKE 'agenda' AND `id_elemento` = '".$usuario['id_agenda']."' ORDER BY `orden` ";
			$resultado2 = $mysqli->query($query2);
			if($resultado2->num_rows==0)
			{
				$imagen_usuario = "interfaz/diseno/sin_imagen.jpg";
			}
			else
			{
				$imagen= $resultado2->fetch_array(MYSQLI_ASSOC);
				$imagen_usuario = $imagen['carpeta'].$imagen['archivo'];
			}
			$_SESSION['imagen_usuario']=$imagen_usuario;
			header("Location: $url_actual");
		}
	}
?>