<?php

     abstract class empleado {

		 public $nombre;
		 public $salario;
		 public $dni;
		 abstract public function renovar_password();

	}

	class empleado_mantenimiento extends empleado {

		 public $partes_trabajo;
		 public $maquinas_asignadas;

		 public function renovar_password() {
			  // Implementación del método
		 }

	}
?>