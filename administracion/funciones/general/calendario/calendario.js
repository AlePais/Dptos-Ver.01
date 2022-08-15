function tratamiento(fecha)
{
	alert(fecha);
}

function cargar_datos(month,year,id_departamento)
{
	draw_calendar_v1(month,year,id_departamento);
	mostrar_reservas(month,year,id_departamento);
}

function draw_calendar_v1(month,year,id_departamento)
{
	//nuevo objeto html5 formdata.
	var formData = new FormData();
	formData.append('month', month);
	formData.append('year', year);
	formData.append('id_departamento', id_departamento);
	formData.append('operacion', 'calendario');

	$.ajax
	({
		url: "funciones/general/calendario/calendario.php", // our php file
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

function mostrar_reservas(month,year,id_departamento)
{
	//nuevo objeto html5 formdata.
	var formData = new FormData();
	formData.append('month', month);
	formData.append('year', year);
	formData.append('id_departamento', id_departamento);
	formData.append('operacion', 'reserva');

	$.ajax
	({
		url: "funciones/general/calendario/calendario.php", // our php file
		type: 'post',
		data: formData,
		async: true,
		processData: false,  // tell jQuery not to process the data
		contentType: false,   // tell jQuery not to set contentType
		success: function(respuesta)
		{
			$("#reserva").html(respuesta);
		}
	});
}