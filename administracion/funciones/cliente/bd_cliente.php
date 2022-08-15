<?php
	include '../../../funciones/general/conexion.php';
	include '../general/formato-imagen.php';
	include '../../../funciones/general/funciones_guardar.php';
	include '../../../funciones/general/crea_variables.php';
	include '../general/bd_basico.php';


	if($id_cliente == 0)
	{
		$operacion='insertar';
		$n1_creado=$fecha_actual;
		unset($fecha_modificacion);
		$location=$raiz."administracion/".$url_origen."?notificacion=modificacion_correcta";
	}
	
	$bd_cliente=new bd_basico($operacion, 'cliente');
	$bd_cliente->agregar_dato('nombre_cliente',$nombre_cliente);
	$bd_cliente->agregar_dato('id_representante',$id_representante);
	$bd_cliente->agregar_dato('email_cliente',$email_cliente);
	$bd_cliente->agregar_dato('telefono_cliente',$telefono_cliente);
	$bd_cliente->agregar_clausula('id_cliente','=',$id_cliente);
	$bd_cliente->realizar_consulta($mysqli);
echo $_POST['nombre_cliente'];
?>
