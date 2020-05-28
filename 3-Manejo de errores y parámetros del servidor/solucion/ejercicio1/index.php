<!DOCTYPE html>
<html>
	<head>
		<title>Ejercicio</title>
		<link href="estilos.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="main">
			<header>
				<h1>Ejercicio 1</h1>
			</header>
			<div id="contenido">
				<form method="post" action="index.php">
				<input type="hidden" name="acc" value="archivo">
				<input type="text" value="https://www.google.com/robots.txt" name="direccion">
				<button>Ver contenido de la URL</button>
				</form>
<?php
	if ($_POST['acc'] == 'archivo') {
		set_error_handler('manejador_errores');
		echo nl2br(htmlentities(file_get_contents($_POST['direccion'])));
	}
?>
			</div>
		</div>
	</body>
</html>
<?php

	function manejador_errores($codigo,$mensaje,$archivo,$linea) {
		echo 'No existe el archivo';
	}

?>