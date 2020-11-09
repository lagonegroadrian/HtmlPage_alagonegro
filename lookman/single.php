<?php
		
	session_start();

	$_limite=5;

	if (!isset($_GET['pr'])) 
	{
	header('Location: index.php');
	exit();
	}

	$_producto=$_GET['pr'];

	require 'autoload.php';

	$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
	$prod = new Producto($base);
	$color = new Color($base);
	$review = new Comentario($base);

	$prodOK = $prod->getProd($_producto);
	$colorOK = $color->getColor($_producto);

	$reviewOK = $review->getComentario($_limite,$_producto);

	$reviewProm = $review->getComentarioPromedio($_producto);

//	echo "---<pre>";
//	print_r($reviewProm);
//	echo "</pre>";


	if (is_bool($prodOK)) // valido que no ingresn un producto que no existe
	{
	header('Location: index.php');
	exit();
	}
    
	$colores="";
    
	for ($can=0; $can < count($colorOK); $can++) { 	$colores.=$colorOK[$can]['descripcion'].", "; }
	
	$ide_pr = $prodOK[0]['id_producto'];
	$fil_pr = $prodOK[0]['imagen_filesystem'];
	$tit_pr = $prodOK[0]['titulo'];
	$des_pr = $prodOK[0]['prod_descripcion'];
	$pre_pr = $prodOK[0]['precio'];
	$det_pr = $prodOK[0]['descripcion_detallada'];
	$tam_pr = $prodOK[0]['tama_descripcion'];
	$mrk_pr = $prodOK[0]['marca'];
    $ismarcaactivo = $prodOK[0]['ismarcaactivo'];            
    
    if (!$ismarcaactivo) // valido que no ingresn un producto que no existe
	{
	   header('Location: index.php');
	   exit();
	}

?>

<!DOCTYPE html>
<html>
<head>
<title>LookMacho - Producto</title>
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
<link href='//fonts.googleapis.com/css?family=Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>






<style type="text/css">
  p.clasificacion {
  position: relative;
  overflow: hidden;
  display: inline-block;
}

p.clasificacion input {
  position: absolute;
  top: -100px;
}

p.clasificacion label {
  float: right;
  color: #333;
}

p.clasificacion label:hover,
p.clasificacion label:hover ~ label,
p.clasificacion input:checked ~ label {
  color: #dd4;
}
</style>













</head>
	
<body>

<!-- header -->
<?php
	include_once 'section/menu.php';
	//include_once 'section/destacado.php';
?>
<!-- //header -->



<!--banner-->
<div class="banner-top">
	<div class="container">
		<h2 class="animated wow fadeInLeft" data-wow-delay=".5s">Producto</h2>
		<h3 class="animated wow fadeInRight" data-wow-delay=".5s"><a href="index.php">Inicio</a><label>/</label>Producto</h3>
		<div class="clearfix"> </div>
	</div>
</div>
	<!--content-->
		<div class="product">
			<div class="container">
		<div class="col-md-3 product-bottom ">

		<!--categories-->
<?php
	include_once 'section/categoria.php';
	//include_once 'section/precio.php';
	//include_once 'section/color.php';
	//include_once 'section/mejorvta.php';
?>
		<!--f categories-->
			
		<!--//menu-->
		<!--price-->

			<!--//price-->
			<!--colors-->			
			<!--//colors-->			
			<!---->
 	</div>
			<div class="col-md-9 animated wow fadeInRight" data-wow-delay=".5s">
				<div class="col-md-5 grid-im">		
		<div class="flexslider">
			  <ul class="slides">
			    <li data-thumb="images/si.jpg">
			        <div class="thumb-image"> <img 
<?php
						echo "src='images/prods/".$ide_pr."/".$fil_pr."'";
						echo "alt='".$tit_pr."'";
?>
			        	data-imagezoom="true" class="img-responsive"> </div>
			    </li>
			    <!--li data-thumb="images/si1.jpg">
			         <div class="thumb-image"> <img src="images/si1.jpg" data-imagezoom="true" class="img-responsive"> </div>
			    </li>
			    <li data-thumb="images/si2.jpg">
			       <div class="thumb-image"> <img src="images/si2.jpg" data-imagezoom="true" class="img-responsive"> </div>
			    </li--> 
			  </ul>
		</div>
	</div>	
<div class="col-md-7 single-top-in">
						<div class="span_2_of_a1 simpleCart_shelfItem">
				
				<h3>
<?php
				echo $tit_pr;
?>
				</h3>

				<p class="in-para"> 
<?php
					echo $des_pr;
?>
				</p>

			    <div class="price_single">
				  <span class="reducedfrom item_price">
<?php
					echo "$ ".$pre_pr;
