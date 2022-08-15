<?php
//Creacion de un calendario mediante el uso de la funcion draw_calendar_v1(), que a su vez llama a crear_calendario().
//Solo se crearon las funciones con el fin de probar el llamado y regreso de valores, asi como poder crear
//posteriormente una funcion drawTable() que dibuje tablas basadas en un arreglo multidimensional y datos.
//Coded by: Jonathan Ramos, jonathanramos@gmail.com
// Funcion que crea un arreglo Calendario de la fecha indicada con valores listos para salida

function crear_calendario($month,$year,$calendar){

	// Declaramos variables de dias y semanas
	// usamos mktime para crear la fecha exacta que queremos para crear valor $time 
	$running_day = date('w',mktime(0,0,0,$month,1,$year)); // w devuelve el numero del dia de la semana en que arranca el mes 0->domingo, 6->sabado
	$days_in_month = date('t',mktime(0,0,0,$month,1,$year)); //t devuelve el numero de dias del mes
	$days_in_week = 0;
	$day = 1;
	$week = 0;
	
	// Mandamos datos de los dias de la semana al arreglo
	// Imprimimos dias en blanco hasta alcanzar el primero en la semana
	for ($days_in_week = 0; $days_in_week < $running_day; $days_in_week++){
		$calendar [$week][$days_in_week] = 0;
/*  Remueve Comentarios si quieres ver los datos representativos que se van mandando al arreglo
		echo ("-- ");
*/
	}
	
	// Procedemos con los dias
	while ($day <= $days_in_month) {
	// Mientras no se llegue al numero de dias del mes llenamos el arreglo
		while($days_in_week < 7) { 
		// Asignamos los dias restantes mientras no lleguemos al tope de dias de semana 7.
		// Al terminar los dias del mes seguimos llenando el arreglo de vacio
			if ($day <= $days_in_month){
				$calendar [$week][$days_in_week] = $day;
/*	Remueve Comentarios si quieres ver los datos representativos que se van mandando al arreglo
				echo (" ".$day." ");
*/
			} else {
				$calendar [$week][$days_in_week] = 0;
/*	Remueve Comentarios si quieres ver los datos representativos que se van mandando al arreglo
				echo (" -- ");
*/
			}
			$days_in_week++;
			$day++;
		}
		$days_in_week = 0;
		$week++;
/*	Remueve Comentarios si quieres ver los datos representativos que se van mandando al arreglo
		echo "<br/>";
*/
	}
	return $calendar;
}

// Funcion que pinta el calendario
function draw_calendar_v1($month,$year){
	$calendar = array(array());
	$cal_size = 0;
	$week = 0;
	$cell = 1;
	$month_name = " ";
	
	//Creamos el arreglo Calendario
	$calendar = crear_calendario($month,$year,$calendar);
    // Longitud del Calendario incluyendo espacios en blanco, con llamada recursiva para que sea completo;
	// Al ser recursivo nos suma tambien los renglones que son los arrays padres de las celdas, entonces restamos
	$cal_size =	count($calendar,COUNT_RECURSIVE) - count($calendar); 
	
	//Creamos la tabla
	echo '<table style="width:50%">';
	
	//Imprime $month and $year
	switch ($month) {  // Obtenemos el nombre en castellano del mes
		case 1 : $month_name = "Enero";
			break;
		case 2 : $month_name = "Febrero";
			break;
		case 3 : $month_name = "Marzo";
			break;
		case 4 : $month_name = "Abril";
			break;
		case 5 : $month_name = "Mayo";
			break;
		case 6 : $month_name = "Junio";
			break;
		case 7 : $month_name = "Julio";
			break;
		case 8 : $month_name = "Agosto";
			break;
		case 9 : $month_name = "Septiembre";
			break;
		case 10 : $month_name = "Octubre";
			break;
		case 11 : $month_name = "Noviembre";
			break;
		case 12 : $month_name = "Diciembre";
		
	}
	// Primer renglon de la tabla (table row tr) con colspan para abarcar todo el renglon
	echo '<tr style="background-color:CornflowerBlue; color:white;"><th colspan = "7"; >'.$month_name.' '.$year.'</th></tr>';

	//Creamos las celdas de los nombres de los dias de la semana
	echo '<tr style="background-color:Azure;">';
	echo '<th>Domingo</th><th>Lunes</th><th>Martes</th><th>Miercoles</th><th>Jueves</th><th>Viernes</th><th>Sabado</th></tr>';

	//Creamos las celdas de los dias de la semana
	while ($cell <= $cal_size){
		echo "<tr>";
		for ($day=0;$day<7;$day++){
			if ($calendar[$week][$day]!=0){
				echo "<td id='".$year."-".$month."-".$calendar[$week][$day]."'>".$calendar[$week][$day]."</td>";
			} else { echo "<td></td>"; }
			$cell++;
		}
		$week++;
		echo "</tr>";
	}
	echo "</table>";
}

//---------- Inicio Programa principal  ---------------
// Configuracion general de pagina y tabla
echo "<!DOCTYPE html><html><head>";
echo "<style>table, th, td { border: 1px solid black;border-collapse: collapse;}";
echo " table, th {text-align:center;}, td { padding: 5px;text-align: left;}</style>";
echo "</head><body>";
echo "<h2>Creacion de Calendario usando php,html y css</h2>";
// Lamada a la funcion que pinta el calendario la cual llama a su vez a la que crea el arreglo calendario
$timeArray = localtime(time(),true);
$month = $timeArray["tm_mon"]+1; // Mes actual
$year = $timeArray["tm_year"]+1900; // Año actual

draw_calendar_v1(2,2018);
draw_calendar_v1(3,2018);
draw_calendar_v1(4,2018);

echo "<br/>Coded by: Jonathan Ramos. jonathanramos@gmail.com";
echo "</body></html>";
?>