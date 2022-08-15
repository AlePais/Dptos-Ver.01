<?php

	function campos_extra($array_extra, $tipo, $tabla_asociada, $identificador_tabla, $id_elemento)
	//tipo ej: categoria; identificador_tabla es el id de tabla
	{
		global $mysqli;
		global $fecha_actual;
		global $fecha_actual;
		if(isset($array_extra))
		{
			foreach($array_extra as $nombre_red=>$datos)
			{
				$corregido = $datos['corregido'];
				$valor= $_POST[$corregido];

				if(isset($datos['tipo']) && $datos['tipo'] == 'url')
				{
					$contenido_campo=verifica_url($valor);
				}
				else
				{
					$contenido_campo = $valor;
				}

				$query="SELECT `contenido` FROM `general` WHERE `tipo` = '$tipo'  AND `identificador_tabla` = '$identificador_tabla' AND `id_elemento` = '$id_elemento' AND `nombre` LIKE '$corregido'";
				$resultado=$mysqli->query($query);
				if($resultado->num_rows==0 && $contenido_campo!='')
				{
					$operacion = 'insertar';
					$creado = $fecha_actual;
				}
				else
				{
					$comparador = $resultado->fetch_array(MYSQLI_ASSOC);
					if($contenido_campo == $comparador['contenido'])
					{
						$operacion = '';
					}
					else
					{
						$operacion = 'modificar';
					}
				}

				if($operacion != '')
				{
					$bd_general=new bd_basico($operacion, 'general');
					$bd_general->agregar_dato('tabla_asociada',$tabla_asociada);
					$bd_general->agregar_dato('identificador_tabla',$identificador_tabla);
					$bd_general->agregar_dato('id_elemento',$id_elemento);
					$bd_general->agregar_dato('nombre',$corregido);
					$bd_general->agregar_dato('contenido',$contenido_campo);
					$bd_general->agregar_dato('tipo',$tipo);
					$bd_general->agregar_dato('orden','');
					$bd_general->agregar_clausula('identificador_tabla','=',$identificador_tabla);
					$bd_general->agregar_clausula('id_elemento','=',$id_elemento);				
					$bd_general->agregar_clausula('nombre','=',$corregido);
					$bd_general->realizar_consulta($mysqli);
				}
			}
		}
	}
?>