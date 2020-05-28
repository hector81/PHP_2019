<?php

     $objeto = new clase_hija();
     $objeto -> metodo_padre();
     $objeto -> metodo_hija();

     class clase_padre {

          public function metodo_padre() {
               echo 'Se ha ejecutado un método de la clase padre<br>';
          }

     }

     class clase_hija extends clase_padre {

          public function metodo_hija() {
               echo 'Se ha ejecutado un método de la clase hija<br>';
          }

     }

?>