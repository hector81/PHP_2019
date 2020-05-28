<?php
//Uso de public y private
$mi_objeto = new mi_clase();
echo $mi_objeto -> variable_publica; // Correcto
echo $mi_objeto -> variable_privada; // Producirá un error
$mi_objeto -> metodo_publico(); // Correcto
$mi_objeto -> metodo_privado(); // Producirá un error

class mi_clase {

     private $variable_privada;
     public $variable_publica;

     private function metodo_privado() {
          echo $this -> variable_publica; // Correcto
          echo $this -> variable_privada; // Correcto
     }

     public function metodo_publico() {
          echo $this -> variable_publica; // Correcto
          echo $this -> variable_privada; // Correcto
          $this -> metodo_privado(); // Correcto
     }

}
	 
	 
?>