<?php
	//Si el usuario nos envía 0 en el parámetro "divisor" se producirá un error y el manejador de errores lo capturará 
	$mensaje = 'correcto';
     function manejador_errores($codigo,$mensaje,$archivo,$linea) {
          global $mensaje;
          $mensaje = 'El resultado es infinito';
     }
	 //esto establece un manejador de errores
     set_error_handler('manejador_errores');
     //$resultado = 48758 / ((int)$_GET['divisor']);
	 $resultado = 48758 / 0;
	 //todo lo que escribamos aqui debajo tendra su notificacion
     restore_error_handler();
     if ($mensaje == '') {
          echo "El resultado es $resultado";
     }
     echo $mensaje;
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Ejercicio 1</title>
		<link href="estilos.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="main">
			<header>
				<h1>Ejercicio</h1>
			</header>
			<div id="contenido">
				
			</div>
		</div>
	</body>
</html>