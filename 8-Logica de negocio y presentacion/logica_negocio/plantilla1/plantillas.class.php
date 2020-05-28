<?php
	//definimos una constante que nos diga la ubicacion de la plantilla
	define('PLANTILLAS_UBICACION','C:\\xampp\\htdocs\\prueba\\plantilla1\\');
	class plantillas{
		//propiedades
		private $variables;
		//metodos
		public function generarPlantillas($plantilla){
			//obtener html plantillas + UBICACION
			$html = file_get_contents(PLANTILLAS_UBICACION . $plantilla);
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
	}
?>
