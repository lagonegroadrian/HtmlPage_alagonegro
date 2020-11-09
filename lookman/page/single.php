<?php

require_once("../funk/config.php");

$_pr = 13;

if(isset($_GET["pr"]))
	{
		$_prod = $_GET["pr"];
	}



$Prods = array();
$consulta4="Select prod.id_producto as id_producto ,titulo
,descripcion
,descripcion_detallada
,precio
,puntaje
,orden
,imagen_filesystem
FROM producto prod
inner join imagen_producto imgprod
on prod.id_producto = imgprod.id_producto
where prod.id_producto = $_prod
order by prod.id_producto,puntaje , orden asc";

$resultado4=mysqli_query($link,$consulta4);
while($row4=mysqli_fetch_array($resultado4)) 
{array_push($Prods, array("detallada"=>$row4["descripcion_detallada"],"nombre"=>$row4["titulo"], "precio"=>$row4["precio"],"descripcion"=>$row4["descripcion"],"archivo"=>$row4["imagen_filesystem"]));}




$review = array();
$consulta5="select id_usuario,review,fecha_hora from review
where id_producto = $_prod 
order by fecha_hora";

$resultado5=mysqli_query($link,$consulta5);

while($row5=mysqli_fetch_array($resultado5))
{array_push($review, 
	array(	"id_usuario"=>$row5["id_usuario"],	"review"=>$row5["review"],	"fecha_hora"=>$row5["fecha_hora"])
	);
}

//echo"<pre>";
//print_r($review);
//echo"</pre>";

?>


<!DOCTYPE html>
<html>
<head>
<title>Classic Style a Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Single :: w3layouts</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Classic Style Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- js -->
<script src="../js/jquery.min.js"></script>
<!-- //js -->
<!-- cart -->
<script src="../js/simpleCart.min.js"></script>
<!-- cart -->
<!-- for bootstrap working -->
<script type="text/javascript" src="../js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<!-- animation-effect -->
<link href="../css/animate.min.css" rel="stylesheet"> 
<script src="../js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!-- //animation-effect -->
<link href='//fonts.googleapis.com/css?family=Cabin:400,500,600,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Lato:400,100,300,700,900' rel='stylesheet' type='text/css'></head>
	
<body>



<!-- header -->
	<?php include("../section/header.php"); ?>
<!-- //header -->


<!--banner-->
<div class="banner-top">
	<div class="container">
		<h2 class="animated wow fadeInLeft" data-wow-delay=".5s">Producto</h2>
		<h3 class="animated wow fadeInRight" data-wow-delay=".5s"><a href="../index.php">Home</a><label>/</label>Producto</h3>
		<div class="clearfix"> </div>
	</div>
</div>
	<!--content-->
		<div class="product">
			<div class="container">
		<div class="col-md-3 product-bottom ">
			<!--categories-->
			<div class="categories animated wow fadeInUp animated" data-wow-delay=".5s" >
					<h3>Categorias</h3>
					<ul class="cate">
						<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.php">Best Selling</a> <span>(15)</span></li>
						<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.php">Man</a> <span>(16)</span></li>
							<ul>
								<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.php">Accessories</a> <span>(2)</span></li>
								<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.php">Coats &amp; Jackets</a> <span>(5)</span></li>
								<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.php">Jeans</a> <span>(1)</span></li>
								<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.php">New Arrivals</a> <span>(0)</span></li>
								<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.php">Suits</a> <span>(1)</span></li>
								<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.php">Casual Shirts</a> <span>(0)</span></li>
							</ul>
						<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.php">Sales</a> <span>(15)</span></li>
						<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.php">Woman</a> <span>(15)</span></li>
							<ul>
								<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.php">Accessories</a> <span>(2)</span></li>
								<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.php">New Arrivals</a> <span>(0)</span></li>
								<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.php">Dresses</a> <span>(1)</span></li>
								<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.php">Casual Shirts</a> <span>(0)</span></li>
								<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.php">Shorts</a> <span>(4)</span></li>
							</ul>
					</ul>
				</div>
		<!--//menu-->
		<!--price-->
				<div class="price animated wow fadeInUp animated" data-wow-delay=".5s" >
					<h3>Rango de Precios</h3>
					<div class="price-head">
					<div class="col-md-6 price-head1">
                                        <div class="price-top1">
                                            <span class="price-top">$</span>
                                            <input type="text"  value="0">
                                        </div>
                                    </div>
									<div class="col-md-6 price-head2">
                                        <div class="price-top1">
                                            <span class="price-top">$</span>
                                            <input type="text"  value="500">
                                        </div>
                                    </div>
									<div class="clearfix"></div>
                                    </div>
                                    </div>
			<!--//price-->
			<!--colors-->
			<div class="colors animated wow fadeInLeft animated" data-wow-delay=".5s" >
					<h3>Colores</h3>

                                        <div class="color-top">
                                            <ul>
											<li><a href="#"><i></i></a></li>
												<li><a href="#"><i class="color1"></i></a></li>
												<li><a href="#"><i class="color2"></i></a></li>
												<li><a href="#"><i class="color3"></i></a></li>
												<li><a href="#"><i class="color4"></i></a></li>
												<li><a href="#"><i class="color5"></i></a></li>
												<li><a href="#"><i class="color6"></i></a></li>
												<li><a href="#"><i class="color7"></i></a></li>
											</ul>
                                        </div>
                                    </div>
									
                                 
			<!--//colors-->
			<div class="sellers animated wow fadeInDown" data-wow-delay=".5s">
					
								<h3 class="best">Mejores Vendedores</h3>
					<div class="product-head">
					<div class="product-go">
						<div class=" fashion-grid">
									<a href="single.php"><img class="img-responsive " src="../images/pcc.jpg" alt=""></a>
									
								</div>
							<div class=" fashion-grid1">
								<h6 class="best2"><a href="single.php">Lorem ipsum </a></h6>
								<span class=" price-in1"> <del>$50.00</del>$40.00</span>
								<p>The standard chunk of Lorem Ipsum used</p>
							</div>
								
							<div class="clearfix"> </div>
							</div>
							<div class="product-go">
						<div class=" fashion-grid">
									<a href="single.php"><img class="img-responsive " src="../images/pcc1.jpg" alt=""></a>
									
								</div>
							<div class=" fashion-grid1">
								<h6 class="best2"><a href="single.php">Lorem ipsum </a></h6>
								<span class=" price-in1"> <del>$50.00</del>$40.00</span>
								<p>The standard chunk of Lorem Ipsum used</p>
							</div>
							<div class="clearfix"> </div>
							</div>
							
							</div>
				</div>
				<!---->
 	</div>
			<div class="col-md-9 animated wow fadeInRight" data-wow-delay=".5s">
				<div class="col-md-5 grid-im">		
		<div class="flexslider">
			  <ul class="slides">
			    <li data-thumb="../images/si.jpg">
			        <div class="thumb-image"> <img 
			        	<?php
			        	 $imagen=strtolower($Prods[0]['archivo']);
			        	 echo " src='../images/$imagen'";
			        	 ?>			        	 

			        	data-imagezoom="true" class="img-responsive"> </div>
			    </li>
			    <!--li data-thumb="../images/si1.jpg">
			         <div class="thumb-image"> <img src="../images/si1.jpg" data-imagezoom="true" class="img-responsive"> </div>
			    </li>
			    <li data-thumb="../images/si2.jpg">
			       <div class="thumb-image"> <img src="../images/si2.jpg" data-imagezoom="true" class="img-responsive"> </div>
			    </li--> 
			  </ul>
		</div>
	</div>	

