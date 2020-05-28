<?php

	switch ($_POST['acc']) {
	case 'subir':
		switch ($_FILES['imagen']['type']) {
		case 'image/jpeg':
			move_uploaded_file($_FILES['imagen']['tmp_name'],'archivos/' . $_FILES['imagen']['name']);
			break;
		}
		break;
	case 'eliminar':
		if (file_exists('archivos/' . $_POST['nombre'])) {
			unlink('archivos/' . $_POST['nombre']);
		}
		break;
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
				<h1>Ejercicio</h1>
			</header>
			<div id="contenido">
				<table>
<?php
	$directorio = opendir('archivos');
	while ($elemento = readdir($directorio)) {
		if (($elemento != '.') && ($elemento != '..')) {
?>
				<tr>
					<td>
						<img src="archivos/<?php echo $elemento; ?>">
					</td>
					<td class="acc">
						<form method="post" action="index.php">
						<input type="hidden" name="acc" value="eliminar">
						<input type="hidden" name="nombre" value="<?php echo $elemento; ?>">
						<button>Eliminar</button>
						</form>
					</td>
				</tr>
<?php
		}
	}
?>
				<tr>
					<td>
						<input type="file" name="imagen" form="subir">
					</td>
					<td class="acc">
						<form method="post" id="subir" action="index.php" enctype="multipart/form-data">
						<input type="hidden" name="acc" value="subir">
						<button>Añadir</button>
						</form>
					</td>
				</tr>
				</table>
			</div>
		</div>
	</body>
</html>