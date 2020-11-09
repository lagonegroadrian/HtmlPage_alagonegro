<?php

session_start();

require '../autoload.php';
	
$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
$post = new Post($base);


if (isset($_POST['id_po']))
{
	$_id_post=$_POST['id_po'];

	if (!empty($_id_post))
	{
	$idPost=$_POST['id_po'];
	$estado=$_POST['activo'];

	$postOKid = $post->updatePost($idPost,$estado);
	echo "<script language=Javascript> location.href=\"../abm_post.php\"; </script>";
	exit();
	}
}

$_location='post';
$_user=$_POST['use'];
$_tit=$_POST['tit'];
$_testo=$_POST['testo'];

if(!empty($_FILES["imag1"]))
{
	$imagen = $_FILES["imag1"];    
    if(empty($imagen["type"]) || $imagen["type"] != "image/png")
    {   
    	$_SESSION["estado"] = "error";
    	$_SESSION["error"] = "format";
        header("location:../index.php?page=ad&msj=s");
        die();
    }

    if (!file_exists("../$_location")){mkdir("../$_location");}

    $postOKid = $post->getLastPost();
    $_imag=$postOKid[0]['ultimoid'];

    mkdir("../$_location/$_imag");

    move_uploaded_file($imagen["tmp_name"],"../$_location/$_imag/$_imag.png");

    $postOK = $post->insertPost($_user,$_tit,$_testo,$_imag);
?>
	    <script>		
        function myFunction() {alert("Post Generado Satisfactoriamente");}		
        </script>
<?php
	}

    echo "<script language=Javascript> location.href=\"../abm_post.php\"; </script>";
    exit();
?>