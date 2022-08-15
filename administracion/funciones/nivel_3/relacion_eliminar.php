<?php
	include '../../../funciones/general/conexion.php';

	$id_relacion=$_GET['id_relacion'];

	$query="DELETE FROM `relaciones` WHERE `id_relacion`='$id_relacion'";
	$resultado=$mysqli->query($query);
?>