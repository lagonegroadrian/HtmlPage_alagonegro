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


$_que="categoria";
if (isset($_POST['id_categoria']))
{
	$id_cat=$_POST['id_categoria'];	
	$_activo=$_POST['activo'];
	
	$xcategoria = new Categoria($base);
	$xcategoriaOK = $xcategoria->getxCategoria($id_cat);

	$_ica=$xcategoriaOK[0]['id_categoria'];
	$_dca=$xcategoriaOK[0]['detalle_cat'];
	$_aca=$xcategoriaOK[0]['activo'];

	$_que="mod_cat";
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
			$_msg="Ya existe el dato, probá con otro";
			break;	
		
		default:
			$_msg="Ponerse en contacto con el administrador";
			break;
	}
}


?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>LooKmacho - alta de Categoria</title>
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
		<h2 class="animated wow fadeInLeft" data-wow-delay=".5s">Alta de Categoria</h2>
		<h3 class="animated wow fadeInRight" data-wow-delay=".5s"><a href="index.php">Home</a><label>/</label>Alta de Categoria</h3>
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

		<form action='funk/validarup.php?val=categoria'  method="POST">
			<div class="col-md-6 login-do1 animated wow fadeInLeft" data-wow-delay=".5s">


				<div class="login-mail">

					<input type="hidden" name="id_cat" id="id_cat"
<?php
								if (isset($id_cat)) 
								{
									echo "value='".$id_cat."'";
								}
?>

					>

					<input type="text" id="nom_cat" name="nom_cat" placeholder="Nombre Categoria" required=""
<?php
								if (isset($_dca)) 
								{
									echo "value='".$_dca."'";
								}
?>
								>

					<i class="glyphicon glyphicon-envelope"></i>
				</div>

<?php
					if (isset($_aca)) 
					{
?>

					<div class="login-mail">
<?php
						$_che=" ";
						if($_activo==0){ $_che=" checked ";}
?>
   						<label class="checkbox1">
   							<input type="checkbox" name="inactivo"  id="inactivo"
<?php
								echo $_che;
?>
   							><i> </i>Desactivar
   						</label>    					
					</div>
<?php
					}
?>













				<!--i class="glyphicon glyphicon-lock"></i-->



	
			</div>
			<div class="col-md-6 login-do animated wow fadeInRight" data-wow-delay=".5s">
					
					<label class="hvr-sweep-to-top login-sub">
					<input type="submit" value="Guardar">
					</label>

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