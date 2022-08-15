function inicia_sub_categoria(raiz, n2_tipo, nivel_1, nivel_2, nivel_3)
{
	var n1_id=document.getElementById(nivel_1);
	var n2_id=document.getElementById(nivel_2);
	var n3_id=document.getElementById(nivel_3);
	n2_id.options.length=1;
	n2_id.disabled=true;
	n2_id.options[0].text='Cargando';
	n3_id.options.length=1;
	n3_id.disabled=true;
	n3_id.options[0].text='Seleccione tipo de alojamiento';

	conexion=crearXMLHttpRequest();
	conexion.onreadystatechange = function(){lista_sub_categoria(nivel_2)};
	conexion.open('GET',raiz+'administracion/funciones/general/lista_n2.php?n1_id='+n1_id.value+'&n2_tipo='+n2_tipo, true);
	conexion.send(null);
}

function lista_sub_categoria(nivel_2)
{
	if(conexion.readyState == 4)
	{
		var lista_n2 = eval("(" + conexion.responseText + ")");
		var n2_id=document.getElementById(nivel_2);
		for(f=0;lista_n2[f];f++)
		{
			var op=document.createElement('option');
			var texto=document.createTextNode(DecodeHtmlEntities(lista_n2[f].nombre));
			op.appendChild(texto);
			op.value=lista_n2[f].id;
			n2_id.appendChild(op);
		}
		n2_id.options[0].text='Elegir departamento o localidad';
		n2_id.disabled=false;
	}
}

function inicia_articulo(raiz, n3_tipo, nivel_1, nivel_2, nivel_3)
{
	var n1_id=document.getElementById(nivel_1);
	var n2_id=document.getElementById(nivel_2);
	var n3_id=document.getElementById(nivel_3);
	n3_id.options.length=1;
	n3_id.disabled=true;
	n3_id.options[0].text='Cargando';
	
	conexion=crearXMLHttpRequest();
	conexion.onreadystatechange = function(){lista_articulo(nivel_3)};
	conexion.open('GET',raiz+'administracion/funciones/general/lista_n3_depto.php?n2_id='+n2_id.value+'&n3_tipo='+n3_tipo, true);
	conexion.send(null);
}

function lista_articulo(nivel_3)
{
	if(conexion.readyState == 4)
	{
		var lista_n3 = eval("(" + conexion.responseText + ")");
		var n3_id=document.getElementById(nivel_3);
		for(f=0;lista_n3[f];f++)
		{
			var op=document.createElement('option');
			var texto=document.createTextNode(DecodeHtmlEntities(lista_n3[f].tipo_alojamiento));
			op.appendChild(texto);
			op.value=lista_n3[f].tipo_alojamiento;
			n3_id.appendChild(op);
		}
		n3_id.options[0].text='Seleccione tipo de alojamiento';
		n3_id.disabled=false;
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