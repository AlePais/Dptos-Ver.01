addEvent(window,'load',inicializarEventos,false);

var campos = 0;

function inicializarEventos()
{
	var n1_id=document.getElementById('n1_id');
	addEvent(n1_id,'change',inicia_sub_categoria,false);
}

function inicia_sub_categoria()
{
	var n2_tipo=document.getElementById('n2_tipo');
	var n1_id=document.getElementById('n1_id');
	var n2_id=document.getElementById('n2_id');
	n2_id.options.length=1;
	n2_id.disabled=true;
	n2_id.options[0].text='Cargando';

	conexion=crearXMLHttpRequest();
	conexion.onreadystatechange = lista_sub_categoria;
	conexion.open('GET','funciones/general/lista_n2.php?n1_id='+n1_id.value+'&n2_tipo='+n2_tipo.value, true);
	conexion.send(null);
}

function lista_sub_categoria()
{
	if(conexion.readyState == 4)
	{
		var lista_n2 = eval("(" + conexion.responseText + ")");
		var n2_id=document.getElementById('n2_id');
		for(f=0;lista_n2[f];f++)
		{
			var op=document.createElement('option');
			var texto=document.createTextNode(DecodeHtmlEntities(lista_n2[f].nombre));
			op.appendChild(texto);
			op.value=lista_n2[f].id;
			n2_id.appendChild(op);
		}
		n2_id.options[0].text='Seleccione Sub-categoria';
		n2_id.disabled=false;
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

function cambia_select(id_elemento)
{
	var split = id_elemento.split("_estado");
	var campo_adicional = split[0];

	if($("#"+id_elemento).val()=='2')
	{
		$("#"+campo_adicional+"_unidad").prop('disabled', false);
		$("#"+campo_adicional+"_valor").prop('disabled', false);
	}
	else
	{
		$("#"+campo_adicional+"_unidad").prop('disabled', true);
		$("#"+campo_adicional+"_valor").prop('disabled', true);
		$("#"+campo_adicional+"_valor").val(0);
	}
}

function agrega_descuento_dias()
{
	var id_departamento=$("#n3_id").val();
	var dias=$("#dias").val();
	var descuento=$("#descuento_dias").val();
	
	conexion1=crearXMLHttpRequest();
	conexion1.onreadystatechange = function(){respuesta_agregar_dias(id_departamento)};
	conexion1.open('GET','funciones/nivel_3/descuento_dias_agregar.php?id_departamento='+id_departamento+'&dias='+dias+'&descuento='+descuento, true);
	conexion1.send(null);

	$("#dias").val('');
	$("#descuento_dias").val('');
}

function respuesta_agregar_dias(id_departamento)
{
	if(conexion1.readyState == 4)
	{
		var respuesta = conexion1.responseText;
		alert(respuesta);
	}
	cargar_descuentos_dias(id_departamento);
}

function cargar_descuentos_dias(id_departamento)
{
	conexion2=crearXMLHttpRequest();
	conexion2.onreadystatechange = lista_descuentos_dias;
	conexion2.open('GET','funciones/nivel_3/descuento_dias_listado.php?id_departamento='+id_departamento, true);
	conexion2.send(null);
}

function lista_descuentos_dias()
{
	if(conexion2.readyState == 4)
	{
		//alert(conexion2.responseText);
		var desc='';
		var lista = eval("(" + conexion2.responseText + ")");
		for(f=0;lista[f];f++)
		{
			id=lista[f].id;
			dias=lista[f].dias;
			descuento=lista[f].descuento;
			desc=desc+"<div class='eliminar' id='desc_dias_"+id+"' onClick=eliminar_descuento('"+id+"','id','descuentos_dias') >Descuento por "+dias+" dias o mas de "+descuento+"%<p>x</p></div>"
		}
		$("#descuentos_dias").html(desc);
	}
}

function agrega_descuento_personas()
{
	var id_departamento=$("#n3_id").val();
	var personas=$("#personas").val();
	var descuento=$("#descuento_personas").val();
	
	conexion3=crearXMLHttpRequest();
	conexion3.onreadystatechange = function(){respuesta_agregar_personas(id_departamento)};
	conexion3.open('GET','funciones/nivel_3/descuento_personas_agregar.php?id_departamento='+id_departamento+'&personas='+personas+'&descuento='+descuento, true);
	conexion3.send(null);

	$("#personas").val('');
	$("#descuento_personas").val('');
}

function respuesta_agregar_personas(id_departamento)
{
	if(conexion3.readyState == 4)
	{
		var respuesta = conexion3.responseText;
		alert(respuesta);
	}
	cargar_descuentos_personas(id_departamento);
}

function cargar_descuentos_personas(id_departamento)
{
	conexion4=crearXMLHttpRequest();
	conexion4.onreadystatechange = lista_descuentos_personas;
	conexion4.open('GET','funciones/nivel_3/descuento_personas_listado.php?id_departamento='+id_departamento, true);
	conexion4.send(null);
}

function lista_descuentos_personas()
{
	if(conexion4.readyState == 4)
	{
		//alert(conexion4.responseText);
		var desc='';
		var lista = eval("(" + conexion4.responseText + ")");
		for(f=0;lista[f];f++)
		{
			id=lista[f].id;
			personas=lista[f].personas;
			descuento=lista[f].descuento;
			desc=desc+"<div class='eliminar' id='desc_pers_"+id+"' onClick=eliminar_descuento('"+id+"', 'id', 'descuentos_personas') >Descuento por "+personas+" personas o mas de "+descuento+"%<p>x</p></div>"
		}
		$("#descuentos_personas").html(desc);
	}
}

function eliminar_descuento(id, nombre_id, tabla)
{
	conexion1=crearXMLHttpRequest();
	
	if(tabla=='descuentos_dias')
	{
		var id_elemento = "desc_dias_"+id;
	}
	
	if(tabla=='descuentos_personas')
	{
		var id_elemento = "desc_pers_"+id;
	}
	conexion1.onreadystatechange = quita_imagen(id_elemento);
	conexion1.open('GET','funciones/general/eliminar_elemento.php?id_elemento='+id+'&nombre_id='+nombre_id+'&tabla='+tabla, true);
	conexion1.send(null);
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