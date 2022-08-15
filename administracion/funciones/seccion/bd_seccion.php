<?php
	include '../../../funciones/general/conexion.php';
	include '../../../funciones/general/funciones_guardar.php';
	include '../../../funciones/general/crea_variables.php';
	include '../general/bd_basico.php';
	include '../general/bd_archivo.php';
	include '../general/db_campo_extra.php';

	$corregido_seccion= corrige_texto($titulo_seccion);
	$identificador_tabla='id_seccion';

	if($id_seccion == 1)
	{
		$operacion='insertar'; $id_seccion = ''; $location=$raiz."administracion/".$url_origen; $_SESSION['notificacion'] = 'agregado_correctamente';
	}
	else
	{
		$operacion='modificar'; $location=$raiz."administracion/".$url_origen."?id_elemento=".$id_seccion."&nombre=".$corregido_seccion;
		$_SESSION['notificacion'] = 'modificado_correctamente';
	}
	if($columna1_ancho==0 && $columna2_ancho==0)
	{
		$columna1_ancho=50;	$columna2_ancho=50;
	}

	$bd_seccion=new bd_basico($operacion, $tabla);
	$bd_seccion->agregar_dato('id_seccion',$id_seccion);
	$bd_seccion->agregar_dato('nombre_seccion',$nombre_seccion);
	$bd_seccion->agregar_dato('titulo_seccion',$titulo_seccion);
	$bd_seccion->agregar_dato('corregido_seccion',$corregido_seccion);
	$bd_seccion->agregar_dato('fondo_tipo',$fondo_tipo);
	$bd_seccion->agregar_dato('fondo_valor',$fondo_valor);
	$bd_seccion->agregar_dato('fondo_rgba',$fondo_rgba);
	$bd_seccion->agregar_dato('lista_imagen',$lista_imagen);
	$bd_seccion->agregar_dato('lista_nombre',$lista_nombre);
	$bd_seccion->agregar_dato('lista_descripcion',$lista_descripcion);
	$bd_seccion->agregar_dato('contenido',$contenido);
	$bd_seccion->agregar_dato('id_diseño',$id_diseño);
	$bd_seccion->agregar_dato('columna1_ancho',$columna1_ancho);
	$bd_seccion->agregar_dato('columna2_ancho',$columna2_ancho);
	$bd_seccion->agregar_clausula('id_seccion','=',$id_seccion);
	$bd_seccion->realizar_consulta($mysqli);
	if($id_seccion == 0)
	{
		$id_seccion= $bd_seccion->ultimo_id;
	}
	
	$id_elemento = $id_seccion;
	$posicion = 'left';

	$ancho=1000; $alto=0; $calidad=50; $ajuste='maxWidth';
	$tabla_asociada=$tabla;
	$array_archivo = $_POST['lista'];
	$carpeta_destino = "interfaz/seccion/".$id_seccion."/extra/";
	$categoria = 'lista';
	archivo($array_archivo, $carpeta_destino, $categoria, $tabla_asociada, $identificador_tabla, $id_elemento, $ancho, $alto, $ajuste, $calidad);

	$array_archivo = $_POST['imagenes'];
	$carpeta_destino = "interfaz/seccion/".$id_seccion."/imagenes/";
	$categoria = 'imagenes';
	archivo($array_archivo, $carpeta_destino, $categoria, $tabla_asociada, $identificador_tabla, $id_elemento, $ancho, $alto, $ajuste, $calidad);

	if($fondo_tipo=='imagen')
	{
		$array_archivo = $_POST['fondo'];
		$carpeta_destino = "interfaz/seccion/".$id_seccion."/fondo/";
		$categoria = 'fondo';
		archivo($array_archivo, $carpeta_destino, $categoria, $tabla_asociada, $identificador_tabla, $id_elemento, $ancho, $alto, $ajuste, $calidad);
		foreach($array_archivo as $campo)
		{
			$id_archivo = $campo['id_archivo'];
		}
		$bd_seccion=new bd_basico('modificar', 'seccion');
		$bd_seccion->agregar_dato('fondo_valor',$id_archivo);
		$bd_seccion->agregar_clausula('id_seccion','=',$id_seccion);
		$bd_seccion->realizar_consulta($mysqli);
	}
	if($fondo_tipo=='color')
	{
		$bd_seccion=new bd_basico('eliminar', 'archivo');
		$bd_seccion->agregar_clausula('categoria','=','fondo');
		$bd_seccion->agregar_clausula('tabla_asociada','=','seccion');
		$bd_seccion->agregar_clausula('identificador_tabla','=',$id_seccion);
		$bd_seccion->realizar_consulta($mysqli);
	}

	foreach($_POST as $id => $valor)
	{
		$tipo = explode("_", $id);
		$nombre_tipo = $tipo[0];
		if($nombre_tipo=='columna1')
		{
			$bd_seccion=new bd_basico('modificar', 'seccion');
			$bd_seccion->agregar_dato('columna1_posicion',$posicion);
			$bd_seccion->agregar_clausula('id_seccion','=',$id_seccion);
			$bd_seccion->realizar_consulta($mysqli);
			$posicion = 'right';
		}
		if($nombre_tipo=='columna2')
		{
			$bd_seccion=new bd_basico('modificar', 'seccion');
			$bd_seccion->agregar_dato('columna2_posicion',$posicion);
			$bd_seccion->agregar_clausula('id_seccion','=',$id_seccion);
			$bd_seccion->realizar_consulta($mysqli);
			$posicion = 'right';
		}
	}
	header("Location: $location");
?>