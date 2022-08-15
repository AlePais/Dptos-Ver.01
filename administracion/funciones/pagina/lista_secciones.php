<?php
	include '../../../funciones/general/conexion.php';
	include '../../../funciones/general/funciones_guardar.php';
	
	$i=0;
	$query = "SELECT * FROM `seccion` WHERE `nombre_seccion` != NULL OR `nombre_seccion` != ''";
	$resultado = $mysqli->query($query);
	//Recorro el array de archivos
	while($lista_elementos = $resultado->fetch_array(MYSQLI_ASSOC))
	{
		$elementos[$i]['id_elemento'] = $lista_elementos['id_seccion'];
		$elementos[$i]['nombre'] = $lista_elementos['nombre_seccion'];
		$elementos[$i]['corregido'] = $lista_elementos['corregido_seccion'];
		$i++;
	}

	echo json_encode($elementos);
?>
