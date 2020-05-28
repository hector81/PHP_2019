<?php

     $empleado1 = new empleado();
     $empleado1 -> set_salario(1800); // No puedo usar $salario, uso set_salario()
     echo $empleado1 -> get_salario();

     class empleado {

          private $salario;

          public function set_salario($valor) {
               if ($this -> validar_aumento($valor)) {
                    $this -> salario = $valor;
               }
          }

          public function get_salario() {
               return $this -> salario;
          }

          private function validar_aumento($valor) {
               if ($valor < 900) {
                    return false;
               } else {
                    return true;
               }
          }

     }

?>