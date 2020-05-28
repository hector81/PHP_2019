<?php
	include('funciones.php');
	switch ($_POST['accion']) {
	case 'login':
		$_SESSION['ps']['user'] = $_POST['user'];//este sería el usuario que enviariamos al proveedor de servicios desde el proveedor de identidad
		$_SESSION['ps']['pass'] = sha1($_POST['pass']);//este sería la contraseña que enviariamos al proveedor de servicios desde el proveedor de identidad
		break;
	case 'logout':
		unset($_SESSION['ps']['user']);
		unset($_SESSION['ps']['pass']);
		break;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Proveedor de identidad</title>
		<link href="estilos.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="main">
			<header>
				<h1>Proveedor de identidad</h1>
			</header>
			<div id="contenido">
						
<?php
	if (login_correcto()) {
		$ts = time();//creamos un timestamp para luego crear un plazo de caducidad
		//esta firma se crea a traves de un algoritmo en un solo sentido
		$firma = sha1($_SESSION['ps']['user'] . $ts . clave_privada);//user + clave privada. La clave privada solo pueden conocerla el proveedor de identidad y el de servicio que se han puesto de acuerdo. Tambien añadimos el timestamp a nuestra firma
?>
<!-- Aqui está el area privada -->
Estás registrado correctamente<br><br>

<!-- Aqui ponemos nuestro end point con el enlace con la firma ya puesta ya que esta ha sido puesta en el archivo de funciones. También tiene el plazo de caducidad -->
<a href="http://localhost:8080/prueba/ejercicio/proveedorservicio/sso.php?email=<?php echo htmlentities($_SESSION['ps']['user']); ?>&ts=<?php echo $ts; ?>&firma=<?php echo $firma; ?>" title="Acceder al servicio o endpoint de servicios">Acceder al servicio o endpoint de servicios</a>

<form method="post" action="index.php">
<input type="hidden" name="accion" value="logout">
<button type="submit">Salir</button>
</form>
<?php
	} else {
?>
<!-- Aqui empieza el formulario -->
<form method="post" action="index.php">
<?php
		if ($_POST['accion'] == 'login') {
?>
Usuario y/o/ contraseña incorrectos<br><br>
<?php
		}
?>
				<input type="hidden" name="accion" value="login">
				Usuario<br>
				<input type="text" name="user"><br>
				Contraseña<br>
				<input type="password" name="pass"><br>
				<button type="submit">Entrar</button>
				</form>
<?php
	}
?>
			</div>
		</div>
	</body>
</html>