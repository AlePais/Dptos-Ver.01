<?php
	$tipo = $_POST['tipo'];
	$codigo_unico = $_POST['codigo_unico'];
	$tabla_archivo = $_POST['tabla_archivo'];
	$id = $_POST['id'];
	$cantidad = $_POST['cantidad'];
?>
<fieldset id="formulario_<?php echo $tipo?>">
	<input type='hidden' id='codigo_unico' name='codigo_unico' value='<?php echo $codigo_unico;?>'>
	<input type="hidden" id="tipo" name="tipo" value="<?php echo $tipo?>">
	<input type="hidden" id="tabla_archivo" name="tabla_archivo" value="<?php echo $tabla_archivo?>">
	<input type="hidden" id="id_tabla" name="id_tabla" value="<?php echo $id?>">

	<h3><i><?php echo ucfirst($tipo)?></i></h3>
	<div class="row">
		<div class="col-lg-2">
			<input type="file" name="archivo_<?php echo $tipo?>[]" id="archivo_<?php echo $tipo?>" <?php echo $cantidad?>/>
		</div>
	</div>
	<fieldset id="div_archivos">
		<ul id="div_<?php echo $tipo?>"></ul>
	</fieldset>
</fieldset>
<script type="text/javascript">
	$(function(){cargarElementos('<?php echo $tipo?>')});
	$("#archivo_<?php echo $tipo?>").on('change', function(){subirArchivos('<?php echo $tipo?>');});
</script>