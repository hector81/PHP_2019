<?php
	$GLOBALS['conexion'] = mysqli_connect('localhost','root','','web_services');	
	switch($_GET['accion']){
		//a traves de enlace get http://localhost:8080/prueba/productos.php?accion=consulta
		//recibiremos los datos
		case 'consulta':
			$sql = 'SELECT * FROM productos ORDER BY nombre';
			$resultado = $GLOBALS['conexion'] -> query($sql);
			while($linea = $resultado ->fetch_array()){
				//formateamos los datos en formato CSV
				echo $linea['id'];				
				echo ',';
				echo $linea['nombre'];
				echo '\n';
			}
		break;
		//a traves de enlace get http://localhost:8080/prueba/productos.php?accion=insercion&valor=Nuevo
		//insertamos datos
		case 'insercion':
			$sql = 'INSERT INTO productos(nombre) VALUES (\'' . addslashes($_GET['valor']) . '\')';
			$resultado = $GLOBALS['conexion'] -> query($sql);
		break;
		//a traves de enlace get http://localhost:8080/prueba/productos.php?accion=eliminacion&id=6
		//insertamos datos
		case 'eliminacion':
			$sql = 'DELETE FROM productos WHERE id = ' .$_GET['id'];
			$resultado = $GLOBALS['conexion'] -> query($sql);
		break;
	}//fin switch
?>