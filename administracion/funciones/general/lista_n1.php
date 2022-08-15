<?php
	include '../../../funciones/general/conexion.php';
	
	$n1_tipo=$_GET['n1_tipo'];
	$query = "SELECT `n1_id`,`n1_nombre` FROM `nivel_1` WHERE `n1_tipo` = '$n1_tipo'";
	$resultado = $mysqli->query($query);

	$cad='[';
	while($lista_n1=$resultado->fetch_array(MYSQLI_ASSOC))
	{
	$lista_n1['n1_nombre'] = htmlentities($lista_n1['n1_nombre']);
	$cad.="{'id':'".$lista_n1['n1_id']."',";
	$cad.="'nombre':'".$lista_n1['n1_nombre']."'},";
	}
	$cad.=']';
	
	echo $cad;

?>