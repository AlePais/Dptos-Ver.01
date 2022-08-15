<?php
	include '../../../../funciones/general/conexion.php';
	include '../../../../funciones/general/funciones_guardar.php';
	include '../../../../funciones/general/nombre_icono.php'; //funcion src_icono($variable) - devuelve TIPO_ARCHIVO.png

	$tabla = $_POST['tabla'];	//la tabla en la que guardo datos de archivo/imagen y ubicacion
	$tabla_asociada = $_POST['tabla_asociada'];	//tabla del elemento al que le pertenece el archivo/imagen
	$id_elemento = $_POST['id_elemento'];
	$categoria = $_POST['categoria'];
	$codigo_unico = $_POST['codigo_unico'];

	$i=0;
	$query = "SELECT * FROM `$tabla` WHERE `categoria` LIKE '$categoria' AND `tabla_asociada` LIKE '$tabla_asociada' AND `id_elemento` = '$id_elemento' OR `nombre` LIKE '$codigo_unico' ORDER BY `orden`";
	$resultado = $mysqli->query($query);
	//Recorro el array de archivos
	if($resultado->num_rows!=0)
	{
		while($lista_elementos = $resultado->fetch_array(MYSQLI_ASSOC))
		{
			$nombre_elemento='';
			$descripcion_elemento='';

			$extension = explode(".", $lista_elementos['archivo']);
			$icono = src_icono(end($extension));

			$archivos[$i]['id_archivo'] = $lista_elementos['id_archivo'];
			$archivos[$i]['carpeta'] = $lista_elementos['carpeta'];
			$archivos[$i]['archivo'] = $lista_elementos['archivo'];
			$archivos[$i]['nombre'] = $lista_elementos['nombre'];
			$archivos[$i]['descripcion'] = $lista_elementos['descripcion'];
			$archivos[$i]['icono'] = $icono ;
			$i++;
		}
		echo json_encode($archivos);
	}
?>