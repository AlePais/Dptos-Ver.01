<?php
	$destino="../../../images/";
	$nombre_original=$_FILES["imagen_1"]["name"];
	$trozos = explode(".", $nombre_original); 
	$extension = end($trozos);
	$nombre_archivo = "banner.jpg";
	$nombre_temp=$_FILES["imagen_1"]["tmp_name"];
	move_uploaded_file ($nombre_temp, $destino.$nombre_archivo);
	header("Location: ../../contenido.php");
?>