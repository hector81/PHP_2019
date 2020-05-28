<?php
/* Smarty version 3.1.33, created on 2019-07-22 16:44:37
  from 'C:\xampp\smarty_fuera_xampp\template\foreach.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d35cbd5ca86c5_23337398',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1ef70b4cd68f34372950ade49a47e8e1043d931b' => 
    array (
      0 => 'C:\\xampp\\smarty_fuera_xampp\\template\\foreach.tpl',
      1 => 1563806518,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d35cbd5ca86c5_23337398 (Smarty_Internal_Template $_smarty_tpl) {
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
