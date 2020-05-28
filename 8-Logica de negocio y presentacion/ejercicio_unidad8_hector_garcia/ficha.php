<?php
	
	include('funciones.php');
	include('plantillas.php');
	
	$consulta = 'SELECT * FROM productos WHERE id = ' . (int)$_GET['id'];
	$resultado = $GLOBALS['conexion'] -> query($consulta);
	$producto = $resultado -> fetch_array();

	if ((int)$_GET['id'] == 0) {
		$insertar = true;
	} else {
		$insertar = false;
	}
	//asignamos idioma
	$smarty -> assign('idioma','en');
	$smarty -> assign('insertar',$insertar);
	$smarty -> assign('producto',$producto);
	$smarty -> display('ficha.tpl');
?>
