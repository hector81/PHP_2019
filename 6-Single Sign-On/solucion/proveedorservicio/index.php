<?php
	include('funciones.php');
	switch ($_POST['accion']) {
	case 'login':
		$_SESSION['pi']['user'] = $_POST['user'];
		$_SESSION['pi']['pass'] = sha1($_POST['pass']);
		break;
	case 'logout':
		unset($_SESSION['pi']['user']);
		unset($_SESSION['pi']['pass']);
		break;
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Proveedor de servicio</title>
		<link href="estilos.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="main">
			<header>
				<h1>Proveedor de servicio</h1>
			</header>
			<div id="contenido">
<?php
	if (login_correcto()) {
?>
Estás registrado correctamente<br><br>
<form method="post" action="index.php">
<input type="hidden" name="accion" value="logout">
<button type="submit">Salir</button>
</form>
<?php
	} else {
?>
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
				</form><br>
				<form method="get" action="http://localhost/proveedoridentidad/login.php">
				<button type="submit">Entrar con PI</button>
				</form>
<?php
	}
?>
			</div>
		</div>
	</body>
</html>