<?php
	include '../../../funciones/general/conexion.php';
	include '../../../funciones/general/funciones_guardar.php';
	include '../../../funciones/general/crea_variables.php';
	include '../general/bd_basico.php';
	include '../general/bd_archivo.php';
	include '../general/bd_campo_extra.php';

	$n4_corregido= corrige_texto($n4_nombre);		
	$identificador_tabla='n4_id';

	if($n4_id == 1)
	{
		$operacion='insertar'; $n4_id = ''; $location=$raiz."administracion/".$url_origen; $_SESSION['notificacion'] = 'agregado_correctamente';
	}
	else
	{
		$operacion='modificar'; $location=$raiz."administracion/".$url_origen."?id_elemento=".$n4_id."&nombre=".$n4_corregido;
		$_SESSION['notificacion'] = 'modificado_correctamente';
	}

	$bd_nivel_4=new bd_basico($operacion, 'nivel_4');
	$bd_nivel_4->agregar_dato('n4_id',$n4_id);
	$bd_nivel_4->agregar_dato('n4_nombre',$n4_nombre);
	$bd_nivel_4->agregar_dato('n4_corregido',$n4_corregido);
	$bd_nivel_4->agregar_dato('n4_descripcion',$n4_descripcion);
	$bd_nivel_4->agregar_dato('n1_id',$n1_id);
	$bd_nivel_4->agregar_dato('n2_id',$n2_id);
	$bd_nivel_4->agregar_dato('n3_id',$n3_id);
	$bd_nivel_4->agregar_dato('n4_tipo',$n4_tipo);
	$bd_nivel_4->agregar_dato('n4_orden',$n4_orden);
	$bd_nivel_4->agregar_dato('n4_inicio',$n4_inicio);
	$bd_nivel_4->agregar_dato('n4_fin',$n4_fin);
	$bd_nivel_4->agregar_dato('n4_creado',$n4_creado);
	$bd_nivel_4->agregar_dato('n4_modificado',$n4_modificado);
	$bd_nivel_4->agregar_clausula('n4_id','=',$n4_id);
	$bd_nivel_4->realizar_consulta($mysqli);
	if($n4_id == 0)
	{
		$n4_id= $bd_nivel_4->ultimo_id;
	}
	$id_elemento=$n4_id;

	$ancho=1400; $alto=0; $calidad=75; $ajuste='maxWidth';
	$tabla_asociada=$tabla;

	if(isset($_POST['imagenes']))
	{
		$array_archivo = $_POST['imagenes'];
		if(isset($array_archivo))
		{
			$carpeta_destino = "interfaz/".$n4_tipo."/".$n4_id."/imagenes/";
			$categoria = 'imagenes';
			archivo($array_archivo, $carpeta_destino, $categoria, $tabla_asociada, $identificador_tabla, $id_elemento, $ancho, $alto, $ajuste, $calidad);
		}
	}

	if(isset($_POST['archivos']))
	{
		$array_archivo = $_POST['archivos'];
		$carpeta_destino = "archivos/".$n4_tipo."/".$n4_id."/archivos/";
		$categoria = 'archivos';
		archivo($array_archivo, $carpeta_destino, $categoria, $tabla_asociada, $identificador_tabla, $id_elemento, 0, 0, 0, 0);
	}
	header("Location: $location");
?>