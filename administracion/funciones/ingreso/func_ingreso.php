<?php
	include '../../../funciones/general/conexion.php';

	$nombre=$_POST["nombre"];
	$password=$_POST["password"];

	$query = "SELECT `id`,`nombre` FROM `usuario` WHERE `nombre`='$nombre' AND `password`='$password'";
	$resultado = $mysqli->query($query);

	if($resultado->num_rows == 1)
	{
		$usuario= $resultado->fetch_array(MYSQLI_ASSOC);
		$_SESSION['id_usuario']=$usuario['id'];
		$_SESSION['nombre_usuario']=$usuario['nombre'];
		header("Location: ../../perfil.php");
	}
	else
	{
		// header("Location: ../../ingreso.php?error");
	}

	desconectar();
?>