<?php

function banshee_autoload($nombreclase){
	require ('clases/'.$nombreclase.'.php');
}
require ('define.php');

spl_autoload_register("banshee_autoload");
?>