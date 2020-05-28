<?php
	//para eliminar o insertar
	switch($_POST['acc']){
		case 'insertar':
			file_get_contents('http://localhost:8080/prueba/productos.php?accion=insercion&valor=' . urlencode($_POST['nombre']));
		break;
		case 'eliminar':
			file_get_contents('http://localhost:8080/prueba/productos.php?accion=eliminacion&valor=' . (int)$_POST['id']);
		break;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Llamada a web service</title>
		<link href="estilos.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="main">
			<header>
				<h1>Llamada a web service</h1>
			</header>
			<div id="contenido">
				<h2>Productos</h2>
<?php
	//file_get_contents llama a una url y devuelve el contenido de esa url
	$datos = file_get_contents('http://localhost:8080/prueba/productos.php?accion=consulta');
	//los voy a formatear y los separo con saltos de linea
	$datos_f = explode("\n",$datos);
	//los voy a separar por columnas mediante un bucle
	$contador=0;
	for($i = 0;$i < count($datos_f);$i++){
		if($datos_f[$i] != ''){//si es distinto de cadena vacio. por si hay vacios
			$linea = explode(',',$datos_f[$i]);//formateo las lineas
			$productos[$contador]['id'] = $linea[0];//1-linea
			$productos[$contador]['nombre'] = $linea[1];//2-linea
			$contador++;
		}
	}
	//ya tenemos un array con los productos. hacemos un bucle con los productos y html
	for($i = 0;$i < count($productos);$i++){
		
?>
		<div class="prod_nombre">
		<?php echo htmlentities($productos[$i]['nombre']); ?>
		</div>
		<div class="prod_eliminar">
			<form method="post" action="index.php">
				<input type="hidden" name="acc" value="eliminar">
				<input type="hidden" name="id" value="<?php echo htmlentities($productos[$i]['id']); ?>">
				<button type="submit">Eliminar</button>
			</form>
		</div>
<?php
		
	}
?>

				<h2>Añadir producto</h2>
				<form method="post" action="index.php">
					<input type="hidden" name="acc" value="insertar">
					<input type="text" name="nombre">
					<button type="submit">Añadir</button>
				</form>
			</div>
		</div>
	</body>
</html>