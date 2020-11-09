<?php
	
	$_pagina="userup";

	if ((!isset($_POST['nrodoc_vnddor'])) || (!isset($_POST['name_vnddor'])) || (!isset($_POST['apellido_vnddor'])) || (!isset($_POST['user_vnddor'])) || (!isset($_POST['senha_vnddor'])) || (!isset($_POST['tipouser_vnddor']))		||	(!isset($_POST['avatar_vnddor']))	)
	{
		echo "<script language=Javascript> location.href=\"../$_pagina.php?msj=0\"; </script>";// completar todos los campos
		exit();
	}

	$nrodoc_vnddor      = $_POST['nrodoc_vnddor'];
	$name_vnddor        = $_POST['name_vnddor'];
	$apellido_vnddor    = $_POST['apellido_vnddor'];
	$user_vnddor        = $_POST['user_vnddor'];
	$senha_vnddor       = $_POST['senha_vnddor'];
	$senha_vnddor       = password_hash($senha_vnddor, PASSWORD_DEFAULT); // Creates a password hash
	$tipouser_vnddor    = $_POST['tipouser_vnddor'];
	$avatar_vnddor    	= $_POST['avatar_vnddor'];
	$cumple_vmddor		= $_POST['cumple_vmddor'];
	$nrodoc_vnddor = $nrodoc_vnddor*1;

	if (!empty($_POST['creado_vnddor']))
	{ 
		$_creado_vnddor=$_POST['creado_vnddor']; 
		$_pagina="abm_user";
	}
	
	require '../autoload.php';

	$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
	$usuario = new Usuario($base);

	// si no existe el usuario =Array([0] => Array([cant] => 0 ))
	// si    existe el usuario =Array([0] => Array([cant] => 1 ))

	if (isset($_creado_vnddor))
	{		
		$usuarioInsert = $usuario->updateUsuario($nrodoc_vnddor,$name_vnddor,$apellido_vnddor,$user_vnddor,$senha_vnddor,$tipouser_vnddor,$gerente_vnddor,$avatar_vnddor);
		$_msj_=99;// usuario modificador satisfactoriamente
	}
	else
	{
		$usuarioExiste = $usuario->existeUser($user_vnddor,$nrodoc_vnddor);
		$_pagina="userup";

		if (!$usuarioExiste[0]['cant'] == '0')
		{
			$_msj_=1;//usuario ya existe
		}
		else
		{
			$usuarioInsert = $usuario->insertUsuario($nrodoc_vnddor,$name_vnddor,$apellido_vnddor,$user_vnddor,$senha_vnddor,$tipouser_vnddor,$cumple_vmddor,$avatar_vnddor);
			$_msj_=99;// usuario insertado satisfactoriamente
		}
	}

	echo "<script language=Javascript> location.href=\"../$_pagina.php?msj=$_msj_\"; </script>";

	exit();
?>