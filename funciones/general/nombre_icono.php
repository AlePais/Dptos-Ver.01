<?php
	function src_icono($variable)
	{
		switch($variable)
		{
			case 'pdf':
				$icono = 'pdf.png';
				break;
			case 'doc':
				$icono = 'word.png';
				break;
			case 'docx':
				$icono = 'word.png';
				break;
			case 'xls':
				$icono = 'excel.png';
				break;
			case 'xlsx':
				$icono = 'excel.png';
				break;
			case 'ppt':
				$icono = 'powerpoint.png';
				break;
			case 'pptx':
				$icono = 'powerpoint.png';
				break;
			case 'png' || 'jpg' || 'gif':
				$icono = 'imagen.png';
				break;
			default:
				$icono= 'archivo.png';
				break;
		}
		return $icono;
	}
?>