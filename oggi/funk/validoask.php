<?php
session_start();
	

	$_trivia=$_POST['id_triv'];
	

	

	require '../autoload.php';

	$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
	$respuesta = new Respuesta($base);

    $_usuario=$_SESSION['nrodoc_vnddor'];

	if (isset($_GET['que']))
	{
		if ($_GET['que']=='shh') 
		{
			$respuestaOK = $respuesta->deleteRespuesta($_trivia,$_usuario);
			$_donde="index.php";	
		}
	}
	else
	{
    
    	if (!isset($_POST['id_opc']))
    		{
    			$_donde="trivia.php?id_tr=$_trivia";
    		}
    	else
    		{
			    $_opcion=$_POST['id_opc'];
			    $_id_ask=$_POST['id_ask'];

				$respuestaOK = $respuesta->insertRespuesta($_opcion,$_usuario,$_trivia,$_id_ask);
				$_donde="trivia.php?id_tr=$_trivia";
			}
	}
	

	echo "<script language=Javascript> location.href=\"../$_donde\"; </script>";

	exit;
?>