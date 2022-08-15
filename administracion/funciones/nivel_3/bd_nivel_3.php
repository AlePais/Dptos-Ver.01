<?php
	include '../../../funciones/general/conexion.php';
	include '../../../funciones/general/funciones_guardar.php';
	include '../../../funciones/general/crea_variables.php';
	include '../general/bd_basico.php';
	include '../general/bd_archivo.php';
	include '../general/bd_campo_extra.php';

	$n3_corregido= corrige_texto($n3_nombre);		
	$identificador_tabla='n3_id';

	if($n3_id == 1)
	{
		$operacion='insertar'; $n3_id = ''; $location=$raiz."administracion/".$url_origen; $_SESSION['notificacion'] = 'agregado_correctamente';
	}
	else
	{
		$operacion='modificar'; $location=$raiz."administracion/".$url_origen."?id_elemento=".$n3_id."&nombre=".$n3_corregido;
		$_SESSION['notificacion'] = 'modificado_correctamente';
	}

	$bd_nivel_3=new bd_basico($operacion, 'nivel_3');
	$bd_nivel_3->agregar_dato('n3_nombre',$n3_nombre);
	$bd_nivel_3->agregar_dato('n3_corregido',$n3_corregido);
	$bd_nivel_3->agregar_dato('n3_descripcion',$n3_descripcion);
	$bd_nivel_3->agregar_dato('n1_id',$n1_id);
	$bd_nivel_3->agregar_dato('n2_id',$n2_id);
	$bd_nivel_3->agregar_dato('n3_tipo',$n3_tipo);
	$bd_nivel_3->agregar_dato('n3_orden',$n3_orden);
	$bd_nivel_3->agregar_dato('n3_inicio',$n3_inicio);
	$bd_nivel_3->agregar_dato('n3_fin',$n3_fin);
	$bd_nivel_3->agregar_clausula('n3_id','=',$n3_id);
	$bd_nivel_3->realizar_consulta($mysqli);
	if($n3_id == 0)
	{
		$n3_id= $bd_nivel_3->ultimo_id;
	}
	$id_elemento=$n3_id;

	if($n3_tipo == 'departamento_nivel_3')
	{
		campos_extra($departamento, 'extra_departamento', 'nivel_3', 'n3_id', $id_elemento);

		//adicional departamento
		foreach($adicional_departamento as $nombre_dato=>$datos)
		{
			$corregido = $datos['corregido'];
			$valor= $_POST[$corregido];
			$estado=$corregido."_estado";
			$unidad=$corregido."_unidad";
			$valor=$corregido."_valor";
			
			if($$estado!=2)
			{
				$$unidad=0;
				$$valor=0;
			}
			$operacion='insertar';
			$id='';
			$query="SELECT * FROM `adicional_departamento` WHERE `departamento_asociado` = '$n3_id' AND `nombre` LIKE '$corregido'";
			$resultado=$mysqli->query($query);
			if($resultado->num_rows!=0)
			{
				$dato=$resultado->fetch_array(MYSQLI_ASSOC);
				$operacion='modificar';
				$id = $dato['id'];
			}
			$bd_adicional_departamento=new bd_basico($operacion, 'adicional_departamento');
			$bd_adicional_departamento->agregar_dato('departamento_asociado',$n3_id);
			$bd_adicional_departamento->agregar_dato('nombre',$corregido);
			$bd_adicional_departamento->agregar_dato('estado',$$estado);
			$bd_adicional_departamento->agregar_dato('unidad',$$unidad);
			$bd_adicional_departamento->agregar_dato('valor',$$valor);
			$bd_adicional_departamento->agregar_clausula('id','=',$id);
			$bd_adicional_departamento->realizar_consulta($mysqli);
		}
	}
	if($n3_tipo == 'blog_nivel_3')
	{
		campos_extra($blog, 'extra_blog', 'nivel_3', 'n3_id', $id_elemento);
		$query = "UPDATE `relaciones` SET `n1_id_blog`='$n1_id',`n2_id_blog`='$n2_id',`n3_id_blog`='$n3_id' WHERE `n3_id_blog` = '0' OR `n3_id_blog` = '$n3_id'";
		$mysqli->query($query);
	}
	
	$ancho=1400; $alto=0; $calidad=75; $ajuste='maxWidth';
	$tabla_asociada=$tabla;

	if(isset($_POST['imagenes']))
	{
		$array_archivo = $_POST['imagenes'];
		if(isset($array_archivo))
		{
			$carpeta_destino = "interfaz/".$n3_tipo."/".$n3_id."/imagenes/";
			$categoria = 'imagenes';
			archivo($array_archivo, $carpeta_destino, $categoria, $tabla_asociada, $identificador_tabla, $id_elemento, $ancho, $alto, $ajuste, $calidad);
		}
	}

	if(isset($_POST['archivos']))
	{
		$array_archivo = $_POST['archivos'];
		$carpeta_destino = "archivos/".$n3_tipo."/".$n3_id."/archivos/";
		$categoria = 'archivos';
		archivo($array_archivo, $carpeta_destino, $categoria, $tabla_asociada, $identificador_tabla, $id_elemento, 0, 0, 0, 0);
	}
	
	header("Location: $location");
?>