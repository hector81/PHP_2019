<?php
	function manejador_errores($codigo,$mensaje,$archivo,$linea){
		global $advertenciaError;
        echo $advertenciaError = 'La URL introducida no existe';
	}
?>

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
				<input type="text" value="https://www.google.com/robots.txt" name="direccion">
				<button>Ver contenido de la URL</button><br>
				</form>
				<pre>
					<?php
						//esto establece un manejador de errores
						set_error_handler('manejador_errores');
						if($_SERVER['REQUEST_METHOD']=='POST'){
							if(!empty($_POST['direccion'])){
								echo nl2br(htmlentities(file_get_contents($_POST['direccion']))) ;
							}else{
								echo 'No se ha enviado ninguna dirección';
							}
						}
						//https://www.google.com/robots.txt
						//todo lo que escribamos aqui debajo tendra su notificacion
						restore_error_handler();
						
					?>
				</pre>
		</div>
			
			
		</div>
	</body>
</html>