<div class="col-md-7 single-top-in">
			<div class="span_2_of_a1 simpleCart_shelfItem">
								
				<h3><?php echo $Prods[0]['nombre'];?></h3>

				<p class="in-para"> 
					<?php echo utf8_encode($Prods[0]['descripcion']);?>
				</p>
			    <div class="price_single">
				  <span class="reducedfrom item_price">$ <?php echo $Prods[0]['precio'];?></span>
				 <a href="#" data-text="Agregar al Carrito" class="but-hover1 item_add">Agregar al Carrito</a>
				 <div class="clearfix"></div>
				</div>
				
				 
			   
			<div class="clearfix"> </div>
			</div>
		   <!----- tabs-box ---->
		<div class="sap_tabs">	
				     <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
						  <ul class="resp-tabs-list">
						  	  <li class="resp-tab-item " aria-controls="tab_item-0" role="tab"><span>Descripción del producto</span></li>
							  <li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>Información Adicional</span></li>
							  <li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span>Reviews</span></li>
							  <div class="clearfix"></div>
						  </ul>				  	 
							<div class="resp-tabs-container">
							    <h2 class="resp-accordion resp-tab-active" role="tab" aria-controls="tab_item-0"><span class="resp-arrow"></span>Product Description</h2><div class="tab-1 resp-tab-content resp-tab-content-active" aria-labelledby="tab_item-0" style="display:block">
									<div class="facts">
									  <p>									  
									  <?php echo utf8_encode($Prods[0]['detallada']);?>
									</p>									
							        </div>

							    	</div>
							      <h2 class="resp-accordion" role="tab" aria-controls="tab_item-1"><span class="resp-arrow"></span>Información Adicional</h2><div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
										<div class="facts1">
					
						<div class="color"><p>Color</p>
							<span >Blue, Black, Red</span>
							<div class="clearfix"></div>
						</div>
						<div class="color">
							<p>Tamaño</p>
							<span >S, M, L, XL</span>
							<div class="clearfix"></div>
						</div>
					        
			 </div>

								</div>									
							      <h2 class="resp-accordion" role="tab" aria-controls="tab_item-2"><span class="resp-arrow"></span>Reviews</h2><div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
			


				<?php
					foreach ($review as $value) {
						
							$value['review'];
							$value['id_usuario'];
							$value['fecha_hora'];
				?>
						<div class="comments-top-top">
						<div class="top-comment-left">
							<img class="img-responsive" src="../images/co.png" alt="">
						</div>
						<div class="top-comment-right">
							<h6>
							
							<?php
								echo "User_:".$value['id_usuario']." - ".$value['fecha_hora'];
							?>

							</h6>
							<!-- comentario -->
							<p>
							<?php
								echo $value['review'];
							?>
							</p>
						</div>
						<div class="clearfix"> </div>
						<!--a class="add-re" href="#">Add Review</a-->
						</div>
				<?php
					}
				?>

							 </div>
					      </div>
					 </div>
					 <script src="../js/easyResponsiveTabs.js" type="text/javascript"></script>
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
	<?php include("../section/social.php"); ?>
<!-- //social -->

<!-- footer -->
	<?php include("../section/footer.php"); ?>
<!-- //footer -->

<script src="../js/imagezoom.js"></script>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script defer src="../js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="../css/flexslider.css" type="text/css" media="screen" />

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