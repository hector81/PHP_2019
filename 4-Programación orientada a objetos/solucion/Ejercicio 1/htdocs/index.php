<?php

	include('lib/bbdd.php');
	$resultado = $GLOBALS['conexion'] -> sql('SELECT * FROM mitabla');
	echo '<pre>';
	print_r($resultado);
	echo '</pre>';

?>