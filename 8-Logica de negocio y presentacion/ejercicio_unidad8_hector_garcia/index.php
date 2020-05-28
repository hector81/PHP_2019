<?php
	//logica de negocio
	include('funciones.php');
	include('plantillas.php');
	
	switch ($_POST['acc']) {
	case 'insertar_producto':
		$consulta  = 'INSERT INTO productos (nombre,precio) VALUES (';
		$consulta .= '\'' . addslashes($_POST['nombre']) . '\', ';
		$precio = (float)str_replace(',','.',$_POST['precio']);
		$consulta .= $precio . ')';
		$GLOBALS['conexion'] -> query($consulta);
		break;
	case 'eliminar':
		$consulta  = 'DELETE FROM productos WHERE id = ' . (int)$_POST['id'];
		$GLOBALS['conexion'] -> query($consulta);
		break;
	case 'modificar_producto':
		$consulta  = 'UPDATE productos SET ';
		$consulta .= 'nombre = \'' . addslashes($_POST['nombre']) . '\', ';
		$precio = (float)str_replace(',','.',$_POST['precio']);
		$consulta .= 'precio = ' . $precio . ' ';
		$consulta .= 'WHERE id = ' . (int)$_POST['id'];
		$GLOBALS['conexion'] -> query($consulta);
		break;
	}
	
	$consulta = 'SELECT * FROM productos ORDER BY nombre';
	$resultado = $GLOBALS['conexion'] -> query($consulta);
	$contador = 0;
	//para listado
	while ($producto = $resultado -> fetch_array()) {
		//añadimos al arrays de productos el producto actual
		$productos[$contador] = $producto;
		$contador++;
	}
	//aqui asginamos las variables que necesitamos
	$smarty -> assign('productos',$productos);//sera el array de productos
	//asignamos idioma
	$smarty -> assign('idioma','en');
	
	//aqui llamamos a la plantilla que queremos construir
	$smarty -> display('listado.tpl');
?>
			