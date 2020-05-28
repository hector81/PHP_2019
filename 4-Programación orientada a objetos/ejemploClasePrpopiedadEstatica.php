<?php

		mi_clase :: $nombre = 'Juan';
		$objeto1 = new mi_clase();
		$objeto2 = new mi_clase();
		$objeto1 -> mostrar_nombre();
		echo '<br>';
		$objeto2 -> mostrar_nombre();

		class mi_clase {

			 public static $nombre;

			 public function mostrar_nombre() {
				  echo mi_clase :: $nombre;
			 }

		}

?>