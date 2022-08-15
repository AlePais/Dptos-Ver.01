<?php
	//Incluyo funciones generales del sitio
	include 'funciones/general/conexion.php'; include 'funciones/general/cabecera.php'; include 'funciones/general/pie_de_pagina.php';

	$status=$_GET['status']; $nombre=$_GET['nombre']; $apellido=$_GET['apellido']; $id_reserva=$_GET['id_reserva'];
	
	if($status == 'ok')
	{
		$query="UPDATE `reserva` SET `estado` = 'pago_confirmado' WHERE `id_reserva` = '$id_reserva' AND `nombre` = '$nombre' AND `apellido` = '$apellido'";
		$resultado = $mysqli->query($query);
		if($mysqli->affected_rows>0)
		{
			$mensaje = " El pago se realizo correctamente";
		}
		else
		{
			$mensaje = "Ha ocurrido un error, consulte a info@departamentosenalquiler.com.ar";
		}
	}
	if($status == 'error')
	{
		$query="UPDATE `reserva` SET `estado` = 'error_pago' WHERE `id_reserva` = '$id_reserva' AND `nombre` = '$nombre' AND `apellido` = '$apellido'";
		$mensaje = " El pago no se ha procesado, intente nuevamente mas tarde o comuniquese con info@departamentosenalquiler";
	}
?>
<html>
	<head>
		<?php cabecera()?>
	</head>
	<body>
		<!-- bloque de encabezado-->
		<?php include 'funciones/general/encabezado.php';?>

		<!--Bloque cuerpo -->
		<div id="contenedor" class="gris_claro" style="<?php echo $fondo?>">
			<br><br><br><br><br><br><br>
			<?php echo $mensaje?>
			<br><br><br><br><br><br><br>
			<div class="seccion_autoc"></div>
			<?php pie_de_pagina()?>	
		</div>
	</body>
</html>