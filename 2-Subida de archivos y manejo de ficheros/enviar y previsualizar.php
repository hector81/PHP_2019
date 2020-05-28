<!-- Estructura básica de HTML5 con CSS border y background -->
<!DOCTYPE html>
<html lang="es">
 
<head>
	<title>Estructura básica de HTML5</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="Ejercicio1.css">
</head>
 
<body>
	<h1>Estructura básica de HTML5</h1>
	
	<!-- HEADER  -->
    <header>
       <h1 color="white"> &lt header &gt </h1>
    </header>
	
	<!-- NAV -->
	<nav>
	    <h2>&lt nav &gt</h2>
	</nav>
	
	<!-- SECTION 1-->
    <section id="contenedor">
		<!-- SECTION 2-->
		<section id="principal">
		<h2>&lt Mi section &gt<h2>
		
		<form method="post" action="index.php" enctype="multipart/form-data">
			<input type="file" name="archivo"><br>
			<button type="submit">Enviar</button>
		</form>
		
		<?php
		//	Array
		//		(
		//			[archivo1] => Array
		//				(
		//					[name] => factura.pdf
		//					[type] => application/pdf
		//					[tmp_name] => C:\xampp\tmp\php6851.tmp
		//					[error] => 0
		//					[size] => 4386
		//				)
		//		)
				
		//		action="index.php"
				
		//		move_uploaded_file($_FILES['nombre_campo']['tmp_name'],ruta_destino);
				
				
		?>
		
		<pre>
			<?php
				print_r($_FILES);
			?>
		</pre>
			<!-- ARTICLE -->
		    <article>
			   <h2>&lt article &gt<h2>
		    </article>
		</section>
		<!-- ASIDE -->
		<aside>
			<h2>&lt aside &gt<h2>
		</aside>
    </section>
	
	
	
	<!-- FOOTER -->
    <footer>
        <h2>&lt footer &gt<h2>
    </footer>
</body>
</html>