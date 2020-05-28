<?php
/* Smarty version 3.1.33, created on 2019-07-22 17:59:59
  from 'C:\xampp\smarty_fuera_xampp\template\funcionalidades.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d35dd7f315c73_77614330',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4cac5ef6e03254eaea81931e5ca91381b9603d44' => 
    array (
      0 => 'C:\\xampp\\smarty_fuera_xampp\\template\\funcionalidades.tpl',
      1 => 1563811197,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:cabecera_idiomas.tpl' => 1,
    'file:pie_idiomas.tpl' => 1,
  ),
),false)) {
function content_5d35dd7f315c73_77614330 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, 'textos.conf', $_smarty_tpl->tpl_vars['idioma']->value, 0);
?>

<!DOCTYPE html>
<html>
<head>
     <title><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'holamundo');?>
</title>
</head>
<body>
     <?php $_smarty_tpl->_subTemplateRender("file:cabecera_idiomas.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
     <main>
				
		<?php $_smarty_tpl->_assignInScope('mivariable', 100);?>
		
		<h2 style="color: red;">Asignar variable</h2><br>
		<p>El valor de la variable es <?php echo $_smarty_tpl->tpl_vars['mivariable']->value;?>
</p><br>
		
		
				
		<?php $_smarty_tpl->_assignInScope('mivariable', $_smarty_tpl->tpl_vars['mivariable']->value+50);?>
		
		<h2 style="color: red;">Sumar 50 a la variable</h2><br>
		<p>El valor de la variable es <?php echo $_smarty_tpl->tpl_vars['mivariable']->value;?>
</p><br>
		
		
				<h2 style="color: red;">Comentarios</h2><br>
		
		
				
		<h2 style="color: red;">Literales</h2><br>
		
		<?php $_smarty_tpl->_assignInScope('mivariable', 45);?>
		
			El valor es: {$mivariable}
		
	
			
		<h2 style="color: red;">Condicionales</h2><br>
		<?php $_smarty_tpl->_assignInScope('mivariable', 100);?>
		<?php if ($_smarty_tpl->tpl_vars['mivariable']->value >= 200) {?>
			La variable es mayor o igual a 200
		<?php } else { ?>
			La variable es menor a 200
		<?php }?>
		
		
			
		<h2 style="color: red;">Funciones</h2><br>
		<?php $_smarty_tpl->_assignInScope('mivariable', 'Murciélago');?>
		
		El animal es: <?php echo htmlentities($_smarty_tpl->tpl_vars['mivariable']->value);?>

		<br>
		<?php $_smarty_tpl->_assignInScope('mivariable', '1587.4');?>
		
		El número es: <?php echo number_format($_smarty_tpl->tpl_vars['mivariable']->value,2,',','.');?>

		
		
	 </main><br>
	 <?php $_smarty_tpl->_subTemplateRender("file:pie_idiomas.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</body>
</html><?php }
}
