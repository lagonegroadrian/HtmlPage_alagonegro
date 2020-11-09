<?php


/*	1.Administrador
	2.Comercial
	3.Director 
	4.Gerente 
	5.Marketing 
	6.Usuario dado de baja
	7.Capacitador	*/

$admin = array('index.php', 'abm_user.php','documentos.php','abm_trivia.php','abm_pregunta.php','abm_opcion.php', 'repo_trivia.php','logout.php','abm_opcion.php','abm_post');

$comer = array('index.php', 'documentos.php','logout.php');

$direc = array('index.php', 'documentos.php','logout.php','repo_trivia.php');

$geren = array('index.php', 'documentos.php','logout.php');

$marke = array('index.php', 'documentos.php', 'logout.php','logout.php','abm_post');

$capac = array('index.php', 'documentos.php','abm_trivia.php','abm_pregunta.php','abm_opcion.php', 'repo_trivia.php','logout.php','abm_opcion.php','logout.php','abm_post');

// if ($_SESSION['id_pe'] !== 1 ){echo '<script type="text/javascript">window.location="login.php";</script>';}

?>