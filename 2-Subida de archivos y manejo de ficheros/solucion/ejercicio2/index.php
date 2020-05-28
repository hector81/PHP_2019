<!DOCTYPE html>
<html>
	<head>
		<title>Ejercicio</title>
		<link href="estilos.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="main">
			<header>
				<h1>Ejercicio</h1>
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

	function listar_directorio($directorio) {
		$direct = opendir($directorio);
		while ($elementos = readdir($direct)) {
			if (is_dir($directorio . '/' . $elementos)) {
				if (($elementos != '.') && ($elementos != '..')) {
?>
				<li>
				<?php echo $elementos; ?>
				<ul>
<?php
					listar_directorio($directorio . '/' . $elementos);
?>
				</ul>
				</li>
<?php
				}
			} else {
?>
				<li class="file">
				<?php echo $elementos; ?>
				</li>
<?php
			}
		}
	}

?>