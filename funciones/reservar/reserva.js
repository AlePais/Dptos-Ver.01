var contador=0

var x=0;
function estado(elmnt)
{
	if (x==0)
	{
		x=1;  
		var alto="auto"; 
		$(elmnt).removeClass('bounceout');
		$(elmnt).addClass(' bouncein');
		var estado = "visible";
		var display="block";
	}
	else
	{
		x=0;   
		$(elmnt).removeClass('bouncein');
		$(elmnt).addClass('bounceout');	
		var estado = "hidden";	
		var alto="0px"; 
		var display="none";
	}

	elmnt.style.visibility = estado;
	elmnt.style.height = alto;
	elmnt.style.display = display;		
}

function VerificarCheckIn()
{
	var fecha_check_id=$("#in_fecha").val();
	var fecha_check_out=$("#out_fecha").val();

	if(fecha_check_id=='' || fecha_check_out=='')
	{
		// alert('completa los datos papa');
	}
	else
	{
		// alert('estoy aca');
		CalculoPrecio();
	}
}

function marcarFecha(fecha)
{

	if(contador==0)
	{
		$("#in_fecha").val(fecha);
		$("#out_fecha").val('');
		$("#"+fecha).css( "background-color", "#0000ff" );
		$("#seleccionando").html('CHECK OUT');
		contador=1;
		
		var in_fecha=$("#in_fecha").val();
		draw_calendar_v1()
	}
	else
	{
		$("#out_fecha").val(fecha);
		$("#seleccionando").html('CHECK IN');
		contador=0;
		
		var in_fecha=$("#in_fecha").val();
		var out_fecha=$("#out_fecha").val();
		draw_calendar_v1()
	}

	VerificarCheckIn();
}

function CalculoPrecio()
{
	$.ajax
	({
		type: "POST",
		url: raiz_js+'funciones/reservar/calcular_precio.php',
		data: $("#formulario_reserva").serialize(), // Adjuntar los campos del formulario enviado.
		success: function(respuesta)
		{
			$("#precio").html(respuesta);//Mostrar la respuestas del script PHP.
			if(!isNaN(respuesta))
			{
				$("#precio_calculado").val(respuesta);//Mostrar la respuestas del script PHP.
			}
		}
	});
}

function fecha_no_valida()
{
	alert("La fecha seleccionada no es valida");
}

function cambia_mes(month, year)
{
	$("#month").val(month);
	$("#year").val(year);

	draw_calendar_v1()
}