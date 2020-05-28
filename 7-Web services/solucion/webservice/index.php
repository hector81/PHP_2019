<?php

	$GLOBALS['conexion'] = mysqli_connect('localhost','root','','web_services');
	$GLOBALS['conexion'] -> query('SET NAMES UTF8');

	$peticion['recurso'] = explode('/',$_GET['recurso']);
	$peticion['accion'] = $_SERVER['REQUEST_METHOD'];
	$peticion['filtro'] = $_GET;
	unset($peticion['filtro']['recurso']);
	$parametros = explode('&',file_get_contents('php://input'));
	for ($i=0;$i<count($parametros);$i++) {
		$parametro = explode('=',$parametros[$i]);
		$peticion['parametros'][$parametro[0]] = $parametro[1];
	}
	$peticion['formato'] = explode(',',$_SERVER['HTTP_ACCEPT']);
	$peticion['usuario'] = $_SERVER['PHP_AUTH_USER'];
	$peticion['password'] = $_SERVER['PHP_AUTH_PW'];
	
	$sql = 'SELECT * FROM usuarios WHERE usuario = \'' . addslashes($peticion['usuario']) . '\' AND password = \'' . sha1($peticion['password']) . '\'';
	$resultado = $GLOBALS['conexion'] -> query($sql);
	if ($resultado -> num_rows > 0) {
		if (in_array('text/xml',$peticion['formato'])) {
			if ((count($peticion['recurso']) == 1) && ($peticion['recurso'][0] == 'productos')) {
				switch ($peticion['accion']) {
				case 'GET':
					$respuesta['estado'] = 200;
					$respuesta['formato'] = 'text/xml';
					$respuesta['codificacion'] = 'UTF-8';	
?>
<?xml version="1.0"?>
<productos>
<links>
<?php
					$sql = 'SELECT * FROM productos ORDER BY nombre';
					$resultado = $GLOBALS['conexion'] -> query($sql);
					while ($producto = $resultado -> fetch_array()) {
?>
<link rel="producto" title="<?php echo htmlentities($producto['nombre']); ?>" href="http://localhost/webservice/productos/<?php echo $producto['id']; ?>" />
<?php
					}
?>
</links>
</productos>
<?php
					break;
				case 'POST':
					$sql = 'INSERT INTO productos (nombre) VALUES (\'' . addslashes($peticion['parametros']['nombre']) . '\')';
					$GLOBALS['conexion'] -> query($sql);
					$respuesta['estado'] = 201;
					break;
				default:
					$respuesta['estado'] = 405;
				}
			} elseif ((count($peticion['recurso']) == 2) && ($peticion['recurso'][0] == 'productos')) {
				$sql = 'SELECT * FROM productos WHERE id = \'' . addslashes($peticion['recurso'][1]) . '\'';
				$resultado = $GLOBALS['conexion'] -> query($sql);
				if ($resultado -> num_rows > 0) {
					switch ($peticion['accion']) {
					case 'DELETE':
						$sql = 'DELETE FROM productos WHERE id = \'' . addslashes($peticion['recurso'][1]) . '\'';
						$GLOBALS['conexion'] -> query($sql);
						$respuesta['estado'] = 202;
						break;
					default:
						$respuesta['estado'] = 405;
					}
				} else {
					$respuesta['estado'] = 404;
				}
			} else {
				$respuesta['estado'] = 404;
			}
		} else {
			$respuesta['estado'] = 406;
		}
	} else {
		$respuesta['estado'] = 401;
	}
	
	http_response_code($respuesta['estado']);
	if ($respuesta['formato'] != '') {
		header('Content-Type: ' . $respuesta['formato'] . '; charset=' . $respuesta['codificacion']);
	}
	
?>