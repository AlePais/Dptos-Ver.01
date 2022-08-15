addEvent(window,'load',inicializarEventos,false);

function inicializarEventos()
{
	$("#carga_elemento").click(mostrar);
}

function mostrar()
{
	$("#formulario").css("display","");
	$("#carga_elemento").css("display","none")
}

function eliminar(id, nombre_id, tabla)
{
	var confirmacion = confirm(" ¿ESTA SEGURO QUE DESEA ELIMINAR?\n\nEn caso se eliminara el elemento de manera permanente")
	if (confirmacion == true)
	{
		conexion=crearXMLHttpRequest();
		conexion.onreadystatechange = recargar;
		conexion.open('GET','funciones/general/eliminar_elemento.php?id_elemento='+id+'&nombre_id='+nombre_id+'&tabla='+tabla, true);
		conexion.send(null);
	}
}

function recargar()
{
	if(conexion.readyState == 4)
	{
		location.reload();
	}
}

function eliminar_elemento(id, nombre_id, tabla)
{
	var confirmacion = confirm(" ¿ESTA SEGURO QUE DESEA ELIMINAR?\n\nEn caso se eliminara el elemento de manera permanente")
	if (confirmacion == true)
	{
		conexion1=crearXMLHttpRequest();
		conexion1.onreadystatechange = quita_imagen(id);
		conexion1.open('GET','funciones/general/eliminar_elemento.php?id_elemento='+id+'&nombre_id='+nombre_id+'&tabla='+tabla, true);
		conexion1.send(null);
	}
}

function quita_imagen(variable)
{
	var eliminar = document.getElementById(variable);
	eliminar.parentNode.removeChild(eliminar);
}

function ordenar(id)
{
	$( function() {
		$( "#"+id).sortable({
		revert: true
		});
		$( "#draggable" ).draggable({
		connectToSortable: "#sortable",
		helper: "clone",
		revert: "invalid"
		});
		$( "ul, li" ).disableSelection();
	});
}

function respuestaVerificacion(elemento, respuesta)
{
	$($(elemento).parent()).find(".error").html(respuesta);
}

// funcion de cargar de archivos e imagenes
function formulario_carga(id_contenedor, parametros_formulario)
{
	$.ajax
	({
		type: "POST",
		url: 'funciones/general/subir_archivo/formulario.php',
		data: $("#"+parametros_formulario).serialize(), // Adjuntar los campos del formulario enviado.
		success: function(respuesta)
		{
			$("#"+id_contenedor).html(respuesta);//Mostrar la respuestas del script PHP.
		}
	});
}

function cargarElementos(parametros)
{
	$.ajax
	({
		type: "POST",
		url: "funciones/general/subir_archivo/listado_archivo.php", // our php file
		data: $("#"+parametros).serialize(), // Adjuntar los campos del formulario enviado.
		dataType: 'JSON',
		success: function(respuesta)
		{
			mostrarElementos(respuesta, parametros);
		}
	});
}

function subirArchivos(parametros)
{
	var tabla=$("#"+parametros+" #tabla").val();
	var codigo_unico=$("#"+parametros+" #codigo_unico").val();
	var tipo=$("#"+parametros+" #tipo").val();
	var categoria=$("#"+parametros+" #categoria").val();
    $("#cargando").css("display", "block");

	var input_file= "archivo_"+categoria;
	//nuevo objeto html5 formdata.
	var formData = new FormData();
	//por cada elemento, sumo 1 al formdata para luego acceder via $_FILES["file" + i]
	for (var i = 0, len = document.getElementById(input_file).files.length; i < len; i++){
		formData.append(input_file + i, document.getElementById(input_file).files[i]);
	}
	formData.append('tipo', tipo);
	formData.append('tabla', tabla);
	formData.append('codigo_unico', codigo_unico);

	//envio los archivos
	$.ajax
	({
		url: "funciones/general/subir_archivo/subir_archivo.php", // our php file
		type: 'post',
		data: formData,
		async: true,
		processData: false,  // tell jQuery not to process the data
		contentType: false,   // tell jQuery not to set contentType
		dataType: 'JSON',
		success: function(respuesta)
		{
			mostrarElementos(respuesta, parametros);//tabla_datos es la tabla en la que guarda la informacion de archivos y ubicacion
			$("#cargando").css("display", "none");
		}
	});
}


