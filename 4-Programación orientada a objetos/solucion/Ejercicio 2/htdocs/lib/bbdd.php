<?php

	$GLOBALS['conexion'] = new conexion_mysql('localhost','root','','mibasededatos');

	class conexion_mysql {
		
		private $conexion;
		
		public function __construct($host,$usuario,$contrasena,$bbdd) {
			$this -> conexion = mysqli_connect($host,$usuario,$contrasena,$bbdd);
			$this -> conexion -> query('SET NAMES utf8');
		}
		
		public function sql($consulta) {
			$resultado = $this -> conexion -> query($consulta);
			if ($resultado -> num_rows > 0) {
				$i = 0;
				while ($fila = $resultado -> fetch_array()) {
					$datos[$i] = $fila;
					$i++;
				}
			}
			return $datos;
		}
		
	}

?>