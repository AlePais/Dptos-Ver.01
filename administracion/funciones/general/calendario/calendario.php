<?php
	include_once '../../../../funciones/general/conexion.php';

	$month = $_POST['month'];
	$year = $_POST['year'];
	$id_departamento = $_POST['id_departamento'];
	$operacion = $_POST['operacion'];
	if($operacion == "calendario")
	{
		draw_calendar_v1($month,$year, $id_departamento);
	}
	if($operacion == "reserva")
	{
		reservas($month,$year, $id_departamento);
	}

	function crear_calendario($month,$year,$calendar)
	{
		$primer_dia = date('w',mktime(0,0,0,$month,1,$year)); // w devuelve el numero del dia de la semana en que arranca el mes 0->domingo, 6->sabado
		$dias_del_mes = date('t',mktime(0,0,0,$month,1,$year)); //t devuelve el numero de dias del mes
		$dia = 1; //N° dia del mes
		$semana = 0; //N° semana del mes semana del mes

		for ($dia_de_semana = 0; $dia_de_semana < $primer_dia; $dia_de_semana++)
		{
			$calendar [$semana][$dia_de_semana] = 0;
		}

		// Procedemos con los dias
		while ($dia <= $dias_del_mes)
		{
			while($dia_de_semana < 7)
			{
				if ($dia <= $dias_del_mes)
				{
					$calendar [$semana][$dia_de_semana] = $dia;
				}
				else
				{
					$calendar [$semana][$dia_de_semana] = 0;
				}
				$dia_de_semana++;
				$dia++;
			}
			$dia_de_semana = 0;
			$semana++;
		}
		return $calendar;
	}

	function draw_calendar_v1($month,$year, $id_departamento)
	{
		global $mysqli;
		$query = "SELECT * FROM `reserva` WHERE `id_departamento` = '$id_departamento'";
		$resultado = $mysqli->query($query);
		if($resultado->num_rows>0)
		{
			for($i=1; $datos=$resultado->fetch_array(MYSQLI_ASSOC); $i++ )
			{
				$id_reserva = $datos['id_reserva'];
				$in = $datos['in_fecha'];
				$out = $datos['out_fecha'];
				$estado = $datos['estado'];
				
				switch($estado)
				{
					case 'pago_confirmado':
						$var_color = 'green';
						break;
					case 'pago_pendiente':
						$var_color = 'yellow';
						break;
				}
				
				$inicio = new DateTime($in);
				$intervalo = new DateInterval('P1D');
				$fin = new DateTime($out);
				$periodo= new DatePeriod($inicio, $intervalo, $fin);

				foreach ($periodo as $key => $value)
				{
					$reserva[] = $value->format('Y-m-d');
					$clave = array_search($value->format('Y-m-d'), $reserva);
					$color[$clave] = $var_color;
				}
			}
		}

		$calendar = array(array());
		$cal_size = 0;
		$semana = 0;
		$cell = 1;

		$calendar = crear_calendario($month,$year,$calendar);
		// Longitud del Calendario incluyendo espacios en blanco, con llamada recursiva para que sea completo;
		// Al ser recursivo nos suma tambien los renglones que son los arrays padres de las celdas, entonces restamos
		$cal_size =	count($calendar,COUNT_RECURSIVE) - count($calendar); 

		$year_ant = $year;
		$year_sig = $year;

		switch ($month)
		{
			case 1:
				$month_ant = 12;
				$month_sig = 2;
				$year_ant = $year-1;
				break;
			case (1 < $month && $month < 12):
				$month_ant = $month-1;
				$month_sig =$month+1;
				break;
			case 12:
				$month_ant = 11;
				$month_sig = 1;
				$year_sig = $year+1;
				break;
		}
				
		if($month == 1)
		{
			$month_ant = 12;
			$year_ant = $year-1;
		}
		//Creamos la tabla
		$tabla = '<table style="width:50%" class="calendario">';
		
		//Imprime $month and $year
		switch ($month)
		{  // Obtenemos el nombre en castellano del mes
			case 1:
				$month_name = "Enero";
				break;
			case 2:
				$month_name = "Febrero";
				break;
			case 3:
				$month_name = "Marzo";
				break;
			case 4:
				$month_name = "Abril";
				break;
			case 5:
				$month_name = "Mayo";
				break;
			case 6:
				$month_name = "Junio";
				break;
			case 7:
				$month_name = "Julio";
				break;
			case 8:
				$month_name = "Agosto";
				break;
			case 9:
				$month_name = "Septiembre";
				break;
			case 10:
				$month_name = "Octubre";
				break;
			case 11:
				$month_name = "Noviembre";
				break;
			case 12:
				$month_name = "Diciembre";
		}
		// Primer renglon de la tabla (table row tr) con colspan para abarcar todo el renglon
		$tabla = $tabla.'<input type="button" value="ant" onClick=cargar_datos('.$month_ant.','.$year_ant.','.$id_departamento.')>';
		$tabla = $tabla.'<tr style="background-color:CornflowerBlue; color:white;"><th colspan = "7"; >'.$month_name.' '.$year.'</th></tr>';
		$tabla = $tabla.'<input type="button" value="sig" onClick="cargar_datos('.$month_sig.','.$year_sig.','.$id_departamento.')">';

		//Creamos las celdas de los nombres de los dias de la semana
		$tabla = $tabla.'<tr style="background-color:Azure;">';
		$tabla = $tabla.'<th>Domingo</th><th>Lunes</th><th>Martes</th><th>Miercoles</th><th>Jueves</th><th>Viernes</th><th>Sabado</th></tr>';

		//Creamos las celdas de los dias de la semana
		while ($cell <= $cal_size)
		{
			$tabla = $tabla."<tr>";
			for ($dia=0;$dia<7;$dia++)
			{
				$month= sprintf("%02d",$month);
				$calendar[$semana][$dia] = sprintf("%02d",$calendar[$semana][$dia]);
				
				if ($calendar[$semana][$dia]!=0)
				{
					$fecha_campo = $year."-".$month."-".$calendar[$semana][$dia];
					$background='';
					$funcion='';
					if(isset($reserva) && in_array($fecha_campo, $reserva))
					{
						$clave = array_search($fecha_campo, $reserva);
						$background = $color[$clave];
						$funcion = "onClick='tratamiento(this.id)'";
					}
					$tabla = $tabla."<td style='background-color:".$background."' id='".$year."-".$month."-".$calendar[$semana][$dia]."' ".$funcion.">".$calendar[$semana][$dia]."</td>";
				}
				else
				{
					$tabla = $tabla."<td></td>";
				}
				$cell++;
			}
			$semana++;
			$tabla = $tabla."</tr>";
		}
		$tabla = $tabla."</table>";
		echo $tabla;
	}

