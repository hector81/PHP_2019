<?php
	//todos los datos que enviamos al servicio rest para obtener respuesta
	$peticion['endpoint'] = 'http://localhost/webservice/'; //la url
	$peticion['recurso'] = 'producto/548'; //la informacion sobre los datos o recursos que queremos actuar
	$peticion['accion'] = 'PUT'; //accion a realizar
	$peticion['filtro']['campo1'] = 'valor1'; // para filtrar accion de accion get
	$peticion['filtro']['campo2'] = 'valor2'; // para filtrar accion de accion get
	$peticion['parametros']['campo1'] = 'valor1';//valores o parametros para filtrar accion
	$peticion['parametros']['campo2'] = 'valor2';//valores o parametros para filtrar accion
	$peticion['formato'][0] = 'text/xml'; //formatos que queremos
	$peticion['formato'][1] = 'application/json'; //formatos que queremos
	$peticion['usuario'] = 'jose'; //el usuario
	$peticion['password'] = '1234'; //el password
	
	//generamos la url con endopoint y el recurso
	$url = $peticion['endpoint'] . $peticion['recurso'];
	//si la peticion tiene datos de filtro o no
	if (count($peticion['filtro']) > 0) {
		$url .= '?' . http_build_query($peticion['filtro']);//transforma array en query string
	}
	//echo $url;
	
	//vamos a usar la libreria curl de php para la peticion
	$peticionHTTP = curl_init();
	curl_setopt($peticionHTTP,CURLOPT_RETURNTRANSFER,true);//nos devolvera datos en una variable
	
	curl_setopt($peticionHTTP,CURLOPT_URL,$url); //la url que generamos
	curl_setopt($peticionHTTP,CURLOPT_CUSTOMREQUEST,$peticion['accion']); //es el metodo por el que enviamos
	//vamos a preguntar si tiene parametros
	if (count($peticionHTTP['parametros']) > 0) {
		//en caso de que tenga establecemos la opcion de los parametros
		curl_setopt($peticionHTTP,CURLOPT_POSTFIELDS,http_build_query($peticionHTTP['parametros']));//formateamos
	}
	//ahora establecemos los formatos que queremos, recorriendo elarray de formatos
	for ($i=0;$i<count($peticion['formato']);$i++) {
		if ($i != 0) {//si no es el primero le añade una coma
			$formato .= ',';
		}
		$formato .= $peticion['formato'][$i];
	}
	//echo $formato;
	//establecemos una cabecera http header con formato
	//indica en qué formato desea recibir los datos mediante la cabecera HTTP Accept.
	curl_setopt($peticionHTTP,CURLOPT_HTTPHEADER,['Accept: ' . $formato]);
	//ahora establecemos usuario y contraseña separado por 2 puntos
	curl_setopt($peticionHTTP,CURLOPT_USERPWD,$peticion['usuario'] . ':' . $peticion['password']);
	
	
	//ejecutamos respuesta despues de enviar los parametros al webservice
	// interpretar los datos devueltos y el código de estado
	///recuperar desde el cliente la respuesta
	//Todas las acciones que realizaremos a continuación serán ejecutadas después de la petición HTTP, es decir, después de la siguiente línea:
	$respuestaHTTP = curl_exec($peticionHTTP);
	$respuesta['estado'] = curl_getinfo($peticionHTTP,CURLINFO_HTTP_CODE);//estado
	$formato = explode(';',curl_getinfo($peticionHTTP,CURLINFO_CONTENT_TYPE));//devuelve formato devuelto y codificacion caracteres
	$respuesta['formato'] = $formato[0];//formato
	$formato2 = explode('=',$formato[1]);//separamos
	$respuesta['codificacion'] = $formato2[1];//codificacion caracteres
	libxml_use_internal_errors(true);
	$respuesta['contenido'] = simplexml_load_string($respuestaHTTP);//usamos la libreria simplexml para devolverlos en forma objeto
	echo $respuesta['contenido'] ->nombre;//devolveria nombre
	return $respuesta;
	
	//curl_setopt($peticionHTTP,CURLOPT_RETURNTRANSFER,true);// obtener el código de estado devuelto por el servidor. ejemplo 200, o 404
	//curl_getinfo($peticionHTTP,CURLINFO_CONTENT_TYPE);//obtener el formato del contenido devuelto, nos devolverá el texto exacto que el web service ha incluido en la cabecera Content-Type
	
	//$resultado = curl_exec($peticion);// contenido de la respuesta nos es devuelto directamente en la ejecución de curl_exec

	
	//echo $resultado;
	
?>
