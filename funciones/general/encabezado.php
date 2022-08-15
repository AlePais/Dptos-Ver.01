<?php
    $query = "SELECT * FROM `usuario` WHERE 1";
	$resultado = $mysqli->query($query);
	$datos = $resultado->fetch_array(MYSQLI_ASSOC);

	$query = "SELECT * FROM `archivo` WHERE `categoria` LIKE 'logo' ORDER BY `id_archivo` DESC";
	$resultado = $mysqli->query($query);
	$logo = $resultado->fetch_array(MYSQLI_ASSOC);
	$url_logo = $raiz.$logo['carpeta'].$logo['archivo'];

	$visibilidad_login='';
	$visibilidad_datos_usuario='display:none';	
	$sub_menu ="sub_menu_ingreso";
	if(isset($_SESSION['id_agenda']))
	{
		$id_agenda=$_SESSION['id_agenda'];
		$id_depto=$_SESSION['id_depto'];
		$visibilidad_login='display:none';
		$visibilidad_datos_usuario='';
		$sub_menu ="sub_menu_ingreso_datos";//Cambio valor de variable,funcion java en menu. 
		$query = "SELECT * FROM `agenda` WHERE `id_agenda`='$id_agenda'";
		$resultado = $mysqli->query($query);
		$datos_usuario	= $resultado->fetch_array(MYSQLI_ASSOC);

		$query = "SELECT * FROM `general` WHERE `identificador_tabla` LIKE 'n3_id' AND `id_elemento` = '$id_depto'";
		$resultado = $mysqli->query($query);
		while($otros_datos = $resultado->fetch_array(MYSQLI_ASSOC))
		{
			$nombre_campo = $otros_datos['nombre'];
			$extras[$nombre_campo] = $otros_datos['contenido'];
		}
	}
?>
<!-- Google Tag Manager (noscript)
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MLH3F2" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div id="encabezado">  <!-- style="background-image:url(...); --> 
	<!-- <img class="absolute" style="z-index:50;" src="<?php echo $raiz?>interfaz/diseno/fondo-encabezado.png"> -->
	<center>
		<div style="z-index:0;" class="absolute columna_1  encabezado_d">
			<div class="ancho_fijo">
				<!-- Menu vertical desplegable en encabezado-->
				<div id="redes_sociales_right">  <!-- Redes sociales Iconos en Menu -->
					<li> <?php echo $datos['email']; ?> </li>
					<li> <?php echo $datos['telefono']; ?> </li>
					<?php
						foreach($redes_sociales as $nombre_red=>$datos)
						{
							$icono_red = $raiz."interfaz/iconos/".$datos['icono'];
							$corregido = $datos['corregido'];
							
							$query="SELECT * FROM `general` WHERE `tipo` = 'redes_sociales' AND `identificador_tabla` = 'id' AND `id_elemento` = '1' AND `nombre` LIKE '$corregido'";
							$resultado = $mysqli->query($query);
							if($resultado->num_rows>0)
							{
								$datos_extra = $resultado-> fetch_array(MYSQLI_ASSOC);
								if($datos_extra['contenido']!='')
								{
					?>
					<a href="http://<?php echo $datos_extra['contenido'];?>">
						<img src="<?php echo $icono_red?>" alt="<?php echo $nombre_red;?>"></img>
					</a>
					<?php
								}
							}
						}
					?>
				</div>
			</div> <!-- Cierre Menu desplegable -->
		</div>
		<div class="ancho_fijo">
			<div class="encabezado">
				<a href="<?php echo $raiz?>index">
					<img src="<?php echo $url_logo?>" alt="Departamentos en alquiler" title="<?php echo $titulo?>" ></img>
				</a>
				<a class="right boton_ingreso" onclick="<?php echo $sub_menu;?>.style.right='10%';"  alt="RESERVA ONLINE DE DEPARTAMENTOS EN ALQUILER TEMPORARIO"> 	<img onclick="<?php echo $sub_menu;?>.style.right='10%';" src="<?php echo $raiz; ?>interfaz/iconos/ingreso.png">
				</a>
				<a class="right naranja2" href="<?php echo $raiz?>contacto" alt="RESERVA ONLINE DE DEPARTAMENTOS EN ALQUILER TEMPORARIO">CONSULTAS</a>
				<a class="right" href="<?php echo $raiz?>acerca.php"  alt="Historia donde compra repuestos semiacoplado">ACERCA</a>
				<a class="right" style="cursor:hand;" onclick="sub_menu.style.right='10%';" alt="Departamentos en alquiler temporario">Ver departamentos en alquiler temporario</a>
				<a class="right boton_1" href="<?php echo $raiz;?>blog/">BLOG</a>
			</div>
		</div>
		<!--Menu de Busquedas -->
	</center>		
