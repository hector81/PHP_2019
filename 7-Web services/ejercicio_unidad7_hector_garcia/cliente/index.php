<?php

$peticion['endpoint'] = 'http://localhost:8080/ejercicio_unidad7_hector_garcia/webservice/';
$peticion['usuario'] = 'jose';
$peticion['password'] = 'admin';//1234
$peticion['formato'][0] = 'text/xml';

//para eliminar en html
switch($_POST['acc']){
	case 'insertar':
		$peticion['recurso'] = 'productos';
		$peticion['accion'] = 'POST';
		$peticion['parametros']['nombre'] = $_POST['nombre'];
		llamarREST($peticion);//hacemos la peticion de insercion al webservice
	break;
	case 'eliminar':
		//capturar id por id 
		$recurso = substr($_POST['id'],strlen($peticion['endpoint']));
		//$recurso =  str_replace('http://localhost/webservice/productos/','',$_POST['id']);
		//echo $recurso; exit();

		$peticion['recurso'] = $recurso;
		$peticion['accion'] = 'DELETE';		
		llamarREST($peticion);//hacemos la peticion de eliminacion al webservice
	break;
}



/*
$peticion['filtro']['campo1'] = 'valor1';
$peticion['filtro']['campo2'] = 'valor2';
$peticion['parametros']['campo1'] = 'valor1';
$peticion['parametros']['campo2'] = 'valor2';

$peticion['formato'][1] = 'application/json';

*/

function llamarREST($peticion) {
	$url = $peticion['endpoint'] . $peticion['recurso'];
	if (isset($peticion['filtro'])) {
		if (count($peticion['filtro']) > 0) {
			$url .= '?' . http_build_query($peticion['filtro']);
		}
	}

	$peticionHTTP = curl_init();
	curl_setopt($peticionHTTP,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($peticionHTTP,CURLOPT_URL,$url);
	curl_setopt($peticionHTTP,CURLOPT_CUSTOMREQUEST,$peticion['accion']);
	if (isset($peticion['parametros'])) {
		if (count($peticion['parametros']) > 0) {
			curl_setopt($peticionHTTP,CURLOPT_POSTFIELDS,http_build_query($peticion['parametros']));
		}
	}
	
	for ($i=0;$i<count($peticion['formato']);$i++) {
		if ($i != 0) {
			$formato .= ',';
		}
		$formato .= $peticion['formato'][$i];
	}
	
	curl_setopt($peticionHTTP,CURLOPT_HTTPHEADER,['Accept: ' . $formato]);
	curl_setopt($peticionHTTP,CURLOPT_USERPWD,$peticion['usuario'] . ':' . $peticion['password']);

	$respuestaHTTP = curl_exec($peticionHTTP);
	$respuesta['estado'] = curl_getinfo($peticionHTTP,CURLINFO_HTTP_CODE);
	$formato = explode(';',curl_getinfo($peticionHTTP,CURLINFO_CONTENT_TYPE));
	$respuesta['formato'] = $formato[0];
	$formato2 = explode('=',$formato[1]);
	$respuesta['codificacion'] = $formato2[1];
	libxml_use_internal_errors(true);
	$respuesta['contenido'] = simplexml_load_string($respuestaHTTP);
	return $respuesta;
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Llamada a web service</title>
		<link href="estilos.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="main">
			<header>
				<h1>Llamada a web service</h1>
			</header>
			<div id="contenido">
				<h2>Productos</h2>
					<?php
					$peticion['recurso'] = 'productos';
					$peticion['accion'] = 'GET';
					$respuesta = llamarREST($peticion);

					if(isset($respuesta['contenido'] -> links -> link)){
						for ($i=0;$i<count($respuesta['contenido'] -> links -> link);$i++) {
					?>
						<div class="prod_nombre">
					<?php echo htmlentities($respuesta['contenido'] -> links -> link[$i]['title']); ?>
						</div>
						<div class="prod_eliminar">
							<form method="post" action="index.php">
								<input type="hidden" name="acc" value="eliminar">
								<input type="hidden" name="id" value="<?php echo htmlentities($respuesta['contenido'] -> links -> link[$i]['href']); ?>">
								<button type="submit">Eliminar</button>
							</form>
						</div>
					<?php
						}
					}
					?>
				<h2>Añadir producto</h2>
				<form method="post" action="index.php">
					<input type="hidden" name="acc" value="insertar">
					<input type="text" name="nombre">
					<button type="submit">Añadir</button>
				</form>
			</div>
		</div>
	</body>
</html>