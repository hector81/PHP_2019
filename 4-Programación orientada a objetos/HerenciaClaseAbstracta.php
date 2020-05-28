<?php

     abstract class empleado {

			 public $nombre;
			 public $salario;
			 public $dni;

		}

		class empleado_mantenimiento extends empleado {

			 public $partes_trabajo;
			 public $maquinas_asignadas;

		}

		class empleado_comercial extends empleado {

			 public $clientes;
			 public $agenda;

		}
?>