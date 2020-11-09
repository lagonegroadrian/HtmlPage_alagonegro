	<div class="header">
			<div class="header-grid">
					<div class="container">
				<div class="header-left animated wow fadeInLeft" data-wow-delay=".5s">
					<ul>
<?php
						if (isset($_SESSION["_idu"]) && $_SESSION["_per"] == 'admin'){
?>
						<li><i class="glyphicon glyphicon-headphones"></i><a href="abm_usuario.php">Usuario</a></li>
						<li><i class="glyphicon glyphicon-book" ></i><a href="comentario.php">Comentario</a></li>
						<li><i class="glyphicon glyphicon-book" ></i><a href="abm_perfil.php">Perfil</a></li>
						<li><i class="glyphicon glyphicon-book" ></i><a href="abm_categoria.php">Categoria</a></li>
						<li><i class="glyphicon glyphicon-book" ></i><a href="abm_subcatego.php">SubCategoria</a></li>
						<li><i class="glyphicon glyphicon-book" ></i><a href="abm_catprod.php">Cat Prod</a></li>
						<li><i class="glyphicon glyphicon-book" ></i><a href="abm_marca.php">Marca</a></li>
						<li><i class="glyphicon glyphicon-book" ></i><a href="abm_producto.php">Producto</a></li>
<?php
						}
						else
						{
?>
						<li><i class="glyphicon glyphicon-envelope" ></i><a href="mailto:info@example.com">admin@lookman.com</a></li>
						<li><i class="glyphicon glyphicon-earphone" ></i>+1234 567 892</li>
<?php
						}
?>						
					</ul>
				</div>
				<div class="header-right animated wow fadeInRight" data-wow-delay=".5s">
				<div class="header-right1 ">
					<ul>
						<li><i class="glyphicon glyphicon-log-in" ></i>
<?php
						if (isset($_SESSION["_idu"])){echo "<a href='logout.php'>Salir</a>";}
						else{echo "<a href='ingreso.php'>Ingreso</a>";}
?>
						</li>
						
					</ul>
				</div>





<?php
						if (isset($_SESSION["_idu"]) && $_SESSION["_per"] !== 'admin')
						{
?>				
				<div class="header-right2">
					<div class="cart box_1">
						<a href="page/checkout.php">
							<h3> <div class="total">
								<span class="simpleCart_total"></span> (<span id="simpleCart_quantity" class="simpleCart_quantity"></span> items)</div>
								<img src="images/cart.png" alt="" />
							</h3>
						</a>
						<p><a href="javascript:;" class="simpleCart_empty">Vaciar Carrito</a></p>
						<div class="clearfix"> </div>
					</div>	
				</div>
<?php
						}
?>
				<div class="clearfix"> </div>

				</div>

				<div class="clearfix"> </div>

			</div>

			</div>


			<div class="container">
			<div class="logo-nav">

<nav class="navbar navbar-default">

	<div class="navbar-header nav_2">
		<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		
		<div class="navbar-brand logo-nav-left ">
			<h1 class="animated wow pulse" data-wow-delay=".5s"><a href="index.php">Look<span>Man</span></a></h1>
		</div>

	</div> 
					
					<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
							<ul class="nav navbar-nav">
							<li class="active"><a href="index.php" class="act">Home</a></li>	

<?php

 $base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
 $categoria = new Categoria($base);
 $subcategoria = new SubCategoria($base);
 $categoriaproducto = new CategoriaProducto($base);
 $categoriaOK = $categoria->getCategoria(1); // 1- categoria=activa ; 2- categoria=inactiva

 for ($aux1=0; $aux1 < count($categoriaOK); $aux1++)
 {
 	$_id_cat=$categoriaOK[$aux1]['id_categoria'];
 	$_det_cat=$categoriaOK[$aux1]['detalle_cat'];
?>

<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"> <?php echo "$_det_cat"; ?> <b class="caret"></b></a>
<ul class="dropdown-menu multi">
<div class="row">

<?php

 		$sub_categoriaOK = $subcategoria->getSubCategoria($_id_cat);

		for ($aux2=0; $aux2 < count($sub_categoriaOK); $aux2++)
		{
		    $_id_sub_cat=$sub_categoriaOK[$aux2]['id_subcat'];
		    $_det_sub_cat=$sub_categoriaOK[$aux2]['detalle_subcat'];

?>
			
			<div class="col-sm-4">
			<ul class="multi-column-dropdown">
			<h6><?php echo "$_det_sub_cat"; ?></h6>

<?php

		    	$categoriaproductoOK = $categoriaproducto->getCategoriaProducto($_id_sub_cat);
		    	for ($aux3=0; $aux3 < count($categoriaproductoOK); $aux3++)
		    	{
		    		$_id_cat_prod=$categoriaproductoOK[$aux3]['id_catprod'];
		    		$_det_cat_prod=$categoriaproductoOK[$aux3]['titulo_catprod'];
		    		?>
					<li><a 
						
						<?php
						echo "href='producto.php?catprod=".$_id_cat_prod."'";
?>						
						>
<?php 					
						echo "$_det_cat_prod"; 
?>

						</a></li>
<?php
		    	}
?>
				</ul>
				</div>
<?php
		}


?>

<div class="clearfix"></div>
</div>
</ul>
</li>

<?php
 }

?>
							
<!--li><a href="codes.html"> Codes</a></li-->
<li><a href="contacto.php">Contacto</a></li>
</ul>
</div>
</nav>
</div>			
</div>
</div>