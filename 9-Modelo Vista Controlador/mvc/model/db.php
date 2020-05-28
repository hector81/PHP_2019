<?php
	$conexionDB['servidor'] = 'localhost';
	$conexionDB['usuario'] = 'root';
	$conexionDB['password'] = '';
	$conexionDB['bbdd'] = 'bbdd';
	//VARIABLE global de conexion
	$GLOBALS[] = new conexion_mysql($conexionDB['servidor'],$conexionDB['usuario'],$conexionDB['password'],$conexionDB['bbdd']);
	
	//clase
	class conexion_mysql{
		//propiedades
		private $conexion;
		
		//constructor
		public function __construct($servidor, $usuario, $password, $bbdd){
			$this -> conexion = mysqli_connect($servidor, $usuario, $password, $bbdd);
			$this -> conexion -> query('SET NAMES utf8');
		}
		
		//metodo para ejecucion sql
		public function sql($sql){
			//guardo el resultado
			$resultado = $this -> conexion -> query($sql);
			if($resultado -> num_rows > 0){ //si hay resultado
				$i = 0; //contador
				while($fila = $resultado -> fetch_array()){//recorremos resultados mientras hay
					$datos[$i] = $fila;
					$i++;
				}
			}
		}
	}
?>
			