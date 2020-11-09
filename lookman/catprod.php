<?php

session_start();

require 'autoload.php';

$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
$catProd = new SubCategoria($base);

if (!isset($_SESSION["_idu"]) || $_SESSION["_per"] !== 'admin')
{
			echo "<script type='text/javascript'>";
			echo "window.location='index.php'";
			echo "</script>";	
}

	$subcatOK = $catProd->getSubCategoriaz(1);// para que traiga las sub categorias activas
            

if (isset($_POST['id_catprod']))
{
	$idcat_post=$_POST['id_categoria'];	
	$_activo=$_POST['activo'];
    $id_catprod=$_POST['id_catprod'];
    $titulo_catprod=$_POST['titulo_catprod'];    
    $detalle_cat=$_POST['detalle_cat'];
    $id_subcat_post=$_POST['id_subcat'];
    $detalle_subcat=$_POST['detalle_subcat'];
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
<title>LooKmacho - Categoria Producto</title>
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
		<h2 class="animated wow fadeInLeft" data-wow-delay=".5s">Categoria Producto</h2>
		<h3 class="animated wow fadeInRight" data-wow-delay=".5s"><a href="index.php">Home</a><label>/</label>Categoria Producto</h3>
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

		<form action='funk/validarup.php?val=catprod'  method="POST">
			<div class="col-md-6 login-do1 animated wow fadeInLeft" data-wow-delay=".5s">


				<div class="login-mail">

					<input type="hidden" name="id_catprod" id="id_catprod"
<?php
								if (isset($id_catprod)) 
								{
									echo "value='".$id_catprod."'";
								}
?>
					>



					<input type="hidden" name="idcat" id="idcat"
<?php
								if (isset($idcat_post)) 
								{
									echo "value='".$idcat_post."'";
								}
?>
					>



					<input type="hidden" name="detalle_cat" id="detalle_cat"
<?php
								if (isset($detalle_cat)) 
								{
									echo "value='".$detalle_cat."'";
								}
?>
					>






					<input type="hidden" name="id_subcat" id="id_subcat"
<?php
								if (isset($id_subcat_post)) 
								{
									echo "value='".$id_subcat_post."'";
								}
?>
					>





					<input type="hidden" name="detalle_subcat" id="detalle_subcat"
<?php
								if (isset($detalle_subcat)) 
								{
									echo "value='".$detalle_subcat."'";
								}
?>
					>







					<input type="text" id="titulo_catprod" name="titulo_catprod" placeholder="Nombre Categoria Producto" required=""
<?php
								if (isset($titulo_catprod)) 
								{
									echo "value='".$titulo_catprod."'";
								}
?>
								>

					<i class="glyphicon glyphicon-envelope"></i>
				</div>

					<div class="login-mail">
					<select name="subcategoria" id="subcategoria" style="border: 1px solid #FFFFFF !important;">
<?php
					for ($estevie=0; $estevie < count($subcatOK); $estevie++) 
					{ 
						$fil=" ";						
						$id_scat=$subcatOK[$estevie]['id_subcat'];
						$_de_scat=$subcatOK[$estevie]['detalle_subcat'];
						$_de_cat=$subcatOK[$estevie]['detalle_cat'];

						if ($id_subcat_post == $id_scat){$fil=" selected ";}

						echo "<option id='subcategoria' name='subcategoria' value='".$id_scat."' $fil>$id_scat-$_de_cat - $_de_scat</option>";
					}
?>
					</select>
					</div>
<?php
					if (isset($idcat_post)) 
					{
						$_che=" ";
						if($_activo==0){ $_che=" checked ";}
?>
					<div class="login-mail">
						
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