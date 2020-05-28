<?php

     $objeto = new clase_hija();
     $objeto -> metodo();

     class clase_padre {

          public function metodo() {
               echo 'Método principal<br>';
          }

     }

     class clase_hija extends clase_padre {

          public function metodo() {
               parent :: metodo();//el echo de la clase padre
               echo 'Método sobrescrito<br>';//el echo de la clase hija
          }

     }

?>