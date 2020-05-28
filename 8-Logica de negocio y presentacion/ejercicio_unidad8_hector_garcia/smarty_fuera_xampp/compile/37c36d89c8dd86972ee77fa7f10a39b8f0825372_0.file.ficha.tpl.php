<?php
/* Smarty version 3.1.33, created on 2019-07-25 16:15:47
  from 'C:\xampp\smarty\template\ficha.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d39b993243d59_92542102',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '37c36d89c8dd86972ee77fa7f10a39b8f0825372' => 
    array (
      0 => 'C:\\xampp\\smarty\\template\\ficha.tpl',
      1 => 1564064135,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:cabecera.tpl' => 1,
  ),
),false)) {
function content_5d39b993243d59_92542102 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, 'textos.conf', $_smarty_tpl->tpl_vars['idioma']->value, 0);
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'titulo');?>
</title>
		<link href="estilos.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<div id="main">
			<?php $_smarty_tpl->_subTemplateRender('file:cabecera.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
			<div id="contenido">
				<h2><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'ficha');?>
</h2>
				<form method="post" action="index.php">
				<?php if ($_smarty_tpl->tpl_vars['insertar']->value) {?>
					<input type="hidden" name="acc" value="insertar_producto">
				<?php } else { ?>		
				<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['producto']->value['id'];?>
">
				<input type="hidden" name="acc" value="modificar_producto">
				<?php }?>
				<?php echo $_smarty_tpl->tpl_vars['producto']->value['id'];?>

				<?php echo htmlentities($_smarty_tpl->tpl_vars['producto']->value['nombre']);?>

				<label class="etiqueta" for="nombre"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'Nombre');?>
</label>
				<div class="campo"><input type="text" name="nombre" id="nombre" value="<?php echo htmlentities($_smarty_tpl->tpl_vars['producto']->value['nombre']);?>
"></div>
				<label class="etiqueta" for="precio"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'Precio');?>
</label>
				<div class="campo"><input type="text" name="precio" id="precio" value="<?php echo number_format($_smarty_tpl->tpl_vars['producto']->value['precio'],2,',','.');?>
"></div>
				<div class="botonera"><button type="submit"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'Guardar');?>
</button></div>
				</form>
			</div>
		</div>
	</body>
</html>
			

<?php }
}
