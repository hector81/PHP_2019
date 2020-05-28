<!DOCTYPE html>
<html>
	<head>
		<title>Ejercicio</title>
		<link href="estilos.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="main">
			<header>
				<h1>Ejercicio 2</h1>
			</header>
			<div id="contenido">
			<?php
				$idiomas = explode(',',$_SERVER['HTTP_ACCEPT_LANGUAGE']);
				$i = 0;
				$resultado = '';
				while (($i < count($idiomas)) && ($resultado == '')) {
					if (strpos($idiomas[$i],'es') !== false) {
						$resultado = 'ES';
					} elseif (strpos($idiomas[$i],'en') !== false) {
						$resultado = 'EN';
					} elseif (strpos($idiomas[$i],'fr') !== false) {
						$resultado = 'FR';
					}
					$i++;
				}
				if ($resultado == '') {
					$resultado = 'EN';
				}
				switch ($resultado) {
				case 'ES':
					echo 'Hola';
					break;
				case 'EN':
					echo 'Hello';
					break;
				case 'FR':
					echo 'Bonjour';
					break;
				}
			?>
			</div>
		</div>
	</body>
</html>