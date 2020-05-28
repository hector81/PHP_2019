<?php

     abstract class empleado {

			 public $nombre;
			 private $salario;
			 public $dni;

			 final public function set_salario($valor) {
				  // Acciones del método
			 }

		}

		class empleado_mantenimiento extends empleado {

			 public $partes_trabajo;
			 public $maquinas_asignadas;

		}

?>