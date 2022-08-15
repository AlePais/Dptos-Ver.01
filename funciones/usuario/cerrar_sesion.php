<?php
	include '../general/conexion.php';
	session_destroy();
	header("Location: $raiz");
?>