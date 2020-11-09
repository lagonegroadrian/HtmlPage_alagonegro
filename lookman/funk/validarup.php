<?php

	session_start();

	if (!isset($_GET['val'])) 
		{header('Location: index.php'); 	exit();	}
	
	$_where=$_GET['val'];

	if ($_where == 'contacto') 
	{
		$_par=$_GET['val'];
		$_nom=$_POST['nombre'];
		$_ema=$_POST['email'];
		$_tel=$_POST['telefono'];
	    $_are=$_POST['area'];
	    $_com=$_POST['Comentario'];

	    if (empty($_nom) || empty($_ema) || (empty($_tel) && !is_numeric($_tel)) || empty($_are) || empty($_com)  )
	    {	    
			$_SESSION["_nom"] = $_nom;
		    $_SESSION["_ema"] = $_ema;
		    $_SESSION["_tel"] = $_tel;
		    $_SESSION["_are"] = $_are;
		    $_SESSION["_ema"] = $_ema;
		    header('Location: ../contacto.php?er=1');
			exit();
	    }
	}

	if (($_where == 'registro') || ($_where == 'ingreso') || ($_where == 'comen')  || ($_where == 'perfil') || ($_where == 'mod_reg') 
	|| ($_where == 'mod_per') )
	{
		require '../autoload.php';
		$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
		$usuario = new Usuario($base);
	}


	if ($_where == 'marca')
	{	
		$_mensaje="Registro Insertado correctamente";
		
		if (!isset($_POST['marca']))
		{
			$_mensaje="ERROR: Completar todos los campos";
		}
		else
		{
			require '../autoload.php';
			$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);			
			$marca = new Marca($base);

			$id_marca=$_POST['id_marca'];
			
			$demarca=$_POST['marca'];	

			if(!empty($id_marca))
			{
				$_act=1;
				if(isset($_POST['inactivo'])){$_act=0;};

				$marcaOk=$marca->updateMarca($id_marca,$demarca,$_act);

				if(!(is_numeric($marcaOk))){$_mensaje="Error: Ponerse en contacto con el administrador ";}
			}
			else
			{

			$marcaOk=$marca->insertMarca($demarca);
			if (!(is_numeric($marcaOk))){$_mensaje="Error: Ponerse en contacto con el administrador ";}
			}
		}
		
		echo "<script type='text/javascript'>";
		echo "alert('";
		echo $_mensaje;
		echo "');";
		echo "window.location='../abm_marca.php' ";
		echo "</script>";
	}

	if ($_where == 'catprod')
	{	

		$_mensaje="Registro Insertado correctamente";

		if (!isset($_POST['titulo_catprod']))
		{
			$_mensaje="ERROR: Completar todos los campos";
		}
		else
		{
			$scat=$_POST['subcategoria'];
			$nom=$_POST['titulo_catprod'];
			$idcatpr=$_POST['id_catprod'];
			
			require '../autoload.php';
			$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);			
			$catpr = new CategoriaProducto($base);

			if(!empty($idcatpr))
			{
				$id_subcat=$_POST['id_subcat'];	
				$idcat=$_POST['idcat'];	
				$_act=1;
				if(isset($_POST['inactivo'])){$_act=0;};

				$catprOk=$catpr->updateCategoriaProducto($nom,$idcat,$id_subcat,$_act,$idcatpr);
				//echo "tipo de dato".gettype($catprOk);
				if(!(is_numeric($catprOk))){$_mensaje="Error: Ponerse en contacto con el administrador ";}
			}
			else
			{

			$subcat = new SubCategoria($base);
			$subcatOk=$subcat->getSubCategoriaq($scat);
			$cate=$subcatOk[0]['id_categoria'];	
			$catprOk=$catpr->insertCategoriaProducto($nom,$cate,$scat);

			if (!(is_numeric($catprOk))){$_mensaje="Error: Ponerse en contacto con el administrador ";}
			}
		}
		
		echo "<script type='text/javascript'>";
		echo "alert('";
		echo $_mensaje;
		echo "');";
		echo "window.location='../abm_catprod.php' ";
		echo "</script>";
	}


	if ($_where == 'subcat')
	{
		$_mensaje="Registro Insertado correctamente";
		if (!isset($_POST['nom_subcat']))
		{
			$_mensaje="ERROR: Completar todos los campos";
		}
		else
		{
			$cat=$_POST['categoria'];
			$nom=$_POST['nom_subcat'];
			
			require '../autoload.php';
			$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
			$subcat = new SubCategoria($base);

			$ids=$_POST['id_subcat'];
			

			if(!empty($ids))
			{
				$_act=1;
				if(isset($_POST['inactivo'])){$_act=0;};
				$subcatOk=$subcat->updateSubCategoria($cat,$nom,$ids,$_act);
			}
			else
			{

			$subcatOk=$subcat->insertSubCategoria($cat,$nom);

			if (!(is_numeric($subcatOk))){$_mensaje="Error: Ponerse en contacto con el administrador ";}
			}
		}
		
		echo "<script type='text/javascript'>";
		echo "alert('";
		echo $_mensaje;
		echo "');";
		echo "window.location='../abm_subcatego.php' ";
		echo "</script>";
	}

	if ($_where == 'categoria')
	{
		
			if (!isset($_POST['nom_cat']))
			{
			echo "<script type='text/javascript'>";
			echo "alert('";
			echo "Completar todos los campos";
			echo "');";
			echo "window.location='../abm_categoria.php' ";
			echo "</script>";
			}

			$_nom_cat=$_POST['nom_cat'];
			
			$_act=1;
			if 
			(
				(isset($_POST['inactivo']))
				&& 
				($_POST['inactivo'] == 'on')
			) 

			{
				$_act=0;
			}

		require '../autoload.php';
		$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
		$cate = new Categoria($base);
		
		if (empty($_POST['id_cat'])){$cateOk=$cate->insertCategoria($_nom_cat);}
		else
		{
			$_id_cat=$_POST['id_cat'];
			$cateOk=$cate->updateCategoria($_id_cat,$_nom_cat,$_act);
		}
		
		$_mensaje="Error, Ponerse en contacto con el administrador";
		if (is_numeric($cateOk)){$_mensaje="Categoria ingresada correctamente";};


			echo "<script type='text/javascript'>";
			echo "alert('";
			echo $_mensaje;
			echo "');";
			echo "window.location='../abm_categoria.php' ";
			echo "</script>";
	}



	if ($_where == 'actcom')
	{


		$_com=$_POST['id_comentario'];
		$_acc=$_POST['id_acc'];

		if ($_acc==1){$_acc=0;}else{$_acc=1;}

		require '../autoload.php';
		$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
		$comen = new Comentario($base);
		$comenOk=$comen->updateComentario($_com,$_acc);
		
		$_mensaje="Comentario No Modificado, Ponerse en contacto con el administrador";
		if ($comenOk == 1){$_mensaje="Comentario Modificado";}

			echo "<script type='text/javascript'>";
			echo "alert('";
			echo $_mensaje;
			echo "');";
			echo "window.location='../comentario.php?trae=".$_POST['id_acc']."' ";
			echo "</script>";

	}



	if ($_where == 'registro')
	{
		$_nom=$_POST['nombre'];
		$_pas=$_POST['pass'];
		$_pa2=$_POST['pass2'];
		$_per=$_POST['perfil'];

		$_mensaje="Usuario creado con éxito";
		

		$_SESSION["_nom"] = $_nom;
	    if (empty($_nom) || empty($_pas) || (empty($_pa2) || empty($_per)))
	    {
		    header('Location: ../registro.php?er=1');
			exit();
	    }

	    if ($_pas !== $_pa2)
	    {
		    header('Location: ../registro.php?er=3');
			exit();
	    }	    

	    
		$usuarioOK = $usuario->insertUsuario($_nom,password_hash($_pas,PASSWORD_DEFAULT));

		if (is_bool($usuarioOK)) 
		{
			header('Location: ../registro.php?er=2');
			exit();
		}
		else
		{
			echo "<script type='text/javascript'>";
			echo "alert('";
			echo $_mensaje;
			echo "');";
			echo "window.location='../ingreso.php'";
			echo "</script>";
		}

	}	



















































	if ($_where == 'mod_reg' ) // modificar usuario
	{
		$_nom=$_POST['nombre'];
		$_pas=$_POST['pass'];
		$_pa2=$_POST['pass2'];
		$_per=$_POST['perfil'];
		$_idu=$_POST['id_user'];

		$_mensaje="Usuario modificado con éxito";

		$_SESSION["_nom"] = $_nom;
	    if ((empty($_nom) || empty($_pas) || (empty($_pa2) || empty($_per))) || ($_pas !== $_pa2))
	    {
			$_mensaje = "complete todos los campos / las contraseñas deben coincidir";

			echo "<script type='text/javascript'>";
			echo "alert('";
			echo $_mensaje;
			echo "');";
			echo "</script>";
		    header('Location: ../abm_usuario.php');
			exit();
	    }

	    
		$usuarioOK = $usuario->updateUsuario($_idu,$_nom,password_hash($_pas,PASSWORD_DEFAULT),$_per);
	

		if (is_bool($usuarioOK)) 
		{
			header('Location: ../registro.php?er=2');
			exit();
		}
		else
		{
			echo "<script type='text/javascript'>";
			echo "alert('";
			echo $_mensaje;
			echo "');";
			echo "window.location='../ingreso.php'";
			echo "</script>";
		}
	}




	if ($_where == 'ingreso') 
	{
		$_nom=$_POST['email'];	
	    $_pass=$_POST['pass'];

	    if ( empty($_nom) || (empty($_pass)) )
	    {	    

		    header('Location: ../ingreso.php?er=1');
			exit();
	    }

	    
	    $usuarioOK = $usuario->getUsuario($_nom,$_pass);

	    $hash = $usuarioOK[0]['password'];

	    if (password_verify($_pass, $hash)) {
		    $_SESSION["_nom"] = $_nom;
		    $_SESSION["_per"] = $usuarioOK[0]['perfil'];
	    	$_SESSION["_idu"] = $usuarioOK[0]['id_usuario'];

		    $_mensaje="Bienvenido";
		} else {
		    $_mensaje="Usuario / password incorrectas";
		}

	    
	    if (is_bool($usuarioOK))
	    {
	    	header('Location: ../ingreso.php?er=2');
			exit();
	    }
	    
	 

			echo "<script type='text/javascript'>";
			echo "alert('";
			echo $_mensaje;
			echo "');";
			echo "window.location='../index.php'";
			echo "</script>";


	}


	if ($_where == 'perfil') 
	{		
		$_pagina="perfil.php";
		if (!isset($_POST['nom_pfl']) || !isset($_POST['bkend']))
		{
			$_mensaje="Completar todos los campos";
			$_pagina="perfil.php?er=1";
		}
		else
		{
			$_nom_pfl=$_POST['nom_pfl'];
			$_kend = implode(",", $_POST['bkend']);
			$_act=1;

			$perfil = new Perfil($base);
			$perfilOK= $perfil->insertPerfil($_nom_pfl,$_act,$_kend);

			if (is_numeric($perfilOK))
			{
			$_mensaje="Perfil Ingresado con éxito";
			}
			else
			{
			$_mensaje="Error, contactarse con administrador";
			$_pagina="perfil.php?er=99";
			}
		}

		

			echo "<script type='text/javascript'>";
			echo "alert('";
			echo $_mensaje;
			echo "');";
			echo "window.location='../$_pagina'";
			echo "</script>";

	}









