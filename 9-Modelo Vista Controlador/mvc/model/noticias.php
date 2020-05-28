<?php
	// script adicional con la conexión a la base de datos
	// incluye el archivo del script indicado sólo la primera vez que es solicitado. Si volvemos a solicitar incluir el mismo archivo,
     include_once('db.php');

     class model_noticias {

		//recuperar los datos de la noticias
          public function get_noticias() {
               $consulta = 'SELECT * FROM noticias ORDER BY fecha DESC';
               $resultado = $GLOBALS['conexion'] -> sql($consulta);
               return $resultado;//devuelve array
          }
		//añadir cometnarios a la noticia
          public function add_comentario($comentario) {
               $consulta  = 'INSERT INTO comentarios (comentario) VALUES (';
               $consulta .= '\'' . addslashes($comentario) . '\')';
               $GLOBALS['conexion'] -> sql($consulta);
          }

     }

?>