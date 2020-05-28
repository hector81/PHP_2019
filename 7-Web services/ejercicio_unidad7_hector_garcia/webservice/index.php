<?php

	//conectamos la base de datos
	$GLOBALS['conexion'] = mysqli_connect('localhost','root','','bbdd');
	$GLOBALS['conexion'] -> query('SET NAME UTF8');//ESTABLECEMOS EL MODO TRABAJO UTF8

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
	
	// ACCIONES
	//Hacemos una consulta para saber los datos de usuario del que envia peticion
	$sql = 'SELECT * FROM usuarios WHERE usuario = \'' . addslashes($peticion['usuario']) . '\' AND password = \'' . sha1($peticion['password']) . '\'';
	$resultado = $GLOBALS['conexion'] -> query($sql);
	//si hay resultado haremos una serie de acciones
	if ($resultado -> num_rows > 0) {
		//Si el resultado esta en XML es aceptable y en caso contrario es no aceptable
		if(in_array('text/xml',$peticion['formato'])){ //si esta en el array el xml
			//localizar el recurso que nos envian que puede ser listado o recurso concreto
			if ((count($peticion['recurso']) == 1) && ($peticion['recurso'][0] == 'productos')) {
				switch ($peticion['accion']) { //comprobamos el metodo
				case 'GET':
					$respuesta['estado'] = 200;//respuetsa OK
					$respuesta['formato'] = 'text/xml';
					$respuesta['codificacion'] = 'UTF-8';
//devolvemos xml con consulta					
?>
<?xml version="1.0"?>
<productos>
<links>
<?php
					$sql = 'SELECT * FROM productos ORDER BY nombre';
					$resultado = $GLOBALS['conexion'] -> query($sql);
					while ($producto = $resultado -> fetch_array()) {
?>
<link rel="producto" title="<?php echo htmlentities($producto['nombre']); ?>" href="http://localhost:8080/ejercicio_unidad7_hector_garcia/webservice/productos/<?php echo $producto['id']; ?>" />
<?php
					}
?>
</links>
</productos>
<?php
					break;
				case 'POST':  //realizar la insercion del producto
					$sql = 'INSERT INTO productos (nombre) VALUES (\'' . addslashes($peticion['parametros']['nombre']) . '\')';
					$GLOBALS['conexion'] -> query($sql);//hacemos insercion
					$respuesta['estado'] = 201;//creado
					break;
				default://en caso de no ser get o post
					$respuesta['estado'] = 405;
				}
			} elseif ((count($peticion['recurso']) == 2) && ($peticion['recurso'][0] == 'productos')) {//para borrar productos
				$sql = 'SELECT * FROM productos WHERE id = \'' . addslashes($peticion['recurso'][1]) . '\'';
				$resultado = $GLOBALS['conexion'] -> query($sql);
				if ($resultado -> num_rows > 0) {//si hay resultados
					switch ($peticion['accion']) {
					case 'DELETE':
						$sql = 'DELETE FROM productos WHERE id = \'' . addslashes($peticion['recurso'][1]) . '\'';
						$GLOBALS['conexion'] -> query($sql);//hacemos borrado
						$respuesta['estado'] = 202;
						break;
					default:
						$respuesta['estado'] = 405;
					}
				} else {
					$respuesta['estado'] = 404;
				}
			} else {
				$respuesta['estado'] = 404;// en caso contrario un error 404
			}
		} else {//en caso contrario, el codigo de error 406 no aceptable por formato
			$respuesta['estado'] = 406;//Indica error por no estar autorizado
		}
	} else {
		$respuesta['estado'] = 401;//Indica error por no estar autorizado
	}
	
	http_response_code($respuesta['estado']);
	//este condicional es en caso de que no haya un formato pedido o establecido
	if ($respuesta['formato'] != '') {
		header('Content-Type: ' . $respuesta['formato'] . '; charset=' . $respuesta['codificacion']);//formato
	}
	
?>