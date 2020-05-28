<!DOCTYPE html>
<html lang="es">
 
<head>
	<title>Estructura básica de HTML5</title>
	<meta charset="utf-8" />
</head>
 
<body>
	<h1>Leer un archivo</h1>
	<?php
		//$contenido = file_get_contents(ruta);
		echo file_get_contents('texto.txt');
		
		
		//Con esta misma función podemos leer archivos que no se encuentren en nuestro propio servidor.

		//Por ejemplo podríamos ejecutar la siguiente línea de código y obtener un archivo alojado en el servidor de Google:

		//$contenido = file_get_contents('https://www.google.es/robots.txt');

		//Para poder recuperar archivos que se encuentren en otros servidores, es necesario que especificar la directiva allow_url_fopen a On en nuestro php.ini
		$contenido = file_get_contents('https://www.google.es/robots.txt');
		echo '<br>'.$contenido;
	?>
		
		
</body>
</html>