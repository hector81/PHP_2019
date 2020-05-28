<?php

     include('librerias/conexion_bbdd.php');

     $empleado1 = new empleado(3457);

     $nuevo_salario = $empleado1 -> get_salario() * 1.10;
     $empleado1 -> set_salario($nuevo_salario);

     $nuevo_salario = $empleado1 -> get_salario() * 1.10;
     $empleado1 -> set_salario($nuevo_salario);

     class empleado {

          private $salario;
          private $salario_inicial;
          private $id;

          public function __construct($numero_empleado) {
               $sql = "SELECT salario FROM empleados WHERE id = $numero_empleado";
               $datos = $GLOBALS['conexion'] -> query($sql);
               $this -> salario = $datos[0]['salario'];
               $this -> salario_inicial = $this -> salario;
               $this -> $id = $numero_empleado;
          }

          public function __destruct() {
               if ($this -> salario_inicial != $this -> salario) {
                    $sql  = 'UPDATE empleados ';
                    $sql .= 'SET salario = ' . $this -> salario . ' ';
                    $sql .= 'WHERE id = ' . $this -> $id;
                    $GLOBALS['conexion'] -> query($sql);
               }
          }

          public function set_salario($valor) {
               $this -> salario = $valor;
          }

          public function get_salario() {
               return $this -> salario;
          }

     }
	 
	 
	 //*Se crea el objeto $empleado1 a partir de su número de empleado (3457) y se ejecuta el constructor que realiza las siguientes acciones:
	//*Recupera el sueldo del empleado 3457 de la base de datos y lo almacena en la propiedad $salario.
	//*También almacena el sueldo en la propiedad $salario_inicial para conocer cuál era el salario del empleado cuando se creó el objeto.
	//*Guarda el número de empleado en la propiedad $id.
	//*Se recupera el salario de $empleado1 con el método get_salario, se sube un 10% y se almacena de nuevo en el objeto con el método set_salario.
	//*Volvemos a realizar el paso anterior, incrementando otro 10% el salario del trabajador.
	//*El script finaliza, ejecutando el destructor del objeto $empleado1 que realiza las siguientes acciones:
	//*Comprueba si el salario del empleado se ha modificado durante la vida del objeto.
	//*En caso de haberse modificado, guarda el nuevo salario en la base de datos.
	//*Observa que al realizar el guardado del salario en la base de datos con el destructor, en vez de hacerlo dentro del método set_salario, hemos evitado actualizar dos veces el mismo dato innecesariamente. De esta forma aumentamos la eficiencia del script.

	//*NOTA: Para este ejemplo hemos utilizado un objeto almacenado en  $GLOBALS['conexion'] que realiza todas las peticiones a la base de datos.

?>