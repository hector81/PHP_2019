<?php
/* Smarty version 3.1.33, created on 2019-07-25 16:17:37
  from 'C:\xampp\smarty\template\listado.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d39ba01828fc3_77939494',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b9b0de67f27650d03c2ba8e96bfdd87822e8f3dc' => 
    array (
      0 => 'C:\\xampp\\smarty\\template\\listado.tpl',
      1 => 1564064241,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:cabecera.tpl' => 1,
  ),
),false)) {
function content_5d39ba01828fc3_77939494 (Smarty_Internal_Template $_smarty_tpl) {
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
				<h2><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'Productos');?>
</h2>
				<div class="c_cabecera">
					<div class="c_col_ed1">
						<?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'Producto');?>

					</div>
				</div>	
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productos']->value, 'producto');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['producto']->value) {
?>
				<a class="c_linea" href="ficha.php?id=<?php echo $_smarty_tpl->tpl_vars['producto']->value['id'];?>
" title="<?php echo htmlentities($_smarty_tpl->tpl_vars['producto']->value['nombre']);?>
">
					<div class="c_col_ed1">
						<?php echo htmlentities($_smarty_tpl->tpl_vars['producto']->value['nombre']);?>

					</div>
					<div class="c_col5">
						<form method="post" action="index.php">
						<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['producto']->value['id'];?>
">
						<input type="hidden" name="acc" value="eliminar">
						<button type="submit"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'ELIMINAR');?>
</button>
						</form>
					</div>
				</a>
				<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
								<form method="post" action="ficha.php" class="botonera">
				<button type="submit"><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'INSERTAR');?>
</button>
				</form>
			</div>
		</div>
	</body>
</html><?php }
}
