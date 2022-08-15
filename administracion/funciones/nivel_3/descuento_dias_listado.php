<?php
	include '../../../funciones/general/conexion.php';

	$id_departamento=$_GET['id_departamento'];

	$query = "SELECT * FROM `descuentos_dias` WHERE `id_departamento` = '$id_departamento'";
	$resultado = $mysqli->query($query);

	$cad='[';
	while($lista=$resultado->fetch_array(MYSQLI_ASSOC))
	{
		$cad.="{'id':'".$lista['id']."',";
		$cad.="'dias':'".$lista['dias']."',";
		$cad.="'descuento':'".$lista['descuento']."'},";
	}
	$cad.=']';

	echo $cad;
?>