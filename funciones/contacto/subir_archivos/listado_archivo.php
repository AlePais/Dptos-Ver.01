<?php
	include '../../../../funciones/general/conexion.php';
	include '../../../../funciones/general/funciones_guardar.php';

	$tabla_archivo = $_POST['tabla_archivo'];
	$tipo = $_POST['tipo'];
	$id_elemento = $_POST['id_elemento'];
	$codigo_unico = $_POST['codigo_unico'];
	$fecha_actual = date("Y-m-d H:i:s");
	$i=0;
	$query = "SELECT * FROM `$tipo` WHERE `id_tabla` = '$id_elemento' AND `tabla` LIKE '$tabla_archivo' ORDER BY `orden`";
	$resultado = $mysqli->query($query);
	//Recorro el array de archivos
	while($lista_elementos = $resultado->fetch_array(MYSQLI_ASSOC))
	{
		$extension = explode(".", $lista_elementos['corregido']);
		$icono = src_icono(end($extension));

		$archivos[$i]['id_elemento'] = $lista_elementos['id_elemento'];
		$archivos[$i]['nombre'] = $lista_elementos['nombre'];
		$archivos[$i]['corregido'] = $lista_elementos['corregido'];
		$archivos[$i]['carpeta'] = $lista_elementos['carpeta'];
		$archivos[$i]['icono'] = $icono ;
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
