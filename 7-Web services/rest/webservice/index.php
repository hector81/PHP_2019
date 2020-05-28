<?php
	//parametros de la peticion
	$peticion['recurso'] = explode('/',$_GET['recurso']);//lo cogemos de get separado por barras
	
	$peticion['accion'] = $_SERVER['REQUEST_METHOD'];//recuperamos el metodo
	$peticion['filtro'] = $_GET;//recuperamos los valores de filtro por get
	unset($peticion['filtro']['recurso']);//borramos el de modo rewrite
	$parametros = explode('&',file_get_contents('php://input'));// consultar directamente el flujo de entrada a PHP distinto de get que nos envia los parametros
	//los recorremos y para cada parametro le asignamos un valor , 0 y 1
	for ($i=0;$i<count($parametros);$i++) {
		$parametro = explode('=',$parametros[$i]);
		$peticion['parametros'][$parametro[0]] = $parametro[1];
	}
	$peticion['formato'] = explode(',',$_SERVER['HTTP_ACCEPT']);//sacamos el formato por comas
	$peticion['usuario'] = $_SERVER['PHP_AUTH_USER'];//sacamos el usuario
	$peticion['password'] = $_SERVER['PHP_AUTH_PW'];//sacamos el password
	
	//acciones de respuesta tras analisis de peticion
	$respuesta['estado'] = 404;//situacion de la accion que hemos indicado ejemplo 404
	$respuesta['formato'] = 'text/xml';//formato
	$respuesta['codificacion'] = 'UTF-8';//codificacion
	
	http_response_code($respuesta['estado']);
	header('Content-Type: ' . $respuesta['formato'] . '; charset=' . $respuesta['codificacion']);
	
	//ponemos el contenido. que seria la respuesta general
	
	//echo '<pre>';
		//print_r($peticion);
	//echo '</pre>';
?>
<?xml version="1.0"?>
<producto>
     <id>458</id>
     <nombre>Kit de manicura</nombre>
     <precio>24.99</precio>
     <stock>785</stock>

</producto>
