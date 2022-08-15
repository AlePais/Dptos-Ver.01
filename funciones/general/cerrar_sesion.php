<?php
	//Inicio seccion para guardar valores de formulario y pasarlos de pagina a pagina
	session_start();

	include '../../../funciones/general/conexion.php';

	unset($_SESSION["id_usuario"]); 
	session_destroy();

	header("Location: ".$raiz."administracion/ingreso.php");
?>
