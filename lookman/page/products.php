<?php
require '../autoload.php';
session_start();
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
	include_once '../section/menu.php';
?>

<!--banner-->
<div class="banner-top">
	<div class="container">
		<h2 class="animated wow fadeInLeft" data-wow-delay=".5s">Products</h2>
		<h3 class="animated wow fadeInRight" data-wow-delay=".5s"><a href="index.html">Home</a><label>/</label>Products<label>/</label>Women's</h3>
		<div class="clearfix"> </div>
	</div>
</div>
	<!--content-->
		<div class="product">
			<div class="container">
						<div class="col-md-3 product-bottom">
			<!--categories-->
			<div class="categories animated wow fadeInUp animated" data-wow-delay=".5s" >
					<h3>Categories</h3>
					<ul class="cate">
						<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.html">Best Selling</a> <span>(15)</span></li>
						<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.html">Man</a> <span>(16)</span></li>
							<ul>
								<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.html">Accessories</a> <span>(2)</span></li>
								<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.html">Coats &amp; Jackets</a> <span>(5)</span></li>
								<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.html">Jeans</a> <span>(1)</span></li>
								<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.html">New Arrivals</a> <span>(0)</span></li>
								<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.html">Suits</a> <span>(1)</span></li>
								<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.html">Casual Shirts</a> <span>(0)</span></li>
							</ul>
						<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.html">Sales</a> <span>(15)</span></li>
						<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.html">Woman</a> <span>(15)</span></li>
							<ul>
								<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.html">Accessories</a> <span>(2)</span></li>
								<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.html">New Arrivals</a> <span>(0)</span></li>
								<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.html">Dresses</a> <span>(1)</span></li>
								<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.html">Casual Shirts</a> <span>(0)</span></li>
								<li><i class="glyphicon glyphicon-menu-right" ></i><a href="products.html">Shorts</a> <span>(4)</span></li>
							</ul>
					</ul>
				</div>
		<!--//menu-->
		<!--price-->
				<div class="price animated wow fadeInUp animated" data-wow-delay=".5s" >
					<h3>Price Range</h3>
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
					<h3>Colors</h3>

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
			<div class="sellers animated wow fadeInUp" data-wow-delay=".5s">
					
								<h3 class="best">BEST SELLERS</h3>
					<div class="product-head">
					<div class="product-go">
						<div class=" fashion-grid">
									<a href="single.html"><img class="img-responsive " src="images/pcc.jpg" alt=""></a>
									
								</div>
							<div class=" fashion-grid1">
								<h6 class="best2"><a href="single.html">Lorem ipsum </a></h6>
								<span class=" price-in1"> <del>$50.00</del>$40.00</span>
								<p>The standard chunk of Lorem Ipsum used</p>
							</div>
								
							<div class="clearfix"> </div>
							</div>
							<div class="product-go">
						<div class=" fashion-grid">
									<a href="single.html"><img class="img-responsive " src="images/pcc1.jpg" alt=""></a>
									
								</div>
							<div class=" fashion-grid1">
								<h6 class="best2"><a href="single.html">Lorem ipsum </a></h6>
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
				<div class="mens-toolbar">
						<p >Showing 1–9 of 21 results</p>
	                
					 <p class="showing">Sorting By
			            <select>
			                  <option value=""> Name</option>
			                  <option value="">  Rate</option>
			                    <option value=""> Color </option>
			                    <option value=""> Price </option>
			            </select>
			          </p> 
					  <p>Show
			            <select>
			                  <option value=""> 9</option>
			                  <option value="">  10</option>
			                    <option value=""> 11 </option>
			                    <option value=""> 12 </option>
			            </select>
			          </p>
	    		    
    	      
                	<div class="clearfix"></div>		
		        </div>

			<div class="mid-popular">
				<div class="col-sm-4 item-grid item-gr  simpleCart_shelfItem">
							<div class="grid-pro">
								<div  class=" grid-product " >
									<figure>		
										<a href="single.html">
											<div class="grid-img">
												<img  src="images/pr1.jpg" class="img-responsive" alt="">
											</div>
											<div class="grid-img">
												<img  src="images/pr.jpg" class="img-responsive"  alt="">
											</div>			
										</a>		
									</figure>	
								</div>
								<div class="women">
									<a href="#"><img src="images/ll.png" alt=""></a>
									<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
									<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
									<a href="#" data-text="Add To Cart" class="but-hover1 item_add">Add To Cart</a>
								</div>
							</div>
						</div>
						<div class="col-sm-4 item-grid item-gr simpleCart_shelfItem">
							<div class="grid-pro">
								<div  class=" grid-product " >
									<figure>		
										<a href="single.html">
											<div class="grid-img">
												<img  src="images/pr3.jpg" class="img-responsive" alt="">
											</div>
											<div class="grid-img">
												<img  src="images/pr2.jpg" class="img-responsive"  alt="">
											</div>			
										</a>		
									</figure>	
								</div>
								<div class="women">
									<a href="#"><img src="images/ll.png" alt=""></a>
									<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
									<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
									<a href="#" data-text="Add To Cart" class="but-hover1 item_add">Add To Cart</a>
								</div>
							</div>
						</div>
						<div class="col-sm-4 item-grid item-gr simpleCart_shelfItem">
							<div class="grid-pro">
								<div  class=" grid-product " >
									<figure>		
										<a href="single.html">
											<div class="grid-img">
												<img  src="images/pr5.jpg" class="img-responsive" alt="">
											</div>
											<div class="grid-img">
												<img  src="images/pr4.jpg" class="img-responsive"  alt="">
											</div>			
										</a>		
									</figure>	
								</div>
								<div class="women">
									<a href="#"><img src="images/ll.png" alt=""></a>
									<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
									<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
									<a href="#" data-text="Add To Cart" class="but-hover1 item_add">Add To Cart</a>
								</div>
							</div>
						</div>
						<div class="col-sm-4 item-grid item-gr simpleCart_shelfItem">
							<div class="grid-pro">
								<div  class=" grid-product " >
									<figure>		
										<a href="single.html">
											<div class="grid-img">
												<img  src="images/pr12.jpg" class="img-responsive" alt="">
											</div>
											<div class="grid-img">
												<img  src="images/pr13.jpg" class="img-responsive"  alt="">
											</div>			
										</a>		
									</figure>	
								</div>
								<div class="women">
									<a href="#"><img src="images/ll.png" alt=""></a>
									<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
									<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
									<a href="#" data-text="Add To Cart" class="but-hover1 item_add">Add To Cart</a>
								</div>
							</div>
						</div>
						<div class="col-sm-4 item-grid item-gr simpleCart_shelfItem">
							<div class="grid-pro">
								<div  class=" grid-product " >
									<figure>		
										<a href="single.html">
											<div class="grid-img">
												<img  src="images/pr15.jpg" class="img-responsive" alt="">
											</div>
											<div class="grid-img">
												<img  src="images/pr14.jpg" class="img-responsive"  alt="">
											</div>			
										</a>		
									</figure>	
								</div>
								<div class="women">
									<a href="#"><img src="images/ll.png" alt=""></a>
									<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
									<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
									<a href="#" data-text="Add To Cart" class="but-hover1 item_add">Add To Cart</a>
								</div>
							</div>
						</div>
						<div class="col-sm-4 item-grid item-gr simpleCart_shelfItem">
							<div class="grid-pro">
								<div  class=" grid-product " >
									<figure>		
										<a href="single.html">
											<div class="grid-img">
												<img  src="images/pr17.jpg" class="img-responsive" alt="">
											</div>
											<div class="grid-img">
												<img  src="images/pr16.jpg" class="img-responsive"  alt="">
											</div>			
										</a>		
									</figure>	
								</div>
								<div class="women">
									<a href="#"><img src="images/ll.png" alt=""></a>
									<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
									<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
									<a href="#" data-text="Add To Cart" class="but-hover1 item_add">Add To Cart</a>
								</div>
							</div>
						</div>
						<div class="col-sm-4 item-grid item-gr simpleCart_shelfItem">
							<div class="grid-pro">
								<div  class=" grid-product " >
									<figure>		
										<a href="single.html">
											<div class="grid-img">
												<img  src="images/pr19.jpg" class="img-responsive" alt="">
											</div>
											<div class="grid-img">
												<img  src="images/pr18.jpg" class="img-responsive"  alt="">
											</div>			
										</a>		
									</figure>	
								</div>
								<div class="women">
									<a href="#"><img src="images/ll.png" alt=""></a>
									<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
									<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
									<a href="#" data-text="Add To Cart" class="but-hover1 item_add">Add To Cart</a>
								</div>
							</div>
						</div>
						<div class="col-sm-4 item-grid item-gr simpleCart_shelfItem">
							<div class="grid-pro">
								<div  class=" grid-product " >
									<figure>		
										<a href="single.html">
											<div class="grid-img">
												<img  src="images/pr21.jpg" class="img-responsive" alt="">
											</div>
											<div class="grid-img">
												<img  src="images/pr20.jpg" class="img-responsive"  alt="">
											</div>			
										</a>		
									</figure>	
								</div>
								<div class="women">
									<a href="#"><img src="images/ll.png" alt=""></a>
									<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
									<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
									<a href="#" data-text="Add To Cart" class="but-hover1 item_add">Add To Cart</a>
								</div>
							</div>
						</div>
						<div class="col-sm-4 item-grid item-gr simpleCart_shelfItem">
							<div class="grid-pro">
								<div  class=" grid-product " >
									<figure>		
										<a href="single.html">
											<div class="grid-img">
												<img  src="images/pr23.jpg" class="img-responsive" alt="">
											</div>
											<div class="grid-img">
												<img  src="images/pr22.jpg" class="img-responsive"  alt="">
											</div>			
										</a>		
									</figure>	
								</div>
								<div class="women">
									<a href="#"><img src="images/ll.png" alt=""></a>
									<h6><a href="single.html">Sed ut perspiciatis unde</a></h6>
									<p ><del>$100.00</del><em class="item_price">$70.00</em></p>
									<a href="#" data-text="Add To Cart" class="but-hover1 item_add">Add To Cart</a>
								</div>
							</div>
						</div>
					<div class="clearfix"></div>
				</div>
			</div>

		
			</div class="clearfix"></div>
			</div>			
		</div>
				<!--//products-->

