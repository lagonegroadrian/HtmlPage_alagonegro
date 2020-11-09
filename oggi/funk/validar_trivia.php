<?php

	session_start();

	if (!isset($_GET['q'])){echo "<script language=Javascript> location.href=\"../index.php\"; </script>";	}

	require '../autoload.php';

	$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);

	if ($_GET['q'] == 'tri')
	{
		$_trivia=$_POST['titulo'];
		$_fenic=$_POST['fechainicio'];
		$_fefin=$_POST['fechafin'];

		$_perfil = implode(",", $_POST['perfil']);

		$trivia = new Trivia($base);
		$triviaOK = $trivia->insertTrivia($_trivia,$_fenic,$_fefin,$_perfil);

		if(!empty($_FILES["imag1"]))
		{	

		    $imagen = $_FILES["imag1"];
		    
		    if((isset($imagen["type"])) && (($imagen["type"] == "application/pdf"))) // || $imagen["type"] == "image/png")))
			{
		    if (!file_exists("../trivia/docs/$triviaOK")){	mkdir("../trivia/docs/$triviaOK");	   }
		    if ($imagen["type"] != "image/pdf"){move_uploaded_file($imagen["tmp_name"],"../trivia/docs/$triviaOK/doc_$triviaOK.pdf");}
		    //if ($imagen["type"] != "image/png"){move_uploaded_file($imagen["tmp_name"],"../trivia/docs/$triviaOK/doc_$triviaOK.png");}

		    echo "<script type='text/javascript'>";
    		echo "alert('Trivia generada correctamente')";
    		echo "</script>";

			echo "<script language=Javascript> location.href=\"../abm_pregunta.php\"; </script>";
			exit;
			}
			else
			{	
			echo "<script type='text/javascript'>";
    		echo "alert('Solo se permiten extenciones PDF')";
    		echo "</script>";
			echo "<script language=Javascript> location.href=\"../abm_trivia.php\"; </script>";
			exit;
			}
		}
	}


	if ($_GET['q'] == 'ask')
	{	$_trivia=$_POST['id_trivia'];
		$_pregunta=$_POST['ask'];
		$pregunta = new Pregunta($base);		
		$preguntaOK = $pregunta->insertPregunta($_trivia,$_pregunta);
		echo "<script language=Javascript> location.href=\"../abm_opcion.php\"; </script>";
		exit;
	}


	if ($_GET['q'] == 'opc')
	{	$_trivia=$_POST['id_trivia'];
		$_opcion=$_POST['opcion'];
		$_respuesta=$_POST['respuesta'];
		$opcion = new Opcion($base);		
		$opcionOK = $opcion->insertOpcion($_trivia,$_opcion,$_respuesta);
        //header('Location: ../abm_opcion.php?tr='.$_trivia);
        echo "<script language=Javascript> location.href=\"../abm_opcion.php\"; </script>";
		exit;
	}



?>