<?php
/* Smarty version 3.1.33, created on 2019-07-21 22:10:09
  from 'C:\xampp\smarty_fuera_xampp\template\plantilla.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d34c6a1626048_50085558',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '79cb7e1a7631ac174db170f8423133fd03a4385e' => 
    array (
      0 => 'C:\\xampp\\smarty_fuera_xampp\\template\\plantilla.tpl',
      1 => 1563739804,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d34c6a1626048_50085558 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
     <title>Primera plantilla</title>
</head>
<body>
	<header>
		<h1>Mi primera plantilla</h1>
	</header>
	<main>
		Contenido de la pagina : <?php echo $_smarty_tpl->tpl_vars['mivariable']->value;?>

	</main>
	<footer>
		Pie de pagina
	</footer>
</body>
</html>
<?php }
}
