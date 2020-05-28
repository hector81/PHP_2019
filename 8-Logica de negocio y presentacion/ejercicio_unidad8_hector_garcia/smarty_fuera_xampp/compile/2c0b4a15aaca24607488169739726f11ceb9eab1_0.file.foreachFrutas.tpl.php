<?php
/* Smarty version 3.1.33, created on 2019-07-22 17:02:35
  from 'C:\xampp\smarty_fuera_xampp\template\foreachFrutas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d35d00b4a39f3_62173154',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2c0b4a15aaca24607488169739726f11ceb9eab1' => 
    array (
      0 => 'C:\\xampp\\smarty_fuera_xampp\\template\\foreachFrutas.tpl',
      1 => 1563807750,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:cabecera.tpl' => 1,
    'file:pie.tpl' => 1,
  ),
),false)) {
function content_5d35d00b4a39f3_62173154 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
     <title>Hola mundo</title>
</head>
<body>
     <?php $_smarty_tpl->_subTemplateRender("file:cabecera.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
     <main>
	 <?php
$_smarty_tpl->tpl_vars['__smarty_section_prueba'] = new Smarty_Variable(array());
if (true) {
for ($__section_prueba_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_prueba']->value['index'] = 0; $__section_prueba_0_iteration <= 3; $__section_prueba_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_prueba']->value['index']++){
?>
		<ul>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['frutas']->value, 'fruta', false, 'clave');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['clave']->value => $_smarty_tpl->tpl_vars['fruta']->value) {
?>
			<li><?php echo $_smarty_tpl->tpl_vars['fruta']->value;?>
</li>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ul>
	 <?php
}
}
?>
	 </main>
	 <?php $_smarty_tpl->_subTemplateRender("file:pie.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</body>
</html><?php }
}
