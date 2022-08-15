<?php
	include 'funciones/general/funciones_administracion.php';
	// Variables [$_GET $id_elemento-$nombre] [general $tipo-$codigo_unico-$vista_from-$vista_boton-$tipo_consulta(ej n1_tipo)]

	//tipo_consulta es para que pueda leer la fila vacia de la consulta
	$id_departamento = $_GET['id_departamento'];
	$query = "SELECT * FROM `nivel_3` WHERE `n3_id` = '$id_departamento'"; crear_variable($query);
	$titulo = 'Historial de Revervas'; $tabla = 'nivel_3';
	$n1_tipo='departamento_nivel_1'; $n2_tipo='departamento_nivel_2'; $n3_tipo='departamento_nivel_3'; $tipo=$n3_tipo;
	$fecha_actual = date("Y-m-d");
?>
<html>
	<head>
		<?php include 'funciones/general/cabecera_administracion.php';?>
		<script language="javascript" src="funciones/mensajes_recibidos/mensajes_recibidos.js"></script>
	</head>
	<body>
		<?php include "funciones/general/encabezado.php";?>	
		<div id='cuerpo'>
			<div class="seccion_auto ancho_fijo_auto">						
				<div class="contenedor ">
					<div id="encabezado_titulo">
						<img src="<?php echo $raiz?>interfaz/iconos/<?php echo $tipo;?>.png">
						<h1><?php echo $titulo;?></h1>
					</div>
					<table class="ancho_fijo" height="auto" align="top">
						<tr>
							<td class="contenedor" style="margin-top:0px !important;">
								<hr>
								<div class="filtros" >
									<form method="post" action="funciones/reserva/bd_reserva.php"  id='formulario' name='formulario'>
										<h2>Listado de reservas/pagos departamento <?php echo $n3_nombre?></h2>
										<p>Historial al <?php echo date("d/m/Y")?> </p>
									<?php
										$query = "SELECT * FROM `reserva` WHERE `id_departamento`='$id_departamento' AND `in_fecha` < '$fecha_actual' ORDER BY `in_fecha` ASC";

										$resultado = $mysqli->query($query);
										while($confirmados = $resultado->fetch_array(MYSQLI_ASSOC))
										{
											$in_fecha = date("d/m/Y", strtotime($confirmados['in_fecha']));
											$out_fecha = date("d/m/Y", strtotime($confirmados['out_fecha']));
											$id_reserva = $confirmados['id_reserva'];
											$nombre = $confirmados['nombre'];
											$apellido = $confirmados['apellido'];
											$estado = $confirmados['estado'];
											$select_confirmado='';$select_pendiente='';
											switch($estado)
											{
												case 'pago_confirmado';
													$texto = "Pago Confirmado";
													break;
												case 'pago_pendiente';
													$texto = "Pago Confirmado";
													break;
												case 'reserva_cancelada';
													$texto = "Reserva Cancelada";
													break;
											}
									?>
									<p>
										Nombre: <?php echo $nombre." ".$apellido?>
										Fecha Check IN:<?php echo $in_fecha?>
										Fecha Check OUT:<?php echo $out_fecha?>
										Estado:<?php echo $texto?>
									</p>
									<?php
										}
									?>
									<input type="submit" value="guardar cambios">
									</form>
								</div>	
								<div id='listado_mensajes'></div>		
							</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
		<div class="seccion_autoc"></div>
		<div id='pie_de_pagina'>
			<?php include "funciones/general/pie_de_pagina_me.php"; ?>	
		</div>
	</body>
</html>