<div id='encabezado'>
	<center>
		<table class="ancho_fijo">
			<tr>
				<td class="encabezado">
					<div>
						<img src='http://mercadoempresa.com/imagenes/logo/logo-ME.png' title="mercado empresa - panel de control" alt="Logo mercadoempresa.com"></img>
					</div>
					<a href='funciones/general/cerrar_sesion.php'>
						<img src="<?php echo $raiz?>administracion/interfaz/iconos/cerrar.png"><span>Cerrar sesion</span>
					</a>
					<a href='mi_web.php'>
						<img src="<?php echo $raiz?>administracion/interfaz/iconos/inicio.png"><span>Inicio</span>
					</a>
					<a href='<?php echo $raiz?>' target="_blank">
						<img src="<?php echo $raiz?>administracion/interfaz/iconos/mi_web.png"><span>Mi web</span>
					</a>
					<a href='correo.php'>
						<img src="<?php echo $raiz?>administracion/interfaz/iconos/correo.png"><span>Ver correo</span>
					</a>
					<a href='http://www.mercadoempresa.com/ingreso.php' target="_blank" >
						<img src="<?php echo $raiz?>administracion/interfaz/iconos/me.png"><span>Iniciar Sesion</span>
					</a>
					<a href='perfil.php'>
						<img src="<?php echo $raiz?>administracion/interfaz/iconos/perfil.png"><span>Mi perfil</span>
					</a>
				</td>
			</tr>
		</table>
	</center>
</div>
<div id="encabezado_vertical">
	<div>
		<li>
		<img src="<?php echo $raiz?>administracion/interfaz/iconos/am_perfil.png">
			<ul>
				<h1>Mi perfil</h1>
				<li><a href="perfil.php">Datos de contacto</a></li>
				<li>Configuracion</li>
			</ul>		
		</li>
		<li>
			<img src="<?php echo $raiz?>administracion/interfaz/iconos/am_correo.png">
			<ul>
				<h1>Correo / Emails</h1>
				<li><a href="contacto_recibido.php">Mensajes Recibidos Contacto</a></li>
				<!--<li><a href="reclamo_recibido.php">Mensajes Reclamos web</a></li>				
				<li><a href="voluntarios.php">Mensajes Voluntarios</a></li>
				<li>Pedidos Web</li>-->
				<li><a href="reserva_recibido.php">NUEVAS RESERVAS</a></li>
				<li><a href="email_autorespuesta.php">Administracion Notificaciones web</a></li>
				<li><a href="categoria_contacto.php">Administracion de asuntos</a>
				<li>Configuracion Correo</li>
					
				<ul>
					<h1>Email Marketing</h1>
					<li><a href="email_programado.php"> Estados de Campañas </a>  </li>
					<li><a href="email_marketing.php"> Programar envio de Emails </a> </li>
					<li><a href="agenda_lista.php"> Listado de Envios </a> </li>
					<li><a href="agenda.php"> Agenda de Contactos </a></li>				
				</ul>	
			</ul>
		</li>
		<li>
			<img src="<?php echo $raiz?>administracion/interfaz/iconos/am_articulos.png">
			<ul>
				<h1>Articulos</h1>
				<p>Administra el contenido de tus paginas
				<b><a href="articulo.php">(ver)</a></b></p>
				
				<li><!-- <a href="articulo.php"> -->Productos</a></li>
				<li><!--<a href="servicios.php"> -->Servicios</a></li>
				<li><!--<a href="blog.php"> -->Blog / Articulos</a></li>
				<li><!--<a href="empleo.php"> -->Empleos / RRHH</a></li>
				<li><!--<a href="trabajo.php"> -->Trabajos Realizados</a></li>
				<li><!--<a href="promocion.php"> -->PROMOCIONES</a></li>
				
				<h1>MODULOS ESPECIALES</h1>
				<li><a href="blog_nivel_1.php">Blog / articulos</a></li> 
				<li><a href="departamento_nivel_1.php">Cargar Departamento</a></li><!-- Cambio solo por prieto fasano
				<li><a href="blog_nivel_1.php">Blog / articulos </a></li> -->
				
			</ul>
		
		</li>
		<li>
		<img src="<?php echo $raiz?>administracion/interfaz/iconos/am_pagina.png">
			<ul>
				<h1>Paginas</h1>
				<p>Administra el contenido de tus paginas
				<b><a href="pagina.php">Ir a todas las paginas</a></b></p>
				
				<h1>Secciones</h1>
				<LI><a href="seccion.php">Secciones</a></LI>
			</ul>
		</li>
		

		<li>
		<img src="<?php echo $raiz?>administracion/interfaz/iconos/am_contacto.png">
		<ul>
				<h1>Agenda</h1>
				<p>Organiza tus clientes</p>
				<li>Agenda clientes</li> <!-- agenda.php por agenda_clientes -->
				<li>Agenda representantes</li>
				<li>Mensajes recibidos</li>
				<li>Usuarios newsletter</li>
				<li><a href="reserva_recibido.php">NUEVAS RESERVAS</a></li>
				<li><a href="agenda_clientes.php"> Agenda de Huspedes </a></li>				
				<li><a href="agenda_representantes.php"> Agenda de Representantes por Deptos </a></li>
			</ul>
		
		</li>
	</div>
	<div>
		<li><img src="<?php echo $raiz?>administracion/interfaz/iconos/am_inicio.png"></li>
		<li><img src="<?php echo $raiz?>administracion/interfaz/iconos/am_ayuda.png"></li>
		<li><img src="<?php echo $raiz?>administracion/interfaz/iconos/am_cerrar.png"></li>
	</div>
</div>
