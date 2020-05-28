<?php
	if($_SERVER['REQUEST_METHOD']=='POST'){
		switch($_POST['acc']){ 
			case 'subir':	
				//este switch es para imagenes jpeg
				switch($_FILES['imagen']['type']){
					case 'image/jpeg':
						//print_r($_FILES);
						if (file_exists('archivos/')) {
							move_uploaded_file($_FILES['imagen']['tmp_name'],'archivos/' . $_FILES['imagen']['name']);
						}else{
							echo 'No existe la carpeta donde deseas introducir la imagen';
						}
						
					break;
				}
			
				//este switch es para imagenes png
				switch($_FILES['imagen']['type']){
					case 'image/png':
						//print_r($_FILES);
						if (file_exists('archivos/')) {
						move_uploaded_file($_FILES['imagen']['tmp_name'],'archivos/' . $_FILES['imagen']['name']);
						}else{
							echo 'No existe la carpeta donde deseas introducir la imagen';
						}
						
					break;
				}
			break;
			case 'eliminar':
				//comprobamos que la imagen exista en el directorio que le indicamos
				if (file_exists('archivos/' . $_POST['nombre'])) {
					unlink('archivos/' . $_POST['nombre']);//borramos
				}
			break;
		}
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
				<table>
				<?php
					$directorio = opendir('archivos'); //abre el directorio
					while ($elemento = readdir($directorio )) { //mientras haya archivos que leer en el directorio
						if (($elemento != '.') && ($elemento != '..')) {   //para comprobar que no es el directorio actual y el directorio superior

				?>
				<tr>
					<td>
						<img src="archivos/<?php echo $elemento;?>"> <!-- elemento corresponderá a cada archivo que encuentre en el directorio, en este caso imagenes -->
					</td>
					<td class="acc">
						<form method="post" action="index.php">
							<input type="hidden" name="acc" value="eliminar">
							<input type="hidden" name="nombre" value="<?php echo $elemento;?>">
							<button type="submit">Eliminar</button>
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
							<button type="submit">Añadir</button>
						</form>
					</td>
				</tr>
				</table>
			</div>
		</div>
	</body>
</html>