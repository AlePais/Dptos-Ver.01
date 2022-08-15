<?php
	//Mediante las variables de session se verifica si el usuario esta logueado
	session_start();

	$location = $_POST['url_actual'];

	$_SESSION['n1_id']=0;
	$_SESSION['n2_id']=0;
	if(isset($_POST['n1_idx']))
	{
		$_SESSION['n1_id']=$_POST['n1_idx'];
	}
	if(isset($_POST['n2_idx']))
	{
		$_SESSION['n2_id']=$_POST['n2_idx'];
	}

	header("Location: $location");
?>