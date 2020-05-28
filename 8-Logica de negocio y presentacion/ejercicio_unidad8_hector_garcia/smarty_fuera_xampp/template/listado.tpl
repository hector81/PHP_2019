{config_load file='textos.conf' section=$idioma}
<!DOCTYPE html>
<html>
	<head>
		<title>{#titulo#}</title>
		<link href="estilos.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="main">
			{include file='cabecera.tpl'}
			<div id="contenido">
				<h2>{#Productos#}</h2>
				<div class="c_cabecera">
					<div class="c_col_ed1">
						{#Producto#}
					</div>
				</div>	
				{**  
					Esto es un bucle con los productos
				**}
				{foreach from=$productos item=$producto}
				<a class="c_linea" href="ficha.php?id={$producto.id}" title="{$producto.nombre|htmlentities}">
					<div class="c_col_ed1">
						{$producto.nombre|htmlentities}
					</div>
					<div class="c_col5">
						<form method="post" action="index.php">
						<input type="hidden" name="id" value="{$producto.id}">
						<input type="hidden" name="acc" value="eliminar">
						<button type="submit">{#ELIMINAR#}</button>
						</form>
					</div>
				</a>
				{/foreach}
				{**
					Esto es el fin del bucle con los productos
				**}
				<form method="post" action="ficha.php" class="botonera">
				<button type="submit">{#INSERTAR#}</button>
				</form>
			</div>
		</div>
	</body>
</html>