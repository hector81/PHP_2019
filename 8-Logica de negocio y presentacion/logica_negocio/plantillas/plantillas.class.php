<?php

	define('PLANTILLAS_UBICACION','C:\\xampp\\htdocs\\plantillas\\plantillas\\');

	class plantillas {
		
		private $variables;
		private $marrays;
		private $idioma;
		
		public function __construct($idioma) {
			$this -> idioma = $idioma;
		}
		
		public function generar($plantilla) {
			$html = file_get_contents(PLANTILLAS_UBICACION . $plantilla);
			$html = $this -> incluir($html);
			$html = $this -> idiomas($html);
			$html = $this -> incluir_arrays($html);
			foreach($this -> variables as $nombre => $valor) {
				$html = str_replace('###' . $nombre . '###',$valor,$html);
			}
			echo $html;
		}
		
		public function asignar($variable,$valor) {
			$this -> variables[$variable] = $valor;
		}
		
		public function asignar_array($variable,$valor) {
			$this -> marrays[$variable] = $valor;
		}
		
		private function idiomas($html) {
			$recursos = explode("\n",file_get_contents(PLANTILLAS_UBICACION . 'textos_' . $this -> idioma . '.txt'));
			for ($i=0;$i<count($recursos);$i++) {
				$temporal = explode(';',$recursos[$i],2);
				$textos[$temporal[0]] = $temporal[1];
			}
			foreach($textos as $nombre => $valor) {
				$html = str_replace('***' . $nombre . '***',$valor,$html);
			}
			return $html;
		}
		
		private function incluir($html) {
			$posicion = strpos($html,'@@@');
			while ($posicion !== false) {
				$posicion2 = strpos($html,'@@@',$posicion + 3);
				$plantilla = substr($html,$posicion+3,$posicion2 - $posicion - 3);
				$html_plantilla = file_get_contents(PLANTILLAS_UBICACION . $plantilla);
				$html = str_replace('@@@' . $plantilla . '@@@',$html_plantilla,$html);
				$posicion = strpos($html,'@@@');
			}
			return $html;
		}
		
		private function incluir_arrays($html) {
			$posicion = strpos($html,'$$$');
			while ($posicion !== false) {
				$posicion2 = strpos($html,'$$$',$posicion + 3);
				$marray = substr($html,$posicion+3,$posicion2 - $posicion - 3);
				$posicion3 = strpos($html,'$$$/' . $marray . '$$$',$posicion2);
				$bloque_repetir = substr($html,$posicion2+3,$posicion3 - $posicion2 - 3);
				$bloque_final = '';
				for ($i=0;$i<count($this -> marrays[$marray]);$i++) {
					$bloque_repetir_temp = $bloque_repetir;
					foreach ($this -> marrays[$marray][$i] as $nombre => $valor) {
						$bloque_repetir_temp = str_replace('#$#' . $nombre . '#$#',$valor,$bloque_repetir_temp);
					}
					$bloque_final .= $bloque_repetir_temp;
				}
				$html_izq = substr($html,0,$posicion);
				$html_der = substr($html,$posicion3 + strlen($marray) + 7);
				$html = $html_izq . $bloque_final . $html_der;				
				$posicion = strpos($html,'$$$');
			}
			return $html;
		}
		
	}

?>