<?php

    session_start();

	$_uname=$_POST['uname'];
	$_psw=$_POST['psw'];

	require '../autoload.php';

	$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
	$usuario = new Usuario($base);
    $perfil  = new Perfil($base);
    
    $_hashpass = password_hash($_psw,PASSWORD_DEFAULT);
	$usuarioOK = $usuario->getUser($_uname,$_psw);
   
    $_page="login.php?mj=er";

    if (!is_bool($usuarioOK))
    {
        $hash=$usuarioOK[0]['senha_vnddor'];

        if(password_verify($_psw,$hash))
        {
            $_SESSION['nrodoc_vnddor']=$usuarioOK[0]['nrodoc_vnddor'];
            $_SESSION['user_vnddor']=$usuarioOK[0]['user_vnddor'];
            $_SESSION['senha_vnddor']=$usuarioOK[0]['senha_vnddor'];
            $_SESSION['name_vnddor']=$usuarioOK[0]['name_vnddor'];
            $_SESSION['apellido_vnddor']=$usuarioOK[0]['apellido_vnddor'];
            $_SESSION['tipouser_vnddor']=$usuarioOK[0]['tipouser_vnddor'];
            //$_SESSION['gerente_vnddor']=$usuarioOK[0]['gerente_vnddor'];
            $_SESSION['nac_vnddor']=$usuarioOK[0]['nac_vnddor'];
            $_SESSION['avatar']=$usuarioOK[0]['avatar'];

            $perfilOK = $perfil->getPerfils2($usuarioOK[0]['tipouser_vnddor']);
            
            if (!isset($perfilOK[0]['txt_pe']))
                 {
                    $_SESSION['txt_perfil']='Roll no especificado';
                    $_SESSION['id_pe']='999';
                }
             else
                {
                    $_SESSION['txt_perfil']=ucfirst(strtolower($perfilOK[0]['txt_pe']));
                    $_SESSION['id_pe']=$perfilOK[0]['id_pe'];
                    
                    if($perfilOK[0]['id_pe'] == 6) // usuario dado de baja
                    {
                        $_page="login.php?mj=er";
                    }
                    else
                    {
                        session_start();
                        $_page="index.php";
                    }
                }

        }
    }

    echo "<script language=Javascript> location.href=\"../$_page\"; </script>";
    exit();
?>