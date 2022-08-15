<?php
	include '../../general/conexion.php';

	$month = $_POST['month'];
	$year = $_POST['year'];
	$id_departamento = $_POST['id_departamento'];
	$in_fecha = $_POST['in_fecha'];
	$out_fecha = $_POST['out_fecha'];
	draw_calendar_v1($month,$year, $id_departamento, $in_fecha, $out_fecha);

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

	function draw_calendar_v1($month,$year, $id_departamento, $in_fecha, $out_fecha)
	{
		global $mysqli; global $fecha_actual_solo;
		$query = "SELECT * FROM `reserva` WHERE `id_departamento` = '$id_departamento' AND `estado` != 'reserva_cancelada'";
		$resultado = $mysqli->query($query);
		if($resultado->num_rows>0)
		{
			for($i=1; $datos=$resultado->fetch_array(MYSQLI_ASSOC); $i++ )
			{
				$id_reserva = $datos['id_reserva'];
				$check_in = $datos['in_fecha'];
				$check_out = $datos['out_fecha'];
				$estado = $datos['estado'];
				$var_color = "red";
				
				$inicio = new DateTime($check_in);
				$intervalo = new DateInterval('P1D');
				$fin = new DateTime($check_out);
				$periodo= new DatePeriod($inicio, $intervalo, $fin);

				foreach ($periodo as $key => $value)
				{
					$reserva[] = $value->format('Y-m-d');
					$clave = array_search($value->format('Y-m-d'), $reserva);
					$color[$clave] = $var_color;
				}
			}
		}

		if($in_fecha!='' && $out_fecha=='')
		{
			$inicio = new DateTime($in_fecha);

			$reserva[] = $inicio->format('Y-m-d');
			$clave = array_search($inicio->format('Y-m-d'), $reserva);
			$color[$clave] = 'blue';
		}
		
		if($in_fecha!='' && $out_fecha!='')
		{
			$inicio = new DateTime($in_fecha);
			$intervalo = new DateInterval('P1D');
			$fin = new DateTime($out_fecha);
			$periodo= new DatePeriod($inicio, $intervalo, $fin);

			foreach ($periodo as $key => $value)
			{
				$reserva[] = $value->format('Y-m-d');
				$clave = array_search($value->format('Y-m-d'), $reserva);
				$color[$clave] = 'blue';
			}
			//agrego dia que no entro en intervalo
			$reserva[] = $fin->format('Y-m-d');
			$clave = array_search($fin->format('Y-m-d'), $reserva);
			$color[$clave] = 'blue';
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
		echo '<table style="width:50%" class="calendario">';
		
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
		$boton_ant = "<input class='calendario_bleft' type='button' value='<' onClick='cambia_mes(".$month_ant.",".$year_ant.")'>";
		$boton_sig = "<input class='calendario_bright' type='button' value='>' onClick='cambia_mes(".$month_sig.",".$year_sig.")'>";
		
		echo "<tr class='caption'>";
		echo "<th colspan = '7'; >";
		echo $boton_ant;
		echo "<h1>$month_name</h1><h2>$year</h2>";		
		echo $boton_sig;
		echo "</th>	</tr>";

		//Creamos las celdas de los nombres de los dias de la semana
		echo '<tr CLASS="semana">';
		echo '<th>DOM</th><th>LUN</th><th>MAR</th><th>MIER</th><th>JUE</th><th>VIE</th><th>SAB</th></tr>';

		//Creamos las celdas de los dias de la semana
		while ($cell <= $cal_size)
		{
			echo "<tr>";
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
						if($background=='blue')
						{
							$funcion = "onClick='marcarFecha(this.id)'";
						}
					}
					else
					{
						if($fecha_campo<$fecha_actual_solo)
						{
							$funcion = "onClick='fecha_no_valida()'";
						}
						else
						{
							$funcion = "onClick='marcarFecha(this.id)'";
						}
					}
					echo "<td style='background-color:".$background."' id='".$year."-".$month."-".$calendar[$semana][$dia]."' ".$funcion.">".$calendar[$semana][$dia]."</td>";
				}
				else
				{
					echo "<td></td>";
				}
				$cell++;
			}
			$semana++;
			echo "</tr>";
		}
		echo "</table>";
	}

	function color($numero)
	{
		switch($numero)
		{
			case 1:
				$color = 'blue';
				break;
			case 2:
				$color = 'red';
				break;
			case 3:
				$color = 'green';
				break;
			case 4:
				$color = 'yellow';
				break;
			case 5:
				$color = 'brown';
				break;
			case 6:
				$color = 'blue';
				break;
			case 7:
				$color = 'red';
				break;
			case 8:
				$color = 'green';
				break;
			case 9:
				$color = 'yellow';
				break;
			case 10:
				$color = 'brown';
				break;
		}
		return $color;
	}
?>