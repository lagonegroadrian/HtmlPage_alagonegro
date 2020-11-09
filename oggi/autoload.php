<?php
function __autoload($nombreclase){
	require ('clases/'.$nombreclase.'.php');
}
require ('define.php');
?>



<?php
//spl_autoload_register(function($nombreclase) {
//    include 'classes/'.$nombreclase.'.php';
//});
////require ('define.php');
?>
