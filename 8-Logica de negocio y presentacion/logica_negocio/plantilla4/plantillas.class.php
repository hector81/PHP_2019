<?php
	//definimos una constante que nos diga la ubicacion de la plantilla
	define('PLANTILLAS_UBICACION','C:\\xampp\\htdocs\\prueba\\plantilla4\\');
	class plantillas{
		//propiedades
		private $variables;
		private $marrays;
		private $idioma;
		
		//constructor
		public function __construct($idioma){
			$this -> idioma = $idioma;
		}
		
		//metodos
		public function generarPlantillas($plantilla){
			//obtener html plantillas + UBICACION
			$html = file_get_contents(PLANTILLAS_UBICACION . $plantilla);
			//aqui recuperamos head y footer
			$html = $this ->incluir($html);
			$html = $this ->idiomas($html);
			$html = $this ->incluir_arrays($html);
			
			
			//RECORREMOS las variables
			foreach($this -> variables as $nombre => $valor){
				///reemplazamos en html
				$html = str_replace('###' . $nombre . '###',$valor,$html);
			}
			//mostramos por pantalla
			echo $html;
		}//fin funcion
		
		public function asignarResultado($variable, $valor){
			$this -> variables[$variable] = $valor;
		}//fin funcion
		
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
		}//fin funcion
		
		public function asignar_array($variable, $valor){
			$this -> marrays[$variable] = $valor;
		}//fin funcion 
		
		public function incluir_arrays($html){
			//buscamos por posicion de caracteres
			$posicion = strpos($html,'$$$');
			while($posicion !== false){
				//captuuramos posicion con nombre de html
				$posicion2 = strpos($html,'$$$',$posicion + 3);
				$marrays = substr($html,$posicion + 3,$posicion2 - $posicion - 3);
				$posicion3 = strpos($html,'$$$/' . $marrays . '$$$',$posicion2);
				//recuperamos html de la plantilla
				$bloque_repetir = substr($html,$posicion2 + 3,$posicion3 - $posicion2 - 3);
				//recorremos array
				$bloque_final = '';
				for($i = 0;$i < count($this -> marrays[$marrays]);$i++){
					$bloque_repetir_temp = $bloque_repetir;
					foreach($this -> marrays[$marrays][$i] as $nombre = $valor){
						$bloque_repetir_temp = str_replace('#$#' . $nombre . '#$#', $valor, $bloque_repetir_temp);
					}
					$bloque_final .= $bloque_repetir_temp;
				}
				$html_izq = substr($html,0,$posicion);
				$html_der = substr($html,$posicion3 + strlen($marrays) + 7);
				$html = $html_izq . $bloque_final . $html_der;
				//echo $html_izq;
				//exit();
			}//fin while
			
			return $html;
		}//fin funcion
		
		private function idiomas($html){
			//recuperar archivos idiomas
			$recursos = explode("\n",file_get_contents(PLANTILLAS_UBICACION, 'textos_' . $this -> idioma . '.txt'));
			//separacion entre valor y nombre
			for($i = 0;$i < count($recursos);$i++){
				$temporal = explode(';',$recursos[$i],2);
				$textos[$temporal[0]] = $temporal[1];
			}
			foreach($textos as $nombre = $valor){
				$html = str_replace('***' . $nombre . '***',$valor,$html);
			}
			//echo $recursos;
			//echo '<pre>';
			//print_r($recursos);
			//echo '</pre>';
			//exit();
			return $html;
		}//fin funcion
		
	}//fin clase
?>
