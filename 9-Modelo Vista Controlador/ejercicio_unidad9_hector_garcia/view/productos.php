<?php
//clase
	class view_productos {
		//propiedades
		 
		//metodos
		public function cabecera() {
			?>
				<header class="privada">
					<h1>Área privada de Tienda online</h1>
				</header>
			<?php
		}

		 //metodo para mostrar e insertar datos
		 public function mostrar_insertar() {
			$this -> pantalla_edicion('insertar'); 
		 }
		 //metodo para mostrar e editar datos
		 public function mostrar_editar($datos) {
			 $this -> pantalla_edicion('editar',$datos);
		 }
		 
		 //para editar y pasar por parametro lo que queremos hacer
		 private function pantalla_edicion($modo,$datos='') {
			 if($datos == ''){//para que por defecto en insertar salga el nombre del producto vacio y el precio igual a 0
				unset($datos);
				$datos['nombre'] = '';
				$datos['precio'] = 0;
			 }
			 ?>
			 <!DOCTYPE html>
				<html>
					<head>
						<title>Área privada de Tienda online</title>
						<link href="/ejercicio_unidad9_hector_garcia/css/estilos.css" rel="stylesheet" type="text/css">
					</head>
					<body>
						<div id="main">
				<?php
					$this -> cabecera();
				?>
							<div id="contenido">
								<h2>Ficha de producto</h2>
								<form method="post" action="http://localhost:8080/ejercicio_unidad9_hector_garcia/">
				<?php
					if ($modo == 'insertar') {
				?>
								<input type="hidden" name="acc" value="insertar_producto">
				<?php
					} else {
				?>
								<input type="hidden" name="id" value="<?php echo (int)$datos['id']; ?>">
								<input type="hidden" name="acc" value="modificar_producto">
				<?php
					}
				?>
								<label class="etiqueta" for="nombre">Nombre</label>
								<div class="campo"><input type="text" name="nombre" id="nombre" value="<?php echo htmlentities($datos['nombre']); ?>"></div>
								<label class="etiqueta" for="precio">Precio</label>
								<div class="campo"><input type="text" name="precio" id="precio" value="<?php echo number_format($datos['precio'],2,',','.'); ?>"></div>
								<div class="botonera"><button type="submit">Guardar</button></div>
								</form>
							</div>
						</div>
					</body>
				</html>
		<?php
		}//function pantalla_edicion

		//metodo para mostrar html datos
		 public function mostrar_listado($datos) {
			?>
				<!DOCTYPE html>
				<html>
				<head>
					<title>Área privada de Tienda online</title>
					<link href="/ejercicio_unidad9_hector_garcia/css/estilos.css" rel="stylesheet" type="text/css">
				</head>
				<body>
					<div id="main">
			<?php
				$this -> cabecera();
			?>
			<?php
				for($i = 0;$i<count($datos);$i++){
			?>	
				<a class="c_linea" href="http://localhost:8080/ejercicio_unidad9_hector_garcia/?id=<?php echo $datos[$i]['id']; ?>" title="<?php echo htmlentities($datos[$i]['nombre']); ?>">
					<div class="c_col_ed1">
						<?php echo htmlentities($datos[$i]['nombre']); ?>
					</div>
					<div class="c_col5">
						<form method="post" action="http://localhost:8080/ejercicio_unidad9_hector_garcia/">
						<input type="hidden" name="id" value="<?php echo $datos[$i]['id']; ?>">
						<input type="hidden" name="acc" value="eliminar">
						<button type="submit">Eliminar</button>
						</form>
					</div>
				</a>
			<?php
		
				}//fin for
			?>
					<form method="post" action="http://localhost:8080/ejercicio_unidad9_hector_garcia/?acc=insertar" class="botonera">
						<button type="submit">Insertar nuevo producto</button>
					</form>
				</body>
				</html>	
			<?php
		}//fin funcion mostrar

	}

?>


		