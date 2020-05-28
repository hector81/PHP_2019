<!DOCTYPE html>
<html lang="es">
 
<head>
	<title>Estructura básica de HTML5</title>
	<meta charset="utf-8" />
</head>
 
<body>
	<h1>Comprbar archivo</h1>
	<?php
		if (file_exists('C:/xampp/htdocs/prueba/maet.jpg')) {
	?>
		<img src="maet.jpg" alt="Foto">
	<?php
		 } else {
	?>
		No existe la foto
	<?php
		 }
	?>
		
		
</body>
</html>