<?php
	include '../../../funciones/general/conexion.php';
	include '../../../funciones/general/funciones_guardar.php';
	include '../../../funciones/general/crea_variables.php';
	include '../general/bd_basico.php';
	include '../general/bd_archivo.php';
	include '../general/bd_campo_extra.php';

	$corregido_pagina= corrige_texto($nombre_pagina).".php";
	$identificador_tabla='id_pagina';

	if($id_pagina == 1)
	{
		$operacion='insertar'; $id_pagina = ''; $location=$raiz."administracion/".$url_origen; $_SESSION['notificacion'] = 'agregado_correctamente';
	}
	else
	{
		$operacion='modificar'; $location=$raiz."administracion/".$url_origen."?id_elemento=".$id_pagina."&nombre=".$corregido_pagina;
		$_SESSION['notificacion'] = 'modificado_correctamente';
	}

	$bd_pagina=new bd_basico($operacion, 'pagina');
	$bd_pagina->agregar_dato('id_pagina',$id_pagina);
	$bd_pagina->agregar_dato('nombre_pagina',$nombre_pagina);
	$bd_pagina->agregar_dato('corregido_pagina',$corregido_pagina);
	$bd_pagina->agregar_dato('titulo_pagina',$titulo_pagina);
	$bd_pagina->agregar_dato('descripcion_pagina',$descripcion_pagina);
	$bd_pagina->agregar_dato('fondo_tipo',$fondo_tipo);
	$bd_pagina->agregar_dato('fondo_valor',$fondo_valor);
	$bd_pagina->agregar_dato('fondo_rgba',$fondo_valor);
	$bd_pagina->agregar_dato('galeria_imagenes',$galeria_imagenes);
	$bd_pagina->agregar_dato('contenido',$contenido);
	$bd_pagina->agregar_clausula('id_pagina','=',$id_pagina);
	$bd_pagina->realizar_consulta($mysqli);
	if($id_pagina == 0)
	{
		$id_pagina= $bd_pagina->ultimo_id;
	}
	$id_elemento = $id_pagina;

	copiar_si_no_existe("", "administracion/funciones/pagina/pagina_blanco.php",$corregido_pagina);

	$ancho=1000; $alto=0; $ajuste='maxWidth'; $calidad=50;
	$tabla_asociada=$tabla;
	$array_archivo = $_POST['imagenes'];
	$carpeta_destino = "interfaz/pagina/".$id_pagina."/imagenes/";
	$categoria = 'imagenes';
	archivo($array_archivo, $carpeta_destino, $categoria, $tabla_asociada, $identificador_tabla, $id_elemento, $ancho, $alto, $ajuste, $calidad);

	if($fondo_tipo=='imagen')
	{
		$array_archivo = $_POST['fondo'];
		$carpeta_destino = "interfaz/pagina/".$id_pagina."/fondo/";
		$categoria = 'fondo';
		archivo($array_archivo, $carpeta_destino, $categoria, $tabla_asociada, $identificador_tabla, $id_elemento, $ancho, $alto, $ajuste, $calidad);
		foreach($array_archivo as $campo)
		{
			$id_archivo = $campo['id_archivo'];
		}
		$bd_pagina=new bd_basico('modificar', 'pagina');
		$bd_pagina->agregar_dato('fondo_valor',$id_archivo);
		$bd_pagina->agregar_clausula('id_pagina','=',$id_pagina);
		$bd_pagina->realizar_consulta($mysqli);
	}
	if($fondo_tipo=='color')
	{
		$bd_pagina=new bd_basico('eliminar', 'archivo');
		$bd_pagina->agregar_clausula('categoria','=','fondo');
		$bd_pagina->agregar_clausula('tabla_asociada','=','pagina');
		$bd_pagina->agregar_clausula('identificador_tabla','=',$id_pagina);
		$bd_pagina->agregar_clausula('identificador_tabla','=',$id_pagina);
		$bd_pagina->realizar_consulta($mysqli);
	}

	$j=1;
	$bd_pagina=new bd_basico('eliminar', 'pagina_seccion');
	$bd_pagina->agregar_clausula('id_pagina','=',$id_pagina);
	$bd_pagina->realizar_consulta($mysqli);
	
	foreach($_POST as $id => $valor)
	{
		$tipo = explode("_", $id);
		$nombre_tipo = $tipo[0];

		if($nombre_tipo=='seccion')
		{
			$id_seccion = $tipo[1];
			$bd_archivo=new bd_basico('insertar', 'pagina_seccion');
			$bd_archivo->agregar_dato('id_pagina',$id_pagina);
			$bd_archivo->agregar_dato('id_seccion',$id_seccion);
			$bd_archivo->agregar_dato('orden',$j);
			$bd_archivo->agregar_clausula('id_elemento','=',$id_elemento);
			$bd_archivo->realizar_consulta($mysqli);
			$j++;
		}
	}
	
	limpiar_temporal($raiz);
	header("Location: $location");		
?>
