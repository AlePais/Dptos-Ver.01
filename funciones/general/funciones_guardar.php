<?php 
	//variable con parametros a utilizar en un update
	$parametros_update="SET";
	
	//carga todas los valores del formulario a una variable con su nombre
	foreach($_POST as $nombre_campo => $valor)
	{
		$asignacion = "\$" . $nombre_campo . "='" . $valor . "';";
		eval($asignacion);
		
		if($nombre_campo != 'repetir' && $nombre_campo!= 'id_usuario')
		{
			$parametros_update = $parametros_update . " `" . $nombre_campo . "`='" .$valor . "', ";
		}
	}

	$parametros_update = substr ($parametros_update, 0, strlen($parametros_update) - 2);

	$fecha_actual = date("Y-m-d H:i:s");

	function corrige_texto($cadena)
	{
		$cadena = trim($cadena);
		$cadena = str_replace(array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'),array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'),$cadena);
		$cadena = str_replace(array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'),array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'),$cadena);
		$cadena = str_replace(array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'),array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'),$cadena);
		$cadena = str_replace(array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'),array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'),$cadena);
		$cadena = str_replace(array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'),array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'),$cadena);
		$cadena = str_replace(array('ñ', 'Ñ', 'ç', 'Ç'),array('n', 'N', 'c', 'C',),$cadena);
		$cadena = str_replace(' ','-',$cadena);
		$cadena = str_replace('.','',$cadena);
		//Esta parte se encarga de eliminar cualquier caracter extraño
		$cadena = str_replace(array("\\", "¨", "º", "~","#", "@", "|", "!", "\"","·", "$", "%", "&", "/","(", ")", "?", "'", "¡","¿", "[", "^", "`", "]",
		"+", "}", "{", "¨", "´",">", "< ", ";", ",", ":", " "),'',$cadena);
		$cadena = strtolower($cadena);
		return $cadena;
	}

	function verifica_url($url)
	{

		 $url = str_replace ( "http://", "", $url);
		 $url = str_replace ( "https://", "", $url);
		 return $url;
	}
	
	function mover_archivo($origen, $carpeta_destino, $ubicacion_destino)
	{
		if (!file_exists($carpeta_destino))
		{
			mkdir($carpeta_destino, 0777, true);
		}
		rename($origen, $ubicacion_destino);
	}

	function copiar_si_no_existe($carpeta_destino, $nombre_origen, $nombre_destino)
	{
		global $raiz;

		if (!file_exists($raiz.$carpeta_destino.$nombre_destino))
		{
			mkdir($raiz.$destino, 0777, true);
			copy($raiz.$nombre_origen, $raiz.$carpeta_destino.$nombre_destino);
		}
	}
?>