addEvent(window,'load',inicializarEventos,false);

var campos = 0;

function inicializarEventos()
{
	var n2_id=document.getElementById('n2_id');
	addEvent(n2_id,'change',inicia_articulo,false);
}

function inicia_articulo()
{
	var n3_tipo=document.getElementById('n3_tipo');
	var n2_id=document.getElementById('n2_id');
	var n3_id=document.getElementById('n3_id');
	n3_id.options.length=1;
	n3_id.disabled=true;
	n3_id.options[0].text='Cargando';
	
	conexion=crearXMLHttpRequest();
	conexion.onreadystatechange = lista_articulo;
	conexion.open('GET','funciones/general/lista_n3.php?n2_id='+n2_id.value+'&n3_tipo='+n3_tipo.value, true);
	conexion.send(null);
}

function lista_articulo()
{
	if(conexion.readyState == 4)
	{
		var lista_n3 = eval("(" + conexion.responseText + ")");
		var n3_id=document.getElementById('n3_id');
		for(f=0;lista_n3[f];f++)
		{
			var op=document.createElement('option');
			var texto=document.createTextNode(DecodeHtmlEntities(lista_n3[f].nombre));
			op.appendChild(texto);
			op.value=lista_n3[f].id;
			n3_id.appendChild(op);
		}
		n3_id.options[0].text='Seleccione cantidad de habitaciones';
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