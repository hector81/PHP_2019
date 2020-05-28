<?php
/* Smarty version 3.1.33, created on 2019-07-22 17:27:31
  from 'C:\xampp\smarty_fuera_xampp\template\idiomas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d35d5e328ce20_13684844',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '95a600ebe4633dd785344574a11931b5925ae784' => 
    array (
      0 => 'C:\\xampp\\smarty_fuera_xampp\\template\\idiomas.tpl',
      1 => 1563809249,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:cabecera_idiomas.tpl' => 1,
    'file:pie_idiomas.tpl' => 1,
  ),
),false)) {
function content_5d35d5e328ce20_13684844 (Smarty_Internal_Template $_smarty_tpl) {
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
		<h2><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'id_texto1');?>
</h2><br>
		<p><?php echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'id_texto2');?>
</p>
	 </main>
	 <?php $_smarty_tpl->_subTemplateRender("file:pie_idiomas.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</body>
</html><?php }
}
