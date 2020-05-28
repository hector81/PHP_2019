<!DOCTYPE html>
<html lang="es">
 
<head>
	<title>Estructura básica de HTML5</title>
	<meta charset="utf-8" />
</head>
 
<body>
	<h1>Permisos</h1>
	<?php
		//Con esta instrucción, hemos asignado todos los permisos al archivo documento.pdf
		
		chmod('manual.pdf',0777);
	?>
		
		
</body>
</html>