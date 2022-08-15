<?php
	include '../../../funciones/general/conexion.php';

	if(isset($_POST['id_agenda_representantes']))
	{
		$id_agenda_representantes = $_POST['id_agenda_representantes'];
		$query = "SELECT * FROM `agenda_representantes_relaciones` WHERE `id_agenda_representantes` = '$id_agenda_representantes'";
		$resultado = $mysqli -> query ($query);
		while($datos = $resultado->fetch_array(MYSQLI_ASSOC))
		{
			$id_relacion = $datos['id_relacion'];
			$id_depto = $datos['n3_id']; 
			$query1="SELECT `n1_nombre`, `n2_nombre`, `n3_nombre` FROM nivel_1 NATURAL JOIN nivel_2 NATURAL JOIN nivel_3 WHERE nivel_3.n3_id = '$id_depto'";
			$resultado1 = $mysqli->query($query1);
			if($resultado1->num_rows!=0)
			{
				$datos1=$resultado1->fetch_array(MYSQLI_ASSOC);
				$nombre = $datos1['n1_nombre']."/".$datos1['n2_nombre']."/".$datos1['n3_nombre'];
?>
	<li><?php echo $nombre?><div id="eliminar" onClick="quita_relacion('<?php echo $id_relacion?>')"><b>Quitar</b></div></li>
<?php
			}
		}
	}
?>