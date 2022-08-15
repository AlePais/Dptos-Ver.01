<?php
	function crear_variable($query)
	{
		global $mysqli;
		$resultado = $mysqli->query($query);
		if($resultado->num_rows!=0)
		{
			$datos = $resultado->fetch_array(MYSQLI_ASSOC);
			foreach( $datos as $nombre_campo => $valor)
			{
				if(!is_numeric($nombre_campo))
				{
					global $$nombre_campo;
					$asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
					eval($asignacion);
				}
			}
			$resultado->free();
		}
	}

	//se le da como dato la variable del fetch array
	function crear_variable_while($datos)
	{			
		foreach($datos as $nombre_campo => $valor)
		{
			global $$nombre_campo;
			$asignacion = "\$" . $nombre_campo . "='" . $valor . "';"; 
			eval($asignacion);
		}
	}
?>