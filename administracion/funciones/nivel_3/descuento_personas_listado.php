<?php
	include '../../../funciones/general/conexion.php';

	$id_departamento=$_GET['id_departamento'];

	$query = "SELECT * FROM `descuentos_personas` WHERE `id_departamento` = '$id_departamento'";
	$resultado = $mysqli->query($query);

	$cad='[';
	while($lista=$resultado->fetch_array(MYSQLI_ASSOC))
	{
		$cad.="{'id':'".$lista['id']."',";
		$cad.="'personas':'".$lista['personas']."',";
		$cad.="'descuento':'".$lista['descuento']."'},";
	}
	$cad.=']';

	echo $cad;
?>