<?php

	//con esto ya tenemos abierta la base de datos, incluyendo la librería bbdd.php
	include('lib/bbdd.php');
	$sql = 'SELECT * FROM libros';
	//Esto devuelve un array bidimensional con las filas y columnas recuperadas de la consulta
    $resultado = $GLOBALS['conexion']->sqlConsultas($sql);
	echo '<pre>';
	print_r($resultado);
	echo '</pre>';

	
?>