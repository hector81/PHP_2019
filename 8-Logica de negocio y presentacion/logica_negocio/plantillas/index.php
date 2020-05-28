<?php
	define('POSICION',50);
	define('IDIOMA','en');
	$i = 2;
	$k = 0;
	while ($k <= POSICION) {
		$es_primo = true;
		$j = 2;
		while (($j < $i) && ($es_primo)) {
			if ($i % $j == 0) {
				$es_primo = false;
			}
			$j++;
		}
		if ($es_primo) {
			$solucion[$k]['primo'] = $i;
			$k++;
		}
		$i++;
	}
	include('plantillas.class.php');
	$motor_plantillas = new plantillas(IDIOMA);
	$motor_plantillas -> asignar('posicion',POSICION);
	$motor_plantillas -> asignar_array('solucion',$solucion);
	$motor_plantillas -> generar('primos.html');
?>