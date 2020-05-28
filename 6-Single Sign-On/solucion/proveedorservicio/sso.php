<?php

	include('funciones.php');
	
	$firma = sha1($_GET['email'] . $_GET['ts'] . clave_privada);
	if ($firma == $_GET['firma']) {
		$ts = (int)$_GET['ts'];
		if ($ts > time() - (15 * 60)) {
			$consulta = 'SELECT * FROM usuarios WHERE user = \'' . addslashes($_GET['email']) . '\'';
			$resultado = $GLOBALS['conexion'] -> query($consulta);
			if ($resultado -> num_rows > 0) {
				$usuario = $resultado -> fetch_array();
				$_SESSION['pi']['user'] = $usuario['user'];
				$_SESSION['pi']['pass'] = $usuario['pass'];
				header('Location: index.php');
			} else {
				$pass = sha1(rand(1000,9999));
				$consulta  = 'INSERT INTO usuarios (user,pass) VALUES (';
				$consulta .= '\'' . addslashes($_GET['email']) . '\',';
				$consulta .= '\'' . $pass . '\')';
				$GLOBALS['conexion'] -> query($consulta);
				$_SESSION['pi']['user'] = $_GET['email'];
				$_SESSION['pi']['pass'] = $pass;
				header('Location: index.php');
			}
		}
		
	}

?>