<?php
	include '../../general/conexion.php';
	include '../../general/funciones_guardar.php';

	$codigo_unico = $_POST['codigo_unico'];
	$tipo = $_POST['tipo'];
	$fecha_actual = date("Y-m-d H:i:s");
	$i=0;
	//Recorro el array de archivos
	foreach($_FILES as $index => $file)
	{
		// nombre original del archivo y extension
		$nombre = pathinfo($file['name'], PATHINFO_FILENAME);
		$extension = pathinfo($file['name'], PATHINFO_EXTENSION);
		// corrijo en el nombre de archivo caracteres que no lee script
		$nombre_archivo = corrige_texto($nombre).".".$extension;
		
		// nombre temporal del archivo
		$nombre_temporal = $file['tmp_name'];
		
		$carpeta_destino='funciones/contacto/subir_archivos/temporal/';
		$a='funciones/contacto/subir_archivos/temporal/';
		
		// check whether file has temporary path and whether it indeed is an uploaded file
		if(!empty($nombre_temporal) && is_uploaded_file($nombre_temporal))
		{
			// move the file from the temporary directory to somewhere of your choosing
			move_uploaded_file($nombre_temporal, $raiz.$carpeta_destino.$nombre_archivo);
		}
		$query = "INSERT INTO `$tipo` (`nombre`, `corregido`, `carpeta`, `tabla`, `id_tabla`, `orden`, `fecha_carga`) VALUES ('$codigo_unico','$nombre_archivo', '$carpeta_destino', 'temporal', '', '1', '$fecha_actual')";

		$mysqli->query($query);

		$archivos[$i]['id_elemento'] = $mysqli->insert_id;
		$archivos[$i]['nombre'] = $nombre;
		$archivos[$i]['corregido'] = $nombre_archivo;
		$archivos[$i]['carpeta'] = $carpeta_destino;
		$archivos[$i]['icono'] = src_icono($extension);
		$i++;
	}

	echo json_encode($archivos);

	function src_icono($variable)
	{
		switch($variable)
		{
			case 'pdf':
				$icono = 'pdf.png';
				break;
			case 'doc':
				$icono = 'word.png';
				break;
			case 'docx':
				$icono = 'word.png';
				break;
			case 'xls':
				$icono = 'excel.png';
				break;
			case 'xlsx':
				$icono = 'excel.png';
				break;
			case 'ppt':
				$icono = 'powerpoint.png';
				break;
			case 'pptx':
				$icono = 'powerpoint.png';
				break;
			case 'png' || 'jpg' || 'gif':
				$icono = 'imagen.png';
				break;
			default:
				$icono= 'archivo.png';
				break;
		}
		return $icono;
	}
?>
