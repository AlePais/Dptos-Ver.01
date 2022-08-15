<?php
	include '../../../../funciones/general/conexion.php';
	include '../../../../funciones/general/funciones_guardar.php';
	include '../../../../funciones/general/nombre_icono.php'; //funcion src_icono($variable) - devuelve TIPO_ARCHIVO.png

	$tabla = $_POST['tabla'];
	$tipo = $_POST['tipo'];
	$codigo_unico = $_POST['codigo_unico'];
	$i=0;

	//Recorro el array de archivos
	foreach($_FILES as $index => $file)
	{
		// nombre original del archivo y extension
		$nombre = pathinfo($file['name'], PATHINFO_FILENAME);
		$extension = pathinfo($file['name'], PATHINFO_EXTENSION);
		// corrijo en el nombre de archivo caracteres que no lee script
		$archivo = corrige_texto($nombre).".".$extension;
		
		// nombre temporal del archivo
		$nombre_temporal = $file['tmp_name'];
		
		$carpeta='administracion/funciones/general/subir_archivo/temporal/';
		$a='administracion/funciones/general/subir_archivo/temporal/';
		
		// check whether file has temporary path and whether it indeed is an uploaded file
		if(!empty($nombre_temporal) && is_uploaded_file($nombre_temporal))
		{
			if(file_exists($raiz.$carpeta.$archivo))
			{
				chmod($raiz.$carpeta.$archivo,0755); //cambio permiso de archivo existente si se llama igual que el que quiero subir
				unlink($raiz.$carpeta.$archivo); //elimino el archivo
			}
			// move the file from the temporary directory to somewhere of your choosing
			move_uploaded_file($nombre_temporal, $raiz.$carpeta.$archivo);
		}
		
		$query = "INSERT INTO `$tabla` (`carpeta`, `archivo`, `nombre`, `tipo`, `tabla_asociada`) VALUES ('$carpeta', '$archivo', '', '$tipo', 'temporal');";

		$mysqli->query($query);

		$archivos[$i]['id_archivo'] = $mysqli->insert_id;
		$archivos[$i]['carpeta'] = $carpeta;
		$archivos[$i]['archivo'] = $archivo;
		$archivos[$i]['nombre'] = '';
		$archivos[$i]['descripcion'] = '';
		$archivos[$i]['icono'] = src_icono($extension);
		$i++;
	}

	echo json_encode($archivos);
?>
