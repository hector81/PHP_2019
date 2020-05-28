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
				<h2>{#ficha#}</h2>
				<form method="post" action="index.php">
				{if $insertar}
					<input type="hidden" name="acc" value="insertar_producto">
				{else}		
				<input type="hidden" name="id" value="{$producto.id}">
				<input type="hidden" name="acc" value="modificar_producto">
				{/if}
				{$producto.id}
				{$producto.nombre|htmlentities}
				<label class="etiqueta" for="nombre">{#Nombre#}</label>
				<div class="campo"><input type="text" name="nombre" id="nombre" value="{$producto.nombre|htmlentities}"></div>
				<label class="etiqueta" for="precio">{#Precio#}</label>
				<div class="campo"><input type="text" name="precio" id="precio" value="{$producto.precio|number_format:2:',':'.'}"></div>
				<div class="botonera"><button type="submit">{#Guardar#}</button></div>
				</form>
			</div>
		</div>
	</body>
</html>
			

