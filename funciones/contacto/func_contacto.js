
function formulario_carga(id_contenedor, parametros_formulario)
{
	$.ajax
	({
		type: "POST",
		url: 'funciones/contacto/subir_archivos/formulario.php',
		data: $("#"+parametros_formulario).serialize(), // Adjuntar los campos del formulario enviado.
		success: function(data)
		{
			$("#"+id_contenedor).html(data);//Mostrar la respuestas del script PHP.
		}
	});
}

function cargarElementos(tipo_elemento)
{
	$.ajax
	({
		type: "POST",
		url: "funciones/contacto/subir_archivos/listado_archivo.php", // our php file
		data: $("#parametros_"+tipo_elemento).serialize(), // Adjuntar los campos del formulario enviado.
		dataType: 'JSON',
		success: function(data)
		{
			mostrarElementos(data, tipo_elemento);
		}
	});
}

function subirArchivos(tipo)
{
	var tipo_elemento = tipo;
	var tipo = "archivo_"+tipo;
	//nuevo objeto html5 formdata.
	var formData = new FormData();
	//por cada elemento, sumo 1 al formdata para luego acceder via $_FILES["file" + i]
	for (var i = 0, len = document.getElementById(tipo).files.length; i < len; i++){
		formData.append(tipo + i, document.getElementById(tipo).files[i]);
	}
	var codigo_unico=document.getElementById('codigo_unico').value;
	formData.append('codigo_unico', codigo_unico);
	formData.append('tipo', tipo_elemento);

	//envio los archivos
	$.ajax
	({
		url: "funciones/contacto/subir_archivos/subir_archivo.php", // our php file
		type: 'post',
		data: formData,
		async: true,
		processData: false,  // tell jQuery not to process the data
		contentType: false,   // tell jQuery not to set contentType
		dataType: 'JSON',
		success: function(respuesta)
		{
			mostrarElementos(respuesta, tipo_elemento);
		}
	});

}

function mostrarElementos(respuesta, tipo_elemento)
{
	for (key in respuesta)
	{
		
		if(tipo_elemento=='imagen')
		{
			var src_miniatura=respuesta[key]['carpeta']+respuesta[key]['corregido'];
		}
		if(tipo_elemento=='archivo')
		{
			var src_miniatura="interfaz/iconos/"+respuesta[key]['icono'];
			if(respuesta[key]['icono']=='imagen.png')
			{
				var src_miniatura=respuesta[key]['carpeta']+respuesta[key]['corregido'];
			}
		}
		if($("#cantidad").val()=='simple')
		{
			// si es una sola imagen va, html, si son varias, append
			$("#div_"+tipo_elemento).html("<div class='eliminar' ><img src='"+src_miniatura+"'><p onClick=eliminar_elemento('"+respuesta[key]['id_elemento']+"','"+$("#tabla_archivo").val()+"') id='otro_ordenar'>X</p></div><br>");
		}
		else
		{
			var nombre ='';
			if(tipo_elemento=='archivo')
			{
				var nombre = respuesta[key]['corregido']
			}
			// si es una sola imagen va, html, si son varias, append
			$("#div_"+tipo_elemento).append("<div class='eliminar' id="+respuesta[key]["id_elemento"]+"><input type='hidden' name='"+tipo_elemento+"_"+respuesta[key]['id_elemento']+"' value='"+respuesta[key]['id_elemento']+"'><img src='"+src_miniatura+"'>"+nombre+"<p onClick=eliminar_elemento('"+respuesta[key]['id_elemento']+"','id_elemento','"+tipo_elemento+"') id='otro_ordenar'>X</p></div><br>");
		}
	}
}

function eliminar_elemento(id, nombre_id, tabla)
{
	var confirmacion = confirm(" ¿ESTA SEGURO QUE DESEA ELIMINAR?\n\nEn caso se eliminara el elemento de manera permanente")
	if (confirmacion == true)
	{
		conexion1=crearXMLHttpRequest();
		conexion1.onreadystatechange = quita_imagen(id);
		conexion1.open('GET','administracion/funciones/general/eliminar_elemento.php?id_elemento='+id+'&nombre_id='+nombre_id+'&tabla='+tabla, true);
		conexion1.send(null);
	}
}

function quita_imagen(variable)
{
	var eliminar = document.getElementById(variable);
	eliminar.parentNode.removeChild(eliminar);
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