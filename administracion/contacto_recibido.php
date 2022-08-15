<?php
	include 'funciones/general/funciones_administracion.php';
	// Variables [$_GET $id_elemento-$nombre] [general $tipo-$codigo_unico-$vista_from-$vista_boton-$tipo_consulta(ej n1_tipo)]

	//tipo_consulta es para que pueda leer la fila vacia de la consulta
	$query = "SELECT * FROM `nivel_1` WHERE `n1_id` = '$id_elemento'";
	crear_variable($query);
	$titulo = 'Consulta'; $tabla = 'contacto'; $tipo="contacto";
?>
<html>
	<head>
		<?php include 'funciones/general/cabecera_administracion.php';?>
	</head>
	<body>
		<?php include "funciones/general/encabezado.php";?>	
		<div id='cuerpo'>
			<div class="seccion_auto ancho_fijo_auto">						
				<div class="contenedor ">
				<div id="encabezado_titulo">
									<img src="<?php echo $raiz?>interfaz/iconos/<?php echo $tipo;?>.png">
									<p><?php echo $titulo?></p>
									<!--<a id='carga_producto'class="right" href="categoria_reclamo.php" style="<?php echo $vista_boton?>"> Administrar Categorias de reclamo </a>
									<a id='carga_producto'class="right" href="sub_categoria_reclamo.php" style="<?php echo $vista_boton?>"> Administrar Sub-Categorias de reclamo</a>-->
									<div class="seccion_autoc1"></div>
								</div>
					<table class="ancho_fijo" height="auto" align="top">
						<tr>
							<td class="contenedor" style="margin-top:0px !important;">
							<hr>
								<div class="filtros" >
									<li id="filtros_ordenar">
										<span>Ident.<input type="button" id="id" value="-" ></span>
										<span>Nombre<input type="button" id="nombre" value="-"> </span>
										<span>Apellido<input type="button" id="apellido" value="-"></span>
										<span>Asunto<input type="button" id="asunto" value="-"></span>
										<span>E-mail<input type="button" id="email" value="-"></span>
										<span>Fecha<input type="button" id="fecha_reclamo" value="-"></span>
									</li>
									<input type="hidden" id="campo_ordenar" value='id'>
									<input type="hidden" id="asc_desc" value='ASC'>
									<br>					
								</div>	
								<div id='listado_contactos'></div>	
								<div class="seccion_autoc"></div>
							</td>
						</tr>
					</table>
					<div class="seccion_autoc"></div>
				</div>
				<div class="seccion_autoc"></div>
			</div>
		
		<div class="seccion_autoc"></div>
		<div id='pie_de_pagina'>
			<?php include "funciones/general/pie_de_pagina_me.php"; ?>	
		</div>
		</div>
	</body>
</html>
<script>
	$(document).ready(function()
	{
		lista_reclamos('id');
		$("#filtros_ordenar input").each(function()
		{
			$(this).on('click', function(){lista_reclamos($(this).attr('id'));});
			$(this).val('▼');
		});
	})
	
function lista_reclamos(variable)
{
	var campo_ordenar = document.getElementById('campo_ordenar').value;
	var asc_desc = document.getElementById('asc_desc').value;

	if(campo_ordenar == variable)
	{
		if(asc_desc=="DESC")
		{
			document.getElementById('asc_desc').value = "ASC";
			asc_desc = "ASC";
			$("#"+variable).val('▼');
		}
		else
		{
			document.getElementById('asc_desc').value = "DESC";
			asc_desc = "DESC";
			$("#"+variable).val('▲');
		}
	}
	else
	{
		document.getElementById('campo_ordenar').value = variable;
		campo_ordenar = variable;

		document.getElementById('asc_desc').value = "ASC";
		asc_desc = "ASC";
		$("#"+variable).val('▼');
	}

	$.ajax({
		url: 'funciones/contacto/lista.php?campo_ordenar='+campo_ordenar+'&asc_desc='+asc_desc,
		dataType: 'JSON',
		success: function(respuesta){
			if (respuesta)
			{
				var html = '';
				for (key in respuesta)
				{
					if (respuesta[key] != undefined)
					{
							html +=	"<li class='"+respuesta[key]['estilo']+"'>";
							html +=	"<span><a href='contacto_detalle.php?id_elemento="+respuesta[key]['id']+"&nombre="+respuesta[key]['nombre']+"'>" + respuesta[key]['id'] + "</a></span>";
							html +=	"<span>" + respuesta[key]['nombre'] + "</span>";
							html +=	"<span>" + respuesta[key]['apellido'] + "</span>";
							html +=	"<span>" + respuesta[key]['asunto'] + "</span>";
							html +=	"<span>" + respuesta[key]['email'] + "</span>";
							html +=	"<span>" + respuesta[key]['creado'] + "</span>";
							html +=	"<span class='eliminar2' id='"+respuesta[key]['id']+"' onClick='llamar_eliminar(this.id)'> X </span>";
						html +=	"</li>";
					}
				}
				$("#listado_contactos").html(html);
			}
		}
	});
}

function llamar_eliminar(id)
{
	eliminar(id,'id', 'contacto');
}
</script>