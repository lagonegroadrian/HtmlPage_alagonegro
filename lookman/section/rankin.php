				<div class="content-top">
					<div class="col-md-5 col-md1 animated wow fadeInLeft" data-wow-delay=".1s">
						<div class="col-3">
							
								<img src="images/pi1.jpg" class="img-responsive " alt="">
							<div class="col-pic">	
								<h5> Macho's Wear</h5>
								<p>At vero eos et accusamus et</p>
							</div>
						</div>
						
					</div>
					<div class="col-md-7 col-md2 animated wow fadeInRight" data-wow-delay=".1s">
						

<?php
 $base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
 $productoPto = new Producto($base);
 $_limite=6;
 $_orden='8 desc '; // para que el ordenamiento sea por el puntaje
 $productoPtoOK = $productoPto->getProductoDestacado($_limite,$_orden);



for ($aux=0; $aux < 3 ; $aux++) {

$_ide_pt=$productoPtoOK[$aux]['id_producto'];
$_img_pt=$productoPtoOK[$aux]['id_imagen'];
$_tit_pt=$productoPtoOK[$aux]['titulo'] ;
$_des_pt=$productoPtoOK[$aux]['descripcion'];
$_det_pt=$productoPtoOK[$aux]['descripcion_detallada'];
$_pre_pt=$productoPtoOK[$aux]['precio'];
$_fil_pt=$productoPtoOK[$aux]['imagen_filesystem'];
$_pun_pt=$productoPtoOK[$aux]['puntaje'];
?>
						<div class="col-sm-4 item-grid simpleCart_shelfItem">
							<div class="grid-pro">
								<div  class=" grid-product " >
									<figure>		
										<a 

<?php 
											echo "href='single.php?pr=".$_ide_pt."' ";
?>
											>
											<div class="grid-img">
												<img  
<?php
												echo "src="."'"."images/prods/$_ide_pt/$_fil_pt"."'";
												echo "alt="."'".$_det_pr."'" ;
?>
												class="img-responsive" >
											</div>											
										</a>		
									</figure>	
								</div>
								<div class="women">
									<!--a href="#"><img src="images/ll.png" alt=""></a-->
									<h6>

										<a 

<?php 
											echo "href='single.php?pr=".$_ide_pt."' ";
?>
											>

										<?php echo "$_tit_pt";	?></a></h6>
									<p ><del><?php echo "$ ".$_pre_pt*1.1 ;?></del><em class="item_price"><?php echo "$ ".$_pre_pt;?></em></p>
									<a href="#" data-text="+ carrito" class="but-hover1 item_add">+ carrito</a>
								</div>
							</div>
						</div>
<?php

}

?>	


					<div class="clearfix"></div>
					</div>
					<div class="clearfix"></div>
				</div>
				<!----->
				<!---->
				<div class="content-top">
					
					<div class="col-md-7 col-md2 animated wow fadeInLeft" data-wow-delay=".1s">
						
<?php

for ($aux=3; $aux < 6 ; $aux++) {
    if(array_key_exists($aux,$productoPtoOK)/*!is_null($productoPtoOK[$aux])*/){
        $_ide_pt=$productoPtoOK[$aux]['id_producto'];
        $_img_pt=$productoPtoOK[$aux]['id_imagen'];
        $_tit_pt=$productoPtoOK[$aux]['titulo'] ;
        $_des_pt=$productoPtoOK[$aux]['descripcion'];
        $_det_pt=$productoPtoOK[$aux]['descripcion_detallada'];
        $_pre_pt=$productoPtoOK[$aux]['precio'];
        $_fil_pt=$productoPtoOK[$aux]['imagen_filesystem'];
        $_pun_pt=$productoPtoOK[$aux]['puntaje'];
?>

						<div class="col-sm-4 item-grid simpleCart_shelfItem">
							<div class="grid-pro">
								<div  class=" grid-product " >
									<figure>		
										<a 
<?php 
											echo "href='single.php?pr=".$_ide_pt."' ";
?>
											>
											<div class="grid-img">
												<img  
<?php
												echo "src="."'"."images/prods/$_ide_pt/$_fil_pt"."'";
												echo "alt="."'".$_det_pr."'" ;
?>
												class="img-responsive" >
											</div>	
										</a>		
									</figure>	
								</div>
								<div class="women">
									<!--a href="#"><img src="images/ll.png" alt=""></a-->
									<h6>
										<a 
<?php 
											echo "href='single.php?pr=".$_ide_pt."' ";
?>
											>
										<?php echo "$_tit_pt";	?></a></h6>
									<p ><del><?php echo "$ ".$_pre_pt*1.1 ;?></del><em class="item_price"><?php echo "$ ".$_pre_pt;?></em></p>
									<a href="#" data-text="+ carrito" class="but-hover1 item_add">+ carrito</a>
								</div>
							</div>
						</div>
<?php

    }
}

?>	

					<div class="clearfix"></div>
					</div>
					<div class="col-md-5 col-md1 animated wow fadeInRight" data-wow-delay=".1s">
						<div class="col-3">
							


								<img src="images/pi2.jpg" class="img-responsive " alt="">
							<div class="col-pic">
								<h5> Men's Wear</h5>
								<p>At vero eos et accusamus et</p>
							</div>
						</div>
						
					</div>
					<div class="clearfix"></div>
				</div>