<?php
	define('POSICION',50);

	$solucion = 0;
	$i = 0;
	while($solucion == 0){
		$es_primo = true;
		$j = 2;
		while($solucio == 0){
			if($i % $j == 0){
				$es_primo = false;
			}//fin if
			$j++;
		}//fin while
		if($es_primo){
			$num_primos++;
			if($num_primos == POSICION){
				$solucion = $i;
			}//fin if
		}//fin if
	}//fin while
	
	
	//llamamos a plantillas
	include('plantillas.class.php');
	$motor_plantillas = new plantillas();
	$motor_plantillas -> asignarResultado('posicion',POSICION);
	$motor_plantillas -> asignarResultado('solucion',$solucion);
	$motor_plantillas -> generarPlantillas('primo.html');
?>
