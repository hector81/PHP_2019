<?php

	define('clave_privada','dnfkjlhwefilbwe');

	session_start();
	$GLOBALS['conexion'] = mysqli_connect('localhost','root','','proveedorservicio');
	$GLOBALS['conexion'] -> query('SET NAMES utf8');
	
	function login_correcto() {
		$consulta = 'SELECT * FROM usuarios WHERE user = \'' . addslashes($_SESSION['pi']['user']) . '\' AND pass = \'' . $_SESSION['pi']['pass'] . '\'';
		$resultado = $GLOBALS['conexion'] -> query($consulta);
		if ($resultado -> num_rows > 0) {
			return true;
		} else {
			return false;
		}
	}

?>