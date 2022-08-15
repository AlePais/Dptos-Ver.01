addEvent(window,'load',inicializarEventos,false);

var campos = 0;

function inicializarEventos()
{
	var n1_id_depto=document.getElementById('n1_id_depto');
	addEvent(n1_id_depto,'change',inicia_sub_categoria_depto,false);
	var n2_id_depto=document.getElementById('n2_id_depto');
	addEvent(n2_id_depto,'change',inicia_articulo_depto,false);
	$("#agregar").click(agregar);
	lista_relaciones();
}

function agregar()
{
	$.ajax
	({
		type: "POST",
		url: 'funciones/nivel_3/relacion_crear.php',
		data: $("#formulario").serialize(), // Adjuntar los campos del formulario enviado.
		success: function(respuesta)
		{
			lista_relaciones();//Mostrar la respuestas del script PHP.
		}
	});
}

function quita_relacion(id)
{
	conexion1=crearXMLHttpRequest();
	conexion1.onreadystatechange = lista_relaciones;
	conexion1.open('GET','funciones/nivel_3/relacion_eliminar.php?id_relacion='+id, true);
	conexion1.send(null);
}

function lista_relaciones()
{
	$.ajax
	({
		type: "POST",
		url: 'funciones/nivel_3/relacion_listar.php',
		data: $("#formulario").serialize(), // Adjuntar los campos del formulario enviado.
		success: function(respuesta)
		{
			$('#lista_relaciones').html(respuesta);//Mostrar la respuestas del script PHP.
		}
	});
}

function inicia_sub_categoria_depto()
{
	var n1_id_depto=document.getElementById('n1_id_depto');
	var n2_id_depto=document.getElementById('n2_id_depto');
	n2_id_depto.options.length=1;
	n2_id_depto.disabled=true;
	n2_id_depto.options[0].text='Cargando';
	
	conexion=crearXMLHttpRequest();
	conexion.onreadystatechange = lista_sub_categoria_depto;
	conexion.open('GET','funciones/general/lista_n2.php?n1_id='+n1_id_depto.value+'&n2_tipo=departamento_nivel_2', true);
	conexion.send(null);
}

function lista_sub_categoria_depto()
{
	if(conexion.readyState == 4)
	{
		var lista_n2 = eval("(" + conexion.responseText + ")");
		var n2_id_depto=document.getElementById('n2_id_depto');
		for(f=0;lista_n2[f];f++)
		{
			var op=document.createElement('option');
			var texto=document.createTextNode(DecodeHtmlEntities(lista_n2[f].nombre));
			op.appendChild(texto);
			op.value=lista_n2[f].id;
			n2_id_depto.appendChild(op);
		}
		n2_id_depto.options[0].text='Seleccione Sub-categoria';
		n2_id_depto.disabled=false;
	}
	addEvent(n2_id_depto,'change',inicia_articulo_depto,false);

}

function inicia_articulo_depto()
{
	var n1_id_depto=document.getElementById('n1_id_depto');
	var n2_id_depto=document.getElementById('n2_id_depto');
	var n3_id_depto=document.getElementById('n3_id_depto');
	n3_id_depto.options.length=1;
	n3_id_depto.disabled=true;
	n3_id_depto.options[0].text='Cargando';
	
	conexion=crearXMLHttpRequest();
	conexion.onreadystatechange = lista_articulo_depto;
	conexion.open('GET','funciones/general/lista_n3.php?n2_id='+n2_id_depto.value+'&n3_tipo=departamento_nivel_3', true);
	conexion.send(null);
}

function lista_articulo_depto()
{
	if(conexion.readyState == 4)
	{
		var lista_n2 = eval("(" + conexion.responseText + ")");
		var n3_id_depto=document.getElementById('n3_id_depto');
		for(f=0;lista_n2[f];f++)
		{
			var op=document.createElement('option');
			var texto=document.createTextNode(DecodeHtmlEntities(lista_n2[f].nombre));
			op.appendChild(texto);
			op.value=lista_n2[f].id;
			n3_id_depto.appendChild(op);
		}
		n3_id_depto.options[0].text='Seleccione Sub-categoria';
		n3_id_depto.disabled=false;
	}
}

function DecodeHtmlEntities(str)
{
	try
	{
		var txt=document.createElement('textarea');
		txt.innerHTML = str;
		return txt.value;
	}
	catch(e)
	{
		return str;
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