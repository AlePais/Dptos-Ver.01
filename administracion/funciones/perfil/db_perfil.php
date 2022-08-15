<?php
	include '../../../funciones/general/conexion.php';
	include '../../../funciones/general/funciones_guardar.php';
	include '../../../funciones/general/crea_variables.php';
	include '../general/bd_basico.php';
	include '../general/bd_archivo.php';
	include '../general/bd_campo_extra.php';

	$identificador_tabla='id';
	$location=$raiz."administracion/".$url_origen;
	$dolar=$dolar_entero.".".$dolar_decimal;
	$_SESSION['notificacion'] = 'modificado_correctamente';

	$bd_perfil=new bd_basico('modificar', 'usuario');
	$bd_perfil->agregar_dato('nombre',$nombre);
	$bd_perfil->agregar_dato('email',$email);
	$bd_perfil->agregar_dato('password',$password);
	$bd_perfil->agregar_dato('telefono',$telefono);
	$bd_perfil->agregar_dato('direccion',$direccion);
	$bd_perfil->agregar_dato('horario',$horario);
	$bd_perfil->agregar_dato('dolar',$dolar);
	$bd_perfil->agregar_clausula('id','=',$id_elemento);
	$bd_perfil->realizar_consulta($mysqli);

	campos_extra($redes_sociales, 'redes_sociales', 'usuario', 'id', 1);

	$_SESSION['nombre_usuario']=$nombre;

	$ancho=190; $alto=0; $calidad=50; $ajuste='maxWidth';
	$tabla_asociada=$tabla;
	$array_archivo = $_POST['logo'];
	$carpeta_destino = "interfaz/";
	$categoria = 'logo';
	archivo($array_archivo, $carpeta_destino, $categoria, $tabla_asociada, $identificador_tabla, $id_elemento, $ancho, $alto, $ajuste, $calidad);
	
	$ancho=32; $alto=32; $calidad=50; $ajuste='';
	$tabla_asociada=$tabla;
	$array_archivo = $_POST['favicon'];
	$carpeta_destino = "interfaz/";
	$categoria = 'favicon';
	archivo($array_archivo, $carpeta_destino, $categoria, $tabla_asociada, $identificador_tabla, $id_elemento, $ancho, $alto, $ajuste, $calidad);

	header("Location: $location");
?>