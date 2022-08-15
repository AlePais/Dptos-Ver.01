<?php

	//Inicion sesion para utilizacion de datos de usuario logueado
	session_start();
	
	include '../../../funciones/general/conexion.php';
	include '../general/formato-imagen.php';
	include '../../../funciones/general/funciones_guardar.php';
	$nombre_corregido= corrige_texto($nombre);

	if($id == 0)
	{
		$query = "INSERT INTO `categorias` (`id`, `nombre`, `nombre_corregido`, `descripcion`, `tipo`, `fecha_carga`, `fecha_modificacion`) VALUES ('', '$nombre', '$nombre_corregido', '$descripcion', '$tipo', '$fecha_actual', '0000-00-00 00:00:00.000000');";
		$mysqli->query($query);
		$id= $mysqli->insert_id;
		header("Location: ../../servicios.php?notificacion=carga_correcta");
	}
	else
	{
		$query="UPDATE `categorias` SET `nombre` = '$nombre', `nombre_corregido` = '$nombre_corregido', `descripcion` = '$descripcion', `fecha_modificacion` = '$fecha_actual' WHERE `id` = $id";
		$mysqli->query($query);
		header("Location: ../../servicios.php?servicio=$nombre_corregido&notificacion=modificacion_correcta");
	}
	
	
	imagenes();
	
	function imagenes()
	{
		global $mysqli; global $fecha_actual; global $id; global $nombre;  global $nombre_corregido;  global $cambia_portada;  global $cambia_contratapa; 
		
		$query = "SELECT * FROM `sub_categorias` WHERE `id_categoria` = '$id' AND `tipo` LIKE 'imagen' ORDER BY `descripcion` DESC";
		$resultado = $mysqli->query($query);
		$dato = $resultado->fetch_array(MYSQLI_ASSOC);
		$ultimo= $dato['descripcion'];
		$i=$ultimo+1;
		
		foreach($_FILES as $file)
		{	
			if ($file["tmp_name"] != "")
			{
				$destino="../../../interfaz/servicios/";
				$nombre_original=$file["name"];
				$trozos = explode(".", $nombre_original); 
				$extension = end($trozos);
				$nombre_imagen = $nombre_corregido."-".$i;
				$nombre_archivo = $nombre_corregido."-".$i.".".$extension;
				$descripcion = $i;
				$nombre_temp=$file["tmp_name"];
				move_uploaded_file ($nombre_temp, $destino.$nombre_archivo);
					
				$query1 = "INSERT INTO `sub_categorias` (`id`, `nombre`, `nombre_corregido`, `descripcion`, `id_categoria`, `tipo`, `fecha_carga`, `fecha_modificacion`) VALUES ('', '$nombre_imagen', '$nombre_archivo', '$descripcion', '$id', 'imagen', '$fecha_actual', '0000-00-00 00:00:00.000000')";
					
				$mysqli->query($query1);

				$subcarpeta = "../../../../interfaz/temporal/";

				formateo_imagenes($nombre_archivo, $destino, "980", "1000000");

				$i++;
			}
		}
	}
?>