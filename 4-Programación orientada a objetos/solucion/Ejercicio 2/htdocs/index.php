<?php

	include('lib/bbdd.php');
	
	$trabajador1 = new trabajador_mantenimiento(1);
	$trabajador2 = new trabajador_mantenimiento(3);
	$trabajador3 = new trabajador_contabilidad(2);
	
	$trabajador3 -> set_sueldo(1300);
	$maquina1 = new maquina(1);
	$trabajador2 -> crear_parte($maquina1,'Parte de reparación');
	
	abstract class trabajador {
		
		protected $id;
		protected $nombre;
		protected $sueldo;
		
		public function __construct($id) {
			$consulta = "SELECT * FROM trabajadores WHERE id = $id";
			$resultado = $GLOBALS['conexion'] -> sql($consulta);
			if (count($resultado) > 0) {
				$this -> id = $resultado[0]['id'];
				$this -> nombre = $resultado[0]['nombre'];
				$this -> sueldo = $resultado[0]['sueldo'];
			}
		}
		
		public function set_sueldo($nuevo_sueldo) {
			if ($nuevo_sueldo < 900) {
				$this -> sueldo = 900;
			} else {
				$this -> sueldo = $nuevo_sueldo;
			}
			$consulta = 'UPDATE trabajadores SET sueldo = ' . $this -> sueldo . ' WHERE id = ' . $this -> id;
			$GLOBALS['conexion'] -> sql($consulta);
		}
		
		public function get_sueldo() {
			return $sueldo;
		}
		
	}
	
	class trabajador_mantenimiento extends trabajador {
		
		public function crear_parte($maquina,$descripcion) {
			$consulta  = 'INSERT INTO partes_trabajo (id_trabajador,id_maquina,fecha,descripcion) VALUES (';
			$consulta .= $this -> id . ', ';
			$consulta .= $maquina -> get_id() . ', ';
			$consulta .= time() . ', ';
			$consulta .= '\'' . addslashes($descripcion) . '\')';
			$GLOBALS['conexion'] -> sql($consulta);
		}
		
	}
	
	class trabajador_contabilidad extends trabajador {
		
		public function set_sueldo($nuevo_sueldo) {
			if ($nuevo_sueldo < 1000) {
				$this -> sueldo = 1000;
			} else {
				$this -> sueldo = $nuevo_sueldo;
			}
			$consulta = 'UPDATE trabajadores SET sueldo = ' . $this -> sueldo . ' WHERE id = ' . $this -> id;
			$GLOBALS['conexion'] -> sql($consulta);
		}
		
	}
	
	class maquina {
		
		private $nombre;
		private $id;
		
		public function __construct($id) {
			$consulta = "SELECT * FROM maquinas WHERE id = $id";
			$resultado = $GLOBALS['conexion'] -> sql($consulta);
			if (count($resultado) > 0) {
				$this -> id = $resultado[0]['id'];
				$this -> nombre = $resultado[0]['nombre'];
			}
		}
		
		public function get_id() {
			return $this -> id;
		}
		
	}

?>