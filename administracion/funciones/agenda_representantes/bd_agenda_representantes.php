<?php
	include '../../../funciones/general/conexion.php';
	include '../../../funciones/general/funciones_guardar.php';
	include '../../../funciones/general/crea_variables.php';
	include '../general/bd_basico.php';
	include '../general/bd_archivo.php';
	include '../general/bd_campo_extra.php';

	$corregido= corrige_texto($nombre);		
	$identificador_tabla='id_agenda_representantes';

	if($id_agenda_representantes == 1)
	{
		$operacion='insertar'; $id_agenda_representantes = ''; $location=$raiz."administracion/".$url_origen; $_SESSION['notificacion'] = 'agregado_correctamente';
	}
	else
	{
		$operacion='modificar'; $location=$raiz."administracion/".$url_origen."?id_elemento=".$id_agenda_representantes."&nombre=".$corregido;
		$_SESSION['notificacion'] = 'modificado_correctamente';
	}
	
	$bd_agenda=new bd_basico($operacion, 'agenda_representantes');
	$bd_agenda->agregar_dato('id_agenda_representantes',$id_agenda_representantes);
	$bd_agenda->agregar_dato('nombre',$nombre);
	$bd_agenda->agregar_dato('corregido',$corregido);
	$bd_agenda->agregar_dato('email',$email);
	$bd_agenda->agregar_dato('telefono',$telefono);
	$bd_agenda->agregar_dato('facebook',$facebook);
	$bd_agenda->agregar_dato('check_in',$check_in);
	$bd_agenda->agregar_dato('check_out',$check_out);
	$bd_agenda->agregar_dato('n1_id',$n1_id_depto);
	$bd_agenda->agregar_dato('n2_id',$n2_id_depto);
	$bd_agenda->agregar_dato('n3_id',$n3_id_depto);
	$bd_agenda->agregar_dato('fecha_creado',$fecha_creado);
	$bd_agenda->agregar_dato('fecha_modificado',$fecha_modificado);
	$bd_agenda->agregar_clausula('id_agenda_representantes','=',$id_agenda_representantes);
	$bd_agenda->realizar_consulta($mysqli);
	if($id_agenda_representantes == 0)
	{
		$id_agenda_representantes= $bd_agenda->ultimo_id;
	}
	$id_elemento=$id_agenda_representantes;
	
	campos_extra($agenda_representantes, 'extra_agenda_representantes', 'agenda_representantes', 'id_agenda', $id_agenda_representantes);

	$query = "UPDATE `relaciones` SET `id_agenda_representantes`='$id_agenda_representantes' WHERE `id_agenda_representantes` = '0'";
	$mysqli->query($query);
	
	$ancho=500; $alto=0; $calidad=75; $ajuste='maxWidth';
	$tabla_asociada=$tabla;
	$array_archivo = $_POST['imagenes'];
	$carpeta_destino = "interfaz/agenda_representantes/".$id_agenda_representantes."/";
	$categoria = 'imagenes';
	archivo($array_archivo, $carpeta_destino, $categoria, $tabla_asociada, $identificador_tabla, $id_elemento, $ancho, $alto, $ajuste, $calidad);

	header("Location: $location");
?>