?>
				</span>
				 <a href="#" data-text="Add To Cart" class="but-hover1 item_add">Add To Cart</a>
				 <div class="clearfix"></div>
				</div>
				
				 
			   
			<div class="clearfix"> </div>
			</div>
		   <!----- tabs-box ---->
		<div class="sap_tabs">	
				     <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
						  <ul class="resp-tabs-list">
						  	  <li class="resp-tab-item " aria-controls="tab_item-0" role="tab"><span>Descripcion</span></li>
							  <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Adicional</span></li>
							  <li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span>Opiniones</span></li>
							  <div class="clearfix"></div>
						  </ul>				  	 
							<div class="resp-tabs-container">
							    <h2 class="resp-accordion resp-tab-active" role="tab" aria-controls="tab_item-0"><span class="resp-arrow"></span>Descripcion</h2><div class="tab-1 resp-tab-content resp-tab-content-active" aria-labelledby="tab_item-0" style="display:block">
									<div class="facts">
									  <p>
<?php
										echo "$ ".$det_pr;
?>
									  </p>
							        </div>

							    	</div>
							      <h2 class="resp-accordion" role="tab" aria-controls="tab_item-1"><span class="resp-arrow"></span>Additional Information</h2><div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
										<div class="facts1">
					
						<div class="color">
							<p>Color</p>
							<span >
<?php
								echo "$colores";
?>
							</span>
							<div class="clearfix"></div>
						</div>


						<div class="color">
							<p>Modelo</p>
							<span >
<?php
							echo $tam_pr.",";
?>
							</span>
							<div class="clearfix"></div>
						</div>

						<div class="color">
							<p>Marca</p>
							<span >
<?php
							echo $mrk_pr.",";
?>
							</span>
							<div class="clearfix"></div>
						</div>







						<div class="color">
							<p>Rankin</p>
							<span >
<?php
							echo $reviewProm[0]['promedio'];
?>
							</span>
							<div class="clearfix"></div>
						</div>




					        
			 </div>

				</div>
				<h2 class="resp-accordion" role="tab" aria-controls="tab_item-2"><span class="resp-arrow"> </span>Reviews</h2>
				<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">











				<form action="funk/validarup.php?val=comen" method="POST">
					<div class="comments-top-top">

						<div class="top-comment-left">
						<img class="img-responsive" src="images/co.png" alt="">
						</div>

						<div class="top-comment-right">
							<br>
							<h6>
								<input type="email" name="correo" placeholder="Ingresa tu correo">
							</h6>
							<br>
							<textarea name='comentario' id='comentario'>  </textarea> <br>

							<input type="hidden" name="ip" id="ip"
<?php						echo "value='".$_SERVER['REMOTE_ADDR']."' ";?>							
							>

							<input type="hidden" name="id_producto" id="id_producto"
<?php
							echo "value='".$ide_pr."' ";
?>							>
						<p class="clasificacion" required="ingresar una puntuacion">
						  <input id="radio1" type="radio" name="estrellas" value="5">
						  <label for="radio1">★</label>
						  <input id="radio2" type="radio" name="estrellas" value="4">
						  <label for="radio2">★</label>
						  <input id="radio3" type="radio" name="estrellas" value="3">
						  <label for="radio3">★</label>
						  <input id="radio4" type="radio" name="estrellas" value="2">
						  <label for="radio4">★</label>
						  <input id="radio5" type="radio" name="estrellas" value="1">
						  <label for="radio5">★</label>
						</p>


						</div>
							<div class="clearfix"> </div>
							<!--a class="add-re" href="single.php">+ Opinion</a-->
							<input type="submit" class="add-re" value="+ Opinion">
					</div>
				</form>

<?php
		if (!(is_bool($reviewOK)))
		{
		for ($aux9=0; $aux9 < count($reviewOK); $aux9++) 
		{ 
			$usuario=$reviewOK[$aux9]['usuario_nombre'];
			$fechahora=$reviewOK[$aux9]['fecha_hora'];
			$comentario=$reviewOK[$aux9]['review'];
			$mail=$reviewOK[$aux9]['mail'];

?>
				<div class="comments-top-top">
								<div class="top-comment-left">
								<img class="img-responsive" src="images/co.png" alt="">
								</div>
								
								<div class="top-comment-right">								
								<h6>
<?php								
								if (empty($usuario)){echo $mail;}else{echo $usuario;} echo " - ".$fechahora;
?>
								</h6>
								<p>
<?php								
								echo $comentario;
?>
								</p>
								</div>
								<div class="clearfix"> </div>
								<!--a class="add-re" href="single.php">Add Review</a-->
				</div>

<?php

		}
		}
		//else
		//{
?>


				</div>
					      </div>
					 </div>
					 <script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
		    <script type="text/javascript">
			    $(document).ready(function () {
			        $('#horizontalTab').easyResponsiveTabs({
			            type: 'default', //Types: default, vertical, accordion           
			            width: 'auto', //auto or any width like 600px
			            fit: true   // 100% fit in a container
			        });
			    });
			   </script>	
<!---->
					</div>
			
</div>
<!----->
<div class="clearfix"> </div>

			</div class="clearfix"></div>
			</div>			
		</div>
				<!--//products-->

<!-- social -->
	<?php include("section/social.php"); ?>
<!-- //social -->

<!-- footer -->
	<?php include("section/footer.php"); ?>
<!-- //footer -->

<script src="js/imagezoom.js"></script>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script defer src="js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />

<script>
// Can also be used with $(document).ready()
$(window).load(function() {
  $('.flexslider').flexslider({
    animation: "slide",
    controlNav: "thumbnails"
  });
});
</script>


</body>
</html>