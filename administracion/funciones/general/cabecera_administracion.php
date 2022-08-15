<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<link rel="StyleSheet" href="css/estilo.css" type="text/css">
<title><?php echo $titulo;?></title>
<script type="text/javascript" src="<?php echo $raiz;?>funciones/general/jquery/jquery-2.1.4.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="<?php echo $raiz;?>funciones/general/tinymce/jquery.tinymce.min.js"></script>
<script type="text/javascript" src="<?php echo $raiz;?>funciones/general/tinymce/tinymce.min.js"></script>
<script type="text/javascript">
	tinymce.init({selector:"textarea",language:"es",theme:"modern",plugins:["advlist autolink lists link image charmap print preview hr anchor pagebreak","searchreplace wordcount visualblocks visualchars code fullscreen","insertdatetime media nonbreaking save table contextmenu directionality","emoticons template paste textcolor colorpicker textpattern imagetools"],toolbar1:"insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",toolbar2:"print preview media | forecolor backcolor emoticons",image_advtab:!0,templates:[{title:"Test template 1",content:"Test 1"},{title:"Test template 2",content:"Test 2"}],content_css:["//www.tinymce.com/css/codepen.min.css"]});
</script>
<script language="javascript" src="funciones/general/func_general.js"></script>
<script language="javascript" src="funciones/general/touch-punch/jquery.ui.touch-punch.min.js"></script>
<link rel="icon" type="image/png" href="<?php echo $raiz;?>administracion/interfaz/favicon.png" />
