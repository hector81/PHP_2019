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
				Tu dirección IP es <?php echo $_SERVER['REMOTE_ADDR']; ?>
				<br>
				Tu Nombre del servidor <?php echo $_SERVER['HTTP_HOST']; ?>
				<br>
				Tu navegador del usuario <?php echo $_SERVER['HTTP_USER_AGENT']; ?>
				<br>
				Tu Página desde la cual se ha llamado a la URL actual al pulsar un enlace. <?php echo $_SERVER['HTTP_REFERER']; ?>
				<br>
				Idiomas configurados en el navegador del usuario  <?php echo $_SERVER['HTTP_ACCEPT_LANGUAGE']; ?>
				<br>
				Software utilizado para servir las páginas.  <?php echo $_SERVER['SERVER_SOFTWARE']; ?>
				<br>
				Nombre del servidor.  <?php echo $_SERVER['SERVER_NAME']; ?>
				<br>
				Dirección IP del servidor.  <?php echo $_SERVER['SERVER_ADDR']; ?>
				<br>
				Puerto por el cual se sirven las páginas desde el servidor.  <?php echo $_SERVER['SERVER_PORT']; ?>
				<br>
				Dirección IP del usuario.  <?php echo $_SERVER['REMOTE_ADDR']; ?>
				<br>
				Dirección absoluta de la carpeta pública del servidor.  <?php echo $_SERVER['DOCUMENT_ROOT']; ?>
				<br>
				Dirección absoluta del script que se está ejecutando.  <?php echo $_SERVER['SCRIPT_FILENAME']; ?>
				<br>
				Versión del protocolo HTTP  <?php echo $_SERVER['SERVER_PROTOCOL']; ?>
				<br>
				URL relativa a la que se está llamando.  <?php echo $_SERVER['REQUEST_URI']; ?>
				<br>
				Dirección relativa del script que se está ejecutando.  <?php echo $_SERVER['PHP_SELF']; ?>
				<br>
				Timestamp de la solicitud.  <?php echo $_SERVER['REQUEST_TIME']; ?>
				<br>
			</div>
			<pre>
				<?php print_r($_SERVER); ?>
			<pre>
		</div>
	</body>
</html>