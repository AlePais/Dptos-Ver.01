$( document ).ready(function()
{
	$("#nombre_seccion").blur(titulo_seccion);
	$("input[type='radio'][name='fondo_tipo']").click(formulario_fondo);
	formulario_fondo();
	$("input[type='radio'][name='lista_imagen']").click(formulario_lista);
	$("input[type='radio'][name='lista_nombre']").click(formulario_lista);
	$("input[type='radio'][name='lista_descripcion']").click(formulario_lista);
	formulario_lista();
	formulario_carga('imagenes', 'parametros_imagenes')
});

function titulo_seccion()
{
	var titulo_seccion = $("#nombre_seccion").val();

	$("#parametros_lista [type='hidden'][name='titulo']").val(titulo_seccion);
	$("#lista h2").html("LISTA: "+titulo_seccion);

}

function formulario_fondo()
{
	var fondo_valor_anterior = $("#fondo_valor_anterior").val();

	switch($("input[type='radio'][name='fondo_tipo']:checked").val())
	{
		case "rgb":
			$("#fondo").html("<input type='input' name='fondo_valor' id='fondo_valor' value='"+fondo_valor_anterior+"'>");
			break;
		case "color":
			$("#fondo").html("<input type='color' name='fondo_valor' id='fondo_valor' value='"+fondo_valor_anterior+"'>");
			break;
		case "imagen":
			formulario_carga('fondo', 'parametros_fondo')
			break;
	}
}

function formulario_lista()
{
	switch($("input[type='radio'][name='lista_nombre']:checked").val())
	{
		case "no":
			$("#parametros_lista [type='hidden'][name='adm_nombre']").val("0");
			break;
		case "si":
			$("#parametros_lista [type='hidden'][name='adm_nombre']").val("1");
			break;
	}
	
	switch($("input[type='radio'][name='lista_descripcion']:checked").val())
	{
		case "no":
			$("#parametros_lista [type='hidden'][name='adm_descripcion']").val("0");
			break;
		case "si":
			$("#parametros_lista [type='hidden'][name='adm_descripcion']").val("1");
			break;
	}
	
	switch($("input[type='radio'][name='lista_imagen']:checked").val())
	{
		case "no":
			$("#lista").html("");
			break;
		case "si":
			formulario_carga('lista', 'parametros_lista')
			titulo_seccion();
			break;
	}
}