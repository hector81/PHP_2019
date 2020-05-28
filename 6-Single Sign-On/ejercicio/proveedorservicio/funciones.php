<?php
	//defino una variable constante, clave privada que va a ser aleatoria para la firma
	//esta clave la deben tener tanto el proveedor de identidad como el de servicio
	define('clave_privada','frwerewreww');
	
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