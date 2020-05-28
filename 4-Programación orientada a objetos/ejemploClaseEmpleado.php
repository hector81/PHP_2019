<?php
     $empleado1 = new empleado();
     $empleado1 -> set_salario(1200);
     echo $empleado1 -> get_salario() . '<br>';
     $empleado1 -> set_salario(800);//no lo cogera porque es menor que 900
     echo $empleado1 -> get_salario() . '<br>';

     class empleado {

          public $salario;

          public function set_salario($valor) {
               if ($this -> validar_aumento($valor)) {
                    $this -> salario = $valor;
               }
          }

          public function get_salario() {
               return $this -> salario;
          }

          public function validar_aumento($valor) {
               if ($valor < 900) {
                    return false;
               } else {
                    return true;
               }
          }

     }
	 
	 
?>