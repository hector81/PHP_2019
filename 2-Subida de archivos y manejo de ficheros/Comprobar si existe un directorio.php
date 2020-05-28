<!DOCTYPE html>
<html lang="es">
 
<head>
	<title>Estructura básica de HTML5</title>
	<meta charset="utf-8" />
</head>
 
<body>
	<h1>Comprbar si existe directorio</h1>

		<?php
			 if (file_exists('C:/xampp/htdocs/prueba/documentos1')) {
		?>
		Existe el directorio documentos.
		<?php
			 } else {
		?>
		No existe el directorio documentos.
		<?php
			 }
		?>
		
		
</body>
</html>