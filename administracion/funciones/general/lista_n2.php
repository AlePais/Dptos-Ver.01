<?php
	include '../../../funciones/general/conexion.php';

	$n1_id=$_GET['n1_id'];
	$n2_tipo=$_GET['n2_tipo'];
	$query = "SELECT `n2_id`,`n2_nombre` FROM `nivel_2` WHERE `n1_id`=$n1_id AND `n2_tipo` = '$n2_tipo'";
	$resultado = $mysqli->query($query);

	$cad='[';
	while($lista_n2=$resultado->fetch_array(MYSQLI_ASSOC))
	{
	$lista_n2['n2_nombre'] = htmlentities($lista_n2['n2_nombre']);
	$cad.="{'id':'".$lista_n2['n2_id']."',";
	$cad.="'nombre':'".$lista_n2['n2_nombre']."'},";
	}
	$cad.=']';
	
	echo $cad;

?>