function reservas($month,$year,$id_departamento)
{
	global $mysqli;

	$reserva = "<h2>Pagos confirmados</h2>";
	$reserva = $reserva."<p>Listado de personas confirmados </p>";
	$query = "SELECT * FROM `reserva` WHERE `id_departamento`='$id_departamento' AND `estado` = 'pago_confirmado' AND MONTH(`in_fecha`) = '$month' ORDER BY `in_fecha` ASC";
	$resultado = $mysqli->query($query);
	while($confirmados = $resultado->fetch_array(MYSQLI_ASSOC))
	{
		$in_fecha = date("d/m/Y", strtotime($confirmados['in_fecha']));
		$out_fecha = date("d/m/Y", strtotime($confirmados['out_fecha']));
		$nombre = $confirmados['nombre'];
		$apellido = $confirmados['apellido'];
		$reserva = $reserva."<li>".$nombre." ".$apellido." del ". $in_fecha ." al ". $out_fecha."</li>";
	}
	$reserva = $reserva."<br>";
	$reserva = $reserva."<h2>Pagos pendientes </h2>";
	$reserva = $reserva."<p> Listado de personas a confirmar </p>";
	$query = "SELECT * FROM `reserva` WHERE `id_departamento`='$id_departamento' AND `estado` = 'pago_pendiente' AND MONTH(`in_fecha`) = '$month' ORDER BY `in_fecha` ASC";
	$resultado = $mysqli->query($query);
	while($pendientes = $resultado->fetch_array(MYSQLI_ASSOC))
	{
		$in_fecha = date("d/m/Y", strtotime($pendientes['in_fecha']));
		$out_fecha = date("d/m/Y", strtotime($pendientes['out_fecha']));
		$nombre = $pendientes['nombre'];
		$apellido = $pendientes['apellido'];
		$reserva = $reserva."<li>".$nombre." ".$apellido." del ". $in_fecha ." al ". $out_fecha."</li>";
	}
	$link_reservas="reservas.php?id_departamento=".$id_departamento;
	$link_history="reservas_history.php?id_departamento=".$id_departamento;
	$reserva = $reserva."<div class='boton_agregar2'><a href='".$link_reservas	."'>Ver TODOS</a></div>";
	$reserva = $reserva."<div class='boton_agregar2'><a href='".$link_history	."'>Ver Historial</a></div>";
	echo $reserva;
}

// function color($numero)
// {
	// switch($numero)
	// {
		// case 1:
			// $color = 'blue';
			// break;
		// case 2:
			// $color = 'red';
			// break;
		// case 3:
			// $color = 'green';
			// break;
		// case 4:
			// $color = 'yellow';
			// break;
		// case 5:
			// $color = 'brown';
			// break;
		// case 6:
			// $color = 'blue';
			// break;
		// case 7:
			// $color = 'red';
			// break;
		// case 8:
			// $color = 'green';
			// break;
		// case 9:
			// $color = 'yellow';
			// break;
		// case 10:
			// $color = 'brown';
			// break;
		// default:
			// $color = 'white';
			// break;
	// }
	// return $color;
// }
?>