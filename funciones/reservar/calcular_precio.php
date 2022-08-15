<?php
	include '../general/conexion.php';
	include '../general/funciones_guardar.php';
	// include '../general/crea_variables.php';
	// include '../../administracion/funciones/general/bd_basico.php';
	// include '../general/phpmailer/class.phpmailer.php';

	$query = "SELECT `dolar` FROM `usuario` WHERE `id` = '1'"; $resultado = $mysqli->query($query); $dolar = $resultado->fetch_row();
	$dolar = $dolar[0];

	$query = "SELECT * FROM `general` WHERE `identificador_tabla` LIKE 'n3_id' AND `id_elemento` = '$id_departamento'";
	$resultado = $mysqli->query($query);

	while($otros_datos = $resultado->fetch_array(MYSQLI_ASSOC))
	{
		$nombre_campo = $otros_datos['nombre'];
		$extras[$nombre_campo] = $otros_datos['contenido'];
	}

	//Chequeo de cantidad de huspedes y descuento
	if(isset($extras['max_huespedes']) && $extras['max_huespedes'] < $cant_huespedes)
	{
		echo "cantidad de huespedes mayor al maximo";
	}
	else
	{
		$query = "SELECT * FROM `descuentos_personas` WHERE `id_departamento` = '$id_departamento' AND `personas` <= '$cant_huespedes' ORDER BY `personas` DESC";
		$resultado = $mysqli->query($query);
		if($resultado->num_rows==0)
		{
			$precio_dia = $extras['precio'];
		}
		else
		{
			$datos = $resultado->fetch_array(MYSQLI_ASSOC);
			$coef_desc_pers = 1-($datos['descuento']/100);
			$precio_dia = $extras['precio']*$coef_desc_pers;			
		}
	}

	//Chequeo de cantidad de huspedes y descuento
	$precio_adicionales_dia=0;
	foreach($adicional_departamento as $nombre_dato=>$datos)
	{
		$corregido = $datos['corregido'];

		if(isset($$corregido))
		{
			$query="SELECT * FROM `adicional_departamento` WHERE `departamento_asociado` = '$id_departamento' AND `nombre` LIKE '$corregido' AND `estado` != 3";
			$resultado = $mysqli->query($query);
			if($resultado->num_rows>0)
			{
				$datos_extra = $resultado-> fetch_array(MYSQLI_ASSOC);
				if($datos_extra['estado']!=1 || $datos_extra['valor']!=0)	
				{
					switch($datos_extra['unidad'])
					{
						case 1:// $unidad='%';
							$coef_adicional = 1+($datos_extra['valor']/100);
							$precio_adicionales_dia = $precio_adicionales_dia+$precio_dia*$coef_adicional;
							break;
						case 2:
							$precio_adicionales_dia = $precio_adicionales_dia+$datos_extra['valor'];
							break;
						case 3:
							$precio_adicionales_dia = $precio_adicionales_dia+$datos_extra['valor']/$dolar;
							break;
					}
				}
			}
		}
	}
	// echo $precio_adicionales_dia;

	//cantidad de dias y descuento
    $inicio = strtotime($in_fecha);
    $fin = strtotime($out_fecha);
    $dif = $fin - $inicio;
    $cant_dias = (( ( $dif / 60 ) / 60 ) / 24);
	
	$query = "SELECT * FROM `descuentos_dias` WHERE `id_departamento` = $id_departamento AND `dias` >= '$cant_dias' ORDER BY `dias` ASC";
	$resultado = $mysqli->query($query);
	if($resultado->num_rows==0)
	{
		$precio_dia = $precio_dia;
	}
	else
	{
		$datos = $resultado->fetch_array(MYSQLI_ASSOC);
		$coef_desc_dias = 1-($datos['descuento']/100);
		$precio_dia = $precio_dia*$coef_desc_dias;
	}

		echo $precio_total = intval($cant_dias*($precio_dia+$precio_adicionales_dia));
?>