</div>
<div id="menu_movil">	
	<a href="<?php echo $raiz?>index"> <img src="<?php echo $raiz?>interfaz/logo.png"  style="float:left;" id="logo" alt="<?php echo $titulo?>" title="<?php echo $titulo?>" ></img> </a>
	<div>
		<img  onclick="sub_menu.style.right='10%';" src="<?php echo $raiz?>interfaz/iconos/icono-menu-movil_negro.png"></img>
	</div>
	<div><a class="right boton_ingreso" onclick="<?php echo $sub_menu;?>.style.right='10%';"  alt="RESERVA ONLINE DE DEPARTAMENTOS EN ALQUILER TEMPORARIO"> 	<img onclick="<?php echo $sub_menu;?>.style.right='10%';" src="<?php echo $raiz; ?>interfaz/iconos/ingreso.png">
	</a></div>
</div>	
<span id="sub_menu" >
	<center>
		<span class="transparente_azul" ><a class="right_a  padding_10 margin_10" href="<?php echo $raiz?>acerca.php"> <img src="<?php echo $raiz;?>interfaz/iconos/ie_nosotros.png"></a></span> 
		<span class="naranja ver_movil"><a class="right_a  padding_10 margin_10 " href="<?php echo $raiz?>contacto.php"> <img src="<?php echo $raiz;?>interfaz/iconos/s_correo.png"> </a> </span>
		<span class="rojo"><a class="right_a  padding_10 margin_10" onclick="sub_menu.style.right='-100%';"> <img src="<?php echo $raiz;?>interfaz/iconos/ie_cerrar.png"> </a> </span>
	</center>
	<?php
		$query_n1 = "SELECT * FROM `nivel_1` WHERE `n1_tipo` LIKE 'departamento_nivel_1' ORDER BY `n1_orden` ASC";
		$resultado_n1 = $mysqli->query($query_n1);
		$i=2;
		while($contenido_n1 = $resultado_n1->fetch_array(MYSQLI_ASSOC))
		{
			$n1_id = $contenido_n1['n1_id'];
			$n1_nombre = $contenido_n1['n1_nombre'];
			$n1_corregido_lista = $contenido_n1['n1_corregido'];
			$sub_menu =  "sub_menu".$i;
			$onclick = $sub_menu.".style.display='block'"; 
	?>
	<li>
		<a class=" padding_10 margin_10" href="<?php echo $raiz.$n1_corregido_lista."/";?>"><?php echo $n1_nombre?></a>  
		<span onclick="<?php echo $onclick;?>">
			<img  onclick="<?php echo $onclick;?>" src="<?php echo $raiz;?>interfaz/iconos/flecha_derecha.png "></img>
		</span>
	</li>
	<div id="<?php echo $sub_menu;?>">
	
		
		<?php
			$query_n2 = "SELECT * FROM `nivel_2` WHERE `n1_id` = '$n1_id' AND `n2_tipo` LIKE 'departamento_nivel_2' ORDER BY `n2_orden` ASC";
			$resultado_n2 = $mysqli->query($query_n2);
			while($contenido_n2 = $resultado_n2->fetch_array(MYSQLI_ASSOC))
			{
				$n2_id = $contenido_n2['n2_id'];
				$n2_nombre = $contenido_n2['n2_nombre'];
				$n2_corregido = $contenido_n2['n2_corregido'];
		?>
		<li><a class="right_a  padding_10 margin_10" href="<?php echo $raiz.$n1_corregido_lista."/".$n2_corregido?>"><?php echo $n2_nombre?></a></li>
		<?php
			}
		?>
		
		<div class="seccion_autoc"></div>
	</div>
	<?php
			$i++;
		}
	?>
	<li class="boton_1" style="background:rgb(254,79,183);" ><a class="right_a  padding_10 margin_10 " href="<?php echo $raiz;?>blog/">BLOG</a></li>
	<div class="seccion_autoc_menu"></div>
