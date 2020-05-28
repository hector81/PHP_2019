<!DOCTYPE html>
<html lang="es">
 
<head>
	<title>Estructura básica de HTML5</title>
	<meta charset="utf-8" />
</head>
 
<body>
	<h1>Comprbar archivo</h1>
	<?php
     file_put_contents('texto.txt','Hola mundo');
	 
	 $contenido2 = "<br> hola a todos";
	 $ruta = "texto1.txt";
	 file_put_contents($ruta,$contenido2);
	?>
		
		
</body>
</html>