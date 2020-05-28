<?php
/* Smarty version 3.1.33, created on 2019-07-21 22:03:01
  from 'C:\xampp\htdocs\prueba\suma.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d34c4f5cdf828_73149400',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9867543d31315593bc1208082a81ea9e17c1d631' => 
    array (
      0 => 'C:\\xampp\\htdocs\\prueba\\suma.tpl',
      1 => 1563739168,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d34c4f5cdf828_73149400 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
     <title>Hola mundo</title>
</head>
<body>
     La suma de <?php echo $_smarty_tpl->tpl_vars['a']->value;?>
 + <?php echo $_smarty_tpl->tpl_vars['b']->value;?>
 es <?php echo $_smarty_tpl->tpl_vars['resultado']->value;?>

</body>
</html><?php }
}
