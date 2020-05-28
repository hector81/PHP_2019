<?php

     $empleado1 = new empleado();
     $empleado1 -> salario = 800; // Estoy saltándome la validación del salario
     echo $empleado1 -> get_salario();

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