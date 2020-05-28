<?php
	
	include('model/productos.php');
	//creamos un objeto de modelo
	$modelo = new model_productos();
	
	switch ($_POST['acc']) {
	case 'insertar_producto':
		$modelo -> add_producto($_POST['nombre'],$_POST['precio']);//llamamos al metodo añadir producto del modelo
		break;
	case 'eliminar':
		$modelo -> delete_producto((int)$_POST['id']);//llamamos al metodo borrar producto del modelo
		break;
	case 'modificar_producto':
		$modelo -> update_producto($_POST['id'],$_POST['nombre'],$_POST['precio']);//llamamos al metodo modificar producto del modelo
		break;
	}
	
	//llamammos a la vista
	include('view/productos.php');
	//creamos un objeto de vista y le pasamos al constructor el array de productos para que lo muestre en la vista
	$vista = new view_productos();
	
	
	//si le indicamos una accion
	if($_GET['id'] != ''){
		//creamos un array de productos para pasarselo a la vista 
		$productos = $modelo -> get_productos((int)$_GET['id']);
		$vista -> mostrar_editar($productos);//editar
	}elseif($_GET['acc'] == 'insertar'){//si no le indicamos una accion.insertar
		$vista -> mostrar_insertar();
	}else{//en este caso es listado de productos
		//creamos un array de productos para pasarselo a la vista 
		$productos = $modelo -> get_productos();
		$vista -> mostrar_listado($productos);
	}
	
	
	
	
?>
			