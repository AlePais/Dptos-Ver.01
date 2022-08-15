<?php
	$parametros = $_POST['parametros'];
	$titulo = $_POST['titulo'];
	$categoria = $_POST['categoria'];
	$etiqueta = $_POST['etiqueta'];//Texto que aparecera en el boton de subir archivo
	$cantidad = $_POST['cantidad'];//Carga de elementos simple o multiple
?>
<h2><?php echo $titulo?></h2>

<fieldset id="formulario_<?php echo $categoria?>">
	<div id="cargando" style="display:none"><img src='interfaz/iconos/demo_wait.gif' width="64" height="64" /><br>Cargando...</div>

	<div class="row">
		<div class="col-lg-2">
			<input type="file"  class="inputfile" name="archivo_<?php echo $categoria?>[]" id="archivo_<?php echo $categoria?>" <?php echo $cantidad?>/>
			<label for="archivo_<?php echo $categoria?>">
				<svg xmlns="http://www.w3.org/2000/svg" class="iborrainputfile" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"></path></svg>
				<span class="iborrainputfile"><?php echo $etiqueta?></span>
			</label>	
		</div>
	</div>
	<fieldset id="div_<?php echo $categoria?>">
		<?php
			if($cantidad=='multiple')
			{
		?>
			<script>ordenar('div_<?php echo $categoria?>');</script>
		<?php
			}
		?>
	</fieldset>
</fieldset>
<script type="text/javascript">
	$(function(){cargarElementos('<?php echo $parametros?>')});
	$("#archivo_<?php echo $categoria?>").on('change', function(){subirArchivos('<?php echo $parametros?>');});
</script>