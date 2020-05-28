<?php
	//nos comunicamos con el modelo para pasarle los comentarios
     include('model/noticias.php');
	 //objeto de clase noticias
     $modelo = new model_noticias();

     switch ($_POST['acc']) {
     case 'add_comentario':
          $modelo -> add_comentario($_POST['comentario']);
          break;
     }
	//le solicitamos datos de las noticias al modelo
     $datos = $modelo -> get_noticias();
	
	//nos comunicamos con la vista para ver html noticias
     include ('view/noticias.php');
	 //objeto de clase view_noticias
     $vista = new view_noticias();
	//le pasamos los datos y le decimos que lo muestre con html
     $vista -> set_noticias($datos);
     $vista -> mostrar();

?>