<?php
require 'autoload.php';
session_start();

if ( (!isset($_GET['scat'])) && (!isset($_GET['catprod'])) )
{
	header('Location: index.php');
	exit();
}

if (isset($_GET['scat']))
{
	$_sub_categoria=$_GET['scat'];
?>
		<input type="hidden" name="subcat" id="subcat" <?php echo "value='".$_sub_categoria."' "; ?> >
		<input type="hidden" name="catpro" id="catpro" value="-">
<?php
}

if (isset($_GET['catprod']))
{
	$_cat_producto=$_GET['catprod'];
?>
	<input type="hidden" name="subcat" id="subcat" value="-">
	<input type="hidden" name="catpro" id="catpro" <?php echo "value='".$_cat_producto."' "; ?> >
<?php
}


?>
<!DOCTYPE html>
<html lang="es">
<head>
<title>LookMacho</title>
<meta http-equiv="Content-type" content="text/html"; charset="utf-8" />
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Tendencia para el Machoo de hoy" />
<script type="application/x-javascript"> 
		addEventListener("load", function() 
			{ setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } 
</script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="js/jquery.min.js"></script>
<!-- //js -->
<!-- cart -->
<script src="js/simpleCart.min.js"></script>

<script src="js/scrapy.js"></script>

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
<link href='//fonts.googleapis.com/css?family=Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>
</head>
	
<body>
					
<?php
	include_once 'section/menu.php';
?>

<!--banner-->
<div class="banner-top">
	<div class="container">
		<h2 class="animated wow fadeInLeft" data-wow-delay=".5s">Productos</h2>
		<h3 class="animated wow fadeInRight" data-wow-delay=".5s"><a href="index.php">Home</a><label>/</label>Productos</h3>
		<div class="clearfix"> </div>
	</div>
</div>
	<!--content-->
		<div class="product">
			<div class="container">
						<div class="col-md-3 product-bottom">
<?php
	include_once 'section/categoria.php';
	include_once 'section/precio.php';
	include_once 'section/color.php';
	include_once 'section/mejorvta.php';
?>
 	</div>
	<div class="col-md-9 animated wow fadeInRight" data-wow-delay=".5s">

<?php
	include_once 'section/orden.php';

?>
		<div id="mid-popular">
<?php
	include_once 'section/listarprod.php';
?>

		 </div>

			</div>

		
			</div class="clearfix"></div>
			</div>			
		</div>
				<!--//products-->
<?php

	include_once 'section/social.php';
	include_once 'section/footer.php';
?>

</body>

</html>
