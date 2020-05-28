<?php
	//llamamos a funciones
	include('funciones.php');
	
	//si el login es correcto, logeara
	if(login_correcto()){
		$ts = time();//creamos un timestamp para luego crear un plazo de caducidad
		//esta firma se crea a traves de un algoritmo en un solo sentido
		$firma = sha1($_SESSION['ps']['user'] . $ts . clave_privada);//user + clave privada. La clave privada solo pueden conocerla el proveedor de identidad y el de servicio que se han puesto de acuerdo. Tambien añadimos el timestamp a nuestra firma
		//creamos nuestra url sso con la firma con todos los datos
		$url = 'http://localhost:8080/prueba/ejercicio/proveedorservicio/sso.php?email=' . htmlentities($_SESSION['ps']['user']) . '&ts=' . $ts . '&firma=' . $firma;
		//redirigimos a nuestro sso con la firma completa
		header("Location: $url");
	}
?>
