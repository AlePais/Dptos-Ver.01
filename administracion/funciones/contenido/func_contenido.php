<?php
	//Inicion sesion para utilizacion de datos de usuario logueado
	session_start();

	include '../../../funciones/general/conexion.php';
	include '../general/formato-imagen.php';
	include '../../../funciones/general/funciones_guardar.php';

	if($pagina!='index.php')
	{
		if($_FILES['imagen_1']["tmp_name"]!='')
		{
			$destino="../../../interfaz/diseno/";
			$nombre_original=$_FILES["imagen_1"]["name"];
			$trozos = explode(".", $nombre_original);
			$extension = end($trozos);
			$pagina_corregida = str_replace("seccion_", "", $pagina);
			$pagina_corregida = str_replace(".php", "", $pagina);
			$nombre_archivo = "fondo_".$pagina_corregida.".".$extension;
			$nombre_temp=$_FILES["imagen_1"]["tmp_name"];
			move_uploaded_file ($nombre_temp, $destino.$nombre_archivo);
		}
	}
	else
	{
		imagenes();	
	}

	if(isset($titulo))
	{
		$query = "UPDATE `contenido` SET `texto` = '$titulo' WHERE `tipo` = 'titulo' AND `pagina` = '$pagina'";
		$resultado = $mysqli->query($query);
	}

	if(isset($descripcion))
	{
		$query = "UPDATE `contenido` SET `texto` = '$descripcion' WHERE `tipo` = 'descripcion' AND `pagina` = '$pagina'";
		$resultado = $mysqli->query($query);
	}

	if(isset($contenido))
	{
		$query = "UPDATE `contenido` SET `texto` = '$contenido' WHERE `tipo` = 'contenido' AND `pagina` = '$pagina'";
		$resultado = $mysqli->query($query);
	}

	if(isset($contenido_2))
	{
		$query = "UPDATE `contenido` SET `texto` = '$contenido_2' WHERE `tipo` = 'contenido_2' AND `pagina` = '$pagina'";
		$resultado = $mysqli->query($query);
	}
	header("Location: ../../contenido.php?pagina=$pagina&notificacion=modificacion_correcta");

	function imagenes()
	{
		global $mysqli, $pagina;
		foreach($_FILES as $file)
		{	
			if ($file["tmp_name"] != "")
			{
				$query = "SELECT * FROM `contenido` WHERE `pagina` LIKE 'index.php' AND `tipo` = 'galeria' ORDER BY `orden` DESC";
				$resultado = $mysqli->query($query);
				$numero_orden = $resultado->fetch_array(MYSQLI_ASSOC);
				if($numero_orden['orden']=='')
				{
					 $numero_orden['orden'] = 0;
				}
				$numero = $numero_orden['orden']+1;

				$destino="../../../interfaz/diseno/";
				$nombre_original=$file["name"];
				$trozos = explode(".", $nombre_original); 
				$extension = end($trozos);
				$nombre_imagen = 'index';
				$nombre_archivo = $nombre_imagen."-".$numero.".".$extension;

				$n4_nombre_temp=$file["tmp_name"];
				move_uploaded_file ($n4_nombre_temp, $destino.$nombre_archivo);

				$query1 = "INSERT INTO `contenido` (`id`, `pagina`, `tipo`, `texto`, `orden`) VALUES ('', '$pagina', 'galeria', '$nombre_archivo', '$numero');";
				$mysqli->query($query1);
				$subcarpeta = "../../../../interfaz/temporal/";
				formateo_imagenes($nombre_archivo, $destino, "980", "1000000");
			}
		}
	}
?>
