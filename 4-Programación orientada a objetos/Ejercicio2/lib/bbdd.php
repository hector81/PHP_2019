<?php
		
	$GLOBALS['conexion'] = new conexion_mysql('localhost','root','','empresa_prueba');
	
	class conexion_mysql{
		//Propiedades
		private $conexion;
		
		//Constructor
		public function __construct($host, $usuario, $contrasena,$bbdd){//parámetros de conexión al constructor
			//con esto abrimos la conexion con localhost
			$this->conexion = mysqli_connect($host, $usuario, $contrasena,$bbdd);
			$this->conexion -> query('SET NAMES utf8');
		}//fin constructor
		
		//Metodos
		public function sqlConsultas($consulta){
			$resultado = $this->conexion->query($consulta);
			//array vacio 
			$datos = array();
			//comprobamos que haya registros de la consulta
			if($resultado->num_rows > 0){
				//si hay resultados
				$contador = 0;
				while($fila = $resultado ->fetch_array()){
					$datos[$contador] = $fila;//metemos los registros encontrados por posicion de array
					$contador++;
				}
			}
			return $datos;
		}//fin metodo
		
	}//fin clase
	
	
?>