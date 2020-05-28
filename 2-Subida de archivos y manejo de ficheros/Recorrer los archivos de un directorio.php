<!DOCTYPE html>
<html lang="es">
 
<head>
	<title>Estructura básica de HTML5</title>
	<meta charset="utf-8" />
</head>
 
<body>
	<h1>Recorrer los archivos de un directorio</h1>

		<?php
			 $directorio = opendir('ejemplo');
			 while ($entrada = readdir($directorio )) {
				  if (($entrada != '.') && ($entrada != '..')) {   //para comprobar que no es el directorio actual y el directorio superior
					   if (is_dir('ejemplo/' . $entrada)) {
							echo "Directorio: $entrada<br>";
					   } else {
							echo "Archivo: $entrada<br>";
					   }
				  }
			 }
		
		//is_dir(ruta)	Devuelve true si la ruta indicada pertenece a un directorio.
		//is_file(ruta)	Devuelve true si la ruta indicada pertenece a un archivo.
		?>
</body>
</html>