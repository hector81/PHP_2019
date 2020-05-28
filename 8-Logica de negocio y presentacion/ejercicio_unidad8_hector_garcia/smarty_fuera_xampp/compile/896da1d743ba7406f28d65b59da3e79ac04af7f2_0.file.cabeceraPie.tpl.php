<?php
/* Smarty version 3.1.33, created on 2019-07-22 16:36:17
  from 'C:\xampp\smarty_fuera_xampp\template\cabeceraPie.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d35c9e13315a9_14307028',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '896da1d743ba7406f28d65b59da3e79ac04af7f2' => 
    array (
      0 => 'C:\\xampp\\smarty_fuera_xampp\\template\\cabeceraPie.tpl',
      1 => 1563805925,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:cabecera.tpl' => 1,
    'file:pie.tpl' => 1,
  ),
),false)) {
function content_5d35c9e13315a9_14307028 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
     <title>Hola mundo</title>
</head>
<body>
     <?php $_smarty_tpl->_subTemplateRender("file:cabecera.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
     <main>Cuerpo de la página</main>
	 <?php $_smarty_tpl->_subTemplateRender("file:pie.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</body>
</html><?php }
}
