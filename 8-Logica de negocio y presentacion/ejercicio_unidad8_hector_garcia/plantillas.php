<?php
	include('smarty/libs/Smarty.class.php');//smarty dentro xampp
	$smarty = new Smarty();//generamos un objeto de Smarty
	$smarty -> template_dir = 'C:\\xampp\\smarty\\template\\';//// smarty fuera xampp
	//concretamos los directorios y donde estan//RUTA_TEMPLATE // archivos tendrán extensión .tpl
	$smarty -> config_dir = 'C:\\xampp\\smarty\\config\\';//RUTA_CONFIG //smarty fuera xampp
	$smarty -> compile_dir = 'C:\\xampp\\smarty\\compile\\';//RUTA_COMPILE //smarty fuera xampp
	$smarty -> cache_dir = 'C:\\xampp\\smarty\\cache\\'; //RUTA_COMPILE // smarty fuera xampp
	
	
	
	
?>