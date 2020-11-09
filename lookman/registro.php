<?php

session_start();

require 'autoload.php';
$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);

if (!isset($_SESSION["_idu"]) || $_SESSION["_per"] !== 'admin')
{
			echo "<script type='text/javascript'>";
			echo "window.location='index.php'";
			echo "</script>";	
}

$_que="registro";
if (isset($_POST['id_user']))
{
	$id_user=$_POST['id_user'];	
	$user = new Usuario($base);
	$userOK = $user->getUsuarioABM($id_user);

	$_nom=$userOK[0]['usuario_nombre'];
	$_prf=$userOK[0]['perfil'];

	$_que="mod_reg";
}


if(isset($_GET['er']))
{
	$_nom=$_SESSION["_nom"];
	switch ($_GET['er']) 
	{
		case 1:
			$_msg="Complete todos los campos";
			break;

		case 2:
			$_msg="Ya existe el usuario, probá con otro";
			break;
		
		case 3:
			$_msg="Las contraseñas no coinciden";
			break;			
		
		default:
			$_msg="Revisar los datos ingresados";
			break;
	}
}


$perfil = new Perfil($base);
$perfilOK = $perfil->getPerfil(1); // para que solo traiga los activos


?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>LookMacho - Usuario</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Classic Style Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="js/jquery.min.js"></script>
<!-- //js -->
<!-- cart -->
<script src="js/simpleCart.min.js"></script>
<!-- cart -->
<!-- for bootstrap working -->
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<!-- animation-effect -->
<link href="css/animate.min.css" rel="stylesheet"> 
<script src="js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!-- //animation-effect -->
<link href='//fonts.googleapis.com/css?family=Cabin:400,500,600,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lato:400,100,300,700,900' rel='stylesheet' type='text/css'></head>
	
<body>

<!-- header -->
	<?php 
	include_once 'section/menu.php';
	?>
<!-- //header -->


<!--banner-->
<div class="banner-top">
	<div class="container">
		<h2 class="animated wow fadeInLeft" data-wow-delay=".5s">Usuario</h2>
		<h3 class="animated wow fadeInRight" data-wow-delay=".5s"><a href="index.php">Home</a><label>/</label>Usuario</h3>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- contact -->
	<div class="login">
		<div class="container">

<?php
if (isset($_msg)){
echo "<div class='contact-grid3'>";
echo "<div class='contact-grid1'>";
echo "<h4>$_msg</h4>";
echo "</div>";
echo "</div>";
}
?>

		<form 
<?php
		echo "action='funk/validarup.php?val=$_que' ";
?>		
		method="POST">
			<div class="col-md-6 login-do1 animated wow fadeInLeft" data-wow-delay=".5s">
				<div class="login-mail">

					<input type="hidden" name="id_user" id="id_user"
<?php
								if (isset($id_user)) 
								{
									echo "value='".$id_user."'";
								}
?>

					>

					<input type="text" id="nombre" name="nombre" placeholder="Email" required=""

<?php
								if (isset($_nom)) 
								{
									echo "value='".$_nom."'";
								}
?>
								>



					<i class="glyphicon glyphicon-envelope"></i>
				</div>

				<div class="login-mail">
					<input type="password" id="pass" name="pass" placeholder="Password" required="">
					<i class="glyphicon glyphicon-lock"></i>
				</div>
				<div class="login-mail">
					<input type="password" id="pass2" name="pass2" placeholder="Repetir password" required="">
					<i class="glyphicon glyphicon-lock"></i>
				</div>


				<div class="login-mail">
					<select id="perfil" name="perfil" style=" border: 1px solid #FFFFFF !important;">
<?php
					for ($aux=0; $aux < count($perfilOK); $aux++) 
					{ 
						$_sel=" ";
						if ((isset($_prf)) && ($_prf==$perfilOK[$aux]['txt_pfl']))
						{
							$_sel=" selected";
						}
						
							echo "<option value='".$perfilOK[$aux]['id_prf']."' $_sel > ".$perfilOK[$aux]['txt_pfl']." </option>";
						
					}
?>					  
					</select>
					<!--i class="glyphicon glyphicon-lock"></i-->
				</div>


				  
				  		<!--a class="news-letter" href="#">
						 <label class="checkbox1"><input type="checkbox" name="checkbox"  id="checkbox"><i> </i>Estoy deacuerdo con los terminos y condiciones</label>
					   </a-->
	
			</div>
			<div class="col-md-6 login-do animated wow fadeInRight" data-wow-delay=".5s">
					
					<label class="hvr-sweep-to-top login-sub">
					<input type="submit" value="Guardar">
					</label>
					
					<br><br>

					<!--a href="perfil.php" class="hvr-sweep-to-top">Alta de Perfil</a-->
					<br>


					<!--br><br>

					<a href="abm_usuario.php?es=m" class="hvr-sweep-to-top">Modificacion usuario</a-->

			</div>
			<div class="clearfix"> </div>
			</form>
		</div>


	</div>


<!-- social -->
	<?php include("section/social.php"); ?>
<!-- //social -->

<!-- footer -->
	<?php include("section/footer.php"); ?>
<!-- //footer -->

</body>
</html>