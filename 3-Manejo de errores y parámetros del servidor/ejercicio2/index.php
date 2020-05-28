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
				<pre>
					<?php
						try{
							$idiomas =  explode(',',$_SERVER['HTTP_ACCEPT_LANGUAGE']);
							$i = 0;
							$resultado = '';
							//recorremos los idiomas por posicion del array
							while(($i < count($idiomas)) && ($resultado == '')){
								//si la cadena o string de idiomas es ES
								if(strpos($idiomas[$i],'es') !== false){
									$resultado = 'ES';
								}
								//si la cadena o string de idiomas es EN
								elseif(strpos($idiomas[$i],'en') !== false){
									$resultado = 'EN';
								}
								//si la cadena o string de idiomas es FR
								elseif(strpos($idiomas[$i],'fr') !== false){
									$resultado = "FR";
								}
								$i++;
							}
							//si no encuentra ningún idioma, por defecto el idioma sera ingles
							if($resultado == ''){
								$resultado = 'EN';
							}
							switch($resultado){
								case 'ES':
									echo 'HOLA, EL IDIOMA DE LA URL ES ESPAÑOL';
									break;
								case 'EN':
									echo 'HELLO, THE LANGUAGE OF THE URL IS ENGLISH';
									break;
								case 'FR':
									echo "BONJOUR, LA LANGUE DE L'URL EST FRANCAISE";
									break;
							}
						}catch(Throwable $t){
							echo "No encuentra el idioma de la URL";
							echo '<br>';
							echo $t->getMessage();
							echo '<br>';
							echo $t->getFile();
							echo '<br>';
							echo $t->getLine();
							echo '<br>';
						}
					?>
				</pre>
			</div>
		</div>
	</body>
</html>