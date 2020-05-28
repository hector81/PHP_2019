<?php

		$objeto1 = new mi_clase();
		$objeto2 = new mi_clase();
		$objeto1 :: $valor = 78;//esto cambiaria todos los valores en la clase
		echo $objeto2 :: $valor;

		class mi_clase {
			
			public static $valor;

		}

?>