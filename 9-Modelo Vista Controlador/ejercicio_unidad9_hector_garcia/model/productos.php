<?php
	// script adicional con la conexión a la base de datos
	// incluye el archivo del script indicado sólo la primera vez que es solicitado. Si volvemos a solicitar incluir el mismo archivo,
     include_once('db.php');
	//clase
     class model_productos {
		
		//añadir productos
        public function add_producto($nombre, $precio) {
            $consulta  = 'INSERT INTO productos (nombre,precio) VALUES (';
			$consulta .= '\'' . addslashes($nombre) . '\', ';
			$precio = (float)str_replace(',','.',$precio);
			$consulta .= $precio . ')';
			$GLOBALS['conexion'] -> sql($consulta);//ejecucion
        }//fin funcion
		
		//borrar productos
        public function delete_producto($id) {
            $consulta  = 'DELETE FROM productos WHERE id = ' . $id;
			$GLOBALS['conexion'] -> sql($consulta);
        }//fin funcion
		
		//modificar productos
        public function update_producto($id, $nombre, $precio) {
            $consulta  = 'UPDATE productos SET ';
			$consulta .= 'nombre = \'' . addslashes($nombre) . '\', ';
			$precio = (float)str_replace(',','.',$precio);
			$consulta .= 'precio = ' . $precio . ' ';
			$consulta .= 'WHERE id = ' . $id;
			$GLOBALS['conexion'] -> sql($consulta);  
        }//fin funcion
		
		//recuperar los datos de los productos
		public function get_productos($id = -1) {
			if($id == -1){
				$consulta = 'SELECT * FROM productos ORDER BY nombre';
				$datos = $GLOBALS['conexion'] -> sql($consulta);
				return $datos;
			}else{
				$consulta = 'SELECT * FROM productos WHERE id = ' . $id;
				$datos = $GLOBALS['conexion'] -> sql($consulta);
				return $datos[0];
			}
			
		}//fin funcion

     }

?>