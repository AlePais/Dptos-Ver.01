<?php
	include '../../../funciones/general/conexion.php';
	include '../../../funciones/general/funciones_guardar.php';
	include '../../../funciones/general/crea_variables.php';
	include '../general/bd_basico.php';
	include '../general/bd_archivo.php';
	include '../general/db_campo_extra.php';

	$n1_corregido= corrige_texto($n1_nombre);		
	$identificador_tabla='n1_id';

	if($n1_id == 1)
	{
		$operacion='insertar'; $n1_id = ''; $location=$raiz."administracion/".$url_origen; $_SESSION['notificacion'] = 'agregado_correctamente';
	}
	else
	{
		$operacion='modificar'; $location=$raiz."administracion/".$url_origen."?id_elemento=".$n1_id."&nombre=".$n1_corregido;
		$_SESSION['notificacion'] = 'modificado_correctamente';
	}

	$bd_nivel_1=new bd_basico($operacion, 'nivel_1');
	$bd_nivel_1->agregar_dato('n1_nombre',$n1_nombre);
	$bd_nivel_1->agregar_dato('n1_corregido',$n1_corregido);
	$bd_nivel_1->agregar_dato('n1_descripcion',$n1_descripcion);
	$bd_nivel_1->agregar_dato('n1_tipo',$n1_tipo);
	$bd_nivel_1->agregar_dato('n1_orden',$n1_orden);
	$bd_nivel_1->agregar_dato('n1_inicio',$n1_inicio);
	$bd_nivel_1->agregar_dato('n1_fin',$n1_fin);
	$bd_nivel_1->agregar_clausula('n1_id','=',$n1_id);
	$bd_nivel_1->realizar_consulta($mysqli);
	if($n1_id == 0)
	{
		$n1_id= $bd_nivel_1->ultimo_id;
	}
	$id_elemento=$n1_id;
	//campos_extra($redes_sociales, 'redes_sociales', 'usuario', 'id', 1);

	$ancho=1400; $alto=0; $calidad=75; $ajuste='maxWidth';
	$tabla_asociada=$tabla;
	$array_archivo = $_POST['imagenes'];
	$carpeta_destino = "interfaz/".$n1_tipo."/".$n1_id."/";
	$categoria = 'imagenes';
	archivo($array_archivo, $carpeta_destino, $categoria, $tabla_asociada, $identificador_tabla, $id_elemento, $ancho, $alto, $ajuste, $calidad);

	header("Location: $location");
?>