function mostrarElementos(respuesta, parametros)
{
	var tipo_miniatura=$("#"+parametros+" #tipo_miniatura").val();
	var categoria=$("#"+parametros+" #categoria").val();
	var cantidad=$("#"+parametros+" #cantidad").val();
	var adm_nombre=$("#"+parametros+" #adm_nombre").val();
	var adm_descripcion=$("#"+parametros+" #adm_descripcion").val();
	var tipo=$("#"+parametros+" #tipo").val();

	for (key in respuesta)
	{
		var id_archivo = respuesta[key]['id_archivo'];
		var carpeta = respuesta[key]['carpeta'];
		var archivo = respuesta[key]['archivo'];
		var nombre = respuesta[key]['nombre'];
		var descripcion = respuesta[key]['descripcion'];
		var icono = respuesta[key]['icono'];
		
		if(tipo_miniatura=='imagen')
		{
			var src_miniatura=carpeta+archivo;
		}
		if(tipo_miniatura=='icono_archivo')
		{
			var src_miniatura="interfaz/iconos/"+icono;
		}
		
		var clase='';
		if(tipo=='archivo')
		{
			var clase='nombre_archivo';
		}
		
		// si es una sola imagen va, html, si son varias, append
		if(cantidad=='simple')
		{
			$("#div_"+categoria).html("<div class='eliminar' id="+id_archivo+" style='background-image:url(../"+src_miniatura+")'></div>");
			
			$("#"+respuesta[key]["id_archivo"]).append("<input type='hidden' name='"+categoria+"["+id_archivo+"][id_archivo]' value='"+id_archivo+"' >");
			$("#"+respuesta[key]["id_archivo"]).append("<p onClick=eliminar_elemento('"+id_archivo+"','id_archivo','archivo') id='otro_ordenar'>X</p>");
			$("#"+id_archivo).append("<div class='flotante_descripcion' id='flotante_"+id_archivo+"'></div>");

			
			if(adm_nombre==1)
			{
				$("#flotante_"+id_archivo).append("<input type='text' name='"+categoria+"_nombre_"+id_archivo+"' value='"+respuesta[key]['nombre']+"' placeholder='Nombre'>");
			}
			if(adm_descripcion==1)
			{
				$("#flotante_"+id_archivo).append("<textarea name='"+categoria+"_descripcion_"+id_archivo+"' placeholder='Descripcion'>"+respuesta[key]['descripcion']+"</textarea>");
			}
		}
		else
		{
			$("#div_"+categoria).append("<div class='eliminar' id="+id_archivo+" style='background-image:url(../"+src_miniatura+")'></div>");
			
			$("#"+respuesta[key]["id_archivo"]).append("<input type='hidden' name='"+categoria+"["+id_archivo+"][id_archivo]' value='"+id_archivo+"' >");
			$("#"+respuesta[key]["id_archivo"]).append("<p onClick=eliminar_elemento('"+id_archivo+"','id_archivo','archivo') id='otro_ordenar'>X</p>");
			$("#"+id_archivo).append("<div class='flotante_descripcion' id='flotante_"+id_archivo+"'></div>");

			if(adm_nombre==1)
			{
				$("#flotante_"+id_archivo).append("<input type='text' name='"+categoria+"_nombre_"+id_archivo+"' value='"+respuesta[key]['nombre']+"' placeholder='Nombre'>");
			}
			if(adm_descripcion==1)
			{
				$("#flotante_"+id_archivo).append("<textarea name='"+categoria+"_descripcion_"+id_archivo+"' placeholder='Descripcion'>"+respuesta[key]['descripcion']+"</textarea>");
			}
		}
		if(tipo=='archivo')
		{
			$("#"+respuesta[key]["id_archivo"]).append("<span class='nombre_archivo'>"+archivo+"</span>");
		}
	}
}

//***************************************
//Funciones genericas DHTML y AJAX
//***************************************

function addEvent(elemento,nomevento,funcion,captura)
{
  if (elemento.attachEvent)
  {
    elemento.attachEvent('on'+nomevento,funcion);
    return true;
  }
  else  
    if (elemento.addEventListener)
    {
      elemento.addEventListener(nomevento,funcion,captura);
      return true;
    }
    else
      return false;
}

function crearXMLHttpRequest() 
{
  var xmlHttp=null;
  if (window.ActiveXObject) 
    xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
  else 
    if (window.XMLHttpRequest) 
      xmlHttp = new XMLHttpRequest();
  return xmlHttp;
}	