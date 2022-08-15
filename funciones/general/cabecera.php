<?php

	$query = "SELECT * FROM `archivo` WHERE `categoria` LIKE 'favicon' ORDER BY `id_archivo` DESC";
	$resultado = $mysqli->query($query);
	$favicon = $resultado->fetch_array(MYSQLI_ASSOC);

	$url_favicon = $raiz.$favicon['carpeta'].$favicon['archivo'];
	function cabecera()
	{
		global $titulo;
		global $descripcion;
		global $raiz;
		global $url_favicon;
		
		$descripcion = substr(strip_tags($descripcion), 0, 150);
?>
	<meta http-equiv="content-type" content="text/html; charset=utf-8">
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />		
	<!-- <meta property="fb:app_id" content="1378147538895050" /> -->
	<title><?php echo $titulo;?></title>
	<meta name="description" content="<?php echo $descripcion?>">
	<link href="<?php echo $raiz;?>css/estilo.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="icon" type="image/png" href="<?php echo $url_favicon;?>" />
	<script src="<?php echo $raiz?>funciones\general\jquery\jquery-2.1.4.min.js"></script>
	<input type='hidden' id='raiz_js' name='raiz_js' value="<?php echo $raiz?>"><script>raiz_js=$('#raiz_js').val();</script>
	<script type="text/javascript" src="<?php echo $raiz?>funciones/general/general.js"></script>

	<!-- GALERIAS SLICK -->
	<link href="<?php echo $raiz;?>css/slick.css" rel="stylesheet" type="text/css" media="all" />
	<link href="<?php echo $raiz;?>css/slick-theme.css" rel="stylesheet" type="text/css" media="all" />
	<script type="text/javascript" src="<?php echo $raiz;?>funciones/general/slick/slick/slick.min.js"></script>

	<!-- Animaciones -->
	<link href="<?php echo $raiz;?>css/animate.css" rel="stylesheet" type="text/css" media="all" />

<!--<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-96525480-1', 'auto');
  ga('send', 'pageview');

</script> -->

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.8";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1378147538895050',
      xfbml      : true,
      version    : 'v2.8'
    });
    FB.AppEvents.logPageView();
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>

<!-- End Google Tag Manager -->
<?php	
	}
?>