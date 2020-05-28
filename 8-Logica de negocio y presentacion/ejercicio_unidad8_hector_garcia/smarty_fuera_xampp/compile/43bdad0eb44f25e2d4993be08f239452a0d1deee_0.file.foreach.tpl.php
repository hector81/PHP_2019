<?php
/* Smarty version 3.1.33, created on 2019-07-22 23:21:19
  from 'C:\xampp\smarty\template\foreach.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d3628cfd05764_89602070',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '43bdad0eb44f25e2d4993be08f239452a0d1deee' => 
    array (
      0 => 'C:\\xampp\\smarty\\template\\foreach.tpl',
      1 => 1563806518,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d3628cfd05764_89602070 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
     <title>Hola mundo</title>
</head>
<body>
     <table>
     <tr>
          <th>Nombre</th>
          <th>Apellidos</th>
          <th>Edad</th>
     </tr>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['clientes']->value, 'persona');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['persona']->value) {
?>
     <tr>
          <td><?php echo $_smarty_tpl->tpl_vars['persona']->value['nombre'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['persona']->value['apellidos'];?>
</td>
          <td><?php echo $_smarty_tpl->tpl_vars['persona']->value['edad'];?>
</td>
     </tr>
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
     </table>
</body>
</html>
<?php }
}
