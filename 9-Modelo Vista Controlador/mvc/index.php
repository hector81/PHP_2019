<?php

	//archivo externo
	include('config.php');
	
	if($_GET['pantalla'] == ''){
		$controlador = 'inicio';//si no hay resultados va a inicio
	}else{
		//si hay resultados busca en array la pagina correspondiente
		foreach($lista_controladores as $pantalla => $controlador_actual){
			if(strpos($_GET['pantalla'],$pantalla) === 0){//busca posicion
				$controlador = $controlador_actual;
				$url_adicional = substr($_GET['pantalla'],strlen($pantalla));
			}
		}
		if($controlador == ''){//si  no hay controladoren el array da el error 404
			$controlador = 'ERROR 404';
		}
		
	}
	//incluir el controlador adecuador para que la peticion del usuario llegue al controlador
	include("controller/$controlador");
	
	
?>
			