</span>	


<span id="sub_menu_ingreso" style="<?php echo $visibilidad_login?>">
	<center>
		<a class="right_a padding_10 margin_10" onclick="sub_menu_ingreso.style.right='-100%';">
			<img src="<?php echo $raiz;?>interfaz/iconos/cerrar1.png">
		</a>
	</center>
	<h1>BIENVENIDO</h1>
	<p>Ingrese para acceder a descuentos y una guia de actividades pensadas para usted </p>
	<form action="<?php echo $raiz?>funciones/usuario/login.php" method="POST">
		<input type="hidden" id='url_actual' name='url_actual'value="<?php echo $url_actual?>"></input>
		<p><input type="text" id="email" name="email" placeholder="ingrese su email"></input>
		<p class="oculto"><input type="radio" name="tipo" value="huesped" checked>  <label for="contactChoice1">Huesped</label>
		<!--<p><input type="radio" name="tipo" Value="empresa"><label for="contactChoice1">Empresa</label>-->
		<p><input TYPE="submit" VALUE="INGRESAR">
	</form>
</span>
<div id="sub_menu_ingreso_datos" style="<?php echo $visibilidad_datos_usuario?>">
	<a class="right_a padding_10 margin_10" onclick="sub_menu_ingreso_datos.style.right='-100%';">
		<img src="<?php echo $raiz;?>interfaz/iconos/cerrar1.png">
	</a>
	<h1><?php echo $datos_usuario['nombre']?></h1>
	<h2>GRACIAS POR ELEGIRNOS</h2>
	<div style="background-image:url(<?php echo $raiz.$_SESSION['imagen_usuario'];?>);"> </div>
	
	<span class="seccion_autoc"></span>
	<br>
	<span >
	<?php
		if(isset($extras['direccion_casa']))
		{
	?>
		<p><img src="<?php echo $raiz;?>interfaz/iconos/ie_direccion3.png"><b>Direccion Departamento</b><br><?php echo $extras['direccion_casa'];?></p>
	<?php	
		}
		if(isset($extras['direccion_hospital']))
		{
	?>
		<p><img src="<?php echo $raiz;?>interfaz/iconos/ie_hospital.png"><b>Direccion Hospital:</b><br><?php echo $extras['direccion_hospital'];?></p>
	<?php	
		}
		if(isset($extras['direccion_policia']))
		{
	?>
		<p><img src="<?php echo $raiz;?>interfaz/iconos/ie_policia.png"><b>Direccion Policia:</b><br><?php echo $extras['direccion_policia'];?></p>
	<?php	
		}
		if(isset($extras['clave_wifi']))
		{
	?>	
		<p><img src="<?php echo $raiz;?>interfaz/iconos/ie_wifi.png"><b>CLAVE WI-FI:</b><br><?php echo $extras['clave_wifi'];?></p>
	<?php
		}
	?>
	</span>
	<form action="<?php echo $raiz?>funciones/usuario/cerrar_sesion.php" method="POST">
		<span> <input type="hidden" id='url_actual' name='url_actual'value="<?php echo $url_actual?>"></input>
		<input TYPE="submit" VALUE="Cerrar Sesion">
		<a CLASS="boton-descuentos" href="<?php echo $raiz?>descuentos.php">DESCUENTOS</a></span>
	</form>
</div>
	