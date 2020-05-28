<?php
//clase
class view_noticias {
	//propiedades
     private $datos;
	//metodo para enviar datos
     public function set_datos($datos) {
          $this -> datos = $datos;
     }
	//metodo para mostrar html datos
     public function mostrar() {
?>
<!DOCTYPE html>
<html>
<head>
     <title>Noticias</title>
</head>
<body>
<?php
          for ($i=0;$i<count($this -> datos);$i++) {
?>
     <h1><?php echo htmlentities($this -> datos[$i]['titular']); ?></h1>
     <div><?php echo htmlentities($this -> datos[$i]['cuerpo']); ?></div>
<?php
          }
?>
</body>
</html>
<?php
     }

}

?>
			