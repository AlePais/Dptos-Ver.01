addEvent(window,'load',inicializarEventos,false);

var campos = 0;

function inicializarEventos()
{
	var carga_producto=document.getElementById('carga_producto');
	addEvent(carga_producto,'click',mostrar,false);
}

function eliminar_imagen(id)
{
var confirmacion = confirm(" ¿ESTA SEGURO QUE DESEA ELIMINAR?\n\nEn caso de aceptar la imagen sera borrado de manera permanente")
	if (confirmacion == true)
		{
			var div_imagen=document.getElementById(id);
			div_imagen.parentNode.removeChild(div_imagen);

			conexion1=crearXMLHttpRequest();
			conexion1.open('GET','funciones/general/eliminar_elemento.php?id_elemento='+id+'&tabla=sub_categorias',true);
			conexion1.send(null);
		}
}

function mostrar()
{
var formulario=document.getElementById('formulario');
formulario.style.display='';
}

function agregarCampo()
{
	campos = campos + 1;
	var nuevo_campo= document.createElement("div");
	nuevo_campo.id= "divarchivo_"+(campos);
	nuevo_campo.innerHTML="<table><tr><td><input type='file' name='imagen_"+campos+"' id='imagen_"+campos+"' accept='image/*'></td><td><a href='JavaScript:quitarCampo("+campos+");'> Quitar </a><td><img id='vista_"+campos+"' style='height:100px' src='#' alt='Aqui aparece la vista previa'></td></td></tr></table>";

	var contenedor= document.getElementById("contenedor_agregar");
	contenedor.appendChild(nuevo_campo);
	
	var cantidad_imagenes=document.getElementById('cantidad_imagenes');
	cantidad_imagenes.value = campos;
	
	x=$("#imagen_"+campos);
	x.change(function()
				{
				mostrarImagen(this);
				}
			 );
}


 
 function quitarCampo(iddiv)
{
	campos = campos - 1;
	var eliminar = document.getElementById("divarchivo_" + iddiv);
	var contenedor= document.getElementById("contenedor_agregar");
	contenedor.removeChild(eliminar);
	
	var cantidad_imagenes=document.getElementById('cantidad_imagenes');
	cantidad_imagenes.value = campos;
}


function mostrarImagen(input) {
var elemento = input.id.split('_');
numero = elemento[1];
 if (input.files && input.files[0]) {
  var reader = new FileReader();
  reader.onload = function (e) {
   $('#vista_'+numero).attr('src', e.target.result);
  }
  reader.readAsDataURL(input.files[0]);
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