$( document ).ready(function()
{
	$("input[type='radio'][name='galeria_imagenes']").click(formulario_galeria);
	formulario_galeria();
	$("input[type='radio'][name='imagenes']").click(formulario_imagenes);
	$("input[type='radio'][name='imagenes_nombre']").click(formulario_imagenes);
	$("input[type='radio'][name='imagenes_descripcion']").click(formulario_imagenes);
	formulario_imagenes();

	$("input[type='radio'][name='fondo_tipo']").click(formulario_fondo);
	formulario_fondo();
	
	recarga_lista();	
	$("#recargar").click(recarga_lista);
	$("#agregar").click(agregar);
});

function recarga_lista()
{
	$.ajax
	({
		type:"POST",
		url: 'funciones/pagina/lista_secciones.php',
		dataType: 'JSON',
		success: function(data)
		{
			$("#elementos_disponibles").html('');
			for (key in data)
			{
				$("#elementos_disponibles").append("<option value='"+data[key]['id_elemento']+"'>"+data[key]['nombre']+"</option>");
			}
		}
	});
}

function agregar()
{
	var nombre = $("#elementos_disponibles option:selected").text();
	var id = $("#elementos_disponibles option:selected").val();

	$("#lista_secciones").append("<li id='ele_"+id+"'><input type='hidden' name='seccion_"+id+"'>"+nombre+"<div id='eliminar' onclick='quita_imagen('ele_"+id+"')'><b>Quitar</b></div></li>");
}

function formulario_fondo()
{
	var fondo_valor_anterior = $("#fondo_valor_anterior").val();

	switch($("input[type='radio'][name='fondo_tipo']:checked").val())
	{
		case "color":
			$("#fondo").html("<input type='color' name='fondo_valor' id='fondo_valor' value='"+fondo_valor_anterior+"'>");
			break;
		case "imagen":
			formulario_carga('fondo', 'parametros_fondo')
			break;
	}
}
function formulario_galeria()
{
	switch($("input[type='radio'][name='galeria_imagenes']:checked").val())
	{
		case "no":
			$("#galeria").html("");
			break;
		case "si":
			formulario_carga('galeria',	'parametros_galeria')
			break;
	}
}

function formulario_imagenes()
{
	switch($("input[type='radio'][name='imagenes_nombre']:checked").val())
	{
		case "no":
			$("#parametros_imagen [type='hidden'][name='nombre']").val("0");
			break;
		case "si":
			$("#parametros_imagen [type='hidden'][name='nombre']").val("1");
			break;
	}
	
	switch($("input[type='radio'][name='imagenes_descripcion']:checked").val())
	{
		case "no":
			$("#parametros_imagen [type='hidden'][name='descripcion']").val("0");
			break;
		case "si":
			$("#parametros_imagen [type='hidden'][name='descripcion']").val("1");
			break;
	}
	
	switch($("input[type='radio'][name='imagenes']:checked").val())
	{
		case "no":
			$("#imagenes").html("");
			break;
		case "si":
			formulario_carga('imagenes', 'parametros_imagen')
			break;
	}
}