<div class="social animated wow fadeInUp" data-wow-delay=".1s">
	<div class="container">
		<div class="col-sm-3 social-ic">
			<a href="#">FACEBOOK</a>
		</div>
		<div class="col-sm-3 social-ic">
			<a href="#">TWITTER</a>
		</div>
		<div class="col-sm-3 social-ic">
			<a href="#">GOOGLE+</a>
		</div>
		<div class="col-sm-3 social-ic">
			<a href="#">PINTEREST</a>
		</div>
	<div class="clearfix"></div>
	</div>
</div>

<!-- footer -->
	<div class="footer">
		<div class="container">
		<div class="footer-top">
		<div class="col-md-9 footer-top1">
		<h4>Duis aute irure dolor in reprehenderit in voluptate </h4>
		<p>Duis aute irure dolor in reprehenderit in voluptate velit esse.Excepteur sint occaecat cupidatat 
						non proident Duis aute irure dolor in reprehenderit in voluptate velit esse</p>
		</div>
		<div class="col-md-3 footer-top2">
		<a href="contact.html">Contact Us</a>
		</div>
		<div class="clearfix"> </div>
		</div>
			<div class="footer-grids">
				<div class="col-md-4 footer-grid animated wow fadeInLeft" data-wow-delay=".5s">
					<h3>About Us</h3>
					<p>Duis aute irure dolor in reprehenderit in voluptate velit esse.<span>Excepteur sint occaecat cupidatat 
						non proident, sunt in culpa qui officia deserunt mollit.</span></p>
				</div>
				<div class="col-md-4 footer-grid animated wow fadeInLeft" data-wow-delay=".6s">
					<h3>Contact Info</h3>
					<ul>
						<li><i class="glyphicon glyphicon-map-marker" ></i>1234k Avenue, 4th block, <span>New York City.</span></li>
						<li class="foot-mid"><i class="glyphicon glyphicon-envelope" ></i><a href="mailto:info@example.com">info@example.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" ></i>+1234 567 567</li>
					</ul>
				</div>
				<div class="col-md-4 footer-grid animated wow fadeInLeft" data-wow-delay=".7s">
				<h3>Sign up for newsletter </h3>
				<form>
					<input type="text" placeholder="Email"  required="">
					<input type="submit" value="Submit">
				</form>
			
				</div>
			
				<div class="clearfix"> </div>
			</div>
			
			<div class="copy-right animated wow fadeInUp" data-wow-delay=".5s">
				<p>&copy 2016 Classic Style. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
			</div>
		</div>
	</div>
<!-- //footer -->
</body>
</html>