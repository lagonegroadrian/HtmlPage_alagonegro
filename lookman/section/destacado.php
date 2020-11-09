<?php

 $base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
 $productoDes = new Producto($base);
 $_limite=6;
 $_orden=rand(1, 7);
 $productoDesOK = $productoDes->getProductoDestacado($_limite,$_orden);
 
?>

<div class="banner">

	<div class="banner-right">
		<ul id="flexiselDemo2">
<?php
	for ($aux1=0; $aux1 < count($productoDesOK); $aux1++)
	{
            $_ide_pr=$productoDesOK[$aux1]['id_producto'];
            $_img_pr=$productoDesOK[$aux1]['id_imagen'];
            $_tit_pr=$productoDesOK[$aux1]['titulo'];
            $_des_pr=$productoDesOK[$aux1]['descripcion'];
            $_det_pr=$productoDesOK[$aux1]['descripcion_detallada'];
            $_val_pr=($productoDesOK[$aux1]['precio']*1);
            $_fil_pr=$productoDesOK[$aux1]['imagen_filesystem'];
        
?>
			<li>
				<div class="banner-grid">
				<h2>Producto Destacado</h2>
					<div class="wome">
										<a 
<?php 
											echo "href='single.php?pr=".$_ide_pr."' ";
?>
											>
							<img class="img-responsive" 
<?php
							echo "src="."'"."images/prods/$_ide_pr/$_fil_pr"."'";
							echo "alt="."'".$_det_pr."'" ;
?>							
							/></a>
							<div class="women simpleCart_shelfItem">
								<!--a href="#"><img src="images/ll.png" alt=""></a-->
								<h6 ><a <?php echo "href='single.php?pr=".$_ide_pr."' "; ?> >	<?php echo "$_tit_pr";	?>	</a></h6>
								<p class="ba-price">
									<del> <?php echo "$ ".$_val_pr*1.3 ;?></del>
									<em class="item_price">$ <?php echo $_val_pr;?></em></p>
								<a href="#" data-text="Agregar al Carrito" class="<but-hov></but-hov>er1 item_add">Agregar al Carrito</a>
							</div>

					</div>
				</div>
			</li>





<?php
	}
?>	

		

		</ul>

		<script type="text/javascript">

		$(window).load(function() {
			$("#flexiselDemo2").flexisel({
				visibleItems: 1,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 5000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { changePoint:480,visibleItems: 1}, 
		    		landscape: { changePoint:640,visibleItems: 1},
		    		tablet: { changePoint:768,visibleItems: 1}
		    	}
		    });
			});
		</script>

		<script type="text/javascript" src="js/jquery.flexisel.js"></script>
	</div>

</div>