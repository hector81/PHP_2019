<?php
	//definimos una constante que nos diga la ubicacion de la plantilla
	define('PLANTILLAS_UBICACION','C:\\xampp\\htdocs\\prueba\\plantilla2\\');
	class plantillas{
		//propiedades
		private $variables;
		//metodos
		public function generarPlantillas($plantilla){
			//obtener html plantillas + UBICACION
			$html = file_get_contents(PLANTILLAS_UBICACION . $plantilla);
			//aqui recuperamos head y footer
			$html = $this ->incluir($html);
			
			
			
			//RECORREMOS las variables
			foreach($this -> variables as $nombre => $valor){
				///reemplazamos en html
				$html = str_replace('###' . $nombre . '###',$valor,$html);
			}
			//mostramos por pantalla
			echo $html;
		}
		
		public function asignarResultado($variable, $valor){
			$this -> variables[$variable] = $valor;
		}
		
		public function incluir($html){
			//buscamos por posicion de caracteres
			$posicion = strpos($html,'@@@');
			while($posicion !== false){
				//captuuramos posicion con nombre de html
				$posicion2 = strpos($html,'@@@',$posicion + 3);
				$plantilla = substr($html,$posicion + 3,$posicion2 + $posicion - 3);
				//recuperamos html de la plantilla
				$html_plantilla = file_get_contents(PLANTILLAS_UBICACION . $plantilla);
				$html = str_replace('###' . $plantilla . '###',$html_plantilla,$html);
			}//fin while
			
			return $html;
		}
	}
?>
