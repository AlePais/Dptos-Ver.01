function draw_calendar_v1()
{
	var month = $("#month").val();
	var year = $("#year").val();
	var id_departamento = $("#id_departamento").val();
	var in_fecha = $("#in_fecha").val();
	var out_fecha = $("#out_fecha").val();

	//nuevo objeto html5 formdata.
	var formData = new FormData();
	formData.append('month', month);
	formData.append('year', year);
	formData.append('id_departamento', id_departamento);
	formData.append('in_fecha', in_fecha);
	formData.append('out_fecha', out_fecha);

	$.ajax
	({
		url: raiz_js+"funciones/reservar/calendario/calendario.php", // our php file
		type: 'post',
		data: formData,
		async: true,
		processData: false,  // tell jQuery not to process the data
		contentType: false,   // tell jQuery not to set contentType
		success: function(respuesta)
		{
			$("#calendario").html(respuesta);
		}
	});
}

function validar_reserva()
{
}


