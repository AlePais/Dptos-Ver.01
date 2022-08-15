<?php
	include '../../../funciones/general/conexion.php';

	$n2_id=$_GET['n2_id'];
	$n3_tipo=$_GET['n3_tipo'];
	$query = "SELECT `n3_id`,`n3_nombre` FROM `nivel_3` WHERE `n2_id`=$n2_id AND `n3_tipo` = '$n3_tipo'";
	$resultado = $mysqli->query($query);

	$cad='[';
	while($lista_n3=$resultado->fetch_array(MYSQLI_ASSOC))
	{
	$lista_n3['n3_nombre'] = htmlentities($lista_n3['n3_nombre']);
	$cad.="{'id':'".$lista_n3['n3_id']."',";
	$cad.="'nombre':'".$lista_n3['n3_nombre']."'},";
	}
	$cad.=']';
	
	echo $cad;
?>