<?php

	//con esto ya tenemos abierta la base de datos, incluyendo la librería bbdd.php
	include('lib/bbdd.php');
	
	//creamos objetos
	$trabajador1 = new trabajador_mantenimiento(1);
	$trabajador2 = new trabajador_mantenimiento(3);
	$trabajador3 = new trabajador_contabilidad(2);
	
	//cambiamos el sueldo al trabajador
	$trabajador3->set_sueldo(1300);
	//creamos un parte de trabajo y creamos una nueva maquina como objeto
	$maquina1 = new maquina(1);//El id de la embotelladora
	$trabajador2->crear_parte($maquina1,'Parte de reparación');
	

	
	//clases
	abstract class trabajador{
		//variables o propiedades
		protected $id;
		protected $nombre;
		protected $sueldo;
		
		//constructor
		public function __construct($id){
			$consulta = "SELECT * FROM trabajadores WHERE id = $id";
			$resultado = $GLOBALS['conexion']->sqlConsultas($consulta);
			//si hay resultados
			if(count($resultado) > 0){
				$this->id = $resultado[0]['id'];
				$this->nombre = $resultado[0]['nombre'];
				$this->sueldo = $resultado[0]['sueldo'];
			}
		}
		
		//metodos
		public function set_sueldo($nuevo_sueldo){
			if($nuevo_sueldo < 900){
				$this->sueldo = 900; //para que el sueldo nunca sea menor que 900
			}else{
				$this->sueldo = $nuevo_sueldo;
			}
			//guardamos el nuevo sueldo en la base de datos
			$consulta = 'UPDATE trabajadores SET sueldo = ' . $this->sueldo . ' WHERE id = ' . $this->id . ' ;';
			$GLOBALS['conexion']->sqlConsultas($consulta);
		}//fin metodo
		
		public function get_sueldo(){
			return $this->sueldo;
		}//fin metodo
		
	}//fin clase
	
	class trabajador_mantenimiento extends trabajador{
		
		//metodos
		public function crear_parte($maquina,$descripcion){
			$consulta = 'INSERT INTO partes_trabajo(id_trabajador,id_maquina,fecha,descripcion) VALUES (';
			$consulta .= $this->id . ', ';
			$consulta .= $maquina->get_id() . ', ';
			$consulta .= time() . ', ';
			$consulta .= '\'' . addslashes($descripcion) . '\')';
			$GLOBALS['conexion']->sqlConsultas($consulta);
		}//fin metodo
	}//fin clase
	
	class trabajador_contabilidad extends trabajador{
		
		//metodos
		public function set_sueldo($nuevo_sueldo){//no puede ganar menos de 1000 euros
			if($nuevo_sueldo < 1000){
				$this->sueldo = 1000; //para que el sueldo nunca sea menor que 1000
			}else{
				$this->sueldo = $nuevo_sueldo;
			}
			//guardamos el nuevo sueldo en la base de datos
			$consulta = 'UPDATE trabajadores SET sueldo = ' . $this->sueldo . ' WHERE id = ' . $this->id . ' ;';
			$GLOBALS['conexion']->sqlConsultas($consulta);
		}//fin metodo
		
	}//fin clase
	
	class maquina{
		//variables o propiedades
		private $id;
		private $nombre;
		//constructor
		public function __construct($id){
			$consulta = "SELECT * FROM maquinas WHERE id = $id";
			$resultado = $GLOBALS['conexion']->sqlConsultas($consulta);
			//si hay resultados
			if(count($resultado) > 0){
				$this->id = $resultado[0]['id'];
				$this->nombre = $resultado[0]['nombre'];
			}
		}
		
		//metodos
		public function get_id(){
			return $this->id;
		}//fin metodo
		
	}//fin clase
	

	
?>