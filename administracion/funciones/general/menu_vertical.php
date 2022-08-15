<div>
	<center>
		<img src="../interfaz/logo.png">
		<p><b>Usuario:</b><?php echo $_SESSION['nombre_usuario'];?></p>
	</center>
</div>
<br>
<br>
<ul>
	<?php
		$links = array
		("pagina.php"=>"Pagina",
		"email.php"=>"Email",
		"categoria.php" => "Categorias",
		"sub_categoria.php" => "Sub Categorias",
		"articulo.php" => "Articulo",
		"categoria_contacto.php" => "Contacto - Categorias",
		"contacto_recibido.php" => "Mensajes recibidos",
		"contenido.php" => "Contenido");
		foreach($links as $href => $nombre_pagina)
		{
	?>
		<li><a href='<?php echo $href?>'><?php echo $nombre_pagina?></a></li>
	<?php
		}
	?>
</ul>