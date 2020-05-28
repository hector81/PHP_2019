<?php
	include('funciones.php');
	if (login_correcto()) {
		$ts = time();
		$firma = sha1($_SESSION['ps']['user'] . $ts . clave_privada);
		$url = 'http://localhost/proveedorservicio/sso.php?email=' . htmlentities($_SESSION['ps']['user']) . '&ts=' . $ts . '&firma=' . $firma;
		header("Location: $url");
	}
?>