<!DOCTYPE html>
<html lang="es">
 
<head>
	<title>Estructura básica de HTML5</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="Ejercicio1.css">
</head>
 
<body>
	<h1>Envio archivos</h1>

		
		<form method="post" action="Enviar y guardar en ruta preestablecida.php" enctype="multipart/form-data">
			<input type="hidden" name="moverEnvio" value="envio"><br>
			<input type="file" name="archivo"><br>
			<button type="submit">Enviar</button>
		</form>
		<?php
			//Le decimos que mueva de la ruta temporal a una ruta preestablecida por nosotros
			if($_POST['moverEnvio'] == 'envio'){
				move_uploaded_file($_FILES['archivo']['tmp_name'],'imagen.pdf');
			}
		?>
</body>
</html>