if ($_where == 'mod_per') 
	{		
		$_pagina="abm_perfil.php";

		if (!isset($_POST['nom_pfl']) || !isset($_POST['bkend']))
		{
			$_mensaje="Completar todos los campos";
			$_pagina="abm_perfil.php";
		}
		else
		{
			$_nom_pfl=$_POST['nom_pfl'];
			$_kend = implode(",", $_POST['bkend']);
			
			
			$_id=$_POST['id_prf'];

			$_act=1;
			if 
			(
				(isset($_POST['inactivo']))
				&& 
				($_POST['inactivo'] == 'on')
			) 

			{
				$_act=0;
			}
			
			$perfil = new Perfil($base);
			$perfilOK= $perfil->updatePerfil($_nom_pfl,$_act,$_kend,$_id);

			if (is_numeric($perfilOK))
			{
			$_mensaje="Perfil Ingresado con éxito";
			}
			else
			{
			$_mensaje="Error, contactarse con administrador";
			$_pagina="abm_perfil.php";
			}
		}

		

			echo "<script type='text/javascript'>";
			echo "alert('";
			echo $_mensaje;
			echo "');";
			echo "window.location='../$_pagina'";
			echo "</script>";

	}








	if ($_where == 'producto') 
	{
		$_mensaje="Producto Cargado satisfactoriamente";

		if(empty($_POST['nom_prod'])		   
		|| empty($_POST['desc_prod'])
		|| empty($_POST['detall_prod'])
		|| empty($_POST['precio_prod'])
		|| empty($_POST['marka'])
		|| empty($_POST['destac_prod'])
		|| empty($_POST['categoriaproducto']))
		{
			$_mensaje="completar todos los campos";
		}
		else
		{
			$_titulo=$_POST['nom_prod'];
			$descripcion=$_POST['desc_prod'];
			$descripcion_detallada=$_POST['detall_prod'];
			$precio=$_POST['precio_prod'];
			$marcaprod=$_POST['marka'];
			$destacado=$_POST['destac_prod'];
			$catprod=$_POST['categoriaproducto'];
			//$imagen=$_POST['imagen'];

			// si es update
			if (isset($_POST['id_producto']) && !empty($_POST['id_producto']))
			{	
			    require '../autoload.php';
				$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
				$Prod = new Producto($base);
				$ImaProd = new ImagenProducto($base);

				$_id_prod=$_POST['id_producto'];

				$desactivo='off';
				if(isset($_POST['desactivo'])){$desactivo=$_POST['desactivo'];};
				
				if(!empty($_FILES["imagen"]["type"]))
				{
					$imagen = $_FILES["imagen"];    
			    	if(empty($imagen["type"]) || $imagen["type"] != "image/png" )
			    	{
			    		$_mensaje="formato de imagen debe ser png";
					}
			    	else
			    	{	
			    		$imagen = $_FILES["imagen"];
			    		$Location="../images/prods/$_id_prod";
			    		$_nome=$imagen['name'];
			    		move_uploaded_file($imagen["tmp_name"],"$Location/$_nome");
						$ImaProdOk=$ImaProd->updateImagenProducto($_id_prod, $_nome);
			    	}
				}
				else
				{					
					if ($desactivo=='on'){$desactivo=0;}else{$desactivo=1;}
					$ProdOk=$Prod->updateProducto($_id_prod,$_titulo,$descripcion,$descripcion_detallada,$precio,$marcaprod,$destacado,$catprod,$desactivo);	
				}

			}
			else
			{		
			if(!empty($_FILES["imagen"]))
			{
			    $imagen = $_FILES["imagen"];    
			    if(empty($imagen["type"]) || $imagen["type"] != "image/png" )
			    {
			    	$_mensaje="formato de imagen debe ser png";
			    }
			    else
			    {			    				 
			    	$_nome=$imagen['name'];
			    	require '../autoload.php';
					$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
					$Prod = new Producto($base);
					$ImaProd = new ImagenProducto($base);
					$ProdOk=$Prod->insertProducto($_titulo,$descripcion,$descripcion_detallada,$precio,$marcaprod,$destacado,$catprod);

					if(is_numeric($ProdOk))
					{
						$id_imagen=$ProdOk;
						$Location="../images/prods/$id_imagen";
				    	if (!file_exists("$Location")){mkdir("$Location");}

				    	//mkdir("$Location");
				    	move_uploaded_file($imagen["tmp_name"],"$Location/$_nome");	

				    	$ImaProdOk=$ImaProd->insertImagenProducto($id_imagen, $_nome);
					}
			    }
			}

			}
		}
		echo "<script type='text/javascript'>";
		echo "alert('";
		echo $_mensaje;
		echo "');";
		echo "window.location='../abm_producto.php'";
		echo "</script>";
        
	}



















	if ($_where == 'comen') 
	{
		$review = new Comentario($base);
	    $_pr=$_POST['id_producto'];
		$_ip=$_POST['ip'];

		if (!isset($_POST['correo']) || !isset($_POST['estrellas']) || !isset($_POST['comentario']))
	    {$_mensaje="Por favor, para ingresar comentario debe completar todos los campos";}
	    else
	    {
	    $_pu=$_POST['estrellas'];
		$_cor=$_POST['correo'];
		$_com=$_POST['comentario'];

	    $reviewPreOK= $review->getComentarioPrevio($_pr,ip2long($_ip));
	    
	    if (is_null($reviewPreOK)){$_cant=0;}else{$_cant=$reviewPreOK[0]['cantidad'];}

	    if($_cant>1)
	    	{$_mensaje ="ya ingresaste un comentario";}
	    	else
	    	{	$_id_usuario='null';
	    		$reviewOK = $review->insertComentario($_pr , $_id_usuario,$_com	,ip2long($_ip) , $_pu,$_cor);
	    		$_mensaje ="Gracias por su comentario, este se encuentra en verificacion por parte del administrador";
	    	}
	    }
			echo "<script type='text/javascript'>";
			echo "alert('";
			echo $_mensaje;
			echo "');";
			echo "window.location='../single.php?pr=$_pr'";
			echo "</script>";
	}

?>