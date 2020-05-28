<!DOCTYPE html>
<html>
	<head>
		<title>Ejercicio 2</title>
		<link href="estilos.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="main">
			<header>
				<h1>Ejercicio 2</h1>
			</header>
			<div id="contenido">
			<ul>
				<?php
					listar_directorio('archivos');			
				?>
			</ul>
			</div>
		</div>
	</body>
</html>

<?php
	function listar_directorio($directorio){
		$direct = opendir($directorio);//abrimos el directorio o carpeta
		while($elementos = readdir($direct)){//leemos los elementos del directorio o carpeta
			if(is_dir($directorio . '/' . $elementos)){//si es un archivo
				if (($elementos != '.') && ($elementos != '..')) {
					echo '<li>'.$elementos.'<ul>';
					listar_directorio($directorio . '/' . $elementos);//cada vez que sea un directorio llamará recursivamente a la funciom			
					echo '</ul>';
				}
			}else{//en caso de que sea un archivo
				echo '<li class="file">'.$elementos.'</li>';			
			}
		}
	}
?>