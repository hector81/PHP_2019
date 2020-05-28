<?php
	try{
		miFuncion();
	}catch(Throwable $t){
		echo $t->getMessage();
		echo '<br>';
		echo $t->getFile();
		echo '<br>';
		echo $t->getLine();
		echo '<br>';
	}
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