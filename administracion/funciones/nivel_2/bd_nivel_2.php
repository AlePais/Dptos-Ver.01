<?php
	include '../../../funciones/general/conexion.php';
	include '../../../funciones/general/funciones_guardar.php';
	include '../../../funciones/general/crea_variables.php';
	include '../general/bd_basico.php';
	include '../general/bd_archivo.php';
	include '../general/bd_campo_extra.php';

	$n2_corregido= corrige_texto($n2_nombre);		
	$identificador_tabla='n2_id';

	if($n2_id == 1)
	{
		$operacion='insertar'; $n2_id = ''; $location=$raiz."administracion/".$url_origen; $_SESSION['notificacion'] = 'agregado_correctamente';
	}
	else
	{
		$operacion='modificar'; $location=$raiz."administracion/".$url_origen."?id_elemento=".$n2_id."&nombre=".$n2_corregido;
		$_SESSION['notificacion'] = 'modificado_correctamente';
	}

	$bd_nivel_2=new bd_basico($operacion, 'nivel_2');
	$bd_nivel_2->agregar_dato('n2_id',$n2_id);
	$bd_nivel_2->agregar_dato('n2_nombre',$n2_nombre);
	$bd_nivel_2->agregar_dato('n2_corregido',$n2_corregido);
	$bd_nivel_2->agregar_dato('n2_descripcion',$n2_descripcion);
	$bd_nivel_2->agregar_dato('n1_id',$n1_id);
	$bd_nivel_2->agregar_dato('n2_tipo',$n2_tipo);
	$bd_nivel_2->agregar_dato('n2_orden',$n2_orden);
	$bd_nivel_2->agregar_dato('n2_inicio',$n2_inicio);
	$bd_nivel_2->agregar_dato('n2_fin',$n2_fin);
	$bd_nivel_2->agregar_clausula('n2_id','=',$n2_id);
	$bd_nivel_2->realizar_consulta($mysqli);
	if($n2_id == 0)
	{
		$n2_id= $bd_nivel_2->ultimo_id;
	}
	$id_elemento=$n2_id;
	
	//campos_extra($redes_sociales, 'redes_sociales', 'usuario', 'id', 1);

	$ancho=1400; $alto=0; $calidad=75; $ajuste='maxWidth';
	$tabla_asociada=$tabla;
	$array_archivo = $_POST['imagenes'];
	$carpeta_destino = "interfaz/".$n2_tipo."/".$n2_id."/";
	$categoria = 'imagenes';
	archivo($array_archivo, $carpeta_destino, $categoria, $tabla_asociada, $identificador_tabla, $id_elemento, $ancho, $alto, $ajuste, $calidad);

	header("Location: $location");
?>
