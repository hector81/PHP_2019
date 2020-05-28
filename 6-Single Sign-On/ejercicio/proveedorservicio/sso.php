<?php
	//Conectamos con el archivo de funciones para que se conecte a la base de datos
	include('funciones.php');
	//capturamos la firma con el timestampo y la clave privada
	$firma = $_GET['email'] . $_GET['ts'] . clave_privada;
	
	//todo el código no se puede ejecutar sin confirmar la firma
	if($firma == $_GET['firma'] ){
		//creamos una variable con time con plazo de caducidad de 15 minutos
		$ts = (int)$_GET['ts'];
		//si el plazo de 15 minutos no ha pasado todavia
		if($ts < time() - (15*60)){
			//realizamos la consulta para saber si el usuario existe
			$consulta = 'SELECT * FROM usuarios WHERE user = \'' . addslashes($_GET['email']) . '\'';
			$resultado = $GLOBALS['conexion'] -> query($consulta);
			//comprobamos si hay resultados
			if($resultado -> num_rows > 0){
				//si lo hay recuperamos usuario por sesion y el password que se encriptara
				$usuario = $resultado -> fetch_array();
				$_SESSION['pi']['user'] = $usuario['user'];
				$_SESSION['pi']['pass'] = $usuario['pass'];
				//con esto ya estamos logeados y entonces redirigimos hacia la portada ya logeados
				header('Location: index.php');
			}else{
				//en caso de no estar en la base de datos, le damos de alta aunque el usuario no sabra cual es su usuario
				//creamos una contraseña aleatoria
				$pass = sha1(rand(1000,9999));		
				echo 'No tiene usuario así que ha sido insertado en nuestra base de datos para que pueda acceder';
				$consulta = 'INSERT INTO usuario(user,pass) VALUES (';
				$consulta .= '\'' . addslashes($_GET['email']) . '\')';
				$consulta .= '\'' . $pass . '\')';//le ponemos una contraseña aleatoria
				$GLOBALS['conexion']->query($consulta);
				//tengo que añadirle el usuario y contraseña
				$_SESSION['pi']['user'] = $_GET['email'];
				$_SESSION['pi']['pass'] = $pass;
				//con esto ya estamos logeados y entonces redirigimos hacia la portada ya logeados
				header('Location: index.php');
			}	
		}//en caso de haber pasado 15 minutos no realizaremos ninguna accion
		
	}
	
?>
