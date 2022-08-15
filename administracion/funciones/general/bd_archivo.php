<?php
	include '../general/formato_imagen.php';

	function archivo($array_archivo, $carpeta_destino, $categoria, $tabla_asociada, $identificador_tabla, $id_elemento, $ancho, $alto, $ajuste, $calidad)
	//$array_archivo=$extra; $tabla_asociada='seccion'; $identificador_tabla='id_seccion', $calidad valor entre 1 y 100
	{
		global $mysqli;
		global $raiz;
		$i=1;

		foreach($array_archivo as $campo)
		{
			$id_archivo = $campo['id_archivo'];

			$query = "SELECT * FROM `archivo` WHERE `id_archivo`='$id_archivo'";
			$resultado = $mysqli->query($query);
			$archivo = $resultado -> fetch_array(MYSQLI_ASSOC);
			$ubicacion_origen = $raiz.$archivo['carpeta'].$archivo['archivo'];
			$ubicacion_destino = $raiz.$carpeta_destino.$archivo['archivo'];

			if($archivo['tabla_asociada']=='temporal' && $archivo['tipo']=='imagen')
			{
				if (!file_exists($raiz.$carpeta_destino))
				{
					mkdir($raiz.$carpeta_destino, 0777, true);
				}
				$resize = new ResizeImage($ubicacion_origen);
				$resize->resizeTo($ancho, $alto, $ajuste);
				$resize->saveImage($ubicacion_destino, $calidad);
			}
			if($archivo['tabla_asociada']=='temporal' && $archivo['tipo']=='archivo')
			{
				mover_archivo($ubicacion_origen, $ubicacion_destino);
			}

			$bd_archivo=new bd_basico('modificar', 'archivo');
			$bd_archivo->agregar_dato('id_archivo',$id_archivo);
			$bd_archivo->agregar_dato('carpeta',$carpeta_destino);
			if(isset($campo['nombre']))
			{
				$bd_archivo->agregar_dato('nombre',$campo['nombre']);
			}
			if(isset($campo['descripcion']))
			{
				$bd_archivo->agregar_dato('descripcion',$campo['descripcion']);
			}
			$bd_archivo->agregar_dato('categoria',$categoria);
			$bd_archivo->agregar_dato('tabla_asociada',$tabla_asociada);
			$bd_archivo->agregar_dato('identificador_tabla',$identificador_tabla);
			$bd_archivo->agregar_dato('id_elemento',$id_elemento);
			$bd_archivo->agregar_dato('orden',$i);
			$bd_archivo->agregar_clausula('id_archivo','=',$id_archivo);
			$bd_archivo->realizar_consulta($mysqli);

			$i++;
		}
	}
	
	function limpiar_temporal($raiz)
	{
		$carpeta_temporal = $raiz."administracion/funciones/general/subir_archivo/temporal/";
		$archivos = scandir($carpeta_temporal); // Devuelve un vector con todos los archivos y directorios
		foreach($archivos as $f)
		{
			if(is_file($carpeta_temporal.$f))
			{
				unlink($carpeta_temporal.$f);
			}
		}
	}
?>