<?php

/*
Validaciones para:
0-valore nulos
1-injection
2-cantidad de caracteres
*/

if( !isset($_GET['username']) || !isset($_GET['password']) ){echo "<h2>Completar todos los campos </h2>";}

$_user = $_GET['username'];
$_pass = $_GET['password'];

require '../autoload.php';

$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
$producto = new Usuario($base);
$datos_user = $producto->getUsuario($_user,$_pass);

if(empty($datos_user))
  {
    echo "<br> alguno de los datos es invalido!!";
  }
else
  {
    session_start();
    $_SESSION["id_usu"] = 112;

    echo "<script language=Javascript> location.href=\"../index_usere.php\"; </script>";
    exit();    